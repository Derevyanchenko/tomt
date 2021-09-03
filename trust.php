<?php

/*
Template Name: Нам доыеряют
*/

?>

<?php get_header();
    the_post();
?>

<div class="wrapper pg-trust pg-tl">
      <section class="section-banner">
        <div class="section-banner__inner">
          <div class="container_section-wrapper">
            <div class="container_section">
              <div class="section__head">
                <h2 class="section__title section__title_bd"><?php the_title(); ?></h2>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="bread-crumbs">
        <div class="container_section-wrapper">
          <div class="container_section">
            <ul>
            <li><a href="<?php echo home_url(); ?>">Главная</a></li>
                <li><span><?php the_title(); ?></span></li>
            </ul>
          </div>
        </div>
      </div>

      <section class="partners">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="partners__items">

                <?php $enterprises = get_field("enterprises"); ?>

                <?php if ( !empty($enterprises) ): ?>
                    <?php foreach ( $enterprises as $item ): ?>
                    
                    <div class="partners__item">
                        <img src="<?php echo $item['img']; ?>" alt="1" />
                        <div class="partners__item__info">
                        <span><?php echo $item['title']; ?> - </span>
                        <?php echo $item['text']; ?>
                        </div>
                    </div>

                  <?php endforeach; ?>
                <?php endif; ?>

            </div>
          </div>
        </div>
      </section>

      <section class="letters">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Благодарственные письма</h2>
            </div>
            <div class="letters__desc">
                <?php the_field('letter_top'); ?>
            </div>
            <div class="letters__items-wrapper slider_main-wrapper">
              <div class="letters__items">

              <?php $letters = get_field("letters"); ?>

              <?php if ( !empty($letters) ): ?>
                  <?php foreach ( $letters as $letter ): ?>

                    <div class="letters__item">
                      <img src="<?php echo $letter['img']; ?>" alt="1" />
                    </div>

                <?php endforeach; ?>
              <?php endif; ?>
            
              </div>
              <div class="letters__items__arrow-prev slider__arrow_main slider__arrow_main-prev">
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </div>
              <div class="letters__items__arrow-next slider__arrow_main slider__arrow_main-next">
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

<?php get_footer(); ?>