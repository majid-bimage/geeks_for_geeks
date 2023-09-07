<!DOCTYPE html>
<html>
<head>
    <title>Freelancer Dashboard</title>
</head>
<body>

<h2>Welcome to Your Freelancer Dashboard</h2>

<p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

<!-- Add your dashboard content here -->
<div>
    
<h2>Manage Freelancer Skills</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('freelancer/manage_skills'); ?>

<label for="add_skill">Add Skill:</label>
<select name="add_skill" required>
    <?php foreach ($skills as $skill): ?>
        <option value="<?php echo $skill->id; ?>"><?php echo $skill->skill_name; ?></option>
    <?php endforeach; ?>
</select>
<input type="submit" name="add" value="Add Skill">

<br>

<label for="remove_skill">Remove Skill:</label>
<select name="remove_skill" required>
    <?php foreach ($freelancer_skills as $freelancer_skill): ?>
        <option value="<?php echo $freelancer_skill->skill_id; ?>"><?php echo $freelancer_skill->skill_name; ?></option>
    <?php endforeach; ?>
</select>
<input type="submit" name="remove" value="Remove Skill">

</form>
</div>

<a href="<?php echo base_url('logout'); ?>">Logout</a>

</body>
</html>
