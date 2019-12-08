<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Strona o moim hobby - astronomii">
  <meta name="keywords" content="Astronomia, astrofizyka, pasja, hobby">
  <meta name="author" content="Bartosz Salwiczek">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strona główna</title>
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Cabin&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="web/styles/style.css">
  <link rel="stylesheet" type="text/css" href="web/styles/gallery.css">
  <script src="https://kit.fontawesome.com/50926e5c21.js" crossorigin="anonymous"></script>
</head>
<body lang="pl">

  <?php include_once('includes/nav.php') ?>

  <div class="img-container">
      <header>
        Astronomia
      </header>
      <img class="main-img" src="storage/img/header-img.jpg" />
  </div>

  <h1 style="text-align: center;padding: 1% 0; margin-bottom: 0">Wyszukaj zdjęcie
    <i class="fas fa-search" style="font-size: 1em; opacity: 0.5; margin-left: 0.4%"></i>
  </h1>

  <div style="width: 100%; margin-bottom: 3%; display: flex; justify-content:center">
    <input style="width: 20%" placeholder="Tu wpisz tytuł" type="text" id="search" name="search" />
  </div>

  <section class="images-gallery">
    <div style='text-align:center'>Brak wyników</div>
  </section>
  <div style="clear:both"></div>
  <div id="gallery">
    <div class="arrows">
      <i class="fas fa-arrow-left"></i>
      <i class="fas fa-arrow-right"></i>
    </div>
  </div>

  <?php include_once('includes/footer.php') ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="web/scripts/search.js"></script>
  <script src="web/scripts/gallery.js"></script>
  <script src="web/scripts/expanded-menu.js"></script>

</body>
</html>
