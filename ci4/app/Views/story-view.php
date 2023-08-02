
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
                    <h6><?= $story['title']?></h6>
                    <textarea class="form-control view-textarea" rows="20" readonly><?= $story['content']?></textarea>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <span class="fw-bold menu-page-link menu-page-link-green mx-2" id="btnStoryUpvote">Upvote</span>
                    <?php
                    if ($previousStory) {
                        ?>
                        <a class="menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/story').'/'.$previousStory->id?>">Prevoius</a>
                        <?php
                    } else {
                        ?>
                        <span class="menu-page-link menu-page-link-blue mx-2" disabled>Prevoius</span>
                        <?php
                    }

                    if ($nextStory) {
                        ?>
                        <a class="menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/story').'/'.$nextStory->id?>">Next</a>
                        <?php
                    } else {
                        ?>
                        <span class="menu-page-link menu-page-link-blue mx-2" disabled>Next</span>
                        <?php
                    }
                    ?>
                    <a class="menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/index')?>">Index</a>
                    <a class="menu-page-link menu-page-link-blue mx-2" href="<?=base_url('/home')?>">Home</a>
                </div>
            </div>
        </div>
        <script>
        (function($){
            
            $(document).on('click', '#btnStoryUpvote', function() {
                $.ajax({
                    url: baseUrl + '/ajax/story-upvote',
                    type: 'post',
                    data: {
                        id: <?=$story['id']?>
                    },
                    dataType: 'json',
                    success: function(resp) {
                        alert(resp.message);
                    }
                })
            })
            
        })(jQuery)
        </script>
        <?php
    }
    ?>
</div>