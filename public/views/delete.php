<?php
// Include header
include 'header.php';

// Get the vehicle ID from the URL
$id = $_GET['id'] ?? null;

if ($id === null) {
    echo "Invalid vehicle ID.";
    exit;
}

$vehicleManager = new \App\Classes\VehicleManager('', '', 0, ''); // Instantiate VehicleManager
$vehicles = $vehicleManager->getVehicles();

// Check if the vehicle exists
if (!isset($vehicles[$id])) {
    echo "Vehicle not found.";
    exit;
}

$vehicle = $vehicles[$id]; // Get the vehicle data

// Display vehicle details for confirmation
?>

<h2>Are you sure you want to delete this vehicle?</h2>

<div class="card" style="width: 18rem;">
    <img src="<?php echo $vehicle['image']; ?>" class="card-img-top" alt="<?php echo $vehicle['name']; ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo $vehicle['name']; ?></h5>
        <p class="card-text">Type: <?php echo $vehicle['type']; ?><br>Price: $<?php echo $vehicle['price']; ?></p>
    </div>
</div>

<form method="post" action="delete.php?id=<?php echo $id; ?>">
    <button type="submit" class="btn btn-danger">Delete Vehicle</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php
// Handle the form submission to delete the vehicle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleManager->deleteVehicle($id);
    header('Location: index.php');  // Redirect after deletion
    exit;
}

include 'footer.php'; // Include footer
?>