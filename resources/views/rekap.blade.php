@extends('layouts.app')


@section('css_styles')
<link href="{{asset('css/getorgchart.css')}}" rel="stylesheet">
@endsection
<style type="text/css">
    html, body {
        margin: 0px;
        padding: 0px;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }


    #people {
        width: 100%;
        height: 100%;
    }
</style>

@section('content')

<div id="people"></div>
@endsection

@section('javascript')
<script src="{{asset('js/getorgchart.js')}}"></script>
<script type="text/javascript">
    var peopleElement = document.getElementById("people");
    var orgChart = new getOrgChart(document.getElementById("people"), {
        primaryFields: ["name", "pcr", "dept_read", "jcr_staff", "name_pcr", "name_pcr", "name_dept", "name_jcr"],
        gridView: true,
        layout: getOrgChart.MIXED_HIERARCHY_RIGHT_LINKS,
        dataSource: [
        { id: 1, parentId: null, name: "GENERAL MANAGER UNIT PEMBANGKITAN MUARA TAWAR", name_pcr: "pcr", pcr: "99%", dept_read: "98%"},
        { id: 2, parentId: 1, name: "MANAJER ENJINIRING & QUALITY ASSURANCE", pcr: "99%", dept_read: "98%"},
        { id: 3, parentId: 1, name: "MANAJER OPERASI", pcr: "99%", dept_read: "98%" },
        { id: 4, parentId: 1, name: "MANAJER PEMELIHARAAN", pcr: "99%", dept_read: "98%" },
        { id: 5, parentId: 1, name: "MANAJER KEUANGAN & ADMINISTRASI", pcr: "99%", dept_read: "98%" },
        { id: 6, parentId: 1, name: "MANAJER LOGISTIK", pcr: "99%", dept_read: "98%" },
        { id: 7, parentId: 1, name: "MANAJER CNG & BAHAN BAKAR", pcr: "99%", dept_read: "98%" },
        { id: 9, parentId: 2, name: "SPV Senior System Common CNG", pcr: "99%", jcr_staff: "98%" },
        { id: 10, parentId: 2, name: "SPV Senior Technology Owner", pcr: "99%", jcr_staff: "98%" },
        { id: 11, parentId: 2, name: "SPV Senior Manajemen Mutu, Risiko & Kepatuhan", pcr: "99%", jcr_staff: "98%" },
        { id: 12, parentId: 3, name: "SPV Senior Rendal Operasi Blok 1-2 & Niaga", pcr: "99%", dept_read: "98%" },
        { id: 13, parentId: 3, name: "SPV Senior Rendal Operasi Blok 3,4,5", pcr: "99%", jcr_staff: "98%" },
        { id: 14, parentId: 3, name: "SPV Senior Produksi (A,B,C,D,E)",pcr: "99%", jcr_staff: "98%" },
        { id: 15, parentId: 4, name: "SPV Senior Rendal Pemeliharaan", pcr: "99%", jcr_staff: "98%" },
        { id: 16, parentId: 4, name: "SPV Senior Pemeliharaan Mesin", pcr: "99%", jcr_staff: "98%" },
        { id: 17, parentId: 4, name: "SPV Senior Pemeliharaan Listrik", pcr: "99%", jcr_staff: "98%" },
        { id: 18, parentId: 4, name: "SPV Senior Pemeliharaan Kontrol & Inst.", pcr: "99%", jcr_staff: "98%" },
        { id: 19, parentId: 4, name: "SPV Senior Outage Management", pcr: "99%", jcr_staff: "98%" },
        { id: 20, parentId: 4, name: "SPV Senior K3", pcr: "99%", jcr_staff: "98%" },
        { id: 21, parentId: 4, name: "SPV Senior Lingkungan", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-3.jpg" },
        { id: 22, parentId: 4, name: "SPV Senior Produksi (A,B,C,D,E", pcr: "99%", jcr_staff: "98%" },
        { id: 23, parentId: 5, name: "SPV Senior SDM", pcr: "99%", jcr_staff: "98%" },
        { id: 24, parentId: 5, name: "SPV Senior Umum & CSR", pcr: "99%", jcr_staff: "98%" },
        { id: 25, parentId: 5, name: "SPV Senior Keuangan", pcr: "99%", jcr_staff: "98%" },
        { id: 25, parentId: 6, name: "SPV Senior Pengadaan", pcr: "99%", jcr_staff: "98%" },
        { id: 26, parentId: 6, name: "SPV Senior Administrasi Gudang", pcr: "99%", jcr_staff: "98%" },
        { id: 27, parentId: 6, name: "SPV Senior Inventory Kontrol & Kataloger", pcr: "99%", jcr_staff: "98%" },
        { id: 28, parentId: 7, name: "SPV Senior Rendal CNG & Bahan Bakar", pcr: "99%", jcr_staff: "98%" },
        { id: 29, parentId: 7, name: "SPV Senior Operasi & Pemeliharaan CNG", pcr: "99%", jcr_staff: "98%" },
        ],
    });
</script>
@endsection