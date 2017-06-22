@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    .dropdown-menu{min-width: 80px!important;}
</style>
@endsection

@section('content')
<style>
        /*div.scroll-menu{
        overflow: auto;
        white-space: nowrap;
    }*/
   /* div.scroll-menu .table td a{
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }*/

</style>

<div class="panel panel-default">
    <div class="panel-heading">Data Kompetensi</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="kompetensi" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nid</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Nama Kompetensi</th>
                        <th class="text-center">Standar</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Gap</th>
                        <th class="text-center">Unit</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    @forelse($kompetensis as $data)
                    <?php $i++ ?>
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td>{{$data->nid}}</td>
                        <td>{{$data->nama}}</td>
                        <td class="text-center">{{$data->jabatan}}</td>
                        <td class="text-center">{{$data->nama_jenis}}</td>
                        <td class="text-center">{{$data->standar}}</td>
                        <td class="text-center">{{$data->nilai}}</td>
                        <td class="text-center">{{$data->gap}}</td>
                        <td class="text-center">{{$data->unit}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('edit/kompetensi/'.$data->id)}}" class="text-center" title="Edit"><i class="fa fa-pencil"></i></a></li>
                                <li><a href="{{url('hapus/kompetensi/'.$data->id)}}" class="text-center" title="Hapus"><i class="fa fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
   <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="file" name="import_file" />
        <button class="btn btn-primary">Import File</button>
    </form>--}}

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
