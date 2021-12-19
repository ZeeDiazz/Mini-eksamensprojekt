
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
        <div class="text Dozmatnav"><h1 style="font-family: Eras Medium ITC; " class="Name"><a href="./index.html">DozMat</a><h1></div>
        <!-- <div class="firstParagrah"><h2>Dozmat</h2></div> -->
        <div class="text one"><h2><a href="./AboutUs.html">Om os</a></h2></div>
        <a href="./Login.php"><div class="text two" style="color: black;"><h2>Signin/Log ind</h2></div></a>
         <div class= "line"></div>
    </div>
    <?php
        //mysql_connect("localhost","root","");
        //mysql_select_db("login");
        $conn = new mysqli("mini-eksamensprojekt","root","");
        if($conn-> connect_error){
            die("error: " . $conn->connect_error);
        }

    ?>
</body>

</html>