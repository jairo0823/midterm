<!DOCTYPE html>
<html>
<head>
    <title>Reviews List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>All Reviews</h2>
    <?php if (!empty($reviews)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?php echo $review->id; ?></td>
                    <td><?php echo $review->user_id; ?></td>
                    <td><?php echo $review->rating; ?></td>
                    <td><?php echo htmlspecialchars($review->comment); ?></td>
                    <td><?php echo $review->created_at; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reviews found.</p>
    <?php endif; ?>
    <p><a href="<?php echo site_url('reviews/create'); ?>" class="btn btn-primary">Submit New Review</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
