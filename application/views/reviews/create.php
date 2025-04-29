<!DOCTYPE html>
<html>
<head>
    <title>Submit Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Submit Review</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('reviews/create', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5" class="form-control" value="<?php echo set_value('rating'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea name="comment" id="comment" class="form-control" required><?php echo set_value('comment'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    <?php echo form_close(); ?>
    <p><button onclick="window.location.href='<?php echo site_url('welcome'); ?>'" class="btn btn-secondary mt-3">Back to Dashboard</button></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
