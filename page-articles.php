<?php
/**
 * Template name: Статьи
 */

if( get_theme_mod( 'about-start-img-color-text' ) === 'normal' ){
    get_header();
}else{
    get_header('','about__header__bottom');
}

?>

<div class="container">
    <?php        
    $sliderComment = new WP_Query( array(
        'posts_per_page'   => -1,
        'orderby'       => 'date',
        'order'         => 'ASC',
        'post_type'     => 'post'
    ) );

    while ($sliderComment->have_posts()) :
        $sliderComment->the_post();
    ?>
        <div class="feedback__img__el">
            <div class="img-cover">
                <img class="img-cover__img" width="200px" height="200px" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'thumbnails' ); ?>" alt="Slide 1">
            </div>
            <div class="feedback__text__el">
                <cite class="el-name medium-ninteen"><?php the_title(); ?></cite>
                <div class="el-description regular-fiveteen"><?php the_content(); ?></div>
                <a href="<?php the_permalink(); ?>">view</a>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
</div>

<?php
get_footer();
?>