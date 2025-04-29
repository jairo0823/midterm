<!DOCTYPE html>
<html>
<head>
    <title>Create Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Create Booking</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="mb-3">
            <label for="room_id" class="form-label">Room:</label>
            <select name="room_id" id="room_id" class="form-select" required>
                <option value="">Select a room</option>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?php echo $room->id; ?>" <?php echo set_select('room_id', $room->id); ?>>
                        <?php echo htmlspecialchars($room->room_type . ' - ₱' . number_format($room->price, 2)); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('room_id', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="mb-3">
            <label for="checkin_date" class="form-label">Check-in Date:</label>
            <input type="date" name="checkin_date" id="checkin_date" class="form-control" value="<?php echo set_value('checkin_date'); ?>" required />
            <?php echo form_error('checkin_date', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="mb-3">
            <label for="checkout_date" class="form-label">Check-out Date:</label>
            <input type="date" name="checkout_date" id="checkout_date" class="form-control" value="<?php echo set_value('checkout_date'); ?>" required />
            <?php echo form_error('checkout_date', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="mb-3">
            <label for="guests" class="form-label">Guests:</label>
            <input type="number" name="guests" id="guests" class="form-control" value="<?php echo set_value('guests'); ?>" min="1" required />
            <?php echo form_error('guests', '<div class="text-danger">', '</div>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Create Booking</button>
    <?php echo form_close(); ?>
    <p><button onclick="window.location.href='<?php echo site_url('users/welcome'); ?>'" class="btn btn-secondary mt-3">Back to Welcome</button></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
