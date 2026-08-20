@section('client-listfight', 'active')
@extends('client.layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="/plugins/daterangepicker.css">
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
        .daterangepicker:before, .daterangepicker:after{
    display: none !important
}
.text-icon{
    position: relative;
    z-index: 1;
}
#daterange_textbox{
    position: absolute;
    z-index: -1;
    opacity: 0;
    margin-left: -103px;
}


.daterangepicker {
  position: absolute;
  color: inherit;
  background-color: #fff;
  border-radius: 4px;
  border: 1px solid #ddd;
  width: 278px;
  max-width: none;
  padding: 0;
  margin-top: 7px;
  top: 100px;
  left: 20px;
  z-index: 3001;
  display: none;
  font-family: arial;
  font-size: 15px;
  line-height: 1em;
}

.daterangepicker:before, .daterangepicker:after {
  position: absolute;
  display: inline-block;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  content: '';
}

.daterangepicker:before {
  top: -7px;
  border-right: 7px solid transparent;
  border-left: 7px solid transparent;
  border-bottom: 7px solid #ccc;
}

.daterangepicker:after {
  top: -6px;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #fff;
  border-left: 6px solid transparent;
}

.daterangepicker.opensleft:before {
  right: 9px;
}

.daterangepicker.opensleft:after {
  right: 10px;
}

.daterangepicker.openscenter:before {
  left: 0;
  right: 0;
  width: 0;
  margin-left: auto;
  margin-right: auto;
}

.daterangepicker.openscenter:after {
  left: 0;
  right: 0;
  width: 0;
  margin-left: auto;
  margin-right: auto;
}

.daterangepicker.opensright:before {
  left: 9px;
}

.daterangepicker.opensright:after {
  left: 10px;
}

.daterangepicker.drop-up {
  margin-top: -7px;
}

.daterangepicker.drop-up:before {
  top: initial;
  bottom: -7px;
  border-bottom: initial;
  border-top: 7px solid #ccc;
}

.daterangepicker.drop-up:after {
  top: initial;
  bottom: -6px;
  border-bottom: initial;
  border-top: 6px solid #fff;
}

.daterangepicker.single .daterangepicker .ranges, .daterangepicker.single .drp-calendar {
  float: none;
}

.daterangepicker.single .drp-selected {
  display: none;
}

.daterangepicker.show-calendar .drp-calendar {
  display: block;
}

.daterangepicker.show-calendar .drp-buttons {
  display: block;
}

.daterangepicker.auto-apply .drp-buttons {
  display: none;
}

.daterangepicker .drp-calendar {
  display: none;
  max-width: 270px;
}

.daterangepicker .drp-calendar.left {
  padding: 8px 0 8px 8px;
}

.daterangepicker .drp-calendar.right {
  padding: 8px;
}

.daterangepicker .drp-calendar.single .calendar-table {
  border: none;
}

.daterangepicker .calendar-table .next span, .daterangepicker .calendar-table .prev span {
  color: #fff;
  border: solid black;
  border-width: 0 2px 2px 0;
  border-radius: 0;
  display: inline-block;
  padding: 3px;
}

