<?php
$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}

// Fetch products from database if available
$product_list = [];
if ($con) {
    $product_query = @mysqli_query($con, "SELECT * FROM `product` WHERE `id`!='' AND `status`='Active' ORDER BY `order` ASC");
    if ($product_query && mysqli_num_rows($product_query) > 0) {
        while ($p_row = mysqli_fetch_assoc($product_query)) {
            $product_list[] = $p_row;
        }
    }
}

// Resilient fallback product catalog matching database records
if (empty($product_list)) {
    $product_list = [
        [
            'id' => 17,
            'name' => 'MS Open Barrel',
            'image' => '17_p1.png',
            'tag' => 'Steel Drum',
            'desc' => 'High-grade open-top reconditioned mild steel barrels with removable lid and heavy-duty clamp ring, ideal for sludge, grease, and industrial waste containment.',
            'specs' => ['210 Litre Capacity', 'Locking Lever Ring', 'Reconditioned & Tested']
        ],
        [
            'id' => 18,
            'name' => 'Open Barrel Plastic',
            'image' => '18_p2.png',
            'tag' => 'HDPE Drum',
            'desc' => 'Chemical-resistant high-density polyethylene open-top drums suitable for corrosive liquids, chemical effluents, and acidic industrial waste handling.',
            'specs' => ['210 Litre Capacity', 'Heavy-Duty HDPE', 'Corrosion Resistant']
        ],
        [
            'id' => 19,
            'name' => 'Furnace Oil',
            'image' => '19_p3.png',
            'tag' => 'Industrial Fuel',
            'desc' => 'Re-refined industrial heating fuel processed through vacuum distillation, providing consistent viscosity and high calorific value for industrial boilers and furnaces.',
            'specs' => ['High Calorific Value', 'Filtered Distillate', 'Boilers & Furnaces']
        ],
        [
            'id' => 20,
            'name' => 'IBC (Intermediate Bulk Container)',
            'image' => '20_p4.png',
            'tag' => 'Bulk Container',
            'desc' => 'Standard 1,000-litre composite intermediate bulk containers with tubular galvanized steel cage and integrated pallet base for bulk chemical storage.',
            'specs' => ['1,000 Litres', 'Steel Outer Cage', 'Integrated Bottom Valve']
        ],
        [
            'id' => 21,
            'name' => 'MS Closed Barrels',
            'image' => '21_p5.png',
            'tag' => 'Tight-Head Steel',
            'desc' => 'UN-standard tight-head closed steel drums featuring dual 2" and 3/4" bung openings for secure storage and leak-proof liquid containment.',
            'specs' => ['210 Litres', 'Dual Bung Openings', 'Pressure Leak Tested']
        ],
        [
            'id' => 22,
            'name' => 'E-Waste Materials',
            'image' => '22_p6.png',
            'tag' => 'Electronic Waste',
            'desc' => 'Authorized segregation and systematic recovery services for electrical and electronic equipment assemblies in full compliance with E-Waste Management Rules.',
            'specs' => ['Authorized Handling', 'Material Segregation', 'Statutory Manifest']
        ],
        [
            'id' => 23,
            'name' => 'Fuel Oil (Recovered)',
            'image' => '23_p7.png',
            'tag' => 'Recovered Fuel',
            'desc' => 'Thermally stabilized, moisture-free recovered secondary fuel oil tailored for foundries, hot mix asphalt plants, and heavy thermal processing applications.',
            'specs' => ['Low Moisture Content', 'Consistent Flash Point', 'Bulk Supply Available']
        ],
        [
            'id' => 24,
            'name' => 'Lubricant Base Oil',
            'image' => '24_p8.png',
            'tag' => 'Base Stock',
            'desc' => 'High-purity re-refined lubricating base oil stock suitable for industrial blenders, hydraulic formulations, and general machine lubrication needs.',
            'specs' => ['Group I / II Equivalent', 'High Viscosity Index', 'Low Ash Content']
        ],
        [
            'id' => 25,
            'name' => 'Spent Solvent Streams',
            'image' => '25_p9.png',
            'tag' => 'Solvent Stream',
            'desc' => 'Specialized collection and recovery streams for spent industrial solvents, degreasers, and wash liquids supporting circular industrial economy goals.',
            'specs' => ['Segregated Storage', 'Thermal Stripping', 'Closed Loop Recovery']
        ],
        [
            'id' => 26,
            'name' => 'Used Mineral Oil',
            'image' => '26_p12.png',
            'tag' => 'Re-Refining Stock',
            'desc' => 'Drained engine crankcase oils and industrial gear oils collected systematically under TNPCB authorization for direct feedstock re-refining.',
            'specs' => ['TNPCB Authorized', 'Form-10 Documentation', 'On-Site Tanker Pickup']
        ]
    ];
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-THB742MT');</script>
  <!-- End Google Tag Manager -->

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-7S3468T7TG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7S3468T7TG');
  </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Re-Refined Base Oil, Furnace Oil &amp; Industrial Barrels in Tamil Nadu, India | Green Way</title>
    <meta name="description" content="Buy TNPCB-compliant re-refined base oils, high-calorific furnace oils, and UN-rated 210L steel &amp; plastic barrels in bulk across Tamil Nadu and India. Get best quotes.">
    <meta name="keywords" content="re-refined base oil Tamil Nadu, furnace oil suppliers Chennai, industrial fuel oil India, MS open top barrels, 210 litre plastic drums, IBC container 1000L, used oil buyers, recycled base oil suppliers India, industrial drums Tamil Nadu, bulk base oil supply">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/our-products">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="Re-Refined Base Oils, Secondary Fuels &amp; Industrial Containers | Green Way">
    <meta property="og:description" content="TNPCB-authorized supplier of quality re-refined base oils, furnace oils, and certified UN-rated barrels across Tamil Nadu and India.">
    <meta property="og:url" content="https://wasteoil.in/our-products">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Re-Refined Industrial Products &amp; Barrels | Green Way Industries">
    <meta name="twitter:description" content="High-quality re-refined petroleum products and industrial containers in Tamil Nadu &amp; pan-India.">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="22DnXNvAgVo2tubJaZ-rWUtMDNN0BWOCs8ozpOYaRvU">
    <meta name="google-site-verification" content="google71644dabd58cdac1">

    <!-- JSON-LD Structured Data: Product CollectionPage & BreadcrumbList -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "CollectionPage",
          "@id": "https://wasteoil.in/our-products#webpage",
          "url": "https://wasteoil.in/our-products",
          "name": "Re-Refined Base Oils, Secondary Fuels & Industrial Containers | Green Way",
          "description": "TNPCB-authorized supplier of quality re-refined base oils, furnace oils, and certified UN-rated barrels across Tamil Nadu and India.",
          "breadcrumb": {
            "@id": "https://wasteoil.in/our-products#breadcrumb"
          },
          "mainEntity": {
            "@type": "ItemList",
            "name": "Recovered Products",
            "itemListElement": [
              {
                "@type": "Product",
                "position": 1,
                "name": "Re-Refined Base Oil (SN 150 / SN 500)",
                "description": "Vacuum-distilled high-viscosity-index base oil suitable for industrial lubricant blending and hydraulic applications.",
                "brand": {
                  "@type": "Brand",
                  "name": "Green Way"
                }
              },
              {
                "@type": "Product",
                "position": 2,
                "name": "Industrial Furnace Fuel Oil",
                "description": "Dehydrated, sediment-free secondary fuel oil for industrial burners, boilers, hot-mix plants, and kilns.",
                "brand": {
                  "@type": "Brand",
                  "name": "Green Way"
                }
              },
              {
                "@type": "Product",
                "position": 3,
                "name": "Reconditioned Industrial Steel Drums & Barrels",
                "description": "Cleaned, leak-tested, and UN-rated 210-liter steel barrels and HDPE drums for hazardous and non-hazardous chemical storage.",
                "brand": {
                  "@type": "Brand",
                  "name": "Green Way"
                }
              }
            ]
          }
        },
        {
          "@type": "BreadcrumbList",
          "@id": "https://wasteoil.in/our-products#breadcrumb",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "https://wasteoil.in/"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "Our Products",
              "item": "https://wasteoil.in/our-products"
            }
          ]
        }
      ]
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
    <!-- modern service & product animations and UI -->
    <link rel="stylesheet" href="css/service-modern.css">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THB742MT"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div id="preloader"></div>
    
    <!--- header start-->
    <?php include('header.php'); ?>
    <!-- header end -->
    
    <!-- Start Slider Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3>Our Products</h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="./" style="color:#fff;">Home</a></li>
                            <li>Our Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Product Catalog Area -->
    <div class="gw-section-2026" style="padding: 70px 0; background: #f4f8f5;">
        <div class="container">
            <!-- Section Header -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <div class="gw-badge-pill" style="display:inline-flex;margin-bottom:14px;">
                        <i class="fa fa-cubes"></i> Certified Industrial Supplies &amp; Packaging
                    </div>
                    <h1 class="gw-section-title" style="font-size:32px;font-weight:800;color:var(--gw-deep);margin-bottom:16px;">
                        Re-Refined Petroleum Products &amp; Certified Industrial Containers
                    </h1>
                    <p class="gw-section-lead" style="font-size:16px;color:#4b6154;line-height:1.7;max-width:820px;margin:0 auto 20px;">
                        Green Way Industries supplies TNPCB-authorized re-refined base oils, high-calorific secondary fuels, and pressure-tested steel and plastic storage containers to manufacturing plants, chemical facilities, and industrial workshops across Tamil Nadu.
                    </p>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="gw-product-grid">
                <?php
                foreach ($product_list as $prod) {
                    $p_name = htmlspecialchars($prod['name']);
                    $p_img_raw = $prod['image'] ?? '';
                    $p_img = !empty($p_img_raw) && file_exists(__DIR__ . '/product/' . $p_img_raw) 
                        ? 'product/' . htmlspecialchars($p_img_raw) 
                        : (!empty($p_img_raw) ? 'product/' . htmlspecialchars($p_img_raw) : 'img/service/1.jpg');
                    
                    // Intelligent tag assignment
                    $p_tag = $prod['tag'] ?? 'Industrial Product';
                    if (empty($prod['tag'])) {
                        if (stripos($p_name, 'barrel') !== false || stripos($p_name, 'drum') !== false) {
                            $p_tag = 'Container';
                        } elseif (stripos($p_name, 'oil') !== false || stripos($p_name, 'fuel') !== false) {
                            $p_tag = 'Petroleum Product';
                        } elseif (stripos($p_name, 'ibc') !== false) {
                            $p_tag = 'Bulk Storage';
                        } elseif (stripos($p_name, 'waste') !== false) {
                            $p_tag = 'Recycled Material';
                        }
                    }

                    // Intelligent description assignment
                    $p_desc = $prod['desc'] ?? 'Authorized industrial product supplied and handled in full accordance with Tamil Nadu Pollution Control Board regulations.';

                    // Intelligent specs assignment
                    $p_specs = $prod['specs'] ?? ['TNPCB Authorized', 'Standard Industrial Spec', 'Direct Supply'];
                ?>
                <div class="gw-product-card">
                    <div class="gw-product-img-box">
                        <span class="gw-product-tag"><?php echo htmlspecialchars($p_tag); ?></span>
                        <img src="<?php echo $p_img; ?>" alt="<?php echo $p_name; ?>" loading="lazy">
                    </div>
                    <div class="gw-product-body">
                        <h4><?php echo $p_name; ?></h4>
                        <p><?php echo htmlspecialchars($p_desc); ?></p>
                        <div class="gw-product-specs">
                            <?php foreach ($p_specs as $spec) { ?>
                                <span class="gw-product-spec-pill">
                                    <i class="fa fa-check-circle" style="color:var(--gw-green)"></i> <?php echo htmlspecialchars($spec); ?>
                                </span>
                            <?php } ?>
                        </div>
                        <a href="contact-us?inquiry=<?php echo urlencode($p_name); ?>" class="gw-product-btn">
                            <span>Enquire Product</span> <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- Trust / Quality Highlights -->
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-shield" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">TNPCB Authorized</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">All products comply with state and central hazardous waste handling norms.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-flask" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Quality Tested</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">Controlled viscosity, flash point, and moisture parameters batch-by-batch.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-check-square-o" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Pressure Tested Drums</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">Reconditioned containers inspected for leak tightness and structural integrity.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                    <div style="background:#ffffff;border:1px solid #dce8dd;border-radius:10px;padding:22px;text-align:center;box-shadow:0 4px 14px rgba(16,58,42,0.04);height:100%;">
                        <i class="fa fa-truck" style="font-size:28px;color:var(--gw-green);margin-bottom:12px;"></i>
                        <h4 style="font-size:16px;font-weight:700;color:var(--gw-deep);margin-bottom:8px;">Prompt Delivery</h4>
                        <p style="font-size:13px;color:#556b5e;margin:0;">Dedicated fleet dispatching to industrial corridors across Tamil Nadu.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Callout Banner -->
            <div class="gw-cta-box" style="margin-top:35px;background:linear-gradient(135deg,#103a2a 0%,#196b45 100%);border-radius:12px;padding:40px;color:#ffffff;box-shadow:0 12px 32px rgba(16,58,42,0.2);">
                <div class="row" style="display:flex;align-items:center;flex-wrap:wrap;">
                    <div class="col-md-8 col-sm-12">
                        <h3 style="color:#ffffff;font-size:24px;font-weight:700;margin-top:0;margin-bottom:10px;">
                            Require Bulk Industrial Supplies or Custom Product Specifications?
                        </h3>
                        <p style="color:#d5e8dc;font-size:15px;margin:0;line-height:1.6;">
                            Our technical team coordinates custom batch orders, container staging, and scheduled deliveries to your manufacturing or processing facility.
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right" style="margin-top:15px;">
                        <a href="contact-us" class="gw-btn-lime" style="display:inline-block;padding:12px 26px;border-radius:6px;background:var(--gw-lime);color:var(--gw-deep);font-weight:700;text-decoration:none;margin-right:10px;">
                            Request Quote
                        </a>
                        <a href="tel:+919360036055" style="display:inline-block;padding:12px 20px;border-radius:6px;background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.3);font-weight:700;text-decoration:none;">
                            <i class="fa fa-phone"></i> Call Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Product Catalog Area -->

    <!-- Start Footer bottom Area -->
    <?php include('footer.php'); ?>

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