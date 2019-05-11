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
    <div class="headerTeam2">
        <form method="get" action="" style="position: relative; left: 1%; height: auto;">
            <?php

                function get_directory($dir, $size)
                {   
                    //echo "$files";
                    $files = scandir($dir);    // array of files and catalogs
                  
                    while (($files[0] == '.') or ($files[0] == '..'))
                    {
                        array_shift($files);       // delete from the array '.' & '..'
                        array_shift($files); 
                    }

                    foreach($files as $value)
                    {
                        $value = "$dir"."$value";

                        if (is_dir($value.'/'))
                        {
                            //echo "$value".'/'."<br>";
                            $value = $value."/";
                            $size = get_directory($value, $size);
                        }
                        else
                        {
                            if (is_file($value))
                            {
                                $size = $size + filesize($value);
                                echo sprintf( '<tr style=width: 800px><td>%s</td></tr>', $value); 
                                // echo "$value"."<br>";
                            }
                        }
                    }
                    return $size;
                }

                $dir = $_GET["catalogs"];
                if (is_dir($dir)) 
                {
                    $size = 0;
                    echo '<table style=left: 20%; width: 800px;><tr><th>FILES :</th></tr>';
                    $size = get_directory($dir, $size);
                    echo '</table>';
                    echo '<h2 style="position: relative; left: 2%;margin: 3%;"> The size of files of this catalog is '."$size bytes </h2> <br>";
                }
                else 
                {
                    echo '<form method="get" action="3laba.php">
                            <p style="left: 20%;"> Enter catalog:</p>
                            <input name="catalogs" value= '.$dir.' type="text" style="position: relative;width: 400px;left: 20%; color: red;">
                            <input type="submit" value= "Get the list of catalogs" style="position: relative; left: 35%;">
                            <pre style="position: relative; left: 20%;">This path is incorrect!</pre>
                          </form>';
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