@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-full flex flex-col items-center gap-8 p-8 rounded-xl h-[78vh] overflow-y-scroll">
                <h1 class="font-bold text-3xl w-full">Data Petani</h1>
                <div class="w-full flex flex-col gap-2">
                    @foreach($tanis as $tani)
                        <div class="flex bg-primary px-4 py-2 rounded-xl w-full">
                            <div class="flex items-center gap-4 w-1/4">
                                <div>
                                    <img class="w-16 h-16 rounded-full border-2 border-green object-fit"
                                         src="/{{$tani->user->dp}}">
                                    <h2 class="font-bold text-xl">{{$tani->user->name}}</h2>
                                </div>
                            </div>
                            <div class="flex flex-col flex-grow">
                                <h3 class="font-bold">Deskripsi Petani:</h3>
                                <p>{{$tani->descpetani}}</p>
                                <h3 class="font-bold">Deskripsi Lahan:</h3>
                                <p>{{$tani->desclahan}}</p>
                                <h3 class="font-bold">Dana yang dibutuhkan:</h3>
                                <p>Rp.{{$tani->fund}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@stop
