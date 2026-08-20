@extends('layouts.backend.app',[

	'title' => 'List HighLight',

	// 'pageTitle' => 'List HighLight',

])

@section('highlight', 'active')

@section('list-hight-light', 'active')

@section('highlight-show', 'show',)

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<style>

    /* .limit-height{

        overflow: hidden;

        text-overflow: ellipsis;

        display: -webkit-box;

        -webkit-line-clamp: 3;

        line-clamp: 2;

        -webkit-box-orient: vertical;

        height: 60px;

    } */

    .text-detail{

        display: -webkit-box;

        -webkit-line-clamp: 3;

        line-clamp: 2;

        max-height: 70px;

        overflow: hidden;

        -webkit-box-orient: vertical;

        text-overflow: ellipsis;

    }

</style>

@endpush

@section('content')
@include('layouts.alert')
        <div class="card shadow mb-4">

            <div class="card-header py-3 bg-gradient-best">

                <h6 class="m-0 font-weight-bold text-primary">
                    @can('highlight-create')
                    <a href="/highlight/create" class="btn btn-sila"><i class="fas fa-plus"></i> Add HighLight</a>
                    @endcan
                </h6>

            </div>
               <form method="GET" action="/highlight">
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
                                <a href="/highlight" class="btn btn-danger text-white">Clear  <i class="fas fa-sync-alt"></i></a>
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

                                <th>Detail</th> 
                                <th>Create By</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($Highlight as $row)

                            <tr>

                                <th scope="row"  width="1%">{{$loop->iteration}}</th>

                                <td id="img-limit">

                                    @if ($row->photo)

                                            <img src="{{$row->photo}}" width="100%" height="80px" class="img-rounded">

                                            @else 

                                            <img src="/upload/no_image.jpg" alt="" width="100%" height="80px">

                                            @endif

                                </td>

                                <td style="width: 200px" >{{date('d-M-Y H:i:s', strtotime($row->date));}}</td>

                                <td >

                                    <span class="text-detail">

                                        {{$row->title}}

                                        </span>  

                                </td>

                               <td  style="width: 200px">

                                  <span class="text-detail">

                                    {{$row->detail}}

                                    </span>  

                                </td> 
                                <td  style="width: 200px">

                                    <span class="text-detail">
<!-- 
                                        @if($row->create_by == 5)
                                            Yano MC
                                        @elseif($row->create_by == 2)
                                            Yano MC
                                        @elseif($row->create_by == 1)
                                            Owner
                                        @elseif($row->create_by == 6)
                                            Dom MC
                                        @else -->
                                            {{$row->create_name->name ?? "Demo" }}
                                        <!-- @endif -->

                                    </span>  

                                </td>

                                <td style="text-align: center">

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('highlight-edit')
                                        <a href="/highlight/{{$row->id}}/edit" class="btn btn-sila btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('highlight-delete')
                                        <!-- <a href="/highlight/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></a> -->
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
                                                    
                                                    <form action="{{ route('highlight.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan

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
                    Showing {{ $Highlight->firstItem() ?? 0 }} to {{ $Highlight->lastItem() ?? 0 }} of
                    {{ $Highlight->total() }} entries
                </small>
            </div>
            <div>
                {{ $Highlight->links() }}
            </div>
        </div>

        

            </div>

        </div>
@stop