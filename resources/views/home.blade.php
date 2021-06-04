<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel | @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
      <body id="body">
    <div class="container">
      <header>
        <div class="card">
          <div class="header">
            <a href="{{ route('/')}}">GAMEINFO</a>
            <nav>
              <a href="{{ route('/')}}">HOME</a>
              <a href="{{ route('/profile') }}">PROFILE</a>
              <a href="{{ route('/listapp') }}">LIST APP</a>
              <div class="switch-btn">
                <label class="switch">
                  <input type="checkbox" id="checkbtn" />
                  <span class="slider round"></span>
                </label>
              </div>
            </nav>
          </div>
        </div>
      </header>
      <section>
        <div class="left">
          <div class="card">
            <div class="list-menu">
              <ul>
                <li>ACTION</li>
                <li>ADVENTURE</li>
                <li>MMORPG</li>
                <li>MOBA</li>
                <li>FPS</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="main">
         @yield('content')
        </div>

        <div class="right">
          <div class="card">
            <input type="text" class="search-box" placeholder="Search ..." />
            <p class="popular-post">Popular Post</p>
            <div class="popular-post-cotent">
              <p class="popular-post-title">
                Upcoming Game Release: April 2021
              </p>
              <p class="popular-post-subtext">
                Setelah melewati masa manis di bulan Maret 2021, industri game
                akan menghadapi bulan yang tidak kalah menariknya di bulan April
                2021 ini.
              </p>
              <div class="divider"></div>
              <p class="popular-post-title">
                Belum 1 Minggu Rilis, Hitman 3 Balik Modal
              </p>
              <p class="popular-post-subtext">
                Dalam waktu belum 1 minggu rilis, Hitman 3 tidak hanya sudah
                balik modal saja, tetapi sudah mendatangkan keuntungan untuk IO
                Interactive yang memang berperan sebagai publisher mereka
                sendiri kali ini.
              </p>
              <div class="divider"></div>
              <p class="popular-post-title">
                Update 1.2 Cyberpunk 2077 Perbaiki 500 Hal, Ray-Tracing untuk
                AMD
              </p>
              <p class="popular-post-subtext">
                CD Projekt Red akhirnya merilis patch notes untuk Patch 1.2
                Cyberpunk 2077 yang akan memperbaiki setidaknya 500 hal di dalam
                game action RPG ini.
              </p>
            </div>
          </div>
        </div>
      </section>
      <footer>
        <div class="footer-content">
          <div class="footer-left">
            <p>GAMEINFO</p>
            <p class="pt-20">
              website seputar info game selalu terupdate dan terbaik di dunia
            </p>
          </div>
          <div class="footer-main">
            <p>Category</p>
            <div class="category">
              <p>ACTION</p>
              <p>ADVENTURE</p>
              <p>MMORPG</p>
              <p>MOBA</p>
            </div>
          </div>
          <div class="footer-rigth">
            <p>FOLLOW</p>
            <div class="category">
              <p>INSTAGRAM</p>
              <p>YOUTUBE</p>
              <p>TIKTOK</p>
            </div>
          </div>
        </div>
        <div class="copyright">&copy Copyright 2021 - GAMEINFO</div>
      </footer>
    </div>
    @stack('script')
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
