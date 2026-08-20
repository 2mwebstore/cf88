<!-- ========start-Login============ -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-color-brand">
        <div class="modal-header grid-header">
            <div></div>
            <div style="text-align:center;"><img class="logo-api" style="width:100%;" src="/icon/logo.jpg"></div>
            <div></div>
        </div>
       <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="@lang('home.email')" id="email" name="email" type="text" value="">
                    <div style="padding-top: 5px;"></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>@lang('home.email_not_found')</strong>
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
            <form id="register_form" method="POST" action="{{ url('/user/register') }}">
                @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input class="form-control" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('home.username')" id="rname" name="name" type="text" autocomplete="name" >
                            <div style="padding-top: 5px;"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>@lang('home.username_wrong')</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="@lang('home.email')"  id="remail" name="email" type="email" autocomplete="email">
                            <div style="padding-top: 5px;"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>@lang('home.email_wrong')</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" placeholder="@lang('home.password')" id="rpassword" name="password" type="password" autocomplete="password">
                            <div style="padding-top: 5px;"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>@lang('home.password_wrong')</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control @error('phone') is-invalid @enderror" placeholder="@lang('home.phone')" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="phone" name="phone" type="text">
                            <div style="padding-top: 5px;"></div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>@lang('home.phone_wrong')</strong>
                                </span>
                            @enderror
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
    
    {{-- <script type="text/javascript">
  
        $(function() {
            $(document).on("submit", "#register_form", function() {
                var e = this;
                $.ajax({
                    url: '/api/user/create',
                    data: $(this).serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            window.location = data.redirect;
                        }else{
                            $(".alert").remove();
                            $.each(data.errors, function (key, val) {
                                $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                            });
                        }
                    }
                });
                return false;
            });
        
          });
        
      </script> --}}
<!-- ========end-Register============ -->