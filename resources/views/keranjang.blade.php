<x-app-layout>
    <div class="container mx-auto px-4 py-6 lg:py-8">
        <div class="flex items-center justify-between mb-6 lg:mb-8">
            <h2 class="text-2xl font-semibold leading-none">Keranjang</h2>
            @if($keranjang)
            <form class="inline ml-1 " method="POST" action="{{ route('keranjang.destroy', $keranjang->id) }}">
                @csrf
                @method('delete')

                <button class="text-indigo-500 hover:text-indigo-600 font-semibold"
                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                    Bersihkan Semua
                </button>
            </form>

            @else
            @endif
        </div>
        <div class=" rounded-md shadow-md overflow-hidden">
            <!-- Item -->
            @if(!$keranjang)
            <p class="text-center mt-7 font-semibold text-slate-200">Anda belum memilih produk</p>
            @else
            <div class="  px-6 py-4 border-b border-slate-800">

                @foreach($barangs as $barang)
                <div class="mt-2 mb-10">
                    <div class="flex ">

                        <img src="{{ asset('storage/'. $barang->fotobarang) }}" alt="Product"
                            class="w-12 h-12 rounded-full lg:w-24 lg:h-24 ">

                        <div class="ml-4 items-center my-auto">
                            <h3 class="text-lg lg:text-2xl font-semibold leading-none">{{$barang->nama}}</h3>
                            <p class="text-gray-600 text-sm lg:text-base">{{$barang->jumlah}} x
                                {{"Rp " . number_format($barang->harga, 0, ',', '.');}}</p>
                        </div>

                    </div>
                </div>
                @endforeach
                <div>
                    <button
                        class="text-gray-600 hover:text-gray-800 font-semibold px-2 py-1 rounded-md focus:outline-none">
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>