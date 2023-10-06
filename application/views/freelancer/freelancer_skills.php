

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-7 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <!-- <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div> -->
              <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Skills</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SI No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>

                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php $ctr=0; foreach($freelancer_skills as $skill){ $ctr++; ?>


                    <tr>
                      <td  class="align-middle  text-center">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $ctr; ?></h6>
                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                          </div>
                      </td>
                      <td  class="align-middle  text-center">
                        <p class="text-xs font-weight-bold mb-0">                    <?php echo $skill->skill_name; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      

                     
                      
                    </tr>
                    <?php }
                    ?>
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card ">
                <div class="card-header text-center">
                    <div  class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h4 class="font-weight-bolder text-white ">Update Skills</h4>

                    </div>
                  <p class="mb-0"></p>
                </div>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div class="card-body">
                <?php echo validation_errors(); ?>

<?php echo form_open('freelancer/manage_skills'); ?>

<div class="mb-3">
    <label for="add_skill" class="form-label">Add Skill:</label>
    <select class="form-select" name="add_skill">
    <option value="">Select</option>

        <?php foreach ($skills as $skill): ?>
            <option value="<?php echo $skill->id; ?>"><?php echo $skill->skill_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Add Skill</button>
<?php // echo form_close(); ?>

<div class="mt-3">
    <label for="remove_skill" class="form-label">Remove Skill:</label>
    <select class="form-select" name="remove_skill">
        <option value="">Select</option>
        <?php foreach ($freelancer_skills as $freelancer_skill): ?>
            <option value="<?php echo $freelancer_skill->skill_id; ?>"><?php echo $freelancer_skill->skill_name; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="remove" class="btn btn-danger">Remove Skill</button>
</div>
                  </form>


                  <!-- <form action="<?php echo base_url('index.php/FreelancerRegistration/uploadcode'); ?>" method="post" enctype="multipart/form-data">
                    
                   
                    <input type="text" class="form-control" name="note" placeholder="Description">
                    <button class="btn btn-submit" type="submit">Share</button>
                </form> -->


                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  
                </div>
              </div>



              
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>