
# Presentation

Ce script permet la création de fichier index (format tableau serialize) pour faire des recherches à partir de document pdf.

# Utilisation

## Creation de l'arborescence

Une fois les pdf récupéré, il faut splitter ceux-ci en page unique (http://www.splitpdf.com/ fait largement le boulot, il faut cocher  Extract all pages into separate files) 
Une fois l'ensemble des chapitres split en page unique il faut créer l'arborescense suivante : 

Pour utiliser ce script il faut créer un repertoire ayant la structure suivante: 

* root
    * 1
        * x.pdf
        * y.pdf
    * 2
        * z.pdf
        * w.pdf
		
		
		
## Parametrage
Les parametres sont à renseigner dans settings.php

$rootdoc = "root"; //Repertoire racine (root dans l'exemple ci-dessus)
$nbChapt = 1; //nombre de chapitre contenu dans le repertoire root (sous repertoire ayant un nombre incrementé)

$dataFile = "indexes/"; //repertoire de sortie pour le tableau de data serializé
$dataTabFile = "data"; //nom du fichier stockant les indexs. 

## Utilisation

Une fois votre fichier data généré, placé celui-ci à la racine du site (au niveau de l'index.php et du search.php) la recherche s'effectuera maintenant sur les nouveaux index. 

NOTES : 

-La génération peut être longue, veillez à augmenté le max_execution_time dans votre php.ini, selon la taille des pdf et la machine sur laquel on génére les index.
-Non sérieusement quand je dis long c'est super long ... pour 3 pdf j'ai mis quasi 10 minutes