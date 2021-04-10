<?php $title = htmlspecialchars($post['title']);  ?>
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
                <a href="index.php?action=getListPost"><em>Repartir à la liste de publication</em></a><br/><br/>
                <h3>
                    <?= htmlspecialchars($post['title'])?>
                </h3>  
                <h5>
                    <br/><em> le <?= $post['date_post_fr']; ?> </em>
                </h5>                 
                <p>
                   <?= nl2br(htmlspecialchars($post['chapo']) ).'<br/>'; ?>
                </p><br/>
                <p>
                   <?= nl2br(htmlspecialchars($post['content']) ).'<br/>'; ?>
                </p><br/>
                 <p>
                  <em> <?= nl2br(htmlspecialchars($post['author']) ).'<br/>'; ?></em>
                </p><br/>
            </div>  
            <div class="row">
                <div class="col-sm-12 portfolio-item">
                    <h3>Commentaires </h3>  
                 <!-- Ajout des commentaires if(isset($post['id_post']) AND !empty($post['id_post']) ) { ;}-->
                    <form action="index.php?action=addComments&amp;id_article=<?= $post['id_post'] ?>" method="post">
                        <div class="form-group">
                            <label for="author">Auteur</label><br/>
                            <input type="text" name="author" />
                        </div>
                        <div>
                            <label for="comments">Commentaire</label><br/>
                        <textarea id="comments" name="comments"></textarea> 
                        </div>
                        <div>
                            <input type="submit" name="" />
                        </div>                        
                    </form>
                   <?php
                    while($commentaire= $comment->fetch()) 
                    {
                    ?>
                        <p><strong><?= '<br/>'.htmlspecialchars($commentaire['author']) ?></strong> le <em> <?= $commentaire['date_comment_fr'] ?></em></p>
                        <p><?= nl2br(htmlspecialchars($commentaire['comments'])).'&nbsp;&nbsp;' ?>
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

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>