<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Welcome to the Admin Dashboard</h2>

<p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

<!-- Add your admin dashboard content here -->
<div>
    
<h2>Add Skill</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('skills/add_skill'); ?>

<label for="skill_name">Skill Name:</label>
<input type="text" name="skill_name" required><br>

<label for="description">Description:</label>
<textarea name="description"></textarea><br>

<input type="submit" value="Add Skill">

</form>
</div>
<a href="<?php echo base_url('logout'); ?>">Logout</a>

</body>
</html>
