<?php

//require_once('con')
$User = new user;

$a = isset($_GET['a']) ? $_GET['a'] :'';
?>
<!DOCTYPE html>
<html>

  <head>
        <title>register</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/homestyle.css">
<?php include "includes/header.php";?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#contactus">Contact</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    if(isset($_SESSION['frist_name'])){
                    echo "<a class='nav-link'  style='color: #ff4345;' href=''>".$_SESSION['frist_name'] ."</a>" ;
                    }else{
                    echo '<a class="nav-link" href="login.php">Enter</a>';
                    }
                    ?>
                    </li>
                    <li class="nav-item">   
                    <?php
                    if(!isset($_SESSION['frist_name'])){
                    echo '<a class="nav-link" id="out" href="register.php">Register</a>' ;
                    }else{
                    echo '<a class="nav-link" href="home.php?logout">Log Out</a>';
                    }
                    ?>
                    </li>
                </ul>
            </div>
        </nav>
        <?php include "includes/logout.php"; ?>
        <!--Modal-->
<?php
require_once('confing.php');
class User{
    //register valid
    function CkeckRegisterData(
        $f_name,
        $l_name,
        $email,
        $pass1,
        $pass2
    ){
        $db = new Connect;
        $result='';
        if(isset($f_name) && isset($l_name) && isset($f_name) && isset($pass1) && isset($pass2)){
            $f_name = stripslashes(htmlspecialchars($f_name));
            $l_name = stripslashes(htmlspecialchars($l_name));
            $email = stripslashes(htmlspecialchars($email));
            $pass1 = stripslashes(htmlspecialchars(md5(md5(trim(($pass1))))));
            $pass2 = stripslashes(htmlspecialchars(md5(md5(trim(($pass2))))));
            if(empty($f_name) or empty($l_name) or empty($email) or empty($pass1) or empty($pass2)){
                $result .= "<div class=\"error\"><p><strong>ERROR:</strong> All fields are required!</p></div>";
            }
            else if($pass1 != $pass2){
                $result .= "<div class=\"error\"><p><strong>ERROR:</strong> Your passwords do not match!</p></div>";
            }
            else{

                $user = $db -> prepare("SELECT * FROM users WHERE email = :email");
                $user->execute(array(
                    'email' => $email,
                ));
                $info = $user->fetch(PDO::FETCH_ASSOC);
                if($user->rowCount() == 0){
                    $user = $db->prepare("INSERT INTO users (frist_name, last_name, email, password) VALUES(:frist_name, :last_name, :email, :password)");
                    $user -> execute(array(
                        'frist_name' => $f_name,
                        'last_name' => $l_name,
                        'email' => $email,
                        'password' => $pass1
                    ));
                    if(!$user){
                        $result .= "<div class=\"error\"><p><strong>ERROR:</strong> All fields are required!</p></div>";
                    }
                    else{
                        echo("<script>location.href = '/projectis/login.php';</script>");
                    }
             }
             else{
                $result .= "<div class=\"error\"><p><strong>ERROR:</strong> There is a user with this email already!</p></div>";
             }
            }
        }
        return $result;
    }
    function Registerform(){
        return'
        <div class="form_block">
        <div class="modal-content content-login">
            
        <div class="body">'.
        ($_POST ? $this->CkeckRegisterData(
            $_POST['f_name'], 
            $_POST['l_name'], 
            $_POST['email'], 
            $_POST['pass1'],
            $_POST['pass2']
            ): '')
          .   '<form action = "?a=register" method = "POST">
                <div class="modal-body">

                    <h3>Create new account </h3>
                    <input type="text" placeholder="First name" name="f_name" />
                    <input type="text" placeholder="Last name" name="l_name" />
                    <input type="email" placeholder="Email address" name="email" />
                    <input type="password" placeholder="************" id="pass" name="pass1" />
                    <input type="password" placeholder="************" id="pass" name="pass2" />
                    <button type="submit" class="btn">Create</button>
                    <!--<input type="checkbox" onclick="showpass()"><span>Show Password</span><br>-->
                    <div>
                        <a href="/projectis/login.php">Already have account? </a>
                        
                    </div>
                </div>


            </form>
            </div>
            </div>
            </div>
            ';
    }
}

switch($a){
    case 'register':{
        echo $User -> Registerform();
        break;
    }
    default: {
        echo $User -> Registerform();
        break;
    }
}

?>
<?php include "includes/footer.php";?>