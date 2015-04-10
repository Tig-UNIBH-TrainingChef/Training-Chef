<?php
include_once 'core/SiteConfig.php';
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="view/images/perfil/find_user.png" class="user-image img-responsive"/>
            </li>
            <?php for ($i = 0; $i < count(SiteConfig::$MENU_PAGINAS); $i++) : ?>
            <li>
                <a <?php if ($_SERVER['PHP_SELF'] == SiteConfig::$PREFIXO_ENDERECO . SiteConfig::$MENU_PAGINAS[$i]['href']) : ?>class="active-menu"<?php endif; ?> href="<?php print SiteConfig::$MENU_PAGINAS[$i]['href']; ?>">
                    <?php print SiteConfig::$MENU_PAGINAS[$i]['desc']; ?>
                </a>
            </li>
            <?php endfor; ?>
        </ul>

    </div>

</nav>