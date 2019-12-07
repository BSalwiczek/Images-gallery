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

  <section class="section">
      <h1 style="color: #4CBB17">
        <?php
        if(isset($code))
        {
          if($code == 200)
            echo 'Zdjęcie zostało dodane! Przejdź do galerii aby je obejrzeć';
        }
        ?>
      </h1>
  </section>

  <section class="container">
    <h1>Podziel się swoim zdjęciem</h1>
    <em>Zaloguj się aby móc zarządzać wysyłanymi zdjęciami i o wiele więcej!</em>

    <form method="post" action="/zapisz-zdjecie" enctype="multipart/form-data">
      <div style="display: flex;justify-content:center;margin-top: 3%">
        <div style="text-align: center">
        <label for="name"><i>Tytuł &nbsp;&nbsp;</i></label><input type="text" id="title" name="title"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No title', $errors))
            echo '<div style="text-align: center; color: red">Podaj tytuł zdjęcia</div><br />';
        ?>
        <label for="surname"><i>Autor: &nbsp;&nbsp;</i></label><input type="text" id="author" name="author"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No author', $errors))
            echo '<div style="text-align: center; color: red">Podaj autora zdjęcia</div><br />';
        ?>
        <label for="surname"><i>Znak wodny: &nbsp;&nbsp;</i></label><input type="text" id="watermark" name="watermark"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No watermark', $errors))
            echo '<div style="text-align: center; color: red">Podaj znak wodny do zdjęcia</div><br />';
        ?>
        <label for="image"></label><input type="file" id="image" name="image"><br /><br />
        <?php
        if(isset($errors)){
          if(in_array('No image', $errors))
            echo '<div style="text-align: center; color: red">Dodaj zdjęcie</div><br />';
          else{
            if(in_array('Bad extension', $errors))
              echo '<div style="text-align: center; color: red">Złe rozszerzenie pliku (dopuszczalne tylko jpg lub png)</div><br />';
            if(in_array('Too big image', $errors))
              echo '<div style="text-align: center; color: red">Wysłane zdjęcie przekroczyło 1Mb</div><br />';
          }

        }

        ?>

        <button class="btn">Wyślij zdjęcie!</button>
        </div>
      </div>
    </form>
  </section>

  <?php include_once('includes/footer.php') ?>

  <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
  <script src="web/scripts/expanded-menu.js"></script>

</body>
</html>
