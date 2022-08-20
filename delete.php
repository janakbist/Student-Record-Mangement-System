<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "defttree";
$con = new mysqli($server,$username,$password,$database);

//php code to delete record start                
                $i = $_GET['id'];
                $delete = "delete  from student where id = '$i' ";
                if(mysqli_query($con,$delete)) {
                    echo("Record deleted Successfully");
                    header("Location:index.php");
                }
                else{
                    echo("Sorry cannot delte item");
                    echo("Deletion failed!");
                }
            
?>