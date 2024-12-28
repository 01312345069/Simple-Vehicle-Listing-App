<?php include 'header.php'; ?>

<h2>Add Vehicle</h2>
<form method="post" action="index.php?action=add">
    <div class="form-group">
        <label for="name">Vehicle Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Vehicle</button>
</form>

<?php include 'footer.php'; ?>