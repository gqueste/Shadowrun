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

      <script type="text/javascript" src="js/customisation.js"></script>
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
    <h2>Caractéristiques</h2>
    <h3 id='titre-caracteristiques' value='".$points_caracteristiques."'>".$points_caracteristiques." Points disponibles</h3>
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
echo "    </tr>
    </table>
    <div class='col-md-6'>
      <h3>Améliorer ses caractéristiques</h3>
      <ul>
        <li>1 Niveau = 10 Points</li>
        <li>Monter une caractéristique à son maximum = 25 Points</li>
      </ul>
    </div>
    <div class='col-md-6' id='description-carac'>
      <h3>Constitution</h3>
      <p>La Constitution détermine la résistance d'un personnage face aux facteurs externes. Cet attribut représente l'endurance et la capacité cardio-vasculaire du personnage, son systême immunitaire, ses facultés de cicatrisation et de guérison, l'aptitude que possède son corps à s'ajuster au bioware, sa tolérance à l'alcool et aux drogues, et aussi, d'une certaine manière, sa structure musculaire et osseuse, ainsi que son poids. Une Constitution faible peut signifier qu'un personnage est maigre, chétif, ou qu'il a de mauvaises habitudes alimentaires ou sanitaires. Un personnage sortant d'une grave maladie ou d'une grosse opération de cyberchirurgie peut aussi être affligé d'une faible Constitution. Une Constitution élevée, au contraire, signifie que le personnage est bien alimenté, solide comme un roc, possède des os résistants et un systeme immunitaire fiable. La Constitution n'est pas nécessairement proportionnelle à la taille physique : un personnage gros ou obèse a probablement une faible Constitution, mais un petit personnage qui est filiforme et athlétique peut avoir une Constitution élevée.</p>  
    </div>
  </div>";

echo "<div class='col-md-12'>
        <h2>Traits</h2>
        <h3 id='avantages' value='0'>Avantages : 0 PC</h3>
        <div class='col-md-6'>
          <table class='table table-hover'>
            <thead>
              <tr>
                <th>Avantage</th>
                <th>Coût (points max)</th>
                <th>Sélection</th>
              </tr>
            </thead>
            <tbody>";

$tab_avantages = array_keys($traits_avantages);
foreach ($tab_avantages as $trait) {
  caseTableauTraits($trait, "Avantage");
}

echo "
          </tbody>
        </table>
      </div>
      <div id='description-avantages' class='col-md-6'>
        <p>Description des avantages</p>
      </div>
      </div>
      <div class='col-md-12'>
      <h3 id='defauts' value='0'>Défauts : 0 PC</h3>
        <div class='col-md-6'>
          <table class='table table-hover'>
            <thead>
              <tr>
                <th>Défauts</th>
                <th>Coût (points max)</th>
                <th>Sélection</th>
              </tr>
            </thead>
            <tbody>";
