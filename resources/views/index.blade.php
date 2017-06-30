@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    .dropdown-menu{min-width: 80px!important;}
    div.dataTables_wrapper div.dataTables_paginate{display: none;}
</style>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Rekap JCR</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="kompetensi" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        <td class="text-center">@if(count($gen_manager) > 0){{$gen_manager->jabatan}}@endif</td>
                        <td class="text-center">@if(count($gen_manager) > 0){{$gen_manager->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($man_enjiniring->pcr + $man_operasi->pcr + $man_pemeliharaan->pcr + $man_keuangan->pcr + $man_logistik->pcr + $man_cng->pcr)/6; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">@if(count($man_enjiniring->jabatan) > 0){{$man_enjiniring->jabatan}}@endif</td>
                        <td class="text-center">@if(count($man_enjiniring) > 0){{$man_enjiniring->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_ownerpltgu->pcr + $spv_ownercng->pcr + $spv_technoowner->pcr + $spv_muturisiko->pcr)/4; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">@if(count($spv_ownerpltgu->jabatan) > 0){{$spv_ownerpltgu->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_ownerpltgu->pcr.'%') > 0){{$spv_ownerpltgu->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">@if(count($spv_ownercng->jabatan) > 0){{$spv_ownercng->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_ownercng->pcr.'%') > 0){{$spv_ownercng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">@if(count($spv_technoowner->jabatan) > 0){{$spv_technoowner->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_technoowner->pcr.'%') > 0){{$spv_technoowner->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">@if(count($spv_muturisiko->jabatan) > 0){{$spv_muturisiko->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_muturisiko->pcr.'%') > 0){{$spv_muturisiko->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                     <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">@if(count($man_operasi->jabatan) > 0){{$man_operasi->jabatan}}@endif</td>
                        <td class="text-center">@if(count($man_operasi->pcr.'%') > 0){{$man_operasi->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_produksiabcde) > 0)<?php $i = ($spv_rendal12->pcr + $spv_rendal345->pcr + $spv_produksiabcde->pcr)/3; echo round($i).'%'; ?> @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">@if(count($spv_rendal12->jabatan) > 0){{$spv_rendal12->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_rendal12->pcr.'%') > 0){{$spv_rendal12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-center">@if(count($spv_rendal12->jabatan) > 0){{$spv_rendal12->jabatan}}@endif</td>
                        <td class="text-center">@if(count($spv_rendal12->pcr.'%') > 0){{$spv_rendal12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">0%</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- <a href="{{url('downloadExcel')}}" class="btn btn-success">Download XLS</a> -->
<br><br>
@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        $('#kompetensi').DataTable();
    } );
    $('.dropdown-toggle').dropdown();
</script>

<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
@endsection
