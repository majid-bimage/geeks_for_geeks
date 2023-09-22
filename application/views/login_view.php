<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS for additional styling */
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Login</h2>

    <!-- Display validation errors using Bootstrap alert -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <!-- Display custom error message using Bootstrap alert -->
    <?php if (isset($error_message)) echo '<div class="alert alert-danger">' . $error_message . '</div>'; ?>

    <?php echo form_open('login/process_login'); ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

    <?php echo form_close(); ?>
</div>

<!-- Add Bootstrap JS script link (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
