<div class="content-container" id="container-sisters">
    <div class="container-content">
        <div class="sisters-field">
            <div class="sisters-scheme lb-table theme-data">
                <div class="table-top">
                    Sister pages
                </div>
                <table class="table-table" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><div class="table-data">Name</div></th>
                        <th><div class="table-data">Address</div></th>
                    </tr>
                <?php foreach($sisters as $sister) { ?>
                    <tr class="table-row">
                        <td><div class="row-data"><a href="<?= site_url('platform/sisters/sister/'.$sister['name_slug']) ?>"><?= $sister['name'] ?></a></div></td>
                        <td><div class="row-data"><a href="<?= $sister['link'] ?>"><?= $sister['link'] ?></a></div></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
        <div class="sisters-options">
            <div class="lb-button theme-normal button-add-sister">
                <a href="<?= site_url('platform/sisters/add') ?>">
                    Create new
                </a>
            </div>
        </div>
    </div>
</div>
