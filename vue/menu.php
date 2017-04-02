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
                <?php
                if (!isset($_SESSION['logged']) && !isset($_SESSION['user'])) {
                    ?>
                    <form method="POST" action="index.php?page=login">
                        <input type="text" placeholder="<?php echo LOGIN_NAME; ?>" name="login"/>
                        <input type="password" placeholder="Mot de passe" name="password"/>
                        <button type="submit" value="OK">Connexion</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <form method="POST" action="index.php?page=deco">
                        Bonjour <?php echo $_SESSION['user']; ?>
                        <button type="submit" value="OK">Déconnexion</button>
                    </form>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
