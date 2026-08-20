@extends('client.layouts.app')



@section('content')
    <style>
        .wrapper {



            display: grid;



            grid-template-columns: 2fr 0.7fr;



            grid-gap: 30px;



        }

        .post-card {



            padding: 10px;



            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



            border-radius: 10px;



            margin-top: 20px
        }



        .block-icon img {



            height: 40px;



            width: 40px;



            margin-bottom: 5px;



            border-radius: 50%
        }



        .icon-left i {



            padding: 5px;



            cursor: pointer;



        }



        .icon-left i:hover {



            background: #5b54be;



            border-radius: 50%;



            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



        }



        .action-btn {



            transform: translate3d(-150px, 25px, 0px) !important;



            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));



        }



        .dropdown-item {



            color: white !important;



        }



        .action-btn .dropdown-item:hover {



            color: #283046 !important;



            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7)) !important;



        }



        .dropdown-item.active,
        .dropdown-item:active,
        {



        color: #fff;



        text-decoration: none;



        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));



        }

        .swal2-title {

            position: relative;

            max-width: 100%;

            margin: 0;

            padding: .8em 1em 0 !important;

            color: #595959;

            font-size: 1.875em;

            font-weight: 600;

            text-align: center;

            text-transform: none;

            word-wrap: break-word;

        }
    </style>



    <div class="container">



        <div class="wrapper">



            <div>



                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">



                    <i class="fas fa-user"></i> @lang('home.profile')



                </div>



                <style>
                    .grid-pro {



                        display: grid;



                        grid-template-columns: 0.5fr 1fr 1fr;



                        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                        border-radius: 10px
                    }



                    .photo-pro {



                        padding: 10px
                    }



                    .photo-pro img {



                        border-radius: 50%;



                        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                        height: 168px;



                        width: 168px;



                    }



                    .text-profile {



                        position: relative;



                    }



                    .centere-profile {



                        position: absolute;



                        top: 50%;



                        left: 40%;



                        transform: translate(-50%, -50%);



                        text-transform: uppercase
                    }



                    .centere-profile h1 {



                        color: white
                    }



                    .centere-profile-btn {



                        position: absolute;



                        top: 85%;



                        left: 57%;



                        transform: translate(-50%, -50%);



                    }



                    .grid-btn-2 {



                        display: grid;



                        grid-template-columns: 1fr 1fr;



                        grid-gap: 5px;



                    }



                    .grid-btn-2 button {



                        min-width: 150px;



                    }



                    @media screen and (max-width: 1400px) {



                        .centere-profile-btn {



                            position: absolute;



                            top: 85%;



                            left: 48%;



                            transform: translate(-50%, -50%);



                        }



                    }



                    @media screen and (max-width: 1200px) {



                        .centere-profile-btn {



                            position: absolute;



                            top: 85%;



                            left: 33%;



                            transform: translate(-50%, -50%);



                        }



                        .centere-profile {



                            position: absolute;



                            top: 40%;



                            left: 60%;



                            transform: translate(-50%, -50%);



                            text-transform: uppercase;



                        }



                    }



                    @media screen and (max-width: 767px) {



                        .centere-profile-btn {



                            position: absolute;



                            top: 85%;



                            left: 3%;



                            transform: translate(-50%, -50%);



                        }



                    }



                    @media screen and (max-width: 555px) {



                        .grid-btn-2 button {



                            min-width: 100px;



                        }



                        .centere-profile-btn {



                            position: absolute;



                            top: 85%;



                            left: 0%;



                            transform: translate(-50%, -50%);



                        }



                    }



                    @media screen and (max-width: 450px) {



                        .photo-pro img {



                            border-radius: 50%;



                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                            height: 120px;



                            width: 120px;



                        }



                        .centere-profile-btn {



                            position: absolute;



                            top: 85%;



                            left: -10%;



                            transform: translate(-50%, -50%);



                        }



                        .centere-profile {



                            position: absolute;



                            top: 42%;



                            left: 90%;



                            transform: translate(-50%, -50%);



                            text-transform: uppercase;



                        }



                        .grid-btn-2 button {



                            font-size: 10px;



                        }



                        .grid-btn-2 button {



                            min-width: 80px;



                        }



                    }



                    @media screen and (max-width: 350px) {



                        .photo-pro img {



                            border-radius: 50%;



                            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                            height: 100px;



                            width: 100px;



                        }



                    }



                    .x-hr-border-glow1 {



                        height: 1px;



                        border: 1px solid #5d56c4 !important;



                        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                        position: relative;



                        padding: 0px;



                        width: 100%;



                    }



                    .btn-next-btn {



                        background: #283046;



                        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                        font-weight: 400;



                        border-radius: 4px;



                        border: solid 1px #6b60e0;



                    }



                    .btn-next-btn:hover span {



                        color: white !important
                    }



                    .btn-next-btn:hover {



                        background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));



                        box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);



                        font-weight: 400;



                        border-radius: 4px;



                        border: solid 1px #6b60e0;



                    }
                </style>



                <div class="grid-pro mt-3">



                    <div class="photo-pro">



                        <img src="{{ auth()->user()->photo }}" />



                    </div>



                    <div class="p-2 text-profile">



                        <div class="centere-profile">



                            <h1>{{ auth()->user()->name }}</h1>



                            <div>{{ auth()->user()->email }}</div>



                        </div>



                    </div>



                    <div class="text-profile">



                        <div class="centere-profile-btn">



                            <div class="grid-btn-2">



                                {{-- <button class="btn btn-next text-white">Photo</button> --}}



                                <button class="btn btn-next text-white">Edit Profile</button>



                            </div>



                        </div>



                    </div>



                </div>



                <div class="x-hr-border-glow1 mt-2"></div>



                <div class="mt-2">



                    <a class="btn text-white font-18 btn-next-btn " id="btnPostModal" data-bs-toggle="modal"
                        data-bs-target="#PostModal">



                        <span>@lang('home.create_post')</span>



                    </a>



                </div>



                <div class="mt-2">



                    @foreach ($Newsfeed as $row)

                        <div class="post-card">



                            <div class="d-flex bd-highlight">



                                <div class="bd-highlight">



                                    <div class="block-icon">



                                        <img onerror="this.onerror=null; this.src='/icon/null-image.gif';"
                                            src="{{ auth()->user()->photo }}">



                                        <small class=" text-white"
                                            style="text-transform: uppercase !important;">{{ auth()->user()->name }}</small>



                                    </div>



                                </div>



                                <div class="ms-auto p-2 bd-highlight icon-left">



                                    <div class="dropdown">



                                        <i class="fas fa-ellipsis-h " id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>



                                        <ul class="dropdown-menu action-btn" aria-labelledby="dropdownMenuButton2">



                                            <li><a class="dropdown-item" href="#">@lang('home.edit')</a></li>

                                            <form action="{{ route('newsfeed.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <li>
                                                    <button type="submit" class="dropdown-item data-id" >
                                                    @lang('home.delete')</button>
                                                </li>
                                            </form>

                                        </ul>



                                    </div>



                                </div>



                            </div>



                            <div class="text-white date-title">{{ $row->title }}</div>



                            <img onerror="this.onerror=null; this.src='/icon/null-image.gif';" src="{{ $row->photo }}"
                                width="100%">



                            <div class="d-flex justify-content-between">



                                <div>



                                    <span class="post-meta">



                                        <i class="far fa-clock"></i>



                                        <?php
                                        
                                        $timezone = new DateTimeZone('Asia/Phnom_Penh');
                                        
                                        $specificDate = new DateTime($row->date, $timezone);
                                        
                                        $currentDate = new DateTime('now', $timezone);
                                        
                                        $diff = $currentDate->diff($specificDate);
                                        
                                        $agoStatement = '';
                                        
                                        if ($diff->y > 0) {
                                            $agoStatement = $diff->y . ' years ago';
                                        } elseif ($diff->m > 0) {
                                            $agoStatement = $diff->m . ' months ago';
                                        } elseif ($diff->d > 0) {
                                            $agoStatement = $diff->d . ' days ago';
                                        } elseif ($diff->h > 0) {
                                            $agoStatement = $diff->h . ' hours ago';
                                        } elseif ($diff->i > 0) {
                                            $agoStatement = $diff->i . ' minutes ago';
                                        } elseif ($diff->s > 0) {
                                            $agoStatement = $diff->s . ' seconds ago';
                                        }
                                        
                                        echo $agoStatement;
                                        
                                        ?>



                                    </span>
                                </div>



                                <div>



                                    <span class="post-meta">



                                        <i class="far fa-eye"></i>



                                        {{ $row->view }}



                                    </span>



                                </div>



                            </div>



                        </div>
                    @endforeach



                </div>







            </div>



            @include('client.layouts.telegram')

        </div>



    </div>



    <!-- ========start-Post============ -->



    {{-- <div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="PostModalLabel"
        aria-hidden="true">



        <div class="modal-dialog modal-dialog-centered" role="document">



            <div class="modal-content bg-color-brand">



                <div class="modal-header grid-header">



                    <div></div>



                    <div style="text-align:center;" class="text-white">



                        @lang('home.create_post')



                    </div>



                    <div></div>



                    <button type="button" class="btn btn-secondary" hidden data-bs-dismiss="modal"
                        id="post-close">Close</button>



                </div>



                <form id="PostMedia">



                    <div class="modal-body">



                        <div class="mb-3">



                            <textarea class="form-control border-0 shadow-none" id="title" name="title" type="text" required
                                style="background: transparent;color:white;resize: none;" autofocus
                                placeholder="@lang('home.Whats_on_your_mind') {{ auth()->user()->name }}?" onInput="auto_height(this)"> </textarea>



                        </div>



                        <input type="file" name="photo" id="photo" />

                        <input type="hidden" name="id" value="{{ auth()->user()->id }}" />

                    </div>



                    <div class="modal-footer">



                        <button class="btn btn-line text-white btn-next button" type="submit" style="width:100%">



                            @lang('home.post') </button>



                    </div>



                </form>



            </div>



        </div>



    </div> --}}

    @if (!Auth::guest())
        <!-- ========start-Post============ -->
        <div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="PostModalLabel"
            aria-hidden="true">
        

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-color-brand">
                    <div class="modal-header grid-header">
                        <div></div>
                        <div style="text-align:center;" class="text-white">
                            @lang('home.create_post')
                        </div>
                        <div></div>
                        <button type="button" class="btn btn-secondary" hidden data-bs-dismiss="modal"
                            id="post-close">Close</button>
                    </div>

                    @if($status_post)
                        <form id="PostMedia" method="POST" action="{{ route('feeds.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <textarea
    class="form-control border-0 shadow-none"
    id="title"
    name="title"
    required
    style="background: transparent; color: white; resize: none;"
    autofocus
    placeholder="@lang('home.Whats_on_your_mind') {{ auth()->user()->name }}?"
    oninput="auto_height(this)"
