<div class="content-container" id="container-sisterindex">
    <div class="sisterindex-top">
        <div class="si-search">
            <div class="lb-form sisterindex">
                <div class="form-inner">
                    <?= form_open('sisters') ?>
                        <div class="form-row">
                            <div class="form-input name">
                                <?= form_input(array('name' => 'sisterindex_name', 'class' => 'input-text')) ?>
                            </div>
                            <div class="form-input submit">
                                <?= form_submit('sisterindex_submit', 'search', array('class' => 'input-submit')) ?>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sisterindex-content">
        <ul class="si-list">
        <?php foreach($sisters as $sister) { ?>
            <li><a href="<?= $sister['link'] ?>"><?= $sister['name'] ?></a></li>
        <?php } ?>
        </ul>
    </div>
</div>
