<html>
<head>
    <title>Item warning</title>
</head>
</html>
<body>
<h1>Item warning</h1>
<div class="justify-center text-gray-500">
    <h3>Dear,</h3>
    <h5>Kindly be infomred that product
    <?php
        echo $item["name"]?>
        has quantity (
        <?php echo  $item["quantity"]?>
        ) and expiry date of:
        <?php echo date($item["expiry_date"])?>
    </h5>
    <hr>
    <p>Thank you</p>
</div>
</body>
