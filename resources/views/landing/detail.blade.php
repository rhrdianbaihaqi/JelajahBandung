@extends('layouts.landingdetail')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-white overflow-hidden">
  <!-- Layer gambar tetap tajam -->
  <div class="absolute inset-0 bg-cover bg-center -z-20" 
       style="background-image: url('{{ asset('image/' . $paket->gambar_paket) }}');">
  </div>

  <!-- Layer semi-transparan agar teks terbaca, efek gelap halus -->
  <div class="absolute inset-0 bg-black/40 -z-10"></div>

  <!-- Konten utama -->
  <div class="text-center px-4 relative">
  <!-- Background overlay untuk kontras dengan background hitam -->
  <div class="absolute inset-0 -z-10 bg-gradient-to-br from-black/70 via-black/50 to-black/30"></div>
  
  <!-- Main Content -->
  <div class="relative space-y-6 max-w-4xl mx-auto">
    <!-- Pembuka dengan animasi subtle -->
    <div class="inline-block mb-2 px-4 py-2 bg-blue-900/30 backdrop-blur-sm rounded-full border border-blue-400/30 transition-all duration-500 hover:bg-blue-900/50">
      <p class="text-blue-300 font-medium tracking-wider">PAKET WISATA EKSKLUSIF</p>
    </div>
    
    <!-- Judul utama dengan gradasi biru-metalik -->
    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-300 via-blue-200 to-white animate-text-shimmer">
        Jelajahi Bandung<br>
        <span class="text-5xl md:text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">
          {{ $paket->nama_paket }}
        </span>
      </span>
    </h1>
    
    <!-- Deskripsi dengan border animasi -->
    <div class="relative inline-block px-6 py-4 group">
      <div class="absolute inset-0 rounded-xl border-2 border-blue-400/20 group-hover:border-blue-400/40 transition-all duration-700"></div>
      <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-blue-900/10 to-black/10 backdrop-blur-sm"></div>
      <p class="text-lg md:text-xl text-blue-100/90 relative leading-relaxed">
        {{ $paket->deskripsi_paket }}
      </p>
      <div class="absolute -bottom-4 left-1/4 h-px w-1/2 bg-gradient-to-r from-transparent via-blue-400/70 to-transparent group-hover:via-blue-300 transition-all duration-500"></div>
    </div>
  </div>

  <!-- Decorations -->
  <div class="absolute top-10 left-10 w-3 h-3 rounded-full bg-blue-400/60 animate-pulse"></div>
  <div class="absolute bottom-20 right-12 w-2 h-2 rounded-full bg-blue-300/70 animate-pulse-delay"></div>
</div>
</section>

<section id="wisata" class="py-16 bg-white/70" x-data="{ tab: 'wisata' }">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4 uppercase text-black text-center">Detail Paket Wisata</h2>

    <!-- Tombol Tab -->
    <div class="flex justify-center mb-8 relative">
    <div class="absolute bottom-1 h-0.5 bg-[#3B81F6]/5 w-full rounded-full"></div>
  <div class="flex gap-1 p-1 bg-white/50 backdrop-blur-sm rounded-full border border-[#3B81F6]/20 shadow-sm relative z-10">
    <div :class="{
      'left-[0%]': tab === 'wisata',
      'left-[25%]': tab === 'jadwal',
      'left-[50%]': tab === 'fasilitas',
      'left-[75%]': tab === 'harga'
      }"
    class="absolute top-1 h-[calc(100%-0.5rem)] w-[25%] bg-[#3B81F6] rounded-full transition-all duration-300 ease-out">
    </div>

    <button 
      @click="tab = 'wisata'"
      class="relative px-6 py-2 rounded-full font-medium transition-all duration-200 z-20"
      :class="{'text-white': tab === 'wisata', 'text-[#3B81F6] hover:text-[#3B81F6]/80': tab !== 'wisata'}"
    >
      Wisata
    </button>
    
    <button 
      @click="tab = 'jadwal'"
      class="relative px-6 py-2 rounded-full font-medium transition-all duration-200 z-20"
      :class="{'text-white': tab === 'jadwal', 'text-[#3B81F6] hover:text-[#3B81F6]/80': tab !== 'jadwal'}"
    >
      Jadwal
    </button>
    
    <button 
      @click="tab = 'fasilitas'"
      class="relative px-6 py-2 rounded-full font-medium transition-all duration-200 z-20"
      :class="{'text-white': tab === 'fasilitas', 'text-[#3B81F6] hover:text-[#3B81F6]/80': tab !== 'fasilitas'}"
    >
      Fasilitas
    </button>
    
    <button 
      @click="tab = 'harga'"
      class="relative px-6 py-2 rounded-full font-medium transition-all duration-200 z-20"
      :class="{'text-white': tab === 'harga', 'text-[#3B81F6] hover:text-[#3B81F6]/80': tab !== 'harga'}"
    >
      Harga
    </button>
  </div>
