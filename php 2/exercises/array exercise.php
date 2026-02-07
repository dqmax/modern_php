<?php

$waitingList = ['Dawn White', 'Frank Smith', 'Bob Carter', 'Charlie Davis', 'Eve Black', 'Alice Brown', 'Alice Brown', 'Charlie Davis', 'Grace Jones', 'Hank Green', 'Eve Black', 'Dawn White'];

$removeFromList = ['Dawn White', 'Charlie Davis'];

$waitingList = array_unique($waitingList);
$cleanedWaitingList = [];

foreach ($waitingList as $participant){
    if (!in_array($participant, $removeFromList)){
        $cleanedWaitingList[] = $participant;
    }
}

sort($cleanedWaitingList);

$selectedParticipants = [];

foreach (array_slice($cleanedWaitingList,0,5) as $participant){
    $selectedParticipants[] = $participant;
}

echo "<ul>";
    foreach ($cleanedWaitingList as $name) {
        if (in_array($name, $selectedParticipants)) {
            echo "<li>{$name} ✅</li>";
        } else {
            echo "<li>{$name} ❌</li>";
        }
    }
echo "</ul>";
