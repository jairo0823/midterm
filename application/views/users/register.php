<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f4ea;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #2e7d32;
            margin-bottom: 20px;
        }
        label {
            color: #2e7d32;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #388e3c;
        }
        p {
            margin-top: 15px;
        }
        a {
            color: #2e7d32;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php echo validation_errors('<p class="error-message">', '</p>'); ?>
        <?php echo form_open('users/register'); ?>
            <p>
                <label for="name">Name:</label><br>
                <input type="text" name="name" value="<?php echo set_value('name'); ?>">
            </p>
            <p>
                <label for="email">Email:</label><br>
                <input type="email" name="email" value="<?php echo set_value('email'); ?>">
            </p>
            <p>
                <label for="password">Password:</label><br>
                <input type="password" name="password">
            </p>
            <p>
                <button type="submit">Register</button>
            </p>
        <?php echo form_close(); ?>
        <p>Already have an account? <a href="<?php echo site_url('users/login'); ?>">Login here</a></p>
    </div>
</body>
</html>
