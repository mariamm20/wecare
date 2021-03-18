<!-- BMI -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>BMI</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bmi.css">

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
                  echo '<a class="nav-link" href="login.php" >Enter</a>';
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
  <!-- Bmi calculator -->
  <!-- معلومات عن ال BMI -->
  <section class="info-bmi">
    <div class="image-bmi">
      <img src="img/10.jpg" class="imBmi" />
    </div>
    <!-- what is Bmi-->
    <div class="what-is-Bmi">
      <p>
      <h4>What is BMI?</h4>
      BMI is a number calculated from a person’s weight and height.
      BMI provides a fairly reliable indicator of body fatness for most people and is used to screen for weight
      categories that may lead to health problems.
      </p>
    </div>
  </section>
  <!-- الفورم بتاعه ال BMI-->

  <?php
  // CALCUTATE BMI
  $BMIre=0;
  if(isset($_POST['BMIheight'], $_POST['BMIweight'])){
  $BMIheight = strip_tags($_POST['BMIheight']);
  $BMIweight = strip_tags($_POST['BMIweight']);
  $BMIre = ($BMIweight / ($BMIheight * $BMIheight)) * 10000;
  }

  ?>

  <section class="bmi-calc">
    <form class="form-bmi" method = "POST" action ="bmi.php">
      <label class="enter">Enter your age</label>
      <input class="input" type="number" required name="Age" min=3 max=100 
      <?php  
      //TO PRINT THE VALUE USER ENTER IT
      if(isset( $_POST['Age'])){
       echo 'value="'. $_POST["Age"] . '"';  
      }else{
        echo 'placeholder="Year" ';
      }
      ?>
      ><br>

      <label class="enter">Enter your height</label>
      <input class="input" type="number" required name="BMIheight" min=0 max=200 
      <?php
      //TO PRINT THE VALUE USER ENTER IT 
      if(isset( $_POST['BMIweight'])){
       echo 'value="'. $_POST["BMIheight"] . '"';    
      }else{
        echo 'placeholder="CM" ';
      }
      ?>
      ><br>
      <label class="enter">Enter your weight</label>
      <input class="input" type="number"  required name="BMIweight" min=0 max=200  
    
      <?php 
      //TO PRINT THE VALUE USER ENTER IT
      if(isset( $_POST['BMIweight'])){
       echo 'value="'. $_POST["BMIweight"] . '"';
        
      }else{
        echo 'placeholder="KG" ';
      }
      ?>
      ><br>
      <br>
      <button class="submit1" name = "submit">submit</button>
      <center>
        <span class="result-bmi">
          <p class="your-Bmi"> Your BMI = </p>
          <div class="the-result" name ='BMIresult'> <?php echo(round($BMIre, 2))?> </div>
        </span>
      </center>
    </form>
  </section>
  <!-- table of values-->
  <section class="values-of-bmi">
    <center>
      <table class="values">
        <tr>
          <th> BMI</th>
          <th> Weight Status</th>
        </tr>
        <tr class="row1">
          <td> Below 18.5</td>
          <td> Underweight</td>
        </tr>
        <tr class="row2">
          <td>18.5 – 24.9 </td>
          <td> Normal or Healthy Weight</td>
        </tr>
        <tr class="row3">
          <td>25.0 – 29.9 </td>
          <td> Overweight</td>
        </tr>
        <tr class="row4">
          <td>30.0 and Above </td>
          <td>Obese</td>
        </tr>
      </table>
    </center><br><br>

  </section>
  <!--Understanding your BMI result-->
<?php include "includes/content_bmi.php";?>

  <!--Start footer-->
<?php include "includes/footer.php";?>