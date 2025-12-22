@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Destinasi Wisata</h1>
        <p class="text-sm text-gray-500">
            Memperbarui informasi lokasi wisata: 
            <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                {{ $wisata->nama_wisata }}
            </span>
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        {{-- Pesan Error --}}
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
        <form action="{{ route('admin.wisata.update', $wisata->id_wisata) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                {{-- Input Nama Wisata --}}
                <div>
                    <label for="nama_wisata" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Wisata <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_wisata" id="nama_wisata" 
                        value="{{ old('nama_wisata', $wisata->nama_wisata) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        required>
                </div>

                {{-- Input Deskripsi --}}
                <div>
                    <label for="deskripsi_wisata" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Wisata <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="5" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        required>{{ old('deskripsi_wisata', $wisata->deskripsi_wisata) }}</textarea>
                </div>

                <div class="border-t border-gray-100 pt-6"></div>

                {{-- Area Gambar --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Preview Gambar Lama --}}
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                        <div class="relative group rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                            <img src="{{ asset('image/' . $wisata->gambar_wisata) }}" alt="Gambar Lama" class="w-full h-32 object-cover">
                        </div>
                    </div>

                    {{-- Input Gambar Baru --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="gambar_wisata" class="block text-sm font-medium text-gray-700 mb-2">Ganti Gambar (Opsional)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition bg-gray-50/50">
                            <div class="space-y-1 text-center w-full">
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="gambar_wisata" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <input type="file" name="gambar_wisata" id="gambar_wisata" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.wisata.index', ['id_paket' => $wisata->id_paket]) }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
                    Batal
                </a>
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