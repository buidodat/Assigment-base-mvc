<?php 
use App\Models\SanPhamModel;
use App\Models\SanPhamChiTietModel;
?>
    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="intro11-section swiper-slide slide-1 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content text-left">
                        <h3 class="title-slider text-uppercase">Top Trend</h3>
                        <h2 class="title">2022 Flower Trend</h2>
                        <p class="desc-content">Lorem ipsum dolor sit amet, pri autem nemore bonorum te. Autem fierent ullamcorper ius no, nec ea quodsi invenire. </p>
                        <a href="?ctl=productdentail" class="btn flosun-button secondary-btn theme-color  rounded-0">Shop Now</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
                <div class="intro11-section swiper-slide slide-2 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content text-left">
                        <h3 class="title-slider black-slider-title text-uppercase">Collection</h3>
                        <h2 class="title">Flowers and Candle <br> Birthday Gift</h2>
                        <p class="desc-content">Lorem ipsum dolor sit amet, pri autem nemore bonorum te. Autem fierent ullamcorper ius no, nec ea quodsi invenire. </p>
                        <a href="?ctl=productdentail" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination" ></div>
        </div>
    </div>
    <!-- Slider/Intro Section End -->
    <!--Product Area Start-->
    <?php 
        foreach($danhsachdanhmuc as $dm):
    ?>
    <div class="product-area mt-text-2" style="margin-bottom:40px">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <h3 class="section-title-3"><?=$dm->ten_dm?></h3>
                        <span class="section-title-1"><?=$dm->slogan?></span>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            <?php
                                $spdm = SanPhamModel::sanPhamHomeWhereDanhMuc($dm->ma_dm);
                                foreach($spdm as $sp):
                                    // $spct = SanPhamChiTietModel::where("ma_sp","=",$sp->ma_sp)->get();
                            ?>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="productdentail?ma_sp=<?=$sp->ma_sp?>">
                                            <img src="images/<?=$sp->hinh?>" alt="" class="product-image-1 w-100">
                                        
                                        </a>
                                        <span class="onsale">Sale!</span>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="?ctl=productdentail"><?=$sp->ten_sp?></a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <?php 
                                                $priceFake= number_format($sp->gia_min,0,",",".")."đ";
                                                $priceReal = number_format($sp->gia_min - $sp->giam_gia,0,",",".")."đ";
                                            ?>
                                            <span class="regular-price "><?= $priceReal?></span>
                                            <span class="old-price"><del><?= $priceFake ?></del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <?php 
                                endforeach;
                            ?>
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination" style="bottom:25px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        endforeach;
    ?>
