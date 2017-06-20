@extends('layouts.app')

<style type="text/css">
	.container{
	min-height: 100%;	
	}
</style>

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2 nopadding">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Karyawan</div>
			<div class="panel-body">
				<form action="{{url('/karyawan/' .$karyawan->id) }}" method="POST">

					{{ method_field('PUT')}}
					{{ csrf_field()}}
					
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group">
						<label for="title">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{$karyawan->nama}}" >
					</div>
					<div class="form-group">
						<label for="title">Nid</label>
						<input type="text" class="form-control" id="nid" placeholder="Nid" name="nid" value="{{$karyawan->nid}}" >
					</div>
					<div class="form-group">
						<label for="title">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" value="{{$karyawan->jabatan}}">
					</div>
					<div class="form-group">
						<label for="title">Grade</label>
						<input type="text" class="form-control" id="grade" placeholder="Grade" name="grade" value="{{$karyawan->grade}}">
					</div>
					<div class="form-group">
						<label for="title">Jenjang Jabatan</label>
						<input type="text" class="form-control" id="jen_jabatan" placeholder="Jenjang Jabatan" name="jen_jabatan" value="{{$karyawan->jen_jabatan}}">
					</div>
					<!-- <div class="form-group">
					<button>upload</button> max 5mb
				</div> -->
				<input type="submit" class="btn btn-success pull-right">
			</div>
		</div>
	</div>
</div>

@endsection