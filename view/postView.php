<?php
    require('../controllers/controller.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Exemple de template-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Accueil </title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="../css/freelancer.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
         <!-- NAVIGATION-- >
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Bienvenue sur mon blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                     <li class="page-scroll">
                        <a href="#accueil">Accueil</a>
                    </li>
                    <li class="page-scroll">
                        <a href="view/listPost.php">Publication</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#modifs">Login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contactez">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Publication -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Publication</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="col-sm-12 portfolio-item">
                <a href="index.php"><em>Repartir à la liste de publication</em></a><br/><br/>
                <h3>
                    <?= htmlspecialchars($post['titre_article'])?>
                </h3>  
                <h5>
                    <br/><em> le <?= $post['date_article_fr']; ?> </em>
                </h5>                 
                <p>
                   <?php  echo nl2br(htmlspecialchars($post['chapo']) ).'<br/>'; ?>
                </p><br/>
                <p>
                   <?php  echo nl2br(htmlspecialchars($post['contenu']) ).'<br/>'; ?>
                </p><br/>
                 <p>
                  <em> <?php  echo nl2br(htmlspecialchars($post['auteur']) ).'<br/>'; ?></em>
                </p><br/>
            </div>  
            <div class="row">
                <div class="col-sm-12 portfolio-item">
                    <h3>Commentaires </h3>  

                    <!-- Ajout des commentaires -->
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="auteur">Auteur</label><br/>
                            <input type="text" name="auteur" />
                        </div>
                        <div>
                            <label for="commentaire">Commentaire</label><br/>
                        <textarea id="commentaire" name="commentaire"></textarea> 
                        </div>
                        <div>
                            <input type="submit" name="" />
                        </div>                        
                    </form>
                   <?php
                        // Récupération des commentaires
                    //$post->closeCursor();
                    while ($commentaire= $comment->fetch()) 
                    {
                    ?>
                        <p><strong><?= '<br/>'.htmlspecialchars($commentaire['auteur']) ?></strong> le <em> <?= $commentaire['date_commentaire_fr'] ?></em></p>
                        <p><?= nl2br(htmlspecialchars($commentaire['commentaire'])).'&nbsp;&nbsp;' ?>
                            <a href="#"><em>Modifier Commentaires</em></a>
                        </p>
                    <?php
                    }
                        $comment->closeCursor();
                    ?> 
                </div>                             
            </div>
        </div>
    </section>
 <!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4"></div>
                <div class="footer-col col-md-4">
                    <h3>Rejoignez-moi</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Your Website 2021
                </div>
            </div>
        </div>
    </div>
</footer>
      <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/freelancer.min.js"></script>
</body>
</html> 