@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    .dropdown-menu{min-width: 80px!important;}
</style>
@endsection

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3>Data PCR</h3></div>
    <div class="panel-body">
        <div class="table-responsive">
            <div class="pull-right">
                <a href="{{url('ekspor-pcr')}}" class="btn btn-info"><b><i class="fa fa-file-excel-o"></i> Eksport PCR</b></a>
            </div>
            <br><br>
            <table id="kompetensi" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NID</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">PCR</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pcr as $k => $data)
                    <tr>
                        <td class="text-center">{{$k+1}}</td>
                        <td class="text-center">{{$data->nid}}</td>
                        <td class="text-center">{{$data->jabatan}}</td>
                        <td class="text-center">{{$data->nama}}</td>
                        <th class="text-center">{{$data->pcr}}%</th>
                        <td class="text-center">
                            <a href="{{url('edit/pcr/'.$data->id)}}" class="btn btn-primary btn-sm text-center" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('ekspor/pcr/'.$data->id)}}" class="btn btn-warning btn-sm text-center" title="Export"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                    @empty
                    kosong
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

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
