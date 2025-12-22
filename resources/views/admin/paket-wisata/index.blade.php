@extends('layouts.admin')

@section('title', 'Daftar Paket Wisata')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Paket Wisata</h1>
            <p class="text-sm text-gray-500">Kelola data paket wisata, jadwal, fasilitas, dan harga.</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            {{-- Search Bar --}}
            <form action="{{ route('admin.paket-wisata.index') }}" method="GET" class="relative group w-full sm:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                    placeholder="Cari nama paket...">
            </form>

            {{-- Tombol Tambah --}}
            <a href="/admin/paket-wisata/create" class="flex items-center justify-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm text-sm font-medium whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Paket
            </a>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Info Paket</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-64">Aksi & Detail</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($paketWisatas as $paket)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        {{ $paketWisatas->firstItem() + $loop->index }}
                    </td>
                    
                    {{-- Nama & Deskripsi --}}
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-900 mb-1">{{ $paket->nama_paket }}</div>
                        <div class="text-xs text-gray-500 line-clamp-2 leading-relaxed max-w-xs">
                            {{ $paket->deskripsi_paket }}
                        </div>
                    </td>

                    {{-- Durasi Badge --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $paket->durasi_paket }} Hari
                        </span>
                    </td>

                    {{-- Gambar --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <img src="{{ asset('image/' . $paket->gambar_paket) }}" alt="Gambar Paket" class="h-16 w-24 object-cover rounded-lg border border-gray-200 shadow-sm mx-auto transition-transform hover:scale-105" />
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-3">
                            {{-- Group Tombol Utama (Edit & Hapus) --}}
                            <div class="flex justify-center gap-2">
                                <a href="/admin/paket-wisata/{{ $paket->id_paket }}/edit" class="text-yellow-600 hover:text-yellow-800 bg-yellow-50 hover:bg-yellow-100 p-2 rounded-lg transition" title="Edit Paket">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ url('/admin/paket-wisata/' . $paket->id_paket) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Paket">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            {{-- Divider Tipis --}}
                            <div class="border-t border-gray-100"></div>

                            {{-- Group Tombol Detail (Grid) --}}
                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('admin.wisata.index', $paket->id_paket) }}" class="text-xs text-center border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-2 py-1.5 rounded transition">
                                    Wisata
                                </a>
                                <a href="{{ route('admin.jadwal.index', $paket->id_paket) }}" class="text-xs text-center border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-2 py-1.5 rounded transition">
                                    Jadwal
                                </a>
                                <a href="{{ route('admin.fasilitas.index', $paket->id_paket) }}" class="text-xs text-center border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-2 py-1.5 rounded transition">
                                    Fasilitas
                                </a>
                                <a href="{{ route('admin.harga.index', $paket->id_paket) }}" class="text-xs text-center border border-indigo-200 text-indigo-600 hover:bg-indigo-50 px-2 py-1.5 rounded transition">
                                    Harga
                                </a>
                            </div>
                        </div>
                    </td>              
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Jika data kosong --}}
        @if($paketWisatas->isEmpty())
        <div class="text-center py-10">
            <p class="text-gray-500">Belum ada data paket wisata.</p>
        </div>
        @endif
    </div>

    {{-- Pagination Section --}}
    <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="text-sm text-gray-500">
            Menampilkan <span class="font-medium">{{ $paketWisatas->firstItem() }}</span> - <span class="font-medium">{{ $paketWisatas->lastItem() }}</span> dari <span class="font-medium">{{ $paketWisatas->total() }}</span> paket
        </div>
      
        <div class="flex items-center space-x-1">
            {{-- Tombol Prev --}}
            @if ($paketWisatas->onFirstPage())
                <span class="px-3 py-1 text-gray-400 bg-gray-50 border border-gray-200 rounded-md text-sm cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </span>
            @else
                <a href="{{ $paketWisatas->previousPageUrl() }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-md text-sm hover:bg-gray-50 hover:text-blue-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
            @endif
        
            {{-- Nomor Halaman --}}
            @foreach ($paketWisatas->getUrlRange(1, $paketWisatas->lastPage()) as $page => $url)
                @if ($page == $paketWisatas->currentPage())
                    <span class="px-3 py-1 bg-blue-600 text-white border border-blue-600 rounded-md text-sm font-medium shadow-sm">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-md text-sm hover:bg-gray-50 hover:text-blue-600 transition">{{ $page }}</a>
                @endif
            @endforeach
        
            {{-- Tombol Next --}}
            @if ($paketWisatas->hasMorePages())
                <a href="{{ $paketWisatas->nextPageUrl() }}" class="px-3 py-1 text-gray-600 bg-white border border-gray-300 rounded-md text-sm hover:bg-gray-50 hover:text-blue-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @else
                <span class="px-3 py-1 text-gray-400 bg-gray-50 border border-gray-200 rounded-md text-sm cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            @endif
        </div>
    </div>    
</div>
@endsection