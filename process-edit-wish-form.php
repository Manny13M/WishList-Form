<?php 

    // Create reference variables
    $yourName       = $_POST["yourName"];
    $friendName     = $_POST["friendName"];
    $yourEmail      = $_POST["yourEmail"];
    $friendEmail    = $_POST["friendEmail"];
    $wish           = $_POST["wish"];
    $imgURL         = $_POST["imgURL"];
    $wishId         = $_POST["wishId"];

    
    //connect to database
	$dsn        = "mysql:host=localhost;dbname=wishes_database;charset=utf8mb4";
	$dbusername = "root";
	$dbpassword = "root";
	$pdo = new PDO($dsn, $dbusername, $dbpassword);

	//prepare
	$stmt = $pdo->prepare("UPDATE `wishes` 
        SET `yourName`    = '$yourName', 
            `friendName`  = '$friendName', 
            `yourEmail`   = '$yourEmail', 
            `friendEmail` = '$friendEmail', 
            `wish`        = '$wish' 
        WHERE `wishes`.`wishId` = $wishId;");

	//execute
	if($stmt->execute() == true)
    {
		?>
            <p>Record Updated</p>
            <a href="select-wishes.php">See wishes</a>
            <?php
	}
    else
    {
		?><p>cound not update</p><?php
	}
?>