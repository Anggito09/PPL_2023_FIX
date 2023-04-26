@extends("layouts.main")
@section("content")
    <main class="flex h-screen items-center justify-center bg-[#EFF6E9]">
        <div class="w-2/3 h-5/6 flex">
            <form action="/login" method="POST"
                  class="rounded-s-xl bg-secondary flex flex-col justify-center items-center w-1/2 px-16 gap-8">
                <h1 class="font-bold text-3xl">Sign In</h1>
                @csrf
                <div class="flex flex-col w-full gap-4">
                    <input class="form-input w-full" type="email" name="email" id="email" placeholder="Email">
                    <input class="form-input w-full" type="password" name="password" id="password"
                           placeholder="Password">
                </div>
                <button class="btn btn-primary px-12 w-full" type="submit">Masuk</button>
            </form>
            <div class="flex flex-col justify-center items-center gap-8 bg-primary rounded-e-xl px-16 w-1/2">
                <h1 class="font-bold text-3xl">Halo, Teman Tani!</h1>
                <p class="text-center">Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
                <a href="/register/petani" class="btn btn-secondary w-full">Daftar</a>
            </div>
        </div>
    </main>
@stop
