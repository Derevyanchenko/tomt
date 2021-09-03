<?php
?>

<?php get_header(); ?>

<section class="error-st">
      <div class="container_section-wrapper">
        <div class="container_section">
          <div class="error-st__img-wrapper">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/404.png" alt="404" />
          </div>
          <div class="error-st__info">
            <h2>Страница не найдена!</h2>
            <div class="error-st__info__buttons-wrapper">
              <a href="<?php echo site_url(); ?>" class="btn btn_back">
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow_long"></use>
                </svg>
                Вернуться на главную
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
