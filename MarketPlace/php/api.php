<?php 
include 'db.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action){
        case 'increaseVisits' : 
            $name = $_POST['name'];
            $imageUrl = $_POST['imageUrl'];
            $productName = $_POST['productName'];
            $emailId = $_POST['emailId'];
            $origin = $_POST['origin'];
            $sql = "SELECT visitCount from domain WHERE name = '$name' and productName = '$productName'";
            $result = mysqli_query($mysqli, $sql);
            $row = $result->fetch_row();
            $count = mysqli_num_rows($result);
            if($count == 0){
                $sql = "INSERT INTO domain (name, visitCount, emailId, productName, imageUrl, origin) VALUES (?, ?, ?, ?, ?, ?)";
                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param("ssssss", $param_name, $param_visitCount, $param_emailId, $param_productName, $param_imageUrl, $param_origin);
                    $param_name = $name;
                    $param_visitCount = 1;
                    $param_emailId = $emailId;
                    $param_productName = $productName;
                    $param_imageUrl = $imageUrl;
                    $param_origin = $origin;
                    if($stmt->execute()){
                       echo 'success';
                    }
                    $stmt->close();
                }
            }else{
                $visitCount = $row[0] + 1;
                $sql = "UPDATE domain set visitCount = '$visitCount' WHERE name = '$name' and productName = '$productName'";
                $result = mysqli_query($mysqli, $sql);
                $mysqli->close();
            }
            $mysqli->close();
            echo 'success';
            break;

        case 'handleReview' :  
            $domainName = $_POST['name'];
            $productName = $_POST['productName'];
            $review = $_POST['review'];
            $rating = $_POST['rating'];
            $imageUrl = $_POST['imageUrl'];
            $emailId = $_POST['emailId'];
            $origin = $_POST['origin'];

            $sql = "INSERT INTO review (review, domain, rating, productName, emailId, imageUrl, origin) VALUES (?, ?, ?, ?, ?, ?, ?)";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("sssssss", $param_review, $param_domain, $param_rating, $param_productName, $param_emailId, $param_imageUrl, $param_origin);
                $param_review =$review;
                $param_domain = $domainName;
                $param_emailId = $emailId;
                $param_rating = $rating;
                $param_productName = $productName;
                $param_imageUrl = $imageUrl;
                $param_origin = $origin;
                if($stmt->execute()){
                    echo 'success';
                }else{
                    echo $stmt->error;
                }
                $stmt->close();
            }
            $mysqli->close();
            break;

        case 'traceActivity':
            $domainName = $_POST['name'];
            $url = $_POST['origin'];
            $emailId = $_POST['emailId'];
            $activity = $_POST['activity'];
            $sql = "INSERT INTO activities (domain, url, emailId, activity) VALUES (?, ?, ?, ?)";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("ssss", $param_domain, $param_url, $param_emailId, $param_activity);
                $param_domain = $domainName;
                $param_url = $url;
                $param_emailId = $emailId;
                $param_activity = $activity;
                if($stmt->execute()){
                    echo 'success';
                }else{
                    echo $stmt->error;
                }
                $stmt->close();
            }
            $mysqli->close();
            break;

    }
}
?>