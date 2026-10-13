<?php


// 1. Include the Composer autoloader so PHP can find Carbon
require __DIR__ . '/../vendor/autoload.php';


// DIR in PHP is a magic constant that gives the directory of the current file
// echo __DIR__;


function getDateInHumanForm(DateTime $date):string{
    $now = new DateTime();
    // Get the difference between the current date and target date
    $diff = $now->diff($date);

    if ($diff->y > 0) {
        return "{$diff->y} year's ago";
    } else if ($diff->m > 0) {
        return "{$diff->m} month's ago";
    } else {
        return "{$diff->d} day's ago";
    }
}

// WWW was invented
$wwwDate = new DateTime('1989-03-12');
echo "<p>The WWW was invented ".getDateInHumanForm($wwwDate)."</p>";

// WWW was invented
$iphoneDate = new DateTime('2007-01-09');
echo "<p>The iPhone was invented ".getDateInHumanForm($wwwDate)."</p>";

// Term started
$termStartDate = new DateTime('2026-09-26');
echo "<p>Term started ".getDateInHumanForm($termStartDate)."</p>";

// Term ends
$termEndDate = new DateTime('2026-12-18');
echo "<p>Term ends ".getDateInHumanForm($termEndDate)."</p>";
 


//$diff->invert === 1 date is in the past
//$diff->invert === 0 date is in the future
// $suffix = $diff->invert ? 'ago' : 'from now';

// if ($diff->y > 0) {
//     return "{$diff->y} year's {$suffix}";
// } else if ($diff->m > 0) {
//     return "{$diff->m} month's {$suffix}";
// } else {
//     return "{$diff->d} day's {$suffix}";
// }

/*

// 2. Import the Carbon class
use Carbon\Carbon;

$wwwDate = Carbon::create(1989, 3, 12);
echo "<p>The WWW was invented ".$wwwDate->diffForHumans()."</p>";


$termStartDate = Carbon::create(2026, 9, 26);
echo "<p>Term started ".$termStartDate->diffForHumans()."</p>";

$termEndDate = Carbon::create(2026, 12, 18);
echo "<p>Term ends ".$termEndDate->diffForHumans()."</p>";

*/