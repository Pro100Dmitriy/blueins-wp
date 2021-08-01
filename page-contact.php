<?php
/**
 * Template name: Контакты
 **/

if( get_theme_mod( 'contact-start-img-color-text' ) === 'normal' ){
    get_header();
}else{
    get_header('','about__header__bottom');
}

//style="background: url('<?php echo get_theme_mod( 'contact-start-img-upload' );') center/cover no-repeat; "
?>

    <main class="main">
        <!-- Main -->

        <section class="contact__start-img <?php if( get_theme_mod( 'contact-start-img-color-text' ) === 'normal' ){ echo 'start-img-white-color'; }else{ echo 'start-img-dark-color'; } ?>">
            <div class="contact__start-img__cover">
                <img id="parallax_img" class="contact__start-img__cover__img" src="<?php echo get_theme_mod('contact-start-img-upload'); ?>">
            </div>
            <div class="contact__start-img__cover__content">
                <div class="container">
                    <div class="row">
                        <div class="contact__start-img__content">
                            <h1 class="h1-style"><?php the_title(); ?></h1>
                            <div class="contact-start-img__breadcrumbs">
                                <div class="details__breadcrumbs">
                                    <?php woocommerce_breadcrumb(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


      <section class="information">
          <div class="small-container">
            <div class="section-title">
                <h2 class="section-text__title h2-style"><?php echo get_field('contact-first-title'); ?></h2>
                <p class="seciton-text__description regular-fiveteen"><?php echo get_field('contact-first-title-describrion'); ?></p>
            </div>
            <div class="information__content">
                <ul class="information__content__list">
                    <?php if( get_field('contact-first-phone') ): ?>
                        <li class="information__content__list__item inf-phone" data-aos="fade-up"  data-aos-delay="0">
                            <p class="inf-title">Телефон</p>
                            <?php
                                $phonArr = explode( ' | ', get_field('contact-first-phone') );
                                foreach( $phonArr as $index => $phone ) :
                            ?>
                            <a href="tel:<?php echo $phone; ?>"><span><?php echo $phone; ?></span></a></br>
                            <?php
                                endforeach;
                            ?>
                        </li>
                    <?php endif; ?>
                    <?php if( get_field('contact-first-email') ): ?>
                        <li class="information__content__list__item inf-email" data-aos="fade-up"  data-aos-delay="100">
                            <p class="inf-title">Email</p>
                            <a href="mailto:<?php echo get_field('contact-first-email'); ?>"><?php echo get_field('contact-first-email'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_field('contact-first-time_work') ): ?>
                        <li class="information__content__list__item inf-time" data-aos="fade-up"  data-aos-delay="200">
                            <p class="inf-title">Время работы</p>
                            <span><?php echo get_field('contact-first-time_work'); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
          </div>
      </section>

      <section class="information">
        <div class="small-container">
          <div class="section-title">
              <h2 class="section-text__title h2-style"><?php echo get_field('contact-second-title'); ?></h2>
              <p class="seciton-text__description regular-fiveteen"><?php echo get_field('contact-second-title-describrion'); ?></p>
          </div>
          <div class="information__content">
              <ul class="information__content__list">
              <?php if( get_field('contact-second-phone') ): ?>
                        <li class="information__content__list__item inf-phone" data-aos="fade-up"  data-aos-delay="0">
                            <p class="inf-title">Телефон</p>
                            <?php
                                $phonArr = explode( ' | ', get_field('contact-second-phone') );
                                foreach( $phonArr as $index => $phone ) :
                            ?>
                            <a href="tel:<?php echo $phone; ?>"><span><?php echo $phone; ?></span></a></br>
                            <?php
                                endforeach;
                            ?>
                        </li>
                    <?php endif; ?>
                    <?php if( get_field('contact-second-email') ): ?>
                        <li class="information__content__list__item inf-email" data-aos="fade-up"  data-aos-delay="100">
                            <p class="inf-title">Email</p>
                            <a href="mailto:<?php echo get_field('contact-second-email'); ?>"><?php echo get_field('contact-second-email'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if( get_field('contact-second-time_work') ): ?>
                        <li class="information__content__list__item inf-time" data-aos="fade-up"  data-aos-delay="200">
                            <p class="inf-title">Время работы</p>
                            <span><?php echo get_field('contact-second-time_work'); ?></span>
                        </li>
                    <?php endif; ?>
              </ul>
          </div>
        </div>
    </section>

    <section class="question-form footer-marg">
        <div class="small-container">
            <div class="section-title">
                <h2 class="section-text__title h2-style"><?php echo get_field('contact-support-form-title'); ?></h2>
            </div>
            <div class="question-form__content" data-aos="fade-up"  data-aos-delay="0">
                <!--form class="comment-form" method="POST" action="/">
                    <p class="comments-notes">Поля помеченные <small>*</small> обязательны для заполнения.</p>
                    <div class="comments__email-name"> 
                        <p class="el-input comments-name">
                            <label class="el-input__label">Имя*</label>
                            <input class="el-input__field" type="text" placeholder="" required>
                        </p>
                        <p class="el-input comments-email">
                            <label class="el-input__label">Email*</label>
                            <input class="el-input__field" type="text" placeholder="" required>
                        </p>
                        <p class="el-input comments-phone">
                            <label class="el-input__label">Ваш телефон *</label>
                            <input class="el-input__field" type="text" placeholder="" required>
                        </p>
                    </div>
                    <p class="el-input comments-textarea">
                        <label class="el-input__label">Ваше сообщение*</label>
                        <textarea class="el-input__field" name="comment" cols="45" rows="8" required></textarea>
                    </p>
                    <button class="el-form__button">Отправить</button>
                </form-->
                <?php echo do_shortcode('[contact-form-7 id="520" title="Службы поддержки"]'); ?>
            </div>
          </div>
    </section>
      


    <!-- Main -->
    </main>


<?php get_footer(); ?>