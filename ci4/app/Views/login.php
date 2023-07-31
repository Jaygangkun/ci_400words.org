<div class="container-lg">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card card-outline card-primary mt-5">
                <div class="card-body">
                    <h1 class="text-center">Admin Login</h1>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        
                        <p class="mt-4 text-center">
                            <span class="fw-bold menu-page-link menu-page-link-green me-2" id="btnLogin">Login</span>
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
        if ($('#user_name').val() == '') {
            alert('Please input user name');
            $('#user_name').focus();
            return;
        }

        if ($('#password').val() == '') {
            alert('Please input password');
            $('#password').focus();
            return;
        }

        $.ajax({
            url: baseUrl + '/ajax/login',
            type: 'post',
            data: {
                user_name: $('#user_name').val(),
                password: $('#password').val()
            },
            dataType: "json",
            success: function(resp) {
                if(!resp.success) {
                    alert(resp.message);
                    return;
                }

                location.href = baseUrl + '/manage-stories';
            }
        })
    })
})(jQuery)
</script>