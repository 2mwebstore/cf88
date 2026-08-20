@extends('layouts.backend.app',[

	'title' => 'List banner',

	// 'pageTitle' => 'List banner',

])

@section('banner', 'active')

@section('banner-show', 'show',)

@push('js')

<link rel="stylesheet" href="/bootstrap/css/bootstrap-datetimepicker.css" />



<script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>

<script src="/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>

<script type="text/javascript">

$("#date").datetimepicker({

    format: 'dd-mm-yyyy HH:mm:ss',

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

            Information Banner

        </h6>

    </div>

    <div class="card-body">

        <form action="/banner/{{$banner->id}}/update" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')
        <div class="row col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="label-text">Name</label>
                    <input type="text" class="form-control " id="name" name="name" value="{{$banner->name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo" class="label-text">Video</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <span class="add-btn"> 
            <button type="submit" class="btn btn-sila btn-sm">Add Banner</button>
            </span>
            <span> 
            <a href="/banner" class="btn btn-secondary btn-sm">Cancel</a>
            </span>
        </div>

        </form>

    </div>

</div>

@stop