<?php

class Blu_Widget_Active_Taxonomy extends WP_Widget{

    function __construct(){
        $args = array(
            'name' => 'Виджет Активной Категории',
            'description' => 'Выводит активную таксономи',
            'classname' => 'blu-active-taxonomy'
        );

        parent::__construct( 'blu-active-taxonomy', '', $args );
    }

    public function widget($args, $instance){
        extract($args);
        extract($instance);

        if( is_tax() ){
            $active_taxonomy = get_queried_object()->term_id;
            $tax = get_term($active_taxonomy, '',ARRAY_A);
        }
        $title = apply_filters('widget_title', $title);

        echo $before_widget;
        echo $before_title . $title . $after_title;
        ?>
            <div class="item__nav">
                <ul class="product-categories">
                    <li class="cat-item cat-item-<?php echo $active_taxonomy; ?>">
                        <a href="#"><?php echo $tax['name']; ?></a>
                    </li>
                </ul>
            </div>
        <?php
        echo $after_widget;
    }

    public function form($args){
        extract($args);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php if( isset($title) ) echo esc_attr($title); ?>" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
        <?php
    }

}