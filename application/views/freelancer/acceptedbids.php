
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Freelancers</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SI No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duration</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $ctr=0; foreach($accepted_bids as $bid){ $ctr++?>


                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="<?php echo base_url()."assets/admin"; ?>/assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $ctr; ?></h6>
                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">                    <?php echo $bid['work_title']; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">  <?php echo $bid['description']; ?> </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $bid['budget']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $bid['duration']; ?></span>
                      </td>
                      <td class="align-middle  text-center">
                            <form action="<?php echo base_url('index.php/FreelancerRegistration/markcompleted');?>" method="post">
                                <input type="hidden" name="bidid" value="<?php echo $bid['bidid']; ?>">
                                <select class="form-control border text-center" name="bidstatus" id="<?php echo 'bidstatus_'.$ctr; ?>">
                                    <?php if($bid['work_progress'] >0 ){    
                                        if($bid['work_progress'] == 1 ){
                                            ?>
                                            <option value="0">Not Started</option>
                                            <option value="1" selected>On Progress</option>
                                            <option value="2">Completed</option>
                                            <?php
                                        }else{
                                            ?>
                                            <!-- <option value="0">Not Started</option> -->
                                            <!-- <option value="1">On Progress</option> -->
                                            <option value="2" selected>Completed</option>
                                            <?php
                                            
                                        }

                                    }else{
                                        ?>
                                        <option value="0">Not Started</option>
                                        <option value="1">On Progress</option>
                                        <option value="2">Completed</option>
                                        <?php
                                    }
                                    ?>


                                </select>
                                <button type="submit" class="btn btn-warning mt-3"> Submit</button>
                            </form>

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