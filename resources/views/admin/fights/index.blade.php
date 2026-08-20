@extends('layouts.backend.app',[
    'title' => 'List Fights',
])

@section('fight', 'active')
@section('list-fight-light', 'active')
@section('fight-show', 'show')

@push('css')
<link href="{{ asset('template/backend/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .text-detail{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        max-height: 50px;
        overflow: hidden;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
    }
    .fighter-cell img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
    }
</style>
@endpush

@section('content')
@include('layouts.alert')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('fights.create') }}" class="btn btn-sila"><i class="fas fa-plus"></i> Add Fight</a>
        </h6>
    </div>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('fights') }}">
        <div class="row ml-1">
            <div class="col-4">
                <div class="form-group mr-2">
                    <label for="dataTable_length" class="mr-2">Show</label>
                    <select name="length" id="dataTable_length" class="custom-select form-control" onchange="this.form.submit()">
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
                    <input type="text" name="search" id="search" class="form-control" placeholder="Type fighter name..." value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="category_id" class="mr-2">Category</label>
                    <select name="category_id" class="custom-select form-control" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3 ml-1">
            <div class="col-md-12">
                <button class="btn btn-primary text-white">Filter  <i class="fas fa-filter"></i></button>
                <a href="{{ route('fights') }}" class="btn btn-danger text-white">Clear  <i class="fas fa-sync-alt"></i></a>
            </div>
        </div>
    </form>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead class="text-write bg-gradient-sila">
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Red Fighter</th>
                        <th>Red Score</th>
                        <th>VS</th>
                        <th>Blue Fighter</th>
                        <th>Blue Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fights as $row)
                    <tr>
                        <th scope="row" width="1%">{{$row->no ?? ''}}</th>
                        <td>{{ $row->category->name ?? 'N/A' }}</td>

                        <td class="fighter-cell">
                            <img src="{{ $row->red_image ?? '/upload/no_image.jpg' }}" alt="{{ $row->red_fighter }}">
                            <div class="text-detail">{{ $row->red_fighter }}</div>
                        </td>

                        <td>{{ $row->red_score ?? 0 }}</td>

                        <td class="text-center">VS</td>

                        <td class="fighter-cell">
                            <img src="{{ $row->blue_image ?? '/upload/no_image.jpg' }}" alt="{{ $row->blue_fighter }}">
                            <div class="text-detail">{{ $row->blue_fighter }}</div>
                        </td>

                        <td>{{ $row->blue_score ?? 0 }}</td>

                        <td style="text-align: center">
            <div class="btn-group" role="group">
                <a href="{{ route('fights.edit', $row->id) }}" class="btn btn-sila btn-sm mr-1"><i class="fas fa-edit"></i></a>

                @if ($row->status == 1)
                    <button type="button" class="btn btn-success btn-sm mr-1">
                        <i class="fas fa-check-circle"></i> Active
                    </button>
                @else
                    <button type="button" class="btn btn-secondary btn-sm mr-1" data-toggle="modal" data-target="#activeModal{{ $row->id }}">
                        <i class="fas fa-circle"></i> Set Active
                    </button>
                    <div class="modal fade" id="activeModal{{ $row->id }}" tabindex="-1" aria-labelledby="activeModalLabel{{ $row->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title" id="activeModalLabel{{ $row->id }}">Confirm Set Active</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Set <strong>{{ $row->red_fighter }} VS {{ $row->blue_fighter }}</strong> as the current active fight?
                                    This will deactivate whichever fight is currently active.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('fights.setActive', $row->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Yes, Set Active</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

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
                                Are you sure you want to delete <strong>{{ $row->red_fighter }} VS {{ $row->blue_fighter }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('fights.destroy', $row->id) }}" method="POST" style="display:inline;">
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
                    Showing {{ $fights->firstItem() ?? 0 }} to {{ $fights->lastItem() ?? 0 }} of {{ $fights->total() }} entries
                </small>
            </div>
            <div>
                {{ $fights->links() }}
            </div>
        </div>
    </div>
</div>
@stop
