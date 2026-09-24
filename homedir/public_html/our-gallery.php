<?php
$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}

// Fetch gallery items from database if available
$gallery_list = [];
if ($con) {
    $gallery_query = @mysqli_query($con, "SELECT * FROM `gallery` WHERE `id`!='' AND `status`='Active' ORDER BY `order` ASC");
    if ($gallery_query && mysqli_num_rows($gallery_query) > 0) {
        while ($g_row = mysqli_fetch_assoc($gallery_query)) {
            $gallery_list[] = $g_row;
        }
    }
}

// Resilient fallback gallery catalog with real facility images
if (empty($gallery_list)) {
    $gallery_list = [
        [
            'id' => 71,
            'title' => 'Vacuum Distillation & Re-Refining Plant',
            'category' => 'Processing Infrastructure',
            'image' => '71_1.jpg',
            'caption' => 'High-vacuum thin-film distillation column for re-refining used lubricating oil into purified base oil stock.'
        ],
        [
            'id' => 72,
            'title' => 'Bulk Waste Oil Tank Farm & Storage',
            'category' => 'Storage Infrastructure',
            'image' => '72_2.jpg',
            'caption' => 'Engineered bulk oil storage vessels with containment dykes compliant with TNPCB environmental safety norms.'
        ],
        [
            'id' => 73,
            'title' => 'Dedicated Hazardous Waste Transport Fleet',
            'category' => 'Logistics & Fleet',
            'image' => '73_3.jpg',
            'caption' => 'GPS-monitored vacuum suction tankers and heavy transport vehicles certified for hazardous material carriage.'
        ],
        [
            'id' => 74,
            'title' => 'High-Capacity Drum & IBC Handling Yard',
            'category' => 'Material Handling',
            'image' => '74_4.jpg',
            'caption' => 'Spill-protected staging yard for MS closed drums, open-top barrels, and 1,000L intermediate bulk containers.'
        ],
        [
            'id' => 75,
            'title' => 'Quality Control & Analytical Laboratory',
            'category' => 'Testing & Compliance',
            'image' => '75_5.jpg',
            'caption' => 'In-house laboratory verifying moisture content, flash points, viscosity index, and PCB contaminant limits.'
        ],
        [
            'id' => 76,
            'title' => 'Industrial Waste Treatment & Recovery',
            'category' => 'Recycling Operations',
            'image' => '76_6.jpg',
            'caption' => 'Secondary fuel recovery and solvent distillation operations facilitating circular industrial economy.'
        ]
    ];
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Infrastructure &amp; Facility Gallery | Waste Oil Re-Refining Plant | Green Way Industries</title>
    <meta name="description" content="Explore Green Way Industries infrastructure: vacuum distillation plant, bulk oil storage tank farm, GPS-monitored tanker fleet, and QA testing laboratory in Tamil Nadu.">
    <meta name="keywords" content="used oil recycling plant photos, waste oil distillation facility Tamil Nadu, hazardous waste tanker fleet India, Green Way Industries Tindivanam, industrial waste infrastructure gallery, used oil tank farm Chennai, recycling facility Tamil Nadu">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/our-gallery.php">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="Infrastructure &amp; Facility Operations Gallery | Green Way Industries">
    <meta property="og:description" content="View our TNPCB-authorized vacuum distillation facility, bulk storage tanks, and hazardous waste logistics fleet in Tamil Nadu, India.">
    <meta property="og:url" content="https://wasteoil.in/our-gallery.php">
    <meta property="og:image" content="https://wasteoil.in/gallery/71_1.jpg">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Recycling Infrastructure Gallery | Green Way Industries">
    <meta name="twitter:description" content="Explore Green Way Industries state-of-the-art oil recycling facility in Tamil Nadu.">
    <meta name="twitter:image" content="https://wasteoil.in/gallery/71_1.jpg">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific css -->
    <link rel="stylesheet" href="css/magnific.min.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="css/venobox.css">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modern service & gallery styles -->
    <link rel="stylesheet" href="css/service-modern.css">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div id="preloader"></div>
    
    <!-- header start -->
    <?php 
    if ($con) {
        include('header.php');
    } else {
    ?>
    <header class="header-one">
        <div class="topbar-area fix hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-9">
                        <div class="topbar-left">
                            <ul>
                                <li><a href="#"><i class="fa fa-map-marker"></i> Chennai, India</a></li>
                                <li><a href="mailto:admin@usedoil.in"><i class="fa fa-envelope"></i> admin@usedoil.in</a></li>
                                <li><a href="tel:+919360036055"><i class="fa fa-phone"></i> +91 93600 36055</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="quote-button top-btn">
                            <a href="contact-us.php" class="quote-btn">Quick Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticker" class="header-area header-area-4 hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                                <img style="max-width: 280px;margin-top: 12px;" src="img/logo/logo.png" alt="Green Way Industries">
                            </a>
                        </div>
                    </div>
                    <div style="margin-top: 10px;" class="col-md-10 col-sm-10">
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About us</a></li>
                                        <li><a class="pagess" href="services.php?s_id=16">Our Services</a>
                                            <ul class="sub-menu">
                                                <li><a href="services.php?s_id=16">Waste Oil Disposal</a></li>
                                                <li><a href="services.php?s_id=17">Waste Oil Recycling</a></li>
                                                <li><a href="services.php?s_id=21">Waste Oil Collection</a></li>
                                                <li><a href="services.php?s_id=22">Used Oil Disposal</a></li>
                                                <li><a href="services.php?s_id=23">Used Oil Recycler</a></li>
                                                <li><a href="services.php?s_id=24">Hazardous Waste Recycler</a></li>
                                                <li><a href="services.php?s_id=25">Used Transformer Oil Recycling</a></li>
                                                <li><a href="services.php?s_id=26">Used Hydraulic Oil</a></li>
                                                <li><a href="services.php?s_id=27">Spent Oil</a></li>
                                                <li><a href="services.php?s_id=28">Hazardous Waste Transport</a></li>
                                                <li><a href="services.php?s_id=29">Hazardous Waste Disposal for Ships</a></li>
                                                <li><a href="services.php?s_id=30">Industrial Waste Management</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="certifications.php">Our Certifications</a></li>
                                        <li><a href="our-industries.php">Our Industries</a></li>
                                        <li><a href="our-products.php">Our Products</a></li>
                                        <li class="active"><a href="our-gallery.php">Our Gallery</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php } ?>
    <!-- header end -->
    
    <!-- Start Slider Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3>Our Gallery</h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="index.php" style="color:#fff;">Home</a></li>
                            <li>Our Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Gallery Content Area -->
    <div class="gw-section-2026" style="padding: 70px 0; background: #f4f8f5;">
        <div class="container">
            <!-- Section Header -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <div class="gw-badge-pill" style="display:inline-flex;margin-bottom:14px;">
                        <i class="fa fa-camera"></i> Operational Infrastructure &amp; Facilities
                    </div>
                    <h1 class="gw-section-title" style="font-size:32px;font-weight:800;color:var(--gw-deep);margin-bottom:16px;">
                        Green Way Industries Facility &amp; Operations Gallery
                    </h1>
                    <p class="gw-section-lead" style="font-size:16px;color:#4b6154;line-height:1.7;max-width:820px;margin:0 auto 20px;">
                        Explore our TNPCB-authorized recycling facilities in Tindivanam, bulk waste oil storage tank farms, GPS-monitored vacuum transport tankers, drum staging yards, and quality control laboratories.
                    </p>
                </div>
            </div>

            <!-- Modern Gallery Grid -->
            <div class="gw-gallery-grid">
                <?php
                $item_index = 1;
                foreach ($gallery_list as $gal) {
                    $g_title = !empty($gal['title']) ? htmlspecialchars($gal['title']) : 'Facility Operation #' . $item_index;
                    $g_cat = !empty($gal['category']) ? htmlspecialchars($gal['category']) : 'Infrastructure';
                    $g_img_raw = $gal['image'] ?? '';
                    $g_img = !empty($g_img_raw) && file_exists(__DIR__ . '/gallery/' . $g_img_raw)
                        ? 'gallery/' . htmlspecialchars($g_img_raw)
                        : (!empty($g_img_raw) ? 'gallery/' . htmlspecialchars($g_img_raw) : 'img/service/1.jpg');
                    $g_caption = !empty($gal['caption']) ? htmlspecialchars($gal['caption']) : $g_title;
                ?>
                <div class="gw-gallery-card">
                    <img src="<?php echo $g_img; ?>" alt="<?php echo $g_title; ?>" loading="lazy">
                    <div class="gw-gallery-overlay">
                        <span class="gw-gallery-sub"><i class="fa fa-tag"></i> <?php echo $g_cat; ?></span>
                        <h4 class="gw-gallery-caption"><?php echo $g_title; ?></h4>
                    </div>
                    <a class="venobox gw-gallery-zoom-btn vbox-item" data-gall="gwGallery" href="<?php echo $g_img; ?>" title="<?php echo $g_title; ?> - <?php echo $g_caption; ?>">
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>
                <?php 
                    $item_index++;
                } 
                ?>
            </div>

            <!-- Operational Highlights Strip -->
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-cogs" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Vacuum Distillation</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">High-vacuum thin-film processing ensures high base oil yield and strict impurity removal.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-tint" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Bulk Storage Tanks</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">High-capacity segregated tank farm with secondary containment dykes and safety monitoring.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-truck" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">GPS-Tracked Fleet</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">Heavy vacuum tankers and hazardous material vehicles serving all Tamil Nadu industrial hubs.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-file-text-o" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Form-10 Documentation</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">Statutory compliance records, disposal certificates, and complete audit trail for generators.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Callout Banner -->
            <div class="gw-cta-box" style="margin-top:35px;background:linear-gradient(135deg,#103a2a 0%,#196b45 100%);border-radius:12px;padding:40px;color:#ffffff;box-shadow:0 12px 32px rgba(16,58,42,0.2);">
                <div class="row" style="display:flex;align-items:center;flex-wrap:wrap;">
                    <div class="col-md-8 col-sm-12">
                        <h3 style="color:#ffffff;font-size:24px;font-weight:700;margin-top:0;margin-bottom:10px;">
                            Schedule a Facility Compliance Audit or Waste Pickup
                        </h3>
                        <p style="color:#d5e8dc;font-size:15px;margin:0;line-height:1.6;">
                            Our environmental compliance specialists assist manufacturing units with storage assessments, hazardous waste profiling, and authorized recycling manifests.
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right" style="margin-top:15px;">
                        <a href="contact-us.php" class="gw-btn-lime" style="display:inline-block;padding:12px 26px;border-radius:6px;background:var(--gw-lime);color:var(--gw-deep);font-weight:700;text-decoration:none;margin-right:10px;">
                            Contact Facility Desk
                        </a>
                        <a href="tel:+919360036055" style="display:inline-block;padding:12px 20px;border-radius:6px;background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.3);font-weight:700;text-decoration:none;">
                            <i class="fa fa-phone"></i> +91 93600 36055
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Gallery Content Area -->

    <!-- Start Footer bottom Area -->
    <?php 
    if ($con) {
        include('footer.php');
    } else {
    ?>
    <footer style="background:#103a2a;color:#fff;padding:40px 0;">
        <div class="container text-center">
            <p><strong>Green Way Industries</strong> • Authorized Waste Oil Collection &amp; Recycling Solutions in Tamil Nadu</p>
            <p style="font-size:14px;color:#a8c4b2;">Corporate Office: 78/30 Suscon Builder, 53rd Street, Ashok Nagar, Chennai - 600083<br>
            Processing Facility: SIDCO Industrial Estate, Venmaniathur &amp; Pattanam Village, Tindivanam, Villupuram - 604207</p>
            <p style="font-size:14px;"><a href="tel:+919360036055" style="color:#b5e85f;">+91 93600 36055</a> | <a href="mailto:admin@usedoil.in" style="color:#b5e85f;">admin@usedoil.in</a></p>
        </div>
    </footer>
    <?php } ?>

    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Counter js -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- waypoint js -->
    <script src="js/waypoints.js"></script>
    <!-- isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- stellar js -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- magnific js -->
    <script src="js/magnific.min.js"></script>
    <!-- venobox js -->
    <script src="js/venobox.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- Form validator js -->
    <script src="js/form-validator.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>

</html>