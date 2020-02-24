<?php
require_once 'vendor/autoload.php';
use Org_Heigl\TextStatistics\Text;
use Org_Heigl\TextStatistics\TextSTatisticsGenerator;


$csv = array();


if (($handle1 = fopen("input.csv", "r")) !== FALSE) {
if (($handle2 = fopen("output.csv", "w")) !== FALSE) {
while (($data = fgetcsv($handle1, 10000, ";")) !== FALSE) {
// Alter your data $data[0] = '...';
  echo $data[0] . "<br>";
  echo $data[1] . "<br>";
  echo $data[2] . "<br>";
  $textToCheck = $data[1];

  $text = new \Org_Heigl\TextStatistics\Text($data[1]);
// $statGenerator = new \Org_Heigl\TextStatistics\TextSTatisticsGenerator();
// $statGenerator->add('wordCount', \Org_Heigl\TextStatistics\Service\WordCounterFactory::getCalculator());
// $statGenerator->add('flesch', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorFactory::getCalculator());
  $fleschReadingEase = \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorGermanFactory::getCalculator()->calculate($text);
  $data[2] = round($fleschReadingEase,0);
  echo $data[2] . "<br>";
  echo "complete!";
// Write back to CSV format
fputcsv($handle2, $data, ";");
}
fclose($handle2);
}
fclose($handle1);
}




?>
