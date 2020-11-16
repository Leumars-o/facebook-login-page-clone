<?php
//recieve form post data and saving it in variables

$name = @$_POST['name'];
$email = @$_POST['email'];
$password = @$_POST['password'];


if(isset($_POST['email']) && empty($_POST['email'])){
    echo 'Email address is required';
    return false;
};

if(isset($_POST['password']) && empty($_POST['password'])){
    echo 'password is required';
    return false;
};



//name of file where data would be stored in

$filename = "mydata.txt";

//merging all variables into a sinle variable
$data =  "Email is ". $email. " Password is " . $password;


//save details to file
if(file_exists($filename)){
    $olddata = file_get_contents($filename);
    if(file_put_contents($filename,"$olddata $data \n ")){
        header('Location: success.php');
        exit();
    }else {
        header('Location: failed.php');
        exit(403);
    }

} else {
    header('Location: failed.php');

}

