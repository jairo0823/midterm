<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>My Bookings</h2>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
    <p><a href="<?php echo site_url('bookings/create'); ?>" class="btn btn-primary mb-3">Book a Room</a></p>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Room ID</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($bookings)) : ?>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking->id; ?></td>
                        <td><?php echo $booking->room_id; ?></td>
                        <td><?php echo $booking->checkin_date; ?></td>
                        <td><?php echo $booking->checkout_date; ?></td>
                        <td><?php echo $booking->guests; ?></td>
                        <td><?php echo $booking->status; ?></td>
                        <td><?php echo $booking->created_at; ?></td>
                        <td>
                            <a href="<?php echo site_url('bookings/edit/' . $booking->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?php echo site_url('bookings/delete/' . $booking->id); ?>" onclick="return confirm('Are you sure you want to delete this booking?');" class="btn btn-sm btn-danger">Delete</a>
                            <a href="<?php echo site_url('payments/create/' . $booking->id); ?>" class="btn btn-sm btn-success">Make Payment</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="8" class="text-center">No bookings found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
