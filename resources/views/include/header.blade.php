
<nav class="navbar navbar-inverse  navbar-fixed-top sidebar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Uji Kompetensi</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{url('/')}}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span></a></li>
        <li><a href="{{url('karyawan')}}">Data Karyawan<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-user"></span></a></li>
        <li><a href="{{url('kompetensi')}}">Kompetensi<span style="font-size:16px; padding: 5px 0px;" class="pull-right hidden-xs showopacity fa fa-list-alt"></span></a></li>
        {{-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kompetensi<span  style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-caret-square-o-down"></span></a>
        <ul class="dropdown-menu">
          
          <li><a href="{{url('tambah-kompetensi')}}">Tambah Kompetensi<span style="font-size:16px; padding: 5px 0px;" class="pull-right hidden-xs showopacity fa fa-list-alt"></span></a></li>
          <li><a href="{{url('add/jenis-kompetensi')}}">Jenis Kompetensi<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-drivers-license-o"></span></a></li>
        </ul>
      </li> --}}
      <li ><a href={{url('pcr')}}>PCR<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-pencil-square-o"></span></a></li>
      <li ><a href="{{url('rekap')}}">Rekap JCR<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-book"></span></a></li>
      <li>
        <a href="{{ url('/logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-sign-out"></span>
      </a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</div>
</div>
</nav>