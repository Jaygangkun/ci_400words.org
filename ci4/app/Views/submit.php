<div class="container-lg">
    <h1 class="mt-3">Submit a piece</h1>
    <a href="<?=base_url('/guide')?>">Guidelines</a>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="content" class="col-form-label">Content:</label>
                <textarea class="form-control" rows="10" id="content"></textarea>
                <div class="mt-3 text-end">Word Count: <span id="wordsCount">0</span></div>
            </div>

            <div class="mt-3">
                <span class="fw-bold menu-page-link menu-page-link-green me-2" id="btnSubmit">Submit</span>
                <a class="fw-bold menu-page-link menu-page-link-blue me-2" href="<?=base_url('/home')?>">Home</a>
                <a class="fw-bold menu-page-link menu-page-link-blue" href="<?=base_url('/index')?>">Index</a>
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
            $('#btnSubmit').attr('disabled', true);
        } else {
            $('#wordsCount').css('color', '#000000');
            $('#btnSubmit').attr('disabled', false);
        }

        $('#wordsCount').text(wordsCount);
    })

    $(document).on('click', '#btnSubmit', function() {
        if ($(this).attr('disabled')) {
            return;
        }
        
        if ($('#title').val() == '') {
            alert('Please Input title');
            $('#title').focus();
            return;
        }

        if ($('#content').val() == '') {
            alert('Please Input content');
            $('#content').focus();
            return;
        }

        $.ajax({
            url: baseUrl + '/ajax/story-submit',
            type: 'post',
            data: {
                title: $('#title').val(),
                content: $('#content').val(),
                words: $('#wordsCount').text()
            },
            dataType: "json",
            success: function(resp) {
                if(resp.success) {
                    location.href = baseUrl + '/submit-success';
                }
            }
        })
    })
})(jQuery)
</script>