@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("investor.sidebar")
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                <h1 class="font-bold text-3xl w-full">Profil</h1>
                <div class="w-full flex gap-4">
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">ID Investor</h2>
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
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Gender</h2>
                            <p>{{auth()->user()->gender}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Alamat</h2>
                            <p>{{auth()->user()->kecamatan}}, {{auth()->user()->kabupaten}}, {{auth()->user()->provinsi}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">No Rekening</h2>
                            <p>{{auth()->user()->rekening}}</p>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary px-12" href="/editme">Edit</a>
            </div>
        </div>
    </main>
@stop
