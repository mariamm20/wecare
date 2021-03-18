<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Analysis</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/analysisstyle.css">

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
            </section>
            <?php include "includes/logout.php"; ?>
<!---- start Select section -->

<!-- Navbar part-->

<!---- start Select section -->
<section >
    <form method="POST">
        <h2 class="titleText" align="center">Please Select kind of analysis</h2>
        <select id="analysis" name="analysis" required class="form-control input-lg">
            <option >
                Select analysis
            </option>
        </select>
        <br />
        <select id="sub-analysis" name="sub_AnalysisName" required  class="form-control input-lg second">
            <option >
                <?php
                // TO PRINT NAME OF SUB ANALYSIS
                $array_analysis = array("0", "Blood Glugcose", "Liver enzymes", "INR", "CBC blood", "Kidney analysis","H.pylori","Fasting Blood glucose","2hrs Postprandial Glucose", "Glycosylated Hb (HbAIC)", "Bilirubin (Total)","Bilirubin (Direct)",
                "ALT","AST","PT","Albumin","GGT","Total Protein","Alkaline Phosphatase","Bleeding time (BT)","Clotting time (CT)",
                "Prothrombin time (PT)","PTT","Platelets count","Fibrinogen level","Fibrinogen Degradation Products",
                "R.B.C","W.B.C","MCHC","HCT","PLT","ACR", "GFR","Pylori AG in stool",);
                    if (empty($_POST['sub_AnalysisName'])  ) {
                        echo 'Select Sub-analysis'; 
                    } else{
                        echo $array_analysis[$_POST['sub_AnalysisName']];
                    }
                ?>
            </option>
        </select>
        <center> <button type="submit" name="submmit" class="submitbtn" id="submitanalysis">continue</button></center>
        <br/>
    </form>
</section>
<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['analysis'] = $array_analysis[$_POST['analysis']];
    $_SESSION['sub_Analysis'] = $array_analysis[$_POST['sub_AnalysisName']]; 
    if (!empty( $_POST['sub_AnalysisName']) ) {
    ?>
        <div class="name" id="formDetails">
            <h2 class="titleText fill" align="center">Please fill the following</h2>
            <form class="formApp" action="result.php" method="POST">
                <div>Select your gender</div>
                <input type="radio" id="male" name="sex" required  value="male"><label for="male"> Male</label>
                <input type="radio" id="female" name="sex" required  value="female"><label for="female"> Female</label>
                <div>Enter your age</div>
                <input type="number" id="oldage" placeholder="Enter your age" required  name="age"/><span class="mu">Year</span>
                <div>Enter your result</div>
                <input type="number" id="valueofresult" placeholder="Enter the result" name="result" required step=".01" />
                <span  class="mu">
                <?php 
                // TO REINT THE MEASUREMENT UNIT
                        $array_units = [
                            "0", '1', '2', '3', '4', '5', '6', 'Mg/Dl', 'Mg/Dl', '%', 'mg/dL','mg/dL', 'U/L', 'U/L', 'sec', 'g/dL', 'IU/L', 'gm/L', 'U/L', 'min',
                            'min', 'sec', 'sec', 'platelets/μL', 'mg/dL', 'mcg/mL', 'million cells/uL', 'cells/mcL', 'g/dl', '%', ' billion/L', 'Mg/g','M/minute', 'ng/ml'
                        ];
                        echo $array_units[$_POST['sub_AnalysisName']];
                        ?> 
                </span>
                <div><button type="submit" name="submit" class="submitbtn">Submit</button>
            </form>
        </div>
    <?php 
    } 
   
}

?>


<!---- end Select section -->

<script>
// FOR  CONFIRM SUBMATION FORM
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


<!--Start footer-->
<?php include "includes/footer.php"; ?>