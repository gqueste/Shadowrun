<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Création de personnage Shadowrun 4</title>

    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap.css" rel="stylesheet">
    	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
    	<script src="js/jquery-1.11.0.min.js"></script>

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<body>
  		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 20px;">
      		<div class="container">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          			</button>
          			<a class="navbar-brand" href="index.html">Shadowrun - Création de personnage</a>
        		</div>
      		</div>
    	</div>
    	<!-- Fin de la barre de navigation -->

      <div class="container" style="padding-top: 60px;" style='text-align:center;'>
        <h1 style="text-align:center;">Répartissez vos points</h1>	

<?php

$totaux_points = 400;
$points_competences = $totaux_points / 2;
$points_disponibles = 0;
$points_attributs = array(
  'actuels' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intelligence' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
  'minimums' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intelligence' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
  'maximums' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intelligence' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0));

init();

echo "<h2 style='text-align:center;'>".$_POST['choix-metatype']."</h2>";
echo "<h3 style='text-align:center;'>Nombre de points disponibles : ".$points_disponibles."</h2>";




function init() {
  global $totaux_points, $points_disponibles;
  $totaux_points = 400;
  switch ($_POST['choix-metatype']) {
    case 'Ork':
      $points_disponibles = $totaux_points - 20;
      $points_attributs = array(
        'actuels' => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 9, 'agilite' => 6, 'reaction' => 6, 'force' => 8, 'charisme' => 5, 'intelligence' => 6, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 0));
      break;

    case 'Nain':
      $points_disponibles = $totaux_points - 25;
      $points_attributs = array(
        'actuels' => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 7, 'agilite' => 6, 'reaction' => 5, 'force' => 8, 'charisme' => 6, 'intelligence' => 6, 'logique' => 6, 'volonte' => 7, 'chance' => 10, 'initiative' => 0, 'magie' => 0));
      break;

    case 'Elfe':
      $points_disponibles = $totaux_points - 30;
      $points_attributs = array(
        'actuels' => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 6, 'agilite' => 7, 'reaction' => 6, 'force' => 6, 'charisme' => 8, 'intelligence' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 0));
      break;

    case 'Troll':
      $points_disponibles = $totaux_points - 40;
      $points_attributs = array(
        'actuels' => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 10, 'agilite' => 5, 'reaction' => 6, 'force' => 10, 'charisme' => 4, 'intelligence' => 5, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 0));
      break;
    
    default:
      $points_disponibles = $totaux_points;
      $points_attributs = array(
        'actuels' => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intelligence' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 6, 'agilite' => 6, 'reaction' => 6, 'force' => 6, 'charisme' => 6, 'intelligence' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 0));
      break;
  }
}

?>

  <div id='caracteristiques'>
    <h3 id='titre-caracteristiques'>Caractéristiques : XXX / YYY Points disponibles</h3>
    <table class='table table-bordered' style='text-align:center;'>
      <tr><th style='text-align:center;'>Constitution</th><th style='text-align:center;'>Agilité</th><th style='text-align:center;'>Réaction</th><th style='text-align:center;'>Force</th><th style='text-align:center;'>Charisme</th><th style='text-align:center;'>Intuition</th><th style='text-align:center;'>Logique</th><th style='text-align:center;'>Volonté</th></tr>
      <tr>
        <td style='width:160px'>
          <div class='input-group' style='width:150px'>
            <input class='form-control' id='edit-constitution' type='number' min='' max ='' value='' readonly size='2' style='text-align:center;'>
            <input id='minimum-constitution' type='hidden' value=''>
            <input id='maximum-constitution' type='hidden' value=''>
            <div class='input-group-btn'>
              <span class='input-group-btn'>
                <button class='btn btn-default' type='button'>
                  <span class='glyphicon glyphicon-chevron-up'></span>
                </button>
              </span>
              <span class='input-group-btn'>
                <button class='btn btn-default' type='button'>
                  <span class='glyphicon glyphicon-chevron-down'></span>
                </button>
              </span>
            </div>
          </div>
        </td>
        <td>1 / 6</td><td>1 / 6</td><td>1 / 6</td><td>1 / 6</td><td>1 / 6</td><td>1 / 6</td><td>1 / 6</td>
    </table>
  </div>

    </div>
 	</body>
</html>