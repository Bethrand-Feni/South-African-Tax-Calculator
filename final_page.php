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

<?php
$financialTips = [
  "Mark tax and credit dates like doctor visits!",
  "Pay off high-interest debts first and find better savings accounts.",
  "Track your net worth to see financial progress.",
  "Budget for your financial goals.",
  "Try a cash-only diet to curb overspending.",
  "Review finances for one minute daily.",
  "Save 20% of your income for savings and debt.",
  "Budget 30% of income for fun and lifestyle.",
  "Craft a vision board to stay motivated.",
  "Set specific, measurable financial goals.",
  "Use a spending mantra to guide purchases.",
  "Take control of finances as an act of self-love.",
  "Set short-term money goals for motivation.",
  "Think positively about money.",
  "Stay financially fit by working out.",
  "Appreciate your current belongings.",
  "Partner with a money buddy for support.",
  "Negotiate salary—let the employer go first.",
  "Discuss more than just pay—ask for perks.",
  "Don’t overlook unemployment benefits.",
  "Highlight your value when negotiating pay.",
  "Start by paying off smaller debts for confidence.",
  "Avoid cosigning loans to protect credit.",
  "Apply for FAFSA to get financial aid.",
  "Choose federal student loans for better rates.",
  "Ask about flexible loan repayment options.",
  "Keep mortgage payments under 28% of income.",
  "Evaluate purchases by cost-per-use.",
  "Invest in experiences over material things.",
  "Shop alone to avoid impulse buys.",
  "Buy what reflects who you truly are.",
  "Skip overdraft protection to avoid temptation.",
  "Start saving as soon as possible.",
  "Let your retirement fund grow—don’t cash out early.",
  "Get the full 401(k) match from your employer.",
  "Increase savings automatically with raises.",
  "Regularly check your credit report and score.",
  "Keep credit utilization under 30%.",
  "Use secured credit cards to rebuild credit.",
  "Consider additional life insurance beyond employer coverage.",
  "Get renters insurance for extra protection.",
  "Include savings in your monthly budget.",
  "Keep savings in a separate account to avoid spending.",
  "Open a savings account at a different bank to limit transfers.",
  "Automate savings with direct deposit.",
  "Explore credit unions for better rates.",
  "Use savings for true emergencies only.",
  "Invest excess savings once you have enough for emergencies.",
  "Avoid high fees—choose low-cost funds.",
  "Rebalance investments annually to stay on track."
];

$randomTipsKey = array_rand($financialTips);
$randomTips = $financialTips[$randomTipsKey];

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
    width: 28vw;
    height: 47vh;
    position: absolute;
    bottom: 0.1%;
    right: 22%;
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
      width: 34vw;
      height: 47vh;
      position: absolute;
      bottom: 18%;
      left: 28%;
      z-index: 4;
  }
  #input_form{
      position: relative;
      z-index: 5;
  }
  #text_bubble{
    width: 15vw;  
    height: 20vh;
    padding: 10px;
    align-items: center;
    position: absolute; /* Allows you to move it freely */
    bottom: 24%; /* Distance from the top of the page */
    left: 35%;
    z-index: 6;
    color:white; 
    font-size:1.4vw;
    word-wrap: break-word;
    white-space: normal;

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
    
    @media (max-width: 1000px) {
    
    .button{
        top: 35%;
    }
    
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
    <?php echo "<div id='text_bubble'>" . "{$randomTips}" ."</div>" ?>
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
