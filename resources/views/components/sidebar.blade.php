<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">PEMBAYARAN SPP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SPP</a>
    </div>
    <ul class="sidebar-menu">
      @if (auth()->user()->role_id == ADMIN || auth()->user()->role_id == PETUGAS)
      <li class="menu-header">Dashboard</li>
      <li class="dropdown">
        <a href="{{ url('admin/dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      @endif
      
      @if(auth()->user()->role_id == ADMIN)
      <li class="menu-header">Master</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-align-justify"></i> <span>Data Master</span></a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="{{ route('user.index') }}">Data User</a></li> --}}
          <li><a class="nav-link" href="{{ route('petugas.index') }}">Data Petugas</a></li>
          <li><a class="nav-link" href="{{ route('murid.index') }}">Data Murid</a></li>
          <li><a class="nav-link" href="{{ route('role.index') }}">Data Role</a></li>
          <li><a class="nav-link" href="{{ route('spp.index') }}">Data Spp</a></li>
          <li><a class="nav-link" href="{{ route('kompetensi.index') }}">Data Kompetensi</a></li>
          <li><a class="nav-link" href="{{ route('kelas.index') }}">Data Kelas</a></li>
        </ul>
      </li>
      @endif

      @if (auth()->user()->role_id == ADMIN || auth()->user()->role_id == PETUGAS )
      <li class="menu-header">Pembayaran</li>
      <li>
        <a href="{{ route('pembayaran.index') }}" class="nav-link"><i class="fas fa-credit-card"></i><span>Pembayaran</span></a>
      </li>
      @endif
      @if (auth()->user()->role_id == MURID )
      <li class="menu-header">Pembayaran</li>
      <li class="active">
        <a href="{{ route('history') }}" class="nav-link"><i class="fas fa-history"></i><span>Histpry Pembayaran</span></a>
      </li>
      @endif
      {{-- <li class="menu-header">setting</li> --}}
      {{-- <li>
        <a href="{{ route('pembayaran.index') }}" class="nav-link"><i class="fas fa-cog"></i><span>Setting</span></a>
      </li> --}}
    </ul>
{{--     <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div> --}}
  </aside>
</div>