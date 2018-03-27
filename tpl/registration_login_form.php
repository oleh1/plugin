<?php if(!$_GET['personal_area']){ ?>

    <form id="wac2_login_company_user" method="post">
        <span class="message"></span>

        <div class="row_wac2_login_company_user">
            <div>
                <label for="username">Ваш логин</label>
            </div>
            <div>
                <input type="text" name="username" id="username">
            </div>
        </div>
        <div class="row_wac2_login_company_user">
            <div>
                <label for="password">Ваш пароль</label>
            </div>
            <div>
                <input type="password" name="password" id="password">
            </div>
        </div>

        <div class="remember_wac2_login_company_user">
            <div>
                <label for="remember">Запомнить меня</label>
            </div>
            <div>
                <input id="remember" name="rememberme" type="checkbox" value="rememberme">
            </div>
            <div>
                <a href="<?= get_site_url(null, $_SERVER['REQUEST_URI'].'?personal_area=password_recovery', 'https') ?>">Забыли пароль?</a>
            </div>
            <div>
                <a href="<?= get_site_url(null, $_SERVER['REQUEST_URI'].'?personal_area=registration', 'https') ?>">Регистрация</a>
            </div>
        </div>

        <input type="hidden" name="wac2_remote_addr" value="<?= $_SERVER["REMOTE_ADDR"] ?>">

        <div class="captcha-item" id="captcha_callback1"></div>

        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>

        <input class="wac2_login_submit" type="submit" value="Войти" name="submit">

    </form>

<?php }else if($_GET['personal_area'] == 'registration'){ ?>

    <div class="message"></div>
    <form method="post" class="wac2_registration_company2">
        <div class="row_wac2_registration_company2">
            <div>
                <label for="username">Логин <strong>*</strong></label>
            </div>
            <div>
                <input type="text" name="username" id="username" value="<?= ( isset( $_POST['username'] ) ? $username : null ) ?>">
            </div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="password">Пароль <strong>*</strong></label>
            </div>
            <div>
                <input type="password" name="password" id="password" value="<?= ( isset( $_POST['password'] ) ? $password : null ) ?>">
            </div>
            <div><div><img src="<?= plugins_url( '../img/eye.png', __FILE__ ); ?>"></div></div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="password_repeat">Повторите пароль <strong>*</strong></label>
            </div>
            <div>
                <input type="password" name="password" id="password_repeat" value="<?= ( isset( $_POST['password'] ) ? $password : null ) ?>">
            </div>
            <div><div><img src="<?= plugins_url( '../img/eye.png', __FILE__ ); ?>"></div></div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="email">Адрес электронной почты <strong>*</strong></label>
            </div>
            <div>
                <input type="text" name="email" id="email" value="<?= ( isset( $_POST['email']) ? $email : null ) ?>">
            </div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="website">Веб-сайт</label>
            </div>
            <div>
                <input type="text" name="website" id="website" value="<?= ( isset( $_POST['website']) ? $website : null ) ?>">
            </div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="firstname">Имя</label>
            </div>
            <div>
                <input type="text" name="fname" id="firstname" value="<?= ( isset( $_POST['fname']) ? $first_name : null ) ?>">
            </div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="lastname">Фамилия</label>
            </div>
            <div>
                <input type="text" name="lname" id="lastname" value="<?= ( isset( $_POST['lname']) ? $last_name : null ) ?>">
            </div>
        </div>

        <div class="row_wac2_registration_company2">
            <div>
                <label for="nickname">Ник</label>
            </div>
            <div>
                <input type="text" name="nickname" id="nickname" value="<?= ( isset( $_POST['nickname']) ? $nickname : null ) ?>">
            </div>
        </div>

        <div class="bio_wac2_registration_company2">
            <div>
                <label for="bio">Немного о себе</label>
            </div>
            <div>
                <textarea name="bio" id="bio"><?= ( isset( $_POST['bio']) ? $bio : null ) ?></textarea>
            </div>
        </div>

        <div class="remember_wac2_registration_company2">
            <div>
                <label for="remember">Запомнить меня</label>
            </div>
            <div>
                <input id="remember" type="checkbox" name="remember" value="remember">
            </div>
        </div>

        <?php $url = wp_parse_url( $_SERVER['REQUEST_URI'] ) ?>
        <input type="hidden" name="url" value="<?= get_site_url(null, $url['path'], 'https') ?>">

        <div class="captcha-item" id="captcha_callback1"></div>

        <input class="submit_wac2_registration_company2" type="submit" name="submit" value="Зарегистрироваться"/>
    </form>

<?php }else if($_GET['personal_area'] == 'password_recovery'){ ?>

    <?php if (is_user_logged_in()) { // если юзер залогинен, то менять ему ничего не надо ?>
        <p>Вы авторизованы.</p>
    <?php } else { // если не залогинен, покажем форму для логина ?>
        <div class="password_recovery">
            <div>Укажите свой e-mail или логин, под которым вы зарегистрированы на сайте и на Вашу почту будет отправлена информация о восстановлении пароля.</div>
            <div>
                <div class="message"></div>
                <form name="lostpasswordform" id="lostpasswordform" method="post" class="userform" action="">
                    <input type="text" name="user_login" placeholder="Ваш логин или e-mail">
                    <input type="submit" value="Отправить">
                    <input type="hidden" name="redirect_to" value="/"> <!-- можно не заполнять если редирект не нужен -->
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('lost_password'); ?>">
                    <input type="hidden" name="action" value="lost_password">
                    <input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
                    <div class="response"></div>
                </form>
            </div>
        </div>
    <?php } ?>

<?php }else if($_GET['personal_area'] == 'change_password'){ ?>

    <?php if (!isset($_GET['key']) || !isset($_GET['login']) || is_wp_error(check_password_reset_key($_GET['key'], $_GET['login']))) { // если параметры не передали или ф-я проверки вернула ошибку
        echo '<p>Ключ и (или) логин ни были переданы, либо не верны.</p>';
        //resetpass
    } else { // если все ок показываем форму ?>
        <div class="change_password">
            <div>Укажите свой новый пароль</div>
            <div>
                <div class="message"></div>
                <form name="resetpassform" id="resetpassform" action="" method="post" class="userform">
                    <input type="password" name="pass1" id="pass1" placeholder="Новый пароль">
                    <input type="password" name="pass2" id="pass2" placeholder="Повторите новый пароль">
                    <input type="hidden" name="key" value="<?php echo esc_attr($_GET['key']); ?>"><!-- переданные параметры сунем в скрытые поля -->
                    <input type="hidden" name="login" value="<?php echo esc_attr($_GET['login']); ?>">
                    <input type="submit" value="Изменить пароль">
                    <input type="hidden" name="redirect_to" value="<?php echo isset($_GET['redirect_to']) ? $_GET['redirect_to'] : '/'; ?>">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('reset_password'); ?>">
                    <input type="hidden" name="action" value="reset_password_front">
                    <div class="response"></div>
                </form>
            </div>
        </div>
    <?php } ?>

<?php } ?>
