<div class="container mt-5">
    <h2 class="text-center">Freelancer Registration</h2>

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <form action="<?php echo base_url('index.php/FreelancerRegistration/register'); ?>" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <input type="text" class="form-control" name="first_name" required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name:</label>
        <input type="text" class="form-control" name="last_name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phonenumber" class="form-label">Phone Number:</label>
        <input type="text" class="form-control" name="phonenumber" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="mb-3">
        <label for="aadhar_file" class="form-label">Aadhar Card :</label>
        <input type="file" class="form-control" name="aadhar_file" required>
    </div>

    <div class="mb-3">
        <label for="aadhar_number" class="form-label">Aadhar Number :</label>
        <input type="text" class="form-control" name="aadhar_number" required>
    </div>

    <!-- Add more form fields as needed -->

    <button type="submit" class="btn btn-primary">Register</button>

    <?php echo form_close(); ?>
</div>
