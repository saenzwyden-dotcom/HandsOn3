<?php
$name = 'Sebastian';

$cars = array(
    "Ferrari" => 250000,
    "Toyota" => 30000,
    "Hyundai" => 25000,
    "BMW" => 65000
);

$hateCars = array("Mitsubishi", "Subaru", "Kia", "Tesla");

$selectedCar = "";
if (isset($_GET['car'])) {
    $selectedCar = $_GET['car'];
}

require_once 'header.php';
?>

    <h1><?php echo $name; ?>'s Car Dealership</h1>
    <p>Click a car button below to view its price and details:</p>

    <div>
        <?php foreach ($cars as $brand => $price) { ?>
            <a href="?car=<?php echo $brand; ?>">
                <button type="button"><?php echo $brand; ?></button>
            </a>
        <?php } ?>
        <a href="stock.php">
            <button type="button">View Stock</button>
        </a>
    </div>

    <?php if ($selectedCar != "") { ?>
        <h2>Selected Car: <?php echo $selectedCar; ?></h2>

        <?php
        $price = $cars[$selectedCar];

        if ($selectedCar == "Ferrari") {
            $details = "High-speed luxury sports car.";
            $origin = "Italy";
            $maxYears = 8;
        } elseif ($selectedCar == "Toyota") {
            $details = "Reliable and fuel-efficient daily car.";
            $origin = "Japan";
            $maxYears = 15;
        } elseif ($selectedCar == "Hyundai") {
            $details = "Affordable and modern city car.";
            $origin = "South Korea";
            $maxYears = 10;
        } elseif ($selectedCar == "BMW") {
            $details = "Comfortable performance sedan.";
            $origin = "Germany";
            $maxYears = 12;
        } else {
            $details = "Car not found.";
            $origin = "Unknown";
            $maxYears = 5;
        }
        ?>

        <p>Price: $<?php echo $price; ?></p>
        <p>Details: <?php echo $details; ?></p>

        <?php
        if ($price <= 30000) {
            echo "<p>Budget Tier: Affordable</p>";
        } elseif ($price <= 70000) {
            echo "<p>Budget Tier: Mid-Range</p>";
        } else {
            echo "<p>Budget Tier: Luxury</p>";
        }
        ?>

        <p>Origin: <?php echo $origin; ?></p>

        <h3>5-Year Installment Plan</h3>
        <ul>
            <?php
            $yearlyPayment = $price / 5;
            for ($year = 1; $year <= 5; $year++) {
            ?>
                <li>Year <?php echo $year; ?>: Pay $<?php echo $yearlyPayment; ?></li>
            <?php } ?>
        </ul>

        <h3>Car Life Expectancy</h3>
        <ul>
            <?php for ($year = 1; $year <= $maxYears; $year++) { ?>
                <li>Year <?php echo $year; ?>: Running strong</li>
            <?php } ?>
        </ul>

    <?php } else { ?>
        <p>No car selected yet. Please choose a car above.</p>
    <?php } ?>

    <h3>Cars Not Available Here</h3>
    <ul>
        <?php foreach ($hateCars as $car) { ?>
            <li><?php echo $car; ?></li>
        <?php } ?>
    </ul>

<?php include_once 'footer.php'; ?>