<div class="container-lg">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card card-outline card-primary mt-5">
                <div class="card-body">
                    <h1 class="text-center">Admin</h1>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" name="old_user_name" id="old_user_name" class="form-control" placeholder="Old User Name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="new_user_name" id="new_user_name" class="form-control" placeholder="New User name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old User Password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New User Password">
                        </div>
                        <p class="mt-4 text-center">
                            <span class="fw-bold menu-page-link menu-page-link-green me-2" id="btnLogin">Change</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
(function($){
    
    $(document).on('click', '#btnLogin', function() {
        if ($('#old_user_name').val() == '') {
            alert('Please input old user name');
            $('#old_user_name').focus();
            return;
        }

        if ($('#new_user_name').val() == '') {
            alert('Please input new user name');
            $('#new_user_name').focus();
            return;
        }

        if ($('#old_password').val() == '') {
            alert('Please input old user password');
            $('#old_password').focus();
            return;
        }

        if ($('#new_password').val() == '') {
            alert('Please input new user password');
            $('#new_password').focus();
            return;
        }

        $.ajax({
            url: baseUrl + '/ajax/admin-change',
            type: 'post',
            data: {
                old_user_name: $('#old_user_name').val(),
                new_user_name: $('#new_user_name').val(),
                old_password: $('#old_password').val(),
                new_password: $('#new_password').val()
            },
            dataType: "json",
            success: function(resp) {
                if(!resp.success) {
                    alert(resp.message);
                    return;
                }

                location.href = baseUrl + '/login';
            }
        })
    })
})(jQuery)
</script>