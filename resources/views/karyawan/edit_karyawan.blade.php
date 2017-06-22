@extends('layouts.app')

    <style>

        .control-label{text-align: left!important;}
    </style>

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-12">
			<h3>Edit Karyawan</h3>
				<br/>
				@include('include.alert')
				<form action="{{url('editpost/karyawan/' .$karyawan->id) }}" method="POST" class="form-horizontal">
					{{ csrf_field()}}

					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Karyawan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{$karyawan->nama}}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nid</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nid" placeholder="Nid" name="nid" value="{{$karyawan->nid}}" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jabatan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" value="{{$karyawan->jabatan}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Grade</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="grade" placeholder="Grade" name="grade" value="{{$karyawan->grade}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jenjang Jabatan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="jen_jabatan" placeholder="Jenjang Jabatan" name="jen_jabatan" value="{{$karyawan->jen_jabatan}}">
						</div>
					</div>
					<input type="submit" class="btn btn-success pull-right" value="Simpan">
				</form>
			</div>
		</div>
	</div>

	@endsection
