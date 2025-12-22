@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Testimoni</h1>
        <p class="text-sm text-gray-500">
            Memperbarui ulasan dari pengguna: 
            <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                {{ $testimoni->nama_pengguna }}
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
        <form action="{{ route('admin.testimoni.update', $testimoni) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                {{-- Input Nama --}}
                <div>
                    <label for="nama_pengguna" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Pengguna <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" 
                        value="{{ old('nama_pengguna', $testimoni->nama_pengguna) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        required>
                </div>

                {{-- Input Isi --}}
                <div>
                    <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">
                        Isi Testimoni <span class="text-red-500">*</span>
                    </label>
                    <textarea name="isi" id="isi" rows="4" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        required>{{ old('isi', $testimoni->isi) }}</textarea>
                </div>

                <div class="border-t border-gray-100 pt-6"></div>

                {{-- Area Foto --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                    {{-- Preview Foto Lama --}}
                    <div class="col-span-1 text-center md:text-left">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                        @if($testimoni->foto)
                            <div class="inline-block relative">
                                <img src="{{ asset('image/testimoni/' . $testimoni->foto) }}" alt="Foto Lama" class="w-24 h-24 object-cover rounded-full border-4 border-gray-50 shadow-sm mx-auto md:mx-0">
                                {{-- Badge indikator ada foto --}}
                                <span class="absolute bottom-0 right-0 bg-green-500 border-2 border-white rounded-full w-5 h-5 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </span>
                            </div>
                        @else
                            <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center border-2 border-dashed border-gray-300 mx-auto md:mx-0">
                                <span class="text-xs text-gray-400">No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Input Foto Baru --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition bg-gray-50/50">
                            <div class="space-y-1 text-center w-full">
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <input type="file" name="foto" id="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah foto.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.testimoni.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
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