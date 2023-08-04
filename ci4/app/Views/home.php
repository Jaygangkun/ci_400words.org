
<div class="container-lg">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-3">400 Words is an experiment in creative, anonymous non-fiction – life stories, condensed. </h3>
            <div>
                <p>We want to hear about the moments, large and small, be they public spectacle or dearly held secret, that have shaped, defined, or changed your life or the lives of others. </p>
                <p>The only rules are that each submission must be 400 words or less and should be true, with the acknowledgement that truth and facts are not necessarily always completely synonymous.</p>
            </div>
            <?php
            if (count($stories) > 0) {
                foreach($stories as $story) {
                    ?>
                    <div class="home-story-wrap mb-2 p-2">
                        <h6><?= $story['title']?></h6>
                        <pre><?php 
                            $splits = splitByWords($story['content'], 50);

                            if (count($splits) > 0) {
                                echo $splits[0];
                            }
                            ?><span>...[<a href="<?= base_url('/story').'/'.$story['id']?>">more</a>]</span></pre>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="d-flex mt-3">
                <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
                <a class="fw-bold menu-page-link menu-page-link-blue me-2" href="<?= base_url('/index')?>">Index</a>
            </div>
        </div>
    </div>
</div>