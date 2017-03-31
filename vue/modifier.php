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
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
            <?php
            $i = $i+1;
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
<h3>Ajouter un image</h3>
<form>
    <input class="form-control" type="file">
    <button class="btn btn-default">Envoyer Fichier</button>
</form>
<h3>Modifier un image</h3>
<table class="table">
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
        <form action="index.php?php=modifier_script?id=<? echo $diapositive ['id'] ?>" method="POST">
            <th style="max-width: 100px; height: auto;"><img src="<?php echo PATH_IMAGES . $diapositive ['nom_fichier']; ?>" style="max-width: 100px; height: auto;"></th>
            <th><input name="ordre" class="form-control" placeholder="<?php echo $diapositive ['ordre']; ?>"></th>
            <th><?php echo $diapositive ['nom_fichier']; ?></th>
            <th><input name="tritre" class="form-control" placeholder="<?php echo $diapositive ['titre']; ?>"></th>
            <th><textarea name="description" class="form-control" placeholder="<?php echo $diapositive ['description']; ?>"></textarea></th>
            <th><button class="btn btn-default">Modifier</button></th>
            <th><button class="btn btn-default">Supprimer</button></th>
        </form>
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
