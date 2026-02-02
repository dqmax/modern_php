<?php

$waitingList = [
    'Alex Reed',
    'Blake Jordan',
    'Casey Smith',
    'Drew Alex',
    'Elliot Ford',
    'Finley Harper',
    'Jordan Kay',
    'Kim Lee',
    'Liam Park',
    'Morgan Drew'
];

$priorityParticipants = [
    'Jordan Kay', // In the waiting list and has priority
    'Sam Taylor', // Not in the waiting list but has priority
    'Zane Pryor'  // Not in the waiting list but has priority
];
$finalAttendees = [];

$combinedAttendees = array_merge($priorityParticipants, $waitingList);
$uniqueAttendees = array_unique($combinedAttendees);

foreach (array_slice($uniqueAttendees,0,5) as $participant){
    $finalAttendees[] = $participant;
}

sort($finalAttendees);

var_dump($finalAttendees);

$backupCandidates = array_slice($uniqueAttendees,5,3);

foreach ($backupCandidates as $candidate) {
    echo "Hey {$candidate}, we want to inform you that you are one of our backup candidates. 🥳\n";
}
