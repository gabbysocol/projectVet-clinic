<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My favourite vet-clinic</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <div class="headerTeam">
		<form method="get" action="2laba2.php" style="position: relative; left:20%; top: 10%;">
        <?php
            $town_str = $_GET['towns'];
            if(!preg_match("/^[a-zA-Z]+([,]*[a-zA-Z]*)*$/", $town_str)) {
                echo '<pre>The format of string 
                provided is incorrect.</pre>';
            }
            else {
                echo '<pre>The format of string provided is correct.</pre>';            
                echo "<br>";         
                $i = 0;     
                while ($i < strlen($town_str)) {
                    if ($town_str{$i} === ',') {
                        $i++;
                        $town_str{$i} = strtoupper($town_str{$i});
                    }
                    $i++;
                } 
                $arr_string = explode(',', $town_str);  
                sort($arr_string);          
                $arr_string = array_unique($arr_string);        
                foreach ($arr_string as $value) {            
                    echo "<p style ='size:400px;' >$value</p>";
                    echo "\n";
                }         
            }
        ?>
		</form>
    </div>

    <p style="position: fixed"> Call free: +375(44)77-88-00</p>

    <div style ="position: fixed !important;" class="header1">
        <img style="margin: 3%; border-radius: 30px 0px 0px 30px; width: 50%;" src='2.png'>
        <span style="position: relative; top: -90%; right: -2%; font-weight: bold; font-size: 20px;">
                REGISTER IN RECEPTION 
                        NOW
        </span>
        <div id="textInHeader">
                Did you notice that your pet feels bad?
                We will help you today!
                Be just registered on our website and register in consultation!
        </div>

        <form method="get" action="registration.php" 
            style="position: relative; top: -75%; left: 60%; ">
            <input type="submit" value="TO REGISTER IN RECEPTION" style="width: 250px; height: 50px;">
        </form>
    </div>
    <img src='12.jpg' style="position: fixed !important; right: 27%; top: 12%; 
						margin: 0px; border-radius: 30px 30px 30px 30px; width: 15%;"> 	
                 
    <!-- for navigation -->
	<form style="position: fixed; top:95%; left:45%; font-size: 20px;" method="get" action="">
		<table class="navigation">
        <tr>
            <td colspan="2"><a href="1.php">Main</a></td>
            <td><a href="about.php">About</a></td>
            <td><a href="services.php">Services</a></td>
            <td><a href="team.php">Doctors</a></td>
            <td><a href="2laba1.php">My task towns</a></td>
            <td><a href="3labaHTML.php">My task files</a></td>
            <td><a href="4.php">Our Help</a></td>
        </tr>
		</table>
	</form>
    <div style="position: fixed; top:95%; left:40%; font-size: 20px;"> ©2019 Irina Lizunova </div>    
</body>
</html> 