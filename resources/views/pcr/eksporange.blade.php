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
    .namas .judul, .namas .titik, .namas .detail{
        padding-bottom: 5%;
    }

</style>
@endsection
@section('content')

<div class="panel panel-default" style="overflow: hidden;">
    <div class="panel-body">
        <h3>Eksport PCR</h3>
    </div>
</div>

<div class="panel panel-default pcr_karyawan" style="overflow: hidden;">
    <div class="panel-body">
        <div class="col-md-12">
            @foreach($pcr as $data)

            @php

            $inti   = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','inti')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();        
            $peran  = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','peran')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();
            $bidang = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','bidang')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();

            @endphp

            <table class="table table-bordered pcr_karyawan" id="pcr_karyawan" style="border: none;">
                <tr style="border: none;">
                    <td class="judul">Sebutan Jabatan : </td>
                    <!--  <td class="titik">:</td> -->
                    <td class="detail">{{$data->jabatan}}</td>
                </tr>
                <tr>
                    <td class="judul">Jenjang Jabatan : </td>
                    <!--  <td class="titik">:</td> -->
                    <td class="detail">{{$data->jen_jabatan}}</td>
                </tr>
                <tr class="namas">
                    <td class="judul">Nama : </td>
                    <!-- <td class="titik">:</td> -->
                    <td class="detail">{{$data->nama}}</td>
                </tr>
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
                    <td rowspan="{{count($inti)+1}}" style="padding: 60px 0px;" class="text-center">{{round($inti->sum('readlines')/count($inti))}}%</td>
                    <td class="text-center"></td>
                </tr>

                @foreach($inti as $data_inti)
                <tr>
                    <td class="text-left">{{$data_inti->nama}}</td>
                    <td class="text-center">{{$data_inti->standar}}</td>
                    <td class="text-center" name="sem1[]">@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif</td>
                    <td class="text-center" name="sem2[]">@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif</td>
                </tr>
                @endforeach
                @endif

                @if(count($peran) > 0)
                <tr>
                    <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Peran</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center">{{round($peran->sum('readlines')/count($peran))}}%</td>
                    <td class="text-center"></td>
                </tr>

                @foreach($peran as $data_peran)
                <tr>
                    <td class="text-left">{{$data_peran->nama}}</td>
                    <td class="text-center">{{$data_peran->standar}}</td>
                    <td class="text-center" name="sem1[]">@if(count($data_peran->sem1) > 0) {{$data_peran->sem1}} @endif</td>
                    <td class="text-center" name="sem2[]">@if(count($data_peran->sem2) > 0) {{$data_peran->sem2}} @endif</td>
                </tr>
                @endforeach
                @endif

                @if(count($bidang) > 0)
                <tr>
                    <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Bidang</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center">{{round($bidang->sum('readlines')/count($bidang))}}%</td>
                    <td class="text-center"></td>
                </tr>
                @foreach($bidang as $data_bidang)
                <tr>
                    <td class="text-left">{{$data_bidang->nama}}</td>
                    <td class="text-center">{{$data_bidang->standar}}</td>
                    <td class="text-center" name="sem1[]">@if(count($data_bidang->sem1) > 0) {{$data_bidang->sem1}} @endif</td>
                    <td class="text-center" name="sem2[]">@if(count($data_bidang->sem2) > 0) {{$data_bidang->sem2}} @endif</td>
                </tr>
                @endforeach
                @endif

                <tr>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border-left:1px solid #fff; border-top:1px solid #fff; border-bottom:1px solid #fff;"></td>
                    <td class="text-center">{{$data->pcr}}%</td>
                    <td style="border:1px solid #fff;"></td>
                </tr>
                <tr>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                    <td style="border:1px solid #fff;"></td>
                </tr>
            </table>
            @endforeach


            
        </div>
        
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        @if(!empty($pcr))
        <div class="pull-right">
            {{$pcr->render()}}
        </div>
        @endif
        <br>
        <button id="btnExport" class="btn btn-primary">Eksport</button>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{asset('js/export.js')}}"></script>
@endsection
