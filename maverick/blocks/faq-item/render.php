<?php
$question = maverick_kses_inline( $attributes['question'] ?? '' );
$answer   = maverick_kses_inline( $attributes['answer']   ?? '' );
$is_open  = ! empty( $attributes['isOpen'] );
?>
<details <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-faq-item' ] ); ?> <?php echo $is_open ? 'open' : ''; ?>>
	<summary><?php echo $question; ?></summary>
	<div class="mfi-answer-wrap">
		<div class="mfi-answer"><?php echo $answer; ?></div>
	</div>
</details>
