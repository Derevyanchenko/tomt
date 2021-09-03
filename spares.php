
<?php

/*
Template Name: Продажа запчастей
*/

?>

<?php get_header();
    the_post();
?>


    <div class="wrapper pg-sl-pare-parts pg-tl">
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

      <section class="tl-text pg-sl-pare-parts__top-desc">
        <div class="container_section-wrapper">
          <div class="container_section">
            <?php the_field('text_above') ?>
          </div>
        </div>
      </section>

      <section class="sl-spare-parts">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="sl-spare-parts__items">

            <?php
              $args = array(

                "numberposts" => -1,
                "post_type" => "spares",
                "suppress_filters" => true,
              );
              $posts = get_posts($args);

            ?>

            <?php foreach($posts as $post) { setup_postdata($post); ?>
   
                <div class="sl-spare-parts__item">
                    <div class="sl-spare-parts__item__img-wrapper">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="sl-spare-parts__item__title"> <?php echo get_the_title() ?> </div>
                    <a href="#" data-price="<?php the_id(); ?>" class="btn btn_info_full-bg getPriceModal-js">Узнать цену</a>
                </div>

            <?php } wp_reset_postdata(); ?>
              
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part('template-parts/section_action') ?>

      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <?php the_field('text_under') ?>
          </div>
        </div>
      </section>
    </div>
    
<?php get_footer(); ?>