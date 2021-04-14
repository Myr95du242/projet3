<?php 
//session_start();
$title='Users'; 
if (!$_SESSION['password']) 
{
    header('Location:index.php?action=homeView');
}
?>
<?php ob_start(); ?> 
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Gérer les commentaires</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div>
                <ul>
                    <li> 
                        <?php 
                        if(isset($data_enterer) AND !empty($data_enterer) )
                        {
                            foreach ($data_enterer as $key => $value) 
                            { 
                        ?>
                        <table width="50%" style="border:1px solid #000">
                            <tr>
                                <td style="border:1px solid #000, width:35%"><?= $key ?> </td>
                                <td style="width:65%"><?= $value ?> </td>                                
                            </tr>
                        </table>
                        <?php                     
                            }
                        }
                        ?>   <!-- index.php?action=validComment&amp;validate=0-->                     
                       <a href="#">
                            <button name="delete" value="delete" style="background-color: red;color:#fff; margin:10px; padding-bottom:10px"> Supprimer 
                            </button>
                        </a>                      
                        <a href="#"> 
                            <button value="modifier" style="background-color: green;color:#fff; margin:10px; padding-bottom:10px"> Valider Commentaire
                            </button>
                        </a> <!-- index.php?action=validComment&amp;validate=1-->   
                    </li>                                             
                </ul>               
            </div>          
        </div>
    </section>  
<?php $content=ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>