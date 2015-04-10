<?php include_once 'core/SiteConfig.php'; ?>
<section id="bottom">
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="widget">
                    <h3>Curta nossa página no Facebook</h3>
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Ftrainningchef&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px; width: 95%;" allowTransparency="true"></iframe>
                </div>    
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="widget">
                    <h3>Training Chef</h3>
                    <p>Training Chef é uma  aplicação web, com o intuito de incentivar futuros cozinheiros a
                        mostrar seu talento na arte de cozinhar, em restaurantes que adotem esta ideia inovadora.</p>
                    <p>Este é um trabalho de faculdade. Todos os dados apresentados neste site são fictícios.</p>
                    <p><a class="btn btn-info" href="quem_somos.php">Saiba mais »</a></p>
                </div>    
            </div>
        </div>
    </div>
</section>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2015 <a target="_blank" href="https://www.facebook.com/trainningchef" title="Training Chef">Training Chef</a>. Todos os direitos reservados.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <?php for ($i = 0; $i < count(SiteConfig::$MENU_PAGINAS); $i++) : ?>
                    <li>
                        <a href="<?php print SiteConfig::$MENU_PAGINAS[$i]['href']; ?>">
                            <?php print SiteConfig::$MENU_PAGINAS[$i]['desc']; ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
