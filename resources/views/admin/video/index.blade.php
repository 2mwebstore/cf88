@extends('layouts.backend.app',[

	'title' => 'List Video',

	// 'pageTitle' => 'List HighLight',

])

@section('video', 'active')

@section('list-video-light', 'active')

@section('video-show', 'show',)

@section('content')
@include('layouts.alert')

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">
            <button  data-toggle="modal" data-target="#createModal" class="btn btn-sila">
                <i class="fas fa-plus"></i> Add Video
            </button>
        </h6>
    </div>
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title label-text" id="createModalLabel">Create New Video</h5>
                        <i class="fas fa-times" aria-hidden="true" data-dismiss="modal" style="cursor:pointer;"></i>
                    </div>
                    <div class="modal-body text-left">
                        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="label-text">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter video title" required>
                            </div>

                            <div class="form-group">
                                <label for="message" class="label-text">Message</label>
                                <input type="text" class="form-control" name="message" placeholder="Enter short description" required>
                            </div>

                            <div class="form-group">
                                <label for="url" class="label-text">Video Link</label>
                                <input type="text" class="form-control" name="url" placeholder="Enter video link " required>
                            </div>

                            <div class="form-group">
                                <label for="thumbCreate" class="label-text">Thumbnail Link</label>
                                <input type="text" id="thumbCreate" class="form-control thumb-input" name="thumb" placeholder="Enter thumbnail image URL" required>
                            </div>

                            <div class="form-group text-center">
                                <label class="label-text d-block mb-2">Thumbnail Preview</label>
                                <img id="thumbPreviewCreate" 
                                    src="{{ asset('images/no-image.png') }}" 
                                    alt="Thumbnail Preview"
                                    class="thumb-preview"
                                    style="max-width: 100%; border-radius: 8px; border: 1px solid #ccc;">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sila">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <form method="GET" action="/videos">
        <div class="row ml-1">
            <div class="col-4">
                <div class="form-group mr-2">
                    <label for="dataTable_length" class="mr-2">Show</label>
                    <select name="length" id="dataTable_length" class="custom-select form-control"
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
                <button class="btn btn-primary text-white">Filter <i class="fas fa-filter"></i></button>
                <a href="{{ route('video') }}" class="btn btn-danger text-white">Clear <i class="fas fa-sync-alt"></i></a>
            </div>
        </div>
    </form>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead class="text-write bg-gradient-sila">
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>LINK</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($videos as $row)
                        <tr>
                            <th scope="row" width="1%">{{ $loop->iteration }}</th>

                            <td id="img-limit" style="width: 300px;">
                                @if ($row->thumb)
                                    <img src="{{ $row->thumb }}" width="100%" height="80px" class="img-rounded">
                                @else
                                    <img src="/upload/no_image.jpg" alt="" width="100%" height="80px">
                                @endif
                            </td>


                            <td>
                                <span class="text-detail">{{ $row->title }}</span>
                            </td>
                            <td>
                                <span class="text-detail">{{ $row->message }}</span>
                            </td>

                          
                            <td style="width: 200px">
                                <span class="text-detail">{{ $row->url ?? 'url' }}</span>
                            </td>

                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button class="btn btn-sila btn-sm mr-1" data-toggle="modal" data-target="#editModal{{ $row->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <div class="modal fade" id="editModal{{ $row->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>
                                                <i class="fas fa-times" aria-hidden="true" data-dismiss="modal"></i>
                                                </div>
                                                <div class="modal-body  text-left">
                                                    <form action="{{ route('video.edit', $row->id) }}"  method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label for="title" class="label-text"> Title</label>
                                                            <input type="text" class="form-control" name="title" value="{{ $row->title }}" required>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="message" class="label-text"> Message</label>
                                                            <input type="text" class="form-control" name="message" value="{{ $row->message }}" required>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="url" class="label-text"> Video Link</label>
                                                            <input type="text" class="form-control" name="url" value="{{ $row->url }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="thumb{{ $row->id }}" class="label-text"> Thumbnail Link</label>
                                                            <input type="text"  id="thumb{{ $row->id }}"  class="form-control thumb-input" name="thumb" value="{{ $row->thumb }}" required>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <label class="label-text d-block mb-2">Thumbnail Preview</label>
                                                            <img id="thumbPreview{{ $row->id }}" 
                                                                src="{{ $row->thumb }}" 
                                                                alt="Thumbnail Preview"
                                                                class="thumb-preview"
                                                                style="max-width: 100%; border-radius: 8px; border: 1px solid #ccc;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-sila ">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#deleteModal{{ $row->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $row->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $row->id }}">
                                                        Confirm Delete
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete <strong>{{ $row->title }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="{{ route('video.destroy', $row->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination info -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <small>
                    Showing {{ $videos->firstItem() ?? 0 }} to {{ $videos->lastItem() ?? 0 }} of
                    {{ $videos->total() }} entries
                </small>
            </div>
            <div>
                {{ $videos->links() }}
            </div>
        </div>
    </div>
</div>
@push('js')

<script type="text/javascript">
    
$(document).ready(function() {
    // Handle thumbnail preview update for any input
    $(document).on('input', '.thumb-input', function() {
        let url = $(this).val().trim();
        let previewId = $(this).attr('id').replace('thumb', 'thumbPreview');
        let $preview = $('#' + previewId);

        if (url) {
            $preview.attr('src', url);
        } else {
            $preview.attr('src', "{{ asset('images/no-image.png') }}"); // fallback
        }
    });
});
</script>
@endpush
@stop
