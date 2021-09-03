<?php

/*
Template Name: Статьи
*/

?>

<?php get_header();
    the_post();
?>


<div class="wrapper pg-articles">

    <?php get_template_part("template-parts/banner_section") ?>

      <section class="st-articles">
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
        
        <div class="container_section-wrapper">
        <div class="container_section">
            <form action="#" class="articles_sort_js">

                <input type="hidden" name="action" value="articles_filter">
                <input type="hidden" class="statusKinds_val" name="statusKinds_val" value="demo">
                <input type="hidden" name="page" value="<?php echo $page; ?>">

                <div class="st-articles__sort sort-block">
                    <div class="st-articles__sort__item sort-block__item">
                        <div class="st-articles__sort__item__title sort-block__item__title">Выбрать раздел:</div>
                        <div class="st-articles__sort__item__kinds sort-block__item__kinds">
                            <span class="st-articles__sort__item__kinds__current sort-block__item__kinds__current"
                            >
                            <span data-cat="0" data-sorted="new" class="text articles__cat_current">Выбрать</span>
                                <svg class="icon icon-arrow">
                                    <use xlink:href="#icon-arrow"></use>
                                </svg>
                            </span>
                            <ul class="statusListKinds">

                            <?php

                                $args_tax_articles = array(
                                    'taxonomy' => 'articles_cat',
                                    'hide_empty' => false,
                                );
 
                                $terms = get_terms($args_tax_articles);

                            ?>

                            <?php foreach( $terms as $term ): ?>

                                <li class="statusKinds" data-cat="<?php echo $term->term_id; ?>">
                                    <?php echo $term->name; ?>
                                </li>

                            <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                        <div class="st-articles__sort__item sort-block__item">
                            <div class="st-articles__sort__item__title sort-block__item__title">Сортировать по:</div>
                            <div class="st-articles__sort__item__check sort-block__item__check">
                                <label class="field-radio">
                                    <input type="radio" class="artices_sort_input" name="sorted" checked value="new">
                                    <span>Новизне</span>
                                </label>
                                <label class="field-radio">
                                    <input type="radio" class="artices_sort_input" name="sorted" value="popular">
                                    <span>Популярности</span>
                                </label>
                            </div>
                        </div>
                        
                </div>
            </form>
            <div class="st-articles__items">
            
                <?php 
                
                    $page = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;;

                    $args = array(
                        "numberposts" => -1,
                        "post_type" => "articles",
                        'posts_per_page' => 6,
                        "order"         => "DESC",
                        'paged' => $page,
                    );

                    $posts = new WP_Query( $args );

                    show_articles_items( $posts, $page );
                ?>


            </div>
            <!-- <div class="paging">
                <a href="#" class="paging__controls paging__controls-prev link_default">
                    <svg class="icon icon-arrow">
                        <use xlink:href="#icon-arrow_long"></use>
                    </svg>
                    <span>Назад</span>
                </a>
                <a href="#" class="paging__item active">01</a>
                <a href="#" class="paging__item">02</a>
                <a href="#" class="paging__item">03</a>
                <a href="#" class="paging__item">...</a>
                <a href="#" class="paging__item">05</a>
                <a href="#" class="paging__controls paging__controls-next link_default">
                    <span>Далее</span>
                    <svg class="icon icon-arrow">
                        <use xlink:href="#icon-arrow_long"></use>
                    </svg>
                </a>
            </div> -->
        </div>
    </div>

      </section>
    </div>

<?php get_footer(); ?>