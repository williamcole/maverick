<?php
$label = maverick_kses_inline( $attributes['label'] ?? 'Topics' );

// Only show categories that have at least one published post.
$categories = get_categories( [
	'hide_empty' => true,
	'orderby'    => 'name',
	'order'      => 'ASC',
] );

$current_cat_id = is_category() ? get_queried_object_id() : 0;
$is_all_active  = ! is_category();
$blog_url       = get_post_type_archive_link( 'post' ) ?: home_url( '/' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-topic-filter' ] ); ?>>
	<span class="mtf-label"><?php echo $label; ?></span>

	<a href="<?php echo esc_url( $blog_url ); ?>" class="mtf-chip<?php echo $is_all_active ? ' is-active' : ''; ?>">
		<?php esc_html_e( 'All', 'maverick' ); ?>
	</a>

	<?php foreach ( $categories as $category ) :
		$is_active = ( $category->term_id === $current_cat_id );
		?>
		<a href="<?php echo esc_url( get_category_link( $category ) ); ?>" class="mtf-chip<?php echo $is_active ? ' is-active' : ''; ?>">
			<?php echo esc_html( $category->name ); ?>
		</a>
	<?php endforeach; ?>
</div>
