<?php $title='publication'; ?>

<?php ob_start(); ?>
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Publication</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <?php
               while ($data= $resultat->fetch())
                {
            ?>
                 <div class="col-sm-4 portfolio-item">
                    <h3>
                        <strong>  <?= htmlspecialchars($data['title'])?> 
                        </strong><br/> 
                    </h3>
                    <h5>
                        <em><?= $data['date_post_fr'] ?></em>
                    </h5>                   
                    <p>
                       <?= '<em>'.nl2br(htmlspecialchars($data['chapo']) ).'</em>'.'<br/>'; ?>
                    </p>
                    <a href=index.php?action=getPostComments&amp;id_article=<?= $data['id_post']; ?>" class="portfolio-link" data-toggle="modal"> 
                        <em>Commentaires</em>
                    </a>
                </div>  
            <?php
                }
                    $resultat->closeCursor();
            ?> 
        </div>
    </section>

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>














    

       
