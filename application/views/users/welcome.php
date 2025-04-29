<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome - Hotel Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('<?php echo base_url("assets/images/hotel_background.jpg"); ?>') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-shadow: 1px 1px 2px #000;
        }
        .landing-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            text-align: center;
        }
        .landing-container h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .landing-container h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .landing-container p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .btn-landing {
            margin: 5px;
            padding: 10px 25px;
            font-size: 1.1rem;
        }
        .alert-info {
            background-color: rgba(23, 162, 184, 0.8);
            border-color: rgba(23, 162, 184, 0.8);
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="landing-container">
    <h1>HOTEL BOOKING SYSTEM</h1>
    <h2>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
    <p>You have successfully logged in.</p>
  
        <a href="<?php echo site_url('rooms'); ?>" class="btn btn-primary btn-landing">View Rooms</a>
        <a href="<?php echo site_url('bookings/create'); ?>" class="btn btn-primary btn-landing">Create Booking</a>
        <a href="<?php echo site_url('bookings/my_bookings'); ?>" class="btn btn-primary btn-landing">View My Bookings</a>
        <a href="<?php echo site_url('reviews/create'); ?>" class="btn btn-primary btn-landing">Submit Review</a>
        <a href="<?php echo site_url('users/logout'); ?>" class="btn btn-danger btn-landing">Logout</a>
    </div>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-info"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
