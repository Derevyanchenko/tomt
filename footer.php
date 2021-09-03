<footer class="footer">
    <div class="main-nav">
        <div class="container_parts">
            <nav>
                <?php wp_nav_menu(array(
                    "theme_location" => "main_menu",
                    "container" => false,
                )); ?>
            </nav>
        </div>
    </div>
    <div class="footer__info">
        <div class="footer__info__inner container_parts">
            <div class="footer__info__item footer__info__item-services">
                <div class="footer__info__item-services__list">
                    <div class="footer__info__item__title">Услуги</div>
                    <nav>
                        <ul>

                        <?php wp_nav_menu(array(
                        "theme_location" => "footer_menu",
                        "container" => false,
                    )); ?>

                        </ul>
                    </nav>
                </div>
        
            </div>
            <div class="footer__info__item footer__info__item-controls">
                <div class="footer__info__item__title">Наши контакты</div>
                <div class="main-controls-item">
                    <div class="main-controls-item__icon-wrapper">
                        <svg class="icon">
                            <use xlink:href="#icon-mark-stroke"></use>
                        </svg>
                    </div>
                    <div class="main-controls-item__content">
                        <?php the_field('adress', 'theme-general-settings'); ?>
                    </div>
                </div>
                <div class="main-controls-item">
                    <div class="main-controls-item__icon-wrapper">
                        <svg class="icon">
                            <use xlink:href="#icon-clock"></use>
                        </svg>
                    </div>
                    <div class="main-controls-item__content">
                        <?php the_field('work_days', 'theme-general-settings'); ?>
                    </div>
                </div>
                <div class="main-controls-item">
                    <div class="main-controls-item__icon-wrapper">
                        <svg class="icon">
                            <use xlink:href="#icon-phone-stroke"></use>
                        </svg>
                    </div>
                    <div class="main-controls-item__content">
                        <a href="tel:+<?php echo preg_replace('/[^0-9]/', '', get_field('phone', 'theme-general-settings')); ?>"><?php the_field('phone', 'theme-general-settings'); ?></a>
                        <a href="mailto:<?php the_field('mail', 'theme-general-settings'); ?>"><?php the_field('mail', 'theme-general-settings'); ?></a>
                    </div>
                </div>
                <div class="footer__info__item-controls__buttons-wrapper">
                    <a href="#" class="btn btn_default_cl getCallRequestModal-js">Заказать звонок</a>
                </div>
            </div>
            <div class="footer__info__item footer__info__item-form">
                <div class="footer__info__item__title">Остались вопросы? Напишите нам</div>
                <form action="#" class="form form_default ajax_form formOrder-js">
                    <input type="hidden" name="action" value="make_order">
                    <div class="form__fields">
                        <div class="form__field form__field-name">
                            <input
                                    type="text"
                                    class="input input_default"
                                    placeholder="Как вас зовут?"
                                    minlength="2"
                                    maxlength="15"
                                    name="name"
                                    required
                            />
                        </div>
                        <div class="form__field form__field-phone">
                            <input
                                    type="text"
                                    class="input input_default inputPhone-js"
                                    placeholder="Номер телефона"
                                    minlength="2"
                                    name="phone"
                                    required
                                    pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                            />
                        </div>
                        <div class="form__field form__field-topic">
                            <input
                                    type="text"
                                    class="input input_default"
                                    placeholder="Тема сообщения"
                                    name="subject"
                                    minlength="2"
                                    required=""
                            />
                        </div>
                        <div class="form__field form__field-message">
                            <input
                                    type="text"
                                    class="input input_default"
                                    placeholder="Текст сообщения"
                                    name="message"
                                    minlength="2"
                                    required=""
                            />
                        </div>
                    </div>
                    <div class="form__action">
                        <button class="btn btn_info_full-bg">Оформить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer__copy">
        <div class="footer__copy__inner container_parts">
            <div class="footer__copy__item"><?php the_field('copyright', 'theme-general-settings'); ?></div>
            <div class="footer__copy__item footer__copy__item-social">
                <ul>
                    
                    <?php $social_icons = get_field("social_icons", "theme-general-settings"); ?>
                    
                    <?php if (!empty( $social_icons )): ?>
                        <?php foreach ($social_icons as $social_item): ?>

                            <li>
                                <a href="<?php echo $social_item['link']; ?>" rel="nofollow">
                                    <img src="<?php echo $social_item['icon']; ?>" alt="">
                                </a>
                            </li>
                        
                        <?php endforeach; ?>
                    <?php endif; ?>
                
                </ul>
            </div>
            <div class="footer__copy__item footer__copy__item-logo-rocket-cn">
                Made by
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo-rocket-company.png" alt="Rocket company" />
                </a>
            </div>
        </div>
    </div>
</footer>

<a href="javascript:" class="btn-top top-js">
    <svg class="icon">
        <use xlink:href="#icon-arrow-bg"></use>
    </svg>
</a>

