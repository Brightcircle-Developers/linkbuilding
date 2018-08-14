<div class="content-container" id="container-form-login">
    <div class="lb-form login theme-public">
        <div class="form-inner">
            <div class="form-title">
                Login
            </div>
            <?= form_open('login') ?>
                <div class="form-row">
                    <div class="form-input username">
                        <?= form_label(_e('form-login-username-title'), 'login_username', array('class' => 'input-label')) ?>
                        <?= form_input(array('name' => 'login_username', 'class' => 'input-text')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input password">
                        <?= form_label(_e('form-login-password-title'), 'login_password', array('class' => 'input-label')) ?>
                        <?= form_password(array('name' => 'login_password', 'class' => 'input-text')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input submit">
                        <?= form_submit('login_submit', _e('form-login-submit'), array('class' => 'input-submit')) ?>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
    Don't have an account?<br /><a href="<?= site_url('register') ?>">Register here</a>.
</div>
