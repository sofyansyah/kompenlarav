@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-12">
            <h3>Tambah Jenis Kompetensi</h3>
            <br>
            <form action="{{url('post-jeniskom')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Jenis Kompetensi</label>
                    <div class="col-sm-8">
                        <input class="form-control" name="nama" placeholder="Nama Jenis Kompetensi" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tipe Jenis Kompetensi</label>
                    <div class="col-sm-8">
                        <select name="tipe" class="form-control">
                            <option value="inti">Kompetensi Inti</option>
                            <option value="peran">Kompetensi Peran</option>
                            <option value="bidang">Kompetensi Bidang</option>
                        </select>
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
