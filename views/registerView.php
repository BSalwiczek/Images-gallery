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
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="styles/gallery.css">
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
            echo 'Udana rejestracja! Przejdź do formularza logowania aby się zalogować';
        }
        ?>
      </h1>
  </section>

  <section class="container">
    <h1>Zarejestruj się</h1>

    <form method="post" action="/zarejestruj" enctype="multipart/form-data">
      <div style="display: flex;justify-content:center;margin-top: 3%">
        <div style="text-align: center">
        <label for="name"><i>Email &nbsp;&nbsp;</i></label><input type="text" id="email" name="email"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No email', $errors))
            echo '<div style="text-align: center; color: red">Podaj email</div><br />';
        ?>
        <label for="name"><i>Login &nbsp;&nbsp;</i></label><input type="text" id="login" name="login"><br /><br />
        <?php
        if(isset($errors))
        {
          if(in_array('No login', $errors))
            echo '<div style="text-align: center; color: red">Podaj login</div><br />';
          if(in_array('Login exists', $errors))
            echo '<div style="text-align: center; color: red">Podany login jest już zajęty</div><br />';
        }

        ?>
        <label for="surname"><i>Hasło: &nbsp;&nbsp;</i></label><input type="password" id="password" name="password"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No password', $errors))
            echo '<div style="text-align: center; color: red">Podaj hasło</div><br />';
        ?>
        <label for="surname"><i>Powtórz Hasło: &nbsp;&nbsp;</i></label><input type="password" id="password2" name="password2"><br /><br />
        <?php
        if(isset($errors))
          if(in_array('No password2', $errors))
            echo '<div style="text-align: center; color: red">Powtórz hasło</div><br />';
        ?>
        <?php
        if(isset($errors))
          if(in_array('No match', $errors))
            echo '<div style="text-align: center; color: red">Podane hasła nie są takie same</div><br />';
        ?>

        <button class="btn">Rejestracja</button>
        </div>
      </div>
    </form>
  </section>

  <?php include_once('includes/footer.php') ?>

  <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
  <script src="scripts/expanded-menu.js"></script>

</body>
</html>
