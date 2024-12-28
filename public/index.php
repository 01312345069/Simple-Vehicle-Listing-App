<?php
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager('', '', 0, ''); // Instantiate without parameters initially

$action = $_GET['action'] ?? '';

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleManager->addVehicle([
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ]);
    header('Location: index.php');
    exit;
}

// Get all vehicles
$vehicles = $vehicleManager->getVehicles();

include 'views/header.php';

// Display the vehicles
foreach ($vehicles as $index => $vehicle) {
    echo "<div class='card' style='width: 18rem;'>
            <img src='{$vehicle['image']}' class='card-img-top' alt='{$vehicle['name']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$vehicle['name']}</h5>
                <p class='card-text'>Type: {$vehicle['type']}<br>Price: \${$vehicle['price']}</p>
                <a href='edit.php?id={$index}' class='btn btn-warning'>Edit</a>
                <a href='delete.php?id={$index}' class='btn btn-danger'>Delete</a>
            </div>
          </div>";
}

include 'views/footer.php';
