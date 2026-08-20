<!-- ========start-Login============ -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-color-brand">
        <div class="modal-header grid-header">
            <div></div>
            <div style="text-align:center;"><img class="logo-api" style="width:100%;" src="/icon/logo.jpg"></div>
            <div></div>
        </div>
       <form method="POST" action="{{ route('login') }}" id="modal-login">
        @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="@lang('home.username')" id="username" name="email" type="text" value="">
                    <div style="padding-top: 5px;"></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>@lang('home.username_wrong')</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control @error('password') is-invalid @enderror" placeholder="@lang('home.password')" id="password" name="password" type="password" value="">
                    <div style="padding-top: 5px;"></div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>@lang('home.password_wrong')</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-line btn text-white btn-next btn-modal-size" style="margin-left: 5px;" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">
                    @lang('home.register')
                </div>
                <button class="btn btn-line text-white btn-next button" type="submit">
                    @lang('home.login') </button>
            </div>
        
        </form>
    </div>
    </div>
</div>
<!-- ========end-Login============ -->
<style>
    .grid-header {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: auto;
        padding-top: 10px
    }
</style>
<!-- ========start-Register============ -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-color-brand">
                <div class="modal-header grid-header">
                    <div></div>
                    <div style="text-align:center;"><img class="logo-api" style="width:100%;" src="/icon/logo.jpg"></div>
                    <div></div>
                </div>
            {{-- <form id="register_form" method="POST" action="{{ url('/user/register') }}"> --}}
                <form id="register_form">
                @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input class="form-control" class="form-control" placeholder="@lang('home.username')" id="rname" name="email1" type="text" value="">
                            <div style="padding-top: 5px;"></div>
                            <span class="invalid-feedback" role="alert">
                                <strong id="username_wrong"></strong>
                            </span>
                    
                        </div>

                        <div class="mb-3">
                            <input class="form-control" placeholder="@lang('home.password')" id="rpassword" name="password" type="password" value="">
                            <div style="padding-top: 5px;"></div>
                            <span class="invalid-feedback" role="alert">
                                <strong id="password_wrong"></strong>
                            </span>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" placeholder="@lang('home.phone')" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="phone" name="phone" type="text" value="">
                            <div style="padding-top: 5px;"></div>
                            <span class="invalid-feedback" role="alert">
                                <strong id="phone_wrong"></strong>
                            </span>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-line text-white btn-next button" type="submit">
                            @lang('home.register') 
                        </button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $("#loginModal").on("show.bs.modal", function(event) {
            $("#username").val('');
            $("#password").val('');
        })
        $("#registerModal").on("show.bs.modal", function(event) {
            $('#loginModal').modal('hide');
            $("#rname").val('');
            $("#phone").val('');
            $("#rpassword").val('');
        })
        $('#rname').keyup(function() {
            $('#rname').removeClass('is-invalid');
        });
        $('#phone').keyup(function() {
            $('#phone').removeClass('is-invalid');
        });
        $('#rpassword').keyup(function() {
            $('#rpassword').removeClass('is-invalid');
        });
        $(document).ready(function() {
            var localizedStrings = {
                minimum_username: "@lang('home.minimum_username')",
                no_space_allowed: "@lang('home.no_space_allowed')",
                phoneInvalid: "@lang('home.phone_invalid')",
                passwordInvalid: "@lang('home.password_invalid')",
                username_already: "@lang('home.username_already')",
                phone_already: "@lang('home.phone_already')",
                username_characters: "@lang('home.username_characters')",

            };
            function submitRegister(){
                var acc_r = $('#rname');
                var p_r = $('#phone');
                var pass_r = $('#rpassword');

                var acc_r_val = acc_r.val();
                var pass_r_val = pass_r.val();
                var p_r_val = p_r.val();
                if(acc_r_val.length < 4){
                    acc_r.addClass('is-invalid');
                    acc_r.focus();
                    $('#username_wrong').text(localizedStrings.minimum_username);
                    return;
                }else if (!isNaN(parseInt(acc_r_val.charAt(0)))) {
                    acc_r.addClass('is-invalid');
                    acc_r.focus();
                    $('#username_wrong').text(localizedStrings.username_characters);
                    return;
                }else if (/\s/.test(acc_r_val)) { // Check for spaces
                    acc_r.addClass('is-invalid');
                    $('#username_wrong').text(localizedStrings.no_space_allowed);
                    isValid = false;
                } else {
                    acc_r.removeClass('is-invalid'); // remove invalid class if input is valid
                }

                if(p_r_val.length < 8){
                    p_r.addClass('is-invalid');
                    p_r.focus();
                    $('#phone_wrong').text(localizedStrings.phoneInvalid);
                    return;
                }else {
                    p_r.removeClass('is-invalid'); // remove invalid class if input is valid
                }

                if(pass_r_val.length < 4){
                    pass_r.addClass('is-invalid');
                    pass_r.focus();
                    $('#password_wrong').text(localizedStrings.passwordInvalid);
                    return;
                }
                else {
                    pass_r.removeClass('is-invalid'); // remove invalid class if input is valid
                }
                // Proceed with the form submission or other logic
                var formData = new FormData(document.getElementById('register_form'));
                $.ajax({
                    url: '/api/user/create',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            $("#username").val(response.data.name);
                            $("#password").val(response.password);
                            $('#modal-login').submit();
                        }
                        else{
                            if(response.message.email1){
                                acc_r.addClass('is-invalid');
                                acc_r.focus();
                                $('#username_wrong').text(localizedStrings.username_already);
                                return;
                            }
                            if(response.message.phone){
                                p_r.addClass('is-invalid');
                                p_r.focus();
                                $('#phone_wrong').text(localizedStrings.phone_already);
                                return;
                            }
                        }
                    },
                    error: function(response) {
                        // if(response.message.email1 == ){
                        //     pass_r.addClass('is-invalid');
                        //     pass_r.focus();
                        //     $('#password_wrong').text(localizedStrings.passwordInvalid);
                        //     return;
                        // }
                        console.log('Media upload failed:', response);
                    }
                });
            }

            // Call submitRegister function when the form is submitted
            $('#register_form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                submitRegister();
            });
        });

        
      </script>
<!-- ========end-Register============ -->