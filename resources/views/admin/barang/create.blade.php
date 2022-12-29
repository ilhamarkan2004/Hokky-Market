<x-app-layout>
    <x-slot name="header" class="bg-[#0D0D0D]">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-8 rounded ">
                        <h1 class="font-medium text-3xl">Tambah Barang</h1>
                        <p class="text-gray-600 mt-6">Jika ingin menambahkan barang baru, maka isilah beberapa form di
                            bawah ini</p>
                        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-8 grid lg:grid-cols-2 gap-4">
                                <div> <label for="nama"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Nama</label> <input
                                        type="text" name="nama" id="nama"
                                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Nama Barang" />
                                </div>
                                @error('nama')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                                <div> <label for="stok"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Stok</label> <input
                                        type="number" name="stok" id="stok" min="0"
                                        class="w-20 bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 " />
                                </div>
                                @error('stok')
                                     <p class="text-red-500 mt-2">{{$message}}</p>
                                 @enderror
                                <div> <label for="harga"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Harga</label> <input
                                        type="number" name="harga" id="harga" min="0"
                                        class="w-64 bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 " />
                                </div>
                               @error('harga')
                                     <p class="text-red-500 mt-2">{{$message}}</p>
                                 @enderror
                                <div>
                                    <div class="mb-3 xl:w-64">
                                        <select name="kategori_id"
                                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="Default select example">
                                            <option disabled class="font-bold ">Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @error('kategori_id')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-8"> <label for="deskripsi"
                                    class="text-sm text-gray-700 block mb-1 font-medium">Deskripsi</label>
                                <textarea placeholder="Deskripsi Barang" name="deskripsi" id="" cols="30" rows="10"
                                    class="w-full bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700"></textarea>

                            </div>
                            @error('deskripsi')
                            <p class="text-red-500 mt-2">{{$message}}</p>
                            @enderror
                            <div class="mt-8">
                                <label for="fotobarang" class="text-sm text-gray-700 block mb-1 font-medium">Foto
                                    Barang</label>
                                <input name="fotobarang" type="file"
                                    class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                            </div>
                            @error('fotobarang')
                            <p class="text-red-500 mt-2">{{$message}}</p>
                            @enderror

                            <div class="space-x-4 mt-8"> <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
                                <!-- Secondary --> <a href="{{route('barang.index')}}"
                                    class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>