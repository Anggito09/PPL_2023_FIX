@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("admin.sidebar")
            <form action="/editme" method="POST" enctype="multipart/form-data"
                  class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                @csrf
                <h1 class="font-bold text-3xl w-full">Edit Profil</h1>
                <div class="flex flex-col items-center gap-0">
                    <label class="font-medium text-lg" for="dp">Foto Profil</label>
                    <input type="file" name="dp" id="dp">
                </div>
                <div class="flex w-full gap-2">
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Nama</h2>
                            <input class="form-input w-full" type="text" name="name" id="name" placeholder="Name"
                                   value="{{auth()->user()->name}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Email</h2>
                            <input class="form-input w-full" type="email" name="email" id="email" placeholder="Name"
                                   value="{{auth()->user()->email}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">No Telepon</h2>
                            <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Name"
                                   value="{{auth()->user()->phone}}">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Password</h2>
                            <input class="form-input w-full" type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Konfirmasi Password</h2>
                            <input class="form-input w-full" type="password" name="password_confirmation" id="password_confirmation"
                                   placeholder="Konfirmasi Password">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary px-12">Simpan</button>
                    <a href="/me" class="btn btn-secondary px-12">Batal</a>
                </div>
            </form>
        </div>
    </main>
@stop
