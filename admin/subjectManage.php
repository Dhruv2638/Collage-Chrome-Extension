<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form action="partials/_subjectManage.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(111 202 203);">
                            Create New Subject
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Subject Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Subject Desc: </label>
                                <input type="text" class="form-control" name="desc" required>
                            </div> 
                            <div class="form-group">
								<label for="coverimage" class="control-label">Cover Image</label>
								<input type="file" name="coverimage" id="coverimage" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div> 
                            <div class="form-group">
								<label for="image" class="control-label">Subject Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div>  
                        </div>  
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="createSubject" class="btn btn-sm btn-primary col-sm-3 offset-md-4"> Create </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM Panel -->
    
            <!-- Table Panel -->
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-bordered table-hover mb-0">
                        <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th class="text-center" style="width:7%;">Id</th>
                            <th class="text-center">Img</th>
                            <th class="text-center" style="width:42%;">Subject Detail</th>
                            <th class="text-center" style="width:18%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM `subject`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $subjectId = $row['subjectId'];
                                $subjectName = $row['subjectName'];
                                $subjectDesc = $row['subjectDesc'];

                                echo '<tr>
                                        <td class="text-center"><b>' .$subjectId. '</b></td>
                                        <td><img src="/charusat/images/subject/subjectcover-'.$subjectId. '.jpg" alt="cover for this Subject" width="286px" height="94px">
                                        <img class="rounded-circle bg-dark" src="/charusat/images/subject/subject-'.$subjectId. '.jpg" alt="image for this Subject" width="100px" height="100px" style="margin-left: 95px;margin-top: -53px;">
                                        </td>
                                        <td>
                                            <p>Name : <b>' .$subjectName. '</b></p>
                                            <p>Description : <b class="truncate">' .$subjectDesc. '</b></p>
                                        </td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateSubject' .$subjectId. '">Edit</button>
                                            <form action="partials/_subjectManage.php" method="POST">
                                                <button name="removeSubject" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                <input type="hidden" name="subjectId" value="'.$subjectId. '">
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
            <!-- Table Panel -->
        </div>
    </div>	    
</div>


<?php 
    $catsql = "SELECT * FROM `subject`";
    $catResult = mysqli_query($conn, $catsql);
    while($catRow = mysqli_fetch_assoc($catResult)){
        $subjectId = $catRow['subjectId'];
        $subjectName = $catRow['subjectName'];
        $subjectDesc = $catRow['subjectDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateSubject<?php echo $subjectId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateSubject<?php echo $subjectId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateSubject<?php echo $subjectId; ?>">Subject Id: <b><?php echo $subjectId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_subjectManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-6">
					<b><label for="coverimage">Cover Image</label></b>
					<input type="file" name="coverimage" id="coverimage" accept=".jpg" class="form-control" required style="border:none;">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" name="subjectId" value="<?php echo $subjectId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateCoverPhoto">Update CoverImg</button>
				</div>
				<div class="form-group col-md-6">
					<img src="/charusat/images/subject/subjectcover-<?php echo $subjectId; ?>.jpg" alt="cover image" width="208px" height="94px">
				</div>
			</div>
		</form>
        <form action="partials/_subjectManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" name="subjectId" value="<?php echo $subjectId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateSubjectPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/charusat/images/subject/subject-<?php echo $subjectId; ?>.jpg" alt="Subject image" width="100" height="100">
				</div>
			</div>
		</form>
        <form action="partials/_subjectManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $subjectName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="4"><?php echo $subjectDesc; ?></textarea>
            </div>
            <input type="hidden" name="subjectId" value="<?php echo $subjectId; ?>">
            <button type="submit" class="btn btn-success" name="updateSubject">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>