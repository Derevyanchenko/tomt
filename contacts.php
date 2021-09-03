<?php

/*
Template Name: Контакты
*/

?>

<?php get_header(); the_post(); ?>

<div class="wrapper pg-contact">

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

      <section class="contact">

        <div class="contact__inner container_section-wrapper">
          <div class="contact__data">
            <div class="bread-crumbs">
              <div class="container_section-wrapper">
                <div class="container_section">
                  <ul>
                    <li><a href="<?php site_url(); ?>">Главная</a></li>
                    <li><span><?php the_title(); ?></span></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="container_section-wrapper">
              <div class="container_section">
                <h2 class="section__title section__title_bd">Контактная информация</h2>
                <div class="contact__data__info">
                  <div class="contact__data__info__call">
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
                  <div class="main-controls-item">
                    <div class="main-controls-item__icon-wrapper">
                      <svg class="icon">
                        <use xlink:href="#icon-license-stroke"></use>
                      </svg>
                    </div>
                    <div class="main-controls-item__content">
                        Лицензия: <?php the_field("license") ?>
                    </div>
                  </div>
                  <div class="main-controls-item main-controls-item_more">
                    <div class="main-controls-item__icon-wrapper">
                      <svg class="icon">
                        <use xlink:href="#icon-map-stroke"></use>
                      </svg>
                    </div>
                    <div class="main-controls-item__content">
                      <div class="main-controls-item__content__title">Как добраться?</div>
                        <?php the_field("how_to_get_there") ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="contact__form">
            <div class="container_section-wrapper">
              <div class="container_section">
                <h2 class="section__title section__title_bd">Остались вопрос? Напишите нам</h2>
                <form action="#" class="form form_default formOrder-js ajax_form">
                  <input type="hidden" name="action" value="contacts_request">
                  <div class="form__fields">
                    <div class="form__fields__inner">
                      <div class="form__field form__field-name">
                        <input
                          type="text"
                          class="input input_default"
                          placeholder="Как вас зовут?"
                          minlength="2"
                          maxlength="15"
                          name="name"
                          required
                        />
                      </div>
                      <div class="form__field form__field-phone">
                        <input
                          type="text"
                          class="input input_default inputPhone-js"
                          placeholder="Номер телефона"
                          minlength="2"
                          name="phone"
                          required
                          pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                        />
                      </div>
                      <div class="form__field form__field-topic">
                        <input
                          type="text"
                          class="input input_default"
                          placeholder="Тема сообщения"
                          name="subject"
                          minlength="2"
                          required
                        />
                      </div>
                      <div class="form__field form__field-message">
                        <input
                          type="email"
                          class="input input_default"
                          placeholder="Эл. почта"
                          minlength="2"
                          name="email"
                          required
                        />
                      </div>
                    </div>
                    <div class="form__field form__field-message">
                      <textarea class="input input_default" placeholder="Текст сообщения" name="message" required></textarea>
                    </div>
                  </div>
                  <div class="form__action">
                    <button class="btn btn_info_full-bg">Отправить</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="map-wrapper">
            <?php the_yandex_map("map", "theme-general-settings") ?>
        </div>
      </section>
    </div>

<?php get_footer(); ?>