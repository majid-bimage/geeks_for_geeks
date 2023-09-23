<div class="col-sm-9">

    <!-- Add your admin dashboard content here -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <h2>Add Skill</h2>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <?php echo form_open('skills/add_skill'); ?>

                <div class="mb-3">
                    <label for="skill_name" class="form-label">Skill Name:</label>
                    <input type="text" class="form-control" name="skill_name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Skill</button>

                <?php echo form_close(); ?>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h2>
                    Skills
                </h2>
                <ul class="list-group list-group-flush">
                    <?php foreach($skills as $skill){
                        echo "<li class='list-group-item'>".$skill->skill_name."</li>";
                    }
                   ?>
                </ul>
            </div>


        </div>
        <div class="row">
                    <h2>Freelancers</h2>
                    <table class="table table-striped">
                    <?php
                        foreach($freelancers as $freelancer){
                            echo "<tr>";
                            echo "<td>".$freelancer['first_name']." ".$freelancer['last_name']."</td>";
                            echo "</tr>";

                        }
                    ?>
                    </table>
                    
        </div>
        
    </div>

    </div>
