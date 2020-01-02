<?php
//recupération du mois courant $currentMonth = date('m');
$currentMonth = !empty($_POST['month'])? $_POST['month']: date('m');
// !empty et l'inverse de empty vide en francais
$currentYear = !empty($_POST['year'])? $_POST['year']: date('Y');
$daysInMonth = date('t', mktime(0,0,0,$currentMonth,1,$currentYear));
// recupére le 1er jour du mois pour l'année courante
$firstDayOfMonthInWeek = date('N',mktime(0,0,0,$currentMonth,1,$currentYear));
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
          <form method="">
              <select name="month">
                  <?php
                  foreach ($yearMonths as $monthsNumber => $yearMonth): ?>
                  <option value="<?= $monthsNumber+1 ?>"><?= $yearMonth ?></option>
                  <?php endforeach; ?>
              </select>
              <select name="year">
                  <?php
                  for ($year = 1900; $year <= 2100; $year++): ?>
                  <option value="<?= $year ?>"><?= $year ?></option>
                  <?php endfor; ?>
              </select>
              <input type="submit" >
          </form>
          <table class="table table-bordered">
              <thead>
              <?php
              foreach($weekDays as $weekDay): ?>
              <th class="bg-light"><?php echo $weekDay; ?></th>
              <?php endforeach; ?>
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
                           if($cell > $requiredCells){
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