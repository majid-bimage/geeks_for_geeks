<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS for additional styling */
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Welcome to the Admin Dashboard</h2>

    <p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

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

    <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger">Logout</a>
</div>

<!-- Add Bootstrap JS script link (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
