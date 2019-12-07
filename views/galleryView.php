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



  <section class="images-gallery">
    <h1 style="text-align: center;padding: 1.5% 0">Galeria zdjęć umieszczonych przez użytkowników</h1>
    <?php
    foreach($images as $img){
      echo '<div class="image-gallery-container">
                <img class="gallery-img" name="'.$img['url'].'" src="storage/images/thumbnail/'.$img['url'].'"/>
              <div class="image-description">
              <h3>'.$img['title'].'</h3>
              <em>
              Autor: '.$img['author'].'
              </em>
              </div>
            </div>';
    }
    echo "<div style=\"clear:both\"></div>"
    ?>
    <div id="gallery">
      <div class="arrows">
        <i class="fas fa-arrow-left"></i>
        <i class="fas fa-arrow-right"></i>
      </div>
    </div>
  </section>

  <section>
    <div class="pagination">
      <?php
      if($pagination['all_pages'] > 1)
      {
        foreach(range(1,$pagination['all_pages']) as $page_num)
        {
          if($page_num == $pagination['current_page'])
          {
            echo '<a class="page-number page-active" href="/?page='.$page_num.'">
              '.$page_num.'
            </a>';
          }else{
            echo '<a class="page-number" href="/?page='.$page_num.'">
              '.$page_num.'
            </a>';
          }
        }
      }
      ?>
    </div>
  </section>

  <?php include_once('includes/footer.php') ?>

  <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
  <script src="web/scripts/gallery.js"></script>
  <script src="web/scripts/expanded-menu.js"></script>

</body>
</html>
