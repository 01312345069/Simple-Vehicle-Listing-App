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
?>

<h2>Edit Vehicle</h2>
<form method="post" action="edit.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label for="name">Vehicle Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $vehicle['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" value="<?php echo $vehicle['type']; ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $vehicle['price']; ?>"
            required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" id="image" name="image" value="<?php echo $vehicle['image']; ?>"
            required>
    </div>
    <button type="submit" class="btn btn-warning">Update Vehicle</button>
</form>

<?php
// Handle the form submission to update the vehicle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    $vehicleManager->editVehicle($id, $updatedData);
    header('Location: index.php');  // Redirect after update
    exit;
}

include 'footer.php'; // Include footer
?>