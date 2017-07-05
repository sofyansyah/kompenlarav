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
                  
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-left">GENERAL MANAGER</td>
                        <td class="text-center">@if(count($gen_manager) > 0){{round($gen_manager->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_general) > 0){{round($spv_general)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-left">MANAJER ENJINIRING & QUALITY ASSURANCE (PjS)</td>
                        <td class="text-center">@if(count($man_enjiniring) > 0){{round($man_enjiniring->pcr)}}% @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_engineer + $engineer2)/2; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER PLTGU</td>
                        <td class="text-center">@if(count($spv_ownerpltgu) > 0){{round($spv_ownerpltgu->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%SYSTEM OWNER PLTGU%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER PLTGU')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SYSTEM OWNER PLTGU%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER PLTGU')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-left">SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG</td>
                        <td class="text-center">@if(count($spv_ownercng) > 0){{round($spv_ownercng->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SYSTEM OWNER COMMON CNG%')->where('jabatan','!=','SUPERVISOR SENIOR SYSTEM OWNER COMMON CNG')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-left">SUPERVISOR SENIOR TECHNOLOGY OWNER</td>
                        <td class="text-center">@if(count($spv_technoowner) > 0){{round($spv_technoowner->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%TECHNOLOGY OWNER%')->where('jabatan','!=','SUPERVISOR SENIOR TECHNOLOGY OWNER')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%TECHNOLOGY OWNER%')->where('jabatan','!=','SUPERVISOR SENIOR TECHNOLOGY OWNER')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-left">SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN</td>
                        <td class="text-center">@if(count($spv_muturisiko) > 0){{round($spv_muturisiko->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%MANAJEMEN MUTU, RISIKO & KEPATUHAN%')->where('jabatan','!=','SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%MANAJEMEN MUTU, RISIKO & KEPATUHAN%')->where('jabatan','!=','SUPERVISOR SENIOR MANAJEMEN MUTU, RISIKO & KEPATUHAN')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">7</td>
                        <td class="text-left">MANAJER OPERASI</td>
                        <td class="text-center">@if(count($man_operasi) > 0){{round($man_operasi->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_operasi) > 0)<?php $i = ($spv_operasi+ $operasi)/2; echo round($i).'%'; ?> @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-left">SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_rendal12) > 0){{round($spv_rendal12->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%OPERASI BLOK 1.2%')->orWhere('jabatan','like','%ANALYST NIAGA%')->where('jabatan','!=','SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OPERASI BLOK 1.2%')->orWhere('jabatan','like','%ANALYST NIAGA%')->where('jabatan','!=','SUPERVISOR SENIOR NIAGA & RENDAL OPERASI BLOK 1.2')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5</td>
                        <td class="text-center">@if(count($spv_rendal345) > 0){{round($spv_rendal345->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%OPERASI BLOK 3.4.5%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OPERASI BLOK 3.4.5%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL OPERASI BLOK 3.4.5')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">10</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A</td>
                        <td class="text-center">@if(count($spv_produk12a) > 0){{round($spv_produk12a->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 A')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">11</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B</td>
                        <td class="text-center">@if(count($spv_produk12b) > 0){{round($spv_produk12b->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 B')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">12</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C</td>
                        <td class="text-center">@if(count($spv_produk12c) > 0){{round($spv_produk12c->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 C')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">13</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D</td>
                        <td class="text-center">@if(count($spv_produk12d) > 0){{round($spv_produk12d->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 D')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">14</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk12e) > 0){{round($spv_produk12e->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 1.2 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 1.2 E')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">15</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A</td>
                        <td class="text-center">@if(count($spv_produk34a) > 0){{round($spv_produk34a->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 A')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">16</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B</td>
                        <td class="text-center">@if(count($spv_produk34b) > 0){{round($spv_produk34b->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3.4 B')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">17</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C</td>
                        <td class="text-center">@if(count($spv_produk34c) > 0){{round($spv_produk34c->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                          {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 C%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 C%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 C')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">18</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D</td>
                        <td class="text-center">@if(count($spv_produk34d) > 0){{round($spv_produk34d->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 D%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3.4 D%')->orWhere('jabatan','like','%PLTGU BLOK 3-4 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 D')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">19</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk34e) > 0){{round($spv_produk34e->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3 & 4 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 3 & 4 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 3 & 4 E')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">20</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A</td>
                        <td class="text-center">@if(count($spv_produk5a) > 0){{round($spv_produk5a->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 A%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 A')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">21</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B</td>
                        <td class="text-center">@if(count($spv_produk5b) > 0){{round($spv_produk5b->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 B%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 B')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">22</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk5c) > 0){{round($spv_produk5c->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 C%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 C')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">23</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D</td>
                        <td class="text-center">@if(count($spv_produk5d) > 0){{round($spv_produk5d->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 D%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 D')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">24</td>
                        <td class="text-left">SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E (Pjs)</td>
                        <td class="text-center">@if(count($spv_produk5e) > 0){{round($spv_produk5e->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PLTGU BLOK 5 E%')->where('jabatan','!=','SUPERVISOR SENIOR PRODUKSI PLTGU BLOK 5 E')->count()))}}%
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">25</td>
                        <td class="text-left">SUPERVISOR SENIOR KIMIA & LABORATORIUM</td>
                        <td class="text-center">@if(count($spv_kimia) > 0){{round($spv_kimia->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                            {{round((\App\Karyawan::where('jabatan','like','%KIMIA & LABORATORIUM%')->where('jabatan','!=','SUPERVISOR SENIOR KIMIA & LABORATORIUM')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%KIMIA & LABORATORIUM%')->where('jabatan','!=','SUPERVISOR SENIOR KIMIA & LABORATORIUM')->count()))}}%
                        </td>
                    </tr>
                    

                     <tr>
                        <td class="text-center">26</td>
                        <td class="text-left">MANAJER PEMELIHARAAN</td>
                        <td class="text-center">@if(count($man_pemeliharaan) > 0){{round($man_pemeliharaan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_pemeliharaan) > 0){{$spv_pemeliharaan}} @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">27</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL PEMELIHARAAN</td>
                        <td class="text-center">@if(count($spv_rendalpemeliharaan) > 0){{round($spv_rendalpemeliharaan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%RENDAL PEMELIHARAAN%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL PEMELIHARAAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%RENDAL PEMELIHARAAN%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL PEMELIHARAAN')->count()))}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">28</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)</td>
                        <td class="text-center">@if(count($spv_mesin12) > 0){{round($spv_mesin12->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN MESIN BLOK 1.2 (Pjs)%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN MESIN BLOK 1.2 (Pjs)')->count()))}}%</td>
                    </tr>


                     <tr>
                        <td class="text-center">29</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_listrik12) > 0){{round($spv_listrik12->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%PEMELIHARAAN LISTRIK BLOK 1.2')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN LISTRIK BLOK 1.2%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN LISTRIK BLOK 1.2')->count()))}}%
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">30</td>
                        <td class="text-left">SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2</td>
                        <td class="text-center">@if(count($spv_kontrol12) > 0){{round($spv_kontrol12->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2%')->where('jabatan','!=','SUPERVISOR SENIOR PEMELIHARAAN KONTROL & INSTRUMEN BLOK 1.2')->count()))}}%
                        </td>
                    </tr>

                     <tr>
                        <td class="text-center">31</td>
                        <td class="text-left">SUPERVISOR SENIOR OUTAGE MANAGEMENT</td>
                        <td class="text-center">@if(count($spv_outagemanaj) > 0){{round($spv_outagemanaj->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%OUTAGE MANAGEMENT')->where('jabatan','!=','SUPERVISOR SENIOR OUTAGE MANAGEMENT')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OUTAGE MANAGEMENT%')->where('jabatan','!=','SUPERVISOR SENIOR OUTAGE MANAGEMENT')->count()))}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">32</td>
                        <td class="text-left">SUPERVISOR SENIOR K3</td>
                        <td class="text-center">@if(count($spv_k3) > 0){{round($spv_k3->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%K3')->where('jabatan','!=','SUPERVISOR SENIOR K3')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%K3%')->where('jabatan','!=','SUPERVISOR SENIOR K3')->count()))}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">33</td>
                        <td class="text-left">SUPERVISOR SENIOR LINGKUNGAN</td>
                        <td class="text-center">@if(count($spv_lingkungan) > 0){{round($spv_lingkungan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%LINGKUNGAN')->where('jabatan','!=','SUPERVISOR SENIOR LINGKUNGAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%LINGKUNGAN%')->where('jabatan','!=','SUPERVISOR SENIOR LINGKUNGAN')->count()))}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">34</td>
                        <td class="text-left">SUPERVISOR SENIOR SARANA</td>
                        <td class="text-center">@if(count($spv_sarana) > 0){{round($spv_sarana->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{round((\App\Karyawan::where('jabatan','like','%SARANA')->where('jabatan','!=','SUPERVISOR SENIOR SARANA')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SARANA%')->where('jabatan','!=','SUPERVISOR SENIOR SARANA')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">35</td>
                        <td class="text-left">MANAJER KUANGAN & ADMINISTRASI</td>
                        <td class="text-center">@if(count($man_keuangan) > 0){{round($man_keuangan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center"><?php $i = ($spv_keuanganadm + $keuangan)/2; echo round($i).'%'; ?></td>
                        <td class="text-center">-</td>
                    </tr>

                    <tr>
                        <td class="text-center">36</td>
                        <td class="text-left">SUPERVISOR SENIOR SDM (Pjs)</td>
                        <td class="text-center">@if(count($spv_sdm) > 0){{round($spv_sdm->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                         {{round((\App\Karyawan::where('jabatan','like','%SDM%')->orWhere('jabatan','like','%PELATIHAN%')->where('jabatan','!=','SUPERVISOR SENIOR SDM (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%SDM%')->orWhere('jabatan','like','%PELATIHAN%')->where('jabatan','!=','SUPERVISOR SENIOR SDM (Pjs)')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">37</td>
                        <td class="text-left">SUPERVISOR SENIOR UMUM & CSR</td>
                        <td class="text-center">@if(count($spv_umum) > 0){{round($spv_umum->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%OFFICER UMUM%')->orWhere('jabatan','like','%OFFICER HUMAS%')->where('jabatan','!=','SUPERVISOR SENIOR UMUM & CSR')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OFFICER UMUM%')->orWhere('jabatan','like','%OFFICER HUMAS%')->where('jabatan','!=','SUPERVISOR SENIOR UMUM & CSR')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">38</td>
                        <td class="text-left">SUPERVISOR SENIOR KEUANGAN</td>
                        <td class="text-center">@if(count($spv_keuangan) > 0){{round($spv_keuangan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{round((\App\Karyawan::where('jabatan','like','%KEUANGAN & ANGGARAN')->where('jabatan','!=','SUPERVISOR SENIOR KEUANGAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%KEUANGAN & ANGGARAN%')->where('jabatan','!=','SUPERVISOR SENIOR KEUANGAN')->count()))}}%</td>
                    </tr>


                    <tr>
                        <td class="text-center">39</td>
                        <td class="text-left">MANAJER LOGISTIK</td>
                        <td class="text-center">@if(count($man_logistik) > 0){{round($man_logistik->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_logistik) > 0){{round($spv_logistik)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                      <tr>
                        <td class="text-center">40</td>
                        <td class="text-left">SUPERVISOR SENIOR PENGADAAN</td>
                        <td class="text-center">@if(count($spv_pengadaan) > 0){{round($spv_pengadaan->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%PENGADAAN')->where('jabatan','!=','SUPERVISOR SENIOR PENGADAAN')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%PENGADAAN%')->where('jabatan','!=','SUPERVISOR SENIOR PENGADAAN')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">41</td>
                        <td class="text-left">SUPERVISOR SENIOR ADMINISTRASI GUDANG</td>
                        <td class="text-center">@if(count($spv_gudang) > 0){{round($spv_gudang->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%ADMINISTRASI GUDANG')->where('jabatan','!=','SUPERVISOR SENIOR ADMINISTRASI GUDANG')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%ADMINISTRASI GUDANG%')->where('jabatan','!=','SUPERVISOR SENIOR ADMINISTRASI GUDANG')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">42</td>
                        <td class="text-left">SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER</td>
                        <td class="text-center">@if(count($spv_inventori) > 0){{round($spv_inventori->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">
                        {{round((\App\Karyawan::where('jabatan','like','%INVENTORI KONTROL & KATALOGER')->where('jabatan','!=','SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%INVENTORI KONTROL & KATALOGER%')->where('jabatan','!=','SUPERVISOR SENIOR INVENTORI KONTROL & KATALOGER')->count()))}}%</td>
                    </tr>

                    <tr>
                        <td class="text-center">43</td>
                        <td class="text-left">MANAJER CNG & BAHAN BAKAR</td>
                        <td class="text-center">@if(count($man_cng) > 0){{round($man_cng->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">@if(count($spv_bahanbakar) > 0){{round($spv_bahanbakar)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                    </tr>

                     <tr>
                        <td class="text-center">44</td>
                        <td class="text-left">SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)</td>
                        <td class="text-center">@if(count($spv_cng) > 0){{round($spv_cng->pcr)}}% @else 0% @endif</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{{round((\App\Karyawan::where('jabatan','like','%OFFICER BAHAN BAKAR%')->orWhere('jabatan','like','%RENDAL CNG%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)')->join('pcr','karyawan.id','=','pcr.karyawan_id')->sum('pcr')) / (\App\Karyawan::where('jabatan','like','%OFFICER BAHAN BAKAR%')->orWhere('jabatan','like','%RENDAL CNG%')->where('jabatan','!=','SUPERVISOR SENIOR RENDAL CNG & BAHAN BAKAR (Pjs)')->count()))}}%</td>
                    </tr>

                     <tr>
                        <td class="text-center">45</td>
                        <td class="text-left">SUPERVISOR SENIOR OPERASI & PEMELIHARAAN CNG PLANT</td>
                        <td class="text-center">@if(count($spv_cngplant) > 0){{round($spv_cngplant->pcr)}}% @else 0% @endif</td>
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
