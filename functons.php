<?php 
function whichOne($analysis , $SubAnalysis,$sex,$age,$result){
    if($analysis =="Blood Glugcose"){
        List($x,$y)=BloodGlugcose($SubAnalysis,$result);
    }else if($analysis === "Liver enzymes"){
        List($x,$y)=LiverEnzymes($SubAnalysis, $sex, $age , $result);
    }else if($analysis === "INR"){
        List($x,$y)=INR($SubAnalysis, $result);
    }else if($analysis === "CBC blood"){
        List($x,$y)=CBCBlood($SubAnalysis,$sex,$result);
    }else if ($analysis === "H.pylori"){
        List($x,$y)=Hpylori($result);
    }else if ( $analysis === "Kidney analysis"){
        List($x,$y)=Kidney($SubAnalysis, $result);
    } 
    return array($x,$y);
}
function BloodGlugcose($SubAnalysis,$result){
 
    if($SubAnalysis == "Fasting Blood glucose"){
        if($result<100){
            $status = "Normal";
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          elseif($result<125){
            $status ='Impaired Glucose';
            $instructions="Unfortunately the result is bad, you must pay attention to health,
             and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          else {
            $status = "Diabetic";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
             and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
    }elseif($SubAnalysis == "2hrs Postprandial Glucose"){
        if($result<140){
            $status = 'Normal';
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          elseif($result<199){
            $status ='Impaired Glucose';
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          else {
            $status = "Diabetic";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
    }else{
        if($result<(5.7)){
            $status = 'Normal';
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          elseif($result<6.4){
            $status ='Impaired Glucose';
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          else {
            $status = "Diabetic";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
    }
    
    return array($status,$instructions);

}
function LiverEnzymes($SubAnalysis, $sex, $age , $result){
    if($SubAnalysis == "Bilirubin (Total)"){
        if($age<18){
            if($result<=1){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status="High";
              $instructions="Unfortunately the result is bad, you must pay attention to health,
              and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }
          }
          else {
            if($result<=1.2){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status ="High";
              $instructions="Unfortunately the result is bad, you must pay attention to health,
              and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }
        }
    }elseif($SubAnalysis == "Bilirubin (Direct)"){
        if($result<=0.3){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }elseif($SubAnalysis == "ALT"){
        if($sex =='female'){
            if($result<25){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status="High";
              $instructions="Unfortunately the result is bad, you must pay attention to health,
              and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }
        }else {
            if($result<33){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status="High";
              $instructions="Unfortunately the result is bad, you must pay attention to health,
              and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }
        }
    }elseif($SubAnalysis == "AST"){
        if($result<=40){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          else {
            $status="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
    }elseif($SubAnalysis == "PT"){
        if($result<10){
            $status = "Low";
             $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          elseif($result<15){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          else {
            $status ="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }elseif($SubAnalysis == "Albumin"){
        if($result<3.4){
            $status="Low";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          elseif($result<5.4){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          else {
            $status ="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }elseif($SubAnalysis == "GGT"){
        if($result<=30){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          else {
            $status="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }elseif($SubAnalysis == "Total Protein"){
        if($result<60){
            $status="Low";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
          }
          elseif($result<80){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
          }
          else {
            $status ="High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,
            and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }elseif($SubAnalysis == "Alkaline Phosphatase"){
        if($age<3){
            if($result<=180){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status="High";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }elseif($age<10) {
            if($result<=260){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status ="High";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }elseif($age<14) {
            if($result<=340){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status ="High";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }elseif($age<18) {
            if($result<=180){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status ="High";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }else{
            if($result<=130){
              $status="Normal";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
            else {
              $status ="High";
              $instructions="You rock, The result of your analysis is the, 
              You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }
    }
    return array($status,$instructions);
}
function INR($SubAnalysis, $result){
    if($SubAnalysis == "Bleeding time (BT)"){
        if($result<9){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif($SubAnalysis == "Clotting time (CT)"){
        if($result<15){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif($SubAnalysis == "Prothrombin time (PT)"){
        if($result<10){
            $status="Low";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }elseif($result<15){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif($SubAnalysis == "PTT"){
        if($result<40){
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif($SubAnalysis == "Platelets count"){
        if($result<150000){
            $status="ow";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }elseif ($result<450000) {
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif($SubAnalysis == "Fibrinogen level"){
        if($result<200){
            $status="Low";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }elseif ($result<400) {
            $status="Normal";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }else{
        if($result<10){
            $status=" Normal level";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }else {
            $status ="High level";
            $instructions="You rock, The result of your analysis is the, 
            You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }
    return array($status,$instructions);
}
function CBCBlood($SubAnalysis,$sex,$result){
    if($SubAnalysis ==='R.B.C'){
        if($sex === 'male'){
            if($result <= 4.35){
                $status = "Low";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";   
            }elseif ($result > 5.65){
                $status = "High";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }else{
            if($result <= 3.92){
                $status = "Low";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }elseif ($result > 5.13){
                $status = "High";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }
    }else if ( $SubAnalysis ==="W.B.C"){

        if($result <= 3.400){
            $status = "Low";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }elseif ($result > 9.600){
            $status = "High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }else{
            $status = "Normal";
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }else if ($SubAnalysis ==="MCHC"){
        if($result <= 32){
            $status = "Low";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }elseif ($result > 36){
            $status = "High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }else{
            $status = "Normal";
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
        }
    }elseif ( $SubAnalysis === "HCT"){
        if($sex === 'male'){
            if($result <= 38.3){
                $status = "Low";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }elseif ($result > 48.6 ){
                $status = "High";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }else{
            if($result <= 35.5){
                $status = "Low";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }elseif ($result > 44.9){
                $status = "High";
                $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }
    }else {
        if($sex === 'male'){
            if($result <= 135){
                $status = "Low";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }elseif ($result > 317 ){
                $status = "High";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }else{
            if($result <= 157){
                $status = "Low";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }elseif ($result > 371){
                $status = "High";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }else{
                $status = "Normal";
                $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
            }
        }
    } 
    return array($status,$instructions); 
}

function Hpylori($result){
    
    if($result < 15){
        $status = "Negative";
        $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
    }elseif($result > 20){
        $status = "Positive";
        $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
    }else{
        $status = "Normal";
        $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";
    }
    return array($status,$instructions);
}

function Kidney($SubAnalysis,$result){
    
    if($SubAnalysis === 'ACR'){
        if($result >= 0){
            $status = "Normal"; 
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";

        }else if($result > 30){
            $status = "High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }
    }else{
        if($result <= 90){
            $status = "Low";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }elseif ($result > 120){
            $status = "High";
            $instructions="Unfortunately the result is bad, you must pay attention to health,and you must follow up with a doctor, and do not take treatment without consulting a doctor.";
        }else{
            $status = "Normal";
            $instructions="You rock, The result of your analysis is the, You can now follow some instructions to stay in better health by following some diets by asking your doctor.";

        }
    }
    return array($status,$instructions);
}
?>
