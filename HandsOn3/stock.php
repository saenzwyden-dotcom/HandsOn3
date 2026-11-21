<?php
declare(strict_types=1);

$name = 'Sebastian';

$cars = array(
    "Ferrari" => array("price" => 14500000, "stock" => 3),
    "Toyota"  => array("price" => 1700000,  "stock" => 15),
    "Hyundai" => array("price" => 1400000,  "stock" => 12),
    "BMW"     => array("price" => 3800000,  "stock" => 6),
    "Honda"   => array("price" => 1650000,  "stock" => 11),
    "Ford"    => array("price" => 2100000,  "stock" => 8),
    "Nissan"  => array("price" => 1300000,  "stock" => 14)
);

$tax_rate = 12;

function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float {
    $total = $price * $quantity;
    return $total;
}

function get_tax_due(float $price, int $quantity, int $tax = 0): float {
    $total = $price * $quantity;
    $tax_due = $total * ($tax / 100);
    return $tax_due;
}

require_once 'header.php';
?>

    <h1><?php echo $name; ?>'s Car Dealership</h1>
    <h2>Stock Control</h2>

    <div>
        <a href="index.php">
            <button type="button">Back to Showroom</button>
        </a>
    </div>

    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Re-order</th>
            <th>Total Value</th>
            <th>Tax Due</th>
        </tr>
        <?php foreach ($cars as $product_name => $data) { ?>
            <tr>
                <td><?php echo $product_name; ?></td>
                <td><?php echo $data['stock']; ?></td>
                <td><?php echo get_reorder_message($data['stock']); ?></td>
                <td>Php <?php echo get_total_value($data['price'], $data['stock']); ?></td>
                <td>Php <?php echo get_tax_due($data['price'], $data['stock'], $tax_rate); ?></td>
            </tr>
        <?php } ?>
    </table>

<?php include_once 'footer.php'; ?>