#!/usr/bin/env bash
#
# release.sh — bump the theme's patch version, rebuild all blocks, and zip.
#
# Usage:
#   ./release.sh           # bumps patch version (1.1.0 -> 1.1.1)
#   ./release.sh minor     # bumps minor version (1.1.0 -> 1.2.0), resets patch to 0
#   ./release.sh major     # bumps major version (1.1.0 -> 2.0.0), resets minor/patch to 0
#
set -euo pipefail

BUMP_TYPE="${1:-patch}"
THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
STYLE_CSS="$THEME_DIR/style.css"
PACKAGE_JSON="$THEME_DIR/package.json"

# ── Read current version from style.css ──────────────────────────────────────
CURRENT_VERSION=$(grep -oP 'Version:\s*\K[0-9]+\.[0-9]+\.[0-9]+' "$STYLE_CSS")
IFS='.' read -r MAJOR MINOR PATCH <<< "$CURRENT_VERSION"

case "$BUMP_TYPE" in
  major) MAJOR=$((MAJOR + 1)); MINOR=0; PATCH=0 ;;
  minor) MINOR=$((MINOR + 1)); PATCH=0 ;;
  patch) PATCH=$((PATCH + 1)) ;;
  *) echo "Unknown bump type: $BUMP_TYPE (use major, minor, or patch)"; exit 1 ;;
esac

NEW_VERSION="${MAJOR}.${MINOR}.${PATCH}"
echo "Bumping version: $CURRENT_VERSION -> $NEW_VERSION"

# ── Update style.css and package.json ────────────────────────────────────────
sed -i "s/Version:           ${CURRENT_VERSION}/Version:           ${NEW_VERSION}/" "$STYLE_CSS"
sed -i "s/\"version\": \"${CURRENT_VERSION}\"/\"version\": \"${NEW_VERSION}\"/" "$PACKAGE_JSON"

# ── Rebuild all blocks ────────────────────────────────────────────────────────
echo "Building blocks..."
cd "$THEME_DIR"
rm -rf blocks/*/build
npm run build

# ── Zip, excluding node_modules ───────────────────────────────────────────────
cd "$THEME_DIR/.."
ZIP_NAME="maverick-${NEW_VERSION}.zip"
rm -f "$ZIP_NAME" maverick.zip
zip -rq "$ZIP_NAME" "$(basename "$THEME_DIR")/" \
  --exclude "*.DS_Store" \
  --exclude "*/node_modules/*"

echo "Done: $ZIP_NAME"
