<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['enter_products'])){
        $enterProductsTable = drawTable($_POST['number_of_products']);
    }

    if(isset($_POST['show_invoice'])){
        // print_r($_POST);die;
        $invoice = drawInvoice($_POST);
    }
}

function drawTable(int $numberOfProducts) :string{
    $table = '<table class="table">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                </thead>
                <tbody>';
                    for ($i=1; $i <= $numberOfProducts ; $i++) { 
                        $table .= '<tr>
                                        <td>
                                            <input type="text" name="product_name_'.$i.'" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="product_price_'.$i.'" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="product_quantity_'.$i.'" class="form-control">
                                        </td>
                                    </tr>';
                    }
    $table.=        '<tr>
                        <td colspan="3">
                            <button class="btn btn-outline-primary form-control" name="show_invoice"> Show Invoice </button>
                        </td>
                    </tr>
                </tbody>
            </table>';
    return $table;
}


function drawInvoice(array $data) :string{
    $table = '<table class="table">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Subtotal
                    </th>
                </thead>
                <tbody>';
                    $total = 0;
                    for ($i=1; $i <= $data['number_of_products'] ; $i++) { 
                        $subTotal = $data['product_price_'.$i] * $data['product_quantity_'.$i];
                        $total += $subTotal;
                        $table .= "<tr>
                                        <td>
                                            {$data['product_name_'.$i]}
                                        </td>
                                        <td>
                                            {$data['product_price_'.$i]} EGP
                                        </td>
                                        <td>
                                            {$data['product_quantity_'.$i]}
                                        </td>
                                        <td>
                                            {$subTotal} EGP
                                        </td>
                                    </tr>";
                    }
                    $discount = getDiscountPercentage($total); // 0.1
                    $discountPercentage = $discount * 100; // 10
                    $discountValue = $total * $discount; // 1000
                    $priceAfterDiscount = $total - $discountValue; // 4000
                    $deliveryFees = getDeliveryFees($data['city']); // 30
                    $priceAfterDelivery = $priceAfterDiscount + $deliveryFees;
    $table.=        "<tr>
                        <td colspan='2'>
                            <b>Client Name</b>
                        </td>
                        <td colspan='2'>
                            {$data['name']}
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>City</b>
                        </td>
                        <td colspan='2'>
                            {$data['city']}
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Total</b>
                        </td>
                        <td colspan='2'>
                            {$total} EGP
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Discount Percentage</b>
                        </td>
                        <td colspan='2'>
                            {$discountPercentage} %
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Discount Value</b>
                        </td>
                        <td colspan='2'>
                            {$discountValue} EGP
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Price After Discount</b>
                        </td>
                        <td colspan='2'>
                            {$priceAfterDiscount} EGP
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Delivery Fees</b>
                        </td>
                        <td colspan='2'>
                            {$deliveryFees} EGP
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <b>Final Price</b>
                        </td>
                        <td colspan='2'>
                            {$priceAfterDelivery} EGP
                        </td>
                    </tr>
                    <tr>
                        <td colspan='4'>
                            <button class='btn btn-outline-primary form-control' name='show_invoice'> Show Invoice </button>
                        </td>
                    </tr>
                </tbody>
            </table>";
    return $table;
}
function old(string $input) :?string{
    return $_POST[$input] ?? null;
}
function getDiscountPercentage(float $total) :float{
    if($total < 1000){
        return 0;
    }elseif($total >= 1000 && $total < 3000){
        return 0.1;
    }elseif($total >= 3000 && $total < 4500){
        return 0.15;
    }else{
        return 0.2;
    }
}
function getDeliveryFees(string $city) :float{
    switch ($city) {
        case 'cairo':
            return 0;
        case 'giza':
            return 30;
        case 'alex':
            return 50;
        default:
            return 100;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="contianer">
        <div class="row">
            <div class="col-12 mt-5 text-dark text-center">
                <h1>Supermarket</h1>
            </div>
            <div class="col-6 mt-5  offset-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?= old('name') ?>" class="form-control"
                            placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" id="city" class="form-control">
                            <option <?= old('city') == 'cairo' ? 'selected' : '' ?> value="cairo">Cairo</option>
                            <option <?= old('city') == 'giza' ? 'selected' : '' ?> value="giza">Giza</option>
                            <option <?= old('city') == 'alex' ? 'selected' : '' ?> value="alex">Alex</option>
                            <option <?= old('city') == 'others' ? 'selected' : '' ?> value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_products">Number Of Products</label>
                        <input type="number" name="number_of_products" value="<?= old('number_of_products') ?>"
                            id="number_of_products" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-dark" name="enter_products"> Enter Products </button>
                    </div>
                    <?= $enterProductsTable ?? "" ?>
                    <?= $invoice ?? "" ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>