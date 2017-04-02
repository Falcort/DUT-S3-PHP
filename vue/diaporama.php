<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        foreach ($diapositives as $diapositive) {
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $diapositive['ordre']; ?>"
                id="<?php echo $diapositive['ordre']; ?>"></li>
            <?php
        }
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <?php
        foreach ($diapositives as $diapositive) {
            if ($diapositive['ordre'] == 1) {
                $active = $diapositive['id'];
            }
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
    $('.carousel').carousel()
    $("#<?php echo $active ?>").addClass("active");
    $("#1").addClass("active");
</script>
