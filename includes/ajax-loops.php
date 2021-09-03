<?php


function show_articles_items($posts, $page)
{

    if ($posts->have_posts()) :
        while ($posts->have_posts()) : $posts->the_post(); ?>

<div class="st-articles__item">
    <div class="info-block info-block_news">
        <div class="info-block__img-wrapper">
            <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail() ?></a>
        </div>
        <div class="info-block__desc">
            <div class="info-block__desc__title"><a href="<?php the_permalink(); ?>">
                    <?php echo get_the_title($post->ID); ?>
                </a></div>
            <div class="info-block__desc__text">
                <p>
                    <?php echo get_the_content($post->ID); ?>
                </p>
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
</div>

<?php endwhile;  ?>

<div class="paging">

    <?php

        $big = 999999999; // уникальное число

        echo paginate_links(array(
            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'  => '?paged=%#%',
            'current' => $page,
            'prev_text'    => __('&#60;'),
            'next_text'    => __('&#62;'),
            'total'   => $posts->max_num_pages
        ));

        ?>
</div>

<?php else : ?>

<h1 class="actions_not_found">В выбраной категории еще нет записей.</h1>

<?php endif;
}

function show_news_items($posts, $page)
{

    if ($posts->have_posts()) :
        while ($posts->have_posts()) : $posts->the_post(); ?>

<div class="info-block info-block_articles">
    <div class="info-block__img-wrapper">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail() ?>
        </a>
    </div>
    <div class="info-block__desc">
        <div class="info-block__desc__title"><a href="<?php the_permalink(); ?>"> <?php echo get_the_title($post->ID); ?></a></div>
        <div class="info-block__desc__text"><?php echo get_the_content($post->ID); ?></div>
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

<div class="paging">

<?php

    $big = 999999999; // уникальное число

    echo paginate_links(array(
        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'  => '?paged=%#%',
        'current' => $page,
        'prev_text'    => __('&#60;'),
        'next_text'    => __('&#62;'),
        'total'   => $posts->max_num_pages
    ));

    ?>
</div>

<?php else : ?>

<h1 class="actions_not_found">В выбраной категории еще нет записей.</h1>
<?php endif;
