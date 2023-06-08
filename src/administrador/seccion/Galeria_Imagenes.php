<?php include("../template/cabecera.php");?>

<div class="container">
        <?php
        $imageDirectory = '../../../img/condominios//';
        $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $rowCount = 0;

        foreach ($images as $index => $image) {
            if ($rowCount % 3 === 0) {
                echo '<div class="row">';
            }

            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<a href="' . $image . '" class="lightbox-link">';
            echo '<img class="card-img-top" src="' . $image . '" alt="Imagen ' . ($index + 1) . '">';
            echo '</a>';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">Condominio ' . ($index + 1) . '</h4>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            if ($rowCount % 3 === 2) {
                echo '</div>';
            }

            $rowCount++;
        }

        if ($rowCount % 3 !== 0) {
            echo '</div>';
        }
        ?>
    </div>

    <script src="../../js/lightbox.js"></script>

<?php include("../template/pie.php");?>



<!-- 

<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
             <img src="../img/condominios/cond-1.jpg" class="rounded mx-auto d-block imagen-inicio" alt="nombre">
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <img src="../img/condominios/cond-2.jpg" class="rounded mx-auto d-block imagen-inicio" alt="nombre">
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <img src="../img/condominios/cond-4.jpg" class="rounded mx-auto d-block imagen-inicio" alt="nombre">
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

 --> 