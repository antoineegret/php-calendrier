<?php
//recupération du mois courant $selectedMonth = date('m');
$selectedMonth = !empty($_POST['month'])? $_POST['month']: date('m');
// !empty et l'inverse de empty vide en francais
$selectedYear = !empty($_POST['year'])? $_POST['year']: date('Y');
$daysInMonth = date('t', mktime(0,0,0,$selectedMonth,1,$selectedYear));
// recupére le 1er jour du mois pour l'année courante
$firstDayOfMonthInWeek = date('N',mktime(0,0,0,$selectedMonth,1,$selectedYear));
// tableau pour sauvegarder le nom des jours 
$weekDays = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche']; 
// tableau pour sauvegarder le nom des mois
$yearMonths = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']; 
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Calendrier</title>
  </head>
  <body>
      <div class="container">
          <h1>Année 2020</h1>
          <form method="post">
              <!-- tout ce qui est dans le select month permet de choisir le mois désirer -->
              <select name="month">
                  <!--renvoi au tableau $yearMonth avec leur numéro correspondant -->
                  <?php 
                  foreach ($yearMonths as $monthsNumber => $yearMonth): ?>
                  <option value="<?= $monthsNumber+1 ?>" <?= ($selectedMonth == $monthsNumber+1)? 'selected' : '' ?> ><?= $yearMonth ?></option>
                  <?php endforeach; ?>
              </select>
              <!-- tout ce qui est dans le select year permet de choisir l'année désirer -->              
              <select name="year">
                   <!--on peut choisir de l'année 1900 jusqu'a 2100 maximum-->
                  <?php 
                  for ($year = 1900; $year <= 2100; $year++): ?>
                  <option value="<?= $year ?>" <?= ($selectedYear == $year)? 'selected' : '' ?> ><?= $year ?></option>
                  <?php endfor; ?> <!-- endfor marque la fin du for -->
              </select>
              <input type="submit" >
          </form>
          <table class="table table-bordered">
              <thead>
                   <!--pour chaque weekdays comme weekday-->
                   <tr>                      
                    <?php 
                    foreach($weekDays as $weekDay): ?>
                  <!-- affiche le jour de la semaine dans la 1er ligne -->
                        <th class="bg-primary"><?php echo $weekDay; ?></th>
                    <?php endforeach; ?>
                   </tr>
              </thead>
              <tbody>
                  <tr>
                     <?php 
                  $loop = TRUE;
                  $cell = 1;
                  $day = 1;
                  $requiredCells = $daysInMonth + $firstDayOfMonthInWeek -1;
                  while ($loop){
                      if ($firstDayOfMonthInWeek > $cell || $cell > $requiredCells ){?>
                      <td class="bg-secondary"></td>
                       <?php    
                      }
                      else {?>
                      <td class="bg-light"><?= $day ?></td>
                          <?php
                          $day++;
                      }
                      if ($cell % 7 == 0){
                           if($cell >= $requiredCells){
                          break;
                      }
                          ?>
                  </tr><tr>
                      <?php
                      }
                      $cell++;
                                       }
                  ?>  
                  </tr>
              </tbody>
          </table>
      </div>
      
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>