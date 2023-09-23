<div class="col-sm-9">

    <!-- Add your dashboard content here -->
    <div class="row">
        <div class="col-sm-4">
            <h2>Post New Work</h2>

            <?php echo validation_errors('<div class="validation-errors">', '</div>'); ?>

            <?php echo form_open('customer/post-work'); ?>

            <div class="mb-3">
                <label for="work_title" class="form-label">Work Title:</label>
                <input class="form-control" type="text" name="work_title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in days):</label>
                <input class="form-control" type="number" name="duration" required>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label">Budget ($):</label>
                <input class="form-control" type="number" name="budget" required>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Skills Required:</label>
                <select class="form-select" name="skills[]" multiple="multiple" required>
                    <?php foreach ($skills as $skill): ?>
                        <option value="<?php echo $skill->id; ?>"><?php echo $skill->skill_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input class="btn btn-primary" type="submit" value="Post Work">

            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-4">
            <h3>Posted works</h3>
            <ul class="list-group">
                <?php foreach ($posted_works as $work): ?>
                    <li class="list-group-item">
                        <strong>Work Title:</strong> <?php echo $work->work_title; ?><br>
                        <strong>Description:</strong> <?php echo $work->description; ?><br>
                        <?php if ($bids_received[$work->id]): ?>
                            <strong>Bids received:</strong> <?php echo count($bids_received[$work->id]); ?> <a href="<?php echo base_url()."index.php/view_bids/".$work->id; ?>">View Bids</a><br>
                        <?php else: ?>
                            <strong>Bids received:</strong> 0<br>
                        <?php endif; ?>
                        <!-- Display other work details here -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <br>
                        </div>
