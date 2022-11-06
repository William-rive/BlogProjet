<nav class="navbar">
        <a href="/?page=home" class="logo">Mon Blog</a>
        <div class="nav_links">
            <ul>
                <li><a href="/?page=article">Article</a></li>
                <li><a href="/?page=contact">Contact</a></li>
                <li class="user_connexion">
                    <?php if (isset($_SESSION["user_is_connected"]) && $_SESSION["user_is_connected"]) { ?>
                        <a href="/?page=user_disconnect">Déconnexion</a>
                        <?php }else { ?>
                            <a href="/?page=user_connexion">Connexion</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <i class="fa-solid fa-bars fa-2xl menu-hamburger"></i>
</nav>