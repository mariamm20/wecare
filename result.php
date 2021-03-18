<?php
session_start();
?>
<!DOCTYPE html>
<html>

  <head>
        <title>result</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/result.css">

            <?php include "includes/header.php";
            include "functons.php";

            ?>

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
</section>
<?php include "includes/logout.php"; ?>
<!-- result-->
<?php

// GET THE OUTPUT OF FUNCTION
List($status,$instructions) = whichOne($_SESSION['analysis'], $_SESSION['sub_Analysis'], $_POST['sex'], $_POST['age'], $_POST['result']);
?>

<section class="table of result">
    <center>
      <table class="the_result" style="padding:40px">
        <tr class="first">
          <td class="tall">
            <p class="Name"> analysis </p>
          </td>
          <td class="tall">
            <p class="Result"> result</p>
          </td>
        </tr>
        <tr>
          <td class="tall">
            <p><?php echo  $_SESSION['analysis'] . ' \ ' . $_SESSION['sub_Analysis']; ?> </p>
          </td>
          <td class="tall">
            <p  id="show_the_result"><?php echo $status ?></p>
          </td>
        </tr>
      </table>
    </center>
</section>

<script >
// TO COLOR OF RESULT
var w = $('#show_the_result').text();
 if(w == 'Normal' || w == 'Negative'){
  $('#show_the_result').css({"color":"green"});
 }else{
  $('#show_the_result').css({"color":"red"});
 }
</script>

<section class="instructions">
    <div class="followInstruction">
      <p class="headDiv">Please follow instructions</p>
      <hr>
      <p>
        <?php
         echo $instructions ;
        ?>
      </p>
    </div>
</section>

<!--Start footer-->
<?php include "includes/footer.php"; ?>