<?php

add_action( 'customize_register', 'customizer_init' );
add_action( 'wp_head', 'customizer_style_tag' );

function customizer_init( WP_Customize_Manager $wp_customize ){

	// как обновлять превью сайта:
	// 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
	// 'postMessage' - отправкой AJAX запроса
	$transport = 'refresh';


	/*// Секция
	if( 'базовая - colors' ){

		// настройка
		$setting = 'link_color';

		$wp_customize->add_setting( $setting, [
			'default'     => '#000000',
			'transport'   => $transport
		] );

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, $setting, [
				'label'    => 'Цвет ссылок',
				'section'  => 'colors',
				'settings' => $setting
			] )
		);

    }*/
    
    if( $section = 'time_phone' ){

        $wp_customize->add_section( $section, [
            'title' => 'Доп. информация',
            'priority' => 100,
            'description' => 'Дополнительная информация магазина'
        ]);


        $setting = 'phone_header';

		$wp_customize->add_setting( $setting, [
			'default'            => '+375 99 999 99 99',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Номер телефона',
			'type'     => 'text' // текстовое поле
        ]) );
        

        $setting = 'time_header';

		$wp_customize->add_setting( $setting, [
			'default'            => 'c 9:00 до 17:00 (пн-пт)',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Время работы',
			'type'     => 'text' // текстовое поле
        ] );
        

        $setting = 'vk_header';

		$wp_customize->add_setting( $setting, [
			'default'            => '#',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Ссылка на страницу ВКонтакте',
			'type'     => 'text' // текстовое поле
        ] );


        $setting = 'facebook_header';

		$wp_customize->add_setting( $setting, [
			'default'            => '#',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Ссылка на страницу Facebook',
			'type'     => 'text' // текстовое поле
        ] );
        

        $setting = 'instagram_header';

		$wp_customize->add_setting( $setting, [
			'default'            => '#',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Ссылка на страницу Instagram',
			'type'     => 'text' // текстовое поле
        ] );


		$setting = 'odnoclassnike_header';

		$wp_customize->add_setting( $setting, [
			'default'            => '#',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Ссылка на страницу Однокласники',
			'type'     => 'text' // текстовое поле
        ] );

		/**
		 * Subscribe Settings
		 */

		$setting = 'email_footer_header';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Подпишитесь :)',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Заголовок подписки на рассылку.',
			'type'     => 'text' // текстовое поле
        ] );

		$setting = 'email_footer_description';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Подпишитесь и получайте больше скидок на весь ассортимент наших товаров!',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Описание подписки на рассылку.',
			'type'     => 'textarea' // текстовое поле
        ] );

		/**
		 * Subscribe Settings
		 */

		$setting = 'email_footer_header';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Подпишитесь :)',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Заголовок подписки на рассылку.',
			'type'     => 'text' // текстовое поле
        ] );

		$setting = 'email_footer_description';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Подпишитесь и получайте больше скидок на весь ассортимент наших товаров!',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Описание подписки на рассылку.',
			'type'     => 'textarea' // текстовое поле
        ] );

		/**
		 * Footer Settings
		 */

		$setting = 'section_footer';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Покупателям | Информация | Магазин | Социальные сети',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Напишите названия секций подвала, через " | ". Максимально 4',
			'type'     => 'textarea' // текстовое поле
        ] );


		$setting = 'text_social_footer';

		$wp_customize->add_setting( $setting, [
			'default'            => 'И получите бесплатную доставку для всех ваших заказов!',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Пояснительный текст для блока социальных сетей в подвале сайта.',
			'type'     => 'textarea' // текстовое поле
        ] );


		$setting = 'owner_information_footer';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Предприниматель Blueins.by',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Информация о владельце в подвале сайта.',
			'type'     => 'textarea' // текстовое поле
        ] );


		$setting = 'copyright_footer';

		$wp_customize->add_setting( $setting, [
			'default'            => '©2020 — Все права защищены',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'time_phone', // id секции
			'label'    => 'Копирайт в подвале сайта.',
			'type'     => 'text' // текстовое поле
        ] );

        

    }


	/**
	 * Custom Shop Page
	 */
	if( $section = 'shop-customize' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка страницы магазина',
            'priority' => 110,
            'description' => 'Настройка элементов страницы магазина.'
        ]);

		$setting = 'shop-start-img-upload';

		$wp_customize->add_setting( $setting, array(
			'default' => '', // Add Default Image URL 
			'sanitize_callback' => 'esc_url_raw'
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control1', array(
			'label' => 'Загрузить фоновое изображение',
			'priority' => 20,
			'section' => $section,
			'settings' => $setting,
			'button_labels' => array(// All These labels are optional
						'select' => 'Выбрать изображение',
						'remove' => 'Удалить изображение',
						'change' => 'Изменить изображение',
						)
		)));
	 

		$setting = 'shop-start-img-color-text';

		$wp_customize->add_setting( $setting, [
			'default'   => 'normal',
			'transport' => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section,
			'label'    => 'Цвет текста',
			'type'     => 'radio',
			'choices'  => [
				'normal'    => 'Белый',
				'inverse'   => 'Темный',
			]
		] );


		$setting = 'shop_category_id_view';

		$wp_customize->add_setting( $setting, [
			'default'            => '',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'shop-customize', // id секции
			'label'    => 'ID категорий которые нужно показать.',
			'type'     => 'text' // текстовое поле
        ] );
         

    }

	/**
	 * Custom Contact Page
	 */
	if( $section = 'contact-customize' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка страницы контактов',
            'priority' => 110,
            'description' => 'Настройка элементов страницы контактов.'
        ]);

		$setting = 'contact-start-img-upload';

		$wp_customize->add_setting( $setting, array(
			'default' => '', 
			'sanitize_callback' => 'esc_url_raw'
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control2', array(
			'label' => 'Загрузить фоновое изображение',
			'priority' => 20,
			'section' => $section,
			'settings' => $setting,
			'button_labels' => array(// All These labels are optional
						'select' => 'Выбрать изображение',
						'remove' => 'Удалить изображение',
						'change' => 'Изменить изображение',
						)
		)));
	 

		$setting = 'contact-start-img-color-text';

		$wp_customize->add_setting( $setting, [
			'default'   => 'normal',
			'transport' => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section,
			'label'    => 'Цвет текста',
			'type'     => 'radio',
			'choices'  => [
				'normal'    => 'Белый',
				'inverse'   => 'Темный',
			]
		] );
         

    }

	/**
	 * Custom About Page
	 */
	if( $section = 'about-customize' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка страницы о компании',
            'priority' => 110,
            'description' => 'Настройка элементов страницы о компании.'
        ]);

		$setting = 'about-start-img-upload';

		$wp_customize->add_setting( $setting, array(
			'default' => '', 
			'sanitize_callback' => 'esc_url_raw'
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control3', array(
			'label' => 'Загрузить фоновое изображение',
			'priority' => 20,
			'section' => $section,
			'settings' => $setting,
			'button_labels' => array(// All These labels are optional
						'select' => 'Выбрать изображение',
						'remove' => 'Удалить изображение',
						'change' => 'Изменить изображение',
						)
		)));
	 

		$setting = 'about-start-img-color-text';

		$wp_customize->add_setting( $setting, [
			'default'   => 'normal',
			'transport' => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section,
			'label'    => 'Цвет текста',
			'type'     => 'radio',
			'choices'  => [
				'normal'    => 'Белый',
				'inverse'   => 'Темный',
			]
		] );
         

    }


	/**
	 * Custom Answear Question Page
	 */
	if( $section = 'answear_question-customize' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка страницы ответы на вопросы',
            'priority' => 110,
            'description' => 'Настройка элементов страницы ответы на вопросы.'
        ]);

		$setting = 'aq-start-img-upload';

		$wp_customize->add_setting( $setting, array(
			'default' => '', 
			'sanitize_callback' => 'esc_url_raw'
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control4', array(
			'label' => 'Загрузить фоновое изображение',
			'priority' => 20,
			'section' => $section,
			'settings' => $setting,
			'button_labels' => array(// All These labels are optional
						'select' => 'Выбрать изображение',
						'remove' => 'Удалить изображение',
						'change' => 'Изменить изображение',
						)
		)));
	 

		$setting = 'aq-start-img-color-text';

		$wp_customize->add_setting( $setting, [
			'default'   => 'normal',
			'transport' => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section,
			'label'    => 'Цвет текста',
			'type'     => 'radio',
			'choices'  => [
				'normal'    => 'Белый',
				'inverse'   => 'Темный',
			]
		] );
         

    }


	/**
	 * Custom 404 Page
	 */
	if( $section = '404-page' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка страницы 404',
            'priority' => 110,
            'description' => 'Настройка элементов страницы 404.'
        ]);

		$setting = '404-start-img-color-text';

		$wp_customize->add_setting( $setting, [
			'default'   => 'normal',
			'transport' => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section,
			'label'    => 'Цвет текста',
			'type'     => 'radio',
			'choices'  => [
				'normal'    => 'Белый',
				'inverse'   => 'Темный',
			]
		] );

		$setting = '404-start-text';

		$wp_customize->add_setting( $setting, [
			'default'            => 'Страница не найдена!',
			'sanitize_callback'  => 'sanitize_text_field',
			'transport'          => $transport
		] );

		$wp_customize->add_control( $setting, [
			'section'  => $section, // id секции
			'label'    => 'Текст для пользователя.',
			'type'     => 'textarea' // текстовое поле
        ] );
         

    }



	/**
	 * Custom Cart Page
	 */
	if( $section = 'blu-cart-customize' ){

        $wp_customize->add_section( $section, [
            'title' => 'Настройка корзины',
            'priority' => 110,
            'description' => 'Настройка элементов страницы корзины.'
        ]);

		$setting = 'cart-empty-start-img-upload';

		$wp_customize->add_setting( $setting, array(
			'default' => '', 
			'sanitize_callback' => 'esc_url_raw'
		));
	 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control5', array(
			'label' => 'Загрузить изображение пустой корзины',
			'priority' => 20,
			'section' => $section,
			'settings' => $setting,
			'button_labels' => array(// All These labels are optional
						'select' => 'Выбрать изображение',
						'remove' => 'Удалить изображение',
						'change' => 'Изменить изображение',
						)
		)));
         

    }

}


function customizer_style_tag(){

	$style = [];

	$body_styles = [];

	switch( get_theme_mod( 'font' ) ){
		case 'arial':
			$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
			break;
		case 'courier':
			$body_styles[] = 'font-family: "Courier New", Courier;';
			break;
		default:
			$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
			break;
	}

	if( 'inverse' === get_theme_mod( 'color_scheme' ) )
		$body_styles[] = 'background-color:#000; color:#fff;';
	else
		$body_styles[] = 'background-color:#fff; color:#000;';

	if( $bg_image = get_theme_mod( 'bg_image' ) ){
		$body_styles[] = "background-image: url( '$bg_image' );";
	}

	$style[] = 'body { '. implode( ' ', $body_styles ) .' }';

	$style[] = 'a { color: ' . get_theme_mod( 'link_color' ) . '; }';

	if( ! get_theme_mod( 'display_header' ) )
		$style[] = '#header { display: none; }';

	echo "<style>\n" . implode( "\n", $style ) . "\n</style>\n";
}