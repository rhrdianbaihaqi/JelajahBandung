@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Jadwal Kegiatan</h1>
            <p class="text-sm text-gray-500">
                Atur perjalanan untuk paket: 
                <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                    {{ $paket->nama_paket }}
                </span>
            </p>
        </div>

        <a href="{{ route('admin.jadwal.create', $paket->id_paket) }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition shadow-sm text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Jadwal
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
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
        
        @if($jadwals->isEmpty())
            {{-- Empty State --}}
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Jadwal Kosong</h3>
                <p class="mt-1 text-sm text-gray-500">Belum ada rincian kegiatan untuk paket wisata ini.</p>
            </div>
        @else
            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Hari Ke-</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail Kegiatan</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($jadwals as $jadwal)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- Kolom Hari --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center align-top">
                                <span class="inline-flex items-center justify-center px-3 py-1 text-sm font-bold text-blue-800 bg-blue-100 rounded-full border border-blue-200">
                                    Hari {{ $jadwal->hari }}
                                </span>
                            </td>

                            {{-- Kolom Kegiatan --}}
                            <td class="px-6 py-4 text-sm text-gray-700 align-top leading-relaxed">
                                {{ $jadwal->kegiatan }}
                            </td>

                            {{-- Kolom Aksi --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center align-top">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.jadwal.edit', $jadwal->id_kegiatan) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition border border-yellow-200" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.jadwal.destroy', $jadwal->id_kegiatan) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
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
            Kembali ke Daftar Paket Wisata
        </a>
    </div>
</div>
@endsection