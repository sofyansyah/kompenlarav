
@extends('layouts.app')

@section('content')
<style type="text/css">
    input{
        margin-bottom: 10px;
    }
    textarea{
        margin-bottom: 10px;
    }

</style>
<div id="test">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading"><h4>Tambah Data Karyawan</h4></div>
            <div class="panel-body" style="padding: 4%;">
                <form action="{{url('karyawan')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required> 
                        <input type="text" class="form-control" name="nid" placeholder="Nid" required>
                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
                        <input type="text" class="form-control" name="grade" placeholder="Grade" required>
                        <input type="text" class="form-control" name="jen_jabatan" placeholder="Jenjang Jabatan" required>
                    </div>
                    <input type="hidden" value="{{ 'csrf_token' }}" name="token">
                    <input type="submit" name="submit" class="btn btn-success pull-right" value="Simpan">
                </form>
            </div>
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