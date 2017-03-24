<?php
require_once(PATH_VUE.'header.php');
?>

<div class="slideshow-container">

<?php
foreach ($diapositives as $diapositive ){
?>
	<div class="mySlides fade">
  		<div class="numbertext">1 / 3</div>
  		<img src="<?php echo PATH_IMAGES.$diapositive ['nom_fichier'];  ?>" style="width:100%">
  		<div class="text">Caption Text</div>
	</div>
<?php
}
?>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
<?php
require_once (PATH_VUE.'footer.php');
?>

  <script src="<?php echo PATH_SCRIPT.'slider.js'; ?>"></script>
