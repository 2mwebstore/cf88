@section('user-active', 'active')
@section('list_user', 'active')
@section('user', 'show')
@extends('layouts.backend.app',[
    'title' => 'Set Permission Account',
])
@push('css')
<style>
    ul,li , ul li{
        list-style-type: none !important;
    }
    .sub-form-check{
        padding-left: 1.5em;
    }
    .hide {
        opacity: 0;
        height: 0 !important;
    }
    
    .form-check .form-check-input:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .form-check-input {
        position: unset !important;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
    }
    .form-check {
        padding-left: 0.6rem !important;
        padding-top: 5px;
    }
    .text-500{
        font-weight: 500;
    }
    .text-bold{
        font-weight: bold;
    }
    .form-check-label{
        text-transform: uppercase;
    }
    .form-check-input {
        margin-left: unset !important;
    }
    .font-size{
        font-size: 20px;
    }
    .under{
        padding-left: 3em !important;
    }
    .form-check i ,.form-check input {
        cursor: pointer;
    }
</style>
@endpush
@section('content')
<form action="/user/permission/{{$id}}" method="POST">
    @csrf
<div class="container">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <div class="d-flex justify-content-between w-100">
                <a class="h4 text-gray-800 ">Set Permission</a>
                <a id="back" href="/user" class="btn btn-primary" >
                Back 
                </a>
            </div>
        </h6>

    </div>
    <li class="nav-item">
        {{-- highlight --}}
            <div class="form-check" >
                <i class="fas fa-caret-right highlight_show font-size" id="highlight_show"></i>
                <i class="fas fa-caret-down highlight_hide font-size hide" id="highlight_hide"></i>
                <input hidden type="text" name="per_id[]" value="{{$permission_lists[0]['id']}}" >
                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[0]['id']}}" id="Listhighlight" {{$permission_lists[0]['have']}}>
                <label class="form-check-label text-bold text-primary" >
                    {{-- highlight Name --}}
                    {{$permission_lists[0]['name']}}
                </label>
            </div> 
                <div class="sub-form-check" id="highlight_list">
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[1]['id']}}" >
                        <input class="form-check-input " id="highlight-list" type="checkbox" name="add[]" value="{{$permission_lists[1]['id']}}" {{$permission_lists[1]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[1]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[2]['id']}}" >
                        <input class="form-check-input " id="highlight-create" type="checkbox" name="add[]" value="{{$permission_lists[2]['id']}}" {{$permission_lists[2]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[2]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[3]['id']}}" >
                        <input class="form-check-input " id="highlight-update" type="checkbox" name="add[]" value="{{$permission_lists[3]['id']}}" {{$permission_lists[3]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[3]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[4]['id']}}" >
                        <input class="form-check-input " id="highlight-delete" type="checkbox" name="add[]" value="{{$permission_lists[4]['id']}}" {{$permission_lists[4]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[4]['name']}}
                        </label>
                    </div>
                </div>
        {{-- //////End highlight////// --}}
        {{-- Channel --}}
            <div class="form-check" >
                <i class="fas fa-caret-right channel_show font-size" id="channel_show"></i>
                <i class="fas fa-caret-down channel_hide font-size hide" id="channel_hide"></i>
                <input hidden type="text" name="per_id[]" value="{{$permission_lists[5]['id']}}" >
                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[5]['id']}}" id="ListChannel" {{$permission_lists[5]['have']}}>
                <label class="form-check-label text-bold text-primary" >
                    {{-- Channel Name --}}
                    {{$permission_lists[5]['name']}}
                </label>
            </div> 
                <div class="sub-form-check" id="channel_list">
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[6]['id']}}" >
                        <input class="form-check-input " id="channel-list" type="checkbox" name="add[]" value="{{$permission_lists[6]['id']}}" {{$permission_lists[6]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[6]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[7]['id']}}" >
                        <input class="form-check-input " id="channel-create" type="checkbox" name="add[]" value="{{$permission_lists[7]['id']}}" {{$permission_lists[7]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[7]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[8]['id']}}" >
                        <input class="form-check-input " id="channel-update" type="checkbox" name="add[]" value="{{$permission_lists[8]['id']}}" {{$permission_lists[8]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[8]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[9]['id']}}" >
                        <input class="form-check-input " id="channel-delete" type="checkbox" name="add[]" value="{{$permission_lists[9]['id']}}" {{$permission_lists[9]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[9]['name']}}
                        </label>
                    </div>
                </div>
        {{-- //////End new////// --}}
        {{-- new --}}
            <div class="form-check" >
                <i class="fas fa-caret-right new_show font-size" id="new_show"></i>
                <i class="fas fa-caret-down new_hide font-size hide" id="new_hide"></i>
                <input hidden type="text" name="per_id[]" value="{{$permission_lists[10]['id']}}" >
                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[10]['id']}}" id="Listnew" {{$permission_lists[10]['have']}}>
                <label class="form-check-label text-bold text-primary" >
                    {{-- new Name --}}
                    {{$permission_lists[10]['name']}}
                </label>
            </div> 
                <div class="sub-form-check" id="new_list">
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[11]['id']}}" >
                        <input class="form-check-input " id="new-list" type="checkbox" name="add[]" value="{{$permission_lists[11]['id']}}" {{$permission_lists[11]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[11]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[12]['id']}}" >
                        <input class="form-check-input " id="new-create" type="checkbox" name="add[]" value="{{$permission_lists[12]['id']}}" {{$permission_lists[12]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[12]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[13]['id']}}" >
                        <input class="form-check-input " id="new-update" type="checkbox" name="add[]" value="{{$permission_lists[13]['id']}}" {{$permission_lists[13]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[13]['name']}}
                        </label>
                    </div>
                    <div class="form-check under">
                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[14]['id']}}" >
                        <input class="form-check-input " id="new-delete" type="checkbox" name="add[]" value="{{$permission_lists[14]['id']}}" {{$permission_lists[14]['have']}}>
                        <label class="form-check-label text-500 text-primary">
                            {{$permission_lists[14]['name']}}
                        </label>
                    </div>
                </div>
        {{-- //////End new////// --}}
        {{-- setting --}}
            <div class="form-check" >
                <i class="fas fa-caret-right setting_show font-size" id="setting_show"></i>
                <i class="fas fa-caret-down setting_hide font-size hide" id="setting_hide"></i>
                <input hidden type="text" name="per_id[]" value="{{$permission_lists[15]['id']}}" >
                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[15]['id']}}" id="Listsetting" {{$permission_lists[15]['have']}}>
                <label class="form-check-label text-bold text-primary" >
                    {{-- setting Name --}}
                    {{$permission_lists[15]['name']}}
                </label>
            </div> 
                <div class="sub-form-check" id="setting_list">
                    {{-- //////bot////// --}}
                        <div class="form-check" >
                            <i class="fas fa-caret-right bot_show font-size" id="bot_show"></i>
                            <i class="fas fa-caret-down bot_hide font-size hide" id="bot_hide"></i>
                            <input hidden type="text" name="per_id[]" value="{{$permission_lists[16]['id']}}" >
                            <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[16]['id']}}" id="Listbot" {{$permission_lists[16]['have']}}>
                            <label class="form-check-label text-bold text-primary" >
                                {{$permission_lists[16]['name']}}
                            </label>
                        </div> 
                            <div class="sub-form-check" id="bot_list">
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[17]['id']}}" >
                                    <input class="form-check-input " id="bot-list" type="checkbox" name="add[]" value="{{$permission_lists[17]['id']}}" {{$permission_lists[17]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[17]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[18]['id']}}" >
                                    <input class="form-check-input " id="bot-create" type="checkbox" name="add[]" value="{{$permission_lists[18]['id']}}" {{$permission_lists[18]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[18]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[19]['id']}}" >
                                    <input class="form-check-input " id="bot-update" type="checkbox" name="add[]" value="{{$permission_lists[19]['id']}}" {{$permission_lists[19]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[19]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[20]['id']}}" >
                                    <input class="form-check-input " id="bot-delete" type="checkbox" name="add[]" value="{{$permission_lists[20]['id']}}" {{$permission_lists[20]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[20]['name']}}
                                    </label>
                                </div>
                            </div>
                    {{-- //////End bot////// --}}
                    {{-- category --}}
                        <div class="form-check" >
                            <i class="fas fa-caret-right category_show font-size" id="category_show"></i>
                            <i class="fas fa-caret-down category_hide font-size hide" id="category_hide"></i>
                            <input hidden type="text" name="per_id[]" value="{{$permission_lists[21]['id']}}" >
                            <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[21]['id']}}" id="Listcategory" {{$permission_lists[21]['have']}}>
                            <label class="form-check-label text-bold text-primary" >
                                {{-- category Name --}}
                                {{$permission_lists[21]['name']}}
                            </label>
                        </div> 
                            <div class="sub-form-check" id="category_list">
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[48]['id']}}" >
                                    <input class="form-check-input " id="category-list" type="checkbox" name="add[]" value="{{$permission_lists[22]['id']}}" {{$permission_lists[22]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[22]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[23]['id']}}" >
                                    <input class="form-check-input " id="category-create" type="checkbox" name="add[]" value="{{$permission_lists[23]['id']}}" {{$permission_lists[23]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[23]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[24]['id']}}" >
                                    <input class="form-check-input " id="category-update" type="checkbox" name="add[]" value="{{$permission_lists[24]['id']}}" {{$permission_lists[24]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[24]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[25]['id']}}" >
                                    <input class="form-check-input " id="category-delete" type="checkbox" name="add[]" value="{{$permission_lists[25]['id']}}" {{$permission_lists[25]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[25]['name']}}
                                    </label>
                                </div>
                            </div>
                    {{-- //////End category////// --}}
                    {{-- banner --}}
                            <div class="form-check" >
                                <i class="fas fa-caret-right banner_show font-size" id="banner_show"></i>
                                <i class="fas fa-caret-down banner_hide font-size hide" id="banner_hide"></i>
                                <input hidden type="text" name="per_id[]" value="{{$permission_lists[26]['id']}}" >
                                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[26]['id']}}" id="Listbanner" {{$permission_lists[26]['have']}}>
                                <label class="form-check-label text-bold text-primary" >
                                    {{-- banner Name --}}
                                    {{$permission_lists[26]['name']}}
                                </label>
                            </div> 
                                <div class="sub-form-check" id="banner_list">
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[27]['id']}}" >
                                        <input class="form-check-input " id="banner-list" type="checkbox" name="add[]" value="{{$permission_lists[27]['id']}}" {{$permission_lists[27]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[27]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[28]['id']}}" >
                                        <input class="form-check-input " id="banner-create" type="checkbox" name="add[]" value="{{$permission_lists[28]['id']}}" {{$permission_lists[28]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[28]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[29]['id']}}" >
                                        <input class="form-check-input " id="banner-update" type="checkbox" name="add[]" value="{{$permission_lists[29]['id']}}" {{$permission_lists[29]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[29]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[30]['id']}}" >
                                        <input class="form-check-input " id="banner-delete" type="checkbox" name="add[]" value="{{$permission_lists[30]['id']}}" {{$permission_lists[30]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[30]['name']}}
                                        </label>
                                    </div>
                                </div>
                    {{-- //////End banner////// --}}
                    {{-- logo --}}
                        <div class="form-check" >
                            <i class="fas fa-caret-right logo_show font-size" id="logo_show"></i>
                            <i class="fas fa-caret-down logo_hide font-size hide" id="logo_hide"></i>
                            <input hidden type="text" name="per_id[]" value="{{$permission_lists[31]['id']}}" >
                            <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[31]['id']}}" id="Listlogo" {{$permission_lists[31]['have']}}>
                            <label class="form-check-label text-bold text-primary" >
                                {{-- logo Name --}}
                                {{$permission_lists[31]['name']}}
                            </label>
                        </div> 
                            <div class="sub-form-check" id="logo_list">
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[32]['id']}}" >
                                    <input class="form-check-input " id="logo-list" type="checkbox" name="add[]" value="{{$permission_lists[32]['id']}}" {{$permission_lists[32]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[32]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[33]['id']}}" >
                                    <input class="form-check-input " id="logo-create" type="checkbox" name="add[]" value="{{$permission_lists[33]['id']}}" {{$permission_lists[33]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[33]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[34]['id']}}" >
                                    <input class="form-check-input " id="logo-update" type="checkbox" name="add[]" value="{{$permission_lists[34]['id']}}" {{$permission_lists[34]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[34]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[35]['id']}}" >
                                    <input class="form-check-input " id="logo-delete" type="checkbox" name="add[]" value="{{$permission_lists[35]['id']}}" {{$permission_lists[35]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[35]['name']}}
                                    </label>
                                </div>
                            </div>
                    {{-- //////End logo////// --}}
                    {{-- social --}}
                            <div class="form-check" >
                                <i class="fas fa-caret-right social_show font-size" id="social_show"></i>
                                <i class="fas fa-caret-down social_hide font-size hide" id="social_hide"></i>
                                <input hidden type="text" name="per_id[]" value="{{$permission_lists[36]['id']}}" >
                                <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[36]['id']}}" id="Listsocial" {{$permission_lists[36]['have']}}>
                                <label class="form-check-label text-bold text-primary" >
                                    {{-- social Name --}}
                                    {{$permission_lists[36]['name']}}
                                </label>
                            </div> 
                                <div class="sub-form-check" id="social_list">
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[37]['id']}}" >
                                        <input class="form-check-input " id="social-list" type="checkbox" name="add[]" value="{{$permission_lists[37]['id']}}" {{$permission_lists[37]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[37]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[38]['id']}}" >
                                        <input class="form-check-input " id="social-create" type="checkbox" name="add[]" value="{{$permission_lists[38]['id']}}" {{$permission_lists[38]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[38]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[39]['id']}}" >
                                        <input class="form-check-input " id="social-update" type="checkbox" name="add[]" value="{{$permission_lists[39]['id']}}" {{$permission_lists[39]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[39]['name']}}
                                        </label>
                                    </div>
                                    <div class="form-check under">
                                        <input hidden type="text" name="per_id[]" value="{{$permission_lists[40]['id']}}" >
                                        <input class="form-check-input " id="social-delete" type="checkbox" name="add[]" value="{{$permission_lists[40]['id']}}" {{$permission_lists[40]['have']}}>
                                        <label class="form-check-label text-500 text-primary">
                                            {{$permission_lists[40]['name']}}
                                        </label>
                                    </div>
                                </div>
                    {{-- //////End social////// --}}
                    {{-- user --}}
                        <div class="form-check" >
                            <i class="fas fa-caret-right user_show font-size" id="user_show"></i>
                            <i class="fas fa-caret-down user_hide font-size hide" id="user_hide"></i>
                            <input hidden type="text" name="per_id[]" value="{{$permission_lists[41]['id']}}" >
                            <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[41]['id']}}" id="Listuser" {{$permission_lists[41]['have']}}>
                            <label class="form-check-label text-bold text-primary" >
                                {{-- user Name --}}
                                {{$permission_lists[41]['name']}}
                            </label>
                        </div> 
                            <div class="sub-form-check" id="user_list">
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[42]['id']}}" >
                                    <input class="form-check-input " id="user-list" type="checkbox" name="add[]" value="{{$permission_lists[42]['id']}}" {{$permission_lists[42]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[42]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[43]['id']}}" >
                                    <input class="form-check-input " id="user-create" type="checkbox" name="add[]" value="{{$permission_lists[43]['id']}}" {{$permission_lists[43]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[43]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[44]['id']}}" >
                                    <input class="form-check-input " id="user-update" type="checkbox" name="add[]" value="{{$permission_lists[44]['id']}}" {{$permission_lists[44]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[44]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[45]['id']}}" >
                                    <input class="form-check-input " id="user-delete" type="checkbox" name="add[]" value="{{$permission_lists[45]['id']}}" {{$permission_lists[45]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[45]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[46]['id']}}" >
                                    <input class="form-check-input " id="user-permission" type="checkbox" name="add[]" value="{{$permission_lists[46]['id']}}" {{$permission_lists[46]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[46]['name']}}
                                    </label>
                                </div>
                            </div>
                    {{-- //////End user////// --}}

                    {{-- topic --}}
                        <div class="form-check" >
                            <i class="fas fa-caret-right topic_show font-size" id="topic_show"></i>
                            <i class="fas fa-caret-down topic_hide font-size hide" id="topic_hide"></i>
                            <input hidden type="text" name="per_id[]" value="{{$permission_lists[47]['id']}}" >
                            <input class="form-check-input" type="checkbox" name="add[]" value="{{$permission_lists[47]['id']}}" id="Listtopic" {{$permission_lists[47]['have']}}>
                            <label class="form-check-label text-bold text-primary" >
                                {{-- topic Name --}}
                                {{$permission_lists[47]['name']}}
                            </label>
                        </div> 
                            <div class="sub-form-check" id="topic_list">
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[48]['id']}}" >
                                    <input class="form-check-input " id="topic-list" type="checkbox" name="add[]" value="{{$permission_lists[48]['id']}}" {{$permission_lists[48]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[48]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[49]['id']}}" >
                                    <input class="form-check-input " id="topic-create" type="checkbox" name="add[]" value="{{$permission_lists[49]['id']}}" {{$permission_lists[49]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[49]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[50]['id']}}" >
                                    <input class="form-check-input " id="topic-update" type="checkbox" name="add[]" value="{{$permission_lists[50]['id']}}" {{$permission_lists[50]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[50]['name']}}
                                    </label>
                                </div>
                                <div class="form-check under">
                                    <input hidden type="text" name="per_id[]" value="{{$permission_lists[51]['id']}}" >
                                    <input class="form-check-input " id="topic-delete" type="checkbox" name="add[]" value="{{$permission_lists[51]['id']}}" {{$permission_lists[51]['have']}}>
                                    <label class="form-check-label text-500 text-primary">
                                        {{$permission_lists[51]['name']}}
                                    </label>
                                </div>
                            </div>
                    {{-- //////End topic////// --}}
                </div>
        {{-- //////End setting////// --}}
    </li>
</div>
<div class="card-header">
    <h6 class="text-primary">
        <button type="submit" class="btn btn-primary">Submit</button>
    </h6>
</div>
</form>
@stop
@push('js')
<script>
$(".setting_show").click(function() {
        var element = document.getElementById("setting_list");
        element.classList.remove("hide");
        var element = document.getElementById("setting_show");
        element.classList.add("hide");
        var element = document.getElementById("setting_hide");
        element.classList.remove("hide");
    });
    $(".setting_hide").click(function() {
        var element = document.getElementById("setting_list");
        element.classList.add("hide");
        var element = document.getElementById("setting_hide");
        element.classList.add("hide");
        var element = document.getElementById("setting_show");
        element.classList.remove("hide");
    });
    const Listsetting = document.getElementById('Listsetting');
        if (Listsetting.checked == true){
                var element = document.getElementById("setting_list");
                element.classList.remove("hide");
                var element = document.getElementById("setting_show");
                    element.classList.add("hide");
                var element = document.getElementById("setting_hide");
                    element.classList.remove("hide");

                var element = document.getElementById("bot_list");
                element.classList.remove("hide");
                var element = document.getElementById("bot_show");
                    element.classList.add("hide");
                var element = document.getElementById("bot_hide");
                    element.classList.remove("hide");
                
                var element = document.getElementById("category_list");
                element.classList.remove("hide");
                var element = document.getElementById("category_show");
                    element.classList.add("hide");
                var element = document.getElementById("category_hide");
                    element.classList.remove("hide");

                var element = document.getElementById("banner_list");
                element.classList.remove("hide");
                var element = document.getElementById("banner_show");
                    element.classList.add("hide");
                var element = document.getElementById("banner_hide");
                    element.classList.remove("hide");

                var element = document.getElementById("logo_list");
                element.classList.remove("hide");
                var element = document.getElementById("logo_show");
                    element.classList.add("hide");
                var element = document.getElementById("logo_hide");
                    element.classList.remove("hide");

                var element = document.getElementById("social_list");
                element.classList.remove("hide");
                var element = document.getElementById("social_show");
                    element.classList.add("hide");
                var element = document.getElementById("social_hide");
                    element.classList.remove("hide");
                
                var element = document.getElementById("user_list");
                  element.classList.remove("hide");
                var element = document.getElementById("user_show");
                    element.classList.add("hide");
                var element = document.getElementById("user_hide");
                    element.classList.remove("hide");

                var element = document.getElementById("topic_list");
                    element.classList.remove("hide");
                var element = document.getElementById("topic_show");
                    element.classList.add("hide");
                var element = document.getElementById("topic_hide");
                    element.classList.remove("hide");
            }else{
                var element = document.getElementById("setting_list");
                    element.classList.add("hide");

                var element = document.getElementById("bot_list");
                    element.classList.add("hide");
                    
                var element = document.getElementById("category_list");
                    element.classList.add("hide");
                
                var element = document.getElementById("banner_list");
                    element.classList.add("hide");
                var element = document.getElementById("logo_list");
                    element.classList.add("hide");
                var element = document.getElementById("social_list");
                    element.classList.add("hide");
        }
    Listsetting.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#Listbot').prop('checked',true)
            $('#bot-list').prop('checked',true)
            $('#bot-create').prop('checked',true)
            $('#bot-update').prop('checked',true)
            $('#bot-delete').prop('checked',true)

            $('#Listcategory').prop('checked',true)
            $('#category-list').prop('checked',true)
            $('#category-create').prop('checked',true)
            $('#category-update').prop('checked',true)
            $('#category-delete').prop('checked',true)

            $('#Listbanner').prop('checked',true)
            $('#banner-list').prop('checked',true)
            $('#banner-create').prop('checked',true)
            $('#banner-update').prop('checked',true)
            $('#banner-delete').prop('checked',true)

            $('#Listlogo').prop('checked',true)
            $('#logo-list').prop('checked',true)
            $('#logo-create').prop('checked',true)
            $('#logo-update').prop('checked',true)
            $('#logo-delete').prop('checked',true)

            $('#Listsocial').prop('checked',true)
            $('#social-list').prop('checked',true)
            $('#social-create').prop('checked',true)
            $('#social-update').prop('checked',true)
            $('#social-delete').prop('checked',true)

            $('#Listuser').prop('checked',true)
            $('#user-list').prop('checked',true)
            $('#user-create').prop('checked',true)
            $('#user-update').prop('checked',true)
            $('#user-delete').prop('checked',true)
            $('#user-permission').prop('checked',true)

            $('#Listtopic').prop('checked',true)
            $('#topic-list').prop('checked',true)
            $('#topic-create').prop('checked',true)
            $('#topic-update').prop('checked',true)
            $('#topic-delete').prop('checked',true)

            var element = document.getElementById("setting_list");
            element.classList.remove("hide");
            var element = document.getElementById("setting_show");
                element.classList.add("hide");
            var element = document.getElementById("setting_hide");
                element.classList.remove("hide");
            
            var element = document.getElementById("bot_list");
            element.classList.remove("hide");
            var element = document.getElementById("bot_show");
                element.classList.add("hide");
            var element = document.getElementById("bot_hide");
                element.classList.remove("hide");

            var element = document.getElementById("category_list");
            element.classList.remove("hide");
            var element = document.getElementById("category_show");
                element.classList.add("hide");
            var element = document.getElementById("category_hide");
                element.classList.remove("hide");
            
            var element = document.getElementById("banner_list");
            element.classList.remove("hide");
            var element = document.getElementById("banner_show");
                element.classList.add("hide");
            var element = document.getElementById("banner_hide");
                element.classList.remove("hide");

            var element = document.getElementById("logo_list");
            element.classList.remove("hide");
            var element = document.getElementById("logo_show");
                element.classList.add("hide");
            var element = document.getElementById("logo_hide");
                element.classList.remove("hide");

            var element = document.getElementById("social_list");
            element.classList.remove("hide");
            var element = document.getElementById("social_show");
                element.classList.add("hide");
            var element = document.getElementById("social_hide");
                element.classList.remove("hide");

            var element = document.getElementById("user_list");
            element.classList.remove("hide");
            var element = document.getElementById("user_show");
                element.classList.add("hide");
            var element = document.getElementById("user_hide");
                element.classList.remove("hide");

            var element = document.getElementById("topic_list");
            element.classList.remove("hide");
            var element = document.getElementById("topic_show");
                element.classList.add("hide");
            var element = document.getElementById("topic_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#Listbot').prop('checked',false)
            $('#bot-list').prop('checked',false)
            $('#bot-create').prop('checked',false)
            $('#bot-update').prop('checked',false)
            $('#bot-delete').prop('checked',false)

            $('#Listcategory').prop('checked',false)
            $('#category-list').prop('checked',false)
            $('#category-create').prop('checked',false)
            $('#category-update').prop('checked',false)
            $('#category-delete').prop('checked',false)

            $('#Listbanner').prop('checked',false)
            $('#banner-list').prop('checked',false)
            $('#banner-create').prop('checked',false)
            $('#banner-update').prop('checked',false)
            $('#banner-delete').prop('checked',false)

            $('#Listlogo').prop('checked',false)
            $('#logo-list').prop('checked',false)
            $('#logo-create').prop('checked',false)
            $('#logo-update').prop('checked',false)
            $('#logo-delete').prop('checked',false)

            $('#Listsocial').prop('checked',false)
            $('#social-list').prop('checked',false)
            $('#social-create').prop('checked',false)
            $('#social-update').prop('checked',false)
            $('#social-delete').prop('checked',false)

            $('#Listuser').prop('checked',false)
            $('#user-list').prop('checked',false)
            $('#user-create').prop('checked',false)
            $('#user-update').prop('checked',false)
            $('#user-delete').prop('checked',false)
            $('#user-permission').prop('checked',false)

            $('#Listtopic').prop('checked',false)
            $('#topic-list').prop('checked',false)
            $('#topic-create').prop('checked',false)
            $('#topic-update').prop('checked',false)
            $('#topic-delete').prop('checked',false)
            
            var element = document.getElementById("setting_list");
            element.classList.add("hide");
            var element = document.getElementById("setting_show");
                element.classList.remove("hide");
            var element = document.getElementById("setting_hide");
                element.classList.add("hide");

            var element = document.getElementById("bot_list");
            element.classList.add("hide");
            var element = document.getElementById("bot_show");
                element.classList.remove("hide");
            var element = document.getElementById("bot_hide");
                element.classList.add("hide");

            var element = document.getElementById("category_list");
            element.classList.add("hide");
            var element = document.getElementById("category_show");
                element.classList.remove("hide");
            var element = document.getElementById("category_hide");
                element.classList.add("hide");

            var element = document.getElementById("banner_list");
            element.classList.add("hide");
            var element = document.getElementById("banner_show");
                element.classList.remove("hide");
            var element = document.getElementById("banner_hide");
                element.classList.add("hide");

            var element = document.getElementById("logo_list");
            element.classList.add("hide");
            var element = document.getElementById("logo_show");
                element.classList.remove("hide");
            var element = document.getElementById("logo_hide");
                element.classList.add("hide");
            
            var element = document.getElementById("social_list");
            element.classList.add("hide");
            var element = document.getElementById("social_show");
                element.classList.remove("hide");
            var element = document.getElementById("social_hide");
                element.classList.add("hide");
            
            var element = document.getElementById("user_list");
            element.classList.add("hide");
            var element = document.getElementById("user_show");
                element.classList.remove("hide");
            var element = document.getElementById("user_hide");
                element.classList.add("hide");

            var element = document.getElementById("topic_list");
            element.classList.add("hide");
            var element = document.getElementById("topic_show");
                element.classList.remove("hide");
            var element = document.getElementById("topic_hide");
                element.classList.add("hide");
        }
    });












    $(".highlight_show").click(function() {
        var element = document.getElementById("highlight_list");
        element.classList.remove("hide");
        var element = document.getElementById("highlight_show");
        element.classList.add("hide");
        var element = document.getElementById("highlight_hide");
        element.classList.remove("hide");
    });
    $(".highlight_hide").click(function() {
        var element = document.getElementById("highlight_list");
        element.classList.add("hide");
        var element = document.getElementById("highlight_hide");
        element.classList.add("hide");
        var element = document.getElementById("highlight_show");
        element.classList.remove("hide");
    });
    const Listhighlight = document.getElementById('Listhighlight');
        if (Listhighlight.checked == true){
                var element = document.getElementById("highlight_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("highlight_show");
                        element.classList.add("hide");
                    var element = document.getElementById("highlight_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("highlight_list");
                    element.classList.add("hide");
        }
    Listhighlight.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#highlight-list').prop('checked',true)
            $('#highlight-create').prop('checked',true)
            $('#highlight-update').prop('checked',true)
            $('#highlight-delete').prop('checked',true)
            var element = document.getElementById("highlight_list");
            element.classList.remove("hide");

            var element = document.getElementById("highlight_show");
                element.classList.add("hide");
            var element = document.getElementById("highlight_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#highlight-list').prop('checked',false)
            $('#highlight-create').prop('checked',false)
            $('#highlight-update').prop('checked',false)
            $('#highlight-delete').prop('checked',false)
            var element = document.getElementById("highlight_list");
            element.classList.add("hide");
            var element = document.getElementById("highlight_show");
                element.classList.remove("hide");
            var element = document.getElementById("highlight_hide");
                element.classList.add("hide");
        }
    });

    $(".channel_show").click(function() {
        var element = document.getElementById("channel_list");
        element.classList.remove("hide");
        var element = document.getElementById("channel_show");
        element.classList.add("hide");
        var element = document.getElementById("channel_hide");
        element.classList.remove("hide");
    });
    $(".channel_hide").click(function() {
        var element = document.getElementById("channel_list");
        element.classList.add("hide");
        var element = document.getElementById("channel_hide");
        element.classList.add("hide");
        var element = document.getElementById("channel_show");
        element.classList.remove("hide");
    });
    const ListChannel = document.getElementById('ListChannel');
        if (ListChannel.checked == true){
                var element = document.getElementById("channel_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("channel_show");
                        element.classList.add("hide");
                    var element = document.getElementById("channel_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("channel_list");
                    element.classList.add("hide");
        }
    ListChannel.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#channel-list').prop('checked',true)
            $('#channel-create').prop('checked',true)
            $('#channel-update').prop('checked',true)
            $('#channel-delete').prop('checked',true)
            var element = document.getElementById("channel_list");
            element.classList.remove("hide");

            var element = document.getElementById("channel_show");
                element.classList.add("hide");
            var element = document.getElementById("channel_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#channel-list').prop('checked',false)
            $('#channel-create').prop('checked',false)
            $('#channel-update').prop('checked',false)
            $('#channel-delete').prop('checked',false)
            var element = document.getElementById("channel_list");
            element.classList.add("hide");
            var element = document.getElementById("channel_show");
                element.classList.remove("hide");
            var element = document.getElementById("channel_hide");
                element.classList.add("hide");
        }
    });

    $(".new_show").click(function() {
        var element = document.getElementById("new_list");
        element.classList.remove("hide");
        var element = document.getElementById("new_show");
        element.classList.add("hide");
        var element = document.getElementById("new_hide");
        element.classList.remove("hide");
    });
    $(".new_hide").click(function() {
        var element = document.getElementById("new_list");
        element.classList.add("hide");
        var element = document.getElementById("new_hide");
        element.classList.add("hide");
        var element = document.getElementById("new_show");
        element.classList.remove("hide");
    });
    const Listnew = document.getElementById('Listnew');
        if (Listnew.checked == true){
                var element = document.getElementById("new_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("new_show");
                        element.classList.add("hide");
                    var element = document.getElementById("new_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("new_list");
                    element.classList.add("hide");
        }
    Listnew.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#new-list').prop('checked',true)
            $('#new-create').prop('checked',true)
            $('#new-update').prop('checked',true)
            $('#new-delete').prop('checked',true)
            var element = document.getElementById("new_list");
            element.classList.remove("hide");

            var element = document.getElementById("new_show");
                element.classList.add("hide");
            var element = document.getElementById("new_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#new-list').prop('checked',false)
            $('#new-create').prop('checked',false)
            $('#new-update').prop('checked',false)
            $('#new-delete').prop('checked',false)
            var element = document.getElementById("new_list");
            element.classList.add("hide");
            var element = document.getElementById("new_show");
                element.classList.remove("hide");
            var element = document.getElementById("new_hide");
                element.classList.add("hide");
        }
    });
    

    $(".bot_show").click(function() {
        var element = document.getElementById("bot_list");
        element.classList.remove("hide");
        var element = document.getElementById("bot_show");
        element.classList.add("hide");
        var element = document.getElementById("bot_hide");
        element.classList.remove("hide");
    });
    $(".bot_hide").click(function() {
        var element = document.getElementById("bot_list");
        element.classList.add("hide");
        var element = document.getElementById("bot_hide");
        element.classList.add("hide");
        var element = document.getElementById("bot_show");
        element.classList.remove("hide");
    });
    const Listbot = document.getElementById('Listbot');
        if (Listbot.checked == true){
                var element = document.getElementById("bot_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("bot_show");
                        element.classList.add("hide");
                    var element = document.getElementById("bot_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("bot_list");
                    element.classList.add("hide");
        }
    Listbot.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#bot-list').prop('checked',true)
            $('#bot-create').prop('checked',true)
            $('#bot-update').prop('checked',true)
            $('#bot-delete').prop('checked',true)
            var element = document.getElementById("bot_list");
            element.classList.remove("hide");

            var element = document.getElementById("bot_show");
                element.classList.add("hide");
            var element = document.getElementById("bot_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#bot-list').prop('checked',false)
            $('#bot-create').prop('checked',false)
            $('#bot-update').prop('checked',false)
            $('#bot-delete').prop('checked',false)
            var element = document.getElementById("bot_list");
            element.classList.add("hide");
            var element = document.getElementById("bot_show");
                element.classList.remove("hide");
            var element = document.getElementById("bot_hide");
                element.classList.add("hide");
        }
    });

    $(".category_show").click(function() {
        var element = document.getElementById("category_list");
        element.classList.remove("hide");
        var element = document.getElementById("category_show");
        element.classList.add("hide");
        var element = document.getElementById("category_hide");
        element.classList.remove("hide");
    });
    $(".category_hide").click(function() {
        var element = document.getElementById("category_list");
        element.classList.add("hide");
        var element = document.getElementById("category_hide");
        element.classList.add("hide");
        var element = document.getElementById("category_show");
        element.classList.remove("hide");
    });
    const Listcategory = document.getElementById('Listcategory');
        if (Listcategory.checked == true){
                var element = document.getElementById("category_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("category_show");
                        element.classList.add("hide");
                    var element = document.getElementById("category_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("category_list");
                    element.classList.add("hide");
        }
    Listcategory.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#category-list').prop('checked',true)
            $('#category-create').prop('checked',true)
            $('#category-update').prop('checked',true)
            $('#category-delete').prop('checked',true)
            var element = document.getElementById("category_list");
            element.classList.remove("hide");

            var element = document.getElementById("category_show");
                element.classList.add("hide");
            var element = document.getElementById("category_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#category-list').prop('checked',false)
            $('#category-create').prop('checked',false)
            $('#category-update').prop('checked',false)
            $('#category-delete').prop('checked',false)
            var element = document.getElementById("category_list");
            element.classList.add("hide");
            var element = document.getElementById("category_show");
                element.classList.remove("hide");
            var element = document.getElementById("category_hide");
                element.classList.add("hide");
        }
    });

    $(".banner_show").click(function() {
        var element = document.getElementById("banner_list");
        element.classList.remove("hide");
        var element = document.getElementById("banner_show");
        element.classList.add("hide");
        var element = document.getElementById("banner_hide");
        element.classList.remove("hide");
    });
    $(".banner_hide").click(function() {
        var element = document.getElementById("banner_list");
        element.classList.add("hide");
        var element = document.getElementById("banner_hide");
        element.classList.add("hide");
        var element = document.getElementById("banner_show");
        element.classList.remove("hide");
    });
    const Listbanner = document.getElementById('Listbanner');
        if (Listbanner.checked == true){
                var element = document.getElementById("banner_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("banner_show");
                        element.classList.add("hide");
                    var element = document.getElementById("banner_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("banner_list");
                    element.classList.add("hide");
        }
    Listbanner.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#banner-list').prop('checked',true)
            $('#banner-create').prop('checked',true)
            $('#banner-update').prop('checked',true)
            $('#banner-delete').prop('checked',true)
            var element = document.getElementById("banner_list");
            element.classList.remove("hide");

            var element = document.getElementById("banner_show");
                element.classList.add("hide");
            var element = document.getElementById("banner_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#banner-list').prop('checked',false)
            $('#banner-create').prop('checked',false)
            $('#banner-update').prop('checked',false)
            $('#banner-delete').prop('checked',false)
            var element = document.getElementById("banner_list");
            element.classList.add("hide");
            var element = document.getElementById("banner_show");
                element.classList.remove("hide");
            var element = document.getElementById("banner_hide");
                element.classList.add("hide");
        }
    });
    
    $(".logo_show").click(function() {
        var element = document.getElementById("logo_list");
        element.classList.remove("hide");
        var element = document.getElementById("logo_show");
        element.classList.add("hide");
        var element = document.getElementById("logo_hide");
        element.classList.remove("hide");
    });
    $(".logo_hide").click(function() {
        var element = document.getElementById("logo_list");
        element.classList.add("hide");
        var element = document.getElementById("logo_hide");
        element.classList.add("hide");
        var element = document.getElementById("logo_show");
        element.classList.remove("hide");
    });
    const Listlogo = document.getElementById('Listlogo');
        if (Listlogo.checked == true){
                var element = document.getElementById("logo_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("logo_show");
                        element.classList.add("hide");
                    var element = document.getElementById("logo_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("logo_list");
                    element.classList.add("hide");
        }
    Listlogo.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#logo-list').prop('checked',true)
            $('#logo-create').prop('checked',true)
            $('#logo-update').prop('checked',true)
            $('#logo-delete').prop('checked',true)
            var element = document.getElementById("logo_list");
            element.classList.remove("hide");

            var element = document.getElementById("logo_show");
                element.classList.add("hide");
            var element = document.getElementById("logo_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#logo-list').prop('checked',false)
            $('#logo-create').prop('checked',false)
            $('#logo-update').prop('checked',false)
            $('#logo-delete').prop('checked',false)
            var element = document.getElementById("logo_list");
            element.classList.add("hide");
            var element = document.getElementById("logo_show");
                element.classList.remove("hide");
            var element = document.getElementById("logo_hide");
                element.classList.add("hide");
        }
    });

    $(".social_show").click(function() {
        var element = document.getElementById("social_list");
        element.classList.remove("hide");
        var element = document.getElementById("social_show");
        element.classList.add("hide");
        var element = document.getElementById("social_hide");
        element.classList.remove("hide");
    });
    $(".social_hide").click(function() {
        var element = document.getElementById("social_list");
        element.classList.add("hide");
        var element = document.getElementById("social_hide");
        element.classList.add("hide");
        var element = document.getElementById("social_show");
        element.classList.remove("hide");
    });
    const Listsocial = document.getElementById('Listsocial');
        if (Listsocial.checked == true){
                var element = document.getElementById("social_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("social_show");
                        element.classList.add("hide");
                    var element = document.getElementById("social_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("social_list");
                    element.classList.add("hide");
        }
    Listsocial.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#social-list').prop('checked',true)
            $('#social-create').prop('checked',true)
            $('#social-update').prop('checked',true)
            $('#social-delete').prop('checked',true)
            var element = document.getElementById("social_list");
            element.classList.remove("hide");

            var element = document.getElementById("social_show");
                element.classList.add("hide");
            var element = document.getElementById("social_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#social-list').prop('checked',false)
            $('#social-create').prop('checked',false)
            $('#social-update').prop('checked',false)
            $('#social-delete').prop('checked',false)
            var element = document.getElementById("social_list");
            element.classList.add("hide");
            var element = document.getElementById("social_show");
                element.classList.remove("hide");
            var element = document.getElementById("social_hide");
                element.classList.add("hide");
        }
    });

    $(".user_show").click(function() {
        var element = document.getElementById("user_list");
        element.classList.remove("hide");
        var element = document.getElementById("user_show");
        element.classList.add("hide");
        var element = document.getElementById("user_hide");
        element.classList.remove("hide");
    });
    $(".user_hide").click(function() {
        var element = document.getElementById("user_list");
        element.classList.add("hide");
        var element = document.getElementById("user_hide");
        element.classList.add("hide");
        var element = document.getElementById("user_show");
        element.classList.remove("hide");
    });
    const Listuser = document.getElementById('Listuser');
        if (Listuser.checked == true){
                var element = document.getElementById("user_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("user_show");
                        element.classList.add("hide");
                    var element = document.getElementById("user_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("user_list");
                    element.classList.add("hide");
        }
    Listuser.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#user-list').prop('checked',true)
            $('#user-create').prop('checked',true)
            $('#user-update').prop('checked',true)
            $('#user-delete').prop('checked',true)
            $('#user-permission').prop('checked',true)
            var element = document.getElementById("user_list");
            element.classList.remove("hide");

            var element = document.getElementById("user_show");
                element.classList.add("hide");
            var element = document.getElementById("user_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#user-list').prop('checked',false)
            $('#user-create').prop('checked',false)
            $('#user-update').prop('checked',false)
            $('#user-delete').prop('checked',false)
            $('#user-permission').prop('checked',false)
            var element = document.getElementById("user_list");
            element.classList.add("hide");
            var element = document.getElementById("user_show");
                element.classList.remove("hide");
            var element = document.getElementById("user_hide");
                element.classList.add("hide");
        }
    });

      $(".topic_show").click(function() {
        var element = document.getElementById("topic_list");
        element.classList.remove("hide");
        var element = document.getElementById("topic_show");
        element.classList.add("hide");
        var element = document.getElementById("topic_hide");
        element.classList.remove("hide");
    });
    $(".topic_hide").click(function() {
        var element = document.getElementById("topic_list");
        element.classList.add("hide");
        var element = document.getElementById("topic_hide");
        element.classList.add("hide");
        var element = document.getElementById("topic_show");
        element.classList.remove("hide");
    });
    const Listtopic = document.getElementById('Listtopic');
        if (Listtopic.checked == true){
                var element = document.getElementById("topic_list");
                    element.classList.remove("hide");
                    var element = document.getElementById("topic_show");
                        element.classList.add("hide");
                    var element = document.getElementById("topic_hide");
                        element.classList.remove("hide");
            }else{
                var element = document.getElementById("topic_list");
                    element.classList.add("hide");
        }
    Listtopic.addEventListener('change', e => {
        if(e.target.checked === true) {
            $('#topic-list').prop('checked',true)
            $('#topic-create').prop('checked',true)
            $('#topic-update').prop('checked',true)
            $('#topic-delete').prop('checked',true)
            var element = document.getElementById("topic_list");
            element.classList.remove("hide");

            var element = document.getElementById("topic_show");
                element.classList.add("hide");
            var element = document.getElementById("topic_hide");
                element.classList.remove("hide");
        }
        if(e.target.checked === false) {
            $('#topic-list').prop('checked',false)
            $('#topic-create').prop('checked',false)
            $('#topic-update').prop('checked',false)
            $('#topic-delete').prop('checked',false)
            var element = document.getElementById("topic_list");
            element.classList.add("hide");
            var element = document.getElementById("topic_show");
                element.classList.remove("hide");
            var element = document.getElementById("topic_hide");
                element.classList.add("hide");
        }
    });


    

</script>
@endpush



