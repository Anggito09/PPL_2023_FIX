<div class="bg-secondary w-1/4 py-4 rounded-xl">
    <div class="px-8 mb-8">
        <img class="w-16 h-16 rounded-full border-2 border-green object-fit" src="/{{auth()->user()->dp}}">
        <h2 class="capitalize font-bold text-xl">{{auth()->user()->name}}</h2>
        <h3 class="capitalize">{{auth()->user()->role->role_name}}</h3>
    </div>
    <div class="flex flex-col gap-2">
        <a href="/listtransaksi" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Data Transaksi Akun</a>
        <a href="/listinvestasi" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Data Transaksi</a>
    </div>
</div>
