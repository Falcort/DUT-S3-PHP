<?php
require_once(PATH_VUE . 'header.php');
require_once(PATH_VUE . 'diaporama.php');
?>
<h3>Ajouter un image</h3>
<form action="index.php?page=modifier_script" enctype="multipart/form-data" method="POST">
    <input class="form-control" name="file" type="file">
    <button name="btn_submit" value="ajouter" type="submit" class="btn btn-default">Envoyer Fichier</button>
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
        <form action="index.php?page=modifier_script" method="POST">
            <input name="id" value="<?php echo $diapositive ['id']; ?>" style="display: none;">
            <th style="max-width: 100px; height: auto;"><img src="<?php echo PATH_IMAGES . $diapositive ['nom_fichier']; ?>" style="max-width: 100px; height: auto;"></th>
            <th><input name="ordre" class="form-control" value="<?php echo $diapositive ['ordre']; ?>"></th>
            <th><?php echo $diapositive ['nom_fichier']; ?></th>
            <th><input name="titre" class="form-control" value="<?php echo $diapositive ['titre']; ?>"></th>
            <th><textarea name="description" class="form-control"><?php echo $diapositive ['description']; ?></textarea></th>
            <th><button name="btn_submit" value="modifier" type="submit" class="btn btn-default">Modifier</button></th>
            <th><button name="btn_submit" value="supprimer" type="submit" class="btn btn-default">Supprimer</button></th>
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
