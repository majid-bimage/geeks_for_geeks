<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Works</h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">creation Time</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bids </th>

                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
            $ctr=0;
            foreach($posted_works as $row){
                $ctr++;
                ?>

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
                        <p class="text-xs font-weight-bold mb-0">                    <?php echo $row->work_title;; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">  <?php echo $row->description; ?> </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row->created_at; ?></span>
                      </td>
                      <td class="align-middle">
                      <?php if ($bids_received[$row->id]): ?>
                            <strong>Bids received:</strong> <?php echo count($bids_received[$row->id]); ?> 
                                <br>
                            <a href="<?php echo base_url()."index.php/view_bids/".$row->id; ?>">View Bids</a><br>
                        <?php else: ?>
                            <strong>Bids received:</strong> 0<br>
                        <?php endif; ?>
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