<?php include("template/cabecera.php");?>

<div class="container">
        <?php
        $imageDirectory = '../img/condominios//';
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

    <script src="js/lightbox.js"></script>

<?php include("template/pie.php");?>
