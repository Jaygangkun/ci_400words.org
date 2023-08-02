
<div class="container-lg">
    <h1 class="mt-3">Admin Editorial Page</h1>
    <?php
    if (!$story) {
        ?>
        <div>Not exist story</div>
        <?php
    } else {
        ?>
        <div class="row pb-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title" value="<?= $story['title']?>">
                </div>
                <div class="mb-3">
                    <label for="content" class="col-form-label">Content:</label>
                    <textarea class="form-control" rows="10" id="content"><?= $story['content']?></textarea>
                    <div class="mt-3 text-end">Word Count: <span id="wordsCount"><?= $story['words']?></span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="">
                            <label for="upvotes" class="col-form-label">Upvotes:</label>
                            <input type="text" class="form-control" id="upvotes" value="<?=$story['upvotes']?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                            <label for="views" class="col-form-label">Views:</label>
                            <input type="text" class="form-control" id="views" value="<?=$story['views']?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="form-check">
                            <label class="form-check-label" for="is_best_of">
                            Best Of
                            </label>
                            <input class="form-check-input" type="checkbox" id="is_best_of" <?= $story['is_best_of'] == 1 ? 'checked' : '' ?>>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_home" <?= $story['is_home'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="is_home">
                            Home
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="notes" class="col-form-label">Notes:</label>
                    <textarea class="form-control" rows="6" id="notes"><?= $story['notes']?></textarea>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <?php
                        if ($story['is_publish'] == 1) {
                            ?>
                            <!-- <span class="fw-bold menu-page-link menu-page-link-yellow me-2" id="btnStoryUnpublish">Unpublish</span> -->
                            <?php
                        } else {
                            ?>
                            
                            <?php
                        }
                        ?>
                        <span class="fw-bold menu-page-link menu-page-link-green me-2" id="btnStoryPublish">Publish</span>
                        <a class="menu-page-link menu-page-link-blue" href="<?=base_url('/manage-stories')?>">Admin Home</a>
                    </div>
                    <div>
                        <?php
                        if ($story['is_show'] == 1) {
                            ?>
                            <span class="menu-page-link menu-page-link-blue me-2 ms-8" id="btnStoryHide">Hide</span>
                            <?php
                        } else {
                            ?>
                            <span class="menu-page-link menu-page-link-green me-2 ms-8" id="btnStoryShow">Show</span>
                            <?php
                        }
                        ?>
                        
                        <span class="fw-bold menu-page-link menu-page-link-red" id="btnStoryDelete">Delete</span>
                    </div>
                </div>
            </div>
        </div>
        <script>
        (function($){
            $(document).on('keyup', '#content', function(event) {

            let wordsCount = countWords($(this).val());

                if (wordsCount > maxWordsCount) {
                    $('#wordsCount').css('color', '#ff0000');
                    $('#btnStoryPublish').attr('disabled', true);
                } else {
                    $('#wordsCount').css('color', '#000000');
                    $('#btnStoryPublish').attr('disabled', false);
                }

                $('#wordsCount').text(wordsCount);
            })
            
            $(document).on('click', '#btnStoryPublish', function() {
                if ($(this).attr('disabled')) {
                    return;
                }
                
                $.ajax({
                    url: baseUrl + '/ajax/story-publish',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>,
                        title: $('#title').val(),
                        content: $('#content').val(),
                        upvotes: $('#upvotes').val(),
                        views: $('#views').val(),
                        words: $('#wordsCount').text(),
                        notes: $('#notes').val(),
                        is_home: $('#is_home').is(':checked') ? 1 : 0,
                        is_best_of: $('#is_best_of').is(':checked') ? 1 : 0
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                        location.href = "<?=base_url('/manage-stories?subPage=awaitingReview&redirect=1')?>";
                    }
                })
            })

            $(document).on('click', '#btnStoryUnpublish', function() {
                $.ajax({
                    url: baseUrl + '/ajax/story-change-publish',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>,
                        value: 0
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                        location.reload();
                    }
                })
            })

            $(document).on('click', '#btnStoryDelete', function() {
                $.ajax({
                    url: baseUrl + '/ajax/story-delete',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                        location.href = baseUrl + '/manage-stories';
                    }
                })
            })

            $(document).on('click', '#btnStoryHide', function() {
                $.ajax({
                    url: baseUrl + '/ajax/story-change-visibility',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>,
                        value: 0
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                        location.reload();
                    }
                })
            })

            $(document).on('click', '#btnStoryShow', function() {
                $.ajax({
                    url: baseUrl + '/ajax/story-change-visibility',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>,
                        value: 1
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                        location.reload();
                    }
                })
            })

            
        })(jQuery)
        </script>
        <?php
    }
    ?>
</div>