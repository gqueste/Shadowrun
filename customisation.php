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

$totaux_points;
$points_caracteristiques;
$points_disponibles;
$points_attributs;

init();

echo "<h2 style='text-align:center;'>".$_POST['choix-metatype']."</h2>
      <h3 id='titre-points-disponibles' style='text-align:center;' value='".$points_disponibles."'>Nombre de points disponibles : ".$points_disponibles."</h2>";

echo"<div id='caracteristiques'>
    <h3 id='titre-caracteristiques' value='".$points_caracteristiques."'>Caractéristiques : ".$points_caracteristiques." Points disponibles</h3>
    <table class='table table-bordered' style='text-align:center;'>
      <tr>
        <th style='text-align:center;'>Constitution</th>
        <th style='text-align:center;'>Agilité</th>
        <th style='text-align:center;'>Réaction</th>
        <th style='text-align:center;'>Force</th>
        <th style='text-align:center;'>Charisme</th>
        <th style='text-align:center;'>Intuition</th>
        <th style='text-align:center;'>Logique</th>
        <th style='text-align:center;'>Volonté</th>
        <th style='text-align:center;'>Chance</th>
        <th style='text-align:center;'>Initiative</th>
        <th style='text-align:center;'>Magie</th>
      </tr>
      <tr>";

$tab_caracs = array_keys($points_attributs['actuels']);
foreach ($tab_caracs as $carac) {
  caseTableauCaracteristiques($carac);
}


