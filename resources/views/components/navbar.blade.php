<header class="flex items-center justify-between mx-4 p-4 rounded-xl bg-secondary">
    <a href="/" class="font-black flex items-center gap-2"><img class="w-5" src="/images/logo.svg" alt="">Sultan</a>

    <div class="font-medium flex gap-4">
        <a href="{{auth()->user()?(auth()->user()->role->role_name === "pakar"?"/riwayatchat":"/ruangchat"):"/ruangchat"}}">Tanya Ahli</a>
        <a href="/bantutani">Bantu Tani</a>
        <a href="/ruangdiskusi">Ruang Diskusi</a>
        <a href="{{auth()->user()?(auth()->user()->role->role_name === "admin"?"/createartikel":"/artikel"):"/artikel"}}">Artikel</a>
        <a href="/me">Profil</a>
    </div>

    <div class="font-medium flex gap-4">
        @guest
            <a href="/login">Login</a>
            <a href="/register/petani">Register</a>
        @endguest
        @auth
            <a href="/logout">Logout</a>
        @endauth
    </div>
</header>
