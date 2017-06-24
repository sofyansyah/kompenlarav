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

<div class="panel panel-default" style="overflow: hidden; margin-bottom: 100px;">
    <div class="panel-body">
        <div class="col-md-12">
        @foreach($pcr as $data)

        @php

        $inti   = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','inti')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();        
        $peran  = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','peran')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();
        $bidang = \App\Kompetensi::where('karyawan_id',$data->karyawan_id)->join('jenis_kompetensi','kompetensi.jenis_kompetensi','=','jenis_kompetensi.id')->where('jenis_kompetensi.type','bidang')->select('jenis_kompetensi.nama','kompetensi.standar','kompetensi.nilai','kompetensi.gap','kompetensi.unit','kompetensi.sem1','kompetensi.sem2','kompetensi.readlines','kompetensi.id')->get();

        @endphp

            <table class="table table-bordered " id="pcr_karyawan" style="border: none;">
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

                

                <tr class="bor">
                    <td rowspan="{{count($inti)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Inti</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="{{count($inti)+1}}" style="padding: 60px 0px;" class="text-center">{{$inti->sum('readlines')/count($inti)}}%</td>
                    <td class="text-center"></td>
                </tr>

                @foreach($inti as $data_inti)
                    <tr>
                        <td class="text-left">{{$data_inti->nama}}</td>
                        <td class="text-center">{{$data_inti->standar}}</td>
                        <td class="text-center" name="sem1[]">@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif</td>
                        <td class="text-center" name="sem2[]">@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif</td>
                    </tr>
                    <input type="hidden" name="idinti[]" value="{{$data_inti->id}}">
                @endforeach

                <tr>
                    <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Peran</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="{{count($peran)+1}}" style="padding: 60px 0px;" class="text-center">{{$peran->sum('readlines')/count($peran)}}%</td>
                    <td class="text-center"></td>
                </tr>
                @foreach($peran as $data_peran)
                    <tr>
                        <td class="text-left">{{$data_peran->nama}}</td>
                        <td class="text-center">{{$data_peran->standar}}</td>
                        <td class="text-center" name="sem1[]">@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif</td>
                        <td class="text-center" name="sem2[]">@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif</td>
                    </tr>
                    <input type="hidden" name="idperan[]" value="{{$data_peran->id}}">
                @endforeach

                 <tr>
                    <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center"><b>Kompetensi Bidang</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td rowspan="{{count($bidang)+1}}" style="padding: 60px 0px;" class="text-center">{{$bidang->sum('readlines')/count($bidang)}}%</td>
                    <td class="text-center"></td>
                </tr>
                @foreach($bidang as $data_bidang)
                    <tr>
                        <td class="text-left">{{$data_bidang->nama}}</td>
                        <td class="text-center">{{$data_bidang->standar}}</td>
                        <td class="text-center" name="sem1[]">@if(count($data_inti->sem1) > 0) {{$data_inti->sem1}} @endif</td>
                        <td class="text-center" name="sem2[]">@if(count($data_inti->sem2) > 0) {{$data_inti->sem2}} @endif</td>
                    </tr>
                    <input type="hidden" name="idbidang[]" value="{{$data_bidang->id}}">
                @endforeach

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
        <button id="btnExport" class="btn btn-primary" style="float: right;">Eksport</button>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        $('#pcr_karyawan').DataTable();
    } );
    $(function () 
    {
        var table = $('#pcr_karyawan').dataTable();
        var table_html = $('#pcr_karyawan')[0].outerHTML;
        var css_html = '<style>.export, .text-center, .text-left {border: 1pt solid #333} </style>';
        $("#btnExport").click(function(e) 
        {
            e.preventDefault();
            window.open('data:application/vnd.ms-excel,' + 
                encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>'));
        });
    });

</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

@endsection
