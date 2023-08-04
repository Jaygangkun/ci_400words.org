
<div class="container-lg">
    <?php
    if (!$story) {
        ?>
        <div>Not exist story</div>
        <?php
    } else {
        ?>
        <div class="row mt-3 pb-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <div class="story-view-wrap p-3">
                        <h3 class="mb-3"><?= $story['title']?></h3>
                        <pre class="view-textarea"><?= $story['content']?></pre>
                    </div>
                </div>
                <div class="desktop-view">
                    <div class="d-flex justify-content-center mt-3">
                        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
                        <span class="fw-bold menu-page-link menu-page-link-green mx-2" id="btnStoryUpvote" <?= $isUpvoted ? "disabled" : ""?>>Upvote</span>
                        <?php
                        if ($previousStory) {
                            ?>
                            <a class="fw-bold menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/story').'/'.$previousStory->id?>">Previous</a>
                            <?php
                        } else {
                            ?>
                            <span class="fw-bold menu-page-link menu-page-link-blue mx-2" disabled>Previous</span>
                            <?php
                        }

                        if ($nextStory) {
                            ?>
                            <a class="fw-bold menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/story').'/'.$nextStory->id?>">Next</a>
                            <?php
                        } else {
                            ?>
                            <span class="fw-bold menu-page-link menu-page-link-blue mx-2" disabled>Next</span>
                            <?php
                        }
                        ?>
                        <a class="fw-bold menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/index')?>">Index</a>
                        <a class="fw-bold menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/home')?>">Home</a>
                    </div>
                </div>
                <div class="mobile-view">
                    <div>
                        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
                        <span class="fw-bold menu-page-link menu-page-link-green" id="btnStoryUpvote" <?= $isUpvoted ? "disabled" : ""?>>Upvote</span>
                    </div>
                    <div class="">
                    <?php
                        if ($previousStory) {
                            ?>
                            <a class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" href="<?=base_url('/story').'/'.$previousStory->id?>">Previous</a>
                            <?php
                        } else {
                            ?>
                            <span class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" disabled>Previous</span>
                            <?php
                        }

                        if ($nextStory) {
                            ?>
                            <a class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" href="<?=base_url('/story').'/'.$nextStory->id?>">Next</a>
                            <?php
                        } else {
                            ?>
                            <span class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" disabled>Next</span>
                            <?php
                        }
                        ?>
                        <a class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" href="<?=base_url('/index')?>">Index</a>
                        <a class="fw-bold menu-page-link menu-page-link-blue me-2 mt-2" href="<?=base_url('/home')?>">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
        (function($){
            
            $(document).on('click', '#btnStoryUpvote', function() {

                if ($(this).attr('disabled')) {
                    return;
                }

                let instance = this;

                $.ajax({
                    url: baseUrl + '/ajax/story-upvote',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);

                        $(instance).attr('disabled', true);
                    }
                })
            })
            
        })(jQuery)
        </script>
        <?php
    }
    ?>
</div>