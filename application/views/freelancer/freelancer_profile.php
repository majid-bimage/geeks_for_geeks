
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo base_url()."assets/admin" ; ?>/assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <?php // print_r($profile); ?>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">

                <?php echo $profile->first_name." ".$profile->last_name; ?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                <!-- CEO / Co-Founder -->
              </p>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="row">
            
            <div class="col-12 col-xl-8">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <button class="btn" onclick="display_edit_form()">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                        </button>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Hi, I’m <?php echo $profile->first_name; ?>, <?php echo $profile->bio; ?>.
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?php echo $profile->first_name." ".$profile->last_name; ?>              </li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?php echo $profile->phone_number; ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $profile->mmail; ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; <?php echo $profile->location; ?></li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div id="profile-edit" class="col-xl-4" style="display:none;">
            <div class="card ">
                <div class="card-header text-center">
                    <div  class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h4 class="font-weight-bolder text-white ">Update Profile</h4>

                    </div>
                  <p class="mb-0"></p>
                </div>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div class="card-body">
                <?php echo validation_errors(); ?>

                <form action="<?php echo base_url('index.php/FreelancerRegistration/update_profile'); ?>" method="POST">
<div class="input-group input-group-outline mb-3">
    <label for="phone" class="form-label">Phone :</label>
    <input class="form-control" type="text" name="phone" value="<?php echo $profile->phone_number; ?>" required>
</div>

<div class="input-group input-group-outline mb-3">
    <label for="location" class="form-label">Location :</label>
    <input class="form-control" type="text" name="location" value="<?php echo $profile->location; ?>" required>
</div>
    <label for="about" class="form-label">Bio :</label>
          
<div class="input-group input-group-outline mb-3">
    <textarea name="bio" id="" cols="30" rows="10" class="form-control"><?php echo $profile->bio; ?></textarea>

</div>
                    <div class="mt-3">
                        <button type="submit" name="remove" class="btn btn-danger">Update Profile</button>
                    </div>
                  </form>



                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <script>
        function display_edit_form(){
            document.getElementById('profile-edit').style.display="block";
        }
    </script>