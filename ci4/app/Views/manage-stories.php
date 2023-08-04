<div class="container-lg">
    <h1 class="mt-3">Manage Stories</h1>
    <div class="d-flex align-items-center">
        <span>Sort by:</span>
        <ul class="nav">
            <li class="nav-item">
                <span class="nav-link btn-story-sort <?= $subPage == 'alphabetical' ? "disabled": "" ?>" data-value="<?= getSorts()['alphabetical']?>">[alphabetical]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort <?= $subPage == 'popular' ? "disabled": "" ?>" data-value="<?= getSorts()['popular']?>">[popular]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort <?= $subPage == 'newest' ? "disabled": "" ?>" data-value="<?= getSorts()['newest']?>">[newest]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort <?= $subPage == 'oldest' ? "disabled": "" ?>" data-value="<?= getSorts()['oldest']?>">[oldest]</span>
            </li>
            <li class="nav-item">
                <span class="nav-link btn-story-sort <?= $subPage == 'awaitingReview' ? "disabled": "" ?>" data-value="<?= getSorts()['awaitingReview']?>">[awaiting review: <?= $awaitingCount?>]</span>
            </li>
        </ul>
    </div>
    <h3>Live Stories</h3>
    <table id="stories" class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Sub No</th>
                <th scope="col">Title</th>
                <th scope="col">Upvotes</th>
                <th scope="col">Views</th>
                <th scope="col">Best Of</th>
                <th scope="col">Home</th>
                <th scope="col">Words</th>
                <th scope="col">Time/Date</th>
                <th scope="col">Show/Hide</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</div>
<style>
#stories_wrapper .row:first-of-type {
  display: none;
}

table td {
    padding: 5px !important;
}

</style>
<script>
const pageLength = 20;
const showColumnIndex = 8;
const actionColumnIndex = 9;

(function($){
    // $(document).on('keyup', '#search', function() {
    //     table.search($(this).val()).draw(false);
    // })
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
            url: baseUrl + '/ajax/story-load',
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

    $(document).on('click', '.btn-status-toggle', function() {
        $.ajax({
            url: baseUrl + '/ajax/story-change-visibility',
            type: 'post',
            data: {
                id: $(this).attr('data-id'),
                value: $(this).attr('data-value')
            },
            dataType: 'json',
            success: function(resp) {
                // alert(resp.message);
                table.ajax.reload();
            }
        })
    })

    $(document).on('click', '.action-link-delete', function() {
        $.ajax({
            url: baseUrl + '/ajax/story-delete',
            type: 'post',
            data: {
                id: $(this).attr('data-id')
            },
            dataType: 'json',
            success: function(resp) {
                // alert(resp.message);
                table.ajax.reload();
            }
        })
    })

    $(document).on('click', '.btn-story-sort', function() {
        $('.btn-story-sort').removeClass('disabled');
        $(this).addClass('disabled');

        if ($(this).attr('data-value') == '<?= getSorts()['awaitingReview']?>') {
            table.column(showColumnIndex).visible(false);
            table.column(actionColumnIndex).visible(false);
        } else {
            table.column(showColumnIndex).visible(true);
            table.column(actionColumnIndex).visible(true);
        }

        table.ajax.reload();
    })
})(jQuery)
</script>