<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_671125487f6cc',
	'title' => 'Block:gallery-tabs',
	'fields' => array(
		array(
			'key' => 'field_6711254884eb9',
			'label' => 'Заголовок',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'acfe_seamless_style' => 0,
			'acfe_group_modal' => 0,
			'acfe_field_group_condition' => 0,
			'acfe_group_modal_close' => 0,
			'acfe_group_modal_button' => '',
			'acfe_group_modal_size' => 'large',
			'sub_fields' => array(
				array(
					'key' => 'field_671125488c7b7',
					'label' => 'Небольшой текст',
					'name' => 'small-text',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '15',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'acfe_field_group_condition' => 0,
				),
				array(
					'key' => 'field_6711254890555',
					'label' => 'Тип',
					'name' => 'type',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '15',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
					),
					'default_value' => false,
					'return_format' => 'value',
					'multiple' => 0,
					'max' => '',
					'prepend' => '',
					'append' => '',
					'allow_null' => 0,
					'ui' => 0,
					'acfe_field_group_condition' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'allow_custom' => 0,
					'search_placeholder' => '',
					'min' => '',
				),
				array(
					'key' => 'field_6711254893ff2',
					'label' => 'Текст',
					'name' => 'text',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'acfe_field_group_condition' => 0,
				),
			),
		),
		array(
			'key' => 'field_6711259f3535a',
			'label' => 'Вкладки',
			'name' => 'tabs',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 0,
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Добавить вкладку',
			'acfe_field_group_condition' => 0,
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_671125ad3535b',
					'label' => '(Column 6/12)',
					'name' => '',
					'aria-label' => '',
					'type' => 'acfe_column',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'columns' => '6/12',
					'endpoint' => 0,
					'border' => '',
					'acfe_field_group_condition' => 0,
					'border_endpoint' => array(
						0 => 'endpoint',
					),
					'parent_repeater' => 'field_6711259f3535a',
				),
				array(
					'key' => 'field_671125bc3535d',
					'label' => 'Галерея',
					'name' => 'gallery',
					'aria-label' => '',
					'type' => 'gallery',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min' => '',
					'max' => '',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'insert' => 'append',
					'preview_size' => 'medium',
					'acfe_field_group_condition' => 0,
					'parent_repeater' => 'field_6711259f3535a',
				),
				array(
					'key' => 'field_671125b93535c',
					'label' => '(Column 6/12)',
					'name' => '',
					'aria-label' => '',
					'type' => 'acfe_column',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'columns' => '6/12',
					'endpoint' => 0,
					'border' => '',
					'acfe_field_group_condition' => 0,
					'border_endpoint' => array(
						0 => 'endpoint',
					),
					'parent_repeater' => 'field_6711259f3535a',
				),
				array(
					'key' => 'field_671125ce3535e',
					'label' => 'Название',
					'name' => 'label',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'required_message' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'acfe_field_group_condition' => 0,
					'parent_repeater' => 'field_6711259f3535a',
				),
				array(
					'key' => 'field_671125d73535f',
					'label' => 'Текст',
					'name' => 'text',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_textarea_code' => 0,
					'maxlength' => '',
					'rows' => 5,
					'placeholder' => '',
					'new_lines' => '',
					'acfe_field_group_condition' => 0,
					'parent_repeater' => 'field_6711259f3535a',
				),
				array(
					'key' => 'field_671125f635360',
					'label' => 'Ссылка',
					'name' => 'link',
					'aria-label' => '',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'acfe_field_group_condition' => 0,
					'parent_repeater' => 'field_6711259f3535a',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1729177127,
));

endif;