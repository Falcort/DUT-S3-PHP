<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="?page=index"><?php echo TITRE_ACCUEIL ?></a></li>
        <li><a href="?page=page">WHAT</a></li>
        <li><a href="#">WHERE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <form method="POST" action="index.php?page=login">
              <input type="text" placeholder="<?php echo LOGIN_NAME; ?>" name="login" />
              <input type="password" placeholder="Mot de passe" name="password" />
              <button type="submit" value="OK">Connexion</button>
          </form>
      </ul>
    </div>
  </div>
</nav>
