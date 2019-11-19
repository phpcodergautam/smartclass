<!DOCTYPE html>
<html lang="en">
<?php
$loginuser = $this->admin_datawork->get_data('organisation', ['orgEmail' => $this->session->userdata('scuser_authenticate')]);
    foreach($loginuser as $loginuser){}
        if($loginuser->orgImage == ""){
            $photo = base_url() . "assets/image/em-boy-1.svg";
        }
        else {
            $photo = base_url() . "assets/image/admin/".$loginuser->orgImage;
        }
    ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Smart Class</title>
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css" type="text/css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/default-skin.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/photoswipe.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Date and Time css -->

    <!-- Date and Time css -->
    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
</head>

<body class="app sidebar-mini rtl">
    <header class="app-header">
        <a class="app-header__logo small-200" href="<?= base_url('org/index'); ?>">
            <p class="text-truncate mb-0">JIIT Smart Class</p>
        </a>
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <script type="text/javascript">
                window.onload = initClock;

                function initClock() {
                    var now = new Date();
                    var hr = now.getHours();
                    var min = now.getMinutes();
                    var sec = now.getSeconds();
                    if (min < 10) min = "0" + min; // insert a leading zero
                    if (sec < 10) sec = "0" + sec;
                    if (hr == 0) {
                        hr = 12;
                    }

                    if (hr > 12) {
                        hr = hr - 12;
                        if (hr < 10) hr = "0" + hr; // insert a leading zero
                        session = "PM";
                    } else {
                        session = "AM";
                    }
                    document.getElementById('clockDisplay').innerHTML = "" + hr + ":" + min + ":" + sec + " " + session;
                    setTimeout('initClock()', 500);
                }

            </script>

            <li class="dropdown d-none d-lg-block bg-dark">
                <a class="app-nav__item text-white" style="width:170px;">
                    <div class="h5 m-0"><i class="fa fa-clock-o px-2"></i> <span id="clockDisplay" class="mb-0"></span></div>
                </a>
            </li>
            
            
                 <li class="dropdown d-none d-lg-block">
                <a class="app-nav__item text-white" onclick="openFullscreen();"><i class="fa fa-lg fa-expand"></i></a>
            </li>
            <li class="dropdown d-none d-lg-block">
                <a class="app-nav__item text-white" onclick="closeFullscreen();"><i class="fa fa-lg fa-compress"></i></a>
            </li>
            
            
            

            <script>
                var elem = document.documentElement;

                function openFullscreen() {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.mozRequestFullScreen) { /* Firefox */
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) { /* IE/Edge */
                        elem.msRequestFullscreen();
                    }
                }

                function closeFullscreen() {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }
                }

            </script>


            
            
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user-o fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <span class="d-md-none">
                        <li>
                            <a class="dropdown-item" href="<?= base_url(); ?>org/profile"><i class="fa fa-user fa-lg"></i> Profile</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>org/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                        </li>
                    </span>
                    <div class="dropdown-menu settings-menu dropdown-menu-right user-dd animated flipInY show d-none d-lg-block" style="width: 250px;">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div class=""><img src="http://localhost/news/assets/image/em-boy-1.svg" alt="user" class="rounded-circle" width="50"></div>
                            <div class="ml-3">
                                <h4 class="mb-0">
                                    <?= $loginuser->orgName; ?>
                                </h4>
                                <p class=" mb-0 text-muted small">
                                    <?= $loginuser->orgEmail; ?>
                                </p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="<?= base_url(); ?>org/profile"><i class="fa fa-user mr-1 ml-1"></i> My Profile</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>org/logout"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                    </div>
                </ul>
            </li>
        </ul>
    </header>

    <?php foreach($subject as $subject){} ?>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li class="treeview is-expanded">
                <a class="app-menu__item active" href="<?= base_url('org/lession/'.$subject->subId) ?>" onclick="location.reload();" data-toggle=""><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">
                        <?php echo $subject->subName; ?></span></a>
                <ul class="treeview-menu">
                    <?php foreach($videocourse as $vc): ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>org/lession/<?php echo $this->uri->segment(3); ?>/<?= $vc->topicId; ?>"> <span title="<?= $vc->topicName ?>" class="text-truncate">
                                <?= $vc->topicName ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </aside>

    <script>
        var url = window.location;
        //var url = window.location;
        // for sidebar menu entirely but not cover treeview
        $('.app-sidevar ul li a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
        // for treeview
        $('ul li.treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".app-sidebar > .treeview-menu").addClass('active is-expanded');

    </script>
    <script>
        $(document).ready(function() {
            var links = $('.app-sidebar ul li a');
            $.each(links, function(key, va) {
                if (va.href == document.URL) {
                    $(this).addClass('active');
                }
            });
        });

    </script>
    <main class="app-content">
        <div class="tile rounded-0 shadow-sm">
            <div class="row">
                <div class="col-lg-12" >
                    <?php
        $countdata = $this->admin_datawork->count_all_con('topics', ['topicSubject' => $subject->subId]);
        if($countdata > 0){ ?>
                    <?php foreach($videosingle as $vidc){} ?>


                    <h4 class="h5"><i class="fa fa-video-camera mr-2"></i>
                        <?php echo $vidc->topicName; ?>
                    </h4>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= base_url().'assets/topicvideo/'.$vidc->topicVideo; ?>?autoplay=off" allowfullscreen></iframe>
                    </div>
                    <?php $vidc->topicId; ?>
                    <?php foreach($videoco as $rows){
                        $array1[] = $rows->topicId;
                    } ?>
                    <?php // print_r($array1); ?>
                    <?php $key = array_search ($vidc->topicId, $array1); ?>

                    <?php $key12 = array_search($vidc->topicId, $array1); ?>
                    <div class="col-2 offset-lg-10">
                        <div class="btn-group mt-3" role="group" aria-label="Basic example">
                            <?php $min = min(array_keys($array1)); ?>
                            <?php $max = max(array_keys($array1)); ?>
                            <!-- PREVIOUS START -->

                            <?php if($key12 == $min){ ?>

                            <?php $prevkey1 = $key; ?>
                            <?php $prevkey = $array1[$prevkey1]; ?>
                            <button class="btn btn-info" disabled type="button"><i class="fa fa-arrow-left"></i></button>
                            <?php } else { ?>
                            <?php $prevkey1 = $key - 1; ?>
                            <?php $prevkey = $array1[$prevkey1]; ?>
                            <a class="btn btn-info" href="<?= base_url(); ?>org/lession/<?php echo $subject->subId; ?>/<?php echo $prevkey; ?>"><i class="fa fa-arrow-left"></i></a>
                            <?php } ?>
                            <!-- PREVIOUS END -->

                            <button class="btn btn-secondary" type="button" onclick="location.reload();
"><i class="fa fa-repeat"></i></button>
                            <!-- NEXT START -->
                            <?php if($key12 == $max){ ?>

                            <?php $nextkey1 = $key; ?>
                            <?php $nextkey = $array1[$nextkey1]; ?>
                            <button class="btn btn-info" disabled type="button"><i class="fa fa-arrow-right"></i></button>
                            <?php } else { ?>
                            <?php $nextkey1 = $key + 1; ?>
                            <?php $nextkey = $array1[$nextkey1]; ?>
                            <a class="btn btn-info" href="<?= base_url(); ?>org/lession/<?php echo $subject->subId; ?>/<?php echo $nextkey; ?>"><i class="fa fa-arrow-right"></i></a>
                            <?php } ?>
                            <!-- NEXT END -->




                        </div>

                        <?php } else { ?>
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <div class="jumbotron">
                                    <h3 class="display-3">This Subjact has no any lession added till Now ! <i class="fas fa-sad"></i></h3>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
    </main>
