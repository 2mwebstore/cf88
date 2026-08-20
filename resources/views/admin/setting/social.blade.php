@section('Setting-active', 'active')

@section('list_social', 'active')

@section('Setting', 'show')

@extends('layouts.backend.app',[
    'title' => 'List Social',


    // 'pageTitle' => 'List Bot',

])

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        <h6 class="m-0 font-weight-bold text-primary">
            @can('social-create')
            <button id="add_bot" type="submit" class="btn btn-sila" data-bs-toggle="modal" data-bs-target="#meme">

                Add Social

              </button>
              @endcan
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead class="text-write bg-gradient-sila">

                    <tr>

                        <th hidden>id</th>

                        <th>No</th>

                        <th>Name</th>
                        <th>Category</th>
                        <th hidden>Category</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($social as $row)

                        <tr>

                        <th hidden>{{$row->id}}</th>

                        <th scope="row"  width="1%">{{$loop->iteration}}</th>

                        <td>{{$row->name}}</td>
                        <td>
                            @if ($row->category == 0)
                                Telegram
                            @else
                                Facebook
                            @endif
                        </td>
                        <td hidden>{{$row->category}}</td>


                        <td width="80px" style="text-align: center">

                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('social-edit')
                                <a id="edit_bot" class="btn btn-sila btn-sm mr-1 edit_bot"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('social-delete')

                                <a href="/social/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></a>
                                @endcan

                            </div>

                        </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- Form add bot --}}

    <div class="modal fade" id="modal_add_bot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

            <h5 class="modal-title label-text " id="staticBackdropLabel">Information</h5>

            <i class="fas fa-times close_bot" aria-hidden="true"></i>

            </div>

            <div class="modal-body">

                <form action="/social/store" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="form-group">

                        <label for="name" class="label-text">Name</label>

                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="token" class="label-text">Category</label>

                    <select class="form-control" name="category">
                        <option selected disabled>Select Category</option>
                        <option value="0">Telegram</option>
                        <option value="1">Facebook</option>
                    </select>
                    </div>

                

                </div>

                <div class="modal-footer">

                <button type="button" class="btn btn-secondary close_bot" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-sila ">Add Social</button>

                </div>

            </form>

        </div>

        </div>

    </div>

{{-- end --}}



{{-- Form edit bot --}}

<div class="modal fade" id="modal_edit_bot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

          {{-- <button type="button" class="btn-close close_bot" data-bs-dismiss="modal" aria-label="Close"></button> --}}

          <i class="fas fa-times close_bot" aria-hidden="true"></i>

        </div>

        <div class="modal-body">

            <form action="/social/update" method="POST" enctype="multipart/form-data">

                        @csrf

                <div class="form-group">

                    <input hidden type="text" class="form-control" id="edit_id" name="id" value="">

                        <label for="name" class="label-text">Name</label>

                        <input type="text" class="form-control" id="edit_name" name="name" value="">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                </div>

                <div class="form-group">

                    <label for="token" class="label-text">Category</label>

                    <select class="form-control" id="category" name="category">
                        <option value="0">Telegram</option>
                        <option value="1">Facebook</option>
                    </select>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary close_bot" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-sila ">Edit Social</button>

              </div>

            </form>

      </div>

    </div>

</div>

{{-- end --}}



@stop



@push('js')

<script type="text/javascript">
    $("#add_bot").click(function(){
        $('#modal_add_bot').modal('show')
    });
    $(".close_bot").click(function(){
        $('#modal_add_bot').modal('hide')
        $('#modal_edit_bot').modal('hide')
    });
    $(document).ready(function(){
    var table = $('#dataTable').DataTable();
        table.on('click','.edit_bot',function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent') ;
            }
            var data = table.row($tr).data();
            $('#edit_id').val(data[0]);
            $('#edit_name').val(data[2]);
            $('#category').val(data[4]);
            $('#modal_edit_bot').modal('show');
        })
    });
</script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush



