<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
</head>
<body>

<h2>Welcome to Your Customer Dashboard</h2>

<p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

<!-- Add your dashboard content here -->

<div>
   

<h2>Post New Work</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('customer/post-work'); ?>

<label for="work_title">Work Title:</label>
<input type="text" name="work_title" required><br>

<label for="description">Description:</label>
<textarea name="description" required></textarea><br>

<label for="duration">Duration (in days):</label>
<input type="number" name="duration" required><br>

<label for="budget">Budget ($):</label>
<input type="number" name="budget" required><br>

<label for="skills">Skills Required:</label>
<select name="skills[]" multiple="multiple" required>
    <?php foreach ($skills as $skill): ?>
        <option value="<?php echo $skill->id; ?>"><?php echo $skill->skill_name; ?></option>
    <?php endforeach; ?>
</select><br>

<input type="submit" value="Post Work">

</form>

</div>

<a href="<?php echo base_url('logout'); ?>">Logout</a>

</body>
</html>
