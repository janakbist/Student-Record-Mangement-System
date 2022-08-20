<!DOCTYPE html>
<html>
    <head>
        <title>DeftTree</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- html form to insert data start -->
        <form method="post" action="index.php">
            <pre>
                <label>Full Name</label><br>
                <input type = "text" id= "fullname" name = "fullname"placeholder ="Enter your name">
                <small id="nameError"></small>
                <label>Faculty</label><br>
                <input type = "text" id="faculty" name = "faculty"placeholder ="Enter your faculty">
                <small id="facultyError"></small>
                <label>Email</label><br>
                <input type = "email" id="email" name = "email"placeholder ="....@gmail.com">
                <small id="emailError"></small>
                <label>Mobile Number</label><br>
                <input type = "number" id="mobilenumber" name = "mobilenumber"placeholder ="Phone Number">
                <small id="mobileNumberError"></small>
                <input type = "submit" name = "submit" value ="Submit" onclick = "showFun()"> 
            </pre>
        </form>
        <!-- html form to insert data end -->

        <!-- html button to display data from database  start-->
        <div>
        <form method="post" action="index.php">
            <pre>
                <button name="select" >Get Student Records</button>
            </pre>
        </form>
        <!-- html button to display data from database ends -->
        </div>
        <div>
            <?php
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "defttree";
            $con = new mysqli($server,$username,$password,$database);

            // <!-- php code to insert form data to database  start-->
            if(isset($_POST['submit'])) {

                $fullname = $faculty = $email = $mobilenumber = "";
                $fullname = mysqli_real_escape_string($con,$_POST["fullname"]); 
                $faculty = mysqli_real_escape_string($con,$_POST["faculty"]);
                $email = mysqli_real_escape_string($con,$_POST["email"]);
                $mobilenumber = $_POST["mobilenumber"];
    
                $insert = " Insert Into student (fullname,faculty,email,mobilenumber) VALUES('$fullname','$faculty','$email','$mobilenumber') ";

                if(empty($fullname) || empty($faculty) || empty($email) || empty($mobilenumber)) {
                    echo("Please fill up the Form Completely ");
                } else {
                    if(mysqli_query($con,$insert)) {
                        echo("Data Inserted to database");
                    }
                    else {
                        echo("Serverr Connection Error : " .$con->connect_error);
                        
                    }
                }

              }

            //   <!-- php code to insert form data to database  end-->

            // <!-- php code to select form data from database  start--> 
            if(isset($_POST['select'])) {
                
                $select = "select id,fullname,faculty,email,mobilenumber from student";
                $result = $con->query($select);

                if($result->num_rows > 0) {
                    echo " <pre style='margin-left:100px'>
                    <table style='border:1px solid black;border-collapse: collapse;'>
                        <tr>
                            <th style='width: 10px'>Id</th>
                            <th style='width : 100px'>Full Name</th>
                            <th style='width : 100px'>Faculty</th>
                            <th style='width : 300px'>Email</th>
                            <th style='width : 100px'>Mobile Number</th>
                            <th style='width : 200px'>Operation</th>
                        </tr></table></pre> ";

                    while($row = $result->fetch_assoc()) {
                        $i = $fn = $fac = $eml = $mn = "";
                        $i = $row["id"];
                        $fn = $row["fullname"];
                        $fa = $row["faculty"];
                        $eml = $row["email"];
                        $mn = $row["mobilenumber"];

                       echo "
                        <table style='border:1px solid black;border-collapse: collapse;margin-left:100px'>
                            <tr>
                                <td style='width: 10px'>{$i}</td>
                                <td style='width : 100px'>{$fn}</td>
                                <td style='width : 100px'>{$fa}</td>
                                <td style='width : 300px'>{$eml}</td>
                                <td style='width : 100px'>{$mn}</td>
                                <td style='width : 100px'><a href = 'delete.php?id=$row[id] '>Delete</a></td>               
                               <td style='width : 100px'><a href = 'update.php?id=$i&fullname=$fn&faculty=$fa&email=$eml&mobilenumber=$mn' class='btn btn-success'>Edit</a></td>

                            </tr>
                        </table>
                        ";
                      }
                      
                    } else {
                      echo "No Data present in the Database.";
                    }

                }

            // php code to select form data from database end
            // <td style='width : 100px;border-style:none'> <form method = 'post' action='index.php'><button name = 'edit' style='background-color:green;color:white;'> Edit </button></form></td>
            // <td style='width : 100px;border-style:none'> <form method = 'post' action='index.php'><button name = 'delete' style='background-color: red;color:white;'> Delete </button></form></td>
         ?>
        </div>

        <script src="index.js"></script>
    </body>
</html>