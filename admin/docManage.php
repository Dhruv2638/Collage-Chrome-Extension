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
                    <th class="text-center">File Detail</th>
                    <th class="text-center" style="width:28%;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `doc`"; 
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $docId = $row['docId'];
                        $userId = $row['userId'];
                        $subjectId = $row['subjectId'];
                        $docName = $row['docName'];
                        $docDesc = $row['docDesc'];

                        echo '<tr>
                                <td class="text-center"><b>' .$docId. '</b></td>
                                <td class="text-center"><b>' .$subjectId. '</b></td>
                                <td class="text-center"><b>' .$userId. '</b></td>
                                <td>
                                    <p>Name : <b>' .$docName. '</b></p>
                                    <p>Description : <b class="truncate">' .$docDesc. '</b></p>
                                </td>
                                <td class="text-center">
                                    <div class="row mx-auto" style="width:198px">
                                    <button class="btn btn-success" type="submit" onclick="window.open(\'/charusat/files/docs/file-' .$docId. '.pdf\')">View</button>
                                    <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateDoc' .$docId. '" style="margin-left:9px;">Edit</button>
                                    <form action="partials/_docManage.php" method="POST">
                                        <button name="removeDoc" class="btn btn-danger" style="margin-left:9px;">Delete</button>
                                        <input type="hidden" name="docId" value="'.$docId. '">
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
    $docsql = "SELECT * FROM `doc`";
    $docResult = mysqli_query($conn, $docsql);
    while($docRow = mysqli_fetch_assoc($docResult)){
        $docId = $docRow['docId'];
        $userId = $docRow['userId'];
        $subjectId = $docRow['subjectId'];
        $docName = $docRow['docName'];
        $docDesc = $docRow['docDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateDoc<?php echo $docId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateDoc<?php echo $docId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateDoc<?php echo $docId; ?>">Document Id: <b><?php echo $docId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_docManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="subjectId">Subject Id</label></b>
                <input class="form-control" id="subjectId" name="subjectId" value="<?php echo $subjectId; ?>" type="number" min=1 required>
            </div>
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $docName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="4"><?php echo $docDesc; ?></textarea>
            </div>
            <input type="hidden" name="docId" value="<?php echo $docId; ?>">
            <button type="submit" class="btn btn-success" name="updateDocDetails">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>