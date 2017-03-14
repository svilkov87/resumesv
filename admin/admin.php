<?php
include ("../include/connection.php");
session_start();
## проверка ошибок
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);

//if (!empty($_GET)) {
//
//    $id = intval($_GET['id']);
//    if ($id === 0 OR $id != $_SESSION['user_id']) {
//        // die('Ошибка сжатия чёрной дыры');
//        header("Location: index.php");
//        exit;
//    }
//}
//else{
//    header("Location: index.php");
//}
    //выбор всех заказов от зареганых клиентов
    $st = $pdo->query('SELECT * FROM `orders_lk` ORDER BY id DESC  ');
    $allOrders = $st->fetchAll();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
// echo "<pre>";
// var_dump($allUnreadMess);
// echo "</pre>";

//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>админ-панель</title>
    <?php include ("../include/admin_head.php");?>
</head>
<body>
<i class="fa fa-chevron-up" aria-hidden="true" id="top" style="display: inline;"></i>
<section class="lk_section">
<?php include ("../include/admin_sidebar.php");?>
    <!-- /sbar -->
    <div class="lk_wrapp_content">
        <?php include ("../include/admin_lk_nav.php");?>
        <div class="lk_content_body">
            <div class="col-md-12">
            <?php foreach ($allOrders as $item) :?>
                <div class="col-md-12">
                    <div class="block_test">
                        <h4><?php echo $item['title']?></h4>
                        <div class="order_data_slide">
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                    <p class="p_numb">номер заказа</p>
                                    <p class="data_numb"><?php echo $item['number_order']?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                <p class="p_numb">клиент</p>
                                    <p class="data_numb">svilkov872@mail.ru</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                    <p class="p_numb">дата заказа</p>
                                    <p class="data_numb"><?php echo $item['date']?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                    <p class="p_numb">стоимость</p>
                                    <p class="data_numb"><?php echo $item['price']?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                    <p class="p_numb">статус</p>
                                    <p class="data_numb"><?php echo $item['status']?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="order_number">
                                <p class="p_numb">скидка</p>
                                    <p class="data_numb">0%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<?php include ("../include/admin_scripts.php");?>
</body>
</html>
