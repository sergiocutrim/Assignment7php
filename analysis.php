<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //STEP3 requests the PHP using $_FILES
        //The question requests on the same page but it became to big to understand and explain so I separated
        if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
            $fileName = $_FILES['fileUpload']['name']; //php will store name of file as requested by STEP4
            $fileSize = $_FILES['fileUpload']['size']; //php will store size of file as requested by STEP4
            $fileType = $_FILES['fileUpload']['type'];  //php will store type of file as requested by STEP4
            $fileTmpName = $_FILES['fileUpload']['tmp_name'];  //php will store print Temporary name of file as requested by STEP4
            
            $uploadDir = 'uploads/'; //created a folder to store the images
            $uploadFile = $uploadDir . basename($fileName); //php will save the image in the folder as requested in STEP 5

            //STEP 4 and 6 - page will print all the information and also that the image was saved
            if (move_uploaded_file($fileTmpName, $uploadFile)) {
            echo '<div class="mt-4">';
            echo '<h5>Uploaded File Information:</h5>';
            echo '<p><strong>Name:</strong> ' . htmlspecialchars($fileName) . '</p>';
            echo '<p><strong>Size:</strong> ' . number_format($fileSize / 1024, 2) . ' KB</p>';
            echo '<p><strong>Type:</strong> ' . htmlspecialchars($fileType) . '</p>';
            echo '<p><strong>Temporary Name:</strong> ' . htmlspecialchars($fileTmpName) . '</p>';
            echo '</div>';
            echo 'Your file has been correctly uploaded! Thank you!';

        } else {
            //If there is a problem it will have a fail message
            echo '<div class="mt-4 text-danger">Failed to move the uploaded file.</div>';
        }
    } else {
      //If there is a problem it will have a fail message
      echo '<div class="mt-4 text-danger">No file was uploaded or there was an error uploading the file.</div>';
    }
} else {
 //If there is a problem it will have a fail message
  echo '<div class="mt-4 text-danger">Please submit the form to see the file information.</div>';
}
 
?>