@extends('layouts.landing')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-white overflow-hidden">
  <div class="absolute inset-0 bg-cover bg-center -z-20 bg-fixed transition-all duration-1000 ease-out hover:scale-105" 
       style="background-image: url('{{ asset('image/bandung.jpeg') }}');">
    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/10 to-transparent opacity-50 animate-light-rays"></div>
  </div>
  <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/80 via-black/50 to-black/30"></div>
  <div class="text-center px-4 transform transition-transform duration-1000 hover:-translate-y-2">
    <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow-lg animate-float-text">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-white">
        Selamat Datang di<br>Jelajah Bandung
      </span>
    </h1>
    <p class="text-xl md:text-3xl max-w-2xl mx-auto leading-relaxed">
      <span class="inline-block px-6 py-3 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 shadow-lg hover:bg-white/20 transition-all duration-500 hover:shadow-xl">
        Temukan keindahan alam<br>dan budaya Bandung bersama kami
      </span>
    </p>
    <div class="absolute top-1/4 left-1/4 w-6 h-6 opacity-70">
      <svg viewBox="0 0 24 24" class="text-blue-300 animate-float-1">
        <path fill="currentColor" d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/>
      </svg>
    </div>
    <div class="absolute bottom-1/4 right-1/5 w-5 h-5 opacity-80">
      <svg viewBox="0 0 24 24" class="text-blue-200 animate-float-2">
        <path fill="currentColor" d="M12,3.2L7.1,5.1L4.7,10.6L6,12L4,22L12,19.5L20,22L18,12L19.3,10.6L16.9,5.1L12,3.2Z"/>
      </svg>
    </div>
</section>

<!-- Paket Wisata Section -->
<section id="paket-wisata" class="py-16 pt-28 scroll-mt-24 relative overflow-hidden" x-data="{ tab: '{{ \Str::slug(count($durasiList) > 0 ? $durasiList[0] : '-') }}' }">
  <!-- Background -->
  <div class="absolute inset-0 -z-10">
    <div class="w-full h-full bg-blue-300/40"></div>
  </div>

  <!-- Konten -->
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-4xl font-bold text-center mb-12">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-white via-white/80 to-white">
        Paket Wisata
      </span>
      <div class="w-24 h-1 bg-gradient-to-r from-white via-white/50 to-white/30 mx-auto mt-4 rounded-full"></div>
    </h2>


    <!-- Tombol Tab Durasi -->
    <div class="flex justify-center flex-wrap gap-3 mb-12">
      @foreach ($durasiList as $durasi)
        <button
          @click="tab = '{{ \Str::slug($durasi) }}'"
          :class="tab === '{{ \Str::slug($durasi) }}' 
            ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' 
            : 'bg-white text-blue-600 border border-blue-200 hover:border-blue-300'"
          class="px-6 py-2 rounded-full font-semibold transition-all duration-500 ease-[cubic-bezier(0.25,0.1,0.25,1)] hover:shadow-md">
          <span x-show="tab === '{{ \Str::slug($durasi) }}'" class="mr-1">✓</span>
          {{ $durasi }} Hari
        </button>
      @endforeach
    </div>

    <!-- Carousel Per Durasi -->
    @foreach ($durasiList as $durasi)
