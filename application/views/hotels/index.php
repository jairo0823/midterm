<!DOCTYPE html>
<html>
<head>
    <title>Hotels List</title>
</head>
<body>
    <h2>Hotels</h2>
    <p><a href="<?php echo site_url('hotels/create'); ?>">Add New Hotel</a></p>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($hotels)) : ?>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <td><?php echo $hotel->id; ?></td>
                        <td><?php echo $hotel->name; ?></td>
                        <td><?php echo $hotel->location; ?></td>
                        <td><?php echo $hotel->description; ?></td>
                        <td><?php echo $hotel->created_at; ?></td>
                        <td>
                            <a href="<?php echo site_url('hotels/edit/' . $hotel->id); ?>">Edit</a> |
                            <a href="<?php echo site_url('hotels/delete/' . $hotel->id); ?>" onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="6">No hotels found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
