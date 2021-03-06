<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var  FW_Option_Type_Typography_v2 $typography_v2
 * @var  string $id
 * @var  array $option
 * @var  array $data
 * @var  array $fonts
 * @var array $defaults
 */

{
	$wrapper_attr = $option['attr'];

	unset(
		$wrapper_attr['value'],
		$wrapper_attr['name']
	);
}

{
	$option['value'] = array_merge( $defaults['value'], (array) $option['value'] );
	$data['value']   = array_merge( $option['value'], array_filter( (array) $data['value'] ) );
	$google_font     = $typography_v2->get_google_font( $data['value']['family'] );

}
?>
<div <?php echo fw_attr_to_html( $wrapper_attr ) ?>>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-family fw-border-box-sizing fw-col-sm-5">
		<select data-type="family" data-value="<?php echo $data['value']['family']; ?>"
		        name="<?php echo esc_attr( $option['attr']['name'] ) ?>[family]"
		        class="fw-option-typography-v2-option-family-input">
		</select>

		<div class="fw-inner">Font face</div>
	</div>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-style fw-border-box-sizing fw-col-sm-3"
	     style="display: <?php echo ( $google_font ) ? 'none' : 'inline-block'; ?>;">
		<select data-type="style" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[style]"
		        class="fw-option-typography-v2-option-style-input">
			<?php foreach (
				array(
					'normal'  => 'Normal',
					'italic'  => 'Italic',
					'oblique' => 'Oblique'
				)
				as $key => $style
			): ?>
				<option value="<?php echo esc_attr( $key ) ?>"
				        <?php if ($data['value']['style'] === $key): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars( $style ) ?></option>
			<?php endforeach; ?>
		</select>

		<div class="fw-inner"><?php _e( 'Style', 'fw' ); ?></div>
	</div>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-weight fw-border-box-sizing fw-col-sm-3"
	     style="display: <?php echo ( $google_font ) ? 'none' : 'inline-block'; ?>;">
		<select data-type="weight" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[weight]"
		        class="fw-option-typography-v2-option-weight-input">
			<?php foreach (
				array(
					100 => 100,
					200 => 200,
					300 => 300,
					400 => 400,
					500 => 500,
					600 => 600,
					700 => 700,
					800 => 800,
					900 => 900
				)
				as $key => $style
			): ?>
				<option value="<?php echo esc_attr( $key ) ?>"
				        <?php if ($data['value']['weight'] === $key): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars( $style ) ?></option>
			<?php endforeach; ?>
		</select>

		<div class="fw-inner"><?php _e( 'Weight', 'fw' ); ?></div>
	</div>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-subset fw-border-box-sizing fw-col-sm-2"
	     style="display: <?php echo ( $google_font ) ? 'inline-block' : 'none'; ?>;">
		<select data-type="subset" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[subset]"
		        class="fw-option-typography-v2-option-subset">
			<?php if ( $google_font ) {
				foreach ( $google_font->subsets as $subset ) { ?>
					<option value="<?php echo esc_attr( $subset ) ?>"
					        <?php if ($data['value']['subset'] === $subset): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars( $subset ); ?></option>
				<?php }
			}
			?>
		</select>

		<div class="fw-inner"><?php _e( 'Script', 'fw' ); ?></div>
	</div>

	<div
		class="fw-option-typography-v2-option fw-option-typography-v2-option-variation fw-border-box-sizing fw-col-sm-2"
		style="display: <?php echo ( $google_font ) ? 'inline-block' : 'none'; ?>;">
		<select data-type="variation" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[variation]"
		        class="fw-option-typography-v2-option-variation">
			<?php if ( $google_font ) {
				foreach ( $google_font->variants as $variant ) { ?>
					<option value="<?php echo esc_attr( $variant ) ?>"
					        <?php if ($data['value']['variation'] === $variant): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars( $variant ); ?></option>
				<?php }
			}
			?>
		</select>

		<div class="fw-inner"><?php _e( 'Style', 'fw' ); ?></div>
	</div>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-size fw-border-box-sizing fw-col-sm-2">
		<input data-type="size" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[size]"
		       class="fw-option-typography-v2-option-size-input" type="text"
		       value="<?php echo $data['value']['size']; ?>">

		<div class="fw-inner"><?php _e( 'Size', 'fw' ); ?></div>
	</div>

	<div
		class="fw-option-typography-v2-option fw-option-typography-v2-option-line-height fw-border-box-sizing fw-col-sm-2">
		<input data-type="line-height" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[line-height]"
		       value="<?php echo $data['value']['line-height']; ?>"
		       class="fw-option-typography-v2-option-line-height-input" type="text">

		<div class="fw-inner"><?php _e( 'Line height', 'fw' ); ?></div>
	</div>

	<div
		class="fw-option-typography-v2-option fw-option-typography-v2-option-letter-spacing fw-border-box-sizing fw-col-sm-2">
		<input data-type="letter-spacing" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[letter-spacing]"
		       value="<?php echo $data['value']['letter-spacing']; ?>"
		       class="fw-option-typography-v2-option-letter-spacing-input" type="text">

		<div class="fw-inner"><?php _e( 'Letter spacing', 'fw' ); ?></div>
	</div>

	<div class="fw-option-typography-v2-option fw-option-typography-v2-option-color fw-border-box-sizing fw-col-sm-2"
	     data-type="color">
		<?php
		echo fw()->backend->option_type( 'color-picker' )->render(
			'color',
			array(
				'label' => false,
				'desc'  => false,
				'type'  => 'color-picker',
				'value' => $option['value']['color']
			),
			array(
				'value'       => $data['value']['color'],
				'id_prefix'   => 'fw-option-' . $id . '-typography-v2-option-',
				'name_prefix' => $data['name_prefix'] . '[' . $id . ']',
			)
		)
		?>
		<div class="fw-inner"><?php _e( 'Color', 'fw' ); ?></div>
	</div>

</div>
