<x-app-layout class="overflow-x-hidden">
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Dashboard Admin') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     <table class="table-auto w-full mt-5">
                         <thead>
                             <tr class="bg-gray-300 text-gray-700">
                                 <th class="px-4 py-2 text-center">No</th>
                                 <th class="px-4 py-2 text-center">Nama Tabel</th>
                                 <th class="px-4 py-2 text-center">Action</th>

                             </tr>
                         </thead>
                         <tbody>
                             <tr class="text-gray-700 hover:bg-gray-200">
                                 <td class="px-4 py-2 text-center">1</td>
                                 <td class="px-4 py-2 text-center">Kategori</td>
                                 <td class="px-4 py-2 text-center"><a href="{{ route('kategori.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>
                                 
                             </tr>
                             <tr class="text-gray-700 hover:bg-gray-200">
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