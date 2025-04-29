<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Room</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('rooms/edit/' . $room->id, ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel:</label>
            <select name="hotel_id" id="hotel_id" class="form-select" required>
                <option value="">Select Hotel</option>
                <?php foreach ($hotels as $hotel): ?>
                    <option value="<?php echo $hotel->id; ?>" <?php echo set_select('hotel_id', $hotel->id, ($hotel->id == $room->hotel_id)); ?>><?php echo $hotel->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="room_type" class="form-label">Room Type:</label>
            <input type="text" name="room_type" id="room_type" class="form-control" value="<?php echo set_value('room_type', $room->room_type); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="<?php echo set_value('price', $room->price); ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="available" <?php echo set_select('status', 'available', ($room->status == 'available')); ?>>Available</option>
                <option value="unavailable" <?php echo set_select('status', 'unavailable', ($room->status == 'unavailable')); ?>>Unavailable</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    <?php echo form_close(); ?>
    <p><button onclick="window.location.href='<?php echo site_url('users/welcome'); ?>'" class="btn btn-secondary mt-3">Back to Welcome</button></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
