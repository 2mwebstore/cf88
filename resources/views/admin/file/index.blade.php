@extends('layouts.backend.app',[
	'title' => 'List File',
])
@section('file', 'active')
@section('list-file-light', 'active')
@section('file-show', 'show',)
@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    {{ $message }}
  </div>
@endif
@if ($message = Session::get('error'))
  <div class="alert alert-danger">
    {{ $message }}
  </div>
@endif
@if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-best">
            <div id="modal-create" data-keyboard="false" data-backdrop="static" class="modal fade "
                aria-modal="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="uploadfile" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title text-bold label-text">
                                    <i class="fas fa-comment-alt-dots"></i> Add File
                                </h4>
                            </div>
                            <div class="modal-body text-center label-text">
                                <input class="form-control" type="file" name="file">

                                <div id="fileList"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary ">
                                    <i class="fas fa-times fa-fw"></i> Cancel
                                </button>
                                <button type="submit"class="btn btn-sila" id="submitfile">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                      <h6 class="m-0 font-weight-bold text-primary">
                        {{-- @can('file-create') --}}
                            {{-- <a data-toggle="modal" data-target="#modal-create" title="Add file" class="btn btn-sila"><i class="fas fa-plus"></i> Add File</a> --}}
                            <a href="/d/upload" title="Go file" class="btn btn-sila"><i class="fas fa-plus"></i> Go File</a>

                        {{-- @endcan --}}
                      </h6>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" value="{{$search}}" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sila" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" cellspacing="0">
                    <thead class="text-write bg-gradient-sila">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>MD5</th>
                            <th>FolderId</th>
                            <th>Type</th>
                            <th>Thumbnail</th>
                            <th style="width: 100px;">Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($file as $row)
                        <tr>
                            <th scope="row"  width="1%">{{$loop->iteration}}</th>
                            <td>
                                <span class="text-detail">
                                    {{$row->file_id}}
                                </span>  
                            </td>
                            <td>
                                <span class="text-detail">
                                    {{$row->file_md5}}
                                </span>  
                            </td>
                            <td>
                                <span class="text-detail">
                                    {{$row->file_parentFolder}}
                                </span>  
                            </td>
                      
                            <td>
                                <span class="text-detail">
                                    {{$row->type}}
                                </span>  
                            </td>
                            <td>
                                <img src="{{$row->thumbnail}}" width="100px">
                            </td>
                            <td>
                                {{$row->link}}
                                {{-- <span class="text-detail copy-item" style="cursor: pointer;font-weight: bold;" data-link={{$row->link}}>
                                    Copy URL
                                </span>  --}}
                            </td>
                            <td style="text-align: center">
                                <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" title="Delete" class="btn btn-danger ">
                                    <i class="far fa-trash-alt fa-fw"></i>
                                </button>
                                <div id="modal-delete-{{$row->id}}" data-keyboard="false" data-backdrop="static" class="modal fade "
                                    aria-modal="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('files.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-bold label-text">
                                                        <i class="fas fa-comment-alt-dots"></i> Delete
                                                    </h4>
                                                </div>
                                                <div class="modal-body text-center label-text">
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    Are you sure, you want to delete this leave?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary ">
                                                        <i class="fas fa-times fa-fw"></i> Cancel
                                                    </button>
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="label-text">
                Showing {{ $file->firstItem() }} to {{ $file->lastItem() }} of {{ $file->total() }} entries
            </div>
            {!! $file->render() !!}
        </div>
    </div>
@stop
@push('js')
  <script>
    $(document).ready(function() {
  
        function checkFileType(mimeType) {
            if (mimeType.startsWith("image/")) {
                return "image";
            } else if (mimeType.startsWith("video/")) {
                return "video";
            } else {
                return "Unknown";
            }
        }
        $(".copy-item").on("click", function () {
            let dataId = $(this).data("link");
            let tempInput = $("<input>");
            $("body").append(tempInput);
            tempInput.val(dataId).select();
            document.execCommand("copy");
            tempInput.remove();
            $(this).text('Link Copied!');
            setTimeout(() => {
                $(this).text('Copy URL');
            }, 2000);
        });
        $("#uploadfile").submit(function(e){
            e.preventDefault();
            const apiUrl = "https://store2.gofile.io/contents/uploadfile";
            const authToken = "goOmcd0Kls8ZvUruIBjKn5L2GZQ2iQ5u"; // Replace with your actual token
            const folderId = "c92be263-6122-494a-ac25-bc464678850f"; // Replace with your actual folder ID
            const fileInput = $("input[name='file']")[0];
            if (!fileInput || fileInput.files.length === 0) {
                console.log("No file selected.");
                return;
            }
            const file = fileInput.files[0];
            const formDataForm = new FormData();
            formDataForm.append("token", authToken);
            formDataForm.append("folderId", folderId);
            formDataForm.append("file", file);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `https://store2.gofile.io/contents/uploadfile`, true);
            xhr.setRequestHeader("Authorization", `Bearer ${authToken}`); 
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) { // Check if the request is complete
                    if (xhr.status === 200) { // HTTP status code 200 indicates success
                        const response = JSON.parse(xhr.responseText)
                        if (response.status === 'ok') {
                            const HttpRequest = new XMLHttpRequest();
                            HttpRequest.open("GET", `https://api.gofile.io/contents/${response.data.id}?password=${response.data.md5}`, true);
                            HttpRequest.setRequestHeader("Authorization", `Bearer ${authToken}`);
                            HttpRequest.onreadystatechange = function () {
                                if (HttpRequest.readyState === XMLHttpRequest.DONE) {
                                    if (HttpRequest.status === 200) {
                                        const getResponse = JSON.parse(HttpRequest.responseText);
                                        if (getResponse.status === 'ok') {
                                            //Start Create Direct Link
                                                const HttpRequestDirect = new XMLHttpRequest();
                                                HttpRequestDirect.open("POST", `https://api.gofile.io/contents/${response.data.id}/directlinks`, true);
                                                HttpRequestDirect.setRequestHeader("Authorization", `Bearer ${authToken}`);
                                                HttpRequestDirect.onreadystatechange = function () {
                                                    if (HttpRequestDirect.readyState === XMLHttpRequest.DONE) {
                                                        if (HttpRequestDirect.status === 200) {
                                                            const getResponseDirect = JSON.parse(HttpRequestDirect.responseText);
                                                            if (getResponseDirect.status === 'ok') {
                                                                // Admin the Post request
                                                                    const HttpRequestPost = new XMLHttpRequest();
                                                                        HttpRequestPost.open("POST", `/api/uploadfile`, true);
                                                                        const formDataAdmin = new FormData();
                                                                        formDataAdmin.append("file_id", response.data.id);
                                                                        formDataAdmin.append("file_md5", response.data.md5);
                                                                        formDataAdmin.append("file_parentFolder", response.data.parentFolder);
                                                                        formDataAdmin.append("link", getResponseDirect.data.directLink);
                                                                        formDataAdmin.append("type", checkFileType(file.type));
                                                                        formDataAdmin.append("thumbnail", getResponse.data.thumbnail);
                                                                        HttpRequestPost.onreadystatechange = function () {
                                                                            if (HttpRequest.readyState === XMLHttpRequest.DONE) {
                                                                                if (HttpRequest.status === 200) {
                                                                                    const getResponseAdmin = JSON.parse(HttpRequestPost.responseText);
                                                                                    if (getResponseAdmin.status) {
                                                                                        // location.reload();
                                                                                        window.location.href = '/files/create';
                                                                                    }
                                                                                } else {
                                                                                    console.error("Failed to fetch details:", HttpRequestPost.statusText);
                                                                                }
                                                                            }
                                                                        };
                                                                    HttpRequestPost.send(formDataAdmin); 
                                                                // Admin the Post request
                                                            }
                                                        }
                                                    }
                                                }
                                                HttpRequestDirect.send(); 
                                            //End Create Direct Link
                                        }
                                    } else {
                                        console.error("Failed to fetch details:", HttpRequest.statusText);
                                    }
                                }
                            };
                            HttpRequest.send(); // Trigger the GET request
                        } else {
                            console.error("Upload failed:", response.message);
                        }
                        
                    } else {
                        console.error("Upload failed:", xhr.statusText);
                    }
                }
            };
            xhr.upload.onprogress = function (event) {
                if (event.lengthComputable) {
                    const GridScore = $('#fileList');
                    GridScore.html(''); // This replaces `innerHTML = ''`.
                    const htmlContent = `
                        <img src="/icon/loading.gif" alt="loading.gif" style="width: 100px;">
                    `;
                    GridScore.append(htmlContent);
                }
            };
            xhr.send(formDataForm);
        });
            
    });
  </script>
@endpush