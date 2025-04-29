<!DOCTYPE html>
<html>
<head>
    <title>Rooms List</title>
</head>
<body>
    <h2>Rooms</h2>
    <p><a href="<?php echo site_url('rooms/create'); ?>">Add New Room</a></p>
    <p><button onclick="window.location.href='<?php echo site_url('users/welcome'); ?>'" class="btn btn-secondary">Back to Welcome</button></p>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rooms)) : ?>
                <?php foreach ($rooms as $room) : ?>
                    <tr>
                        <td><?php echo $room->id; ?></td>
                        <td><?php echo $room->hotel_id; ?></td>
                        <td><?php echo $room->room_type; ?></td>
                        <td><?php echo $room->price; ?></td>
                        <td><?php echo $room->status; ?></td>
                        <td><?php echo $room->created_at; ?></td>
                        <td>
                            <a href="<?php echo site_url('rooms/edit/' . $room->id); ?>">Edit</a> |
                            <a href="<?php echo site_url('rooms/delete/' . $room->id); ?>" onclick="return confirm('Are you sure you want to delete this room?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="7">No rooms found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
