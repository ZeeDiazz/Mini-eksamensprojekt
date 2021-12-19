<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dozmat.dk</title>
    <link rel="stylesheet" href="./CSS/Login.css">
    <link rel="stylesheet" href="./CSS/Assets/navbar.css">
    <link rel="stylesheet" href="./CSS/Assets/extra.css">
</head>

<body style="background-color: #FFFFFF;">
    <nav>
        <div class="container">
            <div id="nav-logo">
                <h1>
                    <a href="./Index.php"><span>Doz</span>Mat</a>
                </h1>
            </div>
            <div id="nav-options">
                <ul>
                    <li>
                        <a href="./AboutUs.php">Om os</a>
                    </li>
                    <li>
                        <a href="./Login.php">Log ind</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container"> 
            <form action ="/eksamensprojekt/Login.php" method="post" id="login">
                <div class="login-title">   
                    <h1>Log ind</h1>
                </div>
                <table>
                    <tr>
                        <td>Bruger:</td>
                        <td><input type="text" name="name"></input></td>
                    </tr>
                    <tr>
                        <td>Kode:</td>
                        <td><input type="password" name="password"></input></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="Login" value="Login" ></input></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>

</html>

<?php
    $mysqli = new mysqli ("localhost","root","","mini-eksamensprojekt");
    if ($mysqli -> connect_error) {
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
        echo "<script>alert("+mysqli_num_rows($run_student)+");</script>";
        if(mysqli_num_rows($run_student)==1){
            #echo "<script>window.open('student/student.php','_self')</script>";
            header("Location: ./StudentAssignment.php");
        }
        else if(mysqli_num_rows($run_teacher)==1){
            header("Location: ./.php");
            #echo "<script>window.open('teacher/teacher.php','_self')</script>";
        }

    }

?>
