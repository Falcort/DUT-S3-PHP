<!--
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

<?php
//On importe diaporama pour l'afficher et ne pas dupliquer le code
require_once(PATH_VUE . 'diaporama.php');
?>
<h3>Ajouter un image</h3>
<!-- form pour ajouter une image, le encrypte="....." est dans le cas d'un upload de fichier -->
<form action="index.php?page=modifier_script" enctype="multipart/form-data" method="POST">
    <input class="form-control" name="file" type="file">
    <!-- Ici on peut voir que le name est file c'est comme ca que l'on va le select avec le php-->
    <button name="btn_submit" value="ajouter" type="submit" class="btn btn-default">Envoyer Fichier</button>
    <!-- le name et value sont expliqués dans le modifier_script.php-->
</form>
<h3>Modifier un image</h3>
<table class="table">
    <tr>
        <th></th>
        <th>Ordre Image</th>
        <th>Nom ficihier</th>
        <th>Titre Image</th>
        <th>description</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach ($diapositives as $diapositive) {
        // Pour chaque diapo on affiche une form
        // Les seules choses à dire sont que les inputs doivent avoir comme valeur par défaut ce qui est en base de donnée
        // Et pour une valeur par défaut on utilise l'attribut value=""
        // Dans le cas d'un textarea pour mettre un texte par défaut on met <textarea>XXXXX</textarea>
        ?>
        <tr>
            <form action="index.php?page=modifier_script" method="POST">
                <input name="id" value="<?php echo $diapositive ['id']; ?>" style="display: none;">
                <th style="max-width: 100px; height: auto;"><img
                            src="<?php echo PATH_IMAGES . $diapositive ['nom_fichier']; ?>"
                            style="max-width: 100px; height: auto;"></th>
                <th><input name="ordre" class="form-control" value="<?php echo $diapositive ['ordre']; ?>"></th>
                <th><?php echo $diapositive ['nom_fichier']; ?></th>
                <th><input name="titre" class="form-control" value="<?php echo $diapositive ['titre']; ?>"></th>
                <th><textarea name="description"
                              class="form-control"><?php echo $diapositive ['description']; ?></textarea></th>
                <th>
                    <button name="btn_submit" value="modifier" type="submit" class="btn btn-default">Modifier</button>
                </th>
                <th>
                    <button name="btn_submit" value="supprimer" type="submit" class="btn btn-default">Supprimer</button>
                </th>
            </form>
        </tr>
    <?php } ?>
</table>
