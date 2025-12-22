@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Fasilitas</h1>
        <p class="text-sm text-gray-500">
            Menambahkan fasilitas baru untuk paket: 
            <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                {{ $paket->nama_paket }}
            </span>
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        {{-- Validasi Error --}}
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 m-6 mb-0 rounded-r">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm leading-5 font-medium text-red-800">Terdapat kesalahan input:</h3>
                    <ul class="mt-1 list-disc list-inside text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Form Start --}}
        <form action="{{ route('admin.fasilitas.store', $paket->id_paket) }}" method="POST" class="p-8">
            @csrf
            
            <div class="space-y-6">
                {{-- Input Nama Fasilitas --}}
                <div>
                    <label for="nama_fasilitas" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Fasilitas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_fasilitas" id="nama_fasilitas" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        placeholder="Contoh: Tiket Masuk, Makan Siang, Transportasi..." required>
                </div>

                {{-- Input Status Included --}}
                <div>
                    <label for="included" class="block text-sm font-medium text-gray-700 mb-2">
                        Status Fasilitas
                    </label>
                    <div class="relative">
                        <select name="included" id="included" 
                            class="w-full appearance-none rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4 pr-8 bg-white">
                            <option value="1">Termasuk (Included)</option>
                            <option value="0">Tidak Termasuk (Excluded)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        Pilih <strong>Termasuk</strong> jika fasilitas ini sudah dicover biaya paket, atau <strong>Tidak Termasuk</strong> jika peserta harus bayar sendiri.
                    </p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.fasilitas.index', $paket->id_paket) }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
                    Batal
                </a>
                <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Simpan Fasilitas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection