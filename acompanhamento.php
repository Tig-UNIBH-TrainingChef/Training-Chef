<!DOCTYPE html>
<html lang="en">
    <?php include 'view/head.php'; ?>
    <body>
        <?php include 'view/cabecalho.php'; ?>
        <section id="about-us">
            <div class="container">
                <div class="center wow fadeInDown">
                    <h2>Progresso de construção do projeto Training Chef</h2>
                    <p class="lead">O <b>Training Chef</b> ainda está em fase de desenvolvimento. Acompanhe por aqui o 
                        progresso de desenvolvimento das partes pendentes.</p>
                </div>
                <div class="center wow fadeInDown">
                    <h3>Sistema interno para cozinheiros:</h3>
                    <progress class="barra_progresso" max="100" value="16"></progress><br><br><br>
                    <h3>Sistema interno para restaurantes:</h3>
                    <progress class="barra_progresso" max="100" value="0"></progress><br><br><br><br><br>
                    <p>
                        Para maiores detalhes, acesse a página de Milestones do GitHub do projeto: 
                        <a href="https://github.com/Tig-UNIBH-TrainingChef/Training-Chef/milestones" target="_blank">
                            https://github.com/Tig-UNIBH-TrainingChef/Training-Chef/milestones
                        </a>
                    </p>
                </div>
            </div>
        </section>
        
        <?php include 'view/rodape.php'; ?>

        <script src="view/js/jquery.js"></script>
        <script type="text/javascript">
            $('.carousel').carousel();
        </script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.prettyPhoto.js"></script>
        <script src="view/js/jquery.isotope.min.js"></script>
        <script src="view/js/main.js"></script>
        <script src="view/js/wow.min.js"></script>
    </body>
</html>