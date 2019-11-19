<div class="site-main-container">
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php $state = $this->uri->segment(3); ?>
                            <?php $city = $this->uri->segment(4); ?>
                            <?php $data['staten'] = $this->admin_datawork->get_id('states', ['stateSlug' => $state]); ?>
                            <?php $data['citen'] = $this->admin_datawork->get_id('district', ['citySlug' => $city]); ?>

                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">होम</a></li>
                            <?php if(empty($city)){ $actv = "active"; } else { $actv = ""; } ?>
                            <li class="breadcrumb-item <?php echo $actv; ?>"><a href="<?= base_url(); ?>home/state"><?php echo $data['staten']['stateName']; ?></a></li>

                            <?php if(!empty($city)){ ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $data['citen']['cityName']; ?></li>
                            <?php } ?>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                    <?php
                    $data['cats'] = $this->admin_datawork->get_id('category', ['catSlug' => $this->uri->segment(3)]);
                    $catHindi = $data['cats']['catHindi'];
                    ?>
                        <h4 class="cat-title"><?php echo $catHindi; ?> न्यूज़ </h4>
                        <?php foreach($today as $lnews){ ?>
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <?php if($lnews->blogImg1 == ""){
                                    $img1 = base_url(). 'assets/image/default.jpg';
                                    } else{
                                    $img1 = base_url(). 'assets/image/blogs/'.$lnews->blogImg1;
                                    } ?>
                                    <img class="img-fluid" src="<?php echo $img1; ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <?php $data['categ'] = $this->admin_datawork->get_id('category', ['catId' => $lnews->blogCat]); ?>
                                    <li><a href="#"><?php echo $data['categ']['catName']; ?></a></li>
                                </ul>
                            </div>

                            <?php 
                                $input = $lnews->blogView;

                                $k = pow(10,3);
                                $mil = pow(10,6);
                                $bil = pow(10,9);

                                if($input >= $bil){
                                     $output = $input / $bil . 'B';
                                }
                                elseif($input >= $mil){
                                     $output = round($input / $mil, 1) . 'M';
                                }
                                elseif($input >= $k){
                                     $output = round($input / $k, 1) . 'K';
                                }
                                elseif($input == ""){
                                     $output = "0";
                                }
                                else{
                                     $output = $input;
                                }
                            ?>

                            <div class="col-lg-7 post-right">
                                <a href="<?= base_url(); ?>home/news/<?php echo $data['categ']['catSlug']; ?>/<?php echo $lnews->blogSlug; ?>">
                                    <h4><?php echo $lnews->blogTitle ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href=""><span class="lnr lnr-calendar-full"></span><?php echo $lnews->blogDate ?></a></li>
                                    <li><a href=""><span class="fa fa-clock-o"></span> <?php echo $lnews->blogTime ?></a></li>
                                    <li><a href=""><span class="fa fa-eye"></span> <b><?php echo $output; ?></b></a></li>
                                    <li><a href=""><span class="lnr lnr-bubble"></span> Comments</a></li>
                                </ul>
                                <p class="excert">
                                    <?php echo $lnews->blogSubtitle ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="col-lg-12 mt-4">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                        
                    <!-- End latest-post Area -->
                </div>
                
                <div class="col-lg-4">
                    <div class="sidebars-area">
                        <div class="single-sidebar-widget editors-pick-widget">
                            <h6 class="title">भारत के राज्य </h6>
                            <div class="editors-pick-post">
                                <div class="post-lists">
                                    <div class="single-post d-flex flex-row">
                                        <div class="thumb">
                                            <img src="img/e2.jpg" alt="">
                                        </div>
                                        <div class="detail">
                                            <?php foreach($dist as $dist){ ?>
                                            <a href="<?= base_url(); ?>home/city/<?php echo $state.'/'. $dist->citySlug; ?>"><h5 class="mb-3"><?php echo $dist->cityName; ?></h5></a>
                                        <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>