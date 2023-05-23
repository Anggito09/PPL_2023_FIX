@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-1/4 py-4 rounded-xl">
                <div class="px-8 mb-8">
                    <img class="w-16 h-16 rounded-full border-2 border-green object-fit" src="/{{$profile->dp}}">
                    <h2 class="capitalize font-bold text-xl">{{$profile->name}}</h2>
                    <h3 class="capitalize">{{$profile->role->role_name}}</h3>
                </div>
            </div>
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                <h1 class="font-bold text-3xl w-full">Profil</h1>
                <div class="w-full flex gap-4">
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">ID Pakar</h2>
                            <p>{{$profile->id}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Nama</h2>
                            <p>{{$profile->name}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Email</h2>
                            <p>{{$profile->email}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Nomor handphone</h2>
                            <p>{{$profile->phone}}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Gender</h2>
                            <p>{{$profile->gender}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Alamat</h2>
                            <p>{{$profile->kecamatan}}, {{$profile->kabupaten}}, {{$profile->provinsi}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Gelar</h2>
                            <p>{{$profile->gelar}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">NPWP</h2>
                            <p>{{$profile->npwp}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
