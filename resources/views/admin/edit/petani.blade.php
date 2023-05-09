@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("admin.sidebar")
            <form action="/editpetani/{{$petani->id}}" method="POST"
                  class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                @csrf
                <h1 class="font-bold text-3xl w-full">Edit Profil</h1>
                <div class="flex w-full gap-2">
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Nama</h2>
                            <input class="form-input w-full" type="text" name="name" id="name" placeholder="Name"
                                   value="{{$petani->name}}">
                            <p class="text-red-400 text-sm">{{$errors->has("name") ? "*".$errors->first("name") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Gender</h2>
                            <select class="form-input w-full" name="gender" id="gender">
                                <option value selected disabled>Gender</option>
                                <option value="L" @if($petani->gender === "L") selected @endif>Laki-laki</option>
                                <option value="P" @if($petani->gender === "P") selected @endif>Perempuan</option>
                            </select>
                            <p class="text-red-400 text-sm">{{$errors->has("gender") ? "*".$errors->first("gender") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Email</h2>
                            <input class="form-input w-full" type="text" name="email" id="email" placeholder="Name"
                                   value="{{$petani->email}}">
                            <p class="text-red-400 text-sm">{{$errors->has("email") ? "*".$errors->first("email") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Password</h2>
                            <input class="form-input w-full" type="password" name="password" id="password"
                                   placeholder="Password">
                            <p class="text-red-400 text-sm">{{$errors->has("password") ? "*".$errors->first("password") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Konfirmasi Password</h2>
                            <input class="form-input w-full" type="password" name="password_confirmation"
                                   id="password_confirmation"
                                   placeholder="Konfirmasi Password">
                            <p class="text-red-400 text-sm">{{$errors->has("password_confirmation") ? "*".$errors->first("password_confirmation") : ""}}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">No Hp</h2>
                            <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Name"
                                   value="{{$petani->phone}}">
                            <p class="text-red-400 text-sm">{{$errors->has("phone") ? "*".$errors->first("phone") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">No Rekening</h2>
                            <input class="form-input w-full" type="text" name="rekening" id="rekening"
                                   placeholder="Name"
                                   value="{{$petani->rekening}}">
                            <p class="text-red-400 text-sm">{{$errors->has("rekening") ? "*".$errors->first("rekening") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Kecamatan</h2>
                            <input class="form-input w-full" type="text" name="kecamatan" id="kecamatan"
                                   placeholder="Kecamatan" value="{{$petani->kecamatan}}">
                            <p class="text-red-400 text-sm">{{$errors->has("kecamatan") ? "*".$errors->first("kecamatan") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Kabupaten</h2>
                            <input class="form-input w-full" type="text" name="kabupaten" id="kabupaten"
                                   placeholder="Kabupaten" value="{{$petani->kabupaten}}">
                            <p class="text-red-400 text-sm">{{$errors->has("kabupaten") ? "*".$errors->first("kabupaten") : ""}}</p>
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Provinsi</h2>
                            <input class="form-input w-full" type="text" name="provinsi" id="provinsi"
                                   placeholder="Kecamatan" value="{{$petani->provinsi}}">
                            <p class="text-red-400 text-sm">{{$errors->has("provinsi") ? "*".$errors->first("provinsi") : ""}}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary px-12">Simpan</button>
                    <a href="/akunpetani" class="btn btn-secondary px-12">Batal</a>
                </div>
            </form>
        </div>
    </main>
@stop
