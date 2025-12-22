@extends('layouts.admin')

@section('title', 'Edit Harga')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Opsi Harga</h1>
        <p class="text-sm text-gray-500">
            Memperbarui data harga paket untuk: 
            <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                {{ $harga->paket->nama_paket }}
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
                    <h3 class="text-sm leading-5 font-medium text-red-800">Gagal menyimpan perubahan:</h3>
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
        <form action="{{ route('admin.harga.update', $harga->id_harga) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                {{-- Input Jumlah Peserta --}}
                <div>
                    <label for="peserta" class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah Peserta (Orang) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="peserta" id="peserta" 
                        value="{{ old('peserta', $harga->peserta) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        required>
                    <p class="mt-1 text-xs text-gray-500">Jumlah peserta minimal untuk harga ini.</p>
                </div>

                {{-- Input Harga per Peserta --}}
                <div>
                    <label for="harga_per_peserta" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga per Peserta <span class="text-red-500">*</span>
                    </label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm font-semibold">Rp</span>
                        </div>
                        <input type="number" name="harga_per_peserta" id="harga_per_peserta" step="0.01" 
                            value="{{ old('harga_per_peserta', $harga->harga_per_peserta) }}"
                            class="w-full rounded-lg border-gray-300 pl-10 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition py-2.5" 
                            required>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Pastikan harga sudah sesuai dengan update terbaru.</p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                {{-- Tombol Batal --}}
                <a href="{{ route('admin.harga.index', $harga->id_paket) }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
                    Batal
                </a>
                
                {{-- Tombol Update --}}
                <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection