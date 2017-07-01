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
                    <?php $i = 0 ?>
                    <?php $i++ ?>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-left">GENERAL MANAGER</td>
                        <td class="text-center">@if(count($gen_manager) > 0){{$gen_manager->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($man_enjiniring->pcr + $man_operasi->pcr + $man_pemeliharaan->pcr + $man_keuangan->pcr + $man_logistik->pcr + $man_cng->pcr)/6; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-left">MANAJER ENJINIRING & QUALITY ASSURANCE (PjS)</td>
                        <td class="text-center">@if(count($man_enjiniring) > 0){{$man_enjiniring->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_ownerpltgu->pcr + $spv_ownercng->pcr + $spv_technoowner->pcr + $spv_muturisiko->pcr)/4; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER PLTGU</td>
                        <td class="text-center">@if(count($spv_ownerpltgu->pcr.'%') > 0){{$spv_ownerpltgu->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG</td>
                        <td class="text-center">@if(count($spv_ownercng->pcr.'%') > 0){{$spv_ownercng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-left">SUPERVISOR SENIOR TECHNOLOGY OWNER</td>
                        <td class="text-center">@if(count($spv_technoowner->pcr.'%') > 0){{$spv_technoowner->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-left">SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN</td>
                        <td class="text-center">@if(count($spv_muturisiko->pcr.'%') > 0){{$spv_muturisiko->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">7</td>
                        <td class="text-left">MANAGER OPERASI</td>
                        <td class="text-center">@if(count($man_operasi->pcr.'%') > 0){{$man_operasi->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_produksiabcde) > 0)<?php $i = ($spv_rendal12->pcr + $spv_rendal345->pcr + $spv_produksiabcde->pcr)/3; echo round($i).'%'; ?> @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-left">SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_rendal12->pcr.'%') > 0){{$spv_rendal12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5</td>
                        <td class="text-center">@if(count($spv_rendal345->pcr.'%') > 0){{$spv_rendal345->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">10</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI (A,B,C,D,E)</td>
                        <td class="text-center">@if(count($spv_produksiabcde) > 0){{$spv_produksiabcde->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">11</td>
                        <td class="text-left">MANAGER PEMELIHARAAN</td>
                        <td class="text-center">@if(count($man_pemeliharaan->pcr.'%') > 0){{$man_pemeliharaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_outage = $spv_k3) > 0)<?php $i = ($spv_rendalpemeliharaan->pcr + $spv_mesin12->pcr + $spv_listrik12->pcr + $spv_kontrol12->pcr + $spv_outage->pcr + $spv_k3->pcr + $spv_lingkungan->pcr + $spv_sarana->pcr)/8; echo round($i).'%'; ?>@else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                        <tr>
                        <td class="text-center">12</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL PEMELIHARAAN</td>
                        <td class="text-center">@if(count($spv_rendalpemeliharaan->pcr.'%') > 0){{$spv_rendalpemeliharaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">13</td>
                        <td class="text-left">SUPERVISOR SENIOR  PEMELIHARAAN MESIN BLOK 1.2 (Pjs)</td>
                        <td class="text-center">@if(count($spv_mesin12->pcr.'%') > 0){{$spv_mesin12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>


                     <tr>
                        <td class="text-center">14</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_listrik12->pcr.'%') > 0){{$spv_listrik12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">15</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_kontrol12->pcr.'%') > 0){{$spv_kontrol12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">16</td>
                        <td class="text-left">SUPERVISOR SENIOR OUTAGE MANAGEMENT</td>
                        <td class="text-center">@if(count($spv_outagemanaj) > 0){{$spv_outagemanaj->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">17</td>
                        <td class="text-left">SUPERVISOR SENIOR K3</td>
                        <td class="text-center">@if(count($spv_k3->pcr.'%') > 0){{$spv_k3->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">18</td>
                        <td class="text-left">SUPERVISOR SENIOR LINGKUNGAN</td>
                        <td class="text-center">@if(count($spv_lingkungan->pcr.'%') > 0){{$spv_lingkungan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">19</td>
                        <td class="text-left">SUPERVISOR SENIOR SARANA</td>
                        <td class="text-center">@if(count($spv_sarana->pcr.'%') > 0){{$spv_sarana->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">20</td>
                        <td class="text-left">MANAGER KUANGAN & ADMINISTRASI</td>
                        <td class="text-center">@if(count($man_keuangan->pcr.'%') > 0){{$man_keuangan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_sdm->pcr + $spv_umum->pcr + $spv_keuangan->pcr)/3; echo round($i).'%'; ?></td>
                        <td class="text-center"></td>
                    </tr>

                    <tr>
                        <td class="text-center">21</td>
                        <td class="text-left">SUPERVISOR SENIOR SDM (Pjs)</td>
                        <td class="text-center">@if(count($spv_sdm->pcr.'%') > 0){{$spv_sdm->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">22</td>
                        <td class="text-left">SUPERVISOR SENIOR UMUM & CSR</td>
                        <td class="text-center">@if(count($spv_umum->pcr.'%') > 0){{$spv_umum->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">23</td>
                        <td class="text-left">SUPERVISOR SENIOR KEUANGAN</td>
                        <td class="text-center">@if(count($spv_keuangan->pcr.'%') > 0){{$spv_keuangan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>


                    <tr>
                        <td class="text-center">24</td>
                        <td class="text-left">MANAJER LOGISTIK</td>
                        <td class="text-center">@if(count($man_logistik->pcr.'%') > 0){{$man_logistik->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_pengadaan->pcr + $spv_gudang->pcr + $spv_inventori->pcr)/3; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                      <tr>
                        <td class="text-center">25</td>
                        <td class="text-left">SUPERVISOR SENIOR PENGADAAN</td>
                        <td class="text-center">@if(count($spv_pengadaan->pcr.'%') > 0){{$spv_pengadaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">26</td>
                        <td class="text-left">SUPERVISOR SENIOR ADMINISTRASI GUDANG</td>
                        <td class="text-center">@if(count($spv_gudang->pcr.'%') > 0){{$spv_gudang->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">27</td>
                        <td class="text-left">SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER</td>
                        <td class="text-center">@if(count($spv_inventori->pcr.'%') > 0){{$spv_inventori->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">28</td>
                        <td class="text-left">MANAGER CNG & BAHAN BAKAR</td>
                        <td class="text-center">@if(count($man_cng->pcr.'%') > 0){{$man_cng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_cng->pcr + $spv_cngplant->pcr)/2; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                     <tr>
                        <td class="text-center">29</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)</td>
                        <td class="text-center">@if(count($spv_cng->pcr.'%') > 0){{$spv_cng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">30</td>
                        <td class="text-left">SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT</td>
                        <td class="text-center">@if(count($spv_cngplant->pcr.'%') > 0){{$spv_cngplant->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>


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
