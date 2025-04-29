<!DOCTYPE html>
<html>
<head>
    <title>Add New Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Add New Hotel</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('hotels/create', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="<?php echo set_value('location'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" required><?php echo set_value('description'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Hotel</button>
    <?php echo form_close(); ?>
    <p><button onclick="window.location.href='<?php echo site_url('users/welcome'); ?>'" class="btn btn-secondary mt-3">Back to Welcome</button></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
