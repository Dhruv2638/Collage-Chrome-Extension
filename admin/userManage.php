
<div class="container-fluid" style="margin-top:98px">
	
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>UserId</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM user"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['userId'];
                                $username = $row['userName'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $userType = $row['userType'];
                                if($userType == 0) 
                                    $userType = "user";
                                else
                                    $userType = "Admin";

                                echo '<tr>
                                    <td>' .$Id. '</td>
                                    <td>' .$username. '</td>
                                    <td>
                                        <p>First Name : <b>' .$firstName. '</b></p>
                                        <p>Last Name : <b>' .$lastName. '</b></p>
                                    </td>
                                    <td>' .$email. '</td>
                                    <td>' .$userType. '</td>
                                    <td class="text-center">
                                        <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUser' .$Id. '" type="button">Edit</button>';
                                            if($Id == 1) {
                                                echo '<button class="btn btn-sm btn-danger" disabled style="margin-left:9px;">Delete</button>';
                                            }
                                            else {
                                                echo '<form action="partials/_userManage.php" method="POST">
                                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                        <input type="hidden" name="Id" value="'.$Id. '">
                                                    </form>';
                                            }

                                    echo '</div>
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
    $usersql = "SELECT * FROM `user`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['userId'];
        $name = $userRow['userName'];
        $firstName = $userRow['firstName'];
        $lastName = $userRow['lastName'];
        $email = $userRow['email'];
        $userType = $userRow['userType'];


?>
<!-- editUser Modal -->
<div class="modal fade" id="editUser<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="editUser<?php echo $Id; ?>">User Id: <b><?php echo $Id; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            
            <form action="partials/_userManage.php" method="post">
                <div class="form-group">
                    <b><label for="username">Username</label></b>
                    <input class="form-control" id="username" name="username" value="<?php echo $name; ?>" type="text" disabled>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <b><label for="firstName">First Name:</label></b>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <b><label for="lastName">Last name:</label></b>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                </div>
                </div>
                <div class="form-group">
                    <b><label for="email">Email:</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group row my-0 mb-2">
                    <div class="form-group col-md-6 my-0">
                        <b><label for="userType">Type:</label></b>
                        <select name="userType" id="userType" class="custom-select browser-default" required>
                        <?php 
                            if($userType == 1) {
                        ?>
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        <?php
                            } 
                            else {
                        ?>
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        <?php
                            } 
                        ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" name="editUser" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
  </div>
</div>

<?php
    }
?>