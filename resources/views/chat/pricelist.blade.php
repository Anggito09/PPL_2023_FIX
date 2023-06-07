@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8 w-full">
            <div class="flex flex-col px-4 items-center w-full">
                <h1 class="font-bold text-3xl">Tanya Ahli</h1>
                <p>Solusi konsultasi budidaya dan investasi terpercaya langsung dengan para ahlinya di Sultan</p>
                <div class="bg-secondary flex flex-col gap-2 p-8 pb-2 w-full mt-8 rounded-xl mb-8">
                    <form action="/premium" method="POST"
                          class="p-8 bg-primary flex flex-col items-center gap-4 rounded-xl border-2 border-green">
                        @csrf
                        <div class="w-full">
                            <h1 class="font-bold text-2xl">Coba fitur PREMIUM Sultan untuk solusi Konsultasi
                                Pertanian</h1>
                            <ul class="list-disc ms-6">
                                <li>Nikmati kenyamanan menggunakan premium untuk Tanya Ahli</li>
                                <li>Fitur premium dengan masa aktif mulai dari 7 hari, 14 hari, sampai 30 hari.</li>
                            </ul>
                        </div>
                        <div class="w-full flex justify-between">
                            <div class="flex flex-col gap-2">
                                @foreach($pakets as $i=>$paket)
                                    <div class="flex gap-2 items-center">
                                        <input type="radio" name="paket" id="paket{{$i}}" value="{{$paket->id}}">
                                        <label for="paket{{$i}}" class="flex flex-col gap-1">
                                            <span class="font-medium text-lg">{{$paket->nama}} @if($paket->keterangan)
                                                    <span class="btn btn-primary px-2">{{$paket->keterangan}}</span>
                                                @endif</span>
                                            <span>Rp. {{number_format($paket->harga, 2, ',', '.')}}</span></label>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="ms-4 list-disc w-1/2 flex flex-col gap-4">
                                <li>Fitur Tanya Ahli dapat diakses selama 24 Jam, dan untuk pesan akan dibalas pada
                                    jam
                                    kerja masing-masing Pakar
                                </li>
                                <li>Fitur Premium akan terhubung dengan WhatsApp Sultan untuk melakukan pembayaran
                                </li>
                                <li>Status Transaksi akan diverifikasi dalam kurun waktu 48 jam</li>
                            </ul>
                        </div>
                        <button type="submit"
                                class="btn px-20 btn-primary">Lanjutkan
                        </button>
                        <span class="hidden" data-modal-target="sk-modal"></span>
                        <div id="sk-modal" tabindex="-1"
                             class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white p-10 rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="sk-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-8 flex flex-col items-center gap-2">
                                        <h1 class="font-bold text-3xl">PERHATIAN!</h1>
                                        <div class="flex flex-col bg-primary items-start text-start p-8">
                                            <h3>Syarat & Ketentuan Fitur Pengguna Tanya Ahli SULTAN</h3>
                                            <ol class="list-decimal px-6">
                                                <li>Anda dapat menghubungi para Pakar/Ahli SULTAN ketika para Pakar/Ahli SULTAN berstatus online.</li>
                                                <li>Saat melakukan konsultasi Anda hanya bisa konsultasi dengan satu pakar.</li>
                                                <li>Jika ingin mengganti pakar dalam berkonsultasi Anda dapat mengakhiri chat terlebih dahulu.</li>
                                                <li>Batas maksimum konsultasi 1 X 24 jam. Anda dapat konsultasi dengan pakar lain setelah 1 X 24 jam konsultasi sebelumnya.</li>
                                                <li>Batas mengakhiri chat 2 kali/hari</li>
                                                <li>Para Pakar/Ahli dapat membatalkan konsultasi dengan memberikan konfirmasi dan alasan pembatalan kepada Anda. Serta Anda dapat memilih pakar lain untuk konsultasi</li>
                                                <li>Topik yang akan dikonsultasikan diharap untuk berkaitan dengan pertanian. Serta memberikan informasi dan menjelaskan permasalahan yang secara lengkap, jelas, dan akurat.</li>
                                                <li>Dimohon untuk memperhatikan dan menjaga kata – kata Anda saat melakukan konsultasi. Dilarang menggunakan kata – kata yang mengandung unsur SARA.</li>
                                                <li>Anda dapat memberikan pengaduan dengan laporkan chat atau pengaduan ke Email SULTAN jika mengalami hal yang tidak berkenan saat melakukan konsultasi atau jika Pakar/Ahli tidak membalas chat konsultasi lebih dari 1 hari.</li>
                                                <li>Kami akan berupaya semaksimal mungkin agar Pakar/Ahli SULTAN memberikan tanggapan sesegera mungkin. Namun demikian, Kami tidak menyarankan Anda menggunakan Platform untuk kondisi darurat.</li>
                                                <li>Layanan Kami tidak bersifat memaksa atau pun mengikat. Keputusan untuk menggunakan layanan di Website sepenuhnya berada di tangan Anda.</li>
                                                <li>Layanan Kami akan melindungi dan menjaga informasi pribadi konsultasi Anda dengan Pakar/Ahli.</li>
                                            </ol>
                                        </div>
                                        <button type="button"
                                                class="btn border-2 border-green px-8" data-modal-hide="sk-modal">
                                            Lanjutkan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/" class="text-center">Dengan melanjutkan anda telah menyetujui Syarat dan Ketentuan
                        Berlaku pada Tanya
                        Ahli</a>
                </div>
            </div>
        </div>
    </main>
@stop
