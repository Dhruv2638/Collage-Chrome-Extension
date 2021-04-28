<?php
    include $_SERVER['DOCUMENT_ROOT'].'/charusat/admin/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateVideoDetails'])) {
        $name = $_POST["name"];
        $subjectId = $_POST["subjectId"];
        $desc = $_POST["desc"];
        $videoId = $_POST["videoId"];

        $sql = "UPDATE `video` SET `videoName`='$name', `videoDesc`='$desc', `subjectId`='$subjectId' WHERE `videoId`='$videoId'";   
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

    if(isset($_POST['removeVideo'])) {
        $videoId = $_POST["videoId"];

        $filename = $_SERVER['DOCUMENT_ROOT']."/charusat/files/videos/video-".$videoId.".mp4";
        $sql = "DELETE FROM `video` WHERE `videoId`='$videoId'";   
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