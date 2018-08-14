<div class="content-container platform" id="container-sister-newbacklink">
    <div class="container-header">
        <div class="container-title">
            Manage backlinks
        </div>
    </div>
    <div class="container-content">
        <button class="lb-button theme-normal" onclick="openForm('newbacklink-form')">Add new backlink</button>
    </div>
</div>
<div class="content-container platform" id="container-sister-newtopic">
    <div class="container-header">
        <div class="container-title">
            Topics
        </div>
    </div>
    <div class="container-content">
        <div class="newtopic-wrapper">
            <div class="newtopic-title">
                Add a new topic
            </div>
            <div class="lb-form newtopic theme-single">
                <div class="form-inner">
                    <?= form_open('platform/sisters/sister/'.$sister['name_slug']) ?>
                        <div class="form-row">
                            <div class="form-input name">
                                <?= form_label(_e('form-newtopic-name'), 'newtopic-name', array('class' => 'input-label')) ?>
                                <?= form_input(array('name' => 'newtopic_name', 'class' => 'input-text')) ?>
                            </div>
                            <div class="form-input submit">
                                <?= form_submit('newtopic_submit', '+', array('class' => 'input-submit')) ?>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-container platform" id="container-sister-backlinks">
    <div class="container-header">
        <div class="container-title">
            Manage backlinks
        </div>
    </div>
    <div class="container-content">
        <div class="backlinks-field">
            <div class="backlinks-top">
                <div class="backlinks-search">
                    <?= form_input(array('name' => 'login_username', 'class' => 'search-input', 'id' => 'filterstring')) ?>
                    <div class="search-button" id="filterButton">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="backlinks-content">
                <ul id="backLinkList">
                </ul>
            </div>
        </div>
        <script>
        $( "#filterButton" ).click(function(e)
        {
            submitFilterQuery();
        });
        $('#filterstring').keypress(function(e) {
            if(e.which == 13) {
                submitFilterQuery();
            }
        });
        $(window).ready(function(e)
        {
            submitFilterQuery();
        });

        function submitFilterQuery() {
            var filterString = $("#filterstring").val();
            var sisPageId = <?= $sister['id'] ?>;

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>platform/sisters/ajax",
                    data:{
                        filterString:filterString,
                        sisterId:sisPageId
                    },
                    datatype: "json",
                    success:function(response)
                    {
                        filterBacklinks(response);
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
<div class="content-container platform" id="container-sister-topics">
    <div class="container-header">
        <div class="container-title">
            Manage topics
        </div>
    </div>
    <div class="container-content">
        <div class="subject-title">
            Topics
        </div>
        <div class="topics-field">
        <?php if(count($topics) <= 0) { ?>
            <div class="sister-topics-message">
                No sister pages found.
            </div>
        <?php } ?>
            <div class="sister-topics">
            <?php
            $i = 1;
            foreach ($topics as $topic) {
                $backlinks = $this->sisters_model->get_backlinks($topic['id']);
                if($i >= 3) {$i = 1;}
            ?>
                <div class="sister-topic">
                    <div class="topic-top">
                        <?= $topic['name'] ?>
                    </div>
                    <div class="topic-content">
                        <ul class="topic-backlinks">
                        <?php foreach($backlinks as $backlink) { ?>
                            <li class="topic-backlink"><a href="<?= $backlink['link'] ?>"><?= $backlink['anchortag'] ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php
            $i++;
            }
            ?>
            </div>
        </div>
    </div>
</div>

<div class="lb-form theme-platform newbacklink" id="newbacklink-form">
    <div class="form-back" onclick="closeForm('newbacklink-form')">
    </div>
    <div class="form-inner">
        <div class="form-title">
            New backlink
        </div>
        <?= form_open('platform/sisters/sister/'.$sister['name_slug']) ?>
            <div class="form-row">
                <div class="form-input anchortag">
                    <?= form_label('Anchor tag', 'newbacklink-anchortag', array('class' => 'input-label')) ?>
                    <?= form_input(array('name' => 'newbacklink_anchortag', 'class' => 'input-text')) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input link">
                    <?= form_label('Link', 'newbacklink-link', array('class' => 'input-label')) ?>
                    <?= form_input(array('name' => 'newbacklink_link', 'class' => 'input-text')) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input topic">
                    <?= form_label('Topic', 'newbacklink-topic', array('class' => 'input-label')) ?>
                    <?= form_dropdown(array('name' => 'newbacklink_topic', 'class' => 'input-text'), $topics_form) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-input submit">
                    <?= form_submit('newbacklink_submit', 'Add backlink', array('class' => 'input-submit')) ?>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
