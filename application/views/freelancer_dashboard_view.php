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
<select name="remove_skill" >
    <?php foreach ($freelancer_skills as $freelancer_skill): ?>
        <option value="<?php echo $freelancer_skill->skill_id; ?>"><?php echo $freelancer_skill->skill_name; ?></option>
    <?php endforeach; ?>
</select>
<input type="submit" name="remove" value="Remove Skill">

</form>
</div>

<div>
    
<h3>Matching Works:</h3>

<ul>
    <?php foreach ($matching_works as $work): ?>
        <li>
            <strong>Work Title:</strong> <?php echo $work->work_title; ?><br>
            <strong>Description:</strong> <?php echo $work->description; ?><br>
            <strong>Duration:</strong> <?php echo $work->duration; ?> days<br>
            <strong>Budget:</strong> $<?php echo $work->budget; ?><br>

            <!-- Check if a bid exists for this work -->
            <?php // $bid_exists = check_bid_existence($work->id, $matching_bids);
                $bid_exists = in_array($work->id, $submitted_works);
                $accepted= false;

            ?>

            <?php if ($bid_exists): ?>
                <?php
                foreach ($submitted_bids as $row){
                    if($row['work_id'] == $work->id){
                        $w  = $row;
                        
                    }
                    switch($w['status']){
                        case "1":
                            echo "Bid Accepted";
                            $accepted= true;
                            break;

                        case 2:
                            echo "Bid Rejected";
                            echo '<button onclick="showBidForm(<?php echo $work->id; ?>)">Edit Bid</button>';
                            break;

                        default:
                            echo "Bid Submitted";
                            echo '<button onclick="showBidForm(<?php echo $work->id; ?>)">Edit Bid</button>';
                            break;
                    }
                }
                
            ?>
            
                <!-- Display "Bid Submitted" and "Edit Bid" button -->
                <!-- <p>Bid Status: Bid Submitted</p> -->
                
            <?php  else: ?>
                <?php
                    $w  = array();
                ?>
                <!-- Display "Post Bid" button -->
                <button onclick="showBidForm(<?php echo $work->id; ?>)">Post Bid</button>
            <?php endif; ?>

            
            <!-- Bid form (hidden by default) -->
            <div id="bidForm_<?php echo $work->id; ?>" style="display: none;">
            <?php if ($bid_exists): ?>
                <?php echo form_open('freelancer/edit_bid'); ?>
            <?php else: ?>
                <?php echo form_open('freelancer/submit_bid'); ?>
            <?php endif; ?>

                <input type="hidden" name="work_id" value="<?php echo $work->id; ?>">
                <label for="bid_amount">Bid Amount ($):</label>
                <input type="number" name="bid_amount" value="<?php if($w){ echo $w['bid_amount']; } ?>" required><br>
                <label for="proposal">Proposal:</label>
                <textarea name="proposal" required></textarea><br>
                <input type="submit" value="Submit Bid">
                <?php echo form_close(); ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>



</div>

<a href="<?php echo base_url('logout'); ?>">Logout</a>

<script>
function showBidForm(workId) {
    // Show the bid form for the specified work
    var bidForm = document.getElementById('bidForm_' + workId);
    if (bidForm.style.display === 'none') {
        bidForm.style.display = 'block';
    } else {
        bidForm.style.display = 'none';
    }
}

function editBid(workId) {
    // Redirect to the "Edit Bid" page or show an edit bid form
    // You can implement this based on your project's requirements
}

// Function to check if a bid exists for a work
function check_bid_existence(workId, matchingBids) {
    for (var i = 0; i < matchingBids.length; i++) {
        if (matchingBids[i].work_id === workId) {
            return true;
        }
    }
    return false;
}
</script>

</body>
</html>
