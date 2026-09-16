@extends('layouts.backend.app',[

	'title' => 'Video R2 Upload',

])

@section('video-r2-upload', 'active')

@section('content')
@include('layouts.alert')

<style>
    .thumb-preview {
        object-fit: cover;
        border-radius: 4px;
        background: #000;
    }
</style>

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
        <div class="mb-3">
            <form id="bulkDeleteForm" action="{{ route('video-r2-upload.bulkDestroy') }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <div id="bulkDeleteIdsContainer"></div>
                <button type="button" id="bulkDeleteBtn" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#bulkDeleteModal" disabled>
                    <i class="fas fa-trash"></i> Delete Selected (<span id="selectedCount">0</span>)
                </button>
            </form>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteOldModal1">
                <i class="fas fa-trash"></i> Delete Keep 1 Month
            </button>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteOldModal3">
                <i class="fas fa-trash"></i> Delete Keep 3 Month
            </button>
        </div>

        <div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="bulkDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong><span id="selectedCountModal">0</span></strong> selected file(s)?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="confirmBulkDeleteBtn" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteOldModal1" tabindex="-1" aria-labelledby="deleteOldModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="deleteOldModal1Label">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Delete all files older than <strong>1 month</strong>? This will keep only files from the last 1 month.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('video-r2-upload.deleteOld', 1) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteOldModal3" tabindex="-1" aria-labelledby="deleteOldModal3Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="deleteOldModal3Label">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Delete all files older than <strong>3 months</strong>? This will keep only files from the last 3 months.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('video-r2-upload.deleteOld', 3) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead class="text-write bg-gradient-sila">
                    <tr>
                        <th width="1%"><input type="checkbox" id="selectAllCheckbox"></th>
                        <th>No</th>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Public URL</th>
                        <th>Uploaded</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($uploads as $row)
                        @php
                            $path = parse_url($row->url, PHP_URL_PATH) ?? $row->url;
                            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                            $isVideo = in_array($ext, ['mp4', 'mov', 'webm', 'mkv', 'm4v', 'avi']);
                            $title = $row->title ?? pathinfo($path, PATHINFO_FILENAME);
                        @endphp
                        <tr>
                            <td width="1%"><input type="checkbox" class="rowCheckbox" value="{{ $row->id }}"></td>

                            <th scope="row" width="1%">{{ $loop->iteration }}</th>

                            <td style="width: 130px">
                                @if ($isVideo)
                                    <video src="{{ $row->url }}" class="thumb-preview" width="110" height="70" preload="metadata" muted playsinline></video>
                                @else
                                    <img src="{{ $row->url }}" class="thumb-preview" width="110" height="70" alt="{{ $title }}">
                                @endif
                            </td>

                            <td>
                                <span class="text-detail">{{ $title }}</span>
                            </td>

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

document.addEventListener('DOMContentLoaded', function () {
    var selectAll = document.getElementById('selectAllCheckbox');
    var rowCheckboxes = document.querySelectorAll('.rowCheckbox');
    var bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    var selectedCount = document.getElementById('selectedCount');
    var selectedCountModal = document.getElementById('selectedCountModal');
    var confirmBulkDeleteBtn = document.getElementById('confirmBulkDeleteBtn');
    var bulkDeleteForm = document.getElementById('bulkDeleteForm');
    var bulkDeleteIdsContainer = document.getElementById('bulkDeleteIdsContainer');

    function updateSelectedCount() {
        var checked = document.querySelectorAll('.rowCheckbox:checked');
        var count = checked.length;
        if (selectedCount) selectedCount.textContent = count;
        if (selectedCountModal) selectedCountModal.textContent = count;
        if (bulkDeleteBtn) bulkDeleteBtn.disabled = count === 0;
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(function (cb) {
                cb.checked = selectAll.checked;
            });
            updateSelectedCount();
        });
    }

    rowCheckboxes.forEach(function (cb) {
        cb.addEventListener('change', function () {
            if (!cb.checked && selectAll) {
                selectAll.checked = false;
            }
            updateSelectedCount();
        });
    });

    if (confirmBulkDeleteBtn) {
        confirmBulkDeleteBtn.addEventListener('click', function () {
            var checked = document.querySelectorAll('.rowCheckbox:checked');
            bulkDeleteIdsContainer.innerHTML = '';
            checked.forEach(function (cb) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ids[]';
                input.value = cb.value;
                bulkDeleteIdsContainer.appendChild(input);
            });
            bulkDeleteForm.submit();
        });
    }
});
</script>
@endpush
@stop