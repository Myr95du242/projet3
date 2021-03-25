<?php
// récuparation de tous les post

	try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION) );

        //return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $resultat=$bdd->query('SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_article_fr,contenu,auteur FROM publication ORDER BY date_article DESC');

	//return $resultat;



?>