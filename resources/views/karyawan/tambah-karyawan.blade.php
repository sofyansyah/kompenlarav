
@extends('layouts.app')

<style>

    .control-label{text-align: left!important;}
</style>

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-12">
            <h3>Tambah Data Karyawan</h3>
            <br>
            <form action="{{url('post-karyawan')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nid</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nid" placeholder="Nid" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jabatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
                    </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-4 control-label">Grade</label>
                 <div class="col-sm-8">
                    <input type="text" class="form-control" name="grade" placeholder="Grade" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Nama Karyawan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="jen_jabatan" placeholder="Jenjang Jabatan" required>
                </div>
            </div>
            <input type="hidden" value="{{ 'csrf_token' }}" name="token">
            <input type="submit" name="submit" class="btn btn-success pull-right" value="Simpan">
        </form>
    </div>
</div>
</div>

<!-- <a onclick="tambah()" style="cursor:pointer;text-decoration:underline;">Tambah form</a><br/>
-->
@endsection

@section('javascript')
<!-- <script>
   function tambah(){
            $("#test").append(" <div class='col-md-8 col-md-offset-2'><div class='panel panel-default'><div class='panel-body' style='padding: 4%;'><form action='{{url('karyawan')}}' method='POST' enctype='multipart/form-data'> <div class='form-group'><input type='text' class='form-control' name='nama' placeholder='Nama'> <input type='text' class='form-control' name='nid' placeholder='Nid'> <input type='text' class='form-control' name='jabatan' placeholder='Jabatan'> <input type='text' class='form-control' name='grade' placeholder='Grade'><input type='text' class='form-control' name='jen_jabatan' placeholder='Jenjang Jabatan'></div></form> <a href='#'id='remScnt'>Remove</a></div></div> " ).children(':last');}

        </script> -->
        @endsection