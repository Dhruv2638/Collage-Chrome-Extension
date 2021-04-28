<?php
    include $_SERVER['DOCUMENT_ROOT'].'/charusat/admin/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createSubject'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO `subject` (`subjectName`, `subjectDesc`, `subjectCreateDate`) VALUES ('$name', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $subjectId = $conn->insert_id;
        if($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            $check1 = getimagesize($_FILES["coverimage"]["tmp_name"]);
            if($check !== false && $check1 !== false) {
                
                $newfilename = "subjectcover-".$subjectId.".jpg";
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/charusat/images/subject/';
                $uploadfile = $uploaddir . $newfilename;

                $newfilename1 = "subject-".$subjectId.".jpg";
                $uploaddir1 = $_SERVER['DOCUMENT_ROOT'].'/charusat/images/subject/';
                $uploadfile1 = $uploaddir1 . $newfilename1;

                if (move_uploaded_file($_FILES['coverimage']['tmp_name'], $uploadfile) && move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile1)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed to upload image');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Please select an image file to upload.");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeSubject'])) {
        $subjectId = $_POST["subjectId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/charusat/images/subject/subjectcover-".$subjectId.".jpg";
        $filename1 = $_SERVER['DOCUMENT_ROOT']."/charusat/images/subject/subject-".$subjectId.".jpg";
        $sql = "DELETE FROM `subject` WHERE `subjectId`='$subjectId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            if (file_exists($filename1)) {
                unlink($filename1);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateSubject'])) {
        $subjectId = $_POST["subjectId"];
        $subjectName = $_POST["name"];
        $subjectDesc = $_POST["desc"];

        $sql = "UPDATE `subject` SET `subjectName`='$subjectName', `subjectDesc`='$subjectDesc' WHERE `subjectId`='$subjectId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCoverPhoto'])) {
        $subjectId = $_POST["subjectId"];
        $check = getimagesize($_FILES["coverimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'subjectcover-'.$subjectId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/charusat/images/subject/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['coverimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
    
    if(isset($_POST['updateSubjectPhoto'])) {
        $subjectId = $_POST["subjectId"];
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $newName = 'subject-'.$subjectId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/charusat/images/subject/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>