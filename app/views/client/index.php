<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../include/lib.php' ?>
    <title>Tranh Chủ</title>
    <link rel="stylesheet" href="<?php echo plrc ?>css/index.css">
    <script style="text/javascript" src="<?php echo plrc ?>jquery/index.js"></script>
</head>
<body>
    <?php include '../include/header.php' ?>
    <?php include '../include/modal.php' ?>

    <div class="banner">
        <div class="container">
            <div id="carousel-id" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < count($banner); $i++) { 
                        echo "<li data-bs-target=\"#carousel-id\" data-bs-slide-to=\"$i\" ".(($i == 0) ? "class=\"active\"" : "")."></li>";
                    } ?>
                </ol>
                <div class="carousel-inner">
                    <?php for ($i = 0; $i < count($banner); $i++) { 
                        echo "
                            <div class=\"carousel-item " . (($i == 0) ? "active" : "") . "\">
                                <img src=\"{$banner[$i]['img']}\" alt=\"Image $i\" class=\"w-100\">
                                <div class=\"carousel-caption\">
                                    ".(($banner[$i]['title'] != "") ? "<h3>$banner[$i]['title']</h3>" : "")."
                                    ".(($banner[$i]['text'] != "") ? "<p>$banner[$i]['text']</p>" : "")."
                                </div>
                            </div>
                        ";
                    } ?> 
                </div>     
                <a class="carousel-control-prev" href="#carousel-id" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-id" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="poster">    
        <div class="container">
            <h1>Sản phẩm được quan tâm nhất </h1>
            <div class="row">
                <?php foreach($cbpc as $value => $item) { ?>
                    <div class=" col-lg-6 poster_item">
                        <div class="khung-poster" style="background: url(<?php echo urlmd.'/public/data/rd'.rand(1,4).'.jpg'; ?>) bottom; background-size: cover ;">
                            <div class="bg-poster">
                                <img src="<?php echo $item['img'] ?>" class="anh-poster" alt="">
                            </div>
                            
                            <div class="chu-poster">
                                <?php 
                                    $asd = $item['mdetail'];
                                    $qwe = json_decode(stripslashes($asd));
                                    echo htmlspecialchars_decode($qwe[0]);
                                ?>
                                <a href="<?php echo urlmd.'/sanpham/chitiet='.$item['id']."/" ?>" class="btn btn-outline-light">Xem thêm &raquo;</a>
                            </div>
                        </div>                    
                    </div>
                <?php }?>
            </div>               
        </div>
    </div>
    <div class="container pad_1" id="list-sanpham">
        <?php foreach ($bocuc as $value => $item) { ?>
            <div class="ss-sp">
                <?php 
                    if ($item['tieude']['ebd_img']== "") echo "<h2 class=\"tieude\">".$item['tieude']['name']."</h2>";
                    if ($item['tieude']['ebd_img']!= "") echo "<h2 class=\"tieude td-trans\">".$item['tieude']['name']."</h2>";

                    if ($item['tieude']['poster'] != "") echo "<div class=\"ss-poster\"><img src=\"".$item['tieude']['poster']."\" alt=\"\"></div>";

                    if ($item['tieude']['ebd_img']== "") {
                        echo "
                            <div class=\"row\">
                                <div>
                                    <div class=\"ebd_img\">
                                        <button class=\"click-pn click-prev\"><i class=\"fa-solid fa-arrow-left\"></i></button>
                                        ".$this->showsp2($item['sanpham'],'col-20pt')."
                                        <button class=\"click-pn click-next\"><i class=\"fa-solid fa-arrow-right\"></i></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    else {
                        echo "
                            <div class=\"row\">
                                <div>
                                    <div class=\"ebd_img\" style=\"background: url(".$item['tieude']['ebd_img'].") bottom; background-size:cover;\">
                                        <button class=\"click-pn click-prev\"><i class=\"fa-solid fa-arrow-left\"></i></button>
                                        ".$this->showsp2($item['sanpham'],'col-3','ss-1')."
                                        <button class=\"click-pn click-next\"><i class=\"fa-solid fa-arrow-right\"></i></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>
        <?php } ?>         
    </div>

    <?php include 'include/footer.php' ?>
</body>
</html>