<div class="overlay"></div>
<div class="modal-wrapper">
    <div class="modal modal_default" id="getOrderModal">
        <div class="modal__inner">
            <h3 class="modal__title">Заказать</h3>
            <form action="#" class="form ajax_form">
                <div class="form__fields">
                    <div class="form__field">
                        <input type="hidden" name="action" value="orders">
                        <input
                                type="text"
                                class="input input_main"
                                name="name"
                                placeholder="Ваше имя"
                                minlength="2"
                                maxlength="15"
                                required
                        />
                    </div>
                    <div class="form__field">
                        <input
                                type="tel"
                                class="input input_main inputPhone-js"
                                name="phone"
                                placeholder="Ваш телефон"
                                minlength="2"
                                required
                                pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                        />
                    </div>
                    <div class="form__field">
                        <input type="email" name="email" class="input input_main" placeholder="Почта" />
                    </div>
                </div>
                <div class="form__action">
                    <button class="btn btn_default">Отправить</button>
                </div>
            </form>
        </div>
        <button class="modal__close modal-close-js">
            <svg class="icon">
                <use xlink:href="#icon-cross"></use>
            </svg>
        </button>
    </div>
    <div class="modal modal_default" id="getCallRequestModal">
        <div class="modal__inner">
            <h3 class="modal__title">Заказать звонок</h3>
            <form action="#" class="form ajax_form call_form">
                <input type="hidden" name="action" value="call_form">
                <div class="form__fields">
                    <div class="form__field">
                        <input
                                type="text"
                                class="input input_main"
                                name="name"
                                placeholder="Ваше имя"
                                minlength="2"
                                maxlength="15"
                                required
                        />
                    </div>
                    <div class="form__field">
                        <input
                                type="tel"
                                class="input input_main inputPhone-js"
                                name="phone"
                                placeholder="Ваш телефон"
                                minlength="2"
                                required
                                pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                        />
                    </div>
                </div>
                <div class="form__action">
                    <button class="btn btn_default">Заказать звонок</button>
                </div>
            </form>
        </div>
        <button class="modal__close modal-close-js">
            <svg class="icon">
                <use xlink:href="#icon-cross"></use>
            </svg>
        </button>
    </div>
    <div class="modal modal_default" id="getMakeRequestModal">
        <div class="modal__inner">
            <h3 class="modal__title">Оформить заявку</h3>
            <form action="#" class="form ajax_form">
                <input type="hidden" name="action" value="make_order">
                <div class="form__fields">
                    <div class="form__field">
                        <input
                                type="text"
                                class="input input_main"
                                placeholder="Ваше имя"
                                minlength="2"
                                maxlength="15"
                                name="name"
                                required
                        />
                    </div>
                    <div class="form__field">
                        <input
                                type="tel"
                                class="input input_main inputPhone-js"
                                placeholder="Ваш телефон"
                                minlength="2"
                                required
                                name="phone"
                                pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                        />
                    </div>
                    <div class="form__field">
                        <input type="text" class="input input_main" placeholder="Тема сообщения" minlength="2" name="subject" required />
                    </div>
                    <div class="form__field">
                        <input type="text" class="input input_main" placeholder="Текст сообщения" minlength="2" name="message" required />
                    </div>
                </div>
                <div class="form__action">
                    <button class="btn btn_default">Оформить заявку</button>
                </div>
            </form>
        </div>
        <button class="modal__close modal-close-js">
            <svg class="icon">
                <use xlink:href="#icon-cross"></use>
            </svg>
        </button>
    </div>
    <div class="modal modal_default" id="getPriceModal">
        <div class="modal__inner">
            <h3 class="modal__title">Узнать цену</h3>
            <form action="#" class="form ajax_form">
                <input type="hidden" name="action" value="price_request">
                <div class="form__fields">
                    <div class="form__field">
                        <input
                                type="text"
                                class="input input_main"
                                name="name"
                                placeholder="Ваше имя"
                                minlength="2"
                                maxlength="15"
                                required
                        />
                    </div>
                    <div class="form__field">
                        <input
                                type="tel"
                                class="input input_main inputPhone-js"
                                name="phone"
                                placeholder="Ваш телефон"
                                minlength="2"
                                required
                                pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$"
                        />
                    </div>
                    <div class="form__field">
                        <input type="email" class="input input_main" name="email" placeholder="Почта" />
                    </div>
                </div>
                <div class="form__action">
                    <button class="btn btn_default">Отправить</button>
                </div>
            </form>
        </div>
        <button class="modal__close modal-close-js">
            <svg class="icon">
                <use xlink:href="#icon-cross"></use>
            </svg>
        </button>
    </div>
    <div class="modal modal_default modal_thanks" id="getThanksModal">
        <div class="modal__inner">
            <h3 class="modal__title">Спасибо, Ваша заявка отправлена. В ближайшее время с Вами свяжется менеджер.</h3>
        </div>
    </div>
    <div class="modal modal_default modal_thanks" id="getThanksReviewsModal">
        <div class="modal__inner">
            <h3 class="modal__title">Спасибо, ваш отзыв отправлен</h3>
        </div>
    </div>
</div>

<!-- Start block with js files-->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<!-- // scripts -->
<?php wp_footer(); ?>
<!-- Finish block with js files-->
</body>
</html>
