@extends('layouts.app')

@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
    div.dataTables_wrapper div.dataTables_paginate{display: none;}
@endsection
@section('content')
<style>

</style>
<div class="panel panel-default ">
	<div class="panel-heading"><h4>Data Karyawan</h4></div>
	<div class="panel-body">
		<a href="{{url('/tambah-karyawan')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>
		<div class="table-responsive">
			<table id="karyawan" class="table table-striped table-bordered " cellspacing="0" width="100%">
				<thead>
					<tr><th class="text-center">No</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Nid</th>
						<th class="text-center">Jabatan</th>
						<th class="text-center">Grade</th>
						<th class="text-center">Jenjang Jabatan</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php $i = 0 ?>
				<tbody>@forelse($karyawans as $karyawan)
					<?php $i++ ?>
					<tr>
						<td>{{ $i}}</td>
						<td class="names">{{$karyawan->nama}}</td>
						<td class="text-center">{{$karyawan->nid}}</td>
						<td>{{$karyawan->jabatan}}</td>
						<td class="text-center">{{$karyawan->grade}}</td>
						<td>{{$karyawan->jen_jabatan}}</td>
						<td class="buttons">
							<ul class="action">
								<li><a href="{{url('edit/karyawan/'.$karyawan->id)}}" class="btn btn-warning"  data-toggle="tooltip" title="Edit" style="padding: 6px 12px;"><i class="fa fa-pencil"></i></a></li>
								<li><a href="{{url('hapus/karyawan/'.$karyawan->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
							</ul>
						</td>
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>
			   @if(!empty($karyawans))
            <div class="pull-right">
                {{$karyawans->render()}}
            </div>
            @endif
		</div>
	</div>
	<div class="panel-footer">
		<form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
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