$tab_defauts = array_keys($traits_defauts);
foreach ($tab_defauts as $trait) {
  caseTableauTraits($trait, "Defaut");
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
        'maximums'  => array('constitution' => 9, 'agilite' => 6, 'reaction' => 6, 'force' => 8, 'charisme' => 5, 'intuition' => 6, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 6));
      break;

    case 'Nain':
      $points_disponibles = $totaux_points - 25;
      $points_attributs = array(
        'actuels'   => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 2, 'agilite' => 1, 'reaction' => 1, 'force' => 3, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 2, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 7, 'agilite' => 6, 'reaction' => 5, 'force' => 8, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 7, 'chance' => 10, 'initiative' => 0, 'magie' => 6));
      break;

    case 'Elfe':
      $points_disponibles = $totaux_points - 30;
      $points_attributs = array(
        'actuels'   => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 1, 'agilite' => 2, 'reaction' => 1, 'force' => 1, 'charisme' => 3, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 6, 'agilite' => 7, 'reaction' => 6, 'force' => 6, 'charisme' => 8, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 6));
      break;

    case 'Troll':
      $points_disponibles = $totaux_points - 40;
      $points_attributs = array(
        'actuels'   => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 5, 'agilite' => 1, 'reaction' => 1, 'force' => 5, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 1, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 10, 'agilite' => 5, 'reaction' => 6, 'force' => 10, 'charisme' => 4, 'intuition' => 5, 'logique' => 5, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 6));
      break;
    
    default:
      $points_disponibles = $totaux_points;
      $points_attributs = array(
        'actuels'   => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'minimums'  => array('constitution' => 1, 'agilite' => 1, 'reaction' => 1, 'force' => 1, 'charisme' => 1, 'intuition' => 1, 'logique' => 1, 'volonte' => 1, 'chance' => 2, 'initiative' => 0, 'magie' => 0),
        'maximums'  => array('constitution' => 6, 'agilite' => 6, 'reaction' => 6, 'force' => 6, 'charisme' => 6, 'intuition' => 6, 'logique' => 6, 'volonte' => 6, 'chance' => 10, 'initiative' => 0, 'magie' => 6));
      break;
  }
  $traits_avantages = array(
    'Adepte'                    => array('prix' => 5 , 'points_max' => 1),
    'Adepte mystique'           => array('prix' => 10, 'points_max' => 1),
    'Affinité avec les esprits' => array('prix' => 10, 'points_max' => 1),
    'Ambidextre'                => array('prix' => 5 , 'points_max' => 1),
    'Apparence humaine'         => array('prix' => 5 , 'points_max' => 1),
    'Aptitude'                  => array('prix' => 10, 'points_max' => 1),
    'Attribut exceptionnel'     => array('prix' => 20, 'points_max' => 1),
    'Bon codeur'                => array('prix' => 10, 'points_max' => 1),
    'Caméléon astral'           => array('prix' => 5 , 'points_max' => 1 ),
    'Chanceux'                  => array('prix' => 20, 'points_max' => 1),
    'Concentration accrue'      => array('prix' => 10, 'points_max' => 2),
    'Contorsionniste'           => array('prix' => 5 , 'points_max' => 1),
    'Dur à cuire'               => array('prix' => 10, 'points_max' => 1),
    'Empathie animale'          => array('prix' => 10, 'points_max' => 1),
    'Endurance à la douleur'    => array('prix' => 5 , 'points_max' => 3),
    'Esprit mentor'             => array('prix' => 5 , 'points_max' => 1),
    'Guérison rapide'           => array('prix' => 10, 'points_max' => 1),
    'Immunité naturelle'        => array('prix' => 5 , 'points_max' => 1),
    'Lien ténu'                 => array('prix' => 10, 'points_max' => 1),
    'Magicien'                  => array('prix' => 15, 'points_max' => 1), 
    'Mémoire photographique'    => array('prix' => 10, 'points_max' => 1),
    'M tout le monde'           => array('prix' => 10, 'points_max' => 1),
    'Première impression'       => array('prix' => 5 , 'points_max' => 1),
    'Renfort naturel'           => array('prix' => 10, 'points_max' => 1),
    'Résistance à la magie'     => array('prix' => 5 , 'points_max' => 4),
    'Résistance aux toxines'    => array('prix' => 5 , 'points_max' => 2),
    'Survivant'                 => array('prix' => 5 , 'points_max' => 3),
    'Technomancien'             => array('prix' => 5 , 'points_max' => 1), 
    'Territoire'                => array('prix' => 10, 'points_max' => 1),
    'Tripes'                    => array('prix' => 5 , 'points_max' => 1),
    );
  
  $traits_defauts = array(
    'Allergie'                  => array('prix' => 5 , 'points_max' => 4),
    'Asocial'                   => array('prix' => 20, 'points_max' => 1),
    'Balise astrale'            => array('prix' => 5 , 'points_max' => 1),
    'Dépendance'                => array('prix' => 5 , 'points_max' => 6),
    'Ecorché'                   => array('prix' => 5 , 'points_max' => 1), 
    'Gremlins'                  => array('prix' => 5 , 'points_max' => 4),
    'Hostilité des esprits'     => array('prix' => 10, 'points_max' => 1),
    'Immunodéficience'          => array('prix' => 5 , 'points_max' => 1),
    'Immunodépression'          => array('prix' => 15, 'points_max' => 1),
    'Incompétent'               => array('prix' => 5 , 'points_max' => 1),
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
          <div class='input-group input-group-sm' style='width:117px'>
            <input class='form-control' id='edit-".$caracteristique_en_cours."' type='number' min='".$points_attributs['minimums'][$caracteristique_en_cours]."' max ='".$points_attributs['maximums'][$caracteristique_en_cours]."' value='".$points_attributs['actuels'][$caracteristique_en_cours]."' readonly size='2' style='text-align:center;'>
            <div class='input-group-btn'>
              <span class='input-group-btn'>
                <button id='plus-".$caracteristique_en_cours."' class='btn btn-default btn-sm buttonCarac buttonCaracPlus' type='button' onclick='' style='cursor:pointer'";
      if ($caracteristique_en_cours == 'magie') {
        echo 'disabled';
      }
      echo ">
                  <span class='glyphicon glyphicon-chevron-up'></span>
                </button>
              </span>
              <span class='input-group-btn'>
                <button id='moins-".$caracteristique_en_cours."' class='btn btn-default btn-sm buttonCarac buttonCaracMoins' type='button' onclick='' disabled>
                  <span class='glyphicon glyphicon-chevron-down'></span>
                </button>
              </span>
            </div>
          </div>
        </td>";
      break;
  }
}

function caseTableauTraits($trait, $type) {
  global $traits_avantages, $traits_defauts;
  echo" <tr>
          <td>".$trait."</td>";
  $array_trait;
  if($type == 'Avantage') {
    $array_trait = $traits_avantages;
  }
  else {
    $array_trait = $traits_defauts;
  }

  $name = str_replace(' ', '_', $trait);
          
  if($array_trait[$trait]['points_max'] == 1) {
    echo "<td>".$array_trait[$trait]['prix']."</td>
          <td>
          <input id='checkbox-".$type."-".$name."' type='checkbox' class='checkbox checkboxTrait checkboxTrait".$type."' value='".$array_trait[$trait]['prix']."'>";
  }
  else {
    echo "<td>".$array_trait[$trait]['prix']." (".$array_trait[$trait]['points_max'].")</td>
          <td>
          <div class='input-group input-group-sm' style='width:110px'>
            <input class='form-control' id='edit-".$type."-".$name."' type='number' min='0' max='".$array_trait[$trait]['points_max']."' value='0' readonly size='1'>
            <input type='hidden' id='edit-".$type."-".$name."-prix' value='".$array_trait[$trait]['prix']."'>
            <div class='input-group-btn'>
              <span class='input-group-btn'>
                <button id='plus-".$type."-".$name."' class='btn btn-default btn-sm buttonTrait buttonTrait".$type." buttonTrait".$type."Plus' type='button' onclick=''>
                  <span class='glyphicon glyphicon-chevron-up'></span>
                </button>
              </span>
              <span class='input-group-btn'>
                <button id='moins-".$type."-".$name."' class='btn btn-default btn-sm buttonTrait buttonTrait".$type." buttonTrait".$type."Moins' type='button' onclick='' disabled>
                  <span class='glyphicon glyphicon-chevron-down'></span>
                </button>
              </span>
            </div>
          </div>";

  }
  echo "</td>
        </tr>";
}

?>  
      </tbody>
    </table>
  </div>

  <div id='description-defauts' class='col-md-6'>
    <p>Description des défauts</p>
  </div>
  
  </div>

    </div>
 	</body>
</html>