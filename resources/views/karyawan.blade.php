@extends('layouts.app')

@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<style>
	th, td{
		text-align: center;
	}
	.btn{
		margin: 5px;
		border: none;
	}
	tr .buttons{
		width: 15%;
		text-align: center;
	}
	tr .names{
		width: 20%;
	}
	.btn-info{
		background-color: #60b3ea;
	}
	.btn-danger{
		background-color: #d87676;
	}
	.btn-warning{
		background-color: #ffbc6a;
	}
	.panel-footer{
		background-color: #fff;
		border: none;
	}
</style>
<div class="panel panel-default">
	<div class="panel-heading"><h4>Data Karyawan</h4></div>
	<div class="panel-body">
		<table id="karyawan" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>

				<tr><th>No</th>
					<th>Nama</th>
					<th>Nid</th>
					<th>Jabatan</th>
					<th>Grade</th>
					<th>Jenjang Jabatan</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $i = 0 ?>
			<tbody>@forelse($karyawans as $karyawan)
				<?php $i++ ?>
				<tr>
					<td>{{ $i}}</td>
					<td class="names">{{$karyawan->nama}}</td>
					<td>{{$karyawan->nid}}</td>
					<td>{{$karyawan->jabatan}}</td>
					<td>{{$karyawan->grade}}</td>
					<td>{{$karyawan->jen_jabatan}}</td>
					<td class="buttons"><button class="btn btn-info"><i class="fa fa-pencil"></i></button><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>

				</tr>
				@empty
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
	</div>
</div>

@endsection
@section('javascript')
<script>
	$(document).ready(function() {
		$('#karyawan').DataTable();
	} );
</script>

<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<!-- <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
@endsection



