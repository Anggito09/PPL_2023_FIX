<header class="flex justify-between mx-4 p-4 rounded-xl bg-secondary">
    <a href="/" class="font-black">Sultan</a>

    <div class="font-medium flex gap-4">
        <a href="/">Tanya Ahli</a>
        <a href="/bantutani">Bantu Tani</a>
        <a href="/">Ruang Diskusi</a>
        <a href="/">Artikel</a>
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
