@extends('layouts.backend.app')

@section('content')
@include('layouts.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-best">
            <h6 class="m-0 font-weight-bold text-write">
                Profile Information
            </h6>
        </div>
        <div class="card-body">
            <form id="profileForm" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Profile Card -->
                    <div class="card card-profile">
                        <div class="card-body text-center p-0">
                            <div class=" p-4 rounded-top text-center">
                                <img id="profileImage" width="100px"
                                    src="{{$user->photo}}"
                                    alt="Profile" class="profile-img">
                                <h4 class="mt-3 mb-0" id="profileName">{{$user->name}}</h4>
                                <p class="mb-0" id="profileEmail">{{$user->email}}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Simple form to change name/email/image (for demo) -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <form id="profileForm">
                                <div class="form-group">
                                    <label for="nameInput">Name</label>
                                    <input type="text" id="nameInput" name="name" class="form-control" placeholder="Full name"
                                        value="{{$user->name}}" required readonly>
                                </div>
                                {{-- <div class="form-group" hidden>
                                    <label for="emailInput">Gmail</label>
                                    <input type="email" id="emailInput" name="email" class="form-control" placeholder="you@gmail.com"
                                        value="{{$user->email}}" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="imageInput">Image URL</label>
                                    <input type="file" id="imageInput" name="photo" class="form-control" accept="image/*" required>
                                    {{-- <input type="url" id="imageInput" name="photo" class="form-control" placeholder="https://..."
                                        value="{{$user->photo}}" required> --}}
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="button" class="btn btn-secondary" id="resetBtn">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
<script>
$(function(){

$('#imageInput').change(function() {
    let file = this.files[0];
    let $preview = $('#profileImage');

    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $preview.attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    } else {
        $preview.attr('src', "{{ asset('/icon/null.png') }}"); // fallback image
    }
});

});
</script>
@endpush