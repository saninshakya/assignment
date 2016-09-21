<?php

session_start();
if (isset($_POST['btn-login'])) {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    //check the password with hashed password that is store in database
    $hashedPasswordFromDB = password_hash('passpass', PASSWORD_BCRYPT, $options);
    //if the user input username and password match the one stored in database then set them in session
    if ($username == 'santora' && password_verify($password, $hashedPasswordFromDB)) {
        $_SESSION['username'] = $username;
        $_SESSION['msg'] = 'Password is valid!';
        
        $array = array(
            'success' => 'true',
            $_SESSION['valid'] = true,
            'username' => $_SESSION['username'],
            'msg' => $_SESSION['msg']
        );
    } else {
        $array = $arrayName = array(
            $_SESSION['valid'] = false,
            'success' => 'false',
            'msg' => 'Invalid Username and Password',
            
        );
    }
    echo json_encode($array);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>