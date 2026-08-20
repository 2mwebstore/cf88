@section('Setting-active', 'active')

@section('list_telegram', 'active')

@section('Setting', 'show')

@extends('layouts.backend.app',[

    'title' => 'Bot Telegram',

])

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        {{-- <h6 class="m-0 font-weight-bold text-primary">
            <button id="add_category" type="submit" class="btn btn-sila" data-bs-toggle="modal" data-bs-target="#meme">
                Add Telegram
              </button>

        </h6> --}}

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead  class="text-write bg-gradient-sila">

                    <tr>

                        <th hidden>id</th>

                        <th>No</th>

                        <th>Bot Api</th>

                        <th>Group Id</th>

                        <th>Action</th>
                    </tr>

                </thead>



                <tbody>

                    @foreach ($telegram as $row)

                        <tr>

                        <th hidden>{{$row->id}}</th>

                        <th scope="row"  width="1%">{{$loop->iteration}}</th>

                        <td>{{$row->bot_api}}</td>

                        <td>{{$row->group_id}}</td>

                        <td width="80px" style="text-align: center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a id="edit_category" class="btn btn-sila btn-sm mr-1 edit_category">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- <a href="/telegram/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1">
                                    <i class="fas fa-trash"></i>
                                </a> --}}
                            </div>

                        </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- Form add category --}}

    <div class="modal fade" id="modal_add_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

            <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

                <i class="fas fa-times close_category" aria-hidden="true"></i>

            </div>

            <div class="modal-body">

                <form action="/telegram/store" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="form-group">

                        <label for="bot_api" class="label-text">Bot Api</label>

                        <input type="text" class="form-control" id="bot_api" name="bot_api" value="{{old('bot_api')}}">

                        @error('bot_api')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="group_id" class="label-text">Group Id</label>
                        <input type="text" class="form-control" id="group_id" name="group_id" value="{{old('group_id')}}">
                        @error('group_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                <button type="button" class="btn btn-secondary   close_category" data-bs-dismiss="modal">Close</button>

                

                <button type="submit" class="btn btn-sila ">Add Category</button>

                </div>

            </form>

        </div>

        </div>

    </div>

{{-- end --}}



{{-- Form edit category --}}



<div class="modal fade" id="modal_edit_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

          <i class="fas fa-times close_category" aria-hidden="true"></i>



        </div>

        <div class="modal-body">

            <form action="/telegram/update" method="POST" enctype="multipart/form-data">

                        @csrf

                <div class="form-group">
                    <input hidden type="text" class="form-control" id="edit_id" name="id" value="">
                        <label for="bot_api" class="label-text">Bot Api</label>
                        <input type="text" class="form-control" id="edit_bot_api" name="bot_api" value="" >
                        @error('bot_api')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                <div class="form-group">
                        <label for="group_id" class="label-text">Group Id</label>
                        <input type="text" class="form-control" id="edit_group_id" name="group_id" value="" >
                        @error('group_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary  close_category" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-sila ">Edit Category</button>

              </div>

            </form>

      </div>

    </div>

</div>

@stop



@push('js')

<script type="text/javascript">

    $("#add_category").click(function(){

        $('#modal_add_category').modal('show')

    });

    $(".close_category").click(function(){

        $('#modal_add_category').modal('hide')

        $('#modal_edit_category').modal('hide')

    });

    $(document).ready(function(){

    var table = $('#dataTable').DataTable();

    table.on('click','.edit_category',function(){

        $tr = $(this).closest('tr');

        if($($tr).hasClass('child')){

            $tr = $tr.prev('.parent') ;

        }

        var data = table.row($tr).data();

        $('#edit_id').val(data[0]);

        $('#edit_bot_api').val(data[2]);

        $('#edit_group_id').val(data[3]);

        $('#modal_edit_category').modal('show');

    })

    });

</script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush



