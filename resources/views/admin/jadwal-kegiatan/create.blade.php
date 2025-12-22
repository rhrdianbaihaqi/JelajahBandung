@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Kegiatan Baru</h1>
        <p class="text-sm text-gray-500">
            Menambahkan rincian itinerary untuk paket: 
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

        {{-- Pesan Sukses --}}
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 m-6 mb-0 rounded-r flex items-center">
            <svg class="h-5 w-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>
            <p class="text-sm text-green-700">{{ session('success') }}</p>
        </div>
        @endif

        {{-- Form Start --}}
        <form action="{{ route('admin.jadwal.store', $paket->id_paket) }}" method="POST" class="p-8">
            @csrf
            
            <div class="space-y-6">
                {{-- Input Hari --}}
                <div>
                    <label for="hari" class="block text-sm font-medium text-gray-700 mb-2">
                        Hari Ke- <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="hari" id="hari" min="1" max="{{ $paket->durasi_paket }}" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        placeholder="Contoh: 1" required>
                    <p class="mt-1 text-xs text-gray-500">
                        Paket ini berdurasi <strong>{{ $paket->durasi_paket }} hari</strong>. Masukkan angka antara 1 sampai {{ $paket->durasi_paket }}.
                    </p>
                </div>

                {{-- Input Kegiatan --}}
                <div>
                    <label for="kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Kegiatan <span class="text-red-500">*</span>
                    </label>
                    {{-- Menggunakan Textarea agar lebih rapi untuk teks panjang, tetap berfungsi sama dengan input text --}}
                    <textarea name="kegiatan" id="kegiatan" rows="3" 
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition shadow-sm py-2.5 px-4" 
                        placeholder="Contoh: Penjemputan di Bandara, Check-in Hotel, dan Makan Malam..." required></textarea>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.jadwal.index', $paket->id_paket) }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium transition shadow-sm">
                    Batal
                </a>
                <button type="submit" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection