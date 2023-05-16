@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8 w-full">
            <div class="flex flex-col px-4 items-center w-full">
                <h1 class="font-bold text-3xl">Tanya Ahli</h1>
                <p>Solusi konsultasi budidaya dan investasi terpercaya langsung dengan para ahlinya di Sultan</p>
                <div class="flex w-full mt-8 p-4 rounded-xl bg-secondary gap-4">
                    <div class="w-1/4 p-4 bg-primary flex flex-col items-center rounded-xl border-2 border-green">
                        <h1 class="font-bold text-3xl">Chats ({{$chatSessions->count()}})</h1>
                        <form action="" class="w-full">
                            <input type="text" name="keyword" id="keyword"
                                   class="w-full border-2 border-dark-green bg-secondary rounded-full"
                                   placeholder="Cari">
                        </form>
                        <div
                            class="flex flex-col gap-2 items-start mt-4 w-full h-[calc(100vh-25rem)] overflow-y-scroll">
                            @foreach($chatSessions as $chatSession)
                                <a href="/chat/{{$chatSession->id}}" class="flex items-center gap-2 w-full">
                                    <img
                                        src="{{$chatSession->recipient->dp?$chatSession->recipient->dp:"/images/icon4.png"}}"
                                        class="h-12 object-cover rounded-full border-2 border-green bg-secondary">
                                    <div>
                                        @if(auth()->user()->role->role_name === "petani" || auth()->user()->role->role_name === "investor")
                                            <h2 class="font-bold italic text-xl">{{$chatSession->recipient->name}}</h2>
                                        @else
                                            <h2 class="font-bold italic text-xl">{{$chatSession->user->name}}</h2>
                                        @endif
                                        <p>Lorem Ipsum</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex-grow p-4 bg-primary flex flex-col rounded-xl border-2 border-green">
                        @yield("body")
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
