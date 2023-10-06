

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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Note</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>

                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $ctr=0; foreach($shared_code as $code){ $ctr++; ?>


                    <tr>
                      <td  class="align-middle  text-center">
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $ctr; ?></h6>
                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                          </div>
                      </td>
                      <td  class="align-middle  text-center">
                        <p class="text-xs font-weight-bold mb-0">                    <?php echo $code->first_name; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      <td  class="align-middle  text-center">
                      <p class="text-xs font-weight-bold mb-0">                    <?php echo $code->note; ?> </p>
                      </td>

                      <td class="align-middle  text-center">
                            <a href ="<?php echo base_url()."uploads/".$code->filename; ?>" class="btn btn-primary" download>Downlaod</a>
                            <!-- <button onclick="downloadfile('<?php echo $code->filename; ?>')">
                                download
                            </button> -->
                            <p>
                            </p>
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
                    <h4 class="font-weight-bolder text-white ">Collaborate With Friends </h4>

                    </div>
                  <p class="mb-0"></p>
                </div>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div class="card-body">
                  <!-- <form role="form">
                    
                     -->
                <?php // echo form_open('skills/add_skill'); ?>
                <form action="<?php echo base_url('index.php/FreelancerRegistration/uploadcode'); ?>" method="post" enctype="multipart/form-data">

                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">File</label> -->
                      <input type="file" name="codefile"  class="form-control mt-3">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Note</label> <br>
                    <input type="text" class="form-control" name="note">

                    </div>
                    <div class="input-group input-group-outline mb-3">
                    <!-- <label for="freelancer" class="form-label mb-5">Select Freelancer:</label> -->
                        <!-- <textarea class="form-control" name="description"></textarea> -->


                        <select name="freelancer" id="freelancer" class="form-control mt-3">
                        <?php foreach($freelancers as $freelancer){
                            ?>
                        <option value="<?php echo $freelancer['id']; ?>"><?php echo $freelancer['first_name']."-".$freelancer['email']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                    
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save</button>
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