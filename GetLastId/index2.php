<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        header{
            height: 100vh;
            width: 100vw;
            background-color: #f0f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #container{
            height: 280px;
            width: 650px;
            display: flex;
            justify-content: space-around;
            align-items: center;

        }
        form{
            background-color: white;
            height: 500px;
            width: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;

          
        }
        button{
            background-color: #99ebff;
            border-radius: 5px;
            border: none;
            font-size: 16px;   
            height: 40px;
            width: 150px;    
         }
        button:hover{
           box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        }
      input{
        box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        border: none;
        height: 30px;
        border-radius: 5px;
        width: 220px;
        margin-top: 10px;
      }
   
        #btn{
            height: 100px;
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h1{
            color: #99ebff;
        }
        #span1{
            color: #00e673;
        }
        #span2{
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $display = $display2 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $database = "ana";
    $password = "";
    $tablename = "Form";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];

    $fname2 = $_POST["fname2"];
    $lname2 = $_POST["lname2"];
    $email2 = $_POST["email2"];


    try{
    $con = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $tablename(FirstName, LastName, Email) VALUES('$fname','$lname','$email')";
    $sql2 = "INSERT INTO $tablename(FirstName, LastName, Email) VALUES('$fname2','$lname2','$email2')";

    $con->exec($sql);
    $con->exec($sql2);
    $last_id = $con->lastInsertId();

    $display = "New records created successfully in ID: " . $last_id;
   }catch(PDOException $e){
     $display2 = $sql ."Error:"  . $e->getMessage();
   }
   $con = null;
}
    ?>
    <header>
    <form method="post">
        <br>
        <h1>Get Last Id:</h1>
        <div id="container">
        <div>
        <label>FirstName:</label><br>
        <input type="text" placeholder="Entre your FirstName" name="fname"><br><br>
        <label>LastName:</label><br>
        <input type="text" placeholder="Entre your LastName" name="lname"><br><br>
        <label>Email:</label><br>
        <input type="text" placeholder="Entre your Email" name="email">
        </div>
        <div>
        <label>FirstName:</label><br>
        <input type="text" placeholder="Entre your FirstName" name="fname2"><br><br>
        <label>LastName:</label><br>
        <input type="text" placeholder="Entre your LastName" name="lname2"><br><br>
        <label>Email:</label><br>
        <input type="text" placeholder="Entre your Email" name="email2">
        </div>
       </div>
        <br>
        <div id="btn">
        <div>
        <button type="submit" name="submit"">Insert</button>
        <br><br>
        </div>
        </div>
        <span id="span1"><?php echo $display?></span>
        <span id="span2""><?php echo $display2?></span>
    </form>
</header>
</body>
</html>
