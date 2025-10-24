@extends('layouts.tentang')

@section('content')
<section class="pt-32 pb-20 bg-gradient-to-b from-white to-blue-50/20">
  <div class="max-w-5xl mx-auto px-4">
    <!-- Header with floating effect and gradient -->
    <div class="text-center mb-16 transform transition-all duration-500 hover:scale-[1.01]">
      <span class="inline-block mb-3 text-blue-500 font-semibold tracking-wider uppercase text-sm bg-blue-50 px-3 py-1 rounded-full shadow-inner">TENTANG KAMI</span>
      <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 leading-tight">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-blue-500">
          Menjelajahi Keindahan Bandung <br>Bersama Kami
        </span>
      </h1>
      <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-blue-300 mx-auto rounded-full transform transition-all duration-500 hover:scale-x-110"></div>
    </div>

    <!-- Logo with shine effect -->
    <div class="flex justify-center mb-16 group">
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-100/40 to-blue-200/20 rounded-full blur-lg group-hover:opacity-80 transition-all duration-700 animate-pulse"></div>
        <img src="{{ asset('image/jelajah-bandung.png') }}" 
             alt="Jelajah Bandung" 
             class="w-50 h-auto max-w-4xl object-cover relative z-10 transform transition duration-700 group-hover:scale-105 group-hover:rotate-1 drop-shadow-lg">
      </div>
    </div>

    <!-- Content with animated borders -->
    <div class="prose prose-lg max-w-none text-gray-700">
      <p class="relative pl-6 before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-gradient-to-b from-blue-300 to-blue-200 before:rounded-full before:transition-all before:duration-500 hover:before:w-2 hover:before:from-blue-400 hover:before:to-blue-300">
        <strong class="text-blue-700 font-semibold">Jelajah Bandung</strong> adalah mitra perjalanan Anda untuk menemukan pengalaman tak terlupakan di Kota Kembang. Sejak 2015, kami telah menghubungkan wisatawan dengan keindahan alam dan budaya lokal melalui layanan profesional.
      </p>

      <p class="relative pl-6 before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-gradient-to-b from-blue-300 to-blue-200 before:rounded-full before:transition-all before:duration-500 hover:before:w-2 hover:before:from-blue-400 hover:before:to-blue-300">
        Dengan tim pemandu lokal yang berpengalaman, kami menyajikan petualangan autentik mulai dari wisata alam, kuliner, hingga warisan budaya. Setiap perjalanan dirancang untuk memberikan kesan mendalam tentang keindahan Bandung.
      </p>

      <p class="relative pl-6 before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-gradient-to-b from-blue-300 to-blue-200 before:rounded-full before:transition-all before:duration-500 hover:before:w-2 hover:before:from-blue-400 hover:before:to-blue-300">
        Jelajahi berbagai <a href="{{ url('/#paket-wisata') }}" class="text-blue-600 font-medium hover:text-blue-800 transition-colors duration-300 underline decoration-2 decoration-blue-300 hover:decoration-blue-500 underline-offset-4">pilihan paket wisata</a> kami yang dapat disesuaikan dengan kebutuhan kelompok, keluarga, atau perjalanan romantis.
      </p>
    </div>

    <!-- Visi Misi with animated cards -->
    <div id="visi-misi" class="mt-20 scroll-mt-32">
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Visi Card -->
        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 border border-blue-100 hover:border-blue-200 group relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative z-10">
            <div class="flex items-center mb-6">
              <div class="bg-gradient-to-br from-blue-100 to-blue-50 p-3 rounded-full mr-4 group-hover:from-blue-200 group-hover:to-blue-100 transition-all duration-500 shadow-inner">
                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2L4.5 20.29L5.21 21L12 18L18.79 21L19.5 20.29L12 2z"/>
                </svg>
              </div>
              <h2 class="text-2xl font-bold text-blue-700 group-hover:text-blue-800 transition-colors duration-300">Visi Kami</h2>
            </div>
            <p class="text-gray-700 leading-relaxed pl-4 border-l-2 border-blue-200 group-hover:border-blue-400 transition-all duration-500 group-hover:text-gray-800">
              Menjadi penyelenggara wisata terdepan di Jawa Barat yang menghadirkan pengalaman autentik, berkelanjutan, dan mengedukasi melalui kekayaan alam dan budaya Bandung.
            </p>
          </div>
        </div>
        
        <!-- Misi Card -->
        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 border border-blue-100 hover:border-blue-200 group relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          <div class="relative z-10">
            <div class="flex items-center mb-6">
              <div class="bg-gradient-to-br from-blue-100 to-blue-50 p-3 rounded-full mr-4 group-hover:from-blue-200 group-hover:to-blue-100 transition-all duration-500 shadow-inner">
                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 3.2L7.1 5.1L4.7 10.6L6 12L4 22L12 19.5L20 22L18 12L19.3 10.6L16.9 5.1L12 3.2z"/>
                </svg>
              </div>
              <h2 class="text-2xl font-bold text-blue-700 group-hover:text-blue-800 transition-colors duration-300">Misi Kami</h2>
            </div>
            <ul class="space-y-3 pl-4 border-l-2 border-blue-200 group-hover:border-blue-400 transition-all duration-500">
              <li class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Menyajikan pengalaman wisata berkualitas dengan harga kompetitif</span>
              </li>
              <li class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Mempromosikan destinasi lokal yang belum banyak dikenal</span>
              </li>
              <li class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Mendukung ekonomi kreatif lokal melalui kolaborasi dengan UMKM</span>
              </li>
              <li class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Menerapkan praktik wisata berkelanjutan dan ramah lingkungan</span>
              </li>
              <li class="flex items-start group-hover:translate-x-1 transition-transform duration-300">
                <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700 group-hover:text-gray-800 transition-colors duration-300">Menyediakan platform digital yang memudahkan perencanaan perjalanan</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Produk Kami Section -->
    <div id="produk" class="mt-24 scroll-mt-32">
  <div class="text-center mb-12">
    <span class="inline-block mb-2 text-blue-500 font-semibold tracking-wider uppercase text-sm bg-blue-50 px-3 py-1 rounded-full transition-all duration-300 hover:bg-blue-100 hover:text-blue-600">LAYANAN KAMI</span>
    <h2 class="text-3xl font-bold text-center mb-4 text-gray-800 transition-all duration-500 hover:text-blue-600">
      Jelajahi Bandung Dengan Cara Terbaik
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto transition-all duration-500 hover:text-gray-800">Berbagai pilihan layanan wisata untuk pengalaman terbaik di Bandung</p>
  </div>

  <div class="grid md:grid-cols-3 gap-6">
    <!-- Layanan 1 -->
    <div class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
      <div class="h-40 overflow-hidden relative">
        <img src="{{ asset('image/tour-package.jpg') }}" 
             alt="Paket Wisata" 
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-all duration-500"></div>
        <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-medium px-2 py-0.5 rounded-full shadow-md">Populer</span>
      </div>
      <div class="p-5">
        <div class="flex items-center mb-2">
          <div class="bg-blue-100 p-2 rounded-full mr-3 transition-all duration-500 group-hover:bg-blue-200 group-hover:scale-110">
            <svg class="w-5 h-5 text-blue-600 transition-all duration-500 group-hover:text-blue-700" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-800 transition-all duration-500 group-hover:text-blue-600">Paket Wisata</h3>
        </div>
        <p class="text-gray-600 text-sm transition-all duration-500 group-hover:text-gray-800 mb-3">Tur lengkap mengunjungi destinasi populer Bandung dengan pemandu profesional</p>
        <div class="flex flex-wrap gap-1">
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">Full-day Tour</span>
          <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">Pemandu Profesional</span>
        </div>
      </div>
    </div>
    
    <!-- Layanan 2 -->
    <div class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
      <div class="h-40 overflow-hidden relative">
        <img src="{{ asset('image/culinary-tour.jpg') }}" 
             alt="Wisata Kuliner" 
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-all duration-500"></div>
        <span class="absolute top-4 right-4 bg-green-600 text-white text-xs font-medium px-2 py-0.5 rounded-full shadow-md">Terbaru</span>
      </div>
      <div class="p-5">
        <div class="flex items-center mb-2">
          <div class="bg-blue-100 p-2 rounded-full mr-3 transition-all duration-500 group-hover:bg-blue-200 group-hover:scale-110">
            <svg class="w-5 h-5 text-blue-600 transition-all duration-500 group-hover:text-blue-700" fill="currentColor" viewBox="0 0 24 24">
              <path d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 21.99V21h15.03v.99c0 .55-.45 1-1.01 1H2.01c-.56 0-1.01-.45-1.01-1zm15.03-7c0-8-15.03-8-15.03 0h15.03zM1.02 17h15v2h-15z"/>
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-800 transition-all duration-500 group-hover:text-blue-600">Wisata Kuliner</h3>
        </div>
        <p class="text-gray-600 text-sm transition-all duration-500 group-hover:text-gray-800 mb-3">Jelajahi cita rasa khas Bandung melalui tempat makan terbaik</p>
        <div class="flex flex-wrap gap-1">
          <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2 py-0.5 rounded">10+ Makanan</span>
          <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded">Local Expert</span>
        </div>
      </div>
    </div>
    
    <!-- Layanan 3 -->
    <div class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
      <div class="h-40 overflow-hidden relative">
        <img src="{{ asset('image/transportation.jpg') }}" 
             alt="Transportasi Wisata" 
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-all duration-500"></div>
        <span class="absolute top-4 right-4 bg-purple-600 text-white text-xs font-medium px-2 py-0.5 rounded-full shadow-md">24/7</span>
      </div>
      <div class="p-5">
        <div class="flex items-center mb-2">
          <div class="bg-blue-100 p-2 rounded-full mr-3 transition-all duration-500 group-hover:bg-blue-200 group-hover:scale-110">
            <svg class="w-5 h-5 text-blue-600 transition-all duration-500 group-hover:text-blue-700" fill="currentColor" viewBox="0 0 24 24">
              <path d="M18 18H6V6h12v12zM6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2zm4 5h4v2h-4V9z"/>
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-800 transition-all duration-500 group-hover:text-blue-600">Transportasi</h3>
        </div>
        <p class="text-gray-600 text-sm transition-all duration-500 group-hover:text-gray-800 mb-3">Layanan transportasi nyaman untuk keliling Bandung</p>
        <div class="flex flex-wrap gap-1">
          <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-0.5 rounded">Beragam Armada</span>
          <span class="bg-pink-100 text-pink-800 text-xs font-medium px-2 py-0.5 rounded">WiFi Gratis</span>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- Kontak Kami Section -->
