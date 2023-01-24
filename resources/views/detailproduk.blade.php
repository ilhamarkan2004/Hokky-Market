<x-app-layout>
    <div class="bg-[#0D0D0D] mt-10 ">
        @if (session()->has('success'))

        <div id="alert-3"
            class="flex p-4  text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400 mt-3 mb-10"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>






        @endif
        <div class="md:flex ">
            <img src=" {{ asset('storage/'. $produk->fotobarang) }}" alt=" Gambar produk"
                class="  md:mx-8  mx-auto max-w-sm w-full  rounded-md">
            <div class=" xs:max-w-sm md:max-w-xs p-2.5  lg:max-w-sm xl:max-w-md mx-auto md:mx-0 ">
                <h2 class="text-xl tracking-wide break-words text-justify font-extrabold text-white">{{$produk->nama}}
                </h2>
                <h3 class="text-base md:text-2xl font-bold text-slate-300 mt-4">Harga:
                    {{"Rp " . number_format($produk->harga, 0, ',', '.');}}</h3>
                <p class="text-slate-300 mt-2">Stok: {{$produk->stok}}</p>
                <form
                    class=" text-slate-200 bg-orange-700 hover:bg-red-200 hover:text-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center mt-10 block"
                    method="POST" action="{{route('keranjang.store')}}">
                    @csrf
                    <input type="text" name="id" class="hidden" value="{{$produk->id}}">
                    <button class=" w-full  ">
                        Beli Sekarang
                    </button>
                </form>
            </div>

        </div>
        <div class="mt-6 xs:max-w-sm  p-2.5 md:mx-8  xl:max-w-none mx-auto ">
            <h2 class="text-2xl font-bold text-slate-300 mb-2 break-words mt-5 ">Deskripsi Produk</h2>
            <p class="text-slate-300 mt-2 break-words text-justify ">{{$produk->deskripsi}}</p>
        </div>


    </div>

</x-app-layout>