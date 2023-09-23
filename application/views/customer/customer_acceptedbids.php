<div class="col-sm-9 p-5">
    <h2>Accepted Bids</h2>
    <br>
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
                            <?php 
                            switch($bid['work_progress']){
                                case 1:
                                    echo "On Progress";
                                   
                                    break;
                                case 2:
                                    echo "Completed";
                                    if($bid['release_request'] < 1){
                                        ?>
                                        <a class="btn btn-success" href="<?php echo base_url('index.php/CustomerRegistration/releasefund/'.$bid['bidid']); ?>">Release Funds</a>
                                        <?php
                                    }elseif($bid['release_request'] == 1){?>

                                        <button class="btn btn-warning">request raised</button>
                                            <?php
                                    }else{
                                        ?>
                                        <button class="btn btn-success">request raised</button>

                                        <?php
                                    }
                                   
                                    break;
                                default:
                                    echo "Not started";
                                    break;

                            }
                         
                           ?>



                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>