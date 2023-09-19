<?php
    // lấy dl từ form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years',
        FILTER_VALIDATE_INT);

    // tiền gửi
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    // lãi xuất 
    } else if ( $interest_rate === FALSE )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0) {
        $error_message = 'Interest rate must be greater than zero .';
    } else if ( $interest_rate > 15 ) {
        $error_message = 'Interest rate must be less than or equal to 15.';
    // số năm gửi
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    //  đặt tb thành chuỗi trống nếu mục nhập kh phù hợp
    } else {
        $error_message = ''; }

    // nếu tb lỗi chuyển đến trang này
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    //tính tổng tiền sau khi đã gửi
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest_rate *.01;
    }
    // giá trị tiền tệ và %
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo htmlspecialchars($investment_f); ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo htmlspecialchars($yearly_rate_f); ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo htmlspecialchars($years); ?></span><br />

        <label>Future Value:</label>
        <span><?php echo htmlspecialchars($future_value_f); ?></span><br />
        
        <p>This calculation was done on <?php echo date('m/d/Y'); ?>.</p>
    </main>
</body>
</html>