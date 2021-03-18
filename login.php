<?php
session_start();
//require_once('con')
$User = new user;

$a = isset($_GET['a']) ? $_GET['a'] :'';
?>
<!DOCTYPE html>
<html>


  <head>

<title>login</title>

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
                    echo "<a class='nav-link' style='color: #ff4345;' href=''>".$_SESSION['frist_name'] ."</a>" ;
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

    function generateCode($length=6){
        $chars = "abcd123456789";
        $code = "";
        $clean = strlen($chars) - 1;
        while (strlen($code) < $length){
            $code .= $chars[mt_rand(0, $clean)];
        }
        return $code;
    }

    function CheckLoginData($email, $pass){
        $db = new Connect;
        $result='';
        if(isset($email) && isset($pass)){
            $email = stripslashes(htmlspecialchars($email));
            $pass = stripslashes(htmlspecialchars(md5(md5(trim(($pass))))));
            if(empty($email) or empty($pass)){
                $result .= "<div class=\"error\"><p><strong>ERROR:</strong> All fields are required!</p></div>";
            }
            else{
                $user = $db -> prepare("SELECT * FROM users WHERE email = :email AND password = :pass");
                $user->execute(array(
                    'email' => $email,
                    'pass' => $pass
                ));
                $info = $user->fetch(PDO::FETCH_ASSOC);
                $_SESSION['frist_name'] = $info['frist_name'];
                if($user->rowCount() == 0){
                    $result .= "<div class=\"error\"><p><strong>ERROR:</strong> login filed!</p></div>";
                }
                else{
                    $hash = $this->generateCode(10);
                    $upd = $db->prepare("UPDATE users SET session=:hash WHERE id=:ex_user");
                    $upd ->execute(array(
                        'hash' => $hash,
                        'ex_user' => $info['id']
                    ));
                    setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
                    setcookie("sess", $hash, time()+60*60*24*30, "/", NULL);
                    echo("<script>location.href = '/projectis/home.php';</script>");
                }
            }
        }
        return $result;

    }

    function loginform(){
        return'
        <div class="form_block">


        <div class="modal-content content-login">
        <div class="body">'.
        ($_POST ? $this->CheckLoginData($_POST['email'], $_POST['pass'] ): '')
          .   '<form action = "?a=login" method = "POST">
                <div class="modal-body">

                    <h3>Sign into your account </h3>
                    <input type="email" placeholder="Email address" name ="email"  />
                    <input type="password" placeholder="************" id="pass" name = "pass"  />
                    <button type="submit" class="btn" name = "button" id = "login">Enter</button>
                    <!--<input type="checkbox" onclick="showpass()"><span>Show Password</span><br>-->
                    <div>
                        <a href="#">Forget password</a>
                        <a href="/projectis/register.php" class="rightlink">Make a new account</a>
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
    case 'login':{
        echo $User -> loginform();
        break;
    }
    default: {
        echo $User -> loginform();
        break;
    }
}

?>


<?php include "includes/footer.php"; ?>