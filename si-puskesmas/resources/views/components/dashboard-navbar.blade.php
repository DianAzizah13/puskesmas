<header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-[2%] py-6 shadow-md">
    <div class="profil-info">
        <!-- <div class="profile-picture">
            <img src="img/person.png" class="photo">
        </div> -->
        <span class="user-level">{{auth()->user()->name}} - {{auth()->user()->role}}</span>
    </div>
</header>