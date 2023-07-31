
<div class="container-lg">
    <h1 class="mt-3">Index</h1>
    <div class="d-flex align-items-center">
        <span>Sort by:</span>
        <ul class="nav">
            <li class="nav-item">
                <span class="nav-link btn-story-sort disabled" data-value="<?= getSorts()['alphabetical']?>">[alphabetical]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort" data-value="<?= getSorts()['popular']?>">[popular]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort" data-value="<?= getSorts()['newest']?>">[newest]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort" data-value="<?= getSorts()['oldest']?>">[oldest]</span>
            </li>
        </ul>
    </div>
    <table id="stories" class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>

    <div class="mt-5">
        <h6>Have feedback for us?</h6>
        <p>Tell us: <a href="mailto:400wordseditor@gmail.com">400wordseditor@gmail.com</a></p>
    </div>

    <div class="d-flex mt-3">
        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit</a>
        <a class="menu-page-link menu-page-link-yellow me-2" href="<?= base_url('/indexs')?>">Index</a>
        <a class="menu-page-link menu-page-link-yellow me-2" href="<?= base_url('/home')?>">Home</a>
    </div>
</div>
<style>
#stories_wrapper .row:first-of-type {
  display: none;
}
</style>
<script>
const pageLength = 60;

(function($){
    var table = $('#stories').DataTable({
        "pagingType": 'full_numbers',
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        'pageLength': pageLength,
        'ajax': {
            url: baseUrl + '/ajax/story-index-load',
            type: 'post',
            data: function(d) {
                d.sort = $('.btn-story-sort.disabled').attr('data-value')
            }
        },
        'drawCallback': function(settings){
            var $api = this.api();
            var pages = $api.page.info().pages;

            if (pages == 1) {
                $('#stories_paginate').hide();
            } else {
                $('#stories_paginate').show();
            }
        }
    });

    $(document).on('click', '.btn-story-sort', function() {
        $('.btn-story-sort').removeClass('disabled');
        $(this).addClass('disabled');

        table.ajax.reload();
    })
})(jQuery)
</script>