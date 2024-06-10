$email = '';
$password = '';


if (isset($_POST['rental_login'])) {
    rental_login();
}






function rental_login() {
    global $db;
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM rental WHERE email='$email' AND password='$password' LIMIT 5";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $data['email'];
        header('Location:index2.php');
        echo"login vayo ????????????????????";
    } else {
        echo"login vayo ????????????????????";
        session_start();
        $_SESSION['login_error'] = "Incorrect Email/Password or not registered.";
        header('Location: rental-login.php');
    }
}