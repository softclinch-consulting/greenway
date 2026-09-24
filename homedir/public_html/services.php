<?php 
$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}

$service_id = isset($_REQUEST['s_id']) ? (int)$_REQUEST['s_id'] : 0;
$service_dtl1 = null;

if ($con && $service_id > 0) {
    $service_dtl = mysqli_query($con, "SELECT * FROM `service` WHERE `id`='$service_id'");
    if ($service_dtl && mysqli_num_rows($service_dtl) > 0) {
        $service_dtl1 = mysqli_fetch_array($service_dtl);
    }
}

// Master Metadata & Routing Configuration for all 12 Green Way Services
$service_registry = [
    16 => [
        'name' => 'Waste Oil Disposal',
        'title' => 'Industrial Waste Oil Disposal Services in Tamil Nadu, India | TNPCB Authorized',
        'meta_desc' => 'TNPCB authorized industrial waste oil disposal across Tamil Nadu & India. Safe on-site vacuum tanker collection, Form-10 manifests, and certified disposal. Call +91 93600 36055.',
        'keywords' => 'waste oil disposal Tamil Nadu, industrial waste oil disposal Chennai, authorized waste oil disposal company India, factory waste oil disposal Sriperumbudur, Form 10 waste oil manifest, waste oil pickup service Hosur Coimbatore, compliant oil disposal Tamil Nadu, used oil disposal certificate India',
        'file' => 'waste-oil-disposal-professional.php',
        'image' => '16_1.jpg'
    ],
    17 => [
        'name' => 'Waste Oil Recycling',
        'title' => 'Industrial Waste Oil Recycling & Re-Refining Services in Tamil Nadu, India',
        'meta_desc' => 'TNPCB-authorized waste oil recycling and vacuum re-refining company in Tamil Nadu. Convert used oils into reusable base oils and secondary fuels across India.',
        'keywords' => 'waste oil recycling Tamil Nadu, waste oil re-refining company India, used lube oil recycling Chennai, vacuum distillation used oil plant, industrial waste oil recycler Tamil Nadu, recycled base oil manufacturer India, circular economy oil recycling, waste oil buyers Tamil Nadu',
        'file' => 'waste-oil-recycling-professional.php',
        'image' => '17_2.jpg'
    ],
    21 => [
        'name' => 'Waste Oil Collection',
        'title' => 'On-Site Waste Oil Collection & Tanker Pickup in Tamil Nadu | GPS Fleet',
        'meta_desc' => 'Scheduled & emergency on-site waste oil collection across Tamil Nadu. Dedicated GPS vacuum suction tankers, spill prevention, and digital Form-10 tracking statewide.',
        'keywords' => 'waste oil collection Tamil Nadu, waste oil collection near me, waste oil pickup Chennai, vacuum tanker oil collection Hosur, factory waste oil collection Coimbatore, used oil collection service India, waste oil buyers near me, industrial oil tanker service Tamil Nadu',
        'file' => 'waste-oil-collection-professional.php',
        'image' => '21_3.jpg'
    ],
    22 => [
        'name' => 'Used Oil Disposal',
        'title' => 'Used Oil Disposal & Drained Lubricant Management in Tamil Nadu, India',
        'meta_desc' => 'Compliant used oil disposal for drained engine oils, gear oils, and machine lubricants across Tamil Nadu. Certified safe disposal with statutory Form-10 records.',
        'keywords' => 'used oil disposal Tamil Nadu, engine oil disposal Chennai, gear oil disposal India, industrial used oil disposal Sriperumbudur, drained lubricant disposal Tamil Nadu, authorized used oil collectors India, machine maintenance oil disposal',
        'file' => 'used-oil-disposal-professional.php',
        'image' => '22_4.jpg'
    ],
    23 => [
        'name' => 'Used Oil Recycler',
        'title' => 'TNPCB Authorized Used Oil Recycler in Tamil Nadu | Re-Refining India',
        'meta_desc' => 'Looking for an authorized used oil recycler in Tamil Nadu? Green Way Industries offers direct industrial procurement, vacuum refining, and complete compliance tracking across India.',
        'keywords' => 'used oil recycler Tamil Nadu, authorized used oil recycler Chennai, used oil buyers Tamil Nadu, TNPCB approved used oil recycler, used oil re-refiners India, sell used oil Chennai Hosur Coimbatore, best used oil price Tamil Nadu, certified oil recycler India',
        'file' => 'used-oil-recycler-professional.php',
        'image' => '23_5.jpg'
    ],
    24 => [
        'name' => 'Hazardous Waste Recycler',
        'title' => 'Hazardous Waste Recycler & Resource Recovery in Tamil Nadu, India | CPCB/TNPCB',
        'meta_desc' => 'Authorized industrial hazardous waste recycling and resource recovery in Tamil Nadu. Compliant handling for oily sludges, contaminated containers, and chemical residues across India.',
        'keywords' => 'hazardous waste recycler Tamil Nadu, industrial hazardous waste management Chennai, oily sludge recycling India, contaminated drum recycling Tamil Nadu, hazardous waste disposal company India, CPCB authorized recycler, Rule 9 hazardous waste authorization',
        'file' => 'hazardous-waste-recycler-professional.php',
        'image' => '24_6.jpg'
    ],
    25 => [
        'name' => 'Used Transformer oil recycling',
        'title' => 'Used Transformer Oil Recycling & Dehydration Services in Tamil Nadu, India',
        'meta_desc' => 'Authorized used transformer oil recycling, moisture stripping, and dielectric re-refining across Tamil Nadu and India. Compliant substation and power grid oil disposal.',
        'keywords' => 'used transformer oil recycling Tamil Nadu, transformer oil disposal Chennai, transformer oil filtration India, dielectric oil recycling, burnt transformer oil buyers India, substation oil disposal Tamil Nadu, transformer oil re-refining plant',
        'file' => 'used-transformer-oil-recycling-professional.php',
        'image' => '25_7.jpg'
    ],
    26 => [
        'name' => 'Used Hydraulic Oil',
        'title' => 'Used Hydraulic Oil Recycling & Fluid Management in Tamil Nadu, India',
        'meta_desc' => 'Specialized collection, water separation, multi-stage filtration, and recycling for spent hydraulic fluids from manufacturing plants and heavy machinery across Tamil Nadu.',
        'keywords' => 'used hydraulic oil recycling Tamil Nadu, hydraulic oil disposal Chennai, industrial hydraulic fluid recycling India, spent hydraulic oil collection Coimbatore, heavy equipment oil disposal, hydraulic fluid filtration Tamil Nadu',
        'file' => 'used-hydraulic-oil-professional.php',
        'image' => '26_8.jpg'
    ],
    27 => [
        'name' => 'Spent Oil',
        'title' => 'Spent Oil Management & Industrial Process Oil Recycling in Tamil Nadu, India',
        'meta_desc' => 'Authorized collection, chemical assessment, recycling, and certified disposal for spent metalworking fluids, quenching oils, and process oils in Tamil Nadu & India.',
        'keywords' => 'spent oil recycling Tamil Nadu, spent cutting oil disposal Chennai, spent quenching oil India, industrial process oil management, metalworking fluid disposal Tamil Nadu, coolant oil recycling, Form 10 spent oil manifest',
        'file' => 'spent-oil-professional.php',
        'image' => '27_9.jpg'
    ],
    28 => [
        'name' => 'Hazardous Waste Transport',
        'title' => 'Authorized Hazardous Waste Transport Services in Tamil Nadu | GPS Tankers',
        'meta_desc' => 'Statewide authorized hazardous waste transportation. Certified containment vehicles, vacuum tankers, trained hazmat drivers, and Form-10 manifests in Tamil Nadu & interstate.',
        'keywords' => 'hazardous waste transport Tamil Nadu, hazardous waste transportation company Chennai, GPS waste tanker transport India, Rule 18 hazardous waste transport, hazmat logistics Tamil Nadu, authorized hazardous waste carriers India',
        'file' => 'hazardous-waste-transport-professional.php',
        'image' => '28_10.jpg'
    ],
    29 => [
        'name' => 'Hazardous Waste Disposal for Ships',
        'title' => 'Ship Hazardous Waste Disposal & MARPOL Annex I Bilge Sludge Reception Chennai',
        'meta_desc' => 'MARPOL Annex I port reception & disposal for oily bilge water, sludge, and marine hazardous waste at Chennai Port, Kamarajar (Ennore), and Kattupalli Port with official receipts.',
        'keywords' => 'ship hazardous waste disposal Chennai, MARPOL Annex I port reception Tamil Nadu, bilge water disposal Chennai port, vessel sludge disposal Ennore Kattupalli, marine waste management India, port oily waste reception contractor',
        'file' => 'hazardous-waste-disposal-for-ships-professional.php',
        'image' => '29_11.jpg'
    ],
    30 => [
        'name' => 'Industrial Waste Management',
        'title' => 'Comprehensive Industrial Waste Management Contracts in Tamil Nadu, India',
        'meta_desc' => 'End-to-end industrial waste management contracts for factories and SEZs across Tamil Nadu. Waste audit, hazardous & non-hazardous collection, and TNPCB compliance filing.',
        'keywords' => 'industrial waste management Tamil Nadu, factory waste management company Chennai, industrial waste management services India, total waste management contracts Hosur Sriperumbudur, SEZ waste management India, industrial compliance audit',
        'file' => 'industrial-waste-management-professional.php',
        'image' => '30_12.jpg'
    ]
];

