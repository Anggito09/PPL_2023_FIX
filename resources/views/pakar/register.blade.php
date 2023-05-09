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
                    <p class="text-red-400 text-sm">{{$errors->has("name") ? "*".$errors->first("name") : ""}}</p>
                    <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Nomor handphone">
                    <p class="text-red-400 text-sm">{{$errors->has("phone") ? "*".$errors->first("phone") : ""}}</p>
                    <input class="form-input w-full" type="email" name="email" id="email" placeholder="Email">
                    <p class="text-red-400 text-sm">{{$errors->has("email") ? "*".$errors->first("email") : ""}}</p>
                    <input class="form-input w-full" type="text" name="npwp" id="npwp" placeholder="NPWP">
                    <p class="text-red-400 text-sm">{{$errors->has("npwp") ? "*".$errors->first("npwp") : ""}}</p>
                    <input class="form-input w-full" type="password" name="password" id="password"
                           placeholder="Password">
                    <p class="text-red-400 text-sm">{{$errors->has("password") ? "*".$errors->first("password") : ""}}</p>
                    <input class="form-input w-full" type="password" name="password_confirmation"
                           id="password_confirmation"
                           placeholder="Konfirmasi Password">
                    <p class="text-red-400 text-sm">{{$errors->has("password_confirmation") ? "*".$errors->first("password_confirmation") : ""}}</p>
                </div>
                <div class="flex flex-col gap-4">
                    <select class="form-input w-full" name="gender" id="gender" >
                        <option value selected disabled>Gender</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <p class="text-red-400 text-sm">{{$errors->has("gender") ? "*".$errors->first("gender") : ""}}</p>
                    <input class="form-input w-full" type="text" name="gelar" id="gelar" placeholder="Gelar">
                    <p class="text-red-400 text-sm">{{$errors->has("gelar") ? "*".$errors->first("gelar") : ""}}</p>
                    <input class="form-input w-full" type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
                    <p class="text-red-400 text-sm">{{$errors->has("kecamatan") ? "*".$errors->first("kecamatan") : ""}}</p>
                    <input class="form-input w-full" type="text" name="kabupaten" id="kabupaten" placeholder="Kabupaten">
                    <p class="text-red-400 text-sm">{{$errors->has("kabupaten") ? "*".$errors->first("kabupaten") : ""}}</p>
                    <input class="form-input w-full" type="text" name="provinsi" id="provinsi" placeholder="Provinsi">
                    <p class="text-red-400 text-sm">{{$errors->has("provinsi") ? "*".$errors->first("provinsi") : ""}}</p>
                </div>
            </div>
            <button class="btn btn-primary w-full">Daftar</button>
            <a href="/login" class="link">Sudah punya akun ?</a>
            <p>atau Daftar sebagai <a href="/register/petani" class="link">Petani</a>, <a href="/register/investor" class="link">Investor</a> ?</p>
        </form>
    </main>
@stop
 
