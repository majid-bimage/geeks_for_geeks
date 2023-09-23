
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Your  Dashboard</title>
    <!-- Add Bootstrap CSS link -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bs5.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/bs5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

</head>
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

        /* Add more custom styles as needed */

        /* Style for bid form */
        .bid-form {
            display: none; /* Hidden by default */
        }

         /* Style for validation errors */
         .validation-errors {
            color: #ff0000;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
<body>
    

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-sm-3">
    <p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

            <ul class="list-group">
                <li class="list-group-item">
                    <a class="btn" href="<?php echo base_url('index.php/Admin'); ?>">Dashboard Home</a>
                </li>
                <li class="list-group-item">
                    <a class="btn" href="<?php echo base_url('index.php/release-fund-requests'); ?>">Release Funds</a>
                </li>
            </ul>
<a class="btn btn-danger mt-3" href="<?php echo base_url('index.php/logout'); ?>">Logout</a>

        </div>