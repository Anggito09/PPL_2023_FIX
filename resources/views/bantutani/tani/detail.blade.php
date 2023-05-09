@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-bg1 bg-cover pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Bantu Tani</h1>
            <p class="w-1/2 text-center">Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di
                Fitur Bantu Tani. Apa saja sih keuntungan Bantu Tani di SULTAN?</p>
        </div>
        <div class="flex flex-col items-center gap-2 rounded-xl w-full mt-2">
            <div class="rounded-xl flex flex-col items-center bg-primary gap-4 p-4 px-12 w-2/3">
                <h2 class="font-bold text-xl">Detail Investasi</h2>
                @csrf
                <div class="self-start w-full rounded-md bg-secondary p-4">
                    <table class="w-full border-separate border-spacing-2">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td class="flex items-center gap-4">: <span>{{$tani->name}}</span></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td class="flex items-center gap-4">: <span>{{$tani->phone}}</span></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Petani</td>
                            <td class="flex items-center gap-4">: <span>{{$tani->descpetani}}</span></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Lahan</td>
                            <td class="flex items-center gap-4">: <span>{{$tani->desclahan}}</span></td>
                        </tr>
                        <tr>
                            <td>Dana Yang Dibutuhkan</td>
                            <td class="flex items-center gap-4">: <span>Rp. {{$tani->fund}}</span></td>
                        </tr>
                        <tr>
                            <td>Berkas</td>
                            <td class="flex items-center gap-4">: <a href="/berkastani/{{$tani->id}}" target="_blank" class="flex items-center btn bg-primary text-green px-4 text-sm"><span class="material-symbols-outlined">description</span>Documents</a></td>
                        </tr>
                    </table>
                </div>
                <a href="/edittani/{{$tani->id}}" type="submit" class="btn btn-primary px-12">Edit</a>
            </div>
        </div>
    </main>
@stop
