@extends('layouts.default')
@section('content')

    <div class="h-screen flex justify-center items-center text-lg">
    <div class="flex w-3/4 bg-white rounded-xl drop-shadow-body">
        <div class="bg-white text-primary py-24 flex flex-col items-center w-1/2 rounded-s-xl">
            <h1 class="font-bold text-3xl mb-10">Sign Up</h1>
            <form method="POST" action="/registerpakar" class="flex flex-col items-center md:w-2/3">
                @csrf
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Nama Lengkap"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <input
                    type="text"
                    name="gelar"
                    id="gelar"
                    placeholder="Gelar"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <input
                    type="password"
                    name="cfpassword"
                    id="cfpassword"
                    placeholder="Confirm Password"
                    class="bg-secondary bg-opacity-50 placeholder:text-primary placeholder:opacity-70 font-semibold mb-6 p-2 w-full text-sm rounded-md"
                />
                <button
                    class="w-full font-semibold text-sm rounded-full py-2 bg-primary hover:bg-green-950 text-white hover:text-green-100"
                    onClick={register}
                >
                    SIGN UP
                </button>
                <p class="text-sm my-2">atau</p>
                <a
                    href="/registerpakar"
                    class="border-2 rounded-full border-primary hover:bg-green-200 py-2 w-full text-sm font-semibold text-center"
                >
                    Daftar Pakar
                </a>
            </form>
        </div>
        <div class="bg-secondary bg-opacity-50 text-primary flex flex-col items-center justify-center gap-8 w-1/2 rounded-e-xl">
            <h1 class="text-3xl font-bold text-center">
                HALO, TEMAN PETANI!
            </h1>
            <p class="text-center w-2/3 text-md">
                Masuk dan mulai gunakan layanan kami segera
            </p>
            <a
                href="/login"
                class="border-2 rounded-full border-primary hover:bg-secondary py-2 w-2/3 text-sm font-semibold text-center"
            >
                SIGN IN
            </a>
        </div>
    </div>
</div>

@stop
