
<div class="container-lg" id="indexs_container">
    <h1 class="mt-3" id="page_title">Index</h1>
    <div class="d-flex align-items-center sortby-wrap justify-content-between index-top-wrap">
        <span class="sortby-wrap-title">Sort by:</span>
        <ul class="nav nav-wrap">
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
        <div class="search-wrap">
            <div class="d-flex align-items-center">
                <span class="me-2">Search:</span>
                <input type="text" class="form-control me-2 p-1" id="search_keyword">
                <span class="fw-bold menu-page-link menu-page-link-green" id="btn_search">Go</span>
            </div>
        </div>
    </div>
    <div class="results" id="results">
        
    </div>
    
    <div class="d-flex mt-3">
        <a class="fw-bold menu-page-link menu-page-link-green me-2" href="<?= base_url('/submit')?>">Submit a Piece</a>
        <a class="fw-bold menu-page-link menu-page-link-blue me-2" href="<?= base_url('/home')?>">Home</a>
    </div>
</div>
<style>
.page-link {
    cursor: pointer;
}

#indexs_container {
    max-width: 1050px;
}

@media screen and (max-width: 767px) {

    .index-top-wrap {
        flex-wrap: wrap;
    }

    .sortby-wrap-title {
        display: none;
    }

    .search-wrap {
        order: 1;
        margin-top: 10px;
    }

    .nav-wrap {
        order: 2;
    }

    .nav-wrap .nav-item {
        margin-top: 10px;
    }
}
</style>
<script>
const pageHeight = 10;
let curPageIndex = 0;
let pageCount = 0;
let isSearch = 0;

(function($){    

    $(document).on('click', '.btn-story-sort', function() {

        if ($(this).attr('disabled')) {
            return;
        }

        $('.btn-story-sort').attr('disabled', false);

        $(this).attr('disabled', true);

        loadData();
    })

    
    function loadData() {

        $.ajax({
            url: baseUrl + '/ajax/story-index-load',
            type: 'post',
            data: {
                sort: $('.btn-story-sort[disabled]').attr('data-value'),
                curPageIndex: curPageIndex,
                pageHeight: pageHeight,
                isMobile: window.outerWidth < 768 ? 1 : 0,
                searchKeyword: $('#search_keyword').val(),
                isSearch: isSearch
            },
            success: function(resp) {

                if (isSearch == 1 && $('#search_keyword').val() != '') {
                    $('#page_title').text('Search Results')
                } else {
                    $('#page_title').text('Index')
                }
                
                $('#results').html(resp);
            }
        })
    }

    loadData();

    $(document).on('click', '.page-link', function() {
        curPageIndex = $(this).attr('data-pIndex');

        loadData();
    })

    $(document).on('click', '#btn_search', function() {
        isSearch = 1;
        curPageIndex = 0;

        loadData();
    })

})(jQuery)
</script>