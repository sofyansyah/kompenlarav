@extends('layouts.app')
<style type="text/css">
	.profile{
		width: 50%!important;
	}
	.judul, .titik, .detail{
		border: none!important;
	}
	.judul{
		width: 10%;
	}
	.titik{
		width: 1%;
	}
	.detail{
		width: 20%;
	}
	.number{
		width: 1%;
	}
	.juduls{
		text-align: center;
	}
	.sidejudul{
		width: 20%;
	}
	.items{
		width: 20%;
	}
	.koloms td{
		border:1px solid #ddd;
	}
</style>
@section('content')

@forelse($pcrs as $data)

	<table class="table profile">
		<tr>
			<td class="judul">Sebutan Jabatan</td>
				<td class="titik">:</td>
				<td class="detail">{{$data->jabatan}}</td>
			</tr>
			<tr>
				<td class="judul">Jenjang Jabatan</td>
				<td class="titik">:</td>
				<td class="detail">{{$data->jen_jabatan}}</td>
			</tr>
			<tr>
				<td class="judul">Nama</td>
				<td class="titik">:</td>
				<td class="detail">{{$data->nama}}</td>
			</tr>

		</table>

		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table koloms">
					<tr>
						<td class="tg-031e" colspan="3" style="border: none"></td>
						<td class="juduls" colspan="2">Leveliness</td>
						<td class="tg-031e" colspan="2"  style="border: none"></td>
					</tr>
					<tr>
						<td class="sidejudul">Jenis Kompetensi</td>
						<td class="juduls" colspan="2">Item Kompetensi</td>
						<td class="juduls">Standar</td>
						<td class="juduls">Sem 1</td>
						<td class="juduls">Readliness</td>
						<td class="juduls">Sem 2</td>
					</tr>
					<tr>
	
						<td class="sidejudul">Kompetensi Inti</td>
						<td class="number"></td>
						<td class="items">{{$data->nama_kompetensi}}</td>
						<td class="tg-031e">{{$data->standar}}</td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Peran</td>
						<td class="number"></td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Bidang</td>
						<td class="number"></td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="tg-031e" colspan="3" style="border: none"></td>
						
						<td class="tg-031e" colspan="2"  style="border: none"></td>
						<td class="juduls" colspan="1">{{--rata2 readliness--}}Pcr</td>
						<td class="tg-031e" colspan="2"  style="border: none"></td>
					</tr>
				</table>
			</div>
		</div>
	<hr/>

	@empty
	no data
	@endforelse

		@endsection