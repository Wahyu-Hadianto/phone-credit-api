{{-- Header  --}}
    <nav class="navbar fixed-top navbar-light">
      <div class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
      {{-- ============= dropdown admin ================ --}}
          <div class="dropdown">
            <button class="btn btn dropdown-toggle text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
               </a>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </div>          
    </nav>
       {{-- side bar --}}
    <div class="side-bar bg-light">
      <li class="hv-blue {{ request()->is('/') ? 'active' : ''}}"><a href="{{ url('/') }}">Dashboard</a></li>
      {{--  ============ PRODUCT OPSI ==============  --}}
      <li >
        <span class="hv-blue" data-bs-toggle="collapse" data-bs-target="#list-product-opsi" role="button" aria-expanded="false" aria-controls="collapseExample">Produk Opsi<i class="bi bi-chevron-right"></i></span>
          <ul class="collapse" id="list-product-opsi">
            <li>
              <a class="hv-blue {{ request()->is('merek') ? 'active' : ''}}" href="{{ url('/merek') }}">Merek</a>
            </li>
            <li>
              <a class="hv-blue {{ request()->is('storage-ram') ? 'active' : ''}}" href="{{ url("/storage-ram")}}">Storage Ram</a>
            </li>
          </ul>
      </li>
      {{-- ====================== Product ================== --}}
      <li>
        <span class="hv-blue" data-bs-toggle="collapse" data-bs-target="#list-product" role="button" aria-expanded="false" aria-controls="collapseExample">Produk<i class="bi bi-chevron-right"></i></span>
        <ul class="collapse" id="list-product">
          <li >
            <a class="hv-blue {{ request()->is('product') ? 'active' : ''}}" 
              href="{{ url('/product') }}">Tambah Product</a>
          </li>
          <li >
            <a class="hv-blue {{request()->is('product/price') ? 'active' : ''}}"
              href="{{ url('/product/price')}}">Harga Produk</a>
          </li>
          <li>
            <a class="hv-blue {{ request()->is('product/image') ? 'active' : ''}}"
            href="{{ url('/product/image') }}">Image Product</a>
          </li>
        </ul>
      </li>
    </div>
