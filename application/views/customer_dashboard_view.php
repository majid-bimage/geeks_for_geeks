<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<h2>Welcome to Your Customer Dashboard</h2>

<p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

<!-- Add your dashboard content here -->

<div>
   


</div>
<div class="row">
<div class="col-sm-6">
       
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
    <div class="col-sm-6">
        <h3>Posted works</h3>
        <ul>
    <?php foreach ($posted_works as $work): ?>
        <li>
            <strong>Work Title:</strong> <?php echo $work->work_title; ?><br>
            <strong>Description:</strong> <?php echo $work->description; ?><br>
            <?php 
            if($bids_received[$work->id]){

            
            ?>
            <strong>Bids received:</strong> <?php echo count($bids_received[$work->id]); ?> <a href="<?php echo base_url()."view_bids/".$work->id; ?>">View Bids</a><br>
            <?php }else{
            ?>

                <strong>Bids received:</strong> <?php echo 0; ?><br>

            <?php }

            ?>
            <!-- Display other work details here -->
        </li>
    <?php endforeach; ?>
</ul>
    </div>
</div>

<a href="<?php echo base_url('logout'); ?>">Logout</a>

</body>


</html>
