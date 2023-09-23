<div class="col-sm-9">

       
    <h2 class="text-center">Welcome to Your Freelancer Dashboard</h2>

    <!-- Add your dashboard content here -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Manage Freelancer Skills</h2>
                    <?php echo validation_errors(); ?>

                    <?php echo form_open('freelancer/manage_skills'); ?>

                    <div class="mb-3">
                        <label for="add_skill" class="form-label">Add Skill:</label>
                        <select class="form-select" name="add_skill" required>
                            <?php foreach ($skills as $skill): ?>
                                <option value="<?php echo $skill->id; ?>"><?php echo $skill->skill_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Skill</button>
                    <?php echo form_close(); ?>

                    <div class="mt-3">
                        <label for="remove_skill" class="form-label">Remove Skill:</label>
                        <select class="form-select" name="remove_skill">
                            <?php foreach ($freelancer_skills as $freelancer_skill): ?>
                                <option value="<?php echo $freelancer_skill->skill_id; ?>"><?php echo $freelancer_skill->skill_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="remove" class="btn btn-danger">Remove Skill</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h3>Matching Works:</h3>
            <ul class="list-group">
                <?php foreach ($matching_works as $work): ?>
                    <?php $accepted= false; $w = null; ?>
                    <li class="list-group-item">
                        <strong>Work Title:</strong> <?php echo $work->work_title; ?><br>
                        <strong>Description:</strong> <?php echo $work->description; ?><br>
                        <strong>Duration:</strong> <?php echo $work->duration; ?> days<br>
                        <strong>Budget:</strong> $<?php echo $work->budget; ?><br>
                        <?php $bid_exists = in_array($work->id, $submitted_works); ?>
                        <?php if ($bid_exists): ?>
                            <?php
                            foreach ($submitted_bids as $row){
                                if($row['work_id'] == $work->id){
                                    $w  = $row;
                                    if(!$w['status']){
                                        $w['status'] = 5;
                                    }
                                
                                    switch($w['status']){
                                        case "1":
                                            echo '<p class="text-success">Bid Accepted</p>';
                                            
                                            $accepted= true;
                                            break;

                                        case 2:
                                            echo '<p class="text-danger">Bid Rejected</p>';
                                            echo '<button class="btn btn-primary" onclick="showBidForm('.$work->id.')">Edit Bid</button>';
                                            echo "<form action='freelancer/edit_bid/".$work->id."' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 
                                            break;

                                        default:
                                            echo '<p class="text-success">Bid Submitted</p>';
                                            echo '<button class="btn btn-primary" onclick="showBidForm('.$work->id.')">Edit Bid</button>';
                                            echo "<form action='freelancer/edit_bid/".$work->id."' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 

                                            break;
                                    }
                                }
                            }
                            
                        ?>
                            

                        <?php else: ?>
                            <p class="text-info"></p>
                            <button class="btn btn-primary" onclick="showBidForm(<?php echo $work->id; ?>)">Submit Bid</button>
                            <?php 
                            echo "<form action='freelancer/submit_bid' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 
                                ?>

                        <?php endif; ?>
                      <?php if(!$accepted){?>          
                            <input type="hidden" name="work_id" value="<?php echo $work->id; ?>">
                            
                            <div class="mb-3">
                                <label for="bid_amount" class="form-label">Bid Amount ($):</label>
                                <input type="number" class="form-control" name="bid_amount" value="<?php echo isset($w['bid_amount']) ? $w['bid_amount'] : ''; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="proposal" class="form-label">Proposal:</label>
                                <textarea class="form-control" name="proposal" required><?php echo isset($w['proposal']) ? $w['proposal'] : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Bid</button>

                            <?php echo form_close(); }  ?>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Add content for Accepted Works here -->
        </div>
        <div class="col-md-6">
            <!-- Add content for Completed Works here -->
        </div>
    </div>

</div>
</div>
    </div>

<!-- Add Bootstrap JS script link (optional) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
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
</script>
</body>
</html>