// Determine Page Title, Meta Description, Keywords, and Canonical URL
if (isset($service_registry[$service_id])) {
    $page_title = $service_registry[$service_id]['title'];
    $meta_desc = $service_registry[$service_id]['meta_desc'];
    $meta_keywords = $service_registry[$service_id]['keywords'];
    $display_name = !empty($service_dtl1['name']) ? $service_dtl1['name'] : $service_registry[$service_id]['name'];
    $canonical_url = "https://wasteoil.in/services.php?s_id=" . $service_id;
} elseif (!empty($service_dtl1['name'])) {
    $display_name = $service_dtl1['name'];
    $page_title = htmlspecialchars($display_name) . " in Tamil Nadu, India | Green Way Industries";
    $meta_desc = "Green Way Industries provides authorized " . htmlspecialchars($display_name) . ", waste oil collection, used oil recycling, and industrial waste management solutions in Tamil Nadu and across India.";
    $meta_keywords = htmlspecialchars($display_name) . ", waste oil recycling Tamil Nadu, industrial waste management Chennai, TNPCB authorized recycler, waste oil collection India";
    $canonical_url = "https://wasteoil.in/services.php?s_id=" . $service_id;
} else {
    $display_name = "Our Services";
    $page_title = "Waste Oil Recycling & Industrial Waste Services in Tamil Nadu, India | Green Way";
    $meta_desc = "Explore specialized waste oil collection, used oil recycling, certified disposal, and hazardous waste management services across Tamil Nadu and India by Green Way Industries.";
    $meta_keywords = "waste oil collection Tamil Nadu, used oil recycling India, hazardous waste disposal Chennai, TNPCB authorized recycler, industrial waste management";
    $canonical_url = "https://wasteoil.in/services.php";
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- JSON-LD Structured Data Schema for Rich Snippets -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "<?php echo htmlspecialchars($display_name); ?>",
      "provider": {
        "@type": "RecyclingCenter",
        "name": "Green Way Industries",
        "telephone": "+919360036055",
        "email": "admin@usedoil.in",
        "image": "https://wasteoil.in/img/logo/logo.png",
        "url": "https://wasteoil.in/",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "78/30 Suscon Builder, 53rd Street, Ashok Nagar",
          "addressLocality": "Chennai",
          "addressRegion": "Tamil Nadu",
          "postalCode": "600083",
          "addressCountry": "IN"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 13.0336,
          "longitude": 80.2117
        }
      },
      "areaServed": [
        { "@type": "AdministrativeArea", "name": "Tamil Nadu" },
        { "@type": "Country", "name": "India" }
      ],
      "description": "<?php echo htmlspecialchars($meta_desc); ?>"
    }
    </script>

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
    <!-- modern service animations, motion & interactive styles -->
    <link rel="stylesheet" href="css/service-modern.css">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div id="preloader"></div>
    
    <!-- header -->
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
                        <div class="quote-button">
                            <a href="contact-us.php" class="quote-btn">Get a quote</a>
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
                                        <li class="active"><a class="pagess" href="#">Our Services</a>
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
                                        <li><a href="our-gallery.php">Our Gallery</a></li>
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
    
    <!-- Start Slider Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3><?php echo htmlspecialchars($display_name);?></h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="index.php" style="color:#fff">Home</a></li>
                            <li><?php echo htmlspecialchars($display_name);?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Service Content Area -->
    <?php 
    if (isset($service_registry[$service_id]) && file_exists(__DIR__ . '/' . $service_registry[$service_id]['file'])) {
        include($service_registry[$service_id]['file']);
    } elseif ($service_dtl1) { ?>
    <div class="video-area bg-color area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-image gw-visual-frame">
                        <img src="service_one/<?php echo htmlspecialchars($service_dtl1['image_one']);?>" alt="<?php echo htmlspecialchars($display_name);?>" class="ab-first-img">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="video-text">
                        <h4><?php echo htmlspecialchars($service_dtl1['name']);?></h4>
                        <div style="text-align: justify;">
                            <?php echo $service_dtl1['desc'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="video-area bg-color area-padding text-center">
        <div class="container">
            <h2>Select a Service</h2>
            <p>Please browse our industrial services from the navigation menu above or explore <a href="index.php#services">all services on our homepage</a>.</p>
        </div>
    </div>
    <?php } ?>

    <!-- Start Footer bottom Area -->
    <?php 
    if ($con) {
        include('footer.php');
    } else {
    ?>
    <footer style="background:#103a2a;color:#fff;padding:35px 0">
        <div class="container text-center">
            <p><strong>Green Way Industries</strong> • Authorized Waste Oil Collection &amp; Recycling Solutions in Tamil Nadu</p>
            <p style="font-size:14px;color:#a8c4b2">Corporate Office: 78/30 Suscon Builder, 53rd Street, Ashok Nagar, Chennai - 600083<br>
            Processing Facility: SIDCO Industrial Estate, Venmaniathur &amp; Pattanam Village, Tindivanam, Villupuram - 604207</p>
            <p style="font-size:14px"><a href="tel:+919360036055" style="color:#b5e85f">+91 93600 36055</a> | <a href="mailto:admin@usedoil.in" style="color:#b5e85f">admin@usedoil.in</a></p>
        </div>
    </footer>
    <?php } ?>

    <!-- all js here -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/main.js"></script>
    <script src="js/service-modern.js"></script>
</body>
</html>
