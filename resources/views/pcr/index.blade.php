@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.css">
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
    <div class="panel-heading"><h3>Data PCR</h3></div>
    <div class="panel-body">
        <div class="table-responsive">
            <div class="pull-left">
               <form action="{{url('ekspor-range')}}" method="POST" class="form-inline">
               {{csrf_field()}}
                  <div class="input-group input-daterange">
                    <input type="text" class="form-control" name="dari">
                    <div class="input-group-addon">to</div>
                    <input type="text" class="form-control" name="sampai">
                </div>
                  <button type="submit" class="btn btn-primary"><b>Eksport PCR</b></button>
                </form>
            </div>
            <br><br><br>
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
                        <td class="text-left">{{$data->jabatan}}</td>
                        <td class="text-left">{{$data->nama}}</td>
                        <th class="text-center">{{$data->pcr}}%</th>
                        <td class="text-center">
                            <a href="{{url('edit/pcr/'.$data->id)}}" class="btn btn-warning  text-center" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('ekspor/pcr/'.$data->id)}}" class="btn btn-primary text-center" title="Export"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                    @empty
                    
                    @endforelse
                </tbody>
            </table>
    
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {

        $('#kompetensi').DataTable();
        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });
    });

</script>
@endsection
