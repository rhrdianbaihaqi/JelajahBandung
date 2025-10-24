<!DOCTYPE html>
<html lang="en">
<head>
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
  </style>  
</head>
<body class="bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('image/bandung.jpg') }}');">
  <!-- Navbar -->
  <nav class="bg-gradient-to-b from-white/95 to-white/80 shadow fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <!-- Logo dan Judul -->
      <a href="#" class="flex items-center space-x-2">
        <img src="{{ asset('image/jelajah-bandung.png') }}" alt="Logo Jelajah Bandung" class="w-11 h-11 object-cover">
        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-blue-400 pl-4">Jelajah Bandung</span>
      </a>
      
      <!-- Menu -->
      <ul class="flex space-x-6">
        <li><a href="{{ route('landing.home') }}" class="hover:text-blue-600 font-semibold">Home</a></li>
        <li><a href="#visi-misi" class="hover:text-blue-600 font-semibold">Visi Misi</a></li>
        <li><a href="#produk" class="hover:text-blue-600 font-semibold">Produk Kami</a></li>
        <li><a href="#kontak" class="hover:text-blue-600 font-semibold">Kontak</a></li>
        <li><a href="{{ route('landing.tentang') }}" class="hover:text-blue-600 font-semibold">Tentang Kami</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="relative z-10">
    @yield('content')
  </main>

  <!-- Flowise Chatbot Embed -->
  <script type="module">
  import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
  Chatbot.init({
    chatflowid: "9138bf20-f034-4f5f-a24d-e6b3224bc998",
    apiHost: "https://flowise.helpyou.id",

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
        welcomeMessage: 'Halo! Selamat datang di layanan informasi Jelajah Bandung 😊',
        errorMessage: 'Oops! Terjadi kesalahan.',
        backgroundColor: '#ffffff',
        height: 540,
        width: 360,
        fontSize: 14,
        fontFamily: 'Inter, sans-serif',
        starterPrompts: [
          "Apa saja pilihan paket wisata?",
          "Bagaimana cara melakukan booking?"
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
  <!-- Splide JS -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.paket-slider').forEach(slide => {
        new Splide(slide, {
          perPage: 1,
          gap: '1rem',
          pagination: true,
          arrows: true,
        }).mount();
      });

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
</body>
</html>
