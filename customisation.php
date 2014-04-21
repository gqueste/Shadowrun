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
$traits_avantages;
$traits_defauts;

init();

echo "<h2 style='text-align:center;'>".$_POST['choix-metatype']."</h2>
      <h3 id='titre-points-disponibles' style='text-align:center;' value='".$points_disponibles."'>Nombre de points disponibles : ".$points_disponibles."</h2>";

echo"<div id='caracteristiques'>
    <h3 id='titre-caracteristiques' value='".$points_caracteristiques."'>Caractéristiques : ".$points_caracteristiques." Points disponibles</h3>
    <table class='table table-bordered' style='text-align:center;'>
      <tr>
        <th style='text-align:center;' class='Carac' id='titre-constitution'>Constitution</th>
        <th style='text-align:center;' class='Carac' id='titre-agilite'>Agilité</th>
        <th style='text-align:center;' class='Carac' id='titre-reaction'>Réaction</th>
        <th style='text-align:center;' class='Carac' id='titre-force'>Force</th>
        <th style='text-align:center;' class='Carac' id='titre-charisme'>Charisme</th>
        <th style='text-align:center;' class='Carac' id='titre-intuition'>Intuition</th>
        <th style='text-align:center;' class='Carac' id='titre-logique'>Logique</th>
        <th style='text-align:center;' class='Carac' id='titre-volonte'>Volonté</th>
        <th style='text-align:center;' class='Carac' id='titre-chance'>Chance</th>
        <th style='text-align:center;' class='Carac' id='titre-initiative'>Initiative</th>
        <th style='text-align:center;' class='Carac' id='titre-magie'>Magie</th>
      </tr>
      <tr>";

$tab_caracs = array_keys($points_attributs['actuels']);
foreach ($tab_caracs as $carac) {
  caseTableauCaracteristiques($carac);
}


