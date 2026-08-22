@extends('layouts.backend.app',[

	'title' => 'Video R2 Upload',

])

@section('video-r2-upload', 'active')

@section('content')
@include('layouts.alert')

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">Upload Files</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="fileUploadMulti" class="label-text">Choose one or more files</label>
            <input type="file" class="form-control-file" id="fileUploadMulti" multiple>
        </div>
        <div id="uploadQueue"></div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">Uploaded Files</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead class="text-write bg-gradient-sila">
                    <tr>
                        <th>No</th>
                        <th>Public URL</th>
                        <th>Uploaded</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($uploads as $row)
                        <tr>
                            <th scope="row" width="1%">{{ $loop->iteration }}</th>

                            <td>
                                <div class="input-group">
                                    <input type="text" id="publicUrlRow{{ $row->id }}" class="form-control" value="{{ $row->url }}" readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" onclick="copyToClipboard('publicUrlRow{{ $row->id }}')">Copy</button>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $row->created_at->format('Y-m-d H:i') }}</td>

                            <td style="text-align: center">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $row->id }}">
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
                                                Are you sure you want to delete this file?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('video-r2-upload.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </form>
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
                    Showing {{ $uploads->firstItem() ?? 0 }} to {{ $uploads->lastItem() ?? 0 }} of
                    {{ $uploads->total() }} entries
                </small>
            </div>
            <div>
                {{ $uploads->links() }}
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('js/video-r2-upload.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    handleMultiUpload({
        inputId: 'fileUploadMulti',
        queueId: 'uploadQueue',
    });
});
</script>
@endpush
@stop