function init() {
  global $totaux_points, $points_disponibles, $points_attributs, $points_caracteristiques;
  $totaux_points = 400;
  $points_caracteristiques = $totaux_points / 2;
  $points_disponibles = 0;
  $points_attributs = array(
    'actuels' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
    'minimums' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
    'maximums' => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0));

  switch ($_POST['choix-metatype']) {
    case 'Ork':
      $points_disponibles = $totaux_points - 20;
      $points_attributs = array(
        'actuels' => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 9, 'agilite' => 6, 'reaction' => 6, 'force' => 8, 'charisme' => 5, 'intuition' => 6, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Nain':
      $points_disponibles = $totaux_points - 25;
      $points_attributs = array(
        'actuels' => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 7, 'agilite' => 6, 'reaction' => 5, 'force' => 8, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 7, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Elfe':
      $points_disponibles = $totaux_points - 30;
      $points_attributs = array(
        'actuels' => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 6, 'agilite' => 7, 'reaction' => 6, 'force' => 6, 'charisme' => 8, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Troll':
      $points_disponibles = $totaux_points - 40;
      $points_attributs = array(
        'actuels' => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 10, 'agilite' => 5, 'reaction' => 6, 'force' => 10, 'charisme' => 4, 'intuition' => 5, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;
    
    default:
      $points_disponibles = $totaux_points;
      $points_attributs = array(
        'actuels' => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'minimums' => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'maximums' => array('constitution' => 6, 'agilite' => 6, 'reaction' => 6, 'force' => 6, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;
  }
}

function caseTableauCaracteristiques($caracteristique_en_cours) {
  global $points_attributs;
  switch ($caracteristique_en_cours) {
    case 'initiative':
      $calcul_initiative = $points_attributs['actuels']['reaction'] + $points_attributs['actuels']['intuition']; 
      echo "<td style='width:120px'>
          <div class='input-group input-group-sm' style='width:110px'>
            <input class='form-control' id='edit-".$caracteristique_en_cours."' type='number' value='".$calcul_initiative."' readonly size='2' style='text-align:center;'>
          </div>
        </td>";
      break;
    
    default:
      echo "<td style='width:120px'>
          <div class='input-group input-group-sm' style='width:110px'>
            <input class='form-control' id='edit-".$caracteristique_en_cours."' type='number' min='".$points_attributs['minimums'][$caracteristique_en_cours]."' max ='".$points_attributs['maximums'][$caracteristique_en_cours]."' value='".$points_attributs['actuels'][$caracteristique_en_cours]."' readonly size='2' style='text-align:center;'>
            <div class='input-group-btn'>
              <span class='input-group-btn'>
                <button id='plus-".$caracteristique_en_cours."' class='btn btn-default btn-sm buttonCarac buttonCaracPlus' type='button' ";
      if ($caracteristique_en_cours == 'magie') {
        echo 'disabled';
      }
      echo ">
                  <span class='glyphicon glyphicon-chevron-up'></span>
                </button>
              </span>
              <span class='input-group-btn'>
                <button id='moins-".$caracteristique_en_cours."' class='btn btn-default btn-sm buttonCarac buttonCaracMoins' type='button' disabled>
                  <span class='glyphicon glyphicon-chevron-down'></span>
                </button>
              </span>
            </div>
          </div>
        </td>";
      break;
  }
}

?>

<script type="text/javascript">//<![CDATA[
  $(window).load(function(){

    function updateAffichagePoints(){
      var points_carac = parseInt($('#titre-caracteristiques').attr('value'));
      if(points_carac == 0) {
        $('#titre-caracteristiques').html("Caractéristiques : " + points_carac + " Point disponible");  
      }
      else {
        $('#titre-caracteristiques').html("Caractéristiques : " + points_carac + " Points disponibles");  
      }
      $('#titre-points-disponibles').html("Nombre de points disponibles : " + $('#titre-points-disponibles').attr('value'));
    }

    function updateTableauCaracteristiques(){
      var valInitiative = parseInt($('#edit-reaction').val()) + parseInt($('#edit-intuition').val());
      $('#edit-initiative').val(valInitiative);


      var array_caracs = new Array('constitution', 'agilite', 'reaction', 'force', 'charisme', 'intuition', 'logique', 'volonte', 'chance', 'magie');
      var pointsTotaux = parseInt($('#titre-points-disponibles').attr('value'));
      var pointsCarac = parseInt($('#titre-caracteristiques').attr('value'));
      if(((pointsTotaux - 25) < 0) || ((pointsCarac - 25) < 0)) {
        if(((pointsTotaux - 10) < 0) || ((pointsCarac - 10) < 0)) {
          $('.buttonCaracPlus').prop('disabled', true);
        }
        else {
          //disable tous les + qui sont à -1 de leur maximum
          for (var i = 0; i < array_caracs.length; i++) {
            var editCarac = '#edit-' + array_caracs[i];
            var valeurCourante = parseInt($(editCarac).val());
            var valeurMax = parseInt($(editCarac).attr('max'));
            if((valeurCourante + 1) == valeurMax) {
              var plusButton = '#plus-' + array_caracs[i];
              $(plusButton).prop('disabled', true);  
            }
            else if(((valeurCourante) != valeurMax) && (array_caracs[i] != 'magie')) {     //ATTENTION A GESTION MAGIE
              var plusButton = '#plus-' + array_caracs[i];
              $(plusButton).prop('disabled', false);  
            } 
          }
        }
      }
      else {
        //enable tous les + sauf ceux qui sont à leur maximum (magie ?)
        for (var i = 0; i < array_caracs.length; i++) {
          var editCarac = '#edit-' + array_caracs[i];
          var valeurCourante = parseInt($(editCarac).val());
          var valeurMax = parseInt($(editCarac).attr('max'));
          if(((valeurCourante) != valeurMax) && (array_caracs[i] != 'magie')) {
            var plusButton = '#plus-' + array_caracs[i];
            $(plusButton).prop('disabled', false);  
          }
        }
      }



      updateAffichagePoints();
    }

    function augmenteCarac(carac){
      var editVise = '#edit-'+carac;
      var valeurCourante = parseInt($(editVise).val());
      var valeurMax = parseInt($(editVise).attr('max'));
      var pointsTotaux = parseInt($('#titre-points-disponibles').attr('value'));
      var pointsCarac = parseInt($('#titre-caracteristiques').attr('value'));
      if((valeurCourante + 1) == valeurMax) { //A atteint max
        if(((pointsCarac - 25) >= 0) && (pointsTotaux - 25 >= 0)) {
          var nouveauPointsTotal = pointsTotaux - 25;
          var nouveauPointsCarac = pointsCarac - 25;
          $('#titre-caracteristiques').attr('value',nouveauPointsCarac);
          $('#titre-points-disponibles').attr('value',nouveauPointsTotal);
          $(editVise).val(valeurCourante + 1);
          var plusButton = '#plus-'+carac;
          $(plusButton).prop('disabled', true);
        }
      }
      else {
        if(((pointsCarac - 10) >= 0) && (pointsTotaux - 10 >= 0)) {
          var nouveauPointsTotal = pointsTotaux - 10;
          var nouveauPointsCarac = pointsCarac - 10;
          $('#titre-caracteristiques').attr('value',nouveauPointsCarac);
          $('#titre-points-disponibles').attr('value',nouveauPointsTotal);
          $(editVise).val(valeurCourante + 1);
          var moinsButton = '#moins-'+carac;
          $(moinsButton).prop('disabled', false);
        }
      }
      updateTableauCaracteristiques();
    }

    function baisseCarac(carac) {
      var editVise = '#edit-'+carac;
      var valeurCourante = parseInt($(editVise).val());
      var valeurMax = parseInt($(editVise).attr('max'));
      var valeurMini = parseInt($(editVise).attr('min'));
      var pointsTotaux = parseInt($('#titre-points-disponibles').attr('value'));
      var pointsCarac = parseInt($('#titre-caracteristiques').attr('value'));
      if(valeurCourante == valeurMax) {
        var nouveauPointsTotal = pointsTotaux + 25;
        var nouveauPointsCarac = pointsCarac + 25;
        $('#titre-caracteristiques').attr('value',nouveauPointsCarac);
        $('#titre-points-disponibles').attr('value',nouveauPointsTotal);
        var plusButton = '#plus-'+carac;
        $(plusButton).prop('disabled', false);
      }
      else {
        var nouveauPointsTotal = pointsTotaux + 10;
        var nouveauPointsCarac = pointsCarac + 10;
        $('#titre-caracteristiques').attr('value',nouveauPointsCarac);
        $('#titre-points-disponibles').attr('value',nouveauPointsTotal);
        if((valeurCourante - 1) == valeurMini) {
          var moinsButton = '#moins-'+carac;
          $(moinsButton).prop('disabled', true);  
        }
      }
      $(editVise).val(valeurCourante - 1);
      updateTableauCaracteristiques();
    }

    $('.buttonCarac').click(function(event){
      var arrayDecompo = event.target.id.split("-");
      var operationFaite = arrayDecompo[0];
      var caracVisee = arrayDecompo[1];
      if(operationFaite == 'plus') {
        augmenteCarac(caracVisee);
      }
      else {
        baisseCarac(caracVisee);
      }
    });
  });//]]> 
</script>

      </tr>
    </table>
  </div>

    </div>
 	</body>
</html>