@extends('layouts.app')

@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<style>
	td.buttons{
		padding:2px !important;
	}
	.action li{
		display: inline-block;
	}
	.action{
		padding-left: 0;
		margin-bottom: 0;
	}
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
	div.scroll-menu{
		overflow: auto;
		white-space: nowrap;
	}
	div.scroll-menu .table td a{
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px;
		text-decoration: none;
	}
</style>
<div class="panel panel-default ">
	<div class="panel-heading"><h4>Data Karyawan</h4></div>
	<div class="panel-body scroll-menu">
		<a href="{{url('/tambah-karyawan')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

		<table id="karyawan" class="table table-striped table-bordered " cellspacing="0" width="100%">
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
					<td class="buttons">
						<ul class="action">
							<li><a href="{{url('edit/karyawan/'.$karyawan->id)}}" class="btn btn-warning"  data-toggle="tooltip" title="Edit" style="padding: 6px 12px;"><i class="fa fa-pencil"></i></a></li>
							<li><a href="{{url('hapus/karyawan/'.$karyawan->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a>
							</li>
							<li><a href="{{url('/tambah-kompetensi')}}" class="btn btn-success" data-toggle="tooltip" title="Buat Kompetensi" style="padding: 6px 12px;"><i class="fa fa-plus"></i></a>
							</li>
						</ul>
					</td>
				</tr>
				@empty
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
		<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
			<input type="file" name="import_file" />
			<button class="btn btn-primary">Import File</button>
		</form>

	</div>
</div>

@endsection
@section('javascript')
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});

    $(document).ready(function() {
        $('#karyawan').DataTable();
    } );
</script>



<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection



