<div class="col-sm-9 p-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SI No.</th>
                <th>Title</th>
                <th>
                    Description
                </th>
                <th>
                    Budget
                </th>
                <th>
                    Duration
                </th>
                <th>
                    status
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $ctr=0; foreach($accepted_bids as $bid){ $ctr++?>
                <tr>
                    <td><?php echo $ctr; ?></td>
                    <td>
                    <?php echo $bid['work_title']; ?>
                    </td>
                    <td>
                    <?php echo $bid['description']; ?>

                    </td>
                    <td>
                    <?php echo $bid['budget']; ?>

                    </td>
                    <td>
                    <?php echo $bid['duration']; ?>

                    </td>
                    <td>
                    <form action="<?php echo base_url('index.php/FreelancerRegistration/markcompleted');?>" method="post">
                        <input type="hidden" name="bidid" value="<?php echo $bid['bidid']; ?>">
                        <select class="form-control" name="bidstatus" id="<?php echo 'bidstatus_'.$ctr; ?>">
                            <?php if($bid['work_progress'] >0 ){    
                                if($bid['work_progress'] == 1 ){
                                    ?>
                                       <option value="0">Not Started</option>
                            <option value="1" selected>On Progress</option>
                            <option value="2">Completed</option>
                                    <?php
                                }else{
                                    ?>
                                       <option value="0">Not Started</option>
                            <option value="1">On Progress</option>
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
                        <button type="submit" class="btn btn-warning"> Submit</button>
                    </form>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>