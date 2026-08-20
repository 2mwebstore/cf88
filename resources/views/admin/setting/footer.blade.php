@section('Setting-active', 'active')

@section('list_Footer', 'active')

@section('Setting', 'show')

@extends('layouts.backend.app',[

    'title' => 'List Footer',

])

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        <h6 class="m-0 font-weight-bold text-primary">

            <button id="add_footer" type="submit" class="btn btn-sila" data-bs-toggle="modal" data-bs-target="#meme">

                Add Footer

              </button>

        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead  class="text-write bg-gradient-sila">

                    <tr>

                        <th hidden>id</th>

                        <th>No</th>

                        <th>Photo</th>
                        <th>Name</th>

                        <th>Link</th>

                        <th>Action</th>

                    </tr>

                </thead>



                <tbody>

                    @foreach ($Footer as $row)

                        <tr>

                        <th hidden>{{$row->id}}</th>

                        <th scope="row"  width="1%">{{$loop->iteration}}</th>
                        <td>
                            <img src="/upload/{{$row->photo}}" alt="" style="width: 150px; ">
                        </td>
                        <td>{{$row->name}}</td>

                        <td>{{$row->link}}</td>

                        <td width="80px" style="text-align: center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a id="edit_footer" class="btn btn-sila btn-sm mr-1 edit_footer">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/footer/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>

                        {{-- <td hidden>{{$row->photo}}</td> --}}

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- Form add footer --}}

    <div class="modal fade" id="modal_add_footer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

            <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

                <i class="fas fa-times close_footer" aria-hidden="true"></i>

            </div>

            <div class="modal-body">

                <form action="/footer/store" method="POST" enctype="multipart/form-data">

                        @csrf

                    <div class="form-group">

                        <label for="name" class="label-text">Footer Name</label>

                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>
                    <div class="form-group">

                        <label for="link" class="label-text">Footer Link</label>

                        <input type="text" class="form-control" id="link" name="link" value="{{old('link')}}">

                        @error('link')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="photo" class="label-text">Logo</label>
    
                        <input type="file" class="form-control" id="photo" name="photo">
    
                        @error('photo')
    
                            <small class="text-danger">{{ $message }}</small>
    
                        @enderror
    
                    </div>


                </div>

                <div class="modal-footer">

                <button type="button" class="btn btn-secondary   close_footer" data-bs-dismiss="modal">Close</button>

                

                <button type="submit" class="btn btn-sila ">Add footer</button>

                </div>

            </form>

        </div>

        </div>

    </div>

{{-- end --}}



{{-- Form edit footer --}}



<div class="modal fade" id="modal_edit_footer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>

          <i class="fas fa-times close_footer" aria-hidden="true"></i>



        </div>

        <div class="modal-body">

            <form action="/footer/update" method="POST" enctype="multipart/form-data">

                        @csrf

                <div class="form-group">

                    <input hidden type="text" class="form-control" id="edit_id" name="id" value="">

                        <label for="name" class="label-text">Footer Name</label>

                        <input type="text" class="form-control" id="edit_name" name="name" value="">

                        @error('name')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                </div>

                <div class="form-group">

                        <label for="link" class="label-text">Footer Link</label>

                        <input type="text" class="form-control" id="edit_link" name="link" value="">

                        @error('link')

                            <small class="text-danger">{{ $message }}</small>

                        @enderror

                </div>

                <div class="form-group">

                    <label for="photo" class="label-text">Logo</label>

                    <input type="file" class="form-control" id="edit_photo" name="photo">

                    @error('photo')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror
                </div>

        </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary  close_footer" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-sila ">Edit footer</button>

              </div>

            </form>

      </div>

    </div>

</div>

@stop



@push('js')

<script type="text/javascript">

    $("#add_footer").click(function(){

        $('#modal_add_footer').modal('show')

    });

    $(".close_footer").click(function(){

        $('#modal_add_footer').modal('hide')

        $('#modal_edit_footer').modal('hide')

    });

    $(document).ready(function(){

    var table = $('#dataTable').DataTable();

    table.on('click','.edit_footer',function(){

        $tr = $(this).closest('tr');

        if($($tr).hasClass('child')){

            $tr = $tr.prev('.parent') ;

        }

        var data = table.row($tr).data();
        $('#edit_id').val(data[0]);

        $('#edit_name').val(data[2]);

        $('#edit_link').val(data[3]);
        $('#modal_edit_footer').modal('show');

    })

    });

</script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

@endpush



