@section('Setting-active', 'active')

@section('list_Topic', 'active')

@section('Setting', 'show')

@extends('layouts.backend.app',[

    'title' => 'List Topic',

])

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        <h6 class="m-0 font-weight-bold text-primary">
            {{-- @can('topic-create') --}}
            <button id="add_pic" type="submit" class="btn btn-sila" data-bs-toggle="modal" data-bs-target="#meme">

                Add Topic

              </button>
              {{-- @endcan --}}

        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead  class="text-write bg-gradient-sila">

                    <tr>

                        <th hidden>id</th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Topic Id</th>
                        <th>Action</th>

                    </tr>

                </thead>



                <tbody>

                    @foreach ($Topic as $row)

                        <tr>

                        <th hidden>{{$row->id}}</th>

                        <th scope="row"  width="1%">{{$loop->iteration}}</th>

                        <td>{{$row->name}}</td>

                        <td>{{$row->message_thread_id}}</td>

                        <td width="80px" style="text-align: center">

                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- @can('topic-edit') --}}
                                <a id="edit_topic" class="btn btn-sila btn-sm mr-1 edit_topic">

                                    <i class="fas fa-edit"></i>

                                </a>
                                {{-- @endcan --}}
                                {{-- @can('topic-delete') --}}
                                <a href="/topic/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1">

                                    <i class="fas fa-trash"></i>

                                </a>
                                {{-- @endcan --}}
                            </div>

                        </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- Form add Topic --}}

    <div class="modal fade" id="modal_add_pic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

            <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

                <i class="fas fa-times close_topic" aria-hidden="true"></i>

            </div>

            <div class="modal-body">

                <form action="/topic/store" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="form-group">

                        <label for="name" class="label-text">Topic Name</label>

                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

            

                    <div class="form-group ">

                        <label for="message_thread_id" class="label-text">Topic Id</label>

                        <i class="fa fa-random"></i>

                        <input type="text" class="form-control" id="message_thread_id" name="message_thread_id" value="">

                        @error('message_thread_id')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                </div>

                <div class="modal-footer">

                <button type="button" class="btn btn-secondary   close_topic" data-bs-dismiss="modal">Close</button>

                

                <button type="submit" class="btn btn-sila ">Add Topic</button>

                </div>

            </form>

        </div>

        </div>

    </div>

{{-- end --}}



{{-- Form edit Topic --}}



<div class="modal fade" id="modal_edit_topic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

          <i class="fas fa-times close_topic" aria-hidden="true"></i>



        </div>

        <div class="modal-body">

            <form action="/topic/update" method="POST" enctype="multipart/form-data">

                        @csrf

                <div class="form-group">

                    <input hidden type="text" class="form-control" id="edit_id" name="id" value="">

                        <label for="name" class="label-text">Topic Name</label>

                        <input type="text" class="form-control" id="edit_name" name="name" value="">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                  

                    <div class="form-group ">

                        <label for="message_thread_id" class="label-text">Topic Id</label>

                        <i class="fa fa-random"></i>

                        <input type="text" class="form-control" id="edit_topic" name="message_thread_id" value="">

                        @error('message_thread_id')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary  close_topic" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-sila ">Edit Topic</button>

              </div>

            </form>

      </div>

    </div>

</div>

@stop



@push('js')

<script type="text/javascript">

    $("#add_pic").click(function(){

        $('#modal_add_pic').modal('show')

    });

    $(".close_topic").click(function(){

        $('#modal_add_pic').modal('hide')

        $('#modal_edit_topic').modal('hide')

    });

    $(document).ready(function(){

    var table = $('#dataTable').DataTable();

    table.on('click','.edit_topic',function(){

        $tr = $(this).closest('tr');

        if($($tr).hasClass('child')){

            $tr = $tr.prev('.parent') ;

        }

        var data = table.row($tr).data();

        $('#edit_id').val(data[0]);

        $('#edit_name').val(data[2]);

        $('#edit_code').val(data[3]);

        $('#modal_edit_topic').modal('show');

    })

    });

</script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush
