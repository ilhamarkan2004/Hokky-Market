<x-app-layout class="overflow-x-hidden">
     <x-slot name="header" class="bg-[#0D0D0D]">
         <h2 class="font-semibold text-xl text-white leading-tight">
             {{ __('Dashboard Admin') }}
         </h2>
     </x-slot>

     <div class="py-12 ">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 bg-[#0D0D0D]">
                     <table class="table-auto w-full mt-5 border ">
                         <thead class="border">
                             <tr class=" text-white">
                                 <th class="px-4 py-2 text-center">No</th>
                                 <th class="px-4 py-2 text-center">Nama Tabel</th>
                                 <th class="px-4 py-2 text-center">Action</th>

                             </tr>
                         </thead>
                         <tbody class="border">
                             <tr class="text-white ">
                                 <td class="px-4 py-2 text-center">1</td>
                                 <td class="px-4 py-2 text-center">Kategori</td>
                                 <td class="px-4 py-2 text-center"><a href="{{ route('kategori.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>
                                 
                             </tr>
                             <tr class="text-white ">
                                 <td class="px-4 py-2 text-center">2</td>
                                 <td class="px-4 py-2 text-center">Barang</td>
                                 <td class="px-4 py-2 text-center"><a href="{{ route('barang.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>
                                 
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>

 </x-app-layout>