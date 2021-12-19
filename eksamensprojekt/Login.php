
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dozmat.dk</title>
    <link rel="stylesheet" href="./CSS/navBar.css">
</head>

<body style="background-color: #FFFFFF;">
    
    <div class= "nav">
        <div class="text Dozmatnav"><h1 style="font-family: Eras Medium ITC; " class="Name"><a href="./Index.php">DozMat</a><h1></div>
        <!-- <div class="firstParagrah"><h2>Dozmat</h2></div> -->
        <div class="text one"><h2><a href="./AboutUs.php">Om os</a></h2></div>
        <a href="./Login.php"><div class="text two" style="color: black;"><h2>Signin/Log ind</h2></div></a>
        <div class= "line"></div>
    </div>

    <form action ="/eksamensprojekt/Login.php" method="post">
    <div class="title"><h1>Log ind</h1></div>
        <table style="width: 400px;">
            <tr><td>Bruger:</td><td><input type="text" name="name"></input></td></tr>
            <tr><td>Kode:</td><td><input type="password" name="password"></input></td></tr>
            <!--<tr><td><input type="submit" value="Submit"></td></tr>-->
            <tr><td><input type="submit" name="Login" value="Login"></input> </td></tr>
        </table>
    </form> 
</body>
</html>

<?php
    $mysqli = new mysqli ("localhost","root","","mini-eksamensprojekt");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if(isset($_POST['Login'])){ //If login buttion is clicked
        $name=mysqli_real_escape_string($mysqli, $_POST['name']); //For at undgår sql injections
        $password=mysqli_real_escape_string($mysqli, $_POST['password']);
        $student="student";
        $teacher="teacher";

        $query_student="SELECT * FROM user WHERE name='$name' AND password='$password' AND role='$student';"; //select all from user where name is $name and password is $password 
        $run_student = mysqli_query($mysqli, $query_student);
        
        $query_teacher="SELECT * FROM user WHERE name='$name' AND password='$password' AND role='$teacher';";
        $run_teacher = mysqli_query($mysqli, $query_teacher);

        if(mysqli_num_rows($run_student)==1){
            echo "<script>window.open('student/student.php','_self')</script>";
        }
        else if(mysqli_num_rows($run_teacher)==1){
            echo "<script>window.open('teacher/teacher.php','_self')</script>";
        }

    }

?>
