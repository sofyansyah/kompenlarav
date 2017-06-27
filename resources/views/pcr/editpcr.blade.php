@extends('layouts.app')
@section('css_styles')
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <style>
        .select2-container .select2-selection--single{
            height: 36px;
            border: 1px solid #ccd0d2;
            box-sizing: border-box;
        }
        .control-label{text-align: left!important;}
        .profile{
            width: 50%!important;
        }
        .judul, .titik, .detail{
            border: none!important;
        }
        .judul{
            width: 10%;
        }
        .titik{
            width: 1%;
        }
        .detail{
            width: 20%;
        }
        .juduls{
            text-align: center;
        }
        .form-group{margin-bottom: 0px!important;}
    </style>
@endsection
@section('content')
<div class="panel panel-default" style="overflow: hidden; margin-bottom: 100px;">
    <div class="panel-body">
        <div class="col-md-12">
            <h3>Edit PCR</h3>
            <br>
            @include('include.alert')
            <div class="table-responsive">
                <table class="table profile">
                    <tr>
                        <td class="judul">Sebutan Jabatan</td>
                            <td class="titik">:</td>
                            <td class="detail">{{$pcr->jabatan}}</td>
                        </tr>
                        <tr>
                            <td class="judul">Jenjang Jabatan</td>
                            <td class="titik">:</td>
                            <td class="detail">{{$pcr->jen_jabatan}}</td>
                        </tr>
                        <tr>
                            <td class="judul">Nama</td>
                            <td class="titik">:</td>
                            <td class="detail">{{$pcr->nama}}</td>
                        </tr>
                </table>
            </div>

            <div class="table-responsive">
                <form action="{{url('editpost/pcr/'.$pcr->id)}}" method="POST">
                {{csrf_field()}}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th style="border-top:1px solid #fff; border-left:1px solid #fff; border-right:1px solid #fff; "></th>
                            <th style="border-top:1px solid #fff; border-left:1px solid #fff; "></th>
                            <th colspan="2" class="text-center">Leveliness</th>
                            <th style="border-top:1px solid #fff; border-left:1px solid #fff; border-right:1px solid #fff; "></th>
                            <th style="border-top:1px solid #fff; border-left:1px solid #fff; border-right:1px solid #fff; "></th>
                        </tr>
                        <tr>
                            <th class="text-center">Jenis Kompetensi</th>
                            <th class="text-center">Item Kompetensi</th>
                            <th class="text-center">Standar</th>
                            <th class="text-center">Sem 1</th>
                            <th class="text-center">Readliness</th>
                            <th class="text-center">Sem 2</th>
                        </tr>

                        
                        @if(count($inti) > 0)
                        <tr class="bor">
                            <td rowspan="{{count($inti)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Inti</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan="{{count($inti)+1}}" style="padding: 60px 0px;" class="text-center">{{$inti->sum('readlines')/count($inti)}}%</td>
                            <td></td>
                        </tr>

                        @foreach($inti as $data_inti)
                            <tr>
                                <td>{{$data_inti->nama}}</td>
                                <td class="text-center">{{$data_inti->standar}}</td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem1[]" required value="@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem2[]" required value="@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif">
                                    </div>
                                </td>
                            </tr>
                            <input type="hidden" name="idinti[]" value="{{$data_inti->id}}">
                        @endforeach
                        @endif

                        @if(count($peran) > 0)
                        <tr>
                            <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Peran</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center">{{$peran->sum('readlines')/count($peran)}}%</td>
                            <td></td>
                        </tr>
                        @foreach($peran as $data_peran)
                            <tr>
                                <td>{{$data_peran->nama}}</td>
                                <td class="text-center">{{$data_peran->standar}}</td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem1[]" required value="@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem2[]" required value="@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif">
                                    </div>
                                </td>
                            </tr>
                            <input type="hidden" name="idperan[]" value="{{$data_peran->id}}">
                        @endforeach
                        @endif
                        
                        @if(count($bidang) > 0)
                         <tr>
                            <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Bidang</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center">{{$bidang->sum('readlines')/count($bidang)}}%</td>
                            <td></td>
                        </tr>
                        @foreach($bidang as $data_bidang)
                            <tr>
                                <td>{{$data_bidang->nama}}</td>
                                <td class="text-center">{{$data_bidang->standar}}</td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem1[]" required value="@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sem2[]" required value="@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif">
                                    </div>
                                </td>
                            </tr>
                            <input type="hidden" name="idbidang[]" value="{{$data_bidang->id}}">
                        @endforeach
                        @endif

                        <tr>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border-left:1px solid #fff; border-top:1px solid #fff; border-bottom:1px solid #fff;"></td>
                            <td class="text-center">{{$pcr->pcr}}%</td>
                            <td style="border:1px solid #fff;"></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td style="border:1px solid #fff;"></td>
                            <td class="text-right" style="border:1px solid #fff;"><button class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
@endsection
