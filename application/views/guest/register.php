<div class="content-container" id="container-register">
    <div class="lb-form register theme-public">
        <div class="form-inner">
            <div class="form-title">
                Register
            </div>
            <?= form_open('register') ?>
                <div class="form-row">
                    <div class="form-input username">
                        <?= form_label(_e('form-register-username-title'), 'register_username', array('class' => 'input-label')) ?>
                        <?= form_input(array('name' => 'register_username', 'class' => 'input-text')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input password">
                        <?= form_label(_e('form-register-password-title'), 'register_password', array('class' => 'input-label')) ?>
                        <?= form_password(array('name' => 'register_password', 'class' => 'input-text')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input passwordredo">
                        <?= form_label(_e('form-register-passwordredo-title'), 'register_passwordredo', array('class' => 'input-label')) ?>
                        <?= form_password(array('name' => 'register_passwordredo', 'class' => 'input-text')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-input submit">
                        <?= form_submit('register_submit', _e('form-register-submit'), array('class' => 'input-submit')) ?>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
