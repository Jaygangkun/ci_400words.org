
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
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
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
        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
        <a class="menu-page-link menu-page-link-blue me-2" href="<?= base_url('/index')?>">Index</a>
        <a class="menu-page-link menu-page-link-blue me-2" href="<?= base_url('/home')?>">Home</a>
    </div>
</div>
<style>
#stories_wrapper .row:first-of-type {
  display: none;
}

.table>:not(caption)>*>* {
    border-width: 0px;
}

.table tbody tr td {
    padding: 0px;
}

.table tbody tr {
    display: none;
}

.table tbody tr:nth-of-type(40n+1),
.table tbody tr:nth-of-type(40n+2),
.table tbody tr:nth-of-type(40n+3),
.table tbody tr:nth-of-type(40n+4),
.table tbody tr:nth-of-type(40n+5),
.table tbody tr:nth-of-type(40n+6),
.table tbody tr:nth-of-type(40n+7),
.table tbody tr:nth-of-type(40n+8),
.table tbody tr:nth-of-type(40n+9),
.table tbody tr:nth-of-type(40n+10) {
    display: table-row;
}

</style>
<script>
const pageLength = 40;

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