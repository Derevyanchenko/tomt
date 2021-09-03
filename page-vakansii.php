<?php

/*
Template Name: Вакансии
*/

?>

<?php get_header();
    the_post();
?>

<div class="wrapper pg-vacancies">
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

      <section class="vacancies">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="vacancies__desc">
              <?php the_field("text") ?>
            </div>
            <div class="vacancies__items">

            <?php       
                $args = array(
                    "post_type" => "vakansii",
                    "suppress_filters" => true,
                );
                $posts = get_posts($args);
            ?>

            <?php foreach($posts as $post) { setup_postdata($post); ?>

                <div class="vacancies__item">
                    <div class="vacancies__item__title"><?php the_title() ?></div>
                    <div class="vacancies__item__price"><?php the_field('salary') ?></div>
                    <a href="tel:<?php the_field('tel') ?>" class="vacancies__item__action">
                    <svg class="icon">
                        <use xlink:href="#icon-phone"></use>
                    </svg>
                    <?php the_field('tel') ?>
                    </a>
                    <div class="vacancies__item__info">
                    <span>Требования:</span> <?php the_field('skills') ?>
                    </div>
                    <div class="vacancies__item__info">
                    <span>Обязанности:</span> <?php the_field('duties') ?>
                    </div>
                    <div class="vacancies__item__status">
                    <div>
                        <svg class="icon">
                        <use xlink:href="#icon-calendar"></use>
                        </svg>
                        <?php the_time("d.m.Y"); ?>
                    </div>
                    <div>
                        <svg class="icon">
                        <use xlink:href="#icon-mark"></use>
                        </svg>
                        г. <?php the_field('city') ?>
                    </div>
                    </div>
                </div>

            <?php } wp_reset_postdata(); ?>
         
            </div>
          </div>
        </div>
      </section>
    </div>



<?php get_footer(); ?>