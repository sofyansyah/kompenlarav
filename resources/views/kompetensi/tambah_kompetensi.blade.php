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
    </style>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-12">
            <h3>Tambah Kompetensi</h3>
            <br>
            <form action="{{url('post-kompetensi')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pilih Karyawan</label>
                    <div class="col-sm-8">
                        <select name="karyawan" class="form-control select2">
                            @foreach($user as $data)
                                <option value="{{$data->id}}">{{$data->nama}} - {{$data->nid}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jenis Kompetensi</label>
                    <div class="col-sm-8">
                        <select name="jenis" class="form-control select2">
                            @foreach($jenis as $data_jenis)
                                <option value="{{$data_jenis->id}}">{{$data_jenis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Unit</label>
                    <div class="col-sm-8">
                        <input type="text" name="unit" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Standar</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" name="standar" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nilai</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" name="nilai" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">GAP</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" name="gap" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
@endsection
