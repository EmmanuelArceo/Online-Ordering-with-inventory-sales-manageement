<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["addname"];
        $categoryId = $_POST["addcategoryid"];
        $price = $_POST["addprice"];
        $addstocks = $_POST["addstocks"];

        $sql = "INSERT INTO `addonns` (`addname`, `addprice`, `addcategoryid`,  `addstocks`) VALUES ('$name', '$price', '$categoryId',  '$addstocks')";   
        $result = mysqli_query($conn, $sql);
        $addid = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'addon-'.$addid;
                $newfilename=$newName .".jpg";
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/OnlineOrdering/img/';
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
        else {
            echo "<script>alert('failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $addid = $_POST["addid"];
        $sql = "DELETE FROM `addonns` WHERE `addid`='$addid'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/OnlineOrdering/img/addon-".$addid.".jpg";
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
    if(isset($_POST['updateItem'])) {
        $addid = $_POST["addid"];
        $addname = $_POST["addname"];
        $addprice = $_POST["addprice"];
        $addcategoryid = $_POST["addcategoryid"];    
        $addstocks = $_POST["addstocks"];

        $sql = "UPDATE `addonns` SET `addname`='$addname', `addprice`='$addprice', `addcategoryid`='$addcategoryid' , `addstocks`='$addstocks' WHERE `addid`='$addid'";   
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
    if(isset($_POST['updateItemPhoto'])) {
        $addid = $_POST["addid"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'addon-'.$addid;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/OnlineOrdering/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
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