<?php
require_once(PATH_VUE.'header.php');
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

<?php
foreach ($diapositives as $diapositive ){
?>
	<div id="<?php echo $diapositive ['id']; ?>" class="item">
      <img src="<?php echo PATH_IMAGES.$diapositive ['nom_fichier'];  ?>" alt="...">
      <div class="carousel-caption">
		<h3><?php echo $diapositive ['titre'];  ?></h3>
        <p><?php echo $diapositive ['description'];  ?><p>
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
<?php
require_once (PATH_VUE.'footer.php');
?>
<script>
$('.carousel').carousel()
$("#1").addClass("active");
</script>
