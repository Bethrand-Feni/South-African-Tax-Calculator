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

$income = isset($_POST['income']) ? (float)str_replace([' ','-'], '' ,$_POST['income']) : 0;
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
    <link rel="stylesheet" href ="stylesfinal.css">
</head>
<body>
    <div class="flex-box">
        <div class="flex-items-headings">
            Income tax monthly: 
        </div>
        <?php echo "<div class ='flex-items-non-headings'>" . "R{$calculatedTaxMonthly}" . "</div>" ?>
        <img class="flex-items-line" src="Resources/Images/line_1.png">

        <div class="flex-items-headings">
            Your net salary:
        </div>
        <?php echo "<div class ='flex-items-non-headings'>" . "R{$netSalaryMonthly}" . "</div>" ?>
    </div>

    <form action="index.php" method="GET">
        <button class="button" >
            <span style="font-size: 18px;"> Recalculate</span>
        </button>
    </form>

    <?php echo "<div id='text_bubble'>" . "{$randomTips}" ."</div>" ?>

    <img id="bok_jump" class="custom-image" src="Resources/Images/springbok_jumping.png">
    <img id="rec_gold" class="custom-image" src="Resources/Images/gold_rectangle.png">
    <img id="grass" class="custom-image" src="Resources/Images/grass.png">
    <img id="speech_bubble" class="custom-image" src="Resources/Images/speech_bubble.png">


</body>
</html>
