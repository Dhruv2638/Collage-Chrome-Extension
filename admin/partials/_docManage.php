<?php
    include $_SERVER['DOCUMENT_ROOT'].'/charusat/admin/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateDocDetails'])) {
        $name = $_POST["name"];
        $subjectId = $_POST["subjectId"];
        $desc = $_POST["desc"];
        $docId = $_POST["docId"];

        $sql = "UPDATE `doc` SET `docName`='$name', `docDesc`='$desc', `subjectId`='$subjectId' WHERE `docId`='$docId'";   
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

    if(isset($_POST['removeDoc'])) {
        $docId = $_POST["docId"];

        $filename = $_SERVER['DOCUMENT_ROOT']."/charusat/files/docs/file-".$docId.".pdf";
        $sql = "DELETE FROM `doc` WHERE `docId`='$docId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
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
}
?>