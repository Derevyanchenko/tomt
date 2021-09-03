<?php
/* Template Name: Шаблон страницы с отзывами */
get_header();
the_post(); ?>

<div class="wrapper pg-reviews">
    <?php get_template_part("template-parts/banner_section") ?>

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

    <section class="pg-reviews__st">
        <div class="container_section-wrapper">
            <div class="container_section"> 
                
                <!-- php single comment template -->
                
                <?php $comments = get_comments(); ?>

                <?php foreach($comments as $comment): ?>
                <?php if ($comment->comment_approved == '1'): ?>   
                    <?php if (0 == $comment->comment_parent): ?>
                    
                        <div class="pg-reviews__st__item">
                            <div class="pg-reviews__st__item__head">
                                <div class="pg-reviews__st__item__head__img-wrapper">

                                    <?php $image = get_field('comment_image', $comment); ?>

                                    <?php if ( !empty($image) ): ?>
                                        <img src="<?php echo $image; ?>" alt="1">
                                    <?php endif; ?>

                                </div>
                                <div class="pg-reviews__st__item__head__title">
                                    <h3><?php the_field('company', $comment) ?></h3>
                                    <div class="pg-reviews__st__item__head__title__sender">
                                    <?php echo $comment->comment_author; ?> <?php the_field('surname', $comment) ?>
                                        <span><?php the_field('position', $comment) ?></span>
                                    </div>
                                </div>
                                <div class="pg-reviews__st__item__head__status">
                                    <ul class="rating" style="list-style: none">

                                    <?php $rating = get_field("rating", $comment); ?>
                                    <?php if( !empty($rating) ): ?>
                                        <?php for( $i = 0; $i < 5; $i++ ): ?>

                                            <?php if ( $i < $rating ): ?>

                                                <li class="active">
                                                    <svg class="icon">
                                                        <use xlink:href="#icon-star"></use>
                                                    </svg>
                                                </li>

                                            <?php else: ?>

                                            <li>
                                                <svg class="icon">
                                                    <use xlink:href="#icon-star"></use>
                                                </svg>
                                            </li>

                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php endif; ?>

                                    </ul>
                                    <div class="pg-reviews__st__item__head__status__date"><?php echo get_comment_date('d F Y', $comment); ?></div>
                                </div>
                            </div>
                            <div class="pg-reviews__st__item__sender pg-reviews__st__item__sender_df">
                            <?php echo $comment->comment_author; ?> <?php the_field('surname', $comment) ?>
                                        <span><?php the_field('position', $comment) ?></span>
                            </div>
                            <div class="pg-reviews__st__item__text">
                                <?php comment_text(); ?>
                            </div>
                            <div class="pg-reviews__st__item__status">
                                <ul class="rating" style="list-style: none">
                                    <li class="active">
                                        <svg class="icon">
                                            <use xlink:href="#icon-star"></use>
                                        </svg>
                                    </li>
                                    <li class="active">
                                        <svg class="icon">
                                            <use xlink:href="#icon-star"></use>
                                        </svg>
                                    </li>
                                    <li class="active">
                                        <svg class="icon">
                                            <use xlink:href="#icon-star"></use>
                                        </svg>
                                    </li>
                                    <li>
                                        <svg class="icon">
                                            <use xlink:href="#icon-star"></use>
                                        </svg>
                                    </li>
                                    <li>
                                        <svg class="icon">
                                            <use xlink:href="#icon-star"></use>
                                        </svg>
                                    </li>
                                </ul>
                                <div class="pg-reviews__st__item__status__date"><?php echo get_comment_date('d F Y', $comment); ?></div>
                            </div>

                            <!-- inner -->

                            <?php $children = $comment->get_children(); ?>

                            <?php if ( !empty($children) ): ?>
                                <?php foreach ($children as $child): ?>

                                <div class="pg-reviews__st__item__inner-review">
                                    <div class="pg-reviews__st__item__inner-review__head">
                                        <div class="pg-reviews__st__item__inner-review__head__img-wrapper">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo_slim.png" alt="tomt">
                                        </div>
                                        <div class="pg-reviews__st__item__inner-review__head__title">
                                            <div class="pg-reviews__st__item__inner-review__head__sender">Администратор</div>
                                            <div class="pg-reviews__st__item__inner-review__head__date"><?php echo get_comment_date('d F Y', $child); ?></div>
                                        </div>
                                    </div>
                                    <div class="pg-reviews__st__item__text">
                                        <?php echo $child->comment_content; ?>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                            <!-- // inner -->

                        </div>

                    <?php endif; ?>
                <?php endif; ?>     
                <?php endforeach; ?>

            </div>

            <?php paginate_comments_links(array(
                'prev_text'    => 'назад',
                'next_text'    => 'следующая страница',
                'format'       => '',
                'type'         => 'list',
                'add_fragment' => '#reviews_block'
            )); ?>

        </div>
    </section>

    <section class="feedback">
        <div class="container_section-wrapper">
            <div class="container_section">
                <div class="section__head">
                    <h2 class="section__title section__title_bd">Оставить отзыв</h2> 
                </div>
                <div class="feedback__form">
                    <form action="review" class="form form-feedback-js reviews_form">
                        <div class="form__fields">
                            <div class="form__fields__inner">
                                <div class="form__field">
                                    <input type="text" class="input input_main" name="name" placeholder="Имя" minlength="2" maxlength="15" required>
                                    <div class="error-mg">Вы не ввели свое имя</div>
                                </div>
                                <div class="form__field">
                                    <input type="text" name="surname" class="input input_main" placeholder="Фамилия">
                                </div>
                                <div class="form__field">
                                    <input type="text" name="position" class="input input_main" placeholder="Должность">
                                </div>
                            </div>
                            <div class="form__field">
                                <input type="text" name="company" class="input input_main" placeholder="Название компании">
                            </div>
                            <div class="form__field">
                                <textarea class="input input_main" name="message" placeholder="Текст отзыва" minlength="5" required></textarea>
                                <div class="error-mg">Вы не ввели отзыв</div>
                            </div>
                        </div>
                        <div class="form__footer">
                            <div class="form__field">
                                <div class="form__stars">
                                    <div class="form__stars__title">Оцените нашу работу:</div>
                                    <div class="rating-radio">
                                        <input id="5" type="radio" name="rating" value="5">
                                        <label for="5" title="5 out of 5 stars">
                                            &bigstar;
                                        </label>
                                        <input id="4" type="radio" name="rating" value="4">
                                        <label for="4" title="4 out of 5 stars">
                                            &bigstar;
                                        </label>
                                        <input id="3" type="radio" name="rating" value="3">
                                        <label for="3" title="3 out of 5 stars">
                                            &bigstar;
                                        </label>
                                        <input id="2" type="radio" name="rating" value="2">
                                        <label for="2" title="2 out of 5 stars">
                                            &bigstar;
                                        </label>
                                        <input id="1" type="radio" name="rating" value="1">
                                        <label for="1" title="1 out of 5 stars">
                                            &bigstar;
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="currpage" value="<?php the_ID(); ?>" autocomplete="off">
                                <div class="error-mg">Вы не дали оценку</div>
                            </div>
                            <button class="btn btn_info_full-bg">Оставить отзыв</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
