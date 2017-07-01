@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    div.dataTables_wrapper div.dataTables_paginate{cursor: pointer;}
    .paginate_button{
        padding: 0 5px;
    }
    .dt-button{
        padding: 5px 15px;
        border-radius: 5px;
        float: left;
        background: #3097D1;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h3>Rekap JCR</h3></div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="table-rekap" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">PCR</th>
                        <th class="text-center">Dept Read</th>
                        <th class="text-center">JCR</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jabatan as $a => $data_jab)
                    <tr>
                        <td class="text-center">{{$a+1}}</td>
                        <td class="text-left">{{$data_jab->jabatan}}</td>
                        <td class="text-center">{{$data_jab->pcr}}</td>
                        @if($data_jab->jabatan == 'GENERAL MANAGER')
                            <td class="text-center">{{number_format($rata_general,2)}}</td>
                        @else
                            <td class="text-center">0</td>
                        @endif
                        <td class="text-center">-</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           <!--  <button id="btnEkspor" class="btn btn-primary" style="float: right;">Export</button> -->
        </div>
    </div>

</div>

<br><br>
@endsection
@section('javascript')
<script>

$(document).ready(function() { $('#table-rekap').DataTable( { dom: 'Bfrtip', buttons: [ { extend: 'excelHtml5', customize: function ( xlsx ){ var sheet = xlsx.xl.worksheets['sheet1.xml']; $('row c[r*=""]', sheet).attr( 's', '25' ); } } ] } ); } );

</script>
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
@endsection
