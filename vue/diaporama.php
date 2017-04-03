<!--
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */
-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        //On parcours toutes les diapo et pour chacune on affiche cette ligne pour la diapo
        foreach ($diapositives as $diapositive) {
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $diapositive['ordre']; ?>"
                id="<?php echo $diapositive['ordre']; ?>"></li>
            <?php
        }
        ?>
    </ol>

    <div class="carousel-inner" role="listbox">

        <?php
        //Idem on parcoures les slides
        foreach ($diapositives as $diapositive) {
            // on cherche le fichier qui a l'odre 1 et on sauvgarde dans $active
            if ($diapositive['ordre'] == 1) {
                $active = $diapositive['id'];
            }

            //En dessou pour chaque dispo on insert ces lignes
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
<script>
    // Ici c'est du JS c'est pour que le slide marche
    // De base il n'y a pas de 'image "active" ou afficher
    // On active donc le carousel
    //On active l'image avec l'odre 1 sauvgarder dans $active precedement
    $('.carousel').carousel()
    $("#<?php echo $active ?>").addClass("active");
    $("#1").addClass("active");
</script>
