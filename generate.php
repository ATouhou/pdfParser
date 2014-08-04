<?php
//Script By knut (adrien.stefanski@gmail.com) pour Ithone
//Created on 13/04/2014 
//Last update on 30/05/14 (added PdfParser parsinG)

//Parametre d'execution

include 'vendor/autoload.php';
include "settings.php";
$page = 1;
$myArray = array();
$parser = new \Smalot\PdfParser\Parser();

echo "====================================\n";
echo "==============BEGIN=================\n";
echo "====================================\n";
for($i = 1; $i <= $nbChapt; $i++)
{
echo "Récupération du chapitre $i\n\n";
if ($handle = opendir($rootdoc."/".$i)) 
	{
		while ($entry = readdir($handle)) 
		{
		if($entry != "." and $entry != ".." and $entry != ".DS_Store" and $entry != "ren.sh")
			{
				echo "Récupération du fichier $entry\n\n\n";
				$pdf    = $parser->parseFile($rootdoc."/".$i."/".$entry); 
				$tmpString = $pdf->getText();
				$tmpString = str_replace("ﬁ ", "fi", $tmpString);
				$myArray[$i][$page++] = $tmpString;
			}
		}
		closedir($handle);
	}
	else
	echo "Impossible de récupérer le répertoire root nommée '$rootdoc', vérifier son existence et ses droits.";
}


echo "\n\n\n";
echo "Creation du tableau serialize et écriture du fichier de data\n\n";

file_put_contents($dataFile."/".$dataTabFile, serialize($myArray));

echo "Les datas ont bien été enregistré, vous pouvez les récupérer dans le fichier $dataFile / $dataTabFile.\n\n";
echo "====================================\n";
echo "==============END===================\n";
echo "====================================\n";
echo "<br/><br/>";


