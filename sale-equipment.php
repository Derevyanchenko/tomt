<?php

/*
Template Name: Продажа оборудования
*/

?>

<?php get_header();
    the_post();
?>


<div class="wrapper pg-sale-equipment pg-tl">
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
            <h2 class="section__title section__title_bd">Продажа б/у оборудование</h2>
            <br />
            <?php the_field('text_above_equipment') ?>
          </div>
        </div>
      </section>

        <?php 

        $text_under_equipment = get_field('text_under_equipment'); 
      
        $result=[];
        $args_tax_equipment = array(
          'taxonomy' => 'equipment_cat',
          'hide_empty' => false,
        );

        $terms = get_terms($args_tax_equipment);

        foreach ($terms as $key=>$term) {
          
          $temp_arr=[];

          $temp_arr['name'] = $term->name;

          $args = array(
            "post_type" => "equipment",
            // "suppress_filters" => true,
            'tax_query' => array(
              array(
                'taxonomy' => 'equipment_cat',
                'field' => 'term_id',
                'terms' => $term->term_id,
            
            )
              
              ),
              
          );

          $posts = get_posts($args);
          $posts = (array) $posts;

          foreach($posts as $key => $post){

            $post = (array) $post;
            $post['gallery']          = get_field("gallery", $post['ID']);
            $post['manufacturer']     = get_field("manufacturer", $post['ID']);
            $post['year']             = get_field("year", $post['ID']);
            $post['was_in_operation'] = get_field("was_in_operation", $post['ID']);
            $post['specifications']   = get_field("specifications", $post['ID']);
            $post['price']            = get_field("price", $post['ID']);
            $post[$key]               = $post;

            $temp_arr['children'][]=[
              "id"           => $post["ID"],
              "name"         => $post['post_title'],
              "image"        => $post['gallery'],
              "manufacturer" => $post['manufacturer'],
              "year"         => $post['year'],
              "exploitation" => $post['was_in_operation'],
              "components"   => $post['specifications'],
              "price"        => $post['price'] ,
            ];

          }

          $result[] = $temp_arr;
          
        }
        
        ?>
        

      <section class="equipment equipment_prev-sale">
        <div id="saleEquipment" data-info='<?=json_encode($result);?>'>
            
        </div>
      </section>


      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <h2 class="section__title section__title_bd">Продажа нового оборудования</h2>
            <div class="more-text-wrapper-js">
              <div class="more-text-js">
                <br>
                <?php echo $text_under_equipment;?>
              </div>
              <a href="#" class="about__desc__info__more read-more-js" data-more="Читать полностью" data-less="Скрыть">
                <span>Читать полностью</span>
                <svg class="icon icon-arrow">
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>

<?php get_footer(); ?>