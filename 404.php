<!DOCTYPE html>
<html lang="en">
    <?php include 'view/head.php'; ?>
    <body>
        <?php include 'view/cabecalho.php'; ?>
        <section id="error" class="container text-center">
            <h1>Ops, essa página não existe meu amigo :/</h1>
            <a class="btn btn-primary" href="index.php">Volte para a página inicial</a>
        </section>
        
        <?php include 'view/rodape.php'; ?>

        <script src="view/js/jquery.js"></script>
        <script type="text/javascript">
            $('.carousel').carousel()
        </script>
        <script src="view/js/bootstrap.min.js"></script>
        <script src="view/js/jquery.prettyPhoto.js"></script>
        <script src="view/js/jquery.isotope.min.js"></script>
        <script src="view/js/main.js"></script>
        <script src="view/js/wow.min.js"></script>
    </body>
</html>