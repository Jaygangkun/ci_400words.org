
<div class="container-lg">
    <h1 class="mt-3">Index</h1>
    <div class="d-flex align-items-center sortby-wrap">
        <span class="sortby-wrap-title">Sort by:</span>
        <ul class="nav">
            <li class="nav-item">
                <span class="me-2 menu-page-link menu-page-link-blue nav-link1 btn-story-sort" <?= $sort == 'alphabetical' ? "disabled": "" ?> data-value="<?= getSorts()['alphabetical']?>">A-Z</span>
            </li>
            <li class="nav-item">
                <span class="me-2 menu-page-link menu-page-link-blue nav-link1 btn-story-sort" <?= $sort == 'popular' ? "disabled": "" ?> data-value="<?= getSorts()['popular']?>">popular</span>
            </li>
            <li class="nav-item">
                <span class="me-2 menu-page-link menu-page-link-blue nav-link1 btn-story-sort" <?= $sort == 'newest' ? "disabled": "" ?> data-value="<?= getSorts()['newest']?>">newest</span>
            </li>
            <li class="nav-item">
                <span class="menu-page-link menu-page-link-blue nav-link1 btn-story-sort" <?= $sort == 'oldest' ? "disabled": "" ?> data-value="<?= getSorts()['oldest']?>">oldest</span>
            </li>
        </ul>
    </div>
    <table id="stories" class="table mt-3 pb-3">
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
        <tfoot>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex mt-3">
        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
        <a class="fw-bold menu-page-link menu-page-link-blue me-2" href="<?= base_url('/home')?>">Home</a>
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
    padding: 0px 5px;
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

.table>:not(:first-child) {
    border-top: 0px;
}

table {
    border-top: 2px solid #000000 !important;
    /* background: #caf0fe; */
}

@media screen and (max-width: 768px) {

}
</style>
<script>
const pageLength = 40;
const removeColIndex2 = 2;
const removeColIndex3 = 3;

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
                d.sort = $('.btn-story-sort[disabled]').attr('data-value'),
                d.isMobile = window.outerWidth < 768 ? 1 : 0
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

    if (window.outerWidth < 768) {
        table.column(removeColIndex2).visible(false);
        table.column(removeColIndex3).visible(false);
    }
    

    $(document).on('click', '.btn-story-sort', function() {

        if ($(this).attr('disabled')) {
            return;
        }

        $('.btn-story-sort').attr('disabled', false);

        $(this).attr('disabled', true);

        table.ajax.reload();
    })
})(jQuery)
</script>