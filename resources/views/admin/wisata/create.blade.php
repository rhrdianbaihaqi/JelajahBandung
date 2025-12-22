@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Destinasi Wisata</h1>
        <p class="text-sm text-gray-500">
            Menambahkan lokasi baru untuk paket: 
            <span class="font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100">
                {{ $paket->nama_paket }}
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
        <form action="{{ route('admin.wisata.store', ['id_paket' => $paket->id_paket]) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            
            <div class="space-y-6">
                {{-- Input Nama Wisata --}}
                <div>
                    <label for="nama_wisata" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Wisata <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_wisata" id="nama_wisata" value="{{ old('nama_wisata') }}" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        placeholder="Contoh: Pantai Kuta, Candi Borobudur..." required>
                </div>

                {{-- Input Deskripsi --}}
                <div>
                    <label for="deskripsi_wisata" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Wisata <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="4" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        placeholder="Jelaskan daya tarik lokasi ini..." required>{{ old('deskripsi_wisata') }}</textarea>
                </div>

                {{-- Select Paket Wisata --}}
                <div>
                    <label for="id_paket" class="block text-sm font-medium text-gray-700 mb-2">
                        Paket Wisata Terkait <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="id_paket" id="id_paket" 
                            class="w-full appearance-none rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4 pr-8 bg-gray-50 text-gray-700">
                            @foreach ($pakets as $p)
                                <option value="{{ $p->id_paket }}" {{ $p->id_paket == $paket->id_paket ? 'selected' : '' }}>
                                    {{ $p->nama_paket }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Input Gambar --}}
                <div>
                    <label for="gambar_wisata" class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Wisata <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition bg-gray-50/50">
                        <div class="space-y-1 text-center w-full">
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="gambar_wisata" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <input type="file" name="gambar_wisata" id="gambar_wisata" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" required>
                                </label>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, JPEG (Max 2MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                {{-- Tombol Batal mengarah ke daftar wisata paket tersebut --}}
                <a href="{{ route('admin.wisata.index', ['id_paket' => $paket->id_paket]) }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
                    Batal
                </a>
                <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Simpan Wisata
                </button>
            </div>
        </form>
    </div>
</div>
@endsection