<div class="col-sm-9">
    <table class="table table-striped"> 
        <thead>
            <tr>
                <th>SI No.</th>
                <th>Title</th>
                <th>Release</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ctr=0;
            foreach($requests as $row){
                $ctr++;
                ?>
                <tr>
                    <td>
                        <?php echo $ctr; ?>
                    </td>
                    <td>
                    <?php echo $row['work_title']; ?>

                    </td>
                    <td>
                        <a class="btn" href="<?php echo base_url('index.php/AdminController/releasefund/'.$row['bidid']); ?>">Release</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>