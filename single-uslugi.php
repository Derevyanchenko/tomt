<?php

 
?>

<?php get_header();
    the_post();
?>

<div class="wrapper pg-sl-services">
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
      <?php

        $post_objects = get_field('olso_remont');

        $text_above_footer = get_field('text_above_footer');

        $result=[];
        $args_cat_equipment_new = get_field('cat_equipment_new');

        foreach ($args_cat_equipment_new as $key=>$term) {

          $temp_arr=[];
          $temp_arr['name'] = $term->name;

          $args = array(
            "post_type" => "equipment_new",

            'tax_query' => array(
              array(
                'taxonomy' => 'equipment_cat_new',
                'field' => 'term_id',
                'terms' => $term->term_id,
                )
              
            ),
          );

          $posts = get_posts($args);
          $posts = (array) $posts;

          foreach($posts as $key => $post){

            $post = (array) $post;
            $post['thumbnail']        = get_the_post_thumbnail_url($post['ID']);
            $post['link']             = get_field("link", $post['ID']);
            $post[$key]               = $post;

 
          if (!empty( $post )) {

            $temp_arr['children'][] = [
              "name"          => $post['post_title'],
              "image"         => $post['thumbnail'],
              "link"          => $post['link'],
            ];
          }
          
          $temp_arr['manufacturers'] = get_field('manufacturers', $term->taxonomy . '_' . $term->term_id);
          $result[] = $temp_arr;
        }   

      ?>


      <div class="equipment equipment_prev">
        <section id="prevEquipment"  data-info='<?=json_encode($result);?>'>
        </section>
      </div>

      <?php get_template_part('template-parts/section_action') ?>

      <section class="repair">
        <div class="container_section-wrapper">
          <div class="container_section">
            <div class="section__head">
              <h2 class="section__title section__title_bd">Мы так же ремонтируем</h2>
            </div>
            <div class="repair__items">

            <!-- olso_remont -->

            <?php if (!empty( $post_objects )): ?>
              <?php foreach ( $post_objects as $post ): ?>

              <div class="repair__item">
                <div class="repair__item__img-wrapper">
                  <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="2" />
                </div>
                <div class="repair__item__title"><?php echo get_the_title() ?></div>
              </div>

              <?php endforeach; ?>
            <?php endif; ?>
                
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part('template-parts/enter_ct') ?>

      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section more-text-wrapper-js">
            <div class="more-text-js">
              <?php echo $text_above_footer; ?>
            </div>
            <a href="#" class="about__desc__info__more read-more-js" data-more="Читать полностью" data-less="Скрыть">
              <span>Читать полностью</span>
              <svg class="icon icon-arrow">
                <use xlink:href="#icon-arrow"></use>
              </svg>
            </a>
          </div>
        </div>
      </section>
    </div>

<?php get_footer(); ?>