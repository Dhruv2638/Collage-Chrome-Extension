<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <table class="table table-bordered table-hover mb-0">
                <thead style="background-color: rgb(111 202 203);">
                <tr>
                    <th class="text-center" style="width:7%;">Id</th>
                    <th class="text-center" style="width:7%;">subjectId</th>
                    <th class="text-center" style="width:7%;">userId</th>
                    <th class="text-center">Video Detail</th>
                    <th class="text-center" style="width:28%;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `video`"; 
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $videoId = $row['videoId'];
                        $userId = $row['userId'];
                        $subjectId = $row['subjectId'];
                        $videoName = $row['videoName'];
                        $videoDesc = $row['videoDesc'];

                        echo '<tr>
                                <td class="text-center"><b>' .$videoId. '</b></td>
                                <td class="text-center"><b>' .$subjectId. '</b></td>
                                <td class="text-center"><b>' .$userId. '</b></td>
                                <td>
                                    <p>Name : <b>' .$videoName. '</b></p>
                                    <p>Description : <b class="truncate">' .$videoDesc. '</b></p>
                                </td>
                                <td class="text-center">
                                    <div class="row mx-auto" style="width:198px">
                                    <button class="btn btn-success" type="submit" onclick="window.open(\'/charusat/files/videos/video-' .$videoId. '.mp4\')">View</button>
                                    <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateVideo' .$videoId. '" style="margin-left:9px;">Edit</button>
                                    <form action="partials/_videoManage.php" method="POST">
                                        <button name="removeVideo" class="btn btn-danger" style="margin-left:9px;">Delete</button>
                                        <input type="hidden" name="videoId" value="'.$videoId. '">
                                    </form></div>
                                </td>
                            </tr>';
                    }
                ?> 
                </tbody>
            </table>
            </div>
        </div>

    </div>
</div>


<?php 
    $videosql = "SELECT * FROM `video`";
    $videoResult = mysqli_query($conn, $videosql);
    while($videoRow = mysqli_fetch_assoc($videoResult)){
        $videoId = $videoRow['videoId'];
        $userId = $videoRow['userId'];
        $subjectId = $videoRow['subjectId'];
        $videoName = $videoRow['videoName'];
        $videoDesc = $videoRow['videoDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateVideo<?php echo $videoId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateVideo<?php echo $videoId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateVideo<?php echo $videoId; ?>">Video Id: <b><?php echo $videoId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_videoManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="subjectId">Subject Id</label></b>
                <input class="form-control" id="subjectId" name="subjectId" value="<?php echo $subjectId; ?>" type="number" min=1 required>
            </div>
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $videoName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="4"><?php echo $videoDesc; ?></textarea>
            </div>
            <input type="hidden" name="videoId" value="<?php echo $videoId; ?>">
            <button type="submit" class="btn btn-success" name="updateVideoDetails">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>