function init() {
  global $totaux_points, $points_disponibles, $points_attributs, $points_caracteristiques, $traits_avantages, $traits_defauts;
  $totaux_points = 400;
  $points_caracteristiques = $totaux_points / 2;
  $points_disponibles = 0;
  $points_attributs = array(
    'actuels'   => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
    'minimums'  => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0),
    'maximums'  => array('constitution' => 0, 'agilite' => 0, 'reaction' => 0, 'force' => 0, 'charisme' => 0, 'intuition' => 0, 'logique' => 0, 'volonte' => 0, 'chance' => 0, 'initiative' => 0, 'magie' => 0));

  switch ($_POST['choix-metatype']) {
    case 'Ork':
      $points_disponibles = $totaux_points - 20;
      $points_attributs = array(
        'actuels'   => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 4, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 9, 'agilite' => 6, 'reaction' => 6, 'force' => 8, 'charisme' => 5, 'intuition' => 6, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Nain':
      $points_disponibles = $totaux_points - 25;
      $points_attributs = array(
        'actuels'   => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 7, 'agilite' => 6, 'reaction' => 5, 'force' => 8, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 7, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Elfe':
      $points_disponibles = $totaux_points - 30;
      $points_attributs = array(
        'actuels'   => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 6, 'agilite' => 7, 'reaction' => 6, 'force' => 6, 'charisme' => 8, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;

    case 'Troll':
      $points_disponibles = $totaux_points - 40;
      $points_attributs = array(
        'actuels'   => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 10, 'agilite' => 5, 'reaction' => 6, 'force' => 10, 'charisme' => 4, 'intuition' => 5, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;
    
    default:
      $points_disponibles = $totaux_points;
      $points_attributs = array(
        'actuels'   => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 6, 'agilite' => 6, 'reaction' => 6, 'force' => 6, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 10));
      break;
  }
  $traits_avantages = array(
    'Adepte'                    => array('prix' => 5 , 'points_max' => 1), //CSQ
    'Adepte mystique'           => array('prix' => 10, 'points_max' => 1), //CSQ
    'Affinité avec les esprits' => array('prix' => 10, 'points_max' => 1),
    'Ambidextre'                => array('prix' => 5 , 'points_max' => 1),
    'Apparence humaine'         => array('prix' => 5 , 'points_max' => 1),
    'Aptitude'                  => array('prix' => 10, 'points_max' => 1), //CSQ
    'Attribut exceptionnel'     => array('prix' => 20, 'points_max' => 1), //CSQ
    'Bon codeur'                => array('prix' => 10, 'points_max' => 1),
    'Caméléon astral'           => array('prix' => 5 , 'points_max' => 1 ),
    'Chanceux'                  => array('prix' => 20, 'points_max' => 1),
    'Concentration accrue'      => array('prix' => 10, 'points_max' => 2),
    'Contorsionniste'           => array('prix' => 5 , 'points_max' => 1),
    'Dur à cuire'               => array('prix' => 10, 'points_max' => 1),
    'Empathie animale'          => array('prix' => 10, 'points_max' => 1),
    'Endurance à la douleur'    => array('prix' => 5 , 'points_max' => 3),
    'Esprit mentor'             => array('prix' => 5 , 'points_max' => 1), //CSQ
    'Guérison rapide'           => array('prix' => 10, 'points_max' => 1),
    'Immunité naturelle'        => array('prix' => 5 , 'points_max' => 1),
    'Lien ténu'                 => array('prix' => 10, 'points_max' => 1),
    'Magicien'                  => array('prix' => 15, 'points_max' => 1), //CSQ
    'Mémoire photographique'    => array('prix' => 10, 'points_max' => 1),
    'M. tout le monde'          => array('prix' => 10, 'points_max' => 1),
    'Première impression'       => array('prix' => 5 , 'points_max' => 1),
    'Renfort naturel'           => array('prix' => 10, 'points_max' => 1),
    'Résistance à la mgie'      => array('prix' => 5 , 'points_max' => 4),
    'Résistance aux toxines'    => array('prix' => 5 , 'points_max' => 2),
    'Survivant'                 => array('prix' => 5 , 'points_max' => 3),
    'Technomancien'             => array('prix' => 5 , 'points_max' => 1), //CSQ
    'Territoire'                => array('prix' => 10, 'points_max' => 1),
    'Tripes'                    => array('prix' => 5 , 'points_max' => 1),
    );
  
  $traits_defauts = array(
    'Allergie'                  => array('prix' => 5 , 'points_max' => 4),
    'Asocial'                   => array('prix' => 20, 'points_max' => 1),
    'Balise astrale'            => array('prix' => 5 , 'points_max' => 1),
    'Dépendance'                => array('prix' => 5 , 'points_max' => 6), //csq
    'Ecorché'                   => array('prix' => 5 , 'points_max' => 1), 
    'Gremlins'                  => array('prix' => 5 , 'points_max' => 4),
    'Hostilité des esprits'     => array('prix' => 10, 'points_max' => 1),
    'Immunodéficience'          => array('prix' => 5 , 'points_max' => 1),
    'Immunodépression'          => array('prix' => 15, 'points_max' => 1),
    'Incompétent'               => array('prix' => 5 , 'points_max' => 1), //CSQ
    'Infirme'                   => array('prix' => 20, 'points_max' => 1),
    'Malchanceux'               => array('prix' => 20, 'points_max' => 1),
    'Mal du simsens'            => array('prix' => 10, 'points_max' => 1),
    'Mauvais codeur'            => array('prix' => 5 , 'points_max' => 1),
    'Paralysie en combat'       => array('prix' => 20, 'points_max' => 1),
    'Primitif'                  => array('prix' => 20, 'points_max' => 1),
    'Sensible à la douleur'     => array('prix' => 10, 'points_max' => 1),
    'SINner'                    => array('prix' => 5 , 'points_max' => 2),
    'Système nerveux sensible'  => array('prix' => 5 , 'points_max' => 1),
    );
}

function caseTableauCaracteristiques($caracteristique_en_cours) {
  global $points_attributs;
  switch ($caracteristique_en_cours) {
    case 'initiative':
      $calcul_initiative = $points_attributs['actuels']['reaction'] + $points_attributs['actuels']['intuition']; 
      echo "<td style='width:120px' class='Carac' id='choix-".$caracteristique_en_cours."'>
          <div class='input-group input-group-sm' style='width:110px'>
            <input class='form-control' id='edit-".$caracteristique_en_cours."' type='number' value='".$calcul_initiative."' readonly size='2' style='text-align:center;'>
          </div>
        </td>";
      break;
    
    default:
      echo "<td style='width:120px' class='Carac' id='choix-".$caracteristique_en_cours."'>
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


    $('.Carac').hover(function() {
      var elementHovered = this.id;
      var arrayDecompo = elementHovered.split("-");
      var elem = arrayDecompo[1];
      var description;
      switch(elem) {
        case 'constitution':
          $('#description-carac').html("<h3>Constitution</h3><p>La Constitution détermine la résistance d'un personnage face aux facteurs externes. Cet attribut représente l'endurance et la capacité cardio-vasculaire du personnage, son systême immunitaire, ses facultés de cicatrisation et de guérison, l'aptitude que possède son corps à s'ajuster au bioware, sa tolérance à l'alcool et aux drogues, et aussi, d'une certaine manière, sa structure musculaire et osseuse, ainsi que son poids. Une Constitution faible peut signifier qu'un personnage est maigre, chétif, ou qu'il a de mauvaises habitudes alimentaires ou sanitaires. Un personnage sortant d'une grave maladie ou d'une grosse opération de cyberchirurgie peut aussi être affligé d'une faible Constitution. Une Constitution élevée, au contraire, signifie que le personnage est bien alimenté, solide comme un roc, possède des os résistants et un systeme immunitaire fiable. La Constitution n'est pas nécessairement proportionnelle à la taille physique : un personnage gros ou obèse a probablement une faible Constitution, mais un petit personnage qui est filiforme et athlétique peut avoir une Constitution élevée.</p>");
          break;

        case 'agilite':
          $('#description-carac').html("<h3>Agilité</h3><p>L'Agilité représente les reflexes moteurs, la dextérité manuelle, la souplesse, l'équilibre et la coordination. Un personnage qui a une Agilité faible a peut-être un problème d'oreille interne, une jambe plus courte que l'autre, ou est tout simplement empoté. Les indices élevés d'Agilité peuvent se trouver chez des personnages qui sont athlétiques de nature.</p>");
          break;

        case 'reaction':
          $('#description-carac').html("<h3>Réaction</h3><p>La Réaction d'un personnage représente, tout simplement, ses réflexes physiques : la vitesse à laquelle il peut réagir sous la pression des événements et comment il peut éviter les projectiles et les coups qui vont de pair avec les shadowruns. Un personnage dôté d'un indice élevé de Réaction a plus de chances de dominer une situation et sera en meilleure posture pour réagir face au danger, tandis qu'un personnage avec une faible Réaction sera à la traîne.</p>");
          break;

        case 'force':
          $('#description-carac').html("<h3>Force</h3><p>La Force couvre tout ce qu'un personnage est capable de faire en faisant appel à ses muscles, capacité à soulever et course de vitesse compris. Elle dépend en grande partie de la taille et du métatype. Si votre personnage est une jeune humaine de 1,55 m pour 50 kg, il est peu probable qu'elle bénéficie d'une Force non augmentée de 6. D'un autre côté, les nains possèdent une densité musculaire qui rivalise avec celle des reptiles. Les personnages ayant une Force faible sont vraisemblablememt petits, maigres, malingres, ou tout simplement trop occupés pour entretenir leur corps. Un personnage dôté d'une grande Force est solide et vigoureux, sait tirer au maximum parti de son corps, fait de l'exercice physique quotidiennement, ou est tout simplement vach'ment GRAND.</p>");
          break;

        case 'charisme':
          $('#description-carac').html("<h3>Charisme</h3><p>Le Charisme est un attribut quelque peu nébuleux et peu évident à définir. Plus que la simple apparence physique, le Charisme symbolise l'aura personnelle du personnage, sa confiance en lui, son égo, sa facilité à déceler les attentes des gens et à y répondre ainsi que sa capacité à tirer le meilleur de quelqu'un OU à savoir ce qu'il vaut mieux éviter de lui demander. Un comportement geignard, une attitude de moi, je ou une incapacité à lire le langage gestuel ou à saisir certaines subtilités sont des exemples de ce qui peut traduire un Charisme vraisemblablement bas. Un personnage dôté d'un fort Charisme aime divertir les autres, excelle dans l'art de nouer des relations d'amitié et/ou de manipuler les gens, ou sait faire preuve de répartie quelque soit son interlocuteur. Un personnage qui a un bon Charisme raconte les bonnes blagues au bon moment, a une allure sexy ou impose le respect par son extrême ponctualité et son assurance.</p>");
          break;

        case 'intuition':
          $('#description-carac').html("<h3>Intuition</h3><p>L'Intuition couvre la vigilance mentale, la capacité à recevoir et à traiter des informations, à percevoir des mouvements de foule, à évaluer le danger ou l'opportunité d'une situation. Un personnage dôté d'une faible Intuition est peut être inattentif, analyse rarement les choses en profondeur, ou est peut-être simplement lent. Un personnage qui a une Intuition élevée est passé maître dans l'art de tirer le meilleur d'une mauvaise situation, sait se retirer d'une rencontre avant qu'elle ne dégénère, remarque le moindre indice et travaille à l'instinct.</p>");
          break;

        case 'logique':
          $('#description-carac').html("<h3>Logique</h3><p>La Logique représente la capacité de mémorisation et l'intelligence du personnage. Elle indique la vitesse d'apprentissage d'un personnage, la quantité de choses dont il peut se rappeler et sa capacité à exécuter des plans pré-établis. Un personnage manquant de Logique est rapidement depassé lorsqu'il est confronté à un grand nombre de détails et a une mauvaise mémoire, particulièrement des faits et des chiffres. Les personnages qui ont un indice de Logique élevé apprennent probablement facilement dans les livres, sont capables d'appréhender aisément les theories de la magie et de l'informatique et de fabriquer (et démonter !) machines et matériel électronique.</p>");
          break;

        case 'volonte':
          $('#description-carac').html("<h3>Volonté</h3><p>La Volonté est ce qui pousse un personnage à continuer lorsqu'il voudrait laisser tomber, ou encore ce qui lui permet de contrôler ses pulsions et ses émotions. La Volonté détermine s'il est capable ou pas de se maîtriser. Un personnage affligé d'une faible Volonté se repose sur les autres lorsque de grandes décisions doivent être prises, par exemple. Un personnage bénéficiant d'une grande Volonté a de l'assurance et a tendance à ne jamais abandonner ni désespérer. Dans toutes les situations, de tels personnages sont capables d'y croire jusqu'au bout, sans douter, parce que c'est comme ça! La Volonté représente aussi le sang-froid d'un personnage sous le feu adverse, sa capacité à résister à l'intimidation et à la manipulation, ainsi que sa détermination face à la pression.</p>");
          break;

        case 'chance':
          $('#description-carac').html("<h3>Chance</h3><p>La Chance d'un personnage représente ce petit quelque chose qui peut renverser la vapeur et rattraper une mauvaise journée : agir avec ses tripes et tout donner, faire preuve d'un moment de créativité ou d'inspiration géniale, ou réussir la prouesse physique de sa vie. La Chance est un mélange de destinée, de bon timing et des faveurs accordées par les cieux. Les personnages qui n'ont pas beaucoup de Chance ont peu d'espoir de réaliser des prouesses inattendues dans leur vie, et encore moins de gagner à la loterie. Un personnage avec beaucoup de Chance, par contre, est suivi par sa bonne étoile et possède une capacité mystérieuse à reussir contre toute attente. La Chance peut être dépensée à certains moments du jeu pour forcer un peu le destin en faveur de votre personnage. Contrairement aux autres attributs, la Chance fournit des points de Chance qui peuvent être dépensés de diverses manières ; une fois utilisés, ces points ne sont regagnés que lorsque certains événements surviennent dans le jeu, à la discretion du meneur de jeu.</p>");
          break;

        case 'initiative':
          $('#description-carac').html("<h3>Initiative</h3><p>Un attribut dérive, l'Initiative est la somme de la Réaction et de l'Intuition, plus les modificateurs supplémentaires provenant d'accroissements de réflexes, implantés ou magiques. Comme son nom l'indique, l'Initiative est utilisée pour effectuer des Tests d'Initiative, ce qui détermine le Score d'Initiative du personnage pour un Tour de combat. Toute amélioration de la Réaction et de l'Intuition affecte également l'Initiative.</p>");
          break;

        case 'magie':
          $('#description-carac').html("<h3>Magie</h3><p>La Magie est une mesure de la capacité à utiliser la magie, et de l'harmonisation du corps avec le mana qui parcourt notre plan. Ceux qui ont des indices élevés en Magie sont capables de maîtriser des puissances magiques et manipulations du mana. Ceux dont l'indice de Magie est faible sont plus sensibles et plus facilement épuisés par l'usage de la magie. Ceux qui n'ont pas d'indice de Magie n'ont aucune capacité magique et sont exclus des domaines magiques. Les dommages corporels importants ainsi que les adjonctions invasives comme le cyberware et le bioware réduisent l'attribut Magie. La Magie et la Résonance sont des attributs mutuellement exclusifs. Un personnage qui a un indice de Magie de 1 ou plus ne peut pas posséder d'atrribut Résonance, et vice-versa.</p><h3>Résonance</h3><p>La Résonance est l'Attribut spécial des technomanciens, des personnages capables de manipuler la Matrice par la seule force de la pensée. La Résonance est une harmonisation avec les échos et les transmissions qui baignent le monde électronique, une communion avec l'ensemble du réseau. La nature exacte de la Résonance est encore plus controversée que la magie. Certains prétendent que la Résonance est une forme de magie qui s'est adaptée à la réalité virtuelle et augmentée du monde moderne, d'autres pensent que la Résonance est une nouvelle étape dans l'evolution de la conscience métahumaine, mais personne n'est sûr de rien. La Résonance et la Magie sont des atrributs mutuellement exclusifs. Un personnage qui a un indice de Résonance de 1 ou plus ne peut pas posséder d'attribut Magie, et vice-versa.</p>");
          break;

        default:
        break;
      }
    }, function(){
      $('#description-carac').html("");
    });

  });//]]> 
</script>

      </tr>
    </table>
    <div class="col-md-5">
      <h3>Améliorer ses caractéristiques</h3>
      <ul>
        <li>1 Niveau = 10 Points</li>
        <li>Monter une caractéristique à son maximum = 25 Points</li>
      </ul>
    </div>
    <div class="col-md-7" id='description-carac'>
    </div>
  </div>

    </div>
 	</body>
</html>