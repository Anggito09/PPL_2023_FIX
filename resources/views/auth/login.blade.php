@extends('layouts.default')
@section('content')

    <div class="mt-14 flex justify-center items-center text-lg">
    <div class="flex w-3/4 bg-white rounded-xl drop-shadow-body">
        <div class="bg-white text-primary py-24 flex flex-col items-center w-1/2 rounded-s-xl">
            <h1 class="font-bold text-3xl mb-10">Sign In</h1>
            <form method="POST" action="/login" class="flex flex-col items-center md:w-2/3">
                @csrf
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-5 p-2 w-full text-sm rounded-md"
                />
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <a href="#" class="text-sm underline mb-6">
                    Lupa kata sandi anda?
                </a>
                <button
                    class="w-full font-semibold text-sm rounded-full py-2 bg-primary hover:bg-green-950 text-white hover:text-green-100"
                    onClick={login}
                >
                    SIGN IN
                </button>
            </form>
        </div>
        <div class="bg-secondary bg-opacity-50 text-primary flex flex-col items-center justify-center gap-8 w-1/2 rounded-e-xl">
            <h1 class="text-3xl font-bold text-center">
                HALO, TEMAN PETANI!
            </h1>
            <p class="text-center w-3/4 text-md">
                Daftarkan diri anda dan mulai gunakan layanan kami segera
            </p>
            <a
                href="/register"
                class="border-2 rounded-full border-primary hover:bg-secondary py-2 w-2/3 text-sm font-semibold text-center"
            >
                SIGN UP
            </a>
        </div>
    </div>
</div>

@stop
