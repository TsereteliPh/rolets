<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_66c5fdc21b1af',
	'title' => 'Блоки',
	'fields' => array(
		array(
			'key' => 'field_66c5fdc249e96',
			'label' => 'Блоки',
			'name' => 'blocks',
			'aria-label' => '',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_flexible_advanced' => 1,
			'acfe_flexible_stylised_button' => 0,
			'acfe_flexible_hide_empty_message' => 0,
			'acfe_flexible_empty_message' => '',
			'acfe_flexible_layouts_templates' => 0,
			'acfe_flexible_layouts_placeholder' => 0,
			'acfe_flexible_layouts_thumbnails' => 1,
			'acfe_flexible_layouts_settings' => 0,
			'acfe_flexible_layouts_locations' => 0,
			'acfe_flexible_async' => array(
			),
			'acfe_flexible_add_actions' => array(
			),
			'acfe_flexible_remove_button' => array(
			),
			'acfe_flexible_layouts_state' => 'user',
			'acfe_flexible_modal_edit' => array(
				'acfe_flexible_modal_edit_enabled' => '0',
				'acfe_flexible_modal_edit_size' => 'large',
			),
			'acfe_flexible_modal' => array(
				'acfe_flexible_modal_enabled' => '1',
				'acfe_flexible_modal_title' => 'Заголовок',
				'acfe_flexible_modal_size' => 'full',
				'acfe_flexible_modal_col' => '3',
				'acfe_flexible_modal_categories' => '0',
			),
			'acfe_flexible_grid' => array(
				'acfe_flexible_grid_enabled' => '0',
				'acfe_flexible_grid_align' => 'center',
				'acfe_flexible_grid_valign' => 'stretch',
				'acfe_flexible_grid_wrap' => false,
			),
			'layouts' => array(
				'layout_66c5fdd603de3' => array(
					'key' => 'layout_66c5fdd603de3',
					'name' => 'banner',
					'label' => 'Баннер',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66ceebad74704',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66ceea444a6d2',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66d065a56b26f' => array(
					'key' => 'layout_66d065a56b26f',
					'name' => 'video',
					'label' => 'Видео',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66d065aa6b272',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66d064e18cc54',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66fd320f3be12' => array(
					'key' => 'layout_66fd320f3be12',
					'name' => 'faq',
					'label' => 'Вопрос - ответ',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66fd32163be15',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66fd31d1d0eba',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66d06e0b267df' => array(
					'key' => 'layout_66d06e0b267df',
					'name' => 'docs',
					'label' => 'Документация',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66d06e13267e2',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66d06c799ce11',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66fbc78a7cff5' => array(
					'key' => 'layout_66fbc78a7cff5',
					'name' => 'order-production',
					'label' => 'Заказать изготовление',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66fbc7947cff8',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66fbc601eefd7',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66cf15335cfba' => array(
					'key' => 'layout_66cf15335cfba',
					'name' => 'about',
					'label' => 'О компании',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66cf15405cfbd',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66cf13d758029',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66fe64b8174a6' => array(
					'key' => 'layout_66fe64b8174a6',
					'name' => 'main-text',
					'label' => 'Основной текстовый блок',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66fe64c1174a9',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66fe6154d9d90',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66fd09fedce9e' => array(
					'key' => 'layout_66fd09fedce9e',
					'name' => 'reviews',
					'label' => 'Отзывы',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66fd0a03dcea1',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66fd093e4918e',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66fbe2704f6d1' => array(
					'key' => 'layout_66fbe2704f6d1',
					'name' => 'partners',
					'label' => 'Партнеры',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66fbe2744f6d4',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66fbe21bdd3a6',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_66d0398ce1a63' => array(
					'key' => 'layout_66d0398ce1a63',
					'name' => 'advantages',
					'label' => 'Преимущества',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66d03991e1a66',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_66d0389e19395',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
				'layout_6703e04e4ef9f' => array(
					'key' => 'layout_6703e04e4ef9f',
					'name' => 'articles-slider',
					'label' => 'Слайдер статей',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_6703e0584efa2',
							'label' => '',
							'name' => '',
							'aria-label' => '',
							'type' => 'clone',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'clone' => array(
								0 => 'group_6703dca9ccd64',
							),
							'display' => 'seamless',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 0,
							'acfe_field_group_condition' => 0,
							'acfe_seamless_style' => 0,
							'acfe_clone_modal' => 0,
							'acfe_clone_modal_close' => 0,
							'acfe_clone_modal_button' => '',
							'acfe_clone_modal_size' => 'large',
						),
					),
					'min' => '',
					'max' => '',
					'acfe_flexible_thumbnail' => '',
					'acfe_flexible_render_template' => false,
					'acfe_flexible_render_style' => false,
					'acfe_flexible_render_script' => false,
					'acfe_flexible_settings' => false,
					'acfe_flexible_settings_size' => 'medium',
					'acfe_layout_locations' => array(
					),
					'acfe_flexible_modal_edit_size' => false,
					'acfe_flexible_category' => false,
					'acfe_layout_col' => 'auto',
					'acfe_layout_allowed_col' => false,
				),
			),
			'min' => '',
			'max' => '',
			'button_label' => 'Добавить блок',
			'acfe_field_group_condition' => 0,
			'acfe_flexible_layouts_previews' => false,
			'acfe_flexible_grid_container' => false,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array(
				'param' => 'post_category',
				'operator' => '==',
				'value' => 'category:articles',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'author',
		1 => 'comments',
		2 => 'discussion',
		3 => 'revisions',
		4 => 'the_content',
		5 => 'slug',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1728307296,
));

endif;