<?php

/*
Template Name: О нас
*/

?>

<?php get_header();
    the_post();
?>

<div class="wrapper pg-about">

      <section class="section-banner">
        <div class="section-banner__inner">
          <div class="container_section-wrapper">
            <div class="container_section">
              <div class="section__head">
                <h2 class="section__title section__title_bd"><span><?php the_title(); ?></span></h2>
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

      <section class="priorities section_gray">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Наши приоритеты</h2>
            </div>
            <div class="priorities__items">

            <?php $priority = get_field("priority"); ?>

            <?php if ( !empty($priority) ): ?>
                <?php foreach ( $priority as $p ): ?>

                <div class="priorities__item">
                    <div class="priorities__item__img-wrapper">
                        <img src="<?php echo $p['icon']; ?>" alt="">
                    </div>
                    <div class="priorities__item__title"><?php echo $p['text']; ?></div>
              </div>

                <?php endforeach; ?>
            <?php endif; ?>  

            </div>
            <div class="priorities__content">
              <div class="priorities__content__item">
                <div class="priorities__content__item__img-wrapper">
                  <img src="<?php the_field('pririty_img') ?>" alt="1" />
                </div>
                <div class="priorities__content__item__desc">

                <?php the_field('priority_text_right') ?>

                  <!-- <div class="priorities__content__item__title">
                    Клиентами сервисного цента являются многие ведущие российские медицинские центры
                  </div>
                  <div class="priorities__content__item__info more-text-wrapper-js">
                    <div class="priorities__content__item__info__text more-text-js">
                      <p>
                        Бюджетные и торгующие организации, а также частные клиники и разнообразные салоны красоты
                        которые обращаются к нам за помощью. Именно поэтому нашей основной задачей является предоставить
                        качественный ремонт и обслуживание медицинской техники, так как её неисправность при
                        эксплуатации может стоить многих жизней. Сервисная служба «ТОМТ» динамично развивается. Мы ведем
                        наблюдение за всеми аспектами нашей отрасли. В своей работе при диагностике и ремонте Мы
                        используем самые передовые методы и технологии, что позволяет нашим клиентам быть уверенными в
                        качестве предоставляемых им услуг.
                      </p>
                    </div>
                    <a
                      href="#"
                      class="priorities__content__item__info__more read-more-js"
                      data-more="Читать полностью"
                      data-less="Скрыть"
                    >
                      <span>Читать полностью</span>
                      <svg class="icon icon-arrow">
                        <use xlink:href="#icon-arrow"></use>
                      </svg>
                    </a>
                  </div> -->
                </div>
              </div>
              <div class="priorities__content__item">
                <div class="priorities__content__item__desc">

                    <?php the_field('priority_text_bottom') ?>

                  <!-- <div class="priorities__content__item__title">
                    Компания «ТОМТ» - это лицензированный высокотехнологичный сервисный центр.
                  </div>
                  <div class="priorities__content__item__info more-text-wrapper-js">
                    <div class="priorities__content__item__info__text more-text-js">
                      <p>
                        Мы – это многолетний опыт в сфере ремонта, диагностики, а также профилактики медицинского
                        оборудования. Наши инженеры являются экспертами в сфере ремонта и обслуживания медицинского и
                        косметологического оборудования. Сотрудники компании «ТОМТ» постоянно проходят курсы повышения
                        квалификации и являются сертифицированными специалистами. Наш сервисный центр располагает всем
                        высокотехнологичным современным оборудованием, которое помогает оперативно диагностировать и
                        устранить проблему любой сложности.
                      </p>
                    </div>
                    <a
                      href="#"
                      class="priorities__content__item__info__more read-more-js"
                      data-more="Читать полностью"
                      data-less="Скрыть"
                    >
                      <span>Читать полностью</span>
                      <svg class="icon icon-arrow">
                        <use xlink:href="#icon-arrow"></use>
                      </svg>
                    </a>
                  </div> -->
                </div>

                <div class="about__license">
                    <?php get_template_part("template-parts/licensies") ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="why-we section-banner">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Почему мы?</h2>
            </div>
          </div>
        </div>
        <div class="why-we__items-wrapper">
          <div class="container_section-wrapper">
            <div class="container_section">
              <div class="slider_main-wrapper">
                <div class="why-we__items">

                <?php $why_us = get_field("why_us"); ?>

                <?php if ( !empty($why_us) ): ?>
                    <?php foreach ( $why_us as $key => $why ): ?>

                    <div class="why-we__item">
                        <div class="why-we__item__number-main"></div>
                        <div class="why-we__item__text"><?php echo $why['text']; ?></div>
                        <div class="why-we__item__number-bg"></div>
                    </div>

                    <?php endforeach; ?>
                <?php endif; ?>  

                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="scheme-work section_gray">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Схема работы компании «ТОМТ»</h2>
            </div>
          </div>
        </div>
        <div class="scheme-work__items-wrapper">
          <div class="container_section-wrapper">
            <div class="container_section">
              <div class="scheme-work__items">

              <?php $scheme = get_field("scheme"); ?>

              <?php if ( !empty($scheme) ): ?>
                  <?php foreach ( $scheme as $key => $s ): ?>

                  <div class="scheme-work__item">
                    <div class="scheme-work__item__img-wrapper">
                        <img src="<?php echo $s['icon']; ?>" alt="">
                    </div>
                    <div class="scheme-work__item__number">
                        <span class="scheme-work__item__number__current"></span>
                        /
                        <span class="scheme-work__item__number__total"></span>
                    </div>
                    <div class="scheme-work__item__text">
                        <div class="scheme-work__item__text__title">
                            <?php echo $s['title']; ?>
                        </div>
                        <div class="scheme-work__item__text__desc">
                            <?php echo $s['text']; ?>
                        </div>
                    </div>
                  </div>
  
                  <?php endforeach; ?>
              <?php endif; ?>  
      
              </div>
            </div>
          </div>
        </div>
      </section>

      
      <?php get_template_part("template-parts/reviews") ?>

    </div>

<?php get_footer(); ?>