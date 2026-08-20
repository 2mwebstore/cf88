@extends('layouts.backend.app',[
    'title' => 'Add Fight',
])

@section('fight', 'active')
@section('add-fight-light', 'active')
@section('fight-show', 'show')

@push('js')
<link rel="stylesheet" href="/bootstrap/css/bootstrap-datetimepicker.css" />
<script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>
<script src="/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone.min.js"></script>

<script type="text/javascript">
    // Set default timezone to Phnom Penh
    const nowInPhnomPenh = moment().tz("Asia/Phnom_Penh").toDate();
    $("#date").datetimepicker({
        format: 'dd-mm-yyyy HH:ii:ss P',
        fontAwesome: true,
        language: 'sma',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0
    }).datetimepicker('update', nowInPhnomPenh);
</script>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-write">Add New Fight</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('fights.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row col-md-12">

                <!-- Date -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date" class="label-text">Date <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datetime" id="date" name="date" required>
                    </div>
                </div>

                <!-- Category -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id" class="label-text">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Red Fighter -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="red_fighter" class="label-text">Red Fighter <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="red_fighter" name="red_fighter" required>
                    </div>
                </div>

                <!-- Blue Fighter -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blue_fighter" class="label-text">Blue Fighter <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="blue_fighter" name="blue_fighter" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="red_image" class="label-text">Red Fighter Image Link</label>
                        <input type="text" class="form-control" id="red_image" name="red_image" required>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blue_image" class="label-text">Blue Fighter Image Link</label>
                        <input type="text" class="form-control" id="blue_image" name="blue_image" required>
                    </div>
                </div>
          
          
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="red_score" class="label-text">Red Score</label>
                        <input type="number" class="form-control" id="red_score" name="red_score" required value="0">
                    </div>
                </div>
                
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="blue_score" class="label-text">Blue Score</label>
                        <input type="number" class="form-control" id="blue_score" name="blue_score" required value="0">
                    </div>
                </div>

               <div class="col-md-6">
                    <div class="form-group">
                        <label for="no" class="label-text">No  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="no" name="no" required>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sila btn-sm">Add Fight</button>
                    <a href="{{ route('fights') }}" class="btn btn-secondary btn-sm">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>
@stop
