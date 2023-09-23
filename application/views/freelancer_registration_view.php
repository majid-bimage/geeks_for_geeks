<div class="container">
    <h2 class="text-center">Freelancer Registration</h2>

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <?php echo form_open('FreelancerRegistration/register'); ?>

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
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <!-- Add more form fields as needed -->

    <button type="submit" class="btn btn-primary">Register</button>

    <?php echo form_close(); ?>
</div>

<!-- Add Bootstrap JS script link (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
