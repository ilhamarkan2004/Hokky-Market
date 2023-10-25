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

            @if (session()->has('error'))

            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session()->get('error') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>






            @endif

            <div class="  pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 border-b border-slate-800">

                @foreach($barangs as $barang)
                <div class="mt-2 mb-10">
                    <div class="flex ">

                        <img src="{{ asset('storage/'. $barang->fotobarang) }}" alt="Product"
                            class="w-12 h-12 rounded-full lg:w-24 lg:h-24 ">

                        <div class="ml-4 items-center my-auto w-full">
                            <h3 class="text-lg lg:text-2xl font-semibold leading-none">{{$barang->nama}}</h3>
                            <p class="text-gray-600 text-sm lg:text-base">{{$barang->jumlah}} x
                                {{"Rp " . number_format($barang->harga, 0, ',', '.');}}</p>

                        </div>
                        <div class="my-auto  items-center float-right w-full ">
                            <p class="text-gray-500 font-semi-bold text-sm lg:text-base float-right ">
                                {{"Rp " . number_format($barang->total_harga, 0, ',', '.');}}</p>
                        </div>


                    </div>
                </div>
                @endforeach

            </div>


            {{-- <div>
    <div class="flex">
        <p class="text-sm my-2.5 w-full">Sub Total untuk Produk</p>
        <p class="text-sm my-2.5 w-full float-right inline">{{"Rp " . number_format($keranjang->total_harga, 0, ',', '.');}}
            </p>
        </div>
    </div> --}}


    <div class="w-full  mx-auto">
        <form class=" p-6 rounded-lg shadow-md" action="{{ route('pemesanan.store') }}" method="post">
            @csrf
            @php
            $biaya_total = $keranjang->total_harga + 5000;
            @endphp
            <div class="mb-4">
                <label class="block text-slate-300 font-medium mb-2" for="alamat">Alamat</label>
                <textarea class="bg-gray-600 p-2 rounded-lg w-full" id="alamat" name="alamat"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-slate-300 font-medium mb-2" for="no_hp" required>Nomor Telepon</label>
                <input class="bg-gray-600 p-2 rounded-lg w-full" id="no_hp" name="no_hp" type="tel" required>
            </div>
            <div class="hidden">
                <input type="number" value="{{$keranjang->total_harga}}" name="total_produk">
                <input type="number" value="{{5000}}" name="biaya_pengiriman">
                <input type="number" value="{{$biaya_total}}" name="biaya_total">
            </div>
            <div class="flex my-5">
                <div class="pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 w-full ">
                    <p class="text-sm my-2.5">Sub Total untuk Produk</p>
                    <p class="text-sm my-2.5">Sub Total Pengiriman</p>
                    <p class="font-semibold font-sans text-base my-4">Total Pembayaran</p>
                </div>
                <div class="pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 w-full  float-right">
                    <div class="float-right ">
                        <p class="text-sm my-2.5 "> {{"Rp " . number_format($keranjang->total_harga, 0, ',', '.');}}</p>
                        <p class="text-sm my-2.5  "> Rp 5000
                        </p>
                        <p class="font-semibold font-sans text-base my-4 ">
                            {{"Rp " . number_format($biaya_total, 0, ',', '.');}}</p>
                    </div>
                </div>
            </div>
            <button class="bg-indigo-500 text-white p-2  lg:mr-4  rounded-lg hover:bg-indigo-600 float-right">Pesan
                Sekarang</button>
        </form>
    </div>



    @endif
    </div>
    </div>
</x-app-layout>
