<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/lib.php' ?>
    <title>Tranh Chủ</title>
    <link rel="stylesheet" href="<?php echo plrc ?>css/index.css">
    <script style="text/javascript" src="<?php echo plrc ?>jquery/index.js"></script>
</head>
<body>
    <?php include 'include/header.php' ?>
    <?php include 'include/modal.php' ?>

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
                <div class=" col-lg-6 poster_item">
                    <div class="khung-poster">
                        <img src="<?php echo plrc.'data' ?>/pc2-1.jpg" class="anh-poster" alt="">
                        <div class="chu-poster trai-poster">
                            <p class="p-poster">Mã : Z59-I9109K-TTRTX</p>
                            <ul class="ul-poster">
                                <li class="li-poster">Main : Z590</li>
                                <li class="li-poster">CPU : Core I9 10900K</li>
                                <li class="li-poster">Tản Nhiệt : Nước Custom</li>
                                <li class="li-poster">Ram : 32Gb 3600Mhz</li>
                                <li class="li-poster">VGA : TITAN RTX (FE)</li>
                                <li class="li-poster">PSU : 10Kw</li>
                            </ul>
                            <a href="sanpham.html" target="blank" class="btn btn-outline-light">Xem thêm &raquo;</a>
                        </div>
                    </div>                    
                </div>
                <div class=" col-lg-6 poster_item">
                    <div class="khung-poster">
                        <img src="<?php echo plrc.'data' ?>/pc5.jpg" class="anh-poster" alt="">
                        <div class="chu-poster phai-poster">
                            <p class="p-poster">Mã : X57-R756X-3070</p>
                            <ul class="ul-poster">
                                <li class="li-poster">Main : X570</li>
                                <li class="li-poster">CPU : Ryzen 5 5600X</li>
                                <li class="li-poster">Tản Nhiệt : stock</li>
                                <li class="li-poster">Ram : 32Gb 3200Mhz</li>
                                <li class="li-poster">VGA : RTX 3070</li>
                                <li class="li-poster">PSU : 800W</li>
                            </ul>
                            <a href="sanpham.html" target="blank" class="btn btn-outline-light">Xem thêm &raquo;</a>
                        </div>
                    </div>                    
                </div>
            </div>               
        </div>
    </div>
    <div class="container pad_1" id="list-sanpham">
        <h2 class="tieude">Hàng Mới Về</h2>
        <div class="row">
            <?php if (isset($newsp)) {
                echo $this->showsp($newsp); } ?>
        </div> 
        <hr>             
        <h2 class="tieude">Sản Phẩm HOT</h2>
        <div class="row">
            <?php if (isset($hotsp)) {
                echo $this->showsp($hotsp); } ?>
        </div>
        <hr>           
        <h2 class="tieude">Tất Cả Sản Phẩm</h2>
        <div class="row">
            <?php if (isset($fullsp)) {
                echo $this->showsp($fullsp); } ?>
        </div>           
    </div>

    <?php include 'include/footer.php' ?>
</body>
</html>