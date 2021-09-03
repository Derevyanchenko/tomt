
    <section class="reviews">
        <div class="container_section-wrapper">
            <div class="container_section">
                <div class="section__head">
                    <h2 class="section__title section__title_bd">Отзывы о нашей работе</h2>
                    <a href="/comment" class="link_default">
                        Смотреть все
                        <svg class="icon icon-arrow">
                            <use xlink:href="#icon-arrow_long"></use>
                        </svg>
                    </a>
                </div>

                <div class="reviews__items">

                    <?php
                        $args = array(
                            "post_status"  => "publish",
                            "number"       => 2,
                            "hierarchical" => 'threaded',
                        );
                    
                        $comments = get_comments( $args );
                    ?>

                    <?php foreach( $comments as $comment ): ?>
                        <?php if (0 == $comment->comment_parent): ?>

                        <div class="reviews__item">
                            <div class="reviews__item__head">
                                <div class="reviews__item__head__img-wrapper">
                                    
                                    <?php $image = get_field('comment_image', $comment); ?>

                                    <?php if ( !empty($image) ): ?>
                                        <img src="<?php echo $image; ?>" alt="1">
                                    <?php endif; ?>

                                </div>
                                <div class="reviews__item__head__name"><?php the_field('company', $comment) ?></div>
                            </div>
                            <div class="reviews__item__text">
                                <p>
                                    <?php comment_text(); ?>
                                </p>
                            </div>
                            <div class="reviews__item__data">
                                <div class="reviews__item__data__status">
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
                                    <div class="reviews__item__data__status__date"><?php echo get_comment_date('d F Y', $comment); ?></div>
                                </div>
                                <div class="reviews__item__data__sender">
                                <?php echo $comment->comment_author; ?> <?php the_field('surname', $comment) ?>
                                    <span><?php the_field('position', $comment) ?></span>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
            
                </div>

                <div class="reviews__more">
                    <a href="/comment" class="link_default">
                        Смотреть все
                        <svg class="icon icon-arrow">
                            <use xlink:href="#icon-arrow_long"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>