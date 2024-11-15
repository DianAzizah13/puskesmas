<nav class="navbar">
  <img src="/images/logo_puskesmas.png" id="nav-logo" />

  <div class="navbar-nav flex-row">
    <a href="{{route('landing.home')}}">Beranda</a>
    <a href="{{route('landing.profile')}}">Profil</a>
    <a href="{{route('landing.informasi')}}">Informasi</a>
    <a href="/#antrian">Antrian</a>
    <a href="{{route('landing.contact')}}">Kontak</a>
    <a href="{{route('login')}}">Login</a>
  </div>

  <div class="navbar-extra">
    <a href="#" id="menu"><i data-feather="menu"></i></a>
  </div>
</nav>
<script>
  
  document.addEventListener("DOMContentLoaded", function() {
    
    const navbarNav = document.querySelector(".navbar-nav");

    document.querySelector("#menu").onclick = () => {
      navbarNav.classList.toggle("active");
      navbarNav.classList.toggle('flex')
      navbarNav.classList.toggle('flex-col')
    };

    //Menutup humberger menu
    const menu = document.querySelector("#menu");

    document.addEventListener("click", function(e) {
      if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove("active");
      }
    });
  })
</script>