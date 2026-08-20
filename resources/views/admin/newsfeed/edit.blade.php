@extends('layouts.backend.app',[

	'title' => 'List Newsfeed',

	// 'pageTitle' => 'List Newsfeed',

])

@section('newsfeed', 'active')
@section('list-newsfeed-light', 'active')
@section('newsfeed-show', 'show',)

@push('js')

<link rel="stylesheet" href="/bootstrap/css/bootstrap-datetimepicker.css" />



<script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>

<script src="/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>

<script type="text/javascript">

$("#date").datetimepicker({

    format: 'dd-mm-yyyy HH:mm:ss P',

    fontAwesome: true,

    language: 'sma',

    weekStart: 1,

    todayBtn: 1,

    autoclose: 1,

    todayHighlight: 1,

    startView: 2,

    forceParse: 0

}).datetimepicker('update', new Date());



</script>

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        <h6 class="m-0 font-weight-bold text-write">

            Information Newsfeed

        </h6>

    </div>

    <div class="card-body">

        <form action="/newsfeed/{{$Newsfeed->id}}/update" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="row col-md-12">

            <div class="col-md-12">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    @if (strlen($Newsfeed->date) > 0)

                    <input type="text" class="form-control" id="date" name="date" value="{{$Newsfeed->date}}">

                    @else



                    <input type="text" class="form-control datetime" id="date" name="date">

                    @endif

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="title" class="label-text">Title<span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $Newsfeed->title}}">

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="photo" class="label-text"> Link Banner <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="photo" name="photo" value="{{$Newsfeed->photo}}">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail"> {{old('detail') ? old('detail') : $Newsfeed->detail}}</textarea>
                    @error('detail')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo2" class="label-text"> Link Banner 2</label>
                    <input type="text" class="form-control" id="photo2" name="photo2" value="{{$Newsfeed->photo2}}">
                    @error('photo2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 2</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail2"> {{old('detail2') ? old('detail2') : $Newsfeed->detail1}}</textarea>
                    @error('detail1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo3" class="label-text"> Link Banner 3</label>
                    <input type="text" class="form-control" id="photo3" name="photo3" value="{{$Newsfeed->photo3}}">
                    @error('photo3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 3</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail3"> {{old('detail3') ? old('detail3') : $Newsfeed->detail3}}</textarea>
                    @error('detail3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo4" class="label-text"> Link Banner 4</label>
                    <input type="text" class="form-control" id="photo4" name="photo4" value="{{$Newsfeed->photo4}}">
                    @error('photo4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 4</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail4"> {{old('detail4') ? old('detail4') : $Newsfeed->detail4}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo5" class="label-text"> Link Banner 5</label>
                    <input type="text" class="form-control" id="photo5" name="photo5" value="{{$Newsfeed->photo5}}">
                    @error('photo5')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 5</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail5"> {{old('detail5') ? old('detail5') : $Newsfeed->detail5}}</textarea>
                    @error('detail5')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo6" class="label-text"> Link Banner 6</label>
                    <input type="text" class="form-control" id="photo6" name="photo6" value="{{$Newsfeed->photo6}}">
                    @error('photo6')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 6</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail6"> {{old('detail6') ? old('detail6') : $Newsfeed->detail6}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo7" class="label-text"> Link Banner 7</label>
                    <input type="text" class="form-control" id="photo7" name="photo7" value="{{$Newsfeed->photo7}}">
                    @error('photo7')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 7</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail7"> {{old('detail7') ? old('detail7') : $Newsfeed->detail7}}</textarea>
                    @error('detail7')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo8" class="label-text"> Link Banner 8</label>
                    <input type="text" class="form-control" id="photo8" name="photo8" value="{{$Newsfeed->photo8}}">
                    @error('photo8')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 8</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail8"> {{old('detail8') ? old('detail8') : $Newsfeed->detail8}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo9" class="label-text"> Link Banner 9</label>
                    <input type="text" class="form-control" id="photo9" name="photo9" value="{{$Newsfeed->photo9}}">
                    @error('photo9')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 9</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail9"> {{old('detail9') ? old('detail9') : $Newsfeed->detail9}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo10" class="label-text"> Link Banner 10</label>
                    <input type="text" class="form-control" id="photo10" name="photo10" value="{{$Newsfeed->photo10}}">
                    @error('photo13')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 10</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail10"> {{old('detail10') ? old('detail10') : $Newsfeed->detail10}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo11" class="label-text"> Link Banner 11</label>
                    <input type="text" class="form-control" id="photo11" name="photo11" value="{{$Newsfeed->photo11}}">
                    @error('photo11')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 11</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail11"> {{old('detail11') ? old('detail11') : $Newsfeed->detail11}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo12" class="label-text"> Link Banner 12</label>
                    <input type="text" class="form-control" id="photo12" name="photo12" value="{{$Newsfeed->photo12}}">
                    @error('photo12')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 12</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail12"> {{old('detail12') ? old('detail12') : $Newsfeed->detail12}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="photo13" class="label-text"> Link Banner 13</label>
                    <input type="text" class="form-control" id="photo13" name="photo13" value="{{$Newsfeed->photo13}}">
                    @error('photo13')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div hidden class="col-md-12">
                <div class="form-group">
                    <label for="editor" class="label-text">Detail 13</label>
                    <textarea class="form-control" id="editor" rows="12"style="
                    height: 125px;" name="detail13"> {{old('detail13') ? old('detail13') : $Newsfeed->detail13}}</textarea>
                    @error('detail4')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Edit Newsfeed</button>

            </span>

            <span> 

            <a href="/newsfeed" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop