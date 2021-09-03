
<section class="support section_action">
  <div class="container_section-wrapper">
    <div class="section_action__inner container_section">
      <div class="section__head">
        <h2 class="section__title">
          <span>Оставить заявку на</span> <br />
          тех. обслуживание
        </h2>
      </div>
      <div class="support__form-wrapper">
        <form action="#" class="form form_default formOrder-js ajax_form">
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
                minlength="2"
                name="subject"
                required
              />
            </div>
            <div class="form__field form__field-message">
              <input
                type="text"
                class="input input_default"
                placeholder="Текст сообщения"
                minlength="2"
                name="message"
                required
              />
            </div>
          </div>
          <div class="form__action">
            <button class="btn btn_info">Оформить заявку</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>