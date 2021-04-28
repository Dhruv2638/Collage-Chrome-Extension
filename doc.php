<?php $fixSubjectId = isset($_GET['subjectId']) ? $_GET['subjectId'] : ''; ?>

<div class="mx-3 row my-3">
    <div class="col-md-4">
        <form action="partials/_docManage.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);font-weight: bold;color: black;text-align: center;">
                Upload Files
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label">Document Name: </label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Document Description: </label>
                    <input type="text" class="form-control" name="desc" required>
                </div>
                <label for="doc">Document: </label>
                <input type="file" name="doc" id="doc" accept=".pdf" required style="border:none;">
                <small id="Info" class="form-text text-muted">Only pdf file allow(max size:100mb)</small>
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                <input type="hidden" name="subjectId" value="<?php echo $fixSubjectId; ?>">
                <button type="submit" class="btn btn-success my-1" name="uploadFile">Upload</button>
            </div>
        </div>
        </form>  
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background-color: rgb(111 202 203);font-weight: bold;color: black;text-align: center;">
                Files
            </div>
            <div class="card-body" id="empty">
                <table class="table table-bordered table-hover mb-0">
                    <thead style="background-color: rgb(167 180 168 / 75%);">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Owner</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql = "SELECT * FROM `doc` WHERE `subjectId`=$fixSubjectId"; 
                        $result = mysqli_query($conn, $sql);
                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $docId = $row['docId'];
                            $docName = $row['docName'];
                            $docDesc = $row['docDesc'];
                            $docUserId = $row['userId'];
                            $count++;

                            $namesql = "SELECT * FROM `user` WHERE `userId`=$docUserId"; 
                            $nameresult = mysqli_query($conn, $namesql);
                            $namerow = mysqli_fetch_assoc($nameresult);
                            $username = $namerow['userName'];

                        echo '<tr>
                                <td class="text-center" style="width:21%">'.$docName.'</td>
                                <td class="text-center">'.$docDesc.'</td>
                                <td class="text-center" style="width:18%">'.$username.'</td>
                                <td class="text-center" style="width:11%"><button type="submit" onclick="window.open(\'files/docs/file-' .$docId. '.pdf\')">View</button></td>
                            </tr>';

                        }
                        if($count==0) {
                            ?><script> document.getElementById("empty").innerHTML = '<div class="alert alert-info mb-0" style="width: -webkit-fill-available;">No File Uploaded! Please upload your File.</div>';</script> <?php
                        }
                    ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
