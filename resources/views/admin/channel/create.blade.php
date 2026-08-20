@extends('layouts.backend.app',[
	'title' => 'List Channel',
])
@section('channel', 'active')
@section('add-channel', 'active')
@section('channel-show', 'show',)
@push('js')
<link rel="stylesheet" href="/bootstrap/css/bootstrap-datetimepicker.css" />
<script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>
<script src="/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script type="text/javascript">
$("#date").datetimepicker({
    format: 'dd-mm-yyyy HH:ii:ss P', // 24-hour format
    fontAwesome: true,
    language: 'sma',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: true // Ensures 24-hour format
}).datetimepicker('update', new Date());
</script>
@endpush
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-write">
            Information Channel
        </h6>
    </div>

    <div class="card-body">

        <form action="/channel/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row col-md-12">
            <div class="col-md-12">

                <div class="form-group">

                    <label for="title" class="label-text">Title <span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">


                <div class="form-group">

                    <label for="category" class="label-text">Category <span class="text-danger">*</span></label>

                    <select class="form-control" id="category" name="category">

                        <option selected disabled>Select Category</option>

                        @foreach ($category as $row)

                            <option value="{{$row->id}}">{{$row->name}}</option>

                        @endforeach

                    </select>

                    @error('category')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>
                <div class="form-group">

                    <label for="video" class="label-text">Video <span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="video" name="video">

                    @error('video')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    <input type="text" class="form-control datetime" id="date" name="date">

                </div>

                <div class="form-group">

                    <label for="photo" class="label-text">Link Banner <span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="photo" name="photo">

                    @error('photo')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <label for="topic" class="label-text">Topic <span class="text-danger">*</span></label>

                     <select name="message_thread_id" id="message_thread_id" class="form-control">
                        <option value="">-- Select Topic --</option>
                        @foreach($Topic as $topic)
                            <option value="{{ $topic->message_thread_id }}">
                                {{ $topic->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('message_thread_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail">{{old('detail')}}</textarea>

                    @error('detail')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Add Channel</button>

            </span>

            <span> 

            <a href="/channel" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop