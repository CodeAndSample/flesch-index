<?php
require_once 'vendor/autoload.php';
use Org_Heigl\TextStatistics\Text;
use Org_Heigl\TextStatistics\TextSTatisticsGenerator;


$csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
  $name = $_FILES['csv']['name'];
  $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
  $type = $_FILES['csv']['type'];
  $tmpName = $_FILES['csv']['tmp_name'];

  // check the file is a csv
  if($ext === 'csv'){
    if(($handle = fopen($tmpName, 'r')) !== FALSE) {
      // necessary if a large csv file
      set_time_limit(0);

      $row = 0;
      // sample
      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="sample.csv"');
      $user_CSV[0] = array('URL', 'Content');
      // original
      while(($data = fgetcsv($handle, 100000, ';')) !== FALSE) {
        // number of fields in the csv
        $col_count = count($data);

        // get the values from the csv
        $csv[$row]['URL'] = $data[0];
        $csv[$row]['Content'] = $data[1];



        $csv[$row]['Flesch'] = "Flesch";
        // inc the row
        $row++;

        // das wird wahrscheinlich nicht funktionieren
        $data[1] = '"'. $data[1] . '"';

        // Alternativerr Vorschlag
        // str_replace('"', '', $data[1]);
        // str_replace(''', '', $data[1]);

        $text = new \Org_Heigl\TextStatistics\Text($data[1]);
        // $statGenerator = new \Org_Heigl\TextStatistics\TextSTatisticsGenerator();
        // $statGenerator->add('wordCount', \Org_Heigl\TextStatistics\Service\WordCounterFactory::getCalculator());
        // $statGenerator->add('flesch', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorFactory::getCalculator());
          $fleschReadingEase = \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorGermanFactory::getCalculator()->calculate($text);
          $data[2] = round($fleschReadingEase,0);

        //sample
        $user_CSV[$row+1] = array($data[0],$data[1],$data[2]);
      }
      //sample
      // very simple to increment with i++ if looping through a database result


      $fp = fopen('php://output', 'wb');
      foreach ($user_CSV as $line) {
        // though CSV stands for "comma separated value"
        // in many countries (including France) separator is ";"
        fputcsv($fp, $line, ';');
      }
      fclose($fp);



      fclose($handle);
    }
  }
}









?>
