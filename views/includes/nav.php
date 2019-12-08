<nav>
  <div class="nav-item <?php if($nav_active == 0) echo "nav-active" ?>">
    <a href="/"><i class="fas fa-home"></i> &nbsp;Galeria zdjęć</a>
  </div>
  <div class="nav-item <?php if($nav_active == 1) echo "nav-active" ?>">
    <a href="/dodaj-zdjecie"><i class="fas fa-image"></i> &nbsp;Prześlij zdjęcie</a>
  </div>
  <div class="nav-item <?php if($nav_active == 4) echo "nav-active" ?>">
    <a href="/polubione-zdjecia"><i class="fas fa-images"></i> &nbsp;Polubione zdjęcia</a>
  </div>
  <div class="nav-item <?php if($nav_active == 5) echo "nav-active" ?>">
    <a href="/wyszukiwarka"><i class="fas fa-search"></i> &nbsp;Wyszukiwarka</a>
  </div>
  <!-- <div class="nav-item expand">
    <a href="#!" id="expanded-link"><i class="fas fa-long-arrow-alt-down"></i> &nbsp;Ciekawe tematy</a>
    <div class="expand-menu">
        <a href="solarSystem.html"><i class="fas fa-sun"></i> &nbsp;Układ Słoneczny</a>
        <a href="astronomicalEvents.html"><i class="fas fa-calendar-alt"></i> &nbsp;Najbliższe wydarzenia astronomiczne</a>
    </div>
  </div>
  <div class="nav-item">
    <a href="contact.html"><i class="fas fa-envelope-open-text"></i> &nbsp;Kontakt</a>
  </div> -->

  <?php
  if (!isset($_SESSION['username'])){
    echo '<div class="nav-item ';
    if($nav_active == 2) echo "nav-active";
    echo '">
      <a href="/logowanie"><i class="fas fa-sign-in-alt"></i> &nbsp;Logowanie</a>
    </div>';
    echo '<div class="nav-item ';
    if($nav_active == 3) echo "nav-active";
    echo '">
      <a href="/rejestracja"><i class="fas fa-plus-circle"></i> &nbsp;Rejestracja</a>
    </div>';
  }else{
    echo '<div class="nav-item">
      <a href="/wyloguj"><i class="fas fa-sign-out-alt"></i> &nbsp;Wylogowywanie</a>
    </div>';
  }
  ?>
</nav>
