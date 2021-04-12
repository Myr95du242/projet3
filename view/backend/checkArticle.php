
<?php $title='CheckPostView'; ?>
<?php ob_start(); ?>
    
    <!-- Publication -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Modification</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-8 portfolio-item bd-example">
                    <form method="post" action="index.php?action=updateArticle&amp;id=<?php 
                    if(isset($data['id_post']) AND !empty($data['id_post']))
                        { echo $data['id_post'] ;}  ?>" >
                        <div class="mb-3 form-group">
                            <input type="text" name="title" class="form-control" rows="3" value="<?= htmlspecialchars($title_data)?>">          
                            <label for="title" class="form-label" >Titre</label><br/><br/>                      
                        </div>
                        <div class="mb-3 form-group">
                            <input type="text" name="chapo" class="form-control" rows="3" value="<?= htmlspecialchars($chapo)?>">      
                            <label for="chapo" class="form-label">Chapo</label><br/><br/>                       
                        </div>  
                        <div class="mb-3 form-group">                       
                            <textarea type="text" name="content" class="form-control" rows="3"><?= htmlspecialchars($content)?></textarea> 
                            <label for="content" class="form-label">Contenu</label><br/><br/>                   
                        </div>
                        <div class="mb-3 form-group">
                            <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($author)?>">
                            <label for="author" class="form-label">Auteur</label><br/>                       
                        <input type="submit" name="modifier" value="modifier">
                        </div>  
                    </form><br/>                      
                </div>
            </div>            
        </div>
    </section>

<?php $content=ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>















    

       
