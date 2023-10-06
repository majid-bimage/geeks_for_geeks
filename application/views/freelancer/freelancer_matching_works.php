
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
                  <?php $ctr=0; foreach($matching_works as $work){ $ctr++?>

                    <?php $accepted= false; $w = null; ?>
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
                        <p class="text-xs font-weight-bold mb-0">                    <?php echo $work->work_title; ?> </p>
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-xs font-weight-bold mb-0">  <?php echo $work->description; ?> </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $work->budget; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $work->duration; ?></span>
                      </td>
                      <td class="align-middle  text-center">
                      <?php $bid_exists = in_array($work->id, $submitted_works); ?>

                      <?php if ($bid_exists): ?>
                            <?php
                            foreach ($submitted_bids as $row){
                                if($row['work_id'] == $work->id){
                                    $w  = $row;
                                    if(!$w['status']){
                                        $w['status'] = 5;
                                    }
                                
                                    switch($w['status']){
                                        case "1":
                                            echo '<p class="text-success">Bid Accepted</p>';
                                            
                                            $accepted= true;
                                            break;

                                        case 2:
                                            echo '<p class="text-danger">Bid Rejected</p>';
                                            echo '<button class="btn btn-primary" onclick="showBidForm('.$work->id.')">Edit Bid</button>';
                                            echo "<form class='card'  action='".base_url()."index.php/freelancer/edit_bid/".$work->id."' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 
                                            break;

                                        default:
                                            echo '<p class="text-success">Bid Submitted</p>';
                                            echo '<button class="btn btn-primary" onclick="showBidForm('.$work->id.')">Edit Bid</button>';
                                            echo "<form class='card'  action='".base_url()."index.php/freelancer/edit_bid/".$work->id."' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 

                                            break;
                                    }
                                }
                            }
                            
                        ?>
                            

                        <?php else: ?>
                            <p class="text-info"></p>
                            <button class="btn btn-primary" onclick="showBidForm(<?php echo $work->id; ?>)">Submit Bid</button>
                            <?php 
                            echo "<form class='card' action='".base_url()."index.php/freelancer/submit_bid' method='post' id='bidForm_".$work->id."' style='display:none;'>"; 
                                ?>

                        <?php endif; ?>
                        <?php if(!$accepted){?>          
                            <input type="hidden" name="work_id" value="<?php echo $work->id; ?>">
                            
                            <div class="mb-3 input-group input-group-outline">
                                <label for="bid_amount" class="form-label">Bid Amount ($):</label>
                                <input type="number" class="form-control" name="bid_amount" value="<?php echo isset($w['bid_amount']) ? $w['bid_amount'] : ''; ?>" required>
                            </div>

                            <div class="mb-3 input-group input-group-outline">
                                <!-- <label for="proposal" class="form-label">Proposal:</label> -->
                                <textarea class="form-control" name="proposal" placeholder="proposal" required><?php echo isset($w['proposal']) ? $w['proposal'] : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Bid</button>

                            <?php echo form_close(); }  ?>
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

      <script>
    function showBidForm(workId) {
        // Show the bid form for the specified work
        var bidForm = document.getElementById('bidForm_' + workId);
        if (bidForm.style.display === 'none') {
            bidForm.style.display = 'block';
        } else {
            bidForm.style.display = 'none';
        }
    }
</script>