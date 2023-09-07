<!DOCTYPE html>
<html>
<head>
    <title>Freelancer Registration</title>
</head>
<body>

<h2>Freelancer Registration</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('FreelancerRegistration/register'); ?>

<label for="first_name">First Name:</label>
<input type="text" name="first_name" required><br>

<label for="last_name">Last Name:</label>
<input type="text" name="last_name" required><br>

<label for="email">Email:</label>
<input type="email" name="email" required><br>

<label for="password">Password:</label>
<input type="password" name="password" required><br>

<!-- Add more form fields as needed -->

<input type="submit" value="Register">

</form>

</body>
</html>
