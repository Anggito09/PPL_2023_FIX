@extends("layouts.main")
@section("content")
    <main class="bg-bg1 bg-cover min-h-screen pt-4">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-3xl">Bantu Tani</h1>
                <p>Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani.</p>
            </div>
            <div id="popup-modal" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-lg max-h-full">
                    <div
                        class="flex flex-col items-center gap-4 bg-secondary rounded-lg p-8 w-full rounded-xl shadow dark:bg-gray-700">
                        <h1 class="font-bold text-2xl">Data Investasi</h1>
                        <div class="p-2 bg-primary text-secondary rounded-xl w-full">
                            <table class="border-separate border-spacing-2">
                                <tr>
                                    <td>Nama</td>
                                    <td id="modal-name">: Nama</td>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td id="modal-phone">: 082345694308</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td id="modal-address">: Jl. A. Yani No. 30, Kepatihan, Jember</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td id="modal-jenis">: Persawahan</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td id="modal-fund">: Rp. 3.000.000,00</td>
                                </tr>
                                <tr>
                                    <td>Proposal</td>
                                    <td>: <a href="" target="_blank" class="flex items-center btn bg-secondary text-green px-2"
                                             id="modal-proposal"><span class="material-symbols-outlined">description</span>proposal</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-2 flex justify-end w-full">
                            <input type="hidden" id="modal-id" value="">
                            <select id="modal-status" onchange="confirm()" class="bg-primary text-secondary rounded-xl">
                                <option value="selesai">Selesai</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 w-2/3 h-[65vh] overflow-y-scroll bg-secondary p-8 rounded-xl">
                <h2 class="text-xl font-bold">DATA INVESTASI PERSAWAHAN</h2>
                <table class="w-full border-separate border-spacing-1">
                    <thead>
                    <tr>
                        <th class="border-b-2 border-green">Nama</th>
                        <th class="border-b-2 border-green">No HP</th>
                        <th class="border-b-2 border-green">Tanggal dan Waktu</th>
                        <th class="border-b-2 border-green">Nominal</th>
                        <th class="border-b-2 border-green">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($investasis as $investasi)
                        <tr>
                            <td class="text-center flex justify-center bg-primary p-2 rounded-s-xl">
                                <button
                                    onclick="setmodal({name:'{{$investasi->name}}', phone:'{{$investasi->phone}}', address:'{{$investasi->user->address}}', fund:'{{$investasi->fund}}', id:'{{$investasi->id}}', status:@if($investasi->confirmed) 'selesai' @else 'batal' @endif})"
                                    data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="flex gap-4">
                                    <span class="material-symbols-outlined">visibility</span>
                                    <span>{{$investasi->name}}</span>
                                </button>
                            </td>
                            <td class="text-center bg-primary p-2 ">{{$investasi->phone}}</td>
                            <td class="text-center bg-primary p-2 ">{{$investasi->created_at}}</td>
                            <td class="text-center bg-primary p-2 rounded-e-xl ">{{$investasi->fund}}</td>
                            <td class="flex justify-center">
                                <div class="text-center text-xl w-8 h-8 rounded-full border-2 border-green">
                                    @if($investasi->confirmed)
                                        &check;
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function setmodal({id, name, status, phone, address, fund}) {
            console.log("pass", name, id);
            $("#modal-name").html(`: ${name}`);
            $("#modal-id").val(id);
            $("#modal-status").val(status);
            $("#modal-phone").html(`: ${phone}`);
            $("#modal-address").html(`: ${address}`);
            $("#modal-fund").html(`: Rp.${fund}`);
            $("#modal-proposal").attr("href", `/proposalinvestor/${id}`);
        }

        function confirm() {
            const id = $("#modal-id").val();
            window.location.replace(`/confirm/${id}`);
        }
    </script>
@stop
