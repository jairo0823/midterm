<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Make Payment for Booking #<?php echo $booking->id; ?></h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('payments/create/' . $booking->id, ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount:</label>
            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo isset($amount) ? $amount : set_value('amount'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="gcash" <?php echo set_select('payment_method', 'gcash'); ?>>GCash</option>
                <option value="paypal" <?php echo set_select('payment_method', 'paypal'); ?>>PayPal</option>
                <option value="credit_card" <?php echo set_select('payment_method', 'credit_card'); ?>>Credit Card</option>
                <option value="cash" <?php echo set_select('payment_method', 'cash'); ?>>Cash</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Pay</button>
    <?php echo form_close(); ?>
    <p><button onclick="window.location.href='<?php echo site_url('welcome'); ?>'" class="btn btn-secondary mt-3">Back to Welcome</button></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
