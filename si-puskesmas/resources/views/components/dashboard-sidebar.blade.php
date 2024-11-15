<div class="sidebar">
  <a class="sidebar-header w-full" href="{{route('landing.home')}}">
    <img src="/images/logo_puskesmas.png" class="!w-full mb-4" />
    <h3 class="text-center text-base">Sistem Informasi Puskesmas</h3>
  </a>
  <br>
  <ul class="menu">
    <li>
      <a href="{{route('dashboard')}}"><i class="bi bi-grid"></i></i>Dashboard</a>
    </li>
    <li>
      <a href="{{route('kunjungan.index')}}"><i class="bi bi-file-medical-fill"></i></i>Kunjungan</a>
    </li>
    <li>
      <a href="#datamaster"><i class="bi bi-bag-plus-fill"></i></i>Data Master</a>
      <ul class="submenu">
        @can('admin')
        <li>
          <a href="{{route('dokter.index')}}"><i class="bi bi-bag-plus-fill"></i></i>Data Dokter</a>
        </li>
        <li>
          <a href="{{route('poli.index')}}"><i class="bi bi-hospital"></i></i>Data Poli</a>
        </li>
        <li>
          <a href="{{route('pasien.index')}}"><i class="bi bi-people-fill"></i></i>Data Pasien</a>
        </li>
        <li>
          <a href="{{route('rekam-medis.index')}}"><i class="bi bi-heart-pulse"></i></i>Data Rekam Medis</a>
        </li>
        <li>
          <a href="{{route('obat.index')}}"><i class="bi bi-prescription2"></i></i>Data Obat</a>
        </li>
        <li>
          <a href="{{route('resep.index')}}"><i class="bi bi-prescription"></i></i>Data Resep</a>
        </li>
        <li>
          <a href="{{route('user.index')}}"><i class="bi bi-people-fill"></i></i>Data User</a>
        </li>
        <li>
          <a href="{{route('inbox.index')}}"><i class="bi bi-chat-dots"></i></i>Data Pesan Kontak</a>
        </li>
        @endcan

        @can('dokter')
        <li>
          <a href="{{route('pasien.index')}}"><i class="bi bi-people-fill"></i></i>Data Pasien</a>
        </li>
        <li>
          <a href="{{route('rekam-medis.index')}}"><i class="bi bi-heart-pulse"></i></i>Data Rekam Medis</a>
        </li>
        @endcan

        @can('apoteker')
        <li>
          <a href="{{route('obat.index')}}"><i class="bi bi-prescription2"></i></i>Data Obat</a>
        </li>
        <li>
          <a href="{{route('resep.index')}}"><i class="bi bi-prescription"></i></i>Data Resep</a>
        </li>
        @endcan
      </ul>
    </li>
    <li>
      <a href="{{route('profile.edit')}}"><i class="bi bi-person-fill"></i></i>Profil</a>
    </li>
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a :href="route('logout')" class="hover:cursor-pointer" onclick="event.preventDefault();
                                this.closest('form').submit();">
          {{ __('Log Out') }}
        </a>
      </form>
    </li>
  </ul>
</div>