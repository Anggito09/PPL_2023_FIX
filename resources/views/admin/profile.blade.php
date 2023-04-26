@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-1/4 py-4 rounded-xl">
                <div class="px-8 mb-8">
                    <div class="w-16 h-16 rounded-full border-2 border-green"></div>
                    <h2 class="capitalize font-bold text-xl">{{auth()->user()->name}}</h2>
                    <h3 class="capitalize">{{auth()->user()->role->role_name}}</h3>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="/akunpetani" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Petani</a>
                    <a href="/akuninvestor" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Investor</a>
                    <a href="/akunpakar" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Pakar</a>
                </div>
            </div>
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                <h1 class="font-bold text-3xl w-full">Profil</h1>
                <div class="w-full flex flex-col gap-4">
                    <div>
                        <h2 class="font-medium text-lg">ID Admin</h2>
                        <p>{{auth()->user()->id}}</p>
                    </div>
                    <div>
                        <h2 class="font-medium text-lg">Nama</h2>
                        <p>{{auth()->user()->name}}</p>
                    </div>
                    <div>
                        <h2 class="font-medium text-lg">Email</h2>
                        <p>{{auth()->user()->email}}</p>
                    </div>
                    <div>
                        <h2 class="font-medium text-lg">No Telepon</h2>
                        <p>{{auth()->user()->phone}}</p>
                    </div>
                </div>
                <a class="btn btn-primary px-12" href="/editme">Edit</a>
            </div>
        </div>
    </main>
@stop
