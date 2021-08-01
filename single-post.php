<?php
/**
 * Template name: Одиночная запись
 */

if( get_theme_mod( 'about-start-img-color-text' ) === 'normal' ){
    get_header();
}else{
    get_header('','about__header__bottom');
}

?>
<img class="img-cover__img" width="1920px" height="800px" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="Slide 1">
<div class="container">
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    
    <?php if($user_ID):?>
        <h3>Добавить комментарий</h3>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post">
            <p>
                <label>Текст комментария (обязательно)</label>
                <textarea name="comment" id="comment" rows="5" cols="5" required></textarea>
                <br />
                <input class="button" type="submit" value="Добавить" />
        </p>
        <?php comment_id_fields();
        do_action('comment_form', $post->ID); ?>
        </form>
    <?php else:?>
        <h3>Добавить комментарий</h3>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post">
            <p>
                <label>Имя (обязательно)</label>
                <input name="author" id="author" value=" " type="text" size="30" alt="Name" required />
                <label>Email (обязательно)</label>
                <input name="email" id="email" value=" " type="text" size="30" alt="Email" required />
                <label>Текст комментария (обязательно)</label>
                <textarea name="comment" id="comment" rows="5" cols="5" required></textarea>
                <br />
                <input class="button" type="submit" value="Добавить" />
            </p>
            <?php
            comment_id_fields();
            do_action('comment_form', $post->ID);
            ?>
        </form>
    <?php endif; ?>

    <h3>Комментарий</h3>
    <ul>
        <?php
        $args = array(
            'author_email'        => '',
            'author__in'          => '',
            'author__not_in'      => '',
            'include_unapproved'  => '',
            'fields'              => '',
            'comment__in'         => '',
            'comment__not_in'     => '',
            'karma'               => '',
            'number'              => '',
            'offset'              => '',
            'no_found_rows'       => true,
            'orderby'             => '',
            'order'               => 'DESC',
            'parent'              => '',
            'post_author__in'     => '',
            'post_author__not_in' => '',
            'post_id'             => $post->ID,
            'post__in'            => '',
            'post__not_in'        => '',
            'post_author'         => '',
            'post_name'           => '',
            'post_parent'         => '',
            'post_status'         => '',
            'post_type'           => '',
            'status'              => 'all',
            'type'                => '',
            'type__in'            => '',
            'type__not_in'        => '',
            'user_id'             => '',
            'search'              => '',
            'count'               => false,
            'meta_key'            => '',
            'meta_value'          => '',
            'meta_query'          => '',
            'date_query'          => null, // See WP_Date_Query
            'hierarchical'        => false,
            'update_comment_meta_cache'  => true,
            'update_comment_post_cache'  => false,
        );
        $comments = get_comments($args);
        foreach( $comments as $comment ){
            echo $comment->comment_author;
            echo $comment->comment_content . '<br><br><br>';
            //print_r($comment);
            //echo $comment['comment_author'];
            //echo $comment['comment_content'];
        }
        ?>
    </ul>
</div>

<?php
get_footer();