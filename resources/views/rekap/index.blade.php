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
                        <td class="text-center"><?php $i = ($spv_ownerpltgu->pcr + $spv_ownercng->pcr + $spv_technoowner->pcr + $spv_muturisiko->pcr+ $engineer2)/5; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER PLTGU</td>
                        <td class="text-center">@if(count($spv_ownerpltgu->pcr.'%') > 0){{$spv_ownerpltgu->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%SYSTEM OWNER PLTGU%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER PLTGU')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SYSTEM OWNER PLTGU%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER PLTGU')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG</td>
                        <td class="text-center">@if(count($spv_ownercng->pcr.'%') > 0){{$spv_ownercng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-left">SUPERVISOR SENIOR TECHNOLOGY OWNER</td>
                        <td class="text-center">@if(count($spv_technoowner->pcr.'%') > 0){{$spv_technoowner->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%TECHNOLOGY OWNER%')->where('jabatan','!=','SUPERVISOR SENIOR TECHNOLOGY OWNER')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%TECHNOLOGY OWNER%')->where('jabatan','!=','SUPERVISOR SENIOR TECHNOLOGY OWNER')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-left">SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN</td>
                        <td class="text-center">@if(count($spv_muturisiko->pcr.'%') > 0){{$spv_muturisiko->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%MANAJEMEN MUTU, RISIKO & KEPATUHAN%')->where('jabatan','!=','SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%MANAJEMEN MUTU, RISIKO & KEPATUHAN%')->where('jabatan','!=','SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">7</td>
                        <td class="text-left">MANAJER OPERASI</td>
                        <td class="text-center">@if(count($man_operasi->pcr.'%') > 0){{$man_operasi->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_produk12a) > 0)<?php $i = ($spv_rendal12->pcr + $spv_rendal345->pcr + $spv_produk12a->pcr + $spv_produk12b->pcr + $spv_produk12c->pcr + $spv_produk12d->pcr + $spv_produk12e->pcr + $spv_produk34a->pcr + $spv_produk34b->pcr + $spv_produk34c->pcr + $spv_produk34d->pcr + $spv_produk34e->pcr + $spv_kimia->pcr + $operasi)/14; echo round($i).'%'; ?> @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-left">SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_rendal12->pcr.'%') > 0){{$spv_rendal12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%OPERASI BLOK 1.2%')->orWhere('jabatan','like','%ANALYST NIAGA%')->where('jabatan','!=','SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OPERASI BLOK 1.2%')->orWhere('jabatan','like','%ANALYST NIAGA%')->where('jabatan','!=','SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5</td>
                        <td class="text-center">@if(count($spv_rendal345->pcr.'%') > 0){{$spv_rendal345->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%OPERASI BLOK 3.4.5%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OPERASI BLOK 3.4.5%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">10</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A</td>
                        <td class="text-center">@if(count($spv_produk12a) > 0){{$spv_produk12a->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">11</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B</td>
                        <td class="text-center">@if(count($spv_produk12b) > 0){{$spv_produk12b->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">12</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C</td>
                        <td class="text-center">@if(count($spv_produk12c) > 0){{$spv_produk12c->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">13</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D</td>
                        <td class="text-center">@if(count($spv_produk12d) > 0){{$spv_produk12d->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">14</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk12e) > 0){{$spv_produk12e->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">15</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A</td>
                        <td class="text-center">@if(count($spv_produk34a) > 0){{$spv_produk34a->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">16</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B</td>
                        <td class="text-center">@if(count($spv_produk34b) > 0){{$spv_produk34b->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">17</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C</td>
                        <td class="text-center">@if(count($spv_produk34c) > 0){{$spv_produk34c->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                          {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 C%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 C%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">18</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D</td>
                        <td class="text-center">@if(count($spv_produk34d) > 0){{$spv_produk34d->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 D%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 D%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">19</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk34e) > 0){{$spv_produk34e->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3 & 4 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3 & 4 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">20</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A</td>
                        <td class="text-center">@if(count($spv_produk5a) > 0){{$spv_produk5a->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">21</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B</td>
                        <td class="text-center">@if(count($spv_produk5b) > 0){{$spv_produk5b->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">22</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk5c) > 0){{$spv_produk5c->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">23</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D</td>
                        <td class="text-center">@if(count($spv_produk5d) > 0){{$spv_produk5d->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">24</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk5e) > 0){{$spv_produk5e->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E')->count())}}%
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">25</td>
                        <td class="text-left">SUPERVISOR SENIOR KIMIA & LABORATORIUM</td>
                        <td class="text-center">@if(count($spv_kimia) > 0){{$spv_kimia->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{(\App\Karyawan::where('jabatan','like','%KIMIA & LABORATORIUM%')->where('jabatan','!=','SUPERVISOR SENIOR KIMIA & LABORATORIUM')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%KIMIA & LABORATORIUM%')->where('jabatan','!=','SUPERVISOR SENIOR KIMIA & LABORATORIUM')->count())}}%
                        </td>
                    </tr>
                    

                     <tr>
                        <td class="text-center">26</td>
                        <td class="text-left">MANAJER PEMELIHARAAN</td>
                        <td class="text-center">@if(count($man_pemeliharaan->pcr.'%') > 0){{$man_pemeliharaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_outage = $spv_k3) > 0)<?php $i = ($spv_rendalpemeliharaan->pcr + $spv_mesin12->pcr + $spv_listrik12->pcr + $spv_kontrol12->pcr + $spv_outage->pcr + $spv_k3->pcr + $spv_lingkungan->pcr + $spv_sarana->pcr + $pemeliharaan)/9; echo round($i).'%'; ?>@else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">27</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL PEMELIHARAAN</td>
                        <td class="text-center">@if(count($spv_rendalpemeliharaan->pcr.'%') > 0){{$spv_rendalpemeliharaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%RENDAL PEMELIHARAAN%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL PEMELIHARAAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%RENDAL PEMELIHARAAN%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL PEMELIHARAAN')->count())}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">28</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)</td>
                        <td class="text-center">@if(count($spv_mesin12->pcr.'%') > 0){{$spv_mesin12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN MESIN BLOK 1.2 (Pjs)%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->count())}}%</td>
                    </tr>


                     <tr>
                        <td class="text-center">29</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_listrik12->pcr.'%') > 0){{$spv_listrik12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%PEMELIHARAAN LISTRIK BLOK 1.2')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN LISTRIK BLOK 1.2%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2')->count())}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">30</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_kontrol12->pcr.'%') > 0){{$spv_kontrol12->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->count())}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">31</td>
                        <td class="text-left">SUPERVISOR SENIOR OUTAGE MANAGEMENT</td>
                        <td class="text-center">@if(count($spv_outagemanaj) > 0){{$spv_outagemanaj->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%OUTAGE MANAGEMENT')->where('jabatan','!=','SUPERVISOR SENIOR OUTAGE MANAGEMENT')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OUTAGE MANAGEMENT%')->where('jabatan','!=','SUPERVISOR SENIOR OUTAGE MANAGEMENT')->count())}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">32</td>
                        <td class="text-left">SUPERVISOR SENIOR K3</td>
                        <td class="text-center">@if(count($spv_k3->pcr.'%') > 0){{$spv_k3->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%K3')->where('jabatan','!=','SUPERVISOR SENIOR K3')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%K3%')->where('jabatan','!=','SUPERVISOR SENIOR K3')->count())}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">33</td>
                        <td class="text-left">SUPERVISOR SENIOR LINGKUNGAN</td>
                        <td class="text-center">@if(count($spv_lingkungan->pcr.'%') > 0){{$spv_lingkungan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%LINGKUNGAN')->where('jabatan','!=','SUPERVISOR SENIOR LINGKUNGAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%LINGKUNGAN%')->where('jabatan','!=','SUPERVISOR SENIOR LINGKUNGAN')->count())}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">34</td>
                        <td class="text-left">SUPERVISOR SENIOR SARANA</td>
                        <td class="text-center">@if(count($spv_sarana->pcr.'%') > 0){{$spv_sarana->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{(\App\Karyawan::where('jabatan','like','%SARANA')->where('jabatan','!=','SUPERVISOR SENIOR SARANA')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SARANA%')->where('jabatan','!=','SUPERVISOR SENIOR SARANA')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">35</td>
                        <td class="text-left">MANAJER KUANGAN & ADMINISTRASI</td>
                        <td class="text-center">@if(count($man_keuangan->pcr.'%') > 0){{$man_keuangan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_sdm->pcr + $spv_umum->pcr + $spv_keuangan->pcr + $keuangan)/4; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">36</td>
                        <td class="text-left">SUPERVISOR SENIOR SDM (Pjs)</td>
                        <td class="text-center">@if(count($spv_sdm->pcr.'%') > 0){{$spv_sdm->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                         {{(\App\Karyawan::where('jabatan','like','%SDM%')->orWhere('jabatan','like','%PELATIHAN%')->where('jabatan','!=','SUPERVISOR SENIOR SDM (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SDM%')->orWhere('jabatan','like','%PELATIHAN%')->where('jabatan','!=','SUPERVISOR SENIOR SDM (Pjs)')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">37</td>
                        <td class="text-left">SUPERVISOR SENIOR UMUM & CSR</td>
                        <td class="text-center">@if(count($spv_umum->pcr.'%') > 0){{$spv_umum->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%OFFICER UMUM%')->orWhere('jabatan','like','%OFFICER HUMAS%')->where('jabatan','!=','SUPERVISOR SENIOR UMUM & CSR')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OFFICER UMUM%')->orWhere('jabatan','like','%OFFICER HUMAS%')->where('jabatan','!=','SUPERVISOR SENIOR UMUM & CSR')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">38</td>
                        <td class="text-left">SUPERVISOR SENIOR KEUANGAN</td>
                        <td class="text-center">@if(count($spv_keuangan->pcr.'%') > 0){{$spv_keuangan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{(\App\Karyawan::where('jabatan','like','%KEUANGAN & ANGGARAN')->where('jabatan','!=','SUPERVISOR SENIOR KEUANGAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%KEUANGAN & ANGGARAN%')->where('jabatan','!=','SUPERVISOR SENIOR KEUANGAN')->count())}}%</td>
                    </tr>


                    <tr>
                        <td class="text-center">39</td>
                        <td class="text-left">MANAJER LOGISTIK</td>
                        <td class="text-center">@if(count($man_logistik->pcr.'%') > 0){{$man_logistik->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_pengadaan->pcr + $spv_gudang->pcr + $spv_inventori->pcr)/3; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                      <tr>
                        <td class="text-center">40</td>
                        <td class="text-left">SUPERVISOR SENIOR PENGADAAN</td>
                        <td class="text-center">@if(count($spv_pengadaan->pcr.'%') > 0){{$spv_pengadaan->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%PENGADAAN')->where('jabatan','!=','SUPERVISOR SENIOR PENGADAAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PENGADAAN%')->where('jabatan','!=','SUPERVISOR SENIOR PENGADAAN')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">41</td>
                        <td class="text-left">SUPERVISOR SENIOR ADMINISTRASI GUDANG</td>
                        <td class="text-center">@if(count($spv_gudang->pcr.'%') > 0){{$spv_gudang->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%ADMINISTRASI GUDANG')->where('jabatan','!=','SUPERVISOR SENIOR ADMINISTRASI GUDANG')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%ADMINISTRASI GUDANG%')->where('jabatan','!=','SUPERVISOR SENIOR ADMINISTRASI GUDANG')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">42</td>
                        <td class="text-left">SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER</td>
                        <td class="text-center">@if(count($spv_inventori->pcr.'%') > 0){{$spv_inventori->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{(\App\Karyawan::where('jabatan','like','%INVENTORI KONTROL & KATALOGER')->where('jabatan','!=','SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%INVENTORI KONTROL & KATALOGER%')->where('jabatan','!=','SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER')->count())}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">43</td>
                        <td class="text-left">MANAJER CNG & BAHAN BAKAR</td>
                        <td class="text-center">@if(count($man_cng->pcr.'%') > 0){{$man_cng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_cng->pcr + $spv_cngplant->pcr)/2; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                     <tr>
                        <td class="text-center">44</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)</td>
                        <td class="text-center">@if(count($spv_cng->pcr.'%') > 0){{$spv_cng->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{(\App\Karyawan::where('jabatan','like','%OFFICER BAHAN BAKAR%')->orWhere('jabatan','like','%RENDAL CNG%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OFFICER BAHAN BAKAR%')->orWhere('jabatan','like','%RENDAL CNG%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)')->count())}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">45</td>
                        <td class="text-left">SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT</td>
                        <td class="text-center">@if(count($spv_cngplant->pcr.'%') > 0){{$spv_cngplant->pcr.'%'}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{--(\App\Karyawan::where('jabatan','like','%PEMELIHARAAN CNG PLANT')->where('jabatan','!=','SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN CNG PLANT%')->where('jabatan','!=','SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT')->count())--}}0%</td>
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
