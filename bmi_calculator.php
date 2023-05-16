<?php
declare(strict_types=1);
class BMI {
    private $weight;
    private $height;
    public function __construct($weight, $height)
    {
        $this->weight = $weight;
        $this->height = $height;
    }
    public function calculate() : float
    {
        return $this->weight / pow($this->height, 2);
    }

    public function bmiType(): ?string
    {
        $bmi = $this->calculate();

        return match (true) {
            $bmi < 16.00 => "Starvation",
            ($bmi >= 16.00 && $bmi < 16.99) => "Emaciation",
            ($bmi >= 16.99 && $bmi < 18.49) => "Underweight",
            ($bmi >= 18.49 && $bmi < 24.99) => "Desired body weight",
            ($bmi >= 24.99 && $bmi < 29.99) => "Overweight",
            ($bmi >= 29.99 && $bmi < 34.99) => "I degree obesity",
            ($bmi >= 34.99 && $bmi < 39.99) => "II degree obesity",
            ($bmi >= 39.99) => "III degree obesity",
            default => null,
        };
    }
}

while(true) {
    echo "Enter your weight in kilograms:\n";
    try {
        $weight = trim(fgets(STDIN));
        if(!is_numeric($weight))
            throw new Exception("Weight needs to be float type. Try again.\n");
        else
            break;
    }
    catch (Exception $e) {
        echo "Error occured. " . $e->getMessage();
    }
}

while(true) {
    echo "Enter your height in metres:\n";
    try {
        $height = trim(fgets(STDIN));
        if(!is_numeric($height))
            throw new Exception("Height needs to be float type. Try again.\n");
        else
            break;
    }
    catch (Exception $e) {
        echo "Error occured. " . $e->getMessage();
    }
}

$myBMI = new BMI($weight, $height);
$bmiScore = $myBMI->calculate();
echo "Your BMI score: ", $bmiScore, "\n";
echo "Your BMI type: ", $myBMI->bmiType();




