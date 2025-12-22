@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Destinasi Wisata</h1>
            <p class="text-sm text-gray-500">
                Lokasi yang akan dikunjungi dalam paket: 
                <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                    {{ $paket->nama_paket }}
                </span>
            </p>
        </div>

        <a href="{{ route('admin.wisata.create', ['id_paket' => $paket->id_paket]) }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition shadow-sm text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Wisata
        </a>
    </div>

    {{-- Alert Success --}}
    @if (session('success'))
    <div class="mb-6 flex items-center p-4 text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="text-sm font-medium">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        @if($wisatas->isEmpty())
            {{-- Empty State --}}
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Belum ada destinasi</h3>
                <p class="mt-1 text-sm text-gray-500">Tambahkan tempat wisata menarik yang masuk dalam paket ini.</p>
            </div>
        @else
            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-48">Nama Wisata</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Gambar</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($wisatas as $wisata)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- No --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                {{ $loop->iteration }}
                            </td>
                            
                            {{-- Nama Wisata --}}
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">{{ $wisata->nama_wisata }}</div>
                            </td>

                            {{-- Deskripsi --}}
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 line-clamp-3 leading-relaxed">
                                    {{ $wisata->deskripsi_wisata }}
                                </div>
                            </td>

                            {{-- Gambar --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="relative group w-24 h-16 mx-auto">
                                    <img src="{{ asset('image/' . $wisata->gambar_wisata) }}" class="w-full h-full object-cover rounded-lg border border-gray-200 shadow-sm group-hover:scale-105 transition-transform duration-200" alt="Wisata">
                                </div>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.wisata.edit', $wisata->id_wisata) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition border border-yellow-200" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('admin.wisata.destroy', $wisata->id_wisata) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data wisata ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition border border-red-200" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Footer Back Button --}}
    <div class="mt-6">
        <a href="{{ route('admin.paket-wisata.index') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Paket Wisata
        </a>
    </div>
</div>
@endsection