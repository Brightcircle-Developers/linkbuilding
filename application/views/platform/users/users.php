<div class="content-container platform" id="container-users-userlist">
    <div class="container-header">
        <div class="container-title">
            All users
        </div>
    </div>
    <div class="container-content">
        <div class="usermanage">
            <div class="useroptions">
                <div class="user-add">
                    <button class="lb-button theme-normal" onclick="openForm('adduser-form')">Create new</button>
                </div>
                <div class="user-current">
                    <div class="user-current-inner">
                        <div class="user-top">
                            <div class="userinfo-image" id="ui-image">
                            </div>
                        </div>
                        <div class="user-bottom">
                            <div class="user-info">
                                <ul class="user-info-list">
                                    <li>
                                        <div class="userinfo-title">Name:</div>
                                        <div class="userinfo-value" id="ui-name"></div>
                                    </li>
                                    <li>
                                        <div class="userinfo-title">Level:</div>
                                        <div class="userinfo-value" id="ui-level"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="userfield">
                <div class="userfield-header">
                </div>
                <div class="userfield-content">
                    <table class="table-table usertable" cellpadding="0" cellspacing="0" id="usertable">
                        <tr>
                            <th class="tbtn" fname="id"><div class="table-data" id="theader-id">ID<i class="fas fa-sort-down"></i></div></th>
                            <th class="tbtn" fname="name"><div class="table-data" id="theader-name">Name<i class="fas fa-sort-down"></i></div></th>
                            <th class="tbtn" fname="level"><div class="table-data" id="theader-level">Level<i class="fas fa-sort-down"></i></div></th>
                        </tr>
                    </table>
                    <script>
                    $(window).ready(function(e)
                    {
                        getUsersBy();
                    });

                    function getUsersBy() {

                        $.ajax(
                            {
                                type:"post",
                                url: "<?php echo base_url(); ?>platform/users/userdata",
                                data:{
                                    filterType: $("#usertable").attr("tfilter")
                                },
                                datatype: "json",
                                success:function(response)
                                {
                                    filterUsers(response);
                                },
                                error: function(xhr,status,error)
                                {
                                    console.log(xhr+"///"+status+"///"+error)
                                }
                            }
                        );
                    }
                </script>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="lb-form theme-platform adduser" id="adduser-form">
    <div class="form-back" onclick="closeForm('adduser-form')">
    </div>
    <div class="form-inner">
        <div class="form-title">
            Create user
        </div>
        <?= form_open('platform/users') ?>
            <div class="form-row">
                <div class="form-input username">
                    <?= form_label('Username', 'adduser-username', array('class' => 'input-label')) ?>
                    <?= form_input(array('name' => 'adduser_username', 'class' => 'input-text')) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input password">
                    <?= form_label('Password', 'adduser-password', array('class' => 'input-label')) ?>
                    <?= form_input(array('name' => 'adduser_password', 'class' => 'input-text')) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input passwordredo">
                    <?= form_label('Confirm password', 'adduser-passwordredo', array('class' => 'input-label')) ?>
                    <?= form_input(array('name' => 'adduser_passwordredo', 'class' => 'input-text')) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input level">
                    <?= form_label('Level', 'adduser-level', array('class' => 'input-label')) ?>
                    <?= form_dropdown(array('name' => 'adduser_level', 'class' => 'input-text'), $userlevels_form) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input submit">
                    <?= form_submit('adduser_submit', 'Add user', array('class' => 'input-submit')) ?>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<div class="popup">
    <div class="popup-back" onclick="closeUser()">
    </div>
    <div class="popup-inner">
    </div>
</div>
