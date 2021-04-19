<?php $title='homeView';?>
<?php ob_start();?>
    <!-- HEADER -->
    <header  style="background-color: #ffcc14">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="pictures/33.jpg" alt="">
                    <div class="intro-text">
                        <span class="name">Myrna's blog</span>
                        <hr class="star-light">
                        <span class="skills">Je vous souhaite la bienvenue sur ce blog qui en perpétuel évolution ! </span>
                    </div>
                </div>
            </div>
        </div>
           <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    </header>
    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">                
                <div class="col-lg-12 text-center">
                    <h2>Me concernant</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>
                        Bonjour.
                        Heureuse de vous compter parmi mes lecteurs et lectrices et j'espère qu'entant que membre bientôt.
                    </p>
                </div>
                <div class="col-lg-4">
                    <p>
                        Je suis depuis quelques mois une assoiffée de programmation, j'aime apprendre et actuellement, je développe des applications de plus en plus propre à base de PHP, SQL, CSS, Javascipt et HTML. Je vous laisse télécharger mon CV afin d'en savoir plus sur moi.
                        N'hésitez pas à me contacter au travers de ma fiche contact ou de mes coordonnées sur mon CV à télécharger ci-dessous!
                    </p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <?php      
                        echo '<a class="btn btn-lg btn-outline" href="'.$data['url_file'].'"><i class="fa fa-download"></i> Download '.$data['name']. '</a>' ;                      
                    ?>   
                </div>
            </div>
        </div>
    </section>
    <?php $content=ob_get_clean();?>
    <?php require('template.php');?>















    

       

