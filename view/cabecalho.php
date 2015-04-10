<?php include_once './core/SiteConfig.php'; ?>
<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <?php for ($i = 0; $i < count(SiteConfig::$MENU_LINKS_SOCIAL); $i++) : ?>
                            <li>
                                <a href="<?php echo SiteConfig::$MENU_LINKS_SOCIAL[$i]['link']; ?>" target="_blank">
                                    <i class="fa fa-<?php echo SiteConfig::$MENU_LINKS_SOCIAL[$i]['name']; ?>"></i>
                                </a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="<?php print SiteConfig::$LOGOTIPO_HORIZONTAL; ?>" alt="logo" height="30">
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <?php for ($i = 0; $i < count(SiteConfig::$MENU_PAGINAS); $i++) : ?>
                    <li <?php if ($_SERVER['PHP_SELF'] == SiteConfig::$PREFIXO_ENDERECO . SiteConfig::$MENU_PAGINAS[$i]['href']) : ?>class="active"<?php endif; ?>>
                        <a href="<?php print SiteConfig::$MENU_PAGINAS[$i]['href']; ?>">
                            <?php print SiteConfig::$MENU_PAGINAS[$i]['desc']; ?>
                        </a>
                    </li>
                    <?php endfor; ?>                        
                </ul>
            </div>
        </div>
    </nav>
</header>