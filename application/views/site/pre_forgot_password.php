<?php if(!$email){
    ?>
<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <!-- Display validation errors using Bootstrap alert -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <!-- Display custom error message using Bootstrap alert -->
    <?php if (isset($error_message)) echo '<div class="alert alert-danger">' . $error_message . '</div>'; ?>

    <?php echo form_open('Login/check_email'); ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
<!-- 
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div> -->

    <button type="submit" class="btn btn-primary">Submit</button>

    <?php echo form_close(); ?>
    <div class="m-3">
      
      
    </div>
</div>



<?php
}else{
    ?>

<div class="container mt-5">
    <h2 class="text-center">Reset Password</h2>

    <!-- Display validation errors using Bootstrap alert -->
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <!-- Display custom error message using Bootstrap alert -->
    <?php if (isset($error_message)) echo '<div class="alert alert-danger">' . $error_message . '</div>'; ?>

    <?php echo form_open('Login/reset_password'); ?>
<input type="hidden" name="email" value="<?php echo $email; ?>">
    <div class="mb-3">
        <label for="email" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Re enter Password:</label>
        <input type="password" class="form-control" name="reenter" required>
    </div>
<!-- 
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div> -->

    <button type="submit" class="btn btn-primary">Submit</button>

    <?php echo form_close(); ?>
    <div class="m-3">
      
      
    </div>
</div>


    <?php
} ?>