<div class="about__title <?php if ( !is_front_page() ) { echo 'section__title section__title_bd'; } ?>">Лицензия</div>
<div class="about__license__slider-wrapper slider_main-wrapper">
    <div class="about__license__slider-wrapper__inner">
        <div class="about__license__slider">

            <?php $licensies = get_field('licensies', 'theme-general-settings'); ?>

            <?php if (!empty( $licensies )): ?>
                <?php foreach ($licensies as $license): ?>

                <div class="about__license__slide">
                    <img src="<?php echo $license['image'] ?>" alt="1" />
                </div>
                
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div
        class="about__license__arrow about__license__arrow-prev slider__arrow_main slider__arrow_main-prev"
    >
        <svg class="icon icon-arrow">
            <use xlink:href="#icon-arrow"></use>
        </svg>
    </div>
    <div
        class="about__license__arrow about__license__arrow-next slider__arrow_main slider__arrow_main-next"
    >
        <svg class="icon icon-arrow">
            <use xlink:href="#icon-arrow"></use>
        </svg>
    </div>
</div>