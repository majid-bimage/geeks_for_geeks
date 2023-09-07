<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php echo validation_errors(); ?>

<?php if (isset($error_message)) echo '<p>' . $error_message . '</p>'; ?>

<?php echo form_open('login/process_login'); ?>

<label for="email">Email:</label>
<input type="email" name="email" required><br>

<label for="password">Password:</label>
<input type="password" name="password" required><br>

<input type="submit" value="Login">

</form>

</body>
</html>
