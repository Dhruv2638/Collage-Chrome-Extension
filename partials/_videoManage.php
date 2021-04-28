<?php
    include $_SERVER['DOCUMENT_ROOT'].'/charusat/dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['uploadVideo'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $userId = $_POST["userId"];
        $subjectId = $_POST["subjectId"];

        $sql = "INSERT INTO `video` (`videoName`, `userId`, `subjectId`, `videoDesc`, `uploadDate`) VALUES ('$name', '$userId', '$subjectId', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $videoId = $conn->insert_id;
        if($result) {
            
            if (is_uploaded_file($_FILES['video']['tmp_name'])) 
            {
                $ext = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

                $newfilename = "video-".$videoId.".".$ext;
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/charusat/files/videos/';
                $uploadfile = $uploaddir . $newfilename;           
                
                if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed');
                            window.location=document.referrer;
                        </script>";
                }
            } 
            else
            {
                echo "<script>alert('not uploaded successfully!');
                            window.location=document.referrer;
                        </script>";
            }

        }
    }
    
}
?>