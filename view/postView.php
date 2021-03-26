<?php $titre_article='publication'; ?>
<?php ob_start(); ?>

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

<?php $contenu=ob_get_clean(); ?>
<?php require('template.php'); ?>