@extends('layouts.backend.app',[

	'title' => 'List Newsfeed',

	// 'pageTitle' => 'List HighLight',

])

@section('newsfeed', 'active')

@section('list-newsfeed-light', 'active')

@section('newsfeed-show', 'show',)

@section('content')
@include('layouts.alert')
    <div class="card shadow mb-4">

        <div class="card-header py-3 bg-gradient-best">

            <h6 class="m-0 font-weight-bold text-primary">

                <a href="/newsfeed/create" class="btn btn-sila"><i class="fas fa-plus"></i> Add Newsfeed</a>

            </h6>

        </div>
         <form method="GET" action="/newsfeed">
                        <div class="row ml-1">

                            <div class="col-4">
                                <div class="form-group mr-2">
                                    <label for="dataTable_length" class="mr-2">Show</label>
                                    <select name="length" id="dataTable_length" class="custom-select  form-control"
                                        onchange="this.form.submit()">
                                        <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="search" class="mr-2">Search</label>
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Type name..." value="{{ request('search') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 ml-1">
                            <div class="col-md-12">
                                <button class="btn btn-primary text-white">Filter  <i class="fas fa-filter"></i></button>
                                <a href="/newsfeed" class="btn btn-danger text-white">Clear  <i class="fas fa-sync-alt"></i></a>
                            </div>
                        </div>

                </form>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered " id="dataTable" cellspacing="0">

                    <thead class="text-write bg-gradient-sila">

                        <tr>

                            <th>No</th>

                            <th>Banner</th>

                            <th>Date</th>

                            <th>Title</th>  

                            <!-- <th>Detail</th> -->

                            <th>Create By</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($Newsfeed as $row)

                        <tr>

                            <th scope="row"  width="1%">{{$loop->iteration}}</th>

                            <td id="img-limit" style="width: 300px ;" >

                                @if ($row->photo)

                                        <img src="{{$row->photo}}" width="100%" height="80px" class="img-rounded">

                                        @else 

                                        <img src="/upload/no_image.jpg" alt="" width="100%" height="80px">

                                        @endif

                            </td>
                            <td style="width: 150px" >
                                {{date('d-M-Y H:i:s', strtotime($row->date));}}
                            </td>

                            <td>

                                <span class="text-detail">

                                    {{$row->title}}

                                    </span>  

                            </td>
                            <td  style="width: 200px">

                                <span class="text-detail">
                                    {{$row->create_name->name ?? "Demo" }}
                                </span>  

                            </td>

                            <td style="text-align: center">

                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="/newsfeed/{{$row->id}}/edit" class="btn btn-sila btn-sm mr-1"><i class="fas fa-edit"></i></a>

                                    <!-- <a href="/newsfeed/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></a> -->
                                    <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#deleteModal{{ $row->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $row->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $row->id }}">Confirm Delete</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete <strong>{{ $row->title }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                
                                                <form action="{{ route('newsfeed.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <small>
                    Showing {{ $Newsfeed->firstItem() ?? 0 }} to {{ $Newsfeed->lastItem() ?? 0 }} of
                    {{ $Newsfeed->total() }} entries
                </small>
            </div>
            <div>
                {{ $Newsfeed->links() }}
            </div>
        </div>




        </div>

    </div>

@stop
