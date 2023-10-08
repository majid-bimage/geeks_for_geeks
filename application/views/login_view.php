
<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <!-- Display validation errors using Bootstrap alert -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <!-- Display custom error message using Bootstrap alert -->
    <?php if (isset($error_message)) echo '<div class="alert alert-danger">' . $error_message . '</div>'; ?>

    <?php if (isset($success)) echo '<div class="alert alert-success">' . $success . '</div>'; ?>


    <?php echo form_open('Login/process_login'); ?>

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
    <div class="m-3">
        <strong>
            New here ?
        </strong>
        <a href="<?php echo base_url('index.php/customer-registration'); ?>">Register as Customer</a><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?>
        <a href="<?php echo base_url('index.php/freelancer-registration'); ?>">Register as Developer</a><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?>
        <a href="<?php echo base_url('index.php/pre-forgot-password'); ?>">Forgot Password</a><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?><?php echo "&nbsp"; ?>

    </div>
</div>


