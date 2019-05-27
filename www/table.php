<?php 
     session_start();

    $db_host = "127.0.0.1"; 
    $db_user = "gabson";          // log
    $db_password = "qwerty123"; // password of DB
    $db_base = "clinics";        // name of DB
    $db_table = "users";        // name of teble of DB
    
    // Create connection
	$link = new mysqli($db_host, $db_user, $db_password, $db_base);

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }

    echo '<h2>Users of the veterinary clinic "Gabson"</h2></br>';
    echo '<form method="POST" action="./5_1.php" style="position: relative; left:0%; top: 10%;bottom:10%;">
        <input name="visitor_field" type="text" style="width: 400px;" placeholder="Input a number">
        <input type="submit" value= "Get the list of users">
    </form></br></br>';

    echo '<table style="width:1100px;"><tr><th>№</th><th>Name</th><th>Login</th><th>Age</th><th>Mobile</th><th>e-Mail</th></tr>';
    // echo "Connected successfully";
    $arr = array();
    $i = 0;
    $sql = mysqli_query($link, 'SELECT `id_user`, `name_user`, `login_user`, `age_user`, `mobile_user`, `email_user` FROM `users`');
    if (isset($_POST['visitor_field'])) {
        $numb = $_POST['visitor_field'];
        while ($result = mysqli_fetch_array($sql)) {
            $arr[$i][0] = $result['id_user'];
            $arr[$i][1] = $result['name_user'];
            $arr[$i][2] = $result['login_user'];
            $arr[$i][3] = $result['age_user'];
            $arr[$i][4] = $result['mobile_user'];
            $arr[$i][5] = $result['email_user']; 			
            $i += 1;    
            // echo "{$result['id_user']}  {$result['name_user']}  {$result['age_user']} <br>";$result['mobile_user']
        }
        $temparr = array();

        $j = 0;
        while ($j < $numb && $j != $i) {
            $temp = rand(0, $i-1);
            // echo "$temp </br>";
            array_push($temparr, $temp);
            $temparr1 = array_unique($temparr);
            if (count($temparr1) == count($temparr)) {
                $j = $j + 1;
                echo sprintf( '<tr><td>%u</td> <td>%s</td> <td>%s</td> <td>%u</td> <td>%u</td> <td>%s</td> </tr>', 				
                $arr[$temp][0], $arr[$temp][1], $arr[$temp][2], $arr[$temp][3], $arr[$temp][4], $arr[$temp][5]);   
            } else {
                $temparr = $temparr1;
            }
        }
    } else {
        while ($result = mysqli_fetch_array($sql)) {
            echo sprintf( '<tr><td>%u</td> <td>%s</td> <td>%s</td> <td>%u</td> <td>%u</td> <td>%s</td> </tr>', 				
            $result['id_user'], $result['name_user'], $result['login_user'], $result['age_user'], $result['mobile_user'], $result['email_user']);
        }
    }
    echo '</table>';