@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("admin.sidebar")
            <div class="bg-secondary w-3/4 flex flex-col gap-4 h-[80vh] overflow-y-scroll p-8 rounded-xl">
                <h1 class="font-bold text-xl">Akun Investor</h1>
                <div>
                    @foreach($investors as $i=>$investor)
                        <div class="flex justify-between bg-primary px-4 py-2 rounded-xl">
                            <div class="flex items-center gap-4">
                                <img class="w-16 h-16 rounded-full border-2 border-green object-fit" src="/{{$investor->dp}}">
                                <div>
                                    <h2 class="font-bold text-xl">{{$investor->name}}</h2>
                                    <h3>Investor</h3>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-between gap-2">
                                <h3 class="flex items-center">
                                    @if($status[$i])
                                        <img src="/images/icon5.png" class="w-6" alt="">Premium
                                    @else
                                        Reguler
                                    @endif
                                </h3>
                                <a href="/editinvestor/{{$investor->id}}" class="btn btn-primary px-12">Ubah</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </main>
@stop
