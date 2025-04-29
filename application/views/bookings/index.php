<!DOCTYPE html>
<html>
<head>
    <title>All Bookings</title>
</head>
<body>
    <h2>All Bookings</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
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
                        <td><?php echo $booking->user_id; ?></td>
                        <td><?php echo $booking->room_id; ?></td>
                        <td><?php echo $booking->checkin_date; ?></td>
                        <td><?php echo $booking->checkout_date; ?></td>
                        <td><?php echo $booking->guests; ?></td>
                        <td><?php echo $booking->status; ?></td>
                        <td><?php echo $booking->created_at; ?></td>
                        <td>
                            <a href="<?php echo site_url('bookings/edit/' . $booking->id); ?>">Edit</a> |
                            <a href="<?php echo site_url('bookings/delete/' . $booking->id); ?>" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="9">No bookings found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
