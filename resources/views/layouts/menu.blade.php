<div class="mainnav__categoriy py-3">
  <ul class="mainnav__menu nav flex-column">
    <h6 class="mainnav__caption mt-0 px-3 fw-bold">Navigation</h6>
    @auth

      @if (auth()->user()->can('dashboard.index'))
        <li class="nav-item has-sub">
          <a href="{{ url('dashboard') }}" class=" nav-link collapsed {{ Request::is('dashboard') ? 'active' : '' }}"><i class="demo-pli-home fs-5 me-2"></i>
            <span class="nav-label ms-1">Dashboard</span>
          </a>
        </li>
      @endif

      @if (auth()->user()->can('barang-masuk.index') ||
              auth()->user()->can('fifo.index') ||
              auth()->user()->can('lifo.index'))
        <li class="nav-item has-sub">
          <a href="#" class="mininav-toggle nav-link active-sub {{ Request::is('barang-masuk', 'fifo', 'lifo') ? 'active' : '' }}">
            <i class="fa fa-chart-line fs-5 me-2"></i>
            <span class="nav-label ms-1">Transaksi</span>
          </a>
          <ul class="mininav-content nav collapse">
            @if (auth()->user()->can('barang-masuk.index'))
              <li class="nav-item">
                <a href="{{ url('barang-masuk') }}" class="nav-link {{ Request::is('barang-masuk') ? 'active' : '' }}">Barang Masuk</a>
              </li>
            @endif
            @if (auth()->user()->can('fifo.index'))
              <li class="nav-item">
                <a href="{{ url('fifo') }}" class="nav-link {{ Request::is('fifo') ? 'active' : '' }}">Barang Keluar (FIFO)</a>
              </li>
            @endif
            @if (auth()->user()->can('lifo.index'))
              <li class="nav-item">
                <a href="{{ url('lifo') }}" class="nav-link {{ Request::is('lifo') ? 'active' : '' }}">Barang Keluar (LIFO)</a>
              </li>
            @endif
          </ul>
        </li>
      @endif

      @if (auth()->user()->can('stok.index'))
        <li class="nav-item has-sub">
          <a href="#" class="mininav-toggle nav-link collapsed {{ Request::is('laporan') ? 'active' : '' }}
              "><i class="demo-pli-split-vertical-2 fs-5 me-2"></i>
            <span class="nav-label ms-1">Laporan</span>
          </a>
          <ul class="mininav-content nav collapse">
            @if (auth()->user()->can('stok.index'))
              <li class="nav-item">
                <a href="{{ url('laporan') }}" class="nav-link {{ Request::is('laporan') ? 'active' : '' }}">Stok Barang</a>
              </li>
            @endif
          </ul>
        </li>
      @endif

      @if (auth()->user()->can('master-user.index'))
        <h6 class="mainnav__caption mt-0 px-3 fw-bold pb-2 pt-3">Data Management</h6>
        <li class="nav-item has-sub">
          <a href="#" class="mininav-toggle nav-link active-sub {{ Request::is('data-master-user/*') || Request::is('roles/*') || Request::is('roles') ? 'active' : '' }}">
            <i class="fa fa-gear fs-5 me-2"></i>
            <span class="nav-label ms-1">Data Master User</span>
          </a>
          <ul class="mininav-content nav collapse">
            <li class="nav-item">
              <a href="{{ url('data-master-user/data-user') }}" class="nav-link {{ Request::is('data-master-user/data-user', 'data-master-user/data-user/*') ? 'active' : '' }}">Data User</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('roles') }}" class="nav-link {{ Request::is('roles') || Request::is('roles/*') ? 'active' : '' }}">Data Role</a>
            </li>
          </ul>
        </li>
      @endif

      @if (auth()->user()->can('master-data.index'))
        <li class="nav-item has-sub">
          <a href="#" class="mininav-toggle nav-link active-sub {{ Request::is('data-master/*') ? 'active' : '' }}">
            <i class="fa fa-gear fs-5 me-2"></i>
            <span class="nav-label ms-1">Data Master</span>
          </a>
          <ul class="mininav-content nav collapse">
            @if (auth()->user()->can('master-data.barang'))
              <li class="nav-item">
                <a href="{{ url('data-master/data-barang') }}" class="nav-link {{ Request::is('data-master/data-barang') ? 'active' : '' }}">Data Barang</a>
              </li>
            @endif
            @if (auth()->user()->can('master-data.customers'))
              <li class="nav-item">
                <a href="{{ url('data-master/data-customers') }}" class="nav-link {{ Request::is('data-master/data-customers') ? 'active' : '' }}">Data Customers</a>
              </li>
            @endif
            @if (auth()->user()->can('master-data.suppliers'))
              <li class="nav-item">
                <a href="{{ url('data-master/data-suppliers') }}" class="nav-link {{ Request::is('data-master/data-suppliers') ? 'active' : '' }}">Data Suppliers</a>
              </li>
            @endif
          </ul>
        </li>
      @endif

      <div class="mainnav__profile">

        <div class="d-mn-max mt-5"></div>
        <div class="mininav-content collapse d-mn-max">
          <div class="d-grid px-3 mt-3">
            <form action="{{ url('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-sm btn-primary w-100">Logout</button>
            </form>
          </div>
        </div>
      </div>
    @endauth
  </ul>

</div>