<div x-show="tab === '{{ \Str::slug($durasi) }}'" x-transition.opacity.duration.500ms>
  <div class="splide paket-slider mb-16" aria-label="Paket {{ $durasi }}">
    <div class="splide__arrows">
      <button class="splide__arrow splide__arrow--prev bg-white/80 hover:bg-white shadow-xl">
        ←
      </button>
      <button class="splide__arrow splide__arrow--next bg-white/80 hover:bg-white shadow-xl">
        →
      </button>
    </div>
    
    <div class="splide__track">
      <ul class="splide__list">
        @php
          $chunks = $paketsByDurasi[$durasi]->chunk(4);
        @endphp

        @foreach ($chunks as $chunk)
        <li class="splide__slide py-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 lg:px-8">
            @foreach ($chunk as $paket)
              @php
                $harga = $paket->hargas->first()->harga_per_peserta ?? 0;
              @endphp
              
              <!-- Professional Modern Card Design -->
              <div class="relative overflow-hidden rounded-xl shadow-lg group h-[380px] transition-all duration-500 hover:shadow-blue-500/20 hover:-translate-y-2">
                <!-- Image with Gradient Overlay -->
                <div class="absolute inset-0 z-0 overflow-hidden">
                  <img src="{{ asset('image/' . $paket->gambar_paket) }}" 
                       alt="{{ $paket->nama_paket }}"
                       class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
                </div>
                
                <!-- Content Container -->
                <div class="relative z-10 h-full flex flex-col justify-end p-6 text-white">
                  <!-- Floating Price Tag with Per Person Label -->
                  <div class="absolute top-4 right-4 bg-white/90 text-blue-600 rounded-full shadow-md overflow-hidden">
                    <div class="px-4 py-1 text-sm font-semibold text-center">
                      Start from Rp {{ number_format($harga / 1000, 0) }}K
                    </div>
                  </div>
                  
                  <!-- Package Info -->
                  <div class="transform transition-all duration-300 group-hover:-translate-y-2">
                    <h3 class="text-xl font-bold mb-2 leading-snug drop-shadow-md">
                      {{ $paket->nama_paket }}
                    </h3>
                    
                    <!-- Professional Highlights List -->
                    <ul class="text-blue-100/80 mb-4 text-sm space-y-1">
                      <li class="flex items-center">
                        <svg class="w-3 h-3 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        {{ $paket->highlight_1 ?? 'Free cancellation' }}
                      </li>
                      <li class="flex items-center">
                        <svg class="w-3 h-3 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        {{ $paket->highlight_2 ?? 'Instant confirmation' }}
                      </li>
                    </ul>
                    
                    <!-- Professional Button with Duration -->
                    <div class="flex items-center justify-between mt-3">
                      <div class="text-xs font-medium bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full">
                        ⏳ {{ $durasi }} Day
                      </div>
                      <a href="{{ route('landing.detail', ['id_paket' => $paket->id_paket]) }}"
                         class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-400 hover:to-blue-500 text-white font-medium text-sm px-4 py-2 rounded-full transition-all duration-300 transform group-hover:scale-[1.03]">
                        <span>Details</span>
                        <svg class="w-3.5 h-3.5 ml-1.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                
                <!-- Professional Hover Effects -->
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                  <div class="absolute top-0 left-0 w-0.5 h-full bg-blue-400 animate-beam"></div>
                  <div class="absolute inset-0 border border-blue-400/20 rounded-xl"></div>
                </div>

                <!-- Professional Popular Badge (Conditional) -->
                @if($paket->is_popular)
                <div class="absolute top-4 left-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-md">
                  POPULAR
                </div>
                @endif
              </div>
            @endforeach
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endforeach
  </div>
</section>
  
  

<!-- Kenapa Memilih Jelajah Bandung -->
<section class="py-20 bg-white/80 backdrop-blur-sm" id="alasan">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold mb-12">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-400">
        Kenapa Memilih Jelajah Bandung?
      </span>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-blue-200 mx-auto mt-4 rounded-full"></div>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
      <!-- Card 1 -->
      <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-blue-50 group">
        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-blue-600 group-hover:text-blue-800">Tour Guide Profesional</h3>
            <p class="text-gray-600 group-hover:text-gray-800">Tour guide berpengalaman dan ramah siap menemani perjalananmu.</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-blue-50 group">
        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-blue-600 group-hover:text-blue-800">Harga Terjangkau</h3>
            <p class="text-gray-600 group-hover:text-gray-800">Paket lengkap dengan fasilitas memadai, tanpa menguras kantong.</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-blue-50 group">
        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-blue-600 group-hover:text-blue-800">Destinasi Menarik</h3>
            <p class="text-gray-600 group-hover:text-gray-800">Kunjungi tempat populer dan hidden gem yang tak terlupakan.</p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-blue-50 group">
        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-3 text-blue-600 group-hover:text-blue-800">Pelayanan Responsif</h3>
            <p class="text-gray-600 group-hover:text-gray-800">Tim kami siap membantu dengan cepat dan profesional.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Dekorasi floating elements -->
    <div class="absolute top-1/4 left-10 w-4 h-4 rounded-full bg-blue-200/80 animate-float-3"></div>
    <div class="absolute bottom-1/3 right-10 w-3 h-3 rounded-full bg-blue-300/60 animate-float-4"></div>
  </div>
</section>


