<?php

// Template Name: Производители
 
?>

<?php get_header();
    the_post();
?>


<div class="wrapper pg-tl">
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
              <li><span><?php the_title() ?></span></li>
            </ul>
          </div>
        </div>
      </div>

      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <p>
              <?php the_field('manufactures_top_text') ?>
            </p>
          </div>
        </div>
      </section>

      <?php  
      
        $manufactures = get_field("manufactures_bottom_text");

        // create json array
        $result=[];
        $args_tax_manufacturers = array(
          'taxonomy' => 'manufacturers_сat',
          'hide_empty' => false,
        );

        $terms = get_terms($args_tax_manufacturers);


        foreach ($terms as $key=>$term) {
          
          $temp_arr=[];

          $temp_arr['name'] = $term->name;

          $args = array(
            "post_type" => "manufacturers",
            'tax_query' => array(
              array(
                'taxonomy' => 'manufacturers_сat',
                'field' => 'term_id',
                'terms' => $term->term_id,
            
                )
              ),
          );

          $posts = get_posts($args);
          $posts = (array) $posts;


          foreach($posts as $key => $post){

            $post = (array) $post;
            $post['content']          = $post['post_content'];
            $post['thumbnail']        = get_the_post_thumbnail_url($post['ID']);
            $post['link']             = get_field("link", $post['ID']);
            $post[$key]               = $post;

            $temp_arr['children'][]=[
              "name"  => $post['content'],
              "image" => $post['thumbnail'],
              "link"  => $post['link'],
            ];
          }

          $result[] = $temp_arr;
          
        }
      
      ?>

      <section class="equipment equipment_prev equipment_prev-manufac">
        <div id="prevManufacturers" data-info='<?=json_encode($result);?>'>

        </div>
      </section>

      <?php get_template_part("template-parts/section_action") ?>

      <section class="tl-text">
        <div class="container_section-wrapper">
          <div class="container_section">
            <p>
                <?php echo $manufactures; ?>
            </p>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>
