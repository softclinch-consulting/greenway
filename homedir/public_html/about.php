<?php 
$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Green Way Industries | Authorized Waste Oil &amp; Hazardous Waste Recycler in Tamil Nadu, India</title>
    <meta name="description" content="Discover Green Way Industries: TNPCB-authorized used oil recycling facility in Tindivanam, vacuum distillation plant, GPS tanker fleet &amp; Form-10 manifests across India.">
    <meta name="keywords" content="about Green Way Industries, TNPCB authorized recycler, waste oil recycling facility Tindivanam, hazardous waste management company Tamil Nadu, industrial oil recycling India, environmental compliance partner Chennai, used oil re-refining plant India, oil recycling license Tamil Nadu, CPCB approved recyclers India">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/about.php">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="About Green Way Industries | Authorized Waste Oil &amp; Hazardous Waste Recycler">
    <meta property="og:description" content="TNPCB-authorized used oil recycling facility in Tindivanam, vacuum distillation technology, and hazardous waste compliance across Tamil Nadu &amp; India.">
    <meta property="og:url" content="https://wasteoil.in/about.php">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="About Green Way Industries | Waste Oil Recycler Tamil Nadu">
    <meta name="twitter:description" content="TNPCB-authorized used oil recycling, vacuum distillation re-refining, and industrial waste management across Tamil Nadu &amp; India.">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">

    <!-- Core Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/magnific.min.css">
    <link rel="stylesheet" href="css/venobox.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- 2026 Modern Industrial Sustainability Styles -->
    <link rel="stylesheet" href="css/service-modern.css">

    <!-- Modernizr -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
      /* Page-specific styling for About Us 2026 */
      .gw-about-hero {
        background: linear-gradient(135deg, #0e231a 0%, #103a2a 50%, #196b45 100%);
        color: #ffffff;
        padding: 68px 0 54px;
        position: relative;
        overflow: hidden;
      }
      .gw-about-hero::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at 80% 20%, rgba(181, 232, 95, 0.15) 0%, transparent 60%);
        pointer-events: none;
      }
      .gw-about-hero h1 {
        font-size: 42px;
        font-weight: 800;
        color: #ffffff;
        margin: 0 0 12px;
        letter-spacing: -0.5px;
        line-height: 1.2;
      }
      .gw-about-hero p {
        font-size: 17px;
        color: #dbe8df;
        max-width: 680px;
        margin: 0 0 18px;
        line-height: 1.6;
      }
      .gw-breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 10px;
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 13.5px;
        font-weight: 600;
      }
      .gw-breadcrumb-list li a {
        color: var(--gw-lime);
        text-decoration: none;
      }
      .gw-breadcrumb-list li::after {
        content: '/';
        margin-left: 10px;
        color: rgba(255, 255, 255, 0.4);
      }
      .gw-breadcrumb-list li:last-child::after {
        content: '';
      }
      .gw-breadcrumb-list li:last-child {
        color: rgba(255, 255, 255, 0.85);
      }

      /* Services Cluster Cards */
      .gw-cluster-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 26px;
        margin-top: 32px;
      }
      .gw-cluster-card {
        background: #ffffff;
        border: 1px solid #d2e4d6;
        border-radius: 10px;
        padding: 32px 28px;
        box-shadow: 0 8px 24px rgba(16, 58, 42, 0.08);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        display: flex;
        flex-direction: column;
      }
      .gw-cluster-card:hover {
        transform: translateY(-6px);
        border-color: var(--gw-green);
        box-shadow: 0 16px 36px rgba(16, 58, 42, 0.14);
      }
      .gw-cluster-icon {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        background: #eaf4ed;
        color: var(--gw-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 20px;
      }
      .gw-cluster-card h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 16px;
        line-height: 1.3;
      }
      .gw-cluster-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px;
        flex-grow: 1;
      }
      .gw-cluster-list li {
        font-size: 14.5px;
        color: #3e5246;
        padding: 8px 0;
        border-bottom: 1px solid #edf4ee;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .gw-cluster-list li:last-child {
        border-bottom: none;
      }
      .gw-cluster-list li i {
        color: var(--gw-green);
        font-size: 13px;
        flex-shrink: 0;
      }

      /* Who We Serve Grid */
      .gw-serve-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 32px;
      }
      .gw-serve-card {
        background: #ffffff;
        border: 1px solid #dce8dd;
        border-radius: 8px;
        padding: 22px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 4px 14px rgba(16, 58, 42, 0.05);
        transition: all 0.3s ease;
      }
      .gw-serve-card:hover {
        transform: translateY(-4px);
        border-color: var(--gw-green);
        box-shadow: 0 12px 26px rgba(16, 58, 42, 0.12);
        background: #fcfffd;
      }
      .gw-serve-icon {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: #eaf4ec;
        color: var(--gw-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
      }
      .gw-serve-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0;
      }

      /* Process 5-Step Cards */
      .gw-approach-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 18px;
        margin-top: 36px;
      }
      .gw-approach-card {
        background: #ffffff;
        border: 1px solid #d2e4d6;
        border-radius: 10px;
        padding: 26px 20px;
        box-shadow: 0 6px 18px rgba(16, 58, 42, 0.06);
        display: flex;
        flex-direction: column;
        position: relative;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
      }
      .gw-approach-card:hover {
        transform: translateY(-6px);
        border-color: var(--gw-green);
        box-shadow: 0 14px 32px rgba(16, 58, 42, 0.13);
      }
      .gw-approach-num {
        font-size: 26px;
        font-weight: 800;
        color: var(--gw-green);
        margin-bottom: 12px;
        display: block;
        opacity: 0.9;
      }
      .gw-approach-card h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 10px;
        line-height: 1.35;
      }
      .gw-approach-card p {
        font-size: 13.5px;
        color: #495e52;
        line-height: 1.6;
        margin: 0;
      }

      /* Why Choose Grid */
      .gw-why-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 32px;
      }
      .gw-why-card {
        background: #ffffff;
        border: 1px solid #dce8dd;
        border-radius: 8px;
        padding: 26px 24px;
        box-shadow: 0 6px 18px rgba(16, 58, 42, 0.06);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
      }
      .gw-why-card:hover {
        transform: translateY(-5px);
        border-color: var(--gw-green);
        box-shadow: 0 14px 30px rgba(16, 58, 42, 0.12);
      }
      .gw-why-card h4 {
        font-size: 18px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 10px;
        line-height: 1.3;
      }
      .gw-why-card p {
        font-size: 14px;
        color: #495e52;
        line-height: 1.65;
        margin: 0;
      }

      /* Commitment Banner */
      .gw-commitment-banner {
        background: linear-gradient(135deg, #103a2a 0%, #196b45 100%);
        border-radius: 12px;
        padding: 44px 48px;
        color: #ffffff;
        box-shadow: 0 16px 40px rgba(16, 58, 42, 0.18);
        margin-top: 40px;
        position: relative;
        overflow: hidden;
      }
      .gw-commitment-banner::after {
        content: '';
        position: absolute;
        top: 0; right: 0; bottom: 0; width: 350px;
        background: radial-gradient(circle at 100% 50%, rgba(181, 232, 95, 0.18) 0%, transparent 70%);
        pointer-events: none;
      }
      .gw-commitment-banner h3 {
        font-size: 26px;
        font-weight: 800;
        color: #ffffff;
        margin: 0 0 16px;
        line-height: 1.3;
      }
      .gw-commitment-banner p {
        font-size: 15.5px;
        line-height: 1.72;
        color: #e2ede5;
        margin: 0 0 14px;
      }
      .gw-commitment-banner p:last-child {
        margin-bottom: 0;
      }

      @media (max-width: 991px) {
        .gw-cluster-grid,
        .gw-serve-grid,
        .gw-why-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        .gw-approach-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        .gw-about-hero h1 {
          font-size: 32px;
        }
      }

      @media (max-width: 767px) {
        .gw-cluster-grid,
        .gw-serve-grid,
        .gw-why-grid,
        .gw-approach-grid {
          grid-template-columns: 1fr;
        }
        .gw-commitment-banner {
          padding: 30px 24px;
        }
        .gw-commitment-banner h3 {
          font-size: 22px;
        }
      }
    </style>
</head>

<body>

    <div id="preloader"></div>
    
    <!-- Header -->
    <?php @include('header.php'); ?>

    <!-- Start Slider Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3>About Us</h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="index.php" style="color:#fff">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 1: ABOUT US / EXECUTIVE OVERVIEW -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="row align-items-center">
                <!-- Visual Showcase Frame Left -->
                <div class="col-md-5 col-sm-12 gw-reveal" style="margin-bottom:28px;">
                    <div class="gw-visual-frame" style="border-radius:12px;overflow:hidden;box-shadow:0 14px 36px rgba(16,58,42,0.12);">
                        <img src="about/1_vd.jpg" alt="Green Way Industries Processing Facility" style="width:100%;height:440px;object-fit:cover;">
                        <div class="gw-visual-badge">
                            <span><i class="fa fa-shield"></i> Authorized Operations</span>
                            <span>Tamil Nadu PCB Certified</span>
                        </div>
                    </div>
                </div>

                <!-- Text Content Right -->
                <div class="col-md-7 col-sm-12 gw-reveal gw-delay-1">
                    <span class="gw-eyebrow-2026">About Us</span>
                    <h1 class="gw-h2-2026" style="margin-bottom:18px;font-size:36px;font-weight:800;color:var(--gw-deep);">Green Way Industries</h1>
                    <p style="font-size:16px;line-height:1.75;color:#384d41;margin-bottom:16px;">
                        Green Way Industries provides waste oil, used oil and industrial waste management solutions for businesses that need a responsible way to handle their waste materials. Our services include waste oil collection, recycling, disposal and related industrial waste management solutions.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:16px;">
                        We work with businesses across relevant industries to help manage waste oil and other industrial waste through structured collection, transportation, recycling, treatment and disposal processes, depending on the type of material and service requirement.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:24px;">
                        With a focus on responsible waste management, operational efficiency and long-term sustainability, Green Way Industries aims to help businesses manage their waste more effectively while supporting resource recovery and environmental responsibility.
                    </p>

                    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:12px 20px;">
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> TNPCB Statutory Compliance
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> Form-10 Manifest Records
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> High-Recovery Re-Refining
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> Dedicated Tanker Fleet
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: MISSION, VISION & BUILDING A GREENER FUTURE -->
    <section class="gw-section-2026 gw-soft">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Strategic Direction</span>
                <h2 class="gw-h2-2026">Our Mission, Vision &amp; Greener Future</h2>
                <p class="gw-lead-2026">
                    Anchoring our industrial operations around continuous innovation, regulatory integrity, and circular economy principles.
                </p>
            </div>

            <div class="gw-journey-wrapper">
                <div class="gw-journey-grid">
                    <!-- Step 1: Mission -->
                    <div class="gw-journey-card gw-tilt-card gw-reveal">
                        <div class="gw-journey-node">
                            <i class="fa fa-compass"></i>
                        </div>
                        <span class="gw-journey-step-tag">Core Purpose</span>
                        <h3>Our Mission</h3>
                        <p>
                            To provide responsible and practical waste management solutions that help businesses manage waste oil and industrial waste safely, efficiently and sustainably.
                        </p>
                        <p style="margin-top:10px;font-size:14px;color:#495e52;">
                            We aim to support responsible resource use while continuously improving our processes, technology and service capabilities.
                        </p>
                    </div>

                    <!-- Step 2: Vision -->
                    <div class="gw-journey-card gw-tilt-card gw-reveal gw-delay-1">
                        <div class="gw-journey-node">
                            <i class="fa fa-eye"></i>
                        </div>
                        <span class="gw-journey-step-tag">Long-Term Standard</span>
                        <h3>Our Vision</h3>
                        <p>
                            Our vision is to make responsible recycling, resource recovery and sustainable waste management a standard part of industrial operations.
                        </p>
                        <p style="margin-top:10px;font-size:14px;color:#495e52;">
                            We aim to build long-term value by combining responsible waste practices, improved technology, operational efficiency and sustainable business solutions.
                        </p>
                    </div>

                    <!-- Step 3: Building a Greener Future -->
                    <div class="gw-journey-card gw-tilt-card gw-reveal gw-delay-2">
                        <div class="gw-journey-node">
                            <i class="fa fa-recycle"></i>
                        </div>
                        <span class="gw-journey-step-tag">Continuous Impact</span>
                        <h3>Building a Greener Future</h3>
                        <p>
                            Green Way Industries is focused on expanding its capabilities in used oil management, recycling and industrial waste solutions.
                        </p>
                        <p style="margin-top:10px;font-size:14px;color:#495e52;">
                            Our growth is driven by continuous improvement in processing capabilities, technology, operational systems and our team. We aim to develop scalable solutions that contribute to a resource-efficient future.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: OUR SERVICES (3 STRUCTURED CLUSTERS) -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Comprehensive Portfolio</span>
                <h2 class="gw-h2-2026">Our Services</h2>
                <p class="gw-lead-2026">
                    Green Way Industries provides a range of waste management services designed around different waste types and business requirements.
                </p>
            </div>

            <div class="gw-cluster-grid">
                <!-- Cluster 1: Waste Oil Management -->
                <div class="gw-cluster-card gw-tilt-card gw-reveal">
                    <div class="gw-cluster-icon"><i class="fa fa-tint"></i></div>
                    <h3>Waste Oil Management</h3>
                    <ul class="gw-cluster-list">
                        <li><i class="fa fa-chevron-right"></i> Waste Oil Collection</li>
                        <li><i class="fa fa-chevron-right"></i> Waste Oil Recycling</li>
                        <li><i class="fa fa-chevron-right"></i> Waste Oil Disposal</li>
                        <li><i class="fa fa-chevron-right"></i> Used Oil Disposal</li>
                        <li><i class="fa fa-chevron-right"></i> Used Oil Recycling</li>
                    </ul>
                    <a href="services.php?s_id=21" class="gw-service-card-link">Explore Waste Oil Services <i class="fa fa-arrow-right"></i></a>
                </div>

                <!-- Cluster 2: Industrial & Hazardous Waste Services -->
                <div class="gw-cluster-card gw-tilt-card gw-reveal gw-delay-1">
                    <div class="gw-cluster-icon"><i class="fa fa-shield"></i></div>
                    <h3>Industrial &amp; Hazardous Waste</h3>
                    <ul class="gw-cluster-list">
                        <li><i class="fa fa-chevron-right"></i> Hazardous Waste Recycling</li>
                        <li><i class="fa fa-chevron-right"></i> Hazardous Waste Transport</li>
                        <li><i class="fa fa-chevron-right"></i> Industrial Waste Management</li>
                        <li><i class="fa fa-chevron-right"></i> Spent Oil Management</li>
                    </ul>
                    <a href="services.php?s_id=28" class="gw-service-card-link">Explore Hazardous Solutions <i class="fa fa-arrow-right"></i></a>
                </div>

                <!-- Cluster 3: Specialized Oil Management -->
                <div class="gw-cluster-card gw-tilt-card gw-reveal gw-delay-2">
                    <div class="gw-cluster-icon"><i class="fa fa-cogs"></i></div>
                    <h3>Specialized Oil Management</h3>
                    <ul class="gw-cluster-list">
                        <li><i class="fa fa-chevron-right"></i> Used Transformer Oil Recycling</li>
                        <li><i class="fa fa-chevron-right"></i> Used Hydraulic Oil Management</li>
                        <li><i class="fa fa-chevron-right"></i> Ship and Marine Waste Disposal</li>
                    </ul>
                    <a href="services.php?s_id=25" class="gw-service-card-link">Explore Specialized Solutions <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

            <div style="background:#f4f8f5;border:1px solid #d2e4d6;border-radius:8px;padding:22px 28px;margin-top:32px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:18px;" class="gw-reveal">
                <p style="margin:0;font-size:15px;color:#354c3e;font-weight:600;">
                    <i class="fa fa-info-circle" style="color:var(--gw-green);margin-right:8px;font-size:17px;"></i>
                    Each service is designed around the specific material, quantity, location and management requirement.
                </p>
                <a href="services.php?s_id=21" class="gw-btn-green-2026" style="padding:10px 22px;font-size:14px;">
                    Explore All Services <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 4: WHO WE SERVE (INDUSTRIES) -->
    <section class="gw-section-2026 gw-soft">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Diverse Sector Coverage</span>
                <h2 class="gw-h2-2026">Who We Serve</h2>
                <p class="gw-lead-2026">
                    Our waste management solutions can support businesses across industries where used oil, waste oil or industrial waste is generated.
                </p>
            </div>

            <div class="gw-serve-grid">
                <div class="gw-serve-card gw-reveal">
                    <div class="gw-serve-icon"><i class="fa fa-industry"></i></div>
                    <h3 class="gw-serve-title">Manufacturing</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-1">
                    <div class="gw-serve-icon"><i class="fa fa-car"></i></div>
                    <h3 class="gw-serve-title">Automotive</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-2">
                    <div class="gw-serve-icon"><i class="fa fa-cogs"></i></div>
                    <h3 class="gw-serve-title">Engineering</h3>
                </div>
                <div class="gw-serve-card gw-reveal">
                    <div class="gw-serve-icon"><i class="fa fa-building"></i></div>
                    <h3 class="gw-serve-title">Industrial Facilities</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-1">
                    <div class="gw-serve-icon"><i class="fa fa-wrench"></i></div>
                    <h3 class="gw-serve-title">Workshops</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-2">
                    <div class="gw-serve-icon"><i class="fa fa-truck"></i></div>
                    <h3 class="gw-serve-title">Logistics</h3>
                </div>
                <div class="gw-serve-card gw-reveal">
                    <div class="gw-serve-icon"><i class="fa fa-bolt"></i></div>
                    <h3 class="gw-serve-title">Power &amp; Electrical</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-1">
                    <div class="gw-serve-icon"><i class="fa fa-ship"></i></div>
                    <h3 class="gw-serve-title">Marine &amp; Shipping</h3>
                </div>
                <div class="gw-serve-card gw-reveal gw-delay-2">
                    <div class="gw-serve-icon"><i class="fa fa-briefcase"></i></div>
                    <h3 class="gw-serve-title">Commercial Businesses</h3>
                </div>
            </div>

            <div class="text-center gw-reveal" style="margin-top:24px;">
                <span class="gw-chip-2026">
                    <i class="fa fa-sliders"></i> Service requirements vary depending on waste type, volume, containment, and site location.
                </span>
            </div>
        </div>
    </section>

    <!-- SECTION 5: HOW WE APPROACH WASTE MANAGEMENT (5 STEPS) -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Structured Methodology</span>
                <h2 class="gw-h2-2026">How We Approach Waste Management</h2>
                <p class="gw-lead-2026">
                    Responsible waste management starts with understanding the material and the customer's requirement. Our approach focuses on five clear stages:
                </p>
            </div>

            <div class="gw-approach-grid">
                <div class="gw-approach-card gw-tilt-card gw-reveal">
                    <span class="gw-approach-num">01</span>
                    <h4>Understanding the Requirement</h4>
                    <p>We identify the waste type, approximate quantity, location and service requirement.</p>
                </div>
                <div class="gw-approach-card gw-tilt-card gw-reveal gw-delay-1">
                    <span class="gw-approach-num">02</span>
                    <h4>Collection &amp; Transportation</h4>
                    <p>Where applicable, collection and transportation are coordinated according to the material and service requirement.</p>
                </div>
                <div class="gw-approach-card gw-tilt-card gw-reveal gw-delay-2">
                    <span class="gw-approach-num">03</span>
                    <h4>Appropriate Waste Management</h4>
                    <p>The collected material is directed towards the appropriate recycling, treatment, recovery or disposal process.</p>
                </div>
                <div class="gw-approach-card gw-tilt-card gw-reveal gw-delay-1">
                    <span class="gw-approach-num">04</span>
                    <h4>Responsible Resource Management</h4>
                    <p>Where recycling or recovery is applicable, our objective is to support the responsible reuse or recovery of valuable resources.</p>
                </div>
                <div class="gw-approach-card gw-tilt-card gw-reveal gw-delay-2">
                    <span class="gw-approach-num">05</span>
                    <h4>Continuous Improvement</h4>
                    <p>We continue to improve our processes, technology and operational capabilities to provide more effective waste management solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: WHY CHOOSE US (6 CORE PILLARS) -->
    <section class="gw-section-2026 gw-soft">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Operational Advantages</span>
                <h2 class="gw-h2-2026">Why Choose Green Way Industries?</h2>
                <p class="gw-lead-2026">
                    Businesses need more than a waste-management provider. They need a service partner that understands their operational requirements.
                </p>
            </div>

            <div class="gw-why-grid">
                <div class="gw-why-card gw-tilt-card gw-reveal">
                    <h4><i class="fa fa-crosshairs" style="color:var(--gw-green);margin-right:8px;"></i> Industry-Focused Solutions</h4>
                    <p>Our services are designed around the different waste types and requirements encountered by businesses and industrial operations.</p>
                </div>
                <div class="gw-why-card gw-tilt-card gw-reveal gw-delay-1">
                    <h4><i class="fa fa-cubes" style="color:var(--gw-green);margin-right:8px;"></i> End-to-End Waste Management</h4>
                    <p>From collection and transportation to recycling, recovery or disposal, we provide solutions across different stages of waste management where applicable.</p>
                </div>
                <div class="gw-why-card gw-tilt-card gw-reveal gw-delay-2">
                    <h4><i class="fa fa-shield" style="color:var(--gw-green);margin-right:8px;"></i> Responsible Waste Handling</h4>
                    <p>We focus on structured and responsible management of used oil, waste oil and industrial waste.</p>
                </div>
                <div class="gw-why-card gw-tilt-card gw-reveal">
                    <h4><i class="fa fa-users" style="color:var(--gw-green);margin-right:8px;"></i> Practical Business Support</h4>
                    <p>We work with customers to understand their requirements and identify the appropriate service for their waste.</p>
                </div>
                <div class="gw-why-card gw-tilt-card gw-reveal gw-delay-1">
                    <h4><i class="fa fa-leaf" style="color:var(--gw-green);margin-right:8px;"></i> Sustainability-Focused Approach</h4>
                    <p>Our approach supports responsible resource management, recycling and recovery wherever applicable.</p>
                </div>
                <div class="gw-why-card gw-tilt-card gw-reveal gw-delay-2">
                    <h4><i class="fa fa-line-chart" style="color:var(--gw-green);margin-right:8px;"></i> Continuous Improvement</h4>
                    <p>We continue to develop our technology, processes and operational capabilities as the business grows.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: OUR GROWTH & MILESTONES -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Proven Performance</span>
                <h2 class="gw-h2-2026">Our Growth</h2>
                <p class="gw-lead-2026">
                    Green Way Industries continues to expand its capabilities in waste oil management, recycling and industrial waste solutions.
                </p>
            </div>

            <div class="gw-stats-bar-2026 gw-reveal">
                <div class="gw-stats-grid-2026">
                    <div class="gw-stat-item-2026">
                        <span class="gw-stat-num-2026" data-target="15">15</span><span class="gw-stat-plus">+</span>
                        <span class="gw-stat-label-2026">Years Experience</span>
                    </div>
                    <div class="gw-stat-item-2026">
                        <span class="gw-stat-num-2026" data-target="3">3</span>
                        <span class="gw-stat-label-2026">Operating Outlets</span>
                    </div>
                    <div class="gw-stat-item-2026">
                        <span class="gw-stat-num-2026" data-target="300">300</span><span class="gw-stat-plus">+</span>
                        <span class="gw-stat-label-2026">Happy Clients</span>
                    </div>
                    <div class="gw-stat-item-2026">
                        <span class="gw-stat-num-2026" data-target="400">400</span><span class="gw-stat-plus">+</span>
                        <span class="gw-stat-label-2026">Total Projects</span>
                    </div>
                </div>
            </div>

            <!-- SECTION 8: OUR COMMITMENT BANNER -->
            <div class="gw-commitment-banner gw-reveal">
                <h3>Our Commitment</h3>
                <p>
                    We believe responsible waste management should create value for both businesses and the environment.
                </p>
                <p>
                    Our commitment is to provide practical waste management solutions while continuously improving how waste oil and industrial waste are collected, managed, recycled, recovered or disposed of.
                </p>
                <p>
                    By combining industry experience, operational capabilities and a sustainability-focused approach, Green Way Industries aims to be a reliable waste management partner for businesses.
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION 9: FREQUENTLY ASKED QUESTIONS (ACCORDION) -->
    <section class="gw-section-2026 gw-soft" id="faq">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Direct Clarifications</span>
                <h2 class="gw-h2-2026">Frequently Asked Questions</h2>
                <p class="gw-lead-2026">
                    Common questions regarding Green Way Industries, our operations, collection logistics, and recycling processes.
                </p>
            </div>

            <div class="row align-items-stretch" style="margin-top:24px;">
                <!-- Left: Visual Showcase Frame with Floating Badge & Direct Call -->
                <div class="col-md-5 col-sm-12 gw-reveal" style="margin-bottom:28px;">
                    <div class="gw-faq-visual-card">
                        <img class="gw-faq-bg-img" src="about/1_vd1.jpg" alt="Green Way Industries Industrial Plant">
                        <!-- Anti-gravity floating badge -->
                        <div class="gw-faq-float-badge gw-float-anim">
                            <span class="gw-pulse-dot"></span>
                            <span><i class="fa fa-shield"></i> Authorized Operations</span>
                        </div>
                        <!-- Glassmorphism Quick-Help Card -->
                        <div class="gw-faq-float-card">
                            <h4>Have a Specific Question?</h4>
                            <p>
                                Connect with our technical operations team for collection scheduling, waste categorization, or statutory compliance assistance.
                            </p>
                            <a href="tel:+919360036055" class="gw-faq-call-btn">
                                <i class="fa fa-phone"></i> Call +91 93600 36055
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Collapsible Interactive FAQ Accordion -->
                <div class="col-md-7 col-sm-12 gw-reveal gw-delay-1">
                    <div class="gw-faq-wrapper" style="margin-top:0;">
                        <!-- FAQ 1 -->
                        <div class="gw-faq-item is-active">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q01</span>
                                    <h3 class="gw-faq-title">What does Green Way Industries do?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body" style="display:block;">
                                <p>Green Way Industries provides waste oil, used oil and industrial waste management services, including collection, recycling, disposal and related waste management solutions.</p>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q02</span>
                                    <h3 class="gw-faq-title">What waste oil services does Green Way Industries provide?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Our services include waste oil collection, waste oil recycling, waste oil disposal and used oil management. We also provide specialized services for certain industrial oil and waste streams.</p>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q03</span>
                                    <h3 class="gw-faq-title">Does Green Way Industries collect waste oil from businesses?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Yes, waste oil collection is one of the services provided by Green Way Industries. Collection requirements may depend on the waste type, quantity and location.</p>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q04</span>
                                    <h3 class="gw-faq-title">Which industries can use Green Way Industries services?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Our services can support businesses in industries such as manufacturing, automotive, engineering, workshops, logistics, power and electrical operations, marine and other industrial sectors.</p>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q05</span>
                                    <h3 class="gw-faq-title">Where is Green Way Industries located?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Green Way Industries has its corporate office in Chennai, Tamil Nadu, and an industrial facility in the Tindivanam/Villupuram district of Tamil Nadu.</p>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q06</span>
                                    <h3 class="gw-faq-title">Does Green Way Industries provide waste oil recycling?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Yes. Green Way Industries provides waste oil recycling services for suitable waste streams. The appropriate recycling or recovery process depends on the type and condition of the material.</p>
                            </div>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q07</span>
                                    <h3 class="gw-faq-title">How can I contact Green Way Industries?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Businesses can contact Green Way Industries to discuss their waste type, approximate quantity, location and required service directly at <strong>+91 93600 36055</strong> or via our online inquiry form.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 10: NEED HELP / CTA BANNER -->
    <section class="gw-section-2026 gw-deep" id="contact-cta" style="padding:70px 0;background:linear-gradient(135deg, #0e231a 0%, #103a2a 50%, #196b45 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-sm-12 gw-reveal">
                    <span class="gw-eyebrow-2026 gw-eyebrow-lime" style="margin-bottom:12px;display:inline-block;">Support &amp; Consultation</span>
                    <h2 class="gw-h2-2026" style="font-size:34px;font-weight:800;color:#ffffff;line-height:1.25;margin:0 0 14px;">
                        Need Help With Waste Oil or Industrial Waste?
                    </h2>
                    <p class="gw-lead-2026 gw-lead-left" style="font-size:16px;line-height:1.7;color:#dbe7df;margin:0;max-width:680px;">
                        Tell us what type of waste you generate, the approximate quantity and your location. Our team can help you identify the appropriate waste management service for your requirement.
                    </p>
                </div>
                <div class="col-md-4 col-sm-12 text-right gw-reveal gw-delay-1" style="margin-top:20px;">
                    <a href="contact-us.php" class="gw-btn-lift gw-btn-green-2026" style="margin-right:10px;display:inline-block;padding:14px 26px;">
                        Enquire Now <i class="fa fa-paper-plane"></i>
                    </a>
                    <a href="tel:+919360036055" class="gw-btn-lift gw-btn-outline-2026" style="display:inline-block;padding:13px 22px;">
                        <i class="fa fa-phone"></i> Call Direct
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php @include('footer.php'); ?>

    <!-- JavaScript Dependencies -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/main.js"></script>
    <!-- 2026 Interactive Motion & Anti-Gravity Engine -->
    <script src="js/service-modern.js"></script>

</body>

</html>