></textarea>
                                </div>
                                <div class="con-modal">
                                    <div class="modal-img-modal"
                                        onclick="document.getElementById('logo-input').value=''; document.getElementById('logo-input').click();">
                                        <div class="centered">
                                            <center>
                                                <div class="i">
                                                    {{-- <i class="fas fa-photo-video text-white"></i> --}}
                                                    <img src="/icon/post.png" alt="" width="80px" height="80px">
                                                </div>
                                                <div class="mt-1 text-post text-white"> @lang('home.add/photo/video')</div>
                                                <small class="text-white">or drang and drop </small>
                                            </center>
                                        </div>
                                    </div>
                                    <div id="imagePreview" style="display: none">
                                        <img id="img-upload"
                                            onclick="document.getElementById('logo-input').value=''; document.getElementById('logo-input').click();"
                                            src="" title="Upload Profile" class="img-fluid"
                                            style="cursor: pointer;width:100%">
                                    </div>
                                    <input type="file" id="logo-input" name="photo" accept="image/*" hidden src="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-line text-white btn-next button" type="submit" style="width:100%">
                                    @lang('home.post') </button>
                            </div>
                        </form>
                    @else
                        <center class="px-4 py-4">
                            <small class="text-danger">Please contact the admin to request an upgrade to premium.</small>
                        </center>
                    @endif

                </div>
            </div>
        </div>
        <!-- ========end-Post============ -->
    @endif

    <!-- ========end-Post============ -->

 <script>
        function auto_height(elem) {
            /* javascript */
            elem.style.height = '1px';
            elem.style.height = `${elem.scrollHeight}px`;
        }
      
        $('#logo-input').change(function() {
            previewImage(this);
            $("#imagePreview").show()
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').html('<img src="' + e.target.result +
                        '" onclick="document.getElementById(\'logo-input\').value=\'\'; document.getElementById(\'logo-input\').click();" title="Upload Profile" class="img-fluid" style="cursor: pointer;width:100%">'
                        );
                };
                reader.readAsDataURL(input.files[0]);
                $(".modal-img-modal").hide()
            }
        }
   
    </script>
@endsection