<section id="kontak" class="py-20 bg-gradient-to-br from-blue-800 to-blue-900 scroll-mt-24 text-white relative overflow-hidden">
  <div class="absolute inset-0 bg-[url('{{ asset('image/texture.png') }}')] opacity-10"></div>
  <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-blue-800/40"></div>
  
  <div class="max-w-7xl mx-auto px-4 relative z-10">
    <div class="text-center mb-16 transform transition-all duration-500 hover:scale-[1.01]">
      <span class="inline-block mb-3 text-blue-300 font-semibold tracking-wider uppercase text-sm bg-blue-700/30 px-3 py-1 rounded-full shadow-inner">HUBUNGI KAMI</span>
      <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">
          Siap Membantu Perjalanan Anda
        </span>
      </h2>
      <p class="text-blue-100 max-w-2xl mx-auto">Tim kami siap menjawab pertanyaan dan membantu merencanakan petualangan Bandung Anda</p>
    </div>

    <div class="grid md:grid-cols-3 gap-12 items-start">
      <!-- Contact Info -->
      <div class="md:col-span-2 bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-white/20 transition-all duration-500 shadow-lg hover:shadow-xl">
        <div class="flex flex-col md:flex-row gap-8">
          <div class="shrink-0">
            <div class="bg-white/20 p-4 rounded-xl border border-white/20 transform transition duration-500 hover:rotate-1 hover:scale-105">
              <img src="{{ asset('image/jelajah-bandung.png') }}" 
                   alt="Jelajah Bandung" 
                   class="w-32 h-32 object-contain">
            </div>
          </div>
          
          <div class="space-y-6">
            <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">PT. Jelajah Bandung</h3>
            
            <div class="space-y-4">
              <div class="flex items-start gap-4 group">
                <div class="bg-white/20 p-2 rounded-full mt-0.5 group-hover:bg-blue-500/50 transition-colors duration-300">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-blue-100 group-hover:text-white transition-colors duration-300">Kantor Kami</h4>
                  <p class="text-blue-50 group-hover:text-blue-100 transition-colors duration-300">Jl. Braga No. 10, Bandung, Jawa Barat</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4 group">
                <div class="bg-white/20 p-2 rounded-full mt-0.5 group-hover:bg-blue-500/50 transition-colors duration-300">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-blue-100 group-hover:text-white transition-colors duration-300">Email</h4>
                  <p class="text-blue-50 group-hover:text-blue-100 transition-colors duration-300">info@jelajahbandung.com</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4 group">
                <div class="bg-white/20 p-2 rounded-full mt-0.5 group-hover:bg-blue-500/50 transition-colors duration-300">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-blue-100 group-hover:text-white transition-colors duration-300">Telepon</h4>
                  <p class="text-blue-50 group-hover:text-blue-100 transition-colors duration-300">(+62) 858 4668 7692</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4 group">
                <div class="bg-white/20 p-2 rounded-full mt-0.5 group-hover:bg-blue-500/50 transition-colors duration-300">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-blue-100 group-hover:text-white transition-colors duration-300">Jam Operasional</h4>
                  <p class="text-blue-50 group-hover:text-blue-100 transition-colors duration-300">Senin - Jumat: 08.00 - 17.00 WIB</p>
                  <p class="text-blue-50 group-hover:text-blue-100 transition-colors duration-300">Sabtu: 08.00 - 15.00 WIB</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Button -->
      <div class="text-center space-y-6">
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-white/20 transition-all duration-500 h-full shadow-lg hover:shadow-xl">
          <h3 class="text-xl font-bold mb-6">Mulai Percakapan</h3>
          <a href="https://wa.me/6285846687692" target="_blank" 
             class="inline-flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 hover:scale-105 w-full mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16.999 14.113c-.291-.146-1.715-.844-1.98-.94-.265-.097-.458-.146-.65.147s-.746.939-.916 1.134c-.168.194-.337.219-.624.073-.288-.146-1.215-.448-2.316-1.428-.857-.763-1.435-1.706-1.604-1.993-.168-.29-.018-.446.127-.59.13-.13.29-.338.436-.507.146-.17.194-.291.291-.486.097-.194.049-.364-.024-.51-.073-.146-.65-1.569-.89-2.15-.235-.565-.474-.488-.65-.488h-.556c-.193 0-.508.073-.773.364-.266.292-1.017.994-1.017 2.428s1.041 2.814 1.185 3.008c.145.193 2.048 3.127 4.96 4.384.693.299 1.233.477 1.654.61.695.221 1.327.19 1.825.116.557-.084 1.715-.7 1.959-1.375.243-.675.243-1.254.17-1.375-.07-.123-.263-.194-.554-.34z"/>
            </svg>
            WhatsApp
          </a>
          
          <a href="mailto:info@jelajahbandung.com" 
             class="inline-flex items-center justify-center gap-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 hover:scale-105 w-full">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            Email Kami
          </a>
        </div>
        
        <!-- Social Media -->
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:border-white/20 transition-all duration-500 shadow-lg hover:shadow-xl">
          <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
          <div class="flex justify-center space-x-4">
            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-blue-600 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
              </svg>
            </a>
            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-purple-400 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
              </svg>
            </a>
            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-blue-400 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
              </svg>
            </a>
            <a href="#" class="bg-white/20 p-3 rounded-full hover:bg-red-500 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="mt-16 pt-8 text-center text-sm text-white/60 border-t border-white/10">
      &copy; {{ date('Y') }} PT. Jelajah Bandung. All rights reserved.
    </div>
  </div>
</section>
@endsection