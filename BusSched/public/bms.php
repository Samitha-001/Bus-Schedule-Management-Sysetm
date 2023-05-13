<?php
// List of available buses in the system
$availableBuses = array("Bus1", "Bus2", "Bus3", "Bus4", "Bus5", "Bus6", "Bus7", "Bus8", "Bus9", "Bus10");

// Calculate the number of buses for each time slot
$totalBuses = count($availableBuses);
$morningBuses = ceil($totalBuses * 0.5);
$dayBuses = ceil($totalBuses * 0.1);
$eveningBuses = ceil($totalBuses * 0.4);

// Shuffle the available buses randomly
shuffle($availableBuses);

// Schedule the buses for morning time
$morningSchedule = array_slice($availableBuses, 0, $morningBuses);

// Schedule the buses for day time
$daySchedule = array_slice($availableBuses, $morningBuses, $dayBuses);

// Schedule the buses for office evening time
$eveningSchedule = array_slice($availableBuses, $morningBuses + $dayBuses, $eveningBuses);

// Output the bus schedule
echo "Morning Time Schedule:\n";
foreach ($morningSchedule as $bus) {
    echo $bus . "\n";
}

echo "\nDay Time Schedule:\n";
foreach ($daySchedule as $bus) {
    echo $bus . "\n";
}

echo "\nOffice Evening Time Schedule:\n";
foreach ($eveningSchedule as $bus) {
    echo $bus . "\n";
}