<!-- Testimoni -->
<section class="py-20 bg-gradient-to-b from-blue-50 to-white" id="testimoni">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold mb-12">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-400">
        Apa Kata Mereka?
      </span>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-blue-200 mx-auto mt-4 rounded-full"></div>
    </h2>

    @if($testimonis->count())
      <div class="splide" aria-label="Testimoni Slider">
      <div class="splide__track mb-12">
          <ul class="splide__list">
            @foreach($testimonis->chunk(4) as $chunk)
              <li class="splide__slide">
              <div class="grid grid-cols-1 md:grid-cols-2 md:grid-rows-2 gap-8 px-4">
                  @foreach($chunk as $testimoni)
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-50 group">
                      <div class="flex flex-col items-center mb-6">
                        @if($testimoni->foto)
                          <img src="{{ asset('image/testimoni/' . $testimoni->foto) }}"
                               class="w-20 h-20 rounded-full object-cover border-4 border-blue-100 shadow-md group-hover:border-blue-200 transition-all duration-300"
                               alt="Foto {{ $testimoni->nama_pengguna }}">
                        @else
                          <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-2xl font-bold border-4 border-blue-50">
                            {{ substr($testimoni->nama_pengguna, 0, 1) }}
                          </div>
                        @endif
                      </div>
                      <div class="relative">
                        <svg class="absolute -top-6 -left-2 text-blue-100 w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="mb-4 text-gray-600 group-hover:text-gray-800 italic relative z-10">"{{ $testimoni->isi }}"</p>
                        <h4 class="font-semibold text-blue-600 text-right">- {{ $testimoni->nama_pengguna }}</h4>
                        <div class="flex justify-end mt-2">
                          @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                          @endfor
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </li>
            @endforeach
          </ul>
        </div>
        
        <!-- Custom pagination -->
      </div>
    @else
      <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm max-w-2xl mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <p class="text-gray-500 text-lg">Belum ada testimoni. Jadilah yang pertama memberikan ulasan!</p>
      </div>
    @endif
  </div>
</section>

<!-- Kontak Kami -->
<section id="kontak" class="relative py-20 bg-gradient-to-br from-blue-600 to-blue-800 scroll-mt-24 text-white overflow-hidden">
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-20">
    <div class="absolute top-20 left-1/4 w-40 h-40 bg-white rounded-full filter blur-xl animate-float animation-delay-0"></div>
    <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-white rounded-full filter blur-xl animate-float animation-delay-3000"></div>
  </div>
  
  <div class="relative max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-12 items-start z-10">
    <div class="lg:col-span-2 flex flex-col md:flex-row items-center md:items-start gap-8">
      <div class="shrink-0 relative group">
        <div class="absolute inset-0 bg-white/10 rounded-full transform group-hover:scale-110 transition duration-500"></div>
        <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Jelajah Bandung" 
             class="w-40 h-40 object-contain relative z-10 transform transition duration-500 group-hover:scale-105">
      </div>
      <div class="space-y-5 text-center md:text-left">
        <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
          PT. JELAJAH BANDUNG
        </h3>
        
        <div class="space-y-4">
          <p class="flex items-start gap-3 justify-center md:justify-start">
            <span class="bg-white/10 p-2 rounded-full inline-flex">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
              </svg>
            </span>
            <span class="text-white/90 hover:text-white transition">Jl. Braga No. 10, Bandung</span>
          </p>
          
          <p class="flex items-center gap-3 justify-center md:justify-start">
            <span class="bg-white/10 p-2 rounded-full inline-flex">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.72 11.72 0 003.69.59 1 1 0 011 1v3.5a1 1 0 01-1 1A16 16 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.69 1 1 0 01-.24 1.01l-2.2 2.2z"/>
              </svg>
            </span>
            <a href="tel:085846687692" class="text-white/90 hover:text-white transition">0858-4668-7692</a>
          </p>
          
          <p class="flex items-center gap-3 justify-center md:justify-start">
            <span class="bg-white/10 p-2 rounded-full inline-flex">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4a2 2 0 00-2 2v1.8l10 6.2 10-6.2V6a2 2 0 00-2-2zm0 4.2l-8 5-8-5V18a2 2 0 002 2h12a2 2 0 002-2V8.2z"/>
              </svg>
            </span>
            <a href="mailto:info@jelajahbandung.com" class="text-white/90 hover:text-white transition">info@jelajahbandung.com</a>
          </p>
        </div>
      </div>
    </div>
    <div class="text-center space-y-6">
      <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
        Hubungi Kami
      </h3>
      
      <div class="flex flex-col items-center space-y-4">
        <a href="https://wa.me/6285846687692" target="_blank"
           class="relative overflow-hidden inline-flex items-center gap-3 bg-[#25D366] hover:bg-[#128C7E] text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all duration-300 hover:shadow-[#25D366]/40 hover:scale-105 group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
            <path d="M16.999 14.113c-.291-.146-1.715-.844-1.98-.94-.265-.097-.458-.146-.65.147s-.746.939-.916 1.134c-.168.194-.337.219-.624.073-.288-.146-1.215-.448-2.316-1.428-.857-.763-1.435-1.706-1.604-1.993-.168-.29-.018-.446.127-.59.13-.13.29-.338.436-.507.146-.17.194-.291.291-.486.097-.194.049-.364-.024-.51-.073-.146-.65-1.569-.89-2.15-.235-.565-.474-.488-.65-.488h-.556c-.193 0-.508.073-.773.364-.266.292-1.017.994-1.017 2.428s1.041 2.814 1.185 3.008c.145.193 2.048 3.127 4.96 4.384.693.299 1.233.477 1.654.61.695.221 1.327.19 1.825.116.557-.084 1.715-.7 1.959-1.375.243-.675.243-1.254.17-1.375-.07-.123-.263-.194-.554-.34z"/>
          </svg>
          WhatsApp
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
        
        <a href="tel:085846687692" 
           class="relative overflow-hidden inline-flex items-center gap-3 bg-white/10 hover:bg-white/20 text-white font-semibold py-3 px-8 rounded-full border border-white/30 shadow-lg transition-all duration-300 hover:shadow-white/20 hover:scale-105 group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
          </svg>
          Telepon
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      </div>
    </div>
  </div>
  <div class="relative mt-16 pt-6 text-center text-sm text-white/80 before:absolute before:top-0 before:left-1/2 before:-translate-x-1/2 before:w-32 before:h-px before:bg-gradient-to-r before:from-transparent before:via-white/50 before:to-transparent">
    &copy; {{ date('Y') }} PT. Jelajah Bandung. All rights reserved.
  </div>
