<?php 
    // session_start();
    ini_set('display_errors', 1);

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

    // echo "Connected successfully";
    if(isset($_POST['submit'])) {

        $err = array();
        if(!preg_match("/^[a-zA-Z]+$/", $_POST['name_field'])) {
            $err[] = "Name must include only letters";
        };

        if(strlen($_POST['email_field']) < 3 or strlen($_POST['email_field']) > 30) {
            $err[] = "Email length must be longer than 3 and shorter than 30";
        };

        $query = $link->query("SELECT COUNT(email_user) FROM users WHERE email_user LIKE '".$link->real_escape_string($_POST['email_field'])."'");
        $array = $query->fetch_array(MYSQLI_ASSOC);
        if ($array['COUNT(email_user)'] > 0) {
			$err[] = "User with this e-mail is already exists";
        };
        
        // add repeating password
		if (strlen($_POST['name_field']) < 2) {
			$err[] = "Name length should be longer than 2";
		};        
        // echo "Connected successfully3";
        if (count($err) == 0) {
            // drop database sql-инъекции // the current configuration setting
			if(get_magic_quotes_gpc()==1) {
                $name = stripslashes(trim($_POST['name_field']));
                $login = stripslashes(trim($_POST['login_field']));
                $phone = stripslashes(trim($_POST['phone_field']));
                $age = stripslashes(trim($_POST['age_field']));
				$email = stripslashes(trim($_POST['email_field']));
			}
			else {
                $name = trim($_POST['name_field']);
                $login = trim($_POST['login_field']);
                $phone = trim($_POST['phone_field']);
                $age = trim($_POST['age_field']);
				$email =trim($_POST['email_field']);
            }

            $name = $link->real_escape_string($_POST['name_field']);
            $login = $link->real_escape_string($_POST['login_field']);
            $phone = $link->real_escape_string($_POST['phone_field']);
            $phone = ltrim($phone, '+');
            $age = $link->real_escape_string($_POST['age_field']);
            $email = $link->real_escape_string($_POST['email_field']);
            
            print_r(error_get_last());

            // alg bcrypt
            $password = password_hash($_POST['password_field'], PASSWORD_DEFAULT);
            $salt = 'xdtyghjikm';
            print_r( error_get_last () );

            echo "</br>Connected successfully";
            if ($link->query("INSERT INTO users SET name_user='$name', login_user= '$login', email_user='$email', hash_user='$password', age_user='$age', mobile_user='$phone';") === TRUE) {
				header("Location: ./5_1.php"); 
				exit();
			} else {
                print_r(error_get_last());
                // echo "GGGGGGGGGGGGGGGGGGGGGGGGGg";
            }
        }
        else {
           print_r ($err);
           header("Location: ./1.php");
            exit();
        }
    }
