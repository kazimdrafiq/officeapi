<?php
$con=mysqli_connect("localhost","root","","apis");
$response=array();
$catid=$_GET['catid'];
$sql="select * from subcategory" ;   
if (isset($_GET['catid']) > 0) {
    if ($catid >0) {
        $sql="select * from subcategory where category_id=".$catid ; 
    }
}

if($con){
             
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['category_id']=$row['category_id'];
                $response[$i]['subcategory_name']=$row['subcategory_name'];
                $response[$i]['slug']=$row['slug'];
                $i++;

            }
            echo json_encode($response,JSON_PRETTY_PRINT);
        }    
    }
    else{
        echo"database connection fail";
    }

?>