@extends('layouts.backend.app',[

	'title' => 'List HighLight',

	// 'pageTitle' => 'List HighLight',

])

@section('channel', 'active')

@section('channel-show', 'show',)
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

            Information HighLight

        </h6>

    </div>

    <div class="card-body">

        <form action="/channel/{{$channel->id}}/update" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="row col-md-12">
            <div class="col-md-12">

                <div class="form-group">

                    <label for="title" class="label-text">Title <span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $channel->title}}">

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label for="category" class="label-text">Category <span class="text-danger">*</span></label>

                    <select class="form-control" id="category" name="category">
                        <option selected value="{{$channel->category}}"> {{$channel->category_name->name ?? '' }} </option>
                        @foreach ($category as $row)
                            @if ($row->id != $channel->category)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endif
                        @endforeach
                       

                    </select>

                    @error('category')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>
                <div class="form-group">

                    <label for="video" class="label-text"> Link Video <span class="text-danger">*</span></label>

                    {{-- <input type="file" class="form-control" id="video" name="video"> --}}
                    <input type="text" class="form-control" id="video" name="video" value="{{$channel->video}}">

                    @error('video')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    @if (strlen($channel->date) > 0)

                    <input type="text" class="form-control" id="date" name="date" value="{{$channel->date}}">

                    @else

                    sila

                    <input type="text" class="form-control datetime" id="date" name="date">

                    @endif

                </div>

                <div class="form-group">

                    <label for="photo" class="label-text">Link Banner <span class="text-danger">*</span></label>

                    {{-- <input type="file" class="form-control" id="photo" name="photo"> --}}
                    <input type="text" class="form-control" id="photo" name="photo" value="{{$channel->photo}}">
                    @error('photo')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail"> {{old('detail') ? old('detail') : $channel->detail}}</textarea>

                    @error('detail')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Edit channel</button>

            </span>

            <span> 

            <a href="/channel" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop