@extends("layouts.main")
@section("content")
    <main class="pt-4 bg-bg1 bg-cover h-screen">
        @include("components.navbar")
        <div class="flex flex-col items-center p-4">
            <h1 class="font-bold text-3xl">Ruang Diskusi</h1>
            <div class="w-full p-4 rounded-xl bg-secondary">
                <form action="/diskusi" method="POST" class="w-full flex items-start bg-primary p-2 rounded-xl gap-2">
                    @csrf
                    <img src="{{auth()->user()->dp?"/".auth()->user()->dp:"/images/icon4.png"}}" alt=""
                         class="w-14 h-14 rounded-full border-2 border-dark-green">
                    <textarea name="topic" class="resize-none flex-grow"></textarea>
                    <button class="btn btn-primary px-8">Post</button>
                </form>
                <div class="w-full flex flex-col gap-4 mx-2 mt-8">
                    @foreach($diskusis as $diskusi)
                        <div class="flex gap-2">
                            <img src="{{$diskusi->user->dp?"/".$diskusi->user->dp:"/images/icon4.png"}}" alt=""
                                 class="w-14 h-14 rounded-full border-2 border-dark-green">
                            <div>
                                <h2 class="font-bold text-2xl">{{$diskusi->topic}}</h2>
                                <div class="flex gap-4">
                                    <p>Oleh {{$diskusi->user->name}}</p>
                                    <button class="font-bold">Balas</button>
                                </div>
                                <div>
                                    @foreach($diskusi->diskusiKomens as $komen)
                                        <div>
                                            {{$komen->comment}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="h-1 bg-slate-500/40"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@stop
