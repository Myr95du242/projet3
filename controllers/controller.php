<?php
require('../model/model.php');

//Requête des articles

$sql='SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' )
		 AS date_article_fr,chapo,contenu,auteur FROM publication ORDER BY date_article DESC LIMIT 0,6';
$resultat=$bdd->query($sql);

//Requête de l'article et des commentaires

	// Article
$sql_article='SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' )
		 AS date_article_fr,chapo,contenu,auteur FROM publication WHERE id_article=:id_article ORDER BY date_article DESC';
$req=$bdd->prepare($sql_article);
$postId=10;
$req->execute(array('id_article' =>$postId));
$post=$req->fetch();

	//Commentaires
$sql_comment='SELECT id_commentaires,id_publication,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_commentaire_fr FROM commentaires WHERE id_publication=? ORDER BY date_commentaire DESC LIMIT 0,5';
$comment=$bdd->prepare($sql_comment);
$comment->execute(array($postId));
?>