<?php


function calculateTax($monthlyIncome, $age) {
    // Define tax brackets and rates for 2025
$brackets = [
[237101, 370500, 0.26, 42678],
[370501, 512800, 0.31, 77362],
[512801, 673000, 0.36, 121475],
[673001, 857900, 0.39, 179147],
[857901, 1817000, 0.41, 251258],
[1817001, INF, 0.45, 644489]
];

// Calculate the rebate based on age
$primaryRebate = 17235;
$secondaryRebate = 9444;
$tertiaryRebate = 3145;

if ($age == 1) {
$rebate = $primaryRebate;
} elseif ($age == 2) {
$rebate = $primaryRebate + $secondaryRebate;
} else {
$rebate = $primaryRebate + $secondaryRebate + $tertiaryRebate;
}


// Calculate tax for income
$tax = 0;
$yearlyIncome = $monthlyIncome * 12; 

if ($yearlyIncome <= 237100) {
// If income is within the first bracket
$tax += $yearlyIncome * 0.18;
} else {
// Calculate tax for higher brackets
foreach ($brackets as $bracket) {
    if ($yearlyIncome >= $bracket[0] && $yearlyIncome <= $bracket[1]) {
        $tax += $bracket[3] + ($yearlyIncome - $bracket[0]) * $bracket[2];
    }
}
}
// Apply rebate
$tax -= $rebate;


return max($tax, 0); // Ensure tax is not negative
}

$income = isset($_POST['income']) ? (float)str_replace(' ', '' ,$_POST['income']) : 0;
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$calculatedTax = calculateTax($income,$age);
$calculatedTaxMonthly = $calculatedTax / 12;
$netSalaryMonthly = $income - $calculatedTaxMonthly;

$calculatedTaxMonthly = number_format($calculatedTaxMonthly,2);
$netSalaryMonthly = number_format($netSalaryMonthly,2);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator</title>
    <style>
        body {
            background-image: url('Resources/Images/strokes_backg.jpg');
            background-size: cover;
            background-repeat: no-repeat; 
            background-position: center;
            display: flex;
            justify-content: center; /* Horizontal centering */
            align-items: center;     /* Vertical centering */
            height: 100vh;           /* Full viewport height */
            margin: 0;
        }
        h1 {
            top: 2px;
            text-align: center; 
            margin-top: 10px; 
            color: darkgreen;
            font-size: 2.5em;
            position: absolute;
            z-index: 7; 
        }
        #bok_jump {
    width: 375px;
    height: 370px;
    position: absolute;
    bottom: 10px;
    right: 350px;
    z-index: 1;
        }
        #rec_gold{
    width: 536px;
    height: 200px;
    position: absolute;
    right: 25px;
    top: 50px;
    z-index: 2;
        }
  #grass{
      position: fixed;
      bottom: 0;
      /* left: 50%;
      translate: translateX(-50%); */
      width: 100%;
      height: auto;
      z-index: 2;
  }
  #speech_bubble{
      width: 450px;
      height: 350px;
      position: absolute;
      bottom: 160px;
      right: 580px;
      z-index: 4;
  }
  #input_form{
      position: relative;
      z-index: 5;
  }
  #text_bubble{
    position: absolute; /* Allows you to move it freely */
    bottom: 325px; /* Distance from the top of the page */
    left: 550px;
    z-index: 6;
    color:#FFFFFF; 
    font-size:18px
  }
  #text_income_tax{
    position: absolute; /* Allows you to move it freely */
    right: 350px; /* Distance from the top of the page */
    top: 90px;
    z-index: 6;
    color:#FFFFFF; 
    font-size:19px; 
    font-weight: bold;
  }
  #text_net_salary{
    position: absolute; /* Allows you to move it freely */
    right: 390px; /* Distance from the top of the page */
    top: 160px;
    z-index: 6;
    color:#FFFFFF; 
    font-size:19px; 
    font-weight: bold;
  }
  #number_net_salary{
    position: absolute; /* Allows you to move it freely */
    right: 425px; /* Distance from the top of the page */
    top: 190px;
    z-index: 6;
    color:#FFFFFF; 
    font-size:18px
  }
  #number_income_tax{
    position: absolute; /* Allows you to move it freely */
    right: 435px; /* Distance from the top of the page */
    top: 120px;
    z-index: 6;
    color:#FFFFFF; 
    font-size:18px
  }
  #white_line{
    position: absolute; /* Allows you to move it freely */
    right: 110px; /* Distance from the top of the page */
    top: 150px;
    z-index: 6;
  }

  .spacer {
          height: 40px; /* Adjust height for desired spacing */
      }
  .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        background-color: #A98B41;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 28px;
        padding: 20px;
        width: 150px;
        height: 50px;
        transition: all 0.5s;
        cursor: pointer;
        position: absolute; /* Move to specific location */
        top: 110px; /* Adjust as needed for spacing from top */
        left: 50px; /* Adjust as needed for spacing from left */
        z-index: 10; /* Ensure it appears above other elements */
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }

    .larger-text {
      font-size: 24px; 
    }
    </style>
</head>
<body>
    <form action="index.php" method="GET">
    <button class="button" ><span style="font-size: 18px;"> Recalculate</span></button>
    </form>
    <div id="text_bubble">
        Touch down.
    </div>
    <div id="text_income_tax">
        Income tax monthly: 
    </div>
    <?php echo "<div id ='number_income_tax'>" . "R{$calculatedTaxMonthly}" . "</div>" ?>
    <div id="text_net_salary">
        Your net salary:
    </div>
    <?php echo "<div id ='number_net_salary'>" . "R{$netSalaryMonthly}" . "</div>" ?>

    <img id="bok_jump" class="custom-image" src="Resources/Images/springbok_jumping.png">
    <img id="rec_gold" class="custom-image" src="Resources/Images/gold_rectangle.png">
    <img id="grass" class="custom-image" src="Resources/Images/grass.png">
    <img id="speech_bubble" class="custom-image" src="Resources/Images/speech_bubble.png">
    <img id="white_line" class="custom-image" src="Resources/Images/line_1.png">


</body>
</html>