</section>

<style>
  /* Animasi tambahan */
  @keyframes float-3 {
    0%, 100% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(-15px) translateX(10px); }
  }
  @keyframes float-4 {
    0%, 100% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(10px) translateX(-15px); }
  }

  .animate-float-3 {
    animation: float-3 8s ease-in-out infinite;
    animation-delay: 1s;
  }
  .animate-float-4 {
    animation: float-4 10s ease-in-out infinite;
    animation-delay: 2s;
  }
  @keyframes float {
    0%, 100% {
      transform: translateY(0) translateX(0);
    }
    50% {
      transform: translateY(-15px) translateX(10px);
    }
  }
  .animate-float {
    animation: float 8s ease-in-out infinite;
  }
  .animation-delay-0 {
    animation-delay: 0s;
  }
  .animation-delay-3000 {
    animation-delay: 3s;
  }
  /* Animations */
  @keyframes light-rays {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
  }
  @keyframes float-text {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  @keyframes float-1 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(15px, 10px) rotate(5deg); }
  }
  @keyframes float-2 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-10px, 15px) rotate(-5deg); }
  }

  /* Animation classes */
  .animate-light-rays {
    animation: light-rays 20s linear infinite;
    background-size: 200% 200%;
    transform-origin: center center;
  }
  .animate-float-text {
    animation: float-text 6s ease-in-out infinite;
  }
  .animate-float-1 {
    animation: float-1 8s ease-in-out infinite;
  }
  .animate-float-2 {
    animation: float-2 10s ease-in-out infinite;
    animation-delay: 2s;
  }

  /* Custom styles */
  .text-shadow-lg {
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  }
  .bg-fixed {
    background-attachment: fixed;
  }

  /* Custom splide arrow */
  .splide__arrow {
    background: #3B81F6 !important;
    opacity: 1 !important;
    width: 40px !important;
    height: 40px !important;
  }
  .splide__arrow svg {
    fill: white !important;
  }
  .splide__pagination__page {
    background: #BFDBFE !important;
    width: 12px !important;
    height: 12px !important;
    margin: 0 6px !important;
  }
  .splide__pagination__page.is-active {
    background: #3B81F6 !important;
    transform: scale(1.2) !important;
  }

  .animate-beam {
    animation: beam 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  
  @keyframes beam {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
  }
  
  .paket-slider .splide__arrow {
    width: 3rem;
    height: 3rem;
    opacity: 0.9;
    transition: all 0.3s ease;
  }
  
  .paket-slider .splide__arrow:hover {
    transform: scale(1.1);
    opacity: 1;
  }
  
  .paket-slider .splide__arrow--prev {
    left: -1.5rem;
  }
  
  .paket-slider .splide__arrow--next {
    right: -1.5rem;
  }

  #testimoni .splide__pagination {
    bottom: -2rem; 
  }
  #testimoni .splide__pagination__page {
    background: #a5b4fc; /* Warna dot tidak aktif (biru muda) */
    opacity: 0.8;
  }
  
  #testimoni .splide__pagination__page.is-active {
    background: #4f46e5; /* Warna dot aktif (biru tua) */
    transform: scale(1.2);
    opacity: 1;
  }
</style>
@endsection
