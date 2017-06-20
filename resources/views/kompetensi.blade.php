@extends('layouts.app')
@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Data Kompetensi</div>
	<div class="panel-body">

		<table id="kompetensi" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="tg-031e">No</th>
					<th class="tg-031e">Nid</th>
					<th class="tg-031e">Nama</th>
					<th class="tg-031e">Jabatan</th>
					<th class="tg-031e">Nama Kompetensi</th>
					<th class="tg-031e">Jenis Kompetensi</th>
					<th class="tg-031e">Standar</th>
					<th class="tg-031e">Nilai</th>
					<th class="tg-031e">Gap</th>
					<th class="tg-yw4l">Unit</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0 ?>
				@forelse($kompetensis as $kompetensi)
				<?php $i++ ?>
				<tr>
					<td class="tg-031e">{{$i}}</td>
					<td class="tg-031e">{{$kompetensi->nid}}</td>
					<td class="tg-031e">{{$kompetensi->nama}}</td>
					<td class="tg-031e">{{$kompetensi->jabatan}}</td>
					<td class="tg-031e">{{$kompetensi->nama_kompetensi}}</td>
					<td class="tg-031e">{{$kompetensi->jenis_kompetensi}}</td>
					<td class="tg-031e">{{$kompetensi->standar}}</td>
					<td class="tg-031e">{{$kompetensi->nilai}}</td>
					<td class="tg-031e">{{$kompetensi->gap}}</td>
					<td class="tg-031e">{{$kompetensi->unit}}</td>

				</tr>
				@empty
				@endforelse
			</tbody>
		</table>

	</div>
</div>

@endsection
@section('javascript')
<script>
	$(document).ready(function() {
		$('#kompetensi').DataTable();
	} );
</script>

<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<!-- <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
@endsection
