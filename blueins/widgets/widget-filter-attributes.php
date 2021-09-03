<?php
/**
 * Product Attributes Filter Widget.
 */

/**
 * Widget filter attributes class.
 */
class Blueins_Widget_Filter_Attributes extends WC_Widget{

    public function __construct(){
        $this->widget_cssclass    = 'blu_woocommerce widget_product_attributes';
		$this->widget_description = 'Виджет выводит доступные атрибуты товара';
		$this->widget_id          = 'blu_woocommerce_product_attributes';
		$this->widget_name        = 'Blueins Фильтрация товаров по артибутам';
		$this->settings           = array(
			'title' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Title', 'woocommerce' ),
			),
            'tax' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Tax', 'woocommerce' ),
			),
            'show_option' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Show_option', 'woocommerce' ),
			),
            'name' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Name', 'woocommerce' ),
			),
		);

		parent::__construct();
    }

    // View in user site
    public function widget($args, $instance){
        //print_r($instance);
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $dropdown = wp_dropdown_categories("taxonomy=". $tax ."&echo=0&show_option_none=". $show_option ."&name=". $name);

        echo $before_widget;
        echo $before_title . $title . $after_title;
        ?>

        <div class="item_nav">
            <div class="variations">
                <div class="variations__selects">
                    <label for="<?php echo esc_attr( sanitize_title( $tax ) ); ?>">
                        <?php echo wc_attribute_label( $tax ); // WPCS: XSS ok. ?>
                    </label>
                    <?php echo $dropdown; ?>
                </div>
                <div class="details__colors">
                    <ul id="setElementHere__<?php echo esc_attr( sanitize_title( $tax ) ); ?>" class="details__colors__list"></ul>
                </div>
            </div>
        </div>

        <?php
    }

    // View in admin panel
    public function form( $instance ){
        extract( $instance );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php if( isset($title) ) echo esc_attr($title); ?>" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tax'); ?>">Какой атрибут показывать</label>
            <input id="<?php echo $this->get_field_id('tax'); ?>" class="widefat" value="<?php if( isset($tax) ) echo esc_attr($tax); ?>" name="<?php echo $this->get_field_name('tax'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_option'); ?>">Название опции</label>
            <input id="<?php echo $this->get_field_id('show_option'); ?>" class="widefat" value="<?php if( isset($show_option) ) echo esc_attr($show_option); ?>" name="<?php echo $this->get_field_name('show_option'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>">Имя</label>
            <input id="<?php echo $this->get_field_id('name'); ?>" class="widefat" value="<?php if( isset($name) ) echo esc_attr($name); ?>" name="<?php echo $this->get_field_name('name'); ?>">
        </p>
        <?php
    }

}