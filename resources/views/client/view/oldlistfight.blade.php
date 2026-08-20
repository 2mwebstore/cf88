@section('client-listfight', 'active')
@extends('client.layouts.app')
@section('content')
    <style>
        .btn-next-category {
            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));

            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
        }

        .btn-next-category:hover,
        .active-btn-category {
            background: linear-gradient(118deg, #283046, rgb(3 3 5));
            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
            font-weight: 400;
            border-radius: 4px;
        }

        .mr-1 {
            margin-right: 10px;
        }

        .bennertitle {

            padding: 10px;

            background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));

            box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);

            color: white;

            top: 5px;

            border-radius: 10px 10px 0 0;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #7367f0;
        }

        .list-cock td {
            border: 1px solid #7367f0;
            text-align: center;
            padding: 5px;
            background-color: #283046;
        }

        .list-cock td:first-child {
            width: 40px;
            font-weight: bold;
            background-color: #283046;
        }

        .vs-cell {
            width: 60px;
            background-color: #283046;
            font-weight: bold;
        }

        .fighter-cell {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
            flex-direction: column;
        }

        .fighter-cell img {
            width: 200px;
            height: auto;
            margin-bottom: 5px;
        }

        .fighter-info {
            display: inline-block;
            text-align: left;
            line-height: 1.2;
        }

        .red-team {
            color: #dc3545;
            font-weight: bold;
        }

        .blue-team {
            color: #007bff;
            font-weight: bold;
        }

        .name {
            font-size: 14px;
        }

        /* ------------------ Responsive Adjustments ------------------ */
        @media (max-width: 768px) {

            .list-cock td {
                padding: 15px 8px;
            }

            .list-cock td:first-child,
            .vs-cell {
                width: 35px;
                font-size: 12px;
            }

            .fighter-cell img {
                width: 150px;
            }

            .name {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .list-cock td {
                padding: 10px 5px;
            }

            .fighter-cell img {
                width: 100px;
            }


            .name {
                font-size: 11px;
            }

            .list-cock td:first-child,
            .vs-cell {
                width: 30px;
                font-size: 11px;
            }

            .mobile-responsive-column {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 2px;
                flex-direction: column;
            }
        }
    </style>
    <style>
        .daterangepicker .ranges li.active {
            background-color: #7367F0 !important;
            color: #fff;
        }

        @media screen and (max-width: 600px) {
            body {
                font-size: 1.2rem !important;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-size: 1.2rem !important;
            }

            span,
            .form-select,
            .form-control,
            .input-group-text,
            button {
                font-size: 1rem !important;
            }

            table.dataTable>thead>tr>th {
                font-size: 0.9rem !important;
            }

            table tfoot th {
                font-size: 1rem !important;
            }

            table.dataTable>tr,
            .dataTable>td,
            svg,
            a,
            li {
                font-size: 1.1rem !important;
            }

            .navigation li a i,
            .navigation li a svg {
                height: 16px !important;
                width: 16px !important;
            }

            .feather-globe {
                width: 22px !important;
                height: 22px !important;
            }
        }
    </style>
    <style>
        .grid-1 {
            display: grid;
            grid-template-columns: 1fr;
        }
        .bg-26{
            background: rgba(115, 103, 240, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(115, 103, 240, 0.3);
            box-shadow: 0 8px 25px rgba(115, 103, 240, 0.15);
        }

        .fight-card-ios {
        background: rgba(115, 103, 240, 0.1);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(115, 103, 240, 0.3);
        box-shadow: 0 8px 25px rgba(115, 103, 240, 0.15);
        padding: 15px;
        width: 100%;
        transition: all 0.3s ease;
        }

        .fight-card-ios:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 35px rgba(115, 103, 240, 0.25);
        }

        .fight-header {
        text-align: left;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #fff;
        margin-bottom: 15px;
        }

        .fight-title {
        padding-left: 10px;
        border-left: 4px solid #7367f0;
        }

        .fight-body {
        align-items: center;
        }

        .rooster-img {
            display: none;
            max-width: 160px;
            height: auto;
            filter: drop-shadow(0px 8px 12px rgba(0, 0, 0, 0.6));
            transition: transform 0.25s ease;
        }

        .rooster-img:hover {
            transform: scale(1.05);
        }

        .vs-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vs-text {
            font-weight: 700;
            font-size: 2rem;
            color: #7367f0;
            text-shadow: 0 0 15px rgba(115, 103, 240, 0.7);
        }
        .vs-text img{
            width: 100px
        }
        .rooster-color {
            font-weight: 600;
            font-size: 1.25rem !important
        }
        .rooster-name {
            font-weight: 600;
            color: white;
            /* text-shadow: 0 0 6px rgba(255, 255, 255, 0.3); */
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
            vertical-align: middle;
            font-size: 1.25rem !important
        }

        /* .score {
        font-size: 1.1rem;
        font-weight: 500;
        opacity: 0.9;
        } */

        /* .text-blue {
        color: blue !important;
        } */
        .cursor-pointer{
            cursor: pointer;

        }
        .rooster-img-small{
            width: 35px
        }
        @media (max-width: 992px) {
            .rooster-img {
                max-width: 110px;
            }
            .rooster-name , .rooster-color{
                font-size: 0.9rem !important
            }
            .vs-text img{
                width: 60px
            }
            .fight-header{
                margin-bottom: 10px;
            }
        }
        @media (max-width: 768px) {
            .rooster-img {
                max-width: 100px;
            }
            .rooster-name , .rooster-color{
                font-size: 0.8rem !important
            }
            .vs-text img{
                width: 45px
            }
            .fight-header{
                margin-bottom: 5px;
            }
        }

        @media (max-width: 600px) {

            /* .vs-box {
                margin: 20px 0;
            } */

            /* .rooster-img {
                max-width: 120px;
            } */
            .rooster-img {
                max-width: 90px;
            }
            .rooster-name , .rooster-color{
                font-size: 0.8rem !important
            }
            .vs-text img{
                width: 35px
            }
            .fight-card-ios{
                padding: 10px;
            }
        }
        @media (max-width: 450px) {
            .rooster-img {
                max-width: 70px;
            }
          
            .fight-card-ios{
                padding: 10px;
                border-radius: 15px;
            }
            .grid-1.gap-3{
                gap: 0.4rem !important

            }
        }
  </style>
    <link rel="stylesheet" type="text/css" href="/plugins/daterangepicker.css">
    <div class="container mt-75">
        <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
            <div class="d-flex justify-content-between mobile-responsive-column">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-list-alt"> </i> &nbsp; @lang('home.list fight') </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div>Date</div>
                    <input type="text" class="form-control invoice-edit-input date-picker flatpickr-input"
                        id="daterange_textbox" readonly="readonly">
                </div>
            </div>
        </div>
        <div class="d-flex pt-2 pb-2">
            <div class="d-flex " style="max-width: 100%; overflow-x: auto; white-space: nowrap;">
                <a href="/listfight" data-category-id="all" class="text-white mr-1 btn-category">
                    <div class="btn-line btn text-white btn-danger">
                        <i class="fas fa-sync-alt"></i> Clear
                    </div>
                </a>
                @foreach ($ChannelByCategory as $key => $row)
                    <a href="javascript:void(0)" class="text-white mr-1 btn-category"
                        data-category-id="{{ $row->category_id }}">
                        <div class="btn-line btn text-white btn-next-category">
                            <i class="fas fa-tv"></i> {{ $row->category_name }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
          <div class="grid-1 gap-3">
        @foreach ($groupedFights as $group)

          <div class="modal fade" id="redModal{{$group['id']}}" >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-26">
                        <div class="modal-header">
                            <h5 class="modal-title label-text text-white" id="createModalLabel">{{ $group['red_fighter']}}</h5>
                            <i class="fas fa-times" aria-hidden="true" data-bs-dismiss="modal" style="cursor:pointer;"></i>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <img src="{{$group['red_image']}}" alt="{{$group['red_image']}}" class="w-100">
                            </div>
                            <div class="form-group text-center">
                                <label for="title" class="label-text text-white">{{ $group['red_fighter']}}</label>
                                <label for="title" class="label-text text-danger">MERON</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="blueModal{{$group['id']}}" >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-26">
                        <div class="modal-header">
                            <h5 class="modal-title label-text text-white" id="createModalLabel">{{ $group['blue_fighter']}}</h5>
                            <i class="fas fa-times" aria-hidden="true" data-bs-dismiss="modal" style="cursor:pointer;"></i>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <img src="{{$group['blue_image']}}" alt="{{$group['blue_image']}}" class="w-100">
                            </div>
                            <div class="form-group text-center">
                                <label for="title" class="label-text text-white">{{ $group['blue_fighter']}}</label>
                                <label for="title" class="label-text text-primary">WALA</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="fight-card-ios">
                <div class="fight-header">
                    <span class="fight-title">{{ $group['category']->name ?? '' }}</span>
                </div>

                <div class="fight-body row">
                    <div class="col-4 d-flex flex-column justify-content-between align-items-center p-0 cursor-pointer" data-bs-toggle="modal" data-bs-target="#redModal{{$group['id']}}">
                        <img src="/images/left.png" class="rooster-img-small" alt="left">
                        <img src="{{$group['red_image']}}" class="rooster-img" alt="{{ $group['red_fighter']}}">
                        <h5 class="rooster-name mt-2">{{ $group['red_fighter']}}</h5>
                         {{-- &nbsp;  &nbsp;  --}}
                        <!-- <div class="score text-danger">300</div> -->
                    </div>

                    <div class="col-1 vs-box p-0">
                        <h5 class="rooster-color text-danger mt-2">MERON</h5>
                    </div>
                    <div class="col-2 vs-box p-0">
                        <span class="vs-text">
                            <img src="/icon/vs.png" alt="vs" >
                        </span>
                    </div>
                    <div class="col-1 vs-box p-0">
                      <h5 class="rooster-color text-primary mt-2">WALA</h5>
                    </div>

                    <div class="col-4 d-flex flex-column justify-content-between align-items-center p-0 cursor-pointer" data-bs-toggle="modal" data-bs-target="#blueModal{{$group['id']}}">
                         {{-- &nbsp;  &nbsp;  --}}
                        <img src="/images/right.png" class="rooster-img-small" alt="right">
                        <img src="{{ $group['blue_image']}}" class="rooster-img" alt="{{ $group['blue_fighter']}}">
                        <h5 class="rooster-name mt-2">{{ $group['blue_fighter']}}</h5>
                        <!-- <div class="score text-primary">310</div> -->
                    </div>
                </div>
            </div>

            {{-- <table class="mt-3">
                <tbody class="list-cock pt-2">
                    <tr class="pt-2">
                        <th colspan="5">
                            <h5 class="mb-0 px-2 py-2">{{ $group['category'] }}</h5>
                        </th>
                    </tr>
                    @foreach ($group['items'] as $row => $fight)
                        <tr>
                            <td>{{ $row + 1 }}</td>
                            <td class="fighter-cell">
                                <img class="popup-img" src="https://odin678.2m-sy.com/wp-content/uploads/2025/10/left.png"
                                    alt="Red Fighter">
                                <div class="name red-team">{{ $fight['red_fighter'] }}</div>
                                <div class="name red-team">{{ $fight['red_score'] }}</div>
                            </td>
                            <td class="vs-cell">VS</td>
                            <td class="fighter-cell">
                                <img class="popup-img" src="https://odin678.2m-sy.com/wp-content/uploads/2025/10/right.png"
                                    alt="Blue Fighter">
                                <div class="name blue-team">{{ $fight['blue_fighter'] }}</div>
                                <div class="name blue-team">{{ $fight['blue_score'] }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        @endforeach
    </div>


    </div>
    <script src="/plugins/moment.min.js"></script>
    <script src="/plugins/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {

            var selected_category_id = '{{ $category_id }}'; // from controller
            var start_date = '{{ $start_date }}'; // from controller
            var end_date = '{{ $end_date }}'; // from controller

            function buildURL() {
                return '/listfight?start_date=' + start_date + '&end_date=' + end_date + '&category_id=' +
                    selected_category_id;
            }

            $('#daterange_textbox').daterangepicker({
                startDate: start_date,
                endDate: end_date,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'This Week': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                    'Last Week': [moment().subtract(1, 'isoWeek').startOf('isoWeek'), moment().subtract(1,
                        'isoWeek').endOf('isoWeek')],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end) {
                start_date = start.format('YYYY-MM-DD');
                end_date = end.format('YYYY-MM-DD');
                window.location.href = buildURL();
            });

            $('.btn-category').on('click', function() {
                selected_category_id = $(this).data('category-id');
                var picker = $('#daterange_textbox').data('daterangepicker');
                start_date = picker.startDate.format('YYYY-MM-DD');
                end_date = picker.endDate.format('YYYY-MM-DD');
                window.location.href = buildURL();
            });
            $('.btn-category').each(function() {
                if ($(this).data('category-id') == selected_category_id) {
                    $(this).find('.btn-next-category').addClass('active-btn-category');
                }
            });

        });
    </script>

@endsection