.daterangepicker .calendar-table .next span {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.daterangepicker .calendar-table .prev span {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

.daterangepicker .calendar-table th, .daterangepicker .calendar-table td {
  white-space: nowrap;
  text-align: center;
  vertical-align: middle;
  min-width: 32px;
  width: 32px;
  height: 24px;
  line-height: 24px;
  font-size: 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  white-space: nowrap;
  cursor: pointer;
}

.daterangepicker .calendar-table {
  border: 1px solid #fff;
  border-radius: 4px;
  background-color: #fff;
}

.daterangepicker .calendar-table table {
  width: 100%;
  margin: 0;
  border-spacing: 0;
  border-collapse: collapse;
}

.daterangepicker td.available:hover, .daterangepicker th.available:hover {
  background-color: #eee;
  border-color: transparent;
  color: inherit;
}

.daterangepicker td.week, .daterangepicker th.week {
  font-size: 80%;
  color: #ccc;
}

.daterangepicker td.off, .daterangepicker td.off.in-range, .daterangepicker td.off.start-date, .daterangepicker td.off.end-date {
  background-color: #fff;
  border-color: transparent;
  color: #999;
}

.daterangepicker td.in-range {
  background-color: #ebf4f8;
  border-color: transparent;
  color: #000;
  border-radius: 0;
}

.daterangepicker td.start-date {
  border-radius: 4px 0 0 4px;
}

.daterangepicker td.end-date {
  border-radius: 0 4px 4px 0;
}

.daterangepicker td.start-date.end-date {
  border-radius: 4px;
}

.daterangepicker td.active, .daterangepicker td.active:hover {
  background-color: #357ebd;
  border-color: transparent;
  color: #fff;
}

.daterangepicker th.month {
  width: auto;
}

.daterangepicker td.disabled, .daterangepicker option.disabled {
  color: #999;
  cursor: not-allowed;
  text-decoration: line-through;
}

.daterangepicker select.monthselect, .daterangepicker select.yearselect {
  font-size: 12px;
  padding: 1px;
  height: auto;
  margin: 0;
  cursor: default;
}

.daterangepicker select.monthselect {
  margin-right: 2%;
  width: 56%;
}

.daterangepicker select.yearselect {
  width: 40%;
}

.daterangepicker select.hourselect, .daterangepicker select.minuteselect, .daterangepicker select.secondselect, .daterangepicker select.ampmselect {
  width: 50px;
  margin: 0 auto;
  background: #eee;
  border: 1px solid #eee;
  padding: 2px;
  outline: 0;
  font-size: 12px;
}

.daterangepicker .calendar-time {
  text-align: center;
  margin: 4px auto 0 auto;
  line-height: 30px;
  position: relative;
}

.daterangepicker .calendar-time select.disabled {
  color: #ccc;
  cursor: not-allowed;
}

.daterangepicker .drp-buttons {
  clear: both;
  text-align: right;
  padding: 8px;
  border-top: 1px solid #ddd;
  display: none;
  line-height: 12px;
  vertical-align: middle;
}

.daterangepicker .drp-selected {
  display: inline-block;
  font-size: 12px;
  padding-right: 8px;
}

.daterangepicker .drp-buttons .btn {
  margin-left: 8px;
  font-size: 12px;
  font-weight: bold;
  padding: 4px 8px;
}

.daterangepicker.show-ranges.single.rtl .drp-calendar.left {
  border-right: 1px solid #ddd;
}

.daterangepicker.show-ranges.single.ltr .drp-calendar.left {
  border-left: 1px solid #ddd;
}

.daterangepicker.show-ranges.rtl .drp-calendar.right {
  border-right: 1px solid #ddd;
}

.daterangepicker.show-ranges.ltr .drp-calendar.left {
  border-left: 1px solid #ddd;
}

.daterangepicker .ranges {
  float: none;
  text-align: left;
  margin: 0;
}

.daterangepicker.show-calendar .ranges {
  margin-top: 8px;
}

.daterangepicker .ranges ul {
  list-style: none;
  margin: 0 auto;
  padding: 0;
  width: 100%;
}

.daterangepicker .ranges li {
  font-size: 12px !important;
  padding: 8px 12px;
  cursor: pointer;
  color: #000000 ;
}

.daterangepicker .ranges li:hover {
  background-color: #eee;
}

.daterangepicker .ranges li.active {
  background-color: #08c;
  color: white;
}

/*  Larger Screen Styling */
@media (max-width: 564px) {
  .daterangepicker {
      width: auto;
    }

    .daterangepicker .ranges ul {
      width: 140px;
    }

    .daterangepicker.single .ranges ul {
      width: 100%;
    }

    .daterangepicker.single .drp-calendar.left {
      clear: none;
    }

    .daterangepicker.single .ranges, .daterangepicker.single .drp-calendar {
      float: left;
    }

    .daterangepicker {
      direction: ltr;
      text-align: left;
    }

    .daterangepicker .drp-calendar.left {
      clear: left;
      margin-right: 0;
    }

    .daterangepicker .drp-calendar.left .calendar-table {
      border-right: none;
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .daterangepicker .drp-calendar.right {
      margin-left: 0;
    }

    .daterangepicker .drp-calendar.right .calendar-table {
      border-left: none;
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .daterangepicker .drp-calendar.left .calendar-table {
      padding-right: 8px;
    }

    .daterangepicker .ranges, .daterangepicker .drp-calendar {
      float: left;
    }
}
@media (min-width: 564px) {
  .daterangepicker {
    width: auto;
  }

  .daterangepicker .ranges ul {
    width: 140px;
  }

  .daterangepicker.single .ranges ul {
    width: 100%;
  }

  .daterangepicker.single .drp-calendar.left {
    clear: none;
  }

  .daterangepicker.single .ranges, .daterangepicker.single .drp-calendar {
    float: left;
  }

  .daterangepicker {
    direction: ltr;
    text-align: left;
  }

  .daterangepicker .drp-calendar.left {
    clear: left;
    margin-right: 0;
  }

  .daterangepicker .drp-calendar.left .calendar-table {
    border-right: none;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }

  .daterangepicker .drp-calendar.right {
    margin-left: 0;
  }

  .daterangepicker .drp-calendar.right .calendar-table {
    border-left: none;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .daterangepicker .drp-calendar.left .calendar-table {
    padding-right: 8px;
  }

  .daterangepicker .ranges, .daterangepicker .drp-calendar {
    float: left;
  }
}

@media (min-width: 730px) {
  .daterangepicker .ranges {
    width: auto;
  }

  .daterangepicker .ranges {
    float: left;
  }

  .daterangepicker.rtl .ranges {
    float: right;
  }

  .daterangepicker .drp-calendar.left {
    clear: none !important;
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
        /* font-weight: 600; */
        letter-spacing: 0.5px;
        color: #fff;
        margin-bottom: 15px;
        }

        .fight-title {
        padding-left: 10px;
        border-left: 4px solid #7367f0;
        }
        .fight-no {
          padding-left: 10px;
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
            font-size: 1.5rem !important
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

        .score {
        font-size: 1.1rem;
        font-weight: 600;
        }

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
            .rooster-name {
                max-width: 80px;
            }
        }
        @media (max-width: 450px) {
            .fight-header {
            text-align: left;
            font-size: 0.5rem;
            font-weight: normal;
            }
            .rooster-img {
                max-width: 70px;
            }
            .rooster-name {
                max-width: 60px;
            }
          
            .fight-card-ios{
                padding: 10px;
                border-radius: 15px;
            }
            .grid-1.gap-3{
                gap: 0.4rem !important

            }
            .rooster-name , .rooster-color{
                font-size: 0.5rem !important;
                font-weight: normal;
                margin-top: 2px !important;
                margin-bottom: 2px !important;
            }
            .score {
              font-size: 0.5rem;
            }
        }
  </style>

    
    <div class="container mt-75">
        <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
            <div class="d-flex justify-content-between mobile-responsive-column">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-list-alt"> </i> &nbsp; @lang('home.list fight') </div>
                <div class="d-flex justify-content-center align-items-center">
                    @php
                        $today = date('Y-m-d');
                        $yesterday = date('Y-m-d', strtotime('-1 day'));

                        $isToday = ($start_date == $today && $end_date == $today);
                        $isYesterday = ($start_date == $yesterday && $end_date == $yesterday);
                    @endphp
                    <a href="/listfight?start_date={{ $today }}&end_date={{ $today }}" class="text-white mr-1">
                        <div class="btn-line btn text-white {{ $isToday ? 'bg-primary' : 'bg-secondary bg-gradient' }}">
                            Today
                        </div>
                    </a>

                    <!-- Yesterday -->
                    <a href="/listfight?start_date={{ $yesterday }}&end_date={{ $yesterday }}" class="text-white mr-1">
                        <div class="btn-line btn text-white {{ $isYesterday ? 'bg-primary' : 'bg-secondary bg-gradient' }}">
                            Yesterday
                        </div>
                    </a>
                    {{-- <div class="d-flex align-items-center">
                        <a href="#" class="text-white text-icon">
                            <div  id="daterange_icon" class="btn text-white border btn-line">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </a>
                        <input id="daterange_textbox" />
                    </div> --}}


                </div>
            </div>
        </div>
        <div class="d-flex pt-2 pb-2">
            <div class="d-flex " style="max-width: 100%; overflow-x: auto; white-space: nowrap;">
                {{-- <a href="/listfight" data-category-id="all" class="text-white mr-1 btn-category">
                    <div class="btn-line btn text-white btn-danger">
                        <i class="fas fa-sync-alt"></i> Clear
                    </div>
                </a> --}}
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
                            <h5 class="modal-title label-text text-danger" id="createModalLabel">No.{{ $group['no']}} |  MERON - {{ $group['red_score']}}</h5>
                            <i class="fas fa-times" aria-hidden="true" data-bs-dismiss="modal" style="cursor:pointer;"></i>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <img src="{{$group['red_image']}}" alt="{{$group['red_image']}}" class="w-100">
                            </div>
                            <div class="form-group text-center">
                                <label for="title" class="label-text text-white">{{ $group['red_fighter']}}</label>
                                {{-- <label for="title" class="label-text text-danger">MERON</label> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="blueModal{{$group['id']}}" >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-26">
                        <div class="modal-header">
                            <h5 class="modal-title label-text text-primary" id="createModalLabel">No.{{ $group['no']}} | WALA - {{ $group['blue_fighter']}}</h5>
                            <i class="fas fa-times" aria-hidden="true" data-bs-dismiss="modal" style="cursor:pointer;"></i>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <img src="{{$group['blue_image']}}" alt="{{$group['blue_image']}}" class="w-100">
                            </div>
                            <div class="form-group text-center">
                                <label for="title" class="label-text text-white">{{ $group['blue_fighter']}}</label>
                                {{-- <label for="title" class="label-text text-primary">WALA</label> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="fight-card-ios">
                <div class="fight-header">
                      <span class="fight-no">No.{{ $group['no'] ?? '' }}</span> <span class="fight-title">{{ $group['category']->name ?? '' }}</span>
                </div>

                <div class="fight-body row">
                    <div class="col-4 d-flex flex-column justify-content-between align-items-center p-0 cursor-pointer" data-bs-toggle="modal" data-bs-target="#redModal{{$group['id']}}">
                        <img src="/images/left.png" class="rooster-img-small" alt="left">
                        <img src="{{$group['red_image']}}" class="rooster-img" alt="{{ $group['red_fighter']}}">
                        <h5 class="rooster-name mt-2">{{ $group['red_fighter']}}</h5>
                         {{-- &nbsp;  &nbsp;  --}}
                        <!-- <div class="score text-danger">{{ $group['red_score'] }}</div> -->
                    </div>

                    <div class="col-1 vs-box p-0"  style="flex-direction: column;">
                        <h5 class="rooster-color text-danger mt-2">MERON</h5>
                        <div class="rooster-color score text-danger">{{ $group['red_score']}}</div>
                    </div>
                    <div class="col-2 vs-box p-0">
                        <span class="vs-text">
                            <img src="/icon/vs.png" alt="vs" >
                        </span>
                    </div>
                    <div class="col-1 vs-box p-0"  style="flex-direction: column;">
                      <h5 class="rooster-color text-primary mt-2">WALA</h5>
                      <div class="rooster-color score text-primary">{{ $group['blue_score']}}</div>
                    </div>

                    <div class="col-4 d-flex flex-column justify-content-between align-items-center p-0 cursor-pointer" data-bs-toggle="modal" data-bs-target="#blueModal{{$group['id']}}">
                         {{-- &nbsp;  &nbsp;  --}}
                        <img src="/images/right.png" class="rooster-img-small" alt="right">
                        <img src="{{ $group['blue_image']}}" class="rooster-img" alt="{{ $group['blue_fighter']}}">
                        <h5 class="rooster-name mt-2">{{ $group['blue_fighter']}}</h5>
                        <!-- <div class="score text-primary">{{ $group['blue_score'] }}</div> -->
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
            // Trigger picker when clicking icon
            $('#daterange_icon').on('click', function () {
                $('#daterange_textbox').trigger('click');
            });


            $('.btn-category').on('click', function() {
                selected_category_id = $(this).data('category-id');
                start_date = start_date;
                end_date = end_date;
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
