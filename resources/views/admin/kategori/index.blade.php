<x-app-layout class="overflow-x-hidden">
    <x-slot name="header" class="bg-[#0D0D0D]">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('List Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0D0D0D] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('kategori.create')}}" class="text-md font-semibold text-black p-2 rounded-md bg-green-500 "><span class="font-extrabold text-lg">+</span> Tambah</a>
                    <table class="table-auto w-full mt-5 border">
                        <thead class="border">
                            <tr class="bg-[#0D0D0D] text-white">
                                <th class="px-4 py-2 text-center">No</th>
                                <th class="px-4 py-2 text-center">Nama Kategori</th>
                                <th class="px-4 py-2 text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach ($kategoris as $kategori)
                            <tr class="text-white ">
                                <td class="px-4 py-2 text-center">{{$kategori->id}}</td>
                                <td class="px-4 py-2 text-center">{{$kategori->nama}}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('kategori.edit', $kategori) }}" class="text-blue-500 mr-1"><i
                                            class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                                    <form class="inline ml-1"method="POST" action="{{ route('kategori.destroy', $kategori) }}">
                                        @csrf
                                        @method('delete')

                                        <button class="text-red-500"
                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{route('dashboard')}}" class="text-md font-semibold text-white p-2 mt-20 inline-block float-right rounded-md hover:bg-slate-700 bg-slate-900 "> Kembali</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>