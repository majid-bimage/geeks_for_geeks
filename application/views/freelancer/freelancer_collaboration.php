<div class="col-sm-9 p-5">
    <h2>
        Collaborate with your friends
    </h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 p-3" >
                <h3>
                    Share Code here
                </h3>
                <form action="<?php echo base_url('index.php/FreelancerRegistration/uploadcode'); ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="codefile"  class="form-control">
                    <select name="freelancer" id="freelancer" class="form-control">
                        <?php foreach($freelancers as $freelancer){
                            ?>
                        <option value="<?php echo $freelancer['id']; ?>"><?php echo $freelancer['first_name']."-".$freelancer['email']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="text" class="form-control" name="note" placeholder="Description">
                    <button class="btn btn-submit" type="submit">Share</button>
                </form>
            </div>
            <div class="col-sm-6 p-3">
            <h3>
                Shared Codes
            </h3>
            <table class="table table-striped">
                <?php $ctr=0; foreach($shared_code as $code){ $ctr++; ?>
                    <tr>
                        <td>
                            <?php echo $ctr; ?>
                        </td>
                        <td>
                            <?php echo $code->first_name; ?>
                        </td>
                        <td>
                            <?php echo $code->note; ?>
                        </td>
                        <td>
                            <a href ="<?php echo $code->filename; ?>" class="btn btn-primary" download>Downlaod</a>
                            <button onclick="downloadfile('<?php echo $code->filename; ?>')">
                                download
                            </button>
                            <p>
                            <?php echo $code->filename; ?>
                            </p>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
    function downloadfile(file){
        alert();
        window.open(file);
    }
</script>