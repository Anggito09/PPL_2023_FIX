@extends("layouts.main")
@section("content")
    <main class="h-screen flex items-center justify-center bg-[#EFF6E9]">
        <form action="/register/pakar" method="POST" class="bg-secondary rounded-xl py-8 px-20 flex flex-col items-center gap-4">
            <h1 class="font-bold text-3xl">HALO, TEMAN PAKAR!</h1>
            <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
            @csrf
            <div class="flex gap-4">
                <div class="flex flex-col gap-4">
                    <input class="form-input w-full" type="text" name="name" id="name" placeholder="Nama">
                    <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Nomor handphone">
                    <input class="form-input w-full" type="email" name="email" id="email" placeholder="Email">
                    <input class="form-input w-full" type="password" name="password" id="password"
                           placeholder="Password">
                    <input class="form-input w-full" type="password" name="password_confirmation"
                           id="password_confirmation"
                           placeholder="Konfirmasi Password">
                </div>
                <div class="flex flex-col gap-4">
                    <input class="form-input w-full" type="text" name="gender" id="gender" placeholder="Gender">
                    <input class="form-input w-full" type="text" name="gelar" id="gelar" placeholder="Gelar">
                    <input class="form-input w-full" type="text" name="address" id="address" placeholder="Alamat">
                    <input class="form-input w-full" type="text" name="npwp" id="npwp" placeholder="NPWP">
                </div>
            </div>
            <button class="btn btn-primary w-full">Daftar</button>
            <a href="/login" class="link">Sudah punya akun ?</a>
            <p>atau Daftar sebagai <a href="/register/petani" class="link">Petani</a>, <a href="/register/investor" class="link">Investor</a> ?</p>
        </form>
    </main>
@stop
