@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Header Section dengan Tombol Logout --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Dashboard Overview</h2>
            <p class="text-sm text-gray-500">Selamat datang kembali di panel admin.</p>
        </div>
        
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="group flex items-center gap-2 bg-white border border-red-200 text-red-600 hover:bg-red-50 hover:border-red-300 px-5 py-2.5 rounded-lg shadow-sm transition-all duration-200 font-medium text-sm">
                <span>Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
            </button>
        </form>
    </div>

    {{-- Welcome Banner (Hero) --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-lg mb-10 text-white">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Halo, Admin!</h1>
            <p class="text-blue-100 text-lg max-w-2xl">
                Silakan pilih menu di bawah ini atau gunakan sidebar untuk mengelola konten website Anda.
            </p>
        </div>
        {{-- Hiasan background --}}
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10 blur-2xl"></div>
        <div class="absolute bottom-0 right-20 w-32 h-32 rounded-full bg-blue-400 opacity-20 blur-xl"></div>
    </div>

    {{-- Akses Cepat (Hanya menampilkan menu yang sudah memiliki Logic/Route) --}}
    <h3 class="text-lg font-bold text-gray-800 mb-4">Menu Kelola Data</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        {{-- Card Link ke Paket Wisata --}}
        <a href="{{ route('admin.paket-wisata.index') }}" class="group block p-6 bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    {{-- Icon Map --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                    </svg>
                </div>
                <span class="text-gray-400 group-hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600">Paket Wisata</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola daftar paket, jadwal, fasilitas, dan harga.</p>
        </a>

        {{-- Card Link ke Testimoni --}}
        <a href="{{ route('admin.testimoni.index') }}" class="group block p-6 bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                    {{-- Icon Chat --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </div>
                <span class="text-gray-400 group-hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600">Testimoni</h3>
            <p class="text-gray-500 text-sm mt-1">Lihat dan kelola ulasan dari pengguna.</p>
        </a>

    </div>
@endsection