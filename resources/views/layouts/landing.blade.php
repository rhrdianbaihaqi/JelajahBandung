<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <meta name="theme-color" content="#2563eb">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="apple-mobile-web-app-title" content="Jelajah Bandung">

  <link rel="apple-touch-icon" href="{{ asset('icons/icon-192.png') }}">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jelajah Bandung</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Splide CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
  <style>
    html {
      scroll-behavior: smooth;
    }
    .splide__arrow--prev {
      left: -2rem;
    }

    .splide__arrow--next {
      right: -2rem;
    }
  </style>  
</head>
<body class="bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('image/bandung.jpg') }}');">
  <!-- Navbar -->
  <!-- Navbar -->
  <nav class="bg-gradient-to-b from-white/95 to-white/80 shadow fixed w-full z-50 transition-all duration-300" x-data="{ isOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)" :class="{ 'bg-white/95 shadow-md': scrolled, 'bg-white/80': !scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">
        <!-- Logo dan Judul -->
        <a href="/tentang" class="flex items-center space-x-3 group">
          <div class="relative overflow-hidden rounded-full p-1 transition-transform duration-300 transform group-hover:scale-110">
            <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Logo Jelajah Bandung" class="w-10 h-10 object-cover">
          </div>
          <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-blue-400 group-hover:from-blue-600 group-hover:to-blue-300 transition-all duration-300">Jelajah Bandung</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8 items-center">
          <a href="{{ route('landing.home') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 relative group">
            Home
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
          </a>
          <a href="#paket-wisata" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 relative group">
            Paket Wisata
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
          </a>
          <a href="#testimoni" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 relative group">
            Testimoni
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
          </a>
          <a href="#kontak" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 relative group">
            Kontak
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
          </a>
          <a href="{{ route('landing.tentang') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 relative group">
            Tentang Kami
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
          <button @click="isOpen = !isOpen" type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none transition-colors duration-200" aria-label="Toggle menu">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="isOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-white/95 backdrop-blur-md shadow-lg border-t border-gray-100 absolute w-full left-0 z-40">
      <div class="flex flex-col px-4 pt-2 pb-6 space-y-2">
        <a href="{{ route('landing.home') }}" @click="isOpen = false" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50/50 rounded-lg transition-all duration-200 flex items-center space-x-2">
           <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
           <span>Home</span>
        </a>
        <a href="#paket-wisata" @click="isOpen = false" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50/50 rounded-lg transition-all duration-200 flex items-center space-x-2">
           <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
           <span>Paket Wisata</span>
        </a>
        <a href="#testimoni" @click="isOpen = false" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50/50 rounded-lg transition-all duration-200 flex items-center space-x-2">
           <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
           <span>Testimoni</span>
        </a>
        <a href="#kontak" @click="isOpen = false" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50/50 rounded-lg transition-all duration-200 flex items-center space-x-2">
           <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
           <span>Kontak</span>
        </a>
        <a href="{{ route('landing.tentang') }}" @click="isOpen = false" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50/50 rounded-lg transition-all duration-200 flex items-center space-x-2">
           <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
           <span>Tentang Kami</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="relative z-10">
    @yield('content')
  </main>

  <!-- Splide JS -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

      // Filter tombol
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
          document.querySelectorAll('.paket-slider').forEach(s => s.classList.add('hidden'));
          const target = this.dataset.target;
          document.querySelector(target).classList.remove('hidden');
          document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-rose-600');
            b.classList.add('bg-sky-600');
          });
          this.classList.remove('bg-sky-600');
          this.classList.add('bg-rose-600');
        });
      });

      // Init semua splide slider
      document.querySelectorAll('.paket-slider').forEach(slide => {
        new Splide(slide, {
          perPage: 1,
          gap: '1rem',
          pagination: true,
          arrows: true,
        }).mount();
      });

      document.querySelectorAll('.splide').forEach(slide => {
        new Splide(slide, {
          type: 'loop',
          perPage: 1,
          autoplay: true,
          interval: 5000,
          pagination: true,
          arrows: true,
        }).mount();
      });
    });
  </script>

  <!-- Flowise Chatbot Embed -->
  <script type="module">
  import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
  Chatbot.init({
    chatflowid: "68691e03-6061-44eb-9644-1402c0e19bc6",
    apiHost: "https://cloud.flowiseai.com",

    theme: {
      button: {
        backgroundColor: '#3B81F6',
        right: 20,
        bottom: 20,
        size: 60,
        dragAndDrop: true,
        iconColor: 'white',
        customIconSrc: "{{ asset('image/hubot-svgrepo-com.svg') }}",
        autoWindowOpen: {
          autoOpen: true,
          openDelay: 2,
          autoOpenOnMobile: false
        }
      },
      tooltip: {
        showTooltip: true,
        tooltipMessage: 'Halo! Ada yang bisa kami bantu? 👋',
        tooltipBackgroundColor: '#3B81F6',
        tooltipTextColor: '#ffffff',
        tooltipFontSize: 16
      },
      disclaimer: {
        title: 'Disclaimer',
        message: "Dengan menggunakan chatbot ini, Anda setuju dengan <a target=\"_blank\" href=\"https://flowiseai.com/terms\">Ketentuan Layanan</a>",
        textColor: '#303235',
        buttonColor: '#3B81F6',
        buttonText: 'Mulai Chat',
        buttonTextColor: '#ffffff',
        blurredBackgroundColor: 'rgba(0, 0, 0, 0.4)',
        backgroundColor: '#ffffff'
      },
      chatWindow: {
        showTitle: true,
        title: 'Jelajah Bandung Bot',
        welcomeMessage: "Halo! 👋 Selamat datang di Jelajah Bandung. Saya siap membantu kamu menemukan paket wisata dan informasi liburan di Bandung 😊",
        errorMessage: 'Oops! Terjadi kesalahan.',
        backgroundColor: '#ffffff',
        height: 540,
        width: 360,
        fontSize: 14,
        fontFamily: 'Inter, sans-serif',
        starterPrompts: [
          "Alamat kantor Jelajah Bandung?",
          "Jam operasional Jelajah Bandung?"
        ],
        botMessage: {
          backgroundColor: '#f1f5f9', // biru soft, enak di mata
          textColor: '#1e293b', // biru gelap
          showAvatar: true,
          avatarSrc: "{{ asset('image/jelajah-bandung.jpg') }}",
          borderRadius: 18, // bubble lebih soft
          padding: '12px 16px'
        },
        userMessage: {
          backgroundColor: '#3B81F6',
          textColor: '#ffffff',
          showAvatar: true,
          avatarSrc: "https://raw.githubusercontent.com/zahidkhawaja/langchain-chat-nextjs/main/public/usericon.png",
          borderRadius: 18,
          padding: '12px 16px'
        },
        textInput: {
          placeholder: 'Ketik pertanyaan Anda...',
          backgroundColor: '#ffffff',
          textColor: '#303235',
          sendButtonColor: '#3B81F6',
          maxChars: 100,
          autoFocus: true,
          fontSize: 14,
          fontFamily: 'Inter, sans-serif'
        },
        footer: {
          textColor: '#6b7280',
          text: 'Powered by',
          company: 'Jelajah Bandung',
          companyLink: 'https://flowiseai.com'
        }
      }
    }
  })
</script>
  <script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('/service-worker.js')
        .then(reg => console.log('Service Worker aktif:', reg.scope))
        .catch(err => console.error('Service Worker gagal:', err));
    });
  }
</script>
</body>
</html>
