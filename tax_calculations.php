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

    if ($age < 65) {
        echo"$age\n";
        $rebate = $primaryRebate;
    } elseif ($age < 75) {
        echo"$age";
        $rebate = $primaryRebate + $secondaryRebate;
    } else {
        echo"$age";
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
                echo"Chosen bracket {$bracket[0]}\n";
                $tax += $bracket[3] + ($yearlyIncome - $bracket[0]) * $bracket[2];
            }
        }
    }
    // Apply rebate
    $tax -= $rebate;
    
    
    return max($tax, 0); // Ensure tax is not negative
}

$income = isset($_POST['income']) ? (float)$_POST['income'] : 0;
$age = isset($_POST['age']) ? (float)$_POST['age'] : 0;
$calculatedTax = calculateTax($income,$age);
$calculatedTaxMonthly = $calculatedTax / 12;
    
print($calculatedTax);
print($calculatedTaxMonthly);


echo "Annual Tax: " . number_format($calculatedTax, 2) . "<br>";
echo "Monthly Tax: " . number_format($calculatedTaxMonthly, 2);
   