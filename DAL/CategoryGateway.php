<?php
require_once('Catagory.php');

class CategoryGateway
{
    public $connection;
    function __construct($connection_obj){
        $this->connection=$connection_obj;
    }

    function getallcategories(){
        $response=array();
        if($this->connection){
            $sql="select * from category";
            $result=mysqli_query($this->connection,$sql);
            if($result){
                #header("Content-Type:JSON");
                $i=0;
                while($row = mysqli_fetch_assoc($result)){
                    $response[$i]['id']=$row['id'];
                    $response[$i]['category_name']=$row['category_name'];
                    $response[$i]['slug']=$row['slug'];
                    $response[$i]['home_status']=$row['home_status'];
                    $i++;
                }
                $this->connection->close();
                return $response;
                #echo json_encode($response,JSON_PRETTY_PRINT);
            }
        }
        return $response;
    }

    function getcategoriyById($catId){
         if($this->connection){
             $sql="select * from category where id=".$catId.";";
             $result=mysqli_query($this->connection,$sql);

             $catgoryObj=new Catagory();
             if($result){
                 if($row = mysqli_fetch_assoc($result)){
                     $catgoryObj->set_categoryId($row["id"]);
                     $catgoryObj->set_category_name($row["category_name"]);
                     $catgoryObj->set_slug($row["slug"]);
                     $catgoryObj->set_home_status($row["home_status"]);
                 }
                 $this->connection->close();

                 return $catgoryObj;
             }

             return $catgoryObj;
         }
    }
}

$con=mysqli_connect("localhost","root","","apis");

$categortGateway=new CategoryGateway($con);
echo json_encode($categortGateway->getallcategories(),JSON_PRETTY_PRINT);
echo json_encode($categortGateway->getcategoriyById(2),JSON_PRETTY_PRINT);