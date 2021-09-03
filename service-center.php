<?php

/*
Template Name: Сервисный центр
*/

?>

<?php get_header();
    the_post();
?>


<div class="wrapper pg-service-ct">
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


      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            
            <?php the_field("block1_text") ?>

          </div>
        </div>
      </section>

      <section class="we-chose">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Почему нас выбирают клиенты?</h2>
            </div>
            <div class="we-chose__items-wrapper slider_main-wrapper">
              <div class="we-chose__items__arrow-prev slider__arrow_main slider__arrow_main-prev">
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </div>
              <div class="we-chose__items__arrow-next slider__arrow_main slider__arrow_main-next">
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </div>
              <div class="we-chose__items-wrapper__inner">
                <div class="we-chose__items">

                <?php $advantages = get_field("advantages"); ?>

                <?php if ( !empty($advantages) ): ?>
                    <?php foreach ( $advantages as $advan ): ?>
                    
                    <div class="we-chose__item">
                        <div class="we-chose__item__text">
                        <div class="we-chose__item__text__title"><?php echo $advan['title']; ?></div>
                            <?php echo $advan['text']; ?>
                        </div>
                        <div class="we-chose__item__number-bg"></div>
                     </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part('template-parts/section_action') ?>

      <section class="tl-text tl-text_info">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">
                    <?php the_field('text_above_table_title') ?>
              </h2>
            </div>
                <?php the_field('text_above_table') ?>
            <br />
            <br />

            <?php $table = get_field("table"); ?>

            <?php if ( !empty($table) ): ?>
                
                <div class="table_default">
                    <div class="table__head">
                        <div class="table__item">
                        <div class="table__info">Продукт бренда</div>
                        <div class="table__val">Гарантийный срок</div>
                        </div>
                    </div>

                    <div class="table__body">

                    <?php foreach ( $table as $col ): ?>

                        <div class="table__item">
                            <div class="table__info"><?php echo $col['name'] ?></div>
                            <div class="table__val">
                                <span class="table__val__name">Гарантийный срок</span>
                                <span><?php echo $col['time'] ?></span>
                            </div>
                        </div>

                    <?php endforeach; ?>
                      
                    </div>
                </div>

            <?php endif; ?>

            
          </div>
        </div>
      </section>

      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd"><?php the_field('text_under_table_title') ?></h2>
            </div>
                <?php the_field('text_under_table') ?>
          </div>
        </div>
      </section>

      <section class="tl-text section_gray">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd"> <?php the_field('text_above_map_title') ?></h2>
            </div>

            <?php the_field('text_above_map') ?>

          </div>
        </div>
      </section>

      <section class="warranty">
        <div class="container_section-wrapper">
          <div class="warranty__inner container_section">
            <div class="warranty__content">
              <div class="section__head">
                <h2 class="section__title section__title_bd">
                    <?php the_field('text_map') ?>
                </h2>
              </div>
              <div class="warranty__content__info">
                <div class="warranty__content__info__call">
                  <div class="main-controls-item">
                    <div class="main-controls-item__icon-wrapper">
                      <svg class="icon">
                        <use xlink:href="#icon-phone-stroke"></use>
                      </svg>
                    </div>
                    <div class="main-controls-item__content">
                    <a href="tel:+<?php echo preg_replace('/[^0-9]/', '', get_field('phone', 'theme-general-settings')); ?>"><?php the_field('phone', 'theme-general-settings') ?></a>
                    </div>
                  </div>
                  <a href="#" class="btn btn_default getCallRequestModal-js">Заказать звонок</a>
                </div>
                <div class="main-controls-item">
                  <div class="main-controls-item__icon-wrapper">
                    <svg class="icon">
                      <use xlink:href="#icon-mail-stroke"></use>
                    </svg>
                  </div>
                  <div class="main-controls-item__content">
                  <a href="mailto:<?php the_field('mail', 'theme-general-settings'); ?>"><?php the_field('mail', 'theme-general-settings'); ?></a>
                  </div>
                </div>
                <div class="main-controls-item">
                  <div class="main-controls-item__icon-wrapper">
                    <svg class="icon">
                      <use xlink:href="#icon-mark-stroke"></use>
                    </svg>
                  </div>
                  <div class="main-controls-item__content">
                    <?php the_field('adress', 'theme-general-settings'); ?>
                  </div>
                </div>
                <div class="main-controls-item main-controls-item-schedule">
                  <div class="main-controls-item__icon-wrapper">
                    <svg class="icon">
                      <use xlink:href="#icon-clock"></use>
                    </svg>
                  </div>
                  <div class="main-controls-item__content">
                     <?php the_field('work_days', 'theme-general-settings'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="warranty__map">
              <div class="map-wrapper">
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>