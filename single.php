<?php
// Template Name: Текстовая
get_header(); 
the_post();
?>
<?php setPostViews(get_the_ID()); ?>

<div class="wrapper pg-repair-ar">
    <section class="section-banner">
      <div class="section-banner__inner">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">
               <?php the_title(); ?>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </section>

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
    
    <section class="tl-text">
      <div class="container_section-wrapper">
        <div class="container_section">
            <?php the_content(); ?>
        </div>
      </div>
    </section>

    <?php get_template_part("template-parts/section_action") ?>
      
      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <p>
                <?php the_field("page_template_bottom"); ?>
            </p>
          </div>
        </div>
      </section>

</div>


<?php get_footer(); ?>