<?php
?>

<?php get_header();
the_post();
?>

<div class="wrapper pg-news">

  <?php get_template_part("template-parts/banner_section") ?>

  <section class="pg-news__st">
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

    <div class="pg-news__st__inner container_section-wrapper">
      <div class="container_section">
        <form action="#" class="news_sort_js">
          <input type="hidden" name="action" value="news_filter">
          <input type="hidden" name="page" value="<?php echo $page; ?>">
          <div class="sort-block">
            <div class="sort-block__item" data-sorted="new">
              <div class="sort-block__item__title">Сортировать по:</div>
              <div class="sort-block__item__check">

                <label class="field-radio">
                  <input type="radio" class="news_sort_input" name="sorted" checked value="new">
                  <span>Новизне</span>
                </label>
                <label class="field-radio">
                  <input type="radio" class="news_sort_input" name="sorted" value="popular">
                  <span>Популярности</span>
                </label>

              </div>
            </div>
          </div>
        </form>
        <div class="pg-news__st__items">
          <div class="pg-news__st__item">

            <?php

            $page = get_query_var('paged') ? absint(get_query_var('paged')) : 1;;

            $args = array(
              "numberposts" => -1,
              "post_type" => "novosti",
              'posts_per_page' => 6,
              "order"  => "DESC",
              'paged' => $page,
            );

            $posts = new WP_Query($args);

            show_news_items($posts, $page);
            ?>

          </div>
        </div>


        <!-- 
            <div class="paging">
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