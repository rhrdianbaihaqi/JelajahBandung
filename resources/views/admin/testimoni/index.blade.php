@extends('layouts.admin')

@section('title', 'Daftar Testimoni')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Testimoni</h1>
            <p class="text-sm text-gray-500">Kelola ulasan dan feedback dari pengguna.</p>
        </div>

        <a href="{{ route('admin.testimoni.create') }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg transition shadow-sm text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Testimoni
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

    {{-- Table Section --}}
    <div class="overflow-hidden rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isi Ulasan</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($testimonis as $testimoni)
                <tr class="hover:bg-gray-50 transition-colors">
                    {{-- Nomor --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $loop->iteration + ($testimonis->currentPage() - 1) * $testimonis->perPage() }}
                    </td>

                    {{-- Kolom Pengguna (Foto + Nama) --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @if($testimoni->foto)
                                    <img class="h-10 w-10 rounded-full object-cover border border-gray-200" src="{{ asset('image/testimoni/' . $testimoni->foto) }}" alt="Foto">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 border border-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-bold text-gray-900">{{ $testimoni->nama_pengguna }}</div>
                            </div>
                        </div>
                    </td>

                    {{-- Isi Testimoni --}}
                    <td class="px-6 py-4">
                        <div class="relative pl-3 text-sm text-gray-600 italic border-l-2 border-gray-300">
                            "{{ Str::limit($testimoni->isi, 80) }}"
                        </div>
                    </td>

                    {{-- Aksi --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.testimoni.edit', $testimoni->id_testimoni) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            
                            <form action="{{ route('admin.testimoni.destroy', $testimoni->id_testimoni) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                        <div class="flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mb-2 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <p>Belum ada testimoni yang ditambahkan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex justify-end">
        {{ $testimonis->links() }} 
        {{-- Catatan: Pastikan di AppServiceProvider menggunakan Paginator::useTailwind() agar link ini otomatis rapi --}}
    </div>
</div>
@endsection