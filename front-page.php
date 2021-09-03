<?php

/*
Template Name: Главная страница
*/

?>

<?php get_header(); ?>

 
    <section class="main">
        <div class="container_section-wrapper">
            <div class="container_section">
                <div class="main__inner">
                    <div class="section__head">
                        <div class="section__title section__title_bd">
                           <?php the_field('banner_title') ?>
                        </div>
                    </div>
                    <ul class="main__details">

                    <?php $banner_info = get_field("banner_info"); ?>
                    
                    <?php if (!empty( $banner_info )): ?>
                        <?php foreach ($banner_info as $info): ?>

                        <li>
                            <div class="icon-wrapper">
                                <img src="<?php echo $info['icon'] ?>" alt="image">
                            </div>
                            <?php echo $info['text'] ?>
                        </li>
                        
                        <?php endforeach; ?>
                    <?php endif; ?>

                    </ul>
                    <div class="main__buttons-wrapper">
                        <a href="#" class="btn btn_main getMakeRequestModal-js">
                            Оформить заявку
                            <svg class="icon icon-arrow">
                                <use xlink:href="#icon-arrow_long"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container_section-wrapper">
            <div class="container_section">
                <div class="section__head">
                    <h2 class="section__title section__title_bd">Наши услуги</h2>
                </div>
                <div class="services__items">



               <?php
                  $choose_services = get_field("choose_services");
                ?>


            <?php if( !empty($choose_services) ): ?>
                <?php foreach($choose_services as $service) {  ?>

                    <div class="services__item">
                        <a href="<?php echo $service['link']; ?>">
                            <div class="services__item__inner">
                                <div class="services__item__img-wrapper">
                                    <img src="<?php echo $service['icon']; ?>" alt="">
                                </div>
                                <div class="services__item__desc">
                                    <span><?php echo $service['title']; ?></span>
                                    <?php echo $service['subtitle']; ?>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php } ?>
                <?php endif; ?>    
                   
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/section_action') ?>

    <?php

        // variables

        $about_advan = get_field('about_advan');
        $about_logo = get_field('about_logo');
        $new_posts = array_chunk($about_logo, 2, false);
        $about_text = get_field('about_text');
        $about_title = get_field('about_title');

        // create json_array
        $result = [];
        $choose_main_services = get_field("choose_main_services");
        $sub_taxonomies = [];
        
        foreach($choose_main_services as $key => $main_service) {
            ++$key;
        
            $main_service = (array) $main_service;

            // var_dump($main_service);

            // $main_service['main_link'] = $main_link;

            if ( ($key % 2) == 1 ) {
                $main_service['color'] = "active_green";
            } else {
                $main_service['color'] = "active_blue";
            } 

            switch ($key) {
                case 1:
                    $main_service['icon'] = '<svg class="icon"><use xlink:href="#icon-list"></use></svg>';
                    break;
                case 2:
                    $main_service['icon'] = '<svg class="icon"><use xlink:href="#icon-instruments"></use></svg>';
                    break;
                case 3:
                    $main_service['icon'] = '<img src="'. get_template_directory_uri() 
                    .'/assets/img/icons/icon-hand-key_green.png" alt="hand-key"><img src="'
                    . get_template_directory_uri() .'/assets/img/icons/icon-hand-key_white.png" alt="hand-key">';
                    break;
                case 4:
                    $main_service['icon'] = '<svg class="icon"><use xlink:href="#icon-cogwheel-key"></use></svg>';
                    break;    
            }
          
            $taxonomy_arr=[];

            $args_cat_equipment_new =  array(
                'taxonomy' => 'equipment_cat_new',
                "hide_empty" => false,
                "child_of" => $main_service["term_taxonomy_id"],
            );

            $terms = get_terms( $args_cat_equipment_new );

            if( !empty($terms) ) {
                foreach ($terms as $one_taxonomy) {

                
                    $args = array(
                        "post_type" => "equipment_new",
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'equipment_cat_new',
                            'field'    => 'term_id',
                            'terms'    => $one_taxonomy->term_taxonomy_id,
                            )
                          ),
                      );
                      $posts_for_taxonomy=get_posts($args);

                    //   var_dump( $posts_for_taxonomy );

                      $posts_children=[];
                        
                      foreach ($posts_for_taxonomy as $post) {

                        $posts_children[]=[
                            'name'         => $post->post_title,
                            'link'         => get_field("link", $post->ID),
                            'image'        => get_the_post_thumbnail_url($post->ID),
                        ];
                      }

                    if ( $posts_for_taxonomy ) {
                        $taxonomy_arr[]=[
                            'name'          => $one_taxonomy->name,
                            'children'      => $posts_children,
                            'manufacturers' => get_field('manufacturers', $one_taxonomy->taxonomy . '_' . $one_taxonomy->term_id),
                            "main_link"     => get_field('main_equipment_link', $one_taxonomy->taxonomy . '_' . $one_taxonomy->term_id),
                        ];
                    }

                }
            }

            $temp_arr = [
                'main_link' => $main_service['main_link'],
                'name'      => $main_service['name'],
                'color'     => $main_service['color'],
                'icon'      => $main_service['icon'],
                'children'  => $taxonomy_arr
            ];
    
            $result[] = $temp_arr;

        }
        

    ?>

    <section class="equipment equipment_full">
        <div id="fullEquipment" data-info='<?=json_encode($result);?>'>
        
        </div>
    </section>

    <?php get_template_part('template-parts/enter_ct') ?>

    <section class="about">
        <div class="container_section-wrapper">
            <div class="container_section">
                <div class="section__head">
                    <h2 class="section__title section__title_bd">О компании «ТОМТ»</h2>
                </div>
                <div class="about__content">
                    <div class="about__desc">
                        <div class="about__title about__desc__title">
                            <?php echo $about_title; ?>
                        </div>
                        <div class="about__desc__info more-text-wrapper-js">
                            <div class="about__desc__info__text more-text-js">
                                <p>
                                    <?php echo $about_text; ?>
                                </p>
                            </div>
                            <a
                                href="#"
                                class="about__desc__info__more read-more-js"
                                data-more="Читать полностью"
                                data-less="Скрыть"
                            >
                                <span>Читать полностью</span>
                                <svg class="icon icon-arrow">
                                    <use xlink:href="#icon-arrow"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="about__desc__advantages">

                            <?php if (!empty( $about_advan )): ?>
                                <?php foreach ($about_advan as $advan): ?>

                                <div class="about__desc__advantages__item">
                                    <div class="about__desc__advantages__item__img-wrapper">
                                        <img src="<?php echo $info['icon'] ?>" alt="">
                                    </div>
                                    <div class="about__desc__advantages__item__title"><?php echo $info['text'] ?></div>
                                </div>
                                
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="about__license">

                        <?php get_template_part('template-parts/licensies') ?>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="trust">
        <div class="trust__inner">
            <div class="section__head">
                <div class="trust__title">
                    <h2 class="section__title"><span>Нам </span>доверяют</h2>
                </div>
            </div>
            <div class="trust__items-wrapper" id="trust__items">
                <div class="trust__items slides">

                <?php if (!empty( $new_posts )): ?>
                    <?php foreach ($new_posts as $key => $logo_items): ?>

                        <div class="trust__items__column slide">

                            <?php foreach ($logo_items as $logo): ?>

                                <div class="trust__item">
                                    <img src="<?php echo $logo['logo']; ?>" alt="1">
                                </div>     

                            <?php endforeach; ?>  

                        </div>         

                    <?php endforeach; ?>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <?php echo get_template_part("template-parts/reviews") ?>

    <section class="prev-st">
        <div class="container_section-wrapper">
            <div class="prev-st__inner container_section">
                <div class="prev-st__articles">
                    <div class="section__head">
                        <h2 class="section__title section__title_bd">Статьи</h2>
                        <a href="/articles" class="link_default">
                            Смотреть все
                            <svg class="icon icon-arrow icon-arrow_long">
                                <use xlink:href="#icon-arrow_long"></use>
                            </svg>
                            <svg class="icon icon-arrow icon-arrow_short">
                                <use xlink:href="#icon-arrow"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="prev-st__articles__items">

                    <?php 
                
                        $args = array(
                            "numberposts" => 2,
                            "post_type" => "articles",
                            'posts_per_page' => 2,
                            "order"         => "DESC",
                        );

                        $posts = new WP_Query( $args );
                        
                    ?>

                    <?php if ( $posts->have_posts() ):
                        while ( $posts->have_posts() ): $posts->the_post(); ?>

                        <div class="info-block info-block_articles">
                            <div class="info-block__img-wrapper">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail() ?>
                                </a>
                            </div>
                            <div class="info-block__desc">
                                <div class="info-block__desc__title">
                                    <a href="<?php the_permalink(); ?>"> <?php echo get_the_title($post->ID); ?></a>
                                </div>
                                <div class="info-block__desc__text">
                                    <?php echo get_the_content($post->ID); ?>
                                </div>
                                <div class="info-block__desc__more">
                                    <a href="<?php the_permalink(); ?>" class="link_default">
                                        Узнать подробнее
                                        <svg class="icon icon-arrow">
                                            <use xlink:href="#icon-arrow_long"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="info-block__desc__status">
                                    <div>
                                        <svg class="icon">
                                            <use xlink:href="#icon-calendar"></use>
                                        </svg>
                                        <?php the_time("d.m.Y"); ?>
                                    </div>
                                    <div>
                                        <svg class="icon">
                                            <use xlink:href="#icon-eye"></use>
                                        </svg>
                                        <?php echo getPostViews(get_the_ID()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endwhile;  ?>
                    <?php endif; ?>

                    </div>
                </div>
                <div class="prev-st__news">
                    <div class="section__head">
                        <h2 class="section__title section__title_bd">Новости</h2>
                        <a href="/novosti" class="link_default">
                            Смотреть все
                            <svg class="icon icon-arrow icon-arrow_long">
                                <use xlink:href="#icon-arrow_long"></use>
                            </svg>
                            <svg class="icon icon-arrow icon-arrow_short">
                                <use xlink:href="#icon-arrow"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="prev-st__news__items">

                    <?php 
                
                        $args = array(
                            "numberposts" => 1,
                            'posts_per_page' => 1,
                            "post_type" => "novosti",
                            "order"         => "DESC",
                        );

                        $posts = new WP_Query( $args );
                        
                    ?>

                    <?php if ( $posts->have_posts() ):
                        while ( $posts->have_posts() ): $posts->the_post(); ?>

                        <div class="info-block info-block_news">
                            <div class="info-block__img-wrapper">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a>
                            </div>
                            <div class="info-block__desc">
                                <div class="info-block__desc__title">
                                    <a href="<?php the_permalink(); ?>">  <?php echo get_the_title($post->ID); ?></a>
                                </div>
                                <div class="info-block__desc__text">
                                    <?php echo get_the_content($post->ID); ?>
                                </div>
                                <div class="info-block__desc__status">
                                    <div>
                                        <svg class="icon">
                                            <use xlink:href="#icon-calendar"></use>
                                        </svg>
                                        <?php the_time("d.m.Y"); ?>
                                    </div>
                                    <div>
                                        <svg class="icon">
                                            <use xlink:href="#icon-eye"></use>
                                        </svg>
                                        <?php echo getPostViews(get_the_ID()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endwhile;  ?>
                    <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>