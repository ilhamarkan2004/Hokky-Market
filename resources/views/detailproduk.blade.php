<x-app-layout>
    <div class="bg-[#0D0D0D] mt-10 ">
        <div class="md:flex ">
            <img src=" {{ asset('storage/'. $produk->fotobarang) }}" alt=" Gambar produk"
                class="  md:mx-8  mx-auto max-w-sm w-full">
            <div class=" xs:max-w-sm md:max-w-xs p-2.5  lg:max-w-sm xl:max-w-md mx-auto md:mx-0 ">
                <h2 class="text-xl tracking-wide break-words text-justify font-extrabold text-white">{{$produk->nama}}</h2>
                <h3 class="text-base md:text-2xl font-bold text-slate-300 mt-4">Harga:
                    {{"Rp " . number_format($produk->harga, 0, ',', '.');}}</h3>
                <p class="text-slate-300 mt-2">Stok: {{$produk->stok}}</p>
                <button class="p-2 mt-2 rounded-md text-slate-200 bg-orange-700">Beli Sekarang</button>
            </div>

        </div>
        <div class="mt-6 xs:max-w-sm  p-2.5 md:mx-8  xl:max-w-none mx-auto ">
            <h2 class="text-2xl font-bold text-slate-300 mb-2 break-words mt-5 ">Deskripsi Produk</h2>
            <p class="text-slate-300 mt-2 break-words text-justify ">{{$produk->deskripsi}}</p>
        </div>


    </div>

</x-app-layout>