</div>


    <!-- Konten Wisata -->
    <div x-show="tab === 'wisata'" x-transition>
      @if ($wisatas->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-[#3B81F6] text-center">Wisata</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
          @foreach ($wisatas as $w)
            <div class="group bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm transition duration-300 ease-in-out 
                        hover:bg-[#3B81F6] hover:border-[#3B81F6] hover:shadow-xl">
              
              <div class="overflow-hidden">
                <img src="{{ asset('image/' . $w->gambar_wisata) }}" 
                    class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" 
                    alt="Gambar {{ $w->nama_wisata }}">
              </div>

              <div class="p-5 transition duration-300 ease-in-out group-hover:text-white">
                <h4 class="font-bold text-lg text-gray-800 mb-1 group-hover:text-white transition duration-300">
                  {{ $w->nama_wisata }}
                </h4>
                <p class="text-gray-600 group-hover:text-blue-100">
                  {{ $w->deskripsi_wisata }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-10">Belum ada data wisata.</p>
      @endif
    </div>

    <!-- Konten Jadwal -->
    <div x-show="tab === 'jadwal'" x-transition>
      @if ($jadwal->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-[#3B81F6] text-center">Jadwal Kegiatan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
          @foreach ($jadwal->groupBy('hari') as $hari => $kegiatanPerHari)
            <div class="group bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:bg-[#3B81F6] hover:border-[#3B81F6] hover:shadow-xl transition duration-300">
              <h4 class="font-bold text-lg mb-2 text-gray-800 group-hover:text-white">Tour Hari Ke-{{ $hari }}</h4>
              <ul class="list-disc list-inside text-gray-600 group-hover:text-blue-100 space-y-1 transition-colors duration-300">
                @foreach ($kegiatanPerHari as $kegiatan)
                  <li>{{ $kegiatan->kegiatan }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-10">Jadwal belum tersedia.</p>
      @endif
    </div>

    <!-- Konten Fasilitas -->
    <div x-show="tab === 'fasilitas'" x-transition>
      @if ($fasilitas->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-[#3B81F6] text-center">Fasilitas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
          @foreach ($fasilitas->groupBy('included') as $included => $listFasilitas)
            <div class="group bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:bg-[#3B81F6] hover:border-[#3B81F6] hover:shadow-xl transition duration-300">
              <h4 class="font-bold text-lg mb-2 text-gray-800 group-hover:text-white">
                {{ $included ? 'Included' : 'Excluded' }}
              </h4>
              <ul class="list-disc list-inside text-gray-600 group-hover:text-blue-100 space-y-1 transition-colors duration-300">
                @foreach ($listFasilitas as $item)
                  <li>{{ $item->nama_fasilitas }}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-10">Fasilitas belum tersedia.</p>
      @endif
    </div>

      <!-- Konten Harga -->
      <div x-show="tab === 'harga'" x-transition>
        @if ($harga->isNotEmpty())
        <h3 class="text-2xl font-semibold mb-4 text-[#3B81F6] text-center">Harga</h3>
          <div class="overflow-x-auto mb-10">
            <table class="min-w-full bg-white rounded-xl shadow text-left table-fixed">
              <thead class="bg-blue-700 text-white">
                <tr>
                  <th class="w-1/2 border border-blue-700 py-3 px-6 text-center font-medium">Jumlah Peserta</th>
                  <th class="w-1/2 border border-blue-700 py-3 px-6 text-center font-medium">Harga</th>
                </tr>
              </thead>
              <tbody class="text-gray-700 divide-y divide-gray-200">
          @foreach ($harga as $h)
            <tr class="transition duration-300 hover:bg-[#3B81F6] hover:text-white hover:shadow-md">
              <td class="w-1/2 border border-[#3B81F6] py-3 px-6 text-center">
                {{ $h->peserta }} orang
              </td>
              <td class="w-1/2 border border-[#3B81F6] py-3 px-6 text-center">
                Rp {{ number_format($h->harga_per_peserta, 0) }} / pax
              </td>
            </tr>
          @endforeach
        </tbody>           
            </table>
          </div>        
        @else
          <p class="text-center text-gray-500 mb-10">Belum ada data harga.</p>
        @endif
      </div>
    </div>
  </section>

  <!-- Konten Hubungi kami -->
  <section class="relative bg-[#3B81F6]/40 py-24 overflow-hidden">
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute top-1/4 left-1/4 w-40 h-40 bg-[#3B81F6]/10 rounded-full filter blur-xl animate-float animation-delay-0"></div>
    <div class="absolute bottom-1/3 right-1/5 w-48 h-48 bg-[#3B81F6]/15 rounded-full filter blur-xl animate-float animation-delay-3000"></div>
  </div>
  <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-4 uppercase text-white">Hubungi CS Kami</h2>
    <p class="font-semibold text-white/90 mb-10">Untuk paket wisata custom dan kebutuhan lainnya.</p>

    <!-- Kotak WhatsApp dengan efek glass morphism -->
    <div class="flex justify-center transform hover:scale-[1.02] transition-transform duration-300">
    <div class="bg-[#3B81F6]/90 border border-white/20 rounded-2xl px-8 py-8 w-full max-w-md shadow-2xl backdrop-blur-lg relative overflow-hidden">

        <div class="absolute -inset-1 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="flex flex-col items-center space-y-6 relative z-10">
          <div class="p-4 rounded-full bg-gradient-to-br from-[#25D366] to-[#128C7E] shadow-lg animate-pulse-slow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 32 32" fill="currentColor">
              <path d="M16 .5C7.44.5.5 7.44.5 16c0 2.85.76 5.53 2.12 7.87L.5 31.5l7.8-2.05A15.435 15.435 0 0 0 16 31.5c8.56 0 15.5-6.94 15.5-15.5S24.56.5 16 .5zm0 28.16c-2.52 0-4.92-.67-7.05-1.93l-.5-.29-4.63 1.22 1.24-4.49-.32-.52A13.396 13.396 0 0 1 2.63 16C2.63 8.82 8.82 2.63 16 2.63c7.18 0 13.37 6.2 13.37 13.37S23.18 28.66 16 28.66zm7.34-9.5c-.4-.2-2.37-1.17-2.74-1.31s-.64-.2-.91.2-1.04 1.3-1.28 1.57-.47.3-.87.1c-2.37-1.18-3.92-2.11-5.48-4.78-.41-.7.42-.65 1.2-2.17.14-.29.07-.54-.03-.74s-.91-2.19-1.25-2.99c-.33-.8-.67-.69-.91-.7s-.49-.01-.75-.01a1.45 1.45 0 0 0-1.06.5c-.37.4-1.4 1.37-1.4 3.34s1.43 3.88 1.63 4.15 2.81 4.28 6.82 6.01c.95.41 1.7.65 2.28.83.96.3 1.84.26 2.53.16.77-.12 2.37-.97 2.7-1.91.34-.94.34-1.75.24-1.91-.09-.16-.37-.27-.77-.48z"/>
            </svg>
          </div>
          <div class="text-center space-y-2">
            <p class="text-xl font-bold text-white">Butuh Bantuan atau Custom Paket?</p>
            <p class="text-white text-sm md:text-base">
              Tim customer service kami siap membantu Anda 7 hari seminggu dari jam 8 pagi sampai 4 sore.
            </p>
          </div>
          <a href="https://wa.me/6285846687692?text=Halo%20Admin"
             target="_blank"
             class="inline-flex items-center gap-3 bg-gradient-to-r from-[#25D366] to-[#128C7E] hover:from-[#128C7E] hover:to-[#25D366] text-white font-semibold text-sm py-3 px-6 rounded-full shadow-lg transition-all duration-300 hover:shadow-[#25D366]/40 hover:scale-105 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16.999 14.113c-.291-.146-1.715-.844-1.98-.94-.265-.097-.458-.146-.65.147s-.746.939-.916 1.134c-.168.194-.337.219-.624.073-.288-.146-1.215-.448-2.316-1.428-.857-.763-1.435-1.706-1.604-1.993-.168-.29-.018-.446.127-.59.13-.13.29-.338.436-.507.146-.17.194-.291.291-.486.097-.194.049-.364-.024-.51-.073-.146-.65-1.569-.89-2.15-.235-.565-.474-.488-.65-.488h-.556c-.193 0-.508.073-.773.364-.266.292-1.017.994-1.017 2.428s1.041 2.814 1.185 3.008c.145.193 2.048 3.127 4.96 4.384.693.299 1.233.477 1.654.61.695.221 1.327.19 1.825.116.557-.084 1.715-.7 1.959-1.375.243-.675.243-1.254.17-1.375-.07-.123-.263-.194-.554-.34z"/>
            </svg>
            Chat WhatsApp Sekarang
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  @keyframes float {
    0%, 100% {
      transform: translateY(0) translateX(0);
    }
    50% {
      transform: translateY(-15px) translateX(10px);
    }
  }
  @keyframes pulse-slow {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
  }
  .animate-float {
    animation: float 8s ease-in-out infinite;
  }
  .animate-pulse-slow {
    animation: pulse-slow 3s ease-in-out infinite;
  }
  .animation-delay-0 {
    animation-delay: 0s;
  }
  .animation-delay-2000 {
    animation-delay: 2s;
  }
  .animation-delay-4000 {
    animation-delay: 4s;
  }
</style>


<section id="booking" class="py-20 bg-gradient-to-br from-blue-50 to-white relative overflow-hidden">
  <!-- Decorative elements -->
  <div class="absolute -top-20 -right-20 w-64 h-64 bg-blue-100 rounded-full opacity-20 mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
  <div class="absolute -bottom-20 -left-20 w-72 h-72 bg-blue-200 rounded-full opacity-20 mix-blend-multiply filter blur-xl animate-blob"></div>
  
  <div class="container mx-auto px-4 relative z-10">
    <div class="flex flex-col lg:flex-row items-center justify-between">
      <!-- Image with floating animation -->
      <div class="w-full lg:w-5/12 mb-10 lg:mb-0 transform hover:scale-105 transition duration-500 ease-in-out">
        <div class="relative">
          <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Happy travelers enjoying their vacation" 
               class="w-full h-auto object-cover rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-float"
               loading="lazy" />
          <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-md hidden md:block">
            <div class="flex items-center">
              <div class="bg-blue-100 p-3 rounded-full mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <p class="font-bold text-gray-800">Fast Response</p>
                <p class="text-sm text-gray-600">Under 1 hour</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form with glass morphism effect -->
      <div class="w-full lg:w-6/12 bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 lg:ml-10 border border-white/20 relative overflow-hidden">
        <!-- Decorative form element -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-blue-500/10 rounded-full filter blur-lg"></div>
        
        <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Amankan Liburanmu Sekarang!</h2>
        <p class="text-blue-800 mb-6">Isi form di bawah ini dan kami akan menghubungi Anda dalam waktu 1 jam.</p>

        <form class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="relative">
              <label class="block font-medium text-blue-800 mb-1">Nama <span class="text-red-500">*</span></label>
              <input type="text" name="name" placeholder="Contoh: Budi Santoso" required 
                     class="w-full border border-blue-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white/50" />
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            <div class="relative">
              <label class="block font-medium text-blue-800 mb-1">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" placeholder="Contoh: kamu@email.com" required 
                     class="w-full border border-blue-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white/50" />
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>
            </div>
          </div>

          <div class="relative">
            <label class="block font-medium text-blue-800 mb-1">Subjek <span class="text-red-500">*</span></label>
            <input type="text" name="subject" placeholder="Contoh: Booking Paket Tour" required 
                   class="w-full border border-blue-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white/50" />
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>

          <div>
            <label class="block font-medium text-blue-800 mb-1">Pesan</label>
            <textarea name="message" rows="4" placeholder="Contoh: Saya ingin memesan tour ke Bandung..." 
                      class="w-full border border-blue-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 bg-white/50"></textarea>
          </div>

          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <button type="submit" 
                    class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-8 py-3 rounded-full font-semibold transition duration-300 shadow-lg hover:shadow-blue-300/50 group">
              <span class="relative z-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                </svg>
                KIRIM PENDAFTARAN
              </span>
              <span class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </button>
            
            <a href="https://wa.me/6285846687692?text=Jangan%20ubah%20pesan%20ini%2C%20langsung%20kirim%20aja%20ya.%0AHai%20Admin%2C%20aku%20mau%20booking%20dan%20isi%20form%20pendaftaran." target="_blank" 
               class="inline-flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#1EBE5D] text-white px-6 py-3 rounded-full font-semibold shadow-md transition-all hover:scale-105 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16.999 14.113c-.291-.146-1.715-.844-1.98-.94-.265-.097-.458-.146-.65.147s-.746.939-.916 1.134c-.168.194-.337.219-.624.073-.288-.146-1.215-.448-2.316-1.428-.857-.763-1.435-1.706-1.604-1.993-.168-.29-.018-.446.127-.59.13-.13.29-.338.436-.507.146-.17.194-.291.291-.486.097-.194.049-.364-.024-.51-.073-.146-.65-1.569-.89-2.15-.235-.565-.474-.488-.65-.488h-.556c-.193 0-.508.073-.773.364-.266.292-1.017.994-1.017 2.428s1.041 2.814 1.185 3.008c.145.193 2.048 3.127 4.96 4.384.693.299 1.233.477 1.654.61.695.221 1.327.19 1.825.116.557-.084 1.715-.7 1.959-1.375.243-.675.243-1.254.17-1.375-.07-.123-.263-.194-.554-.34z" />
              </svg>
              WhatsApp Admin
            </a>
          </div>
        </form>
        
        <!-- Trust badges -->
        <div class="mt-6 flex flex-wrap items-center justify-center gap-4 text-blue-700 text-sm">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Respons Cepat
          </div>
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Tanpa Ribet
          </div>
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Harga Terbaik
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  @keyframes float {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }
  @keyframes blob {
    0% {
      transform: translate(0px, 0px) scale(1);
    }
    33% {
      transform: translate(30px, -50px) scale(1.1);
    }
    66% {
      transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
      transform: translate(0px, 0px) scale(1);
    }
  }
  .animate-float {
    animation: float 6s ease-in-out infinite;
  }
  .animate-blob {
    animation: blob 7s infinite;
  }
  .animation-delay-2000 {
    animation-delay: 2s;
  }
</style>

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

  @keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 0.4; }
  50% { transform: scale(1.3); opacity: 0.8; }
}

@keyframes pulse-delay {
  0%, 40% { transform: scale(1); opacity: 0.3; }
  70% { transform: scale(1.4); opacity: 0.7; }
  100% { transform: scale(1); opacity: 0.3; }
}
</style>
  @endsection