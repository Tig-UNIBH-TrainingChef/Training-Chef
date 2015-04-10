<?php

include_once 'core/SiteConfig.php';

$arraySlider = array(
    0 => array(
        'background-image' => 'view/images/slide/slide01.png',
        'title'            => 'Onde cozinheiros encontram restaurantes',
        'text'             => 'para mostrarem as suas habilidades na cozinha',
        'button'           => 'Saber mais',
        'image'            => 'view/images/logotipo_quadrada.png'
    ),
    1 => array(
        'background-image' => 'view/images/slide/slide02.png',
        'title'            => 'Possibilidade de viver um dia de "mestre cuca"',
        'text'             => 'em um restaurante de verdade',
        'button'           => 'Saber mais',
        'image'            => 'view/images/logotipo_quadrada.png'
    ),
    2 => array(
        'background-image' => 'view/images/slide/slide03.png',
        'title'            => 'O que você está esperando para participar?',
        'text'             => 'Faça seu cadastro agora!',
        'button'           => 'Cadastrar',
        'image'            => 'view/images/logotipo_quadrada.png'
    )
);     


?>

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($arraySlider); $i++) : ?>
            <li data-target="#main-slider" data-slide-to="<?php print $i; ?>" <?php if ($i == 0) : ?>class="active"<?php endif; ?>></li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($arraySlider); $i++) : ?>
            <div class="item<?php if ($i == 0) : ?> active<?php endif; ?>" style="background-image: url(<?php print $arraySlider[$i]['background-image']; ?>)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1"><?php print $arraySlider[$i]['title']; ?></h1>
                                <h2 class="animation animated-item-2"><?php print $arraySlider[$i]['text']; ?></h2>
                                <a class="btn-slide animation animated-item-3" href="#"><?php print $arraySlider[$i]['button']; ?></a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="<?php print $arraySlider[$i]['image']; ?>" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section>