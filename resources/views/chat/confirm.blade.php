@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8 w-full">
            <div class="flex flex-col px-4 items-center w-full">
                <h1 class="font-bold text-3xl">Tanya Ahli</h1>
                <p>Solusi konsultasi budidaya dan investasi terpercaya langsung dengan para ahlinya di Sultan</p>
                <div class="bg-secondary flex flex-col gap-2 p-8 pb-2 w-full mt-8 rounded-xl mb-8">
                    <form action="/confirmpayment" method="POST" class="p-8 bg-primary flex flex-col items-center gap-4 rounded-xl border-2 border-green">
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
                                <label for="phone">Nomor Telepon</label>
                                <input required type="tel" name="phone" id="phone" class="form-input">
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
                        <button type="submit" class="btn px-20 btn-primary">Lanjutkan</button>
                    </form>
                    <a href="/" class="text-center">Dengan melanjutkan anda telah menyetujui Syarat dan Ketentuan
                        Berlaku pada Tanya
                        Ahli</a>
                </div>
            </div>
        </div>
    </main>
@stop
