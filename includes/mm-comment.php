<?php
function mm_review_comment($comment, $args, $depth)
{

    ?>
    <div><!-- start reviews-page__block -->
    <div class="reviews-page__block">
        <div class="reviews__block-title">
            <div class="question__item-title">
                <div class="question__item-img">
                </div>
                <div class="question__item-info">
                    <h4 class="question__item-name"><?php echo $comment->comment_author; ?></h4>
                    <p class="question__item-date"><?php echo get_comment_date('d F Y', $comment); ?></p>
                </div>
            </div>
            <ul class="reviews__block-result">
                <?php

                $rating = get_field('rating', $comment);

                if (!empty($rating)) {
                    for ($i = 1; $i <= $rating; $i++) {
                        echo '<li><img src="'.get_template_directory_uri().'/img/reviews__star-transparent.svg" alt=""></li>';
                    }
                    for ($i = $rating; $i < 5; $i++) {
                        echo '<li><img src="'.get_template_directory_uri().'/img/reviews__star-full.svg" alt=""></li>';
                    }
                } ?>
            </ul>
        </div>
        <?php if ($comment->comment_approved == '0') { ?>
            <em class="comment-awaiting-moderation">
                error
                <?php _e('Your comment is awaiting moderation.'); ?>
            </em><br/>
        <?php } ?>
        <div class="question__item-text">
            <?php comment_text(); ?>
        </div>
        <!-- reviews__block -->

    </div>
    <?php
}


//show number of starts on the comment list
add_filter('comment_text', 'ci_comment_rating_display_rating', 10, 2);
function ci_comment_rating_display_rating($comment_text, $comment)
{
    $rating = get_field('rating', $comment);
    if (is_admin()) {
        $stars = '';
        if ($rating) {
            $stars .= '<p class="stars">';
            for ($i = 1; $i <= $rating; $i++) {
                $stars .= '<span class="dashicons dashicons-star-filled"></span>';
            }
            for ($i = $rating; $i < 5; $i++) {
                $stars .= '<span class="dashicons dashicons-star-empty"></span>';
            }
            $stars .= '</p>';
        }

        $comment_text = $comment_text . $stars;
        return $comment_text;
    } else {
        return $comment_text;
    }
}


