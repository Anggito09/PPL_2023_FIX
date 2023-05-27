@extends("layouts.main")
@section("content")
    <main class="h-screen flex justify-center bg-[#EFF6E9]">
        <form action="/register/investor" method="POST"
              class="bg-secondary rounded-xl py-8 px-20 flex flex-col items-center gap-4">
            <h1 class="font-bold text-3xl">HALO, TEMAN INVESTOR!</h1>
            <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
            @csrf
            <div class="flex gap-4">
                <div class="flex flex-col gap-2">
                    <div>
                        <input class="form-input w-full" type="text" name="name" id="name" placeholder="Nama">
                        @if($errors->has("name"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("name")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="text" name="phone" id="phone"
                               placeholder="Nomor handphone">
                        @if($errors->has("phone"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("phone")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="email" name="email" id="email" placeholder="Email">
                        @if($errors->has("email"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("email")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="password" name="password" id="password"
                               placeholder="Password">
                        @if($errors->has("password"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("password")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="password" name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Konfirmasi Password">
                        @if($errors->has("password_confirmation"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("password_confirmation")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>
                        <select class="form-input w-full" name="gender" id="gender">
                            <option value selected disabled>Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @if($errors->has("gender"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("gender")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="text" name="rekening" id="rekening"
                               placeholder="Nomor Rekening">
                        @if($errors->has("rekening"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("rekening")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="text" name="kecamatan" id="kecamatan"
                               placeholder="Kecamatan">
                        @if($errors->has("kecamatan"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("kecamatan")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="text" name="kabupaten" id="kabupaten"
                               placeholder="Kabupaten">
                        @if($errors->has("kabupaten"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("kabupaten")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                    <div>
                        <input class="form-input w-full" type="text" name="provinsi" id="provinsi"
                               placeholder="Provinsi">
                        @if($errors->has("provinsi"))
                            <p class="text-red-400 text-sm">{{"*".$errors->first("provinsi")}}</p>
                        @else
                            <p class="opacity-0 text-sm">ok</p>
                        @endif
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-full">Daftar</button>
            <a href="/login" class="link">Sudah punya akun ?</a>
            <p>
                atau Daftar sebagai
                <a href="/register/pakar" class="link">Pakar</a>,
                <a href="/register/petani" class="link">Petani</a> ?
            </p>
        </form>
    </main>
@stop

