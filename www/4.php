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
    <div class="">
        
    </div>

    <p style="position: fixed; top:1%"> Call free: +375(44)77-88-00</p>

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

    <div class="header2">
        
            <form method="get" action="4_2.php" style="position: relative; left:20%; top: 10%;">
                <p style="position: relative; left: 0%; top:10%;"> Enter any text:</p>
                <input name="texty" type="text" style="width: 400px;" placeholder="My text">
                <input type="submit" value= "Get data" style="">
            </form>

        <div style="position: relative; top: 10%; margin: 0 10% 10% 10%; border: 0">
            <?php
                $text = "   <h2>Phones of the branches of the veterinary clinic 'Gabson'</h2>

                <br> Pervomaisky district - 520-555-5542 
                <br> Sovetsky district - (520) 5555542 
                <br> Central district - 520 555-0555 
                <br> Frunzensky district - (520) 555 5542 
                <br> Leninsky district - (520) 555-5542 
                <br> Guerrilla district - 520 555 5542 
                <br> Moskovsky district - 5205555542 
                <br> October district - 514 555 1231
                <br>
                <br>
                 There is also a municipal pharmacy in Minsk. All day telephones: +3755205555542 +721-520-55-55-542 
                <br><h3>We will help your pet at any time.</h3>";
                
                $pat_begin_sentence = "/[\s]*[+]+[0-9)][)\d\\'-]*\b/";
                $pat_capital_letter = "/[\s\(]+[0-9)]+[\d\\'-]*\b/";
                
                
                function find_with_pattern($pattern, $text, $open_color, $close_color)
                {
                    $pattword = "/[0-9+(][)]*[)\w\\'-]*/";
                    $output = "";
                    $shift = 0;
                    while (preg_match($pattern, $text, $matches, PREG_OFFSET_CAPTURE))
                    {

                        if (preg_match($pattword, $matches[0][0], $words, PREG_OFFSET_CAPTURE))
                        { 
                            $word = $words[0][0];
                        }
                        if (!strpos($text, $word) == 0)
                        {
                            $output.= substr($text, 0, strpos($text, $word));
                        }
                        $output .= $open_color.$word.$close_color;
                        $shift = $matches[0][1] + strlen($matches[0][0]);
                        // echo $matches[0][1]."<br>";
                        $text = substr($text, $shift, (strlen($text) - $shift));
                    }
                    $output .= $text;
                    return $output;
                }
                    
                $text = find_with_pattern($pat_begin_sentence, $text, "<u>","</u>");
                echo find_with_pattern($pat_capital_letter, $text, "<font color=\"red\">","</font>");
            ?>
        </div>
                
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