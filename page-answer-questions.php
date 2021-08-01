<?php
/**
 * Template name: Ответы на вопросы
 **/

if( get_theme_mod( 'aq-start-img-color-text' ) === 'normal' ){
   get_header();
}else{
   get_header('','about__header__bottom');
}

//style="background: url('<?php echo get_theme_mod( 'aq-start-img-upload' );?') center/cover no-repeat; "
?>



    <main class="main">
    <!-- Main -->

      <section class="ansQuest__start-img <?php if( get_theme_mod( 'aq-start-img-color-text' ) === 'normal' ){ echo 'start-img-white-color'; }else{ echo 'start-img-dark-color'; } ?>">
         <div class="ansQuest__start__cover">
            <img id="parallax_img" class="ansQuest__start__cover__img" src="<?php echo get_theme_mod('aq-start-img-upload'); ?>">
         </div>
         <div class="ansQuest__start__content">
            <div class="container">
               <div class="row">
                  <div class="ansQuest__start-img__content">
                     <h1 class="h1-style"><?php the_title(); ?></h1>
                     <div class="start-img__breadcrumbs">
                        <div class="details__breadcrumbs">
                           <?php woocommerce_breadcrumb(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section class="first-video <?php echo get_field('aq-section-hash-1'); ?>">
          <div class="container">
            <div class="section-title">
                <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-1'); ?></h2>
            </div>
            <div class="first-video__content">
               <div class="first-video__content__plane regular-fiveteen" data-aos="fade-up"  data-aos-delay="0">
                  <?php echo get_field('aq-section-describtion-1'); ?>
               </div>
                <div class="first-video__content__frame">
                  <img src="<?php echo get_field('aq-media-1'); ?>">
                </div>
            </div>
          </div>
      </section>
      

      <section class="text-block <?php echo get_field('aq-section-hash-2'); ?>">
         <div class="small-container">
            <div class="section-title">
               <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-2'); ?></h2>
            </div>
            <div class="text-block__content" data-aos="fade-up"  data-aos-delay="0">
               <div class="text-block__content__text regular-fiveteen">
                  <?php echo get_field('aq-section-describtion-2'); ?>
               </div>
            </div>
         </div>
      </section>


      <section class="mixed-block <?php echo get_field('aq-section-hash-3'); ?>">
         <div class="container">
            <div class="section-title">
               <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-3'); ?></h2>
            </div>
            <div class="mixed-block__item" data-aos="fade-up"  data-aos-delay="0">
               <div class="mixed-block__item__text regular-fiveteen">
                  <?php echo get_field('aq-section-describtion-3'); ?>
               </div>
            </div>
            <div class="mixed-block__item mixed-block__frame">
               <div class="mixed-block__item__frame">
                  <img src="<?php echo get_field('aq-media-3'); ?>">
               </div>
               <div class="mixed-block__item__plane regular-fiveteen" data-aos="fade-up"  data-aos-delay="100">
                  <?php echo get_field('aq-section-describtion-3-2'); ?>
               </div>
            </div>
            <div class="mixed-block__item" data-aos="fade-up"  data-aos-delay="200">
               <div class="mixed-block__item__text regular-fiveteen">
                  <?php echo get_field('aq-section-describtion-3-3'); ?>
               </div>
            </div>
         </div>
      </section>


      <section class="text-block <?php echo get_field('aq-section-hash-4'); ?>">
         <div class="small-container">
            <div class="section-title">
               <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-4'); ?></h2>
           </div>
           <div class="text-block__content" data-aos="fade-up"  data-aos-delay="0">
              <div class="text-block__content__text regular-fiveteen">
               <?php echo get_field('aq-section-describtion-4'); ?>
              </div>
           </div>
         </div>
      </section>


      <section class="text-block <?php echo get_field('aq-section-hash-5'); ?>">
         <div class="small-container">
            <div class="section-title">
               <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-5'); ?></h2>
           </div>
           <div class="text-block__content" data-aos="fade-up"  data-aos-delay="0">
              <div class="text-block__content__text regular-fiveteen">
               <?php echo get_field('aq-section-describtion-5'); ?>
              </div>
           </div>
         </div>
      </section>


      <section class="mixed-block <?php echo get_field('aq-section-hash-6'); ?>">
         <div class="container">
            <div class="section-title">
               <h2 class="section-text__title h2-style"><?php echo get_field('aq-section-title-6'); ?></h2>
            </div>
            <div class="mixed-block__item mixed-block__frame">
               <div class="mixed-block__item__frame">
                  <img src="<?php echo get_field('aq-media-6'); ?>">
               </div>
               <div class="mixed-block__item__plane regular-fiveteen" data-aos="fade-up"  data-aos-delay="0">
                  <?php echo get_field('aq-section-describtion-6'); ?>
               </div>
            </div>
         </div>
      </section>


    <!-- Main -->
    </main>


<?php get_footer(); ?>