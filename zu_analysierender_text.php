<?php

require_once 'vendor/autoload.php';



// get the q parameter from URL
$q = $_REQUEST["q"];

$text = new \Org_Heigl\TextStatistics\Text($q);

// $statGenerator = new \Org_Heigl\TextStatistics\TextSTatisticsGenerator();
// $statGenerator->add('wordCount', \Org_Heigl\TextStatistics\Service\WordCounterFactory::getCalculator());
// $statGenerator->add('flesch', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorFactory::getCalculator());

$statGenerator = new \Org_Heigl\TextStatistics\TextSTatisticsGenerator();

// $statGenerator->add('fleschDE', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorGermanFactory::getCalculator());
// $statGenerator->add('fleschEN', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorFactory::getCalculator());



// AverageSentenceLength
// AverageSyllablesper word
// CharacterCountIncludingWhitespace
// CharacterCountExcludingWhitespace
// FleschReadingEaseforEnglishtexts
// FleschReadingEaseforGermantexts
// FleschReadingEaseSchoolGrademeasurement
// SentenceCount
// MaxSyllablesinSentence
// MaxWordsinSentence
// SyllableCount
// WordCount
// MaxSyllablesinWord

// Number of words with minimum N characters
// Percentage of Words with minimum N characters
// Number of words with minimum N syllables
// Percentage of words with minimum N syllables
// Number of words with only N syllables
// Percentage of words with only N syllables

// $statGenerator->add('AverageReadingDurationCalculator', \Org_Heigl\TextStatistics\Service\AverageReadingDurationCalculatorFactory::getCalculator());
// $statGenerator->add('AverageSentenceLengthCalculator', \Org_Heigl\TextStatistics\Service\AverageSentenceLengthCalculatorFactory::getCalculator());
// $statGenerator->add('AverageSyllablesPerWordCalculator', \Org_Heigl\TextStatistics\Service\AverageSyllablesPerWordCalculatorFactory::getCalculator());
$statGenerator->add('CharacterCounter', \Org_Heigl\TextStatistics\Service\CharacterCounterFactory::getCalculator());
// $statGenerator->add('CharacterWithoutWhitespaceCounter', \Org_Heigl\TextStatistics\Service\CharacterWithoutWhitespaceCounterFactory::getCalculator());
// $statGenerator->add('FleschKincaidGradeLevelCalculator', \Org_Heigl\TextStatistics\Service\FleschKincaidGradeLevelCalculatorFactory::getCalculator());
// $statGenerator->add('FleschReadingEaseCalculator', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorFactory::getCalculator());
$statGenerator->add('FleschReadingEaseCalculatorGerman', \Org_Heigl\TextStatistics\Service\FleschReadingEaseCalculatorGermanFactory::getCalculator());
// $statGenerator->add('FleschReadingEaseSchoolGradeCalculator', \Org_Heigl\TextStatistics\Service\FleschReadingEaseSchoolGradeCalculatorFactory::getCalculator());
$statGenerator->add('SentenceCounter', \Org_Heigl\TextStatistics\Service\SentenceCounterFactory::getCalculator());
// $statGenerator->add('SentenceMaxSyllablesCalculator', \Org_Heigl\TextStatistics\Service\SentenceMaxSyllablesCalculatorFactory::getCalculator());
$statGenerator->add('SyllableCounter', \Org_Heigl\TextStatistics\Service\SyllableCounterFactory::getCalculator());
$statGenerator->add('WordCounter', \Org_Heigl\TextStatistics\Service\WordCounterFactory::getCalculator());
// $statGenerator->add('WordsWithNSyllablesCounter', \Org_Heigl\TextStatistics\Service\WordsWithNSyllablesCounterFactory::getCalculator());


// $hint = print_R($statGenerator->calculate($text));
$fleschIndex =  $statGenerator->calculate($text);
$fleschIndexText = $fleschIndex[FleschReadingEaseCalculatorGerman];
$fleschSentencesText = $fleschIndex[SentenceCounter];
$fleschWordsText = $fleschIndex[WordCounter];
$fleschSyllablesText = $fleschIndex[SyllableCounter];
$fleschCharactersText = $fleschIndex[CharacterCounter];


$hint = " " . $fleschIndexText . "</p>" ."<p>Sätze: " . $fleschIndexText . "</p>" .
"<p>Sätze: " . $fleschSentencesText . "</p>" .
"<p>Wörter: " . $fleschWordsText . "</p>" .
"<p>Silben: " . $fleschSyllablesText . "</p>".
"<p>Zeichen (inklusive Leerzeichen): " . $fleschCharactersText . "</p>";

print_r($hint);

// Output "no suggestion" if no hint was found or output correct values







// array(
//    'wordCount' => xx,
//    'flesch' => yy,
// )
?>
