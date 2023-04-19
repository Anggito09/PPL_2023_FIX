<header
    class="flex items-center justify-between text-primary px-6 py-2 bg-white rounded-xl mx-10 mt-5 drop-shadow-body font-medium">
    <a href="/" class="flex items-center gap-2">
        <img src="images/logo.svg" alt="" class="w-7"/>
        <h1 class="font-black text-xl">SULTAN</h1>
    </a>
    <div class="flex gap-5">
        <a href="#">Tanya Ahli</a>
        <a href="/bantutani">Bantu Tani</a>
        <a href="#">Ruang Diskusi</a>
        <a href="#">Artikel</a>
    </div>
    <div class="flex gap-5">
        @if($auth == "")
            <a href="/login">Masuk</a>
            <a href="/register">Daftar</a>
        @else
            <a href="/logout">Keluar</a>
        @endif
    </div>
</header>
