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
<section id="pcr">
	<table class="table profile">
		<tr>
			<td class="judul">Sebutan Jabatan</th>
				<td class="titik">:</td>
				<td class="detail"></td>
			</tr>
			<tr>
				<td class="judul">Jenjang Jabatan</td>
				<td class="titik">:</td>
				<td class="detail"></td>
			</tr>
			<tr>
				<td class="judul">Nama</td>
				<td class="titik">:</td>
				<td class="detail"></td>
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
					<?php $i = 0 ?>
					<?php $i++ ?>
						<td class="sidejudul">Kompetensi Inti</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Peran</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Bidang</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
				</table>
			</div>
		</div>
	</section>
	<hr/>

	<section id="pcr">
	<table class="table profile">
		<tr>
			<td class="judul">Sebutan Jabatan</th>
				<td class="titik">:</td>
				<td class="detail"></td>
			</tr>
			<tr>
				<td class="judul">Jenjang Jabatan</td>
				<td class="titik">:</td>
				<td class="detail"></td>
			</tr>
			<tr>
				<td class="judul">Nama</td>
				<td class="titik">:</td>
				<td class="detail"></td>
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
					<?php $i = 0 ?>
					<?php $i++ ?>
						<td class="sidejudul">Kompetensi Inti</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Peran</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
					<tr>
						<td class="sidejudul">Kompetensi Bidang</td>
						<td class="number">{{$i}}</td>
						<td class="items"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
						<td class="tg-031e"></td>
					</tr>
				</table>
			</div>
		</div>
	</section>
	<hr/>

		@endsection