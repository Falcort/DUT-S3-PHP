<?php
require_once(PATH_VUE . 'header.php');
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        foreach ($diapositives as $diapositive) {
            $i = 0;
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="active"></li>
            <?php
        }
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <?php
        foreach ($diapositives as $diapositive) {
            ?>
            <div id="<?php echo $diapositive ['id']; ?>" class="item">
                <img src="<?php echo PATH_IMAGES . $diapositive ['nom_fichier']; ?>" alt="...">
                <div class="carousel-caption">
                    <h3><?php echo $diapositive ['titre']; ?></h3>
                    <p><?php echo $diapositive ['description']; ?><p>
                </div>
            </div>
            <?php
        }
        ?>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<table>
    <tr>
        <th></th>
        <th>Ordre Image</th>
        <th>Nom ficihier</th>
        <th>Titre Image</th>
        <th>description</th>
        <th></th>
        <th></th>
    </tr>
<?php
foreach ($diapositives as $diapositive) {
    ?>
    <tr>
        <th><img src="<?php echo PATH_IMAGES . $diapositive ['nom_fichier']; ?>" style="max-width: 10%; height: auto;"></th>
        <th><input placeholder="<?php echo PATH_IMAGES . $diapositive ['ordre']; ?>"></th>
        <th><?php echo $diapositive ['nom_fichier']; ?></th>
        <th><input placeholder="<?php echo $diapositive ['titre']; ?>"></th>
        <th><textarea placeholder="<?php echo $diapositive ['description']; ?>"></textarea></th>
        <th><button>Modifier</button></th>
        <th><button>Supprimer</button></th>
    </tr>
<?php } ?>
</table>
    <?php
    require_once(PATH_VUE . 'footer.php');
    ?>
    <script>
        $('.carousel').carousel()
        $("#1").addClass("active");
    </script>
