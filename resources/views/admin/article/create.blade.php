@extends('layouts.backend.app',[

	'title' => 'List Article',

	// 'pageTitle' => 'List article',

])

@section('article', 'active')

@section('add-article-light', 'active')

@section('article-show', 'show',)

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

            Information Article

        </h6>

    </div>

    <div class="card-body">

        <form action="/article/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row col-md-12">

            <div class="col-md-12">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    <input type="text" class="form-control datetime" id="date" name="date">

                </div>

            </div>
            <div class="col-md-12">

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
                    <label for="title" class="label-text">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo" class="label-text">Link Banner  <span class="text-danger">*</span></label>

                    <input type="text" class="form-control" id="photo" name="photo">

                    @error('photo')

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

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo1" class="label-text">Link Banner 1</label>

                    <input type="text" class="form-control" id="photo1" name="photo1">

                    @error('photo1')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 1</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail1">{{old('detail1')}}</textarea>

                    @error('detail1')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo2" class="label-text">Link Banner 2</label>

                    <input type="text" class="form-control" id="photo2" name="photo2">

                    @error('photo2')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 2</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail2">{{old('detail2')}}</textarea>

                    @error('detail2')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo3" class="label-text">Link Banner 3</label>

                    <input type="text" class="form-control" id="photo3" name="photo3">

                    @error('photo3')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 3</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail3">{{old('detail3')}}</textarea>

                    @error('detail3')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo4" class="label-text">Link Banner 4</label>

                    <input type="text" class="form-control" id="photo4" name="photo4">

                    @error('photo4')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 4</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail4">{{old('detail4')}}</textarea>

                    @error('detail4')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo5" class="label-text">Link Banner 5</label>

                    <input type="text" class="form-control" id="photo5" name="photo5">

                    @error('photo5')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 5</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail5">{{old('detail5')}}</textarea>

                    @error('detail5')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo6" class="label-text">Link Banner 6</label>

                    <input type="text" class="form-control" id="photo6" name="photo6">

                    @error('photo6')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 6</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail6">{{old('detail6')}}</textarea>

                    @error('detail6')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo7" class="label-text">Link Banner 7</label>

                    <input type="text" class="form-control" id="photo7" name="photo7">

                    @error('photo7')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 7</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail7">{{old('detail7')}}</textarea>

                    @error('detail7')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo8" class="label-text">Link Banner 8</label>

                    <input type="text" class="form-control" id="photo8" name="photo8">

                    @error('photo8')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 8</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail8">{{old('detail8')}}</textarea>

                    @error('detail8')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo9" class="label-text">Link Banner 9</label>

                    <input type="text" class="form-control" id="photo9" name="photo9">

                    @error('photo9')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 9</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail9">{{old('detail9')}}</textarea>

                    @error('detail9')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo10" class="label-text">Link Banner 10</label>

                    <input type="text" class="form-control" id="photo10" name="photo10">

                    @error('photo10')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 10</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail10">{{old('detail10')}}</textarea>

                    @error('detail10')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo11" class="label-text">Link Banner 11</label>

                    <input type="text" class="form-control" id="photo11" name="photo11">

                    @error('photo11')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 12</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail12">{{old('detail12')}}</textarea>

                    @error('detail12')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="photo13" class="label-text">Link Banner 13</label>

                    <input type="text" class="form-control" id="photo13" name="photo13">

                    @error('photo13')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail 13</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail13">{{old('detail13')}}</textarea>

                    @error('detail13')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
      

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Add Article</button>

            </span>

            <span> 

            <a href="/article" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop