//<![CDATA[
$(window).load(function(){

  function updateAffichagePoints(){
    var points_carac = parseInt($('#titre-caracteristiques').attr('value'));
    if(points_carac == 0 || points_carac == 1) {
      $('#titre-caracteristiques').html(points_carac + " Point disponible");  
    }
    else {
      $('#titre-caracteristiques').html(points_carac + " Points disponibles");  
    }
    $('#titre-points-disponibles').html("Nombre de points disponibles : " + $('#titre-points-disponibles').attr('value'));

    //Block traits Avantages décochés / + si titrePointsDispo.value < aux prix des traits
    var checkbox_traits_avantages = '.checkboxTraitAvantage';
    var plus_traits_avantages = '.buttonTraitAvantagePlus';

    $(checkbox_traits_avantages).each(function(){
      var id = this.id;
      var checkbox = '#'+id;
      var nbPoints = parseInt($('#titre-points-disponibles').attr('value'));
      var valueAvantage = parseInt($(checkbox).attr('value'));
      if(!$(checkbox).prop('checked')) {
        if(nbPoints - valueAvantage < 0) {
          $(checkbox).prop('disabled', true);
        }
        else {
          $(checkbox).prop('disabled', false);
        }
      }
    });
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
    var arrayDecompo = jQuery(this).attr("id").split("-");
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
  });

  function updatePointsAvantage() {
    var value = $('#avantages').attr('value');
    if(value < 0) {
      $('#avantages').attr('style', 'color:#d9534f');
    }
    else {
      $('#avantages').attr('style', 'color:lighten(#000, 13.5%);');
    }
    $('#avantages').html('Avantages : '+ value + ' PC');
  }


  function cocheAvantage(trait, bool){
    var inputID = '#checkbox-Avantage-' + trait;
    var value = parseInt($(inputID).attr('value'));
    var valueAvantages = parseInt($('#avantages').attr('value'));
    var valuePoints = parseInt($('#titre-points-disponibles').attr('value'));
    if(bool) {
      valueAvantages = valueAvantages - value;
      valuePoints = valuePoints - value;
    }
    else {
      valueAvantages = valueAvantages + value;
      valuePoints = valuePoints + value;
    }
    $('#avantages').attr('value', valueAvantages);
    $('#titre-points-disponibles').attr('value', valuePoints);

    updatePointsAvantage();
    updateAffichagePoints();
  }

  function updatePointsDefaut() {
    var value = $('#defauts').attr('value');
    if(value > 0) {
      $('#defauts').attr('style', 'color:#5cb85c');
    }
    else {
      $('#defauts').attr('style', 'color:lighten(#000, 13.5%);');
    }
    $('#defauts').html('Défauts : '+ value + ' PC');
  }

  function cocheDefaut(trait, bool){
    var inputID = '#checkbox-Defaut-' + trait;
    var value = parseInt($(inputID).attr('value'));
    var valueDefauts = parseInt($('#defauts').attr('value'));
    var valuePoints = parseInt($('#titre-points-disponibles').attr('value'));
    if(bool) {
      valueDefauts = valueDefauts + value;
      valuePoints = valuePoints + value;
    }
    else {
      valueDefauts = valueDefauts - value;
      valuePoints = valuePoints - value;
    }
    $('#defauts').attr('value', valueDefauts);
    $('#titre-points-disponibles').attr('value', valuePoints);

    updatePointsDefaut();
    updateAffichagePoints();
  }

  $('.checkboxTrait').click(function() {
    var elementCheckedID = jQuery(this).attr('id');
    var array = elementCheckedID.split("-");
    var typeTrait = array[1];
    var traitVise = array[2];
    var nameInput = "input[id='"+ elementCheckedID +"']";
    if($(nameInput).is(':checked')) {
      if(typeTrait == 'Avantage') {
        cocheAvantage(traitVise, true);
      }
      else {
        cocheDefaut(traitVise, true);
      }
    }
    else {
      if(typeTrait == 'Avantage') {
        cocheAvantage(traitVise, false);
      }
      else {
        cocheDefaut(traitVise, false);
      }
    }
  });

  function changeTrait(operation, typeTrait, traitVise) {
    var editConcerne = '#edit-'+typeTrait+'-'+traitVise;
    var value = parseInt($(editConcerne).attr('value'));
    var min = 0;
    var max = parseInt($(editConcerne).attr('max'));
    var champHidden = editConcerne + '-prix';
    var prix = parseInt($(champHidden).attr('value'));
    if(typeTrait == 'Avantage') {
      var valueAvantages = parseInt($('#avantages').attr('value'));
      var valuePoints = parseInt($('#titre-points-disponibles').attr('value'));
      if(operation == 'plus') {
        valueAvantages = valueAvantages - prix;
        valuePoints = valuePoints - prix;
        value = value + 1;
      }
      else {
        valueAvantages = valueAvantages + prix;
        valuePoints = valuePoints + prix;
        value = value - 1;
      }
      $('#avantages').attr('value', valueAvantages);
      $('#titre-points-disponibles').attr('value', valuePoints);
    }
    else {
      var valueDefauts = parseInt($('#defauts').attr('value'));
      var valuePoints = parseInt($('#titre-points-disponibles').attr('value'));
      if(operation == 'plus') {
        valueDefauts = valueDefauts + prix;
        valuePoints = valuePoints + prix;
        value = value + 1;
      }
      else {
        valueDefauts = valueDefauts - prix;
        valuePoints = valuePoints - prix;
        value = value - 1;
      }
      $('#defauts').attr('value', valueDefauts);
      $('#titre-points-disponibles').attr('value', valuePoints);
    }

    $(editConcerne).attr('value', value);

    var buttonMoins = '#moins-'+typeTrait+'-'+traitVise;
    var buttonPlus = '#plus-'+typeTrait+'-'+traitVise;
    if(value == min) {
      $(buttonMoins).prop('disabled', true);
    }
    else {
      $(buttonMoins).prop('disabled', false);
    }

    if(value == max) {
      $(buttonPlus).prop('disabled', true);
    }
    else {
      $(buttonPlus).prop('disabled', false);
    }

    updatePointsAvantage();
    updatePointsDefaut();
    updateTableauCaracteristiques()
    updateAffichagePoints();
  }

  $('.buttonTrait').click(function(event){
    var arrayDecompo = jQuery(this).attr("id").split("-");
    var operationFaite = arrayDecompo[0];
    var typeTrait = arrayDecompo[1];
    var traitVise = arrayDecompo[2];
    changeTrait(operationFaite, typeTrait, traitVise);
  });

});//]]>