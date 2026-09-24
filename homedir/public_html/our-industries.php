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
    <title>Industrial Waste Oil &amp; Hazardous Waste Solutions by Sector | Tamil Nadu &amp; India</title>
    <meta name="description" content="Specialized waste oil collection, spent oil recovery &amp; hazardous waste disposal for automotive, manufacturing, power, chemical &amp; marine sectors across Tamil Nadu &amp; India.">
    <meta name="keywords" content="automotive waste oil collection Tamil Nadu, manufacturing waste oil disposal Chennai, power plant used transformer oil, engineering workshop scrap oil recycling, marine bilge oil disposal Chennai port, industrial waste solutions India, SEZ factory oil disposal Hosur Coimbatore, chemical plant hazardous waste management">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/our-industries.php">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="Waste Oil &amp; Industrial Waste Solutions by Industry | Green Way">
    <meta property="og:description" content="Sector-specific waste oil collection, recycling, and hazardous waste disposal across automotive, power, and manufacturing hubs in Tamil Nadu &amp; India.">
    <meta property="og:url" content="https://wasteoil.in/our-industries.php">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Industry Waste Solutions | Green Way Industries Tamil Nadu">
    <meta name="twitter:description" content="TNPCB authorized recycling and hazardous waste handling engineered for industrial plants across Tamil Nadu and India.">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">

    <!-- all css here -->
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
                                        <li><a class="pagess" href="#">Our Services</a>
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
                                        <li class="active"><a href="our-industries.php">Our Industries</a></li>
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
                            <h3>Our Industries</h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="index.php" style="color:#fff">Home</a></li>
                            <li>Our Industries</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
.ind {
  --green: #196b45;
  --deep: #103a2a;
  --lime: #b5e85f;
  --soft: #f4f8f5;
  --border: #dce7dc;
  color: #34433c;
  font-size: 15.5px;
  line-height: 1.72;
}
.ind h1, .ind h2, .ind h3, .ind h4 {
  color: var(--deep);
  font-weight: 700;
  line-height: 1.3;
}
.ind h1 { font-size: 38px; margin: 0 0 16px; color: #fff; line-height: 1.22; letter-spacing: -0.3px; }
.ind h2 { font-size: 26px; margin: 0 0 14px; line-height: 1.32; letter-spacing: -0.2px; }
.ind h3 { font-size: 19px; margin: 0 0 8px; line-height: 1.38; letter-spacing: -0.1px; }
.ind h4 {
  font-size: 13.5px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: var(--deep);
  margin: 18px 0 10px;
  padding-bottom: 4px;
  border-bottom: 2px solid #e2ece3;
  display: inline-block;
  line-height: 1.35;
}
.ind p { margin: 0 0 14px; line-height: 1.72; color: #3e5246; }
.ind-label {
  color: var(--lime);
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  margin-bottom: 10px;
  display: inline-block;
}
.ind-label--dark { color: var(--green); }
.ind-sector-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 28px;
  margin-top: 24px;
}
.ind-sector-card {
  background: #ffffff;
  border: 1.5px solid var(--border);
  border-top: 4px solid var(--green);
  border-radius: 8px;
  padding: 28px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  box-shadow: 0 4px 14px rgba(16,58,42,0.04);
}
.ind-sector-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(16,58,42,0.1);
  border-color: #b8d4be;
}
.ind-card-header {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  margin-bottom: 14px;
  text-align: left;
}
.ind-icon-box {
  width: 50px;
  height: 50px;
  min-width: 50px;
  background: #eaf3ec;
  color: var(--green);
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 21px;
  border: 1px solid #d5e5d8;
}
.ind-card-header h3 {
  margin: 0 0 4px;
  font-size: 19px;
  line-height: 1.34;
  color: var(--deep);
  text-align: left;
}
.ind-question {
  font-size: 14px;
  font-weight: 600;
  color: var(--green);
  line-height: 1.4;
  margin-bottom: 0;
  text-align: left;
}
.ind-sector-card p {
  font-size: 14.5px;
  line-height: 1.68;
  color: #3e5246;
  margin: 10px 0 14px;
  text-align: left;
}
.ind-check-list {
  list-style: none;
  padding: 0;
  margin: 8px 0 16px;
}
.ind-check-list li {
  position: relative;
  padding: 5px 0 5px 22px;
  font-size: 14.5px;
  line-height: 1.6;
  color: #3b4e43;
  border-bottom: 1px dashed #e8efe8;
}
.ind-check-list li:last-child {
  border-bottom: none;
}
.ind-check-list li:before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--green);
  font-weight: 700;
}
.ind-tag-cloud {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin: 6px 0 16px;
}
.ind-tag {
  background: #f0f6f1;
  color: #2e4438;
  border: 1px solid #d8e6db;
  padding: 3px 10px;
  border-radius: 4px;
  font-size: 13px;
  font-weight: 500;
  line-height: 1.4;
}
.ind-impact-box {
  background: #f2f7f3;
  border-left: 3px solid var(--green);
  padding: 12px 16px;
  border-radius: 0 6px 6px 0;
  margin-top: auto;
  text-align: left;
}
.ind-impact-box p {
  margin: 0;
  font-size: 13.5px;
  color: #384e41;
  line-height: 1.58;
  text-align: left;
}
.ind-eval-box {
  background: #ffffff;
  border: 1.5px solid var(--border);
  border-top: 4px solid var(--green);
  border-radius: 8px;
  padding: 28px;
  box-shadow: 0 4px 14px rgba(16,58,42,0.04);
  height: 100%;
  text-align: left;
}
.ind-eval-box h3 {
  font-size: 19px;
  font-weight: 700;
  color: var(--deep);
  margin: 0 0 12px;
  line-height: 1.35;
  text-align: left;
}
.ind-links-bar {
  padding: 16px 20px;
  background: #eaf2e7;
  border: 1px solid #d5e5d3;
  border-radius: 6px;
  margin-top: 20px;
}
.ind-links-bar a {
  display: inline-block;
  margin: 4px 8px 4px 0;
  padding: 6px 14px;
  background: #fff;
  border: 1px solid var(--border);
  color: var(--green);
  font-weight: 600;
  font-size: 14px;
  border-radius: 3px;
  text-decoration: none;
  transition: all .25s ease;
}
.ind-links-bar a:hover {
  background: var(--green);
  color: #fff;
  text-decoration: none;
  transform: translateY(-2px);
}
.ind-cta-card {
  background: var(--deep);
  color: #eaf4ec;
  border-radius: 8px;
  padding: 34px 28px;
  box-shadow: 0 10px 25px rgba(16,58,42,0.15);
}
.ind-cta-card h2 { color: #fff; margin-top: 0; }
.ind-cta-card a { color: var(--lime); font-weight: 700; }
@media (max-width: 991px) {
  .ind-sector-grid { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
  .ind h1 { font-size: 26px; }
  .ind h2 { font-size: 22px; }
  .ind-card-header { flex-direction: column; gap: 10px; }
}
</style>

<main class="ind">
  <!-- HERO BANNER -->
  <section class="gw-hero" style="background-image: url('service_one/30_12.jpg');">
    <div class="gw-hero-overlay"></div>
    <div class="container">
      <div class="gw-hero-badge">
        <span class="gw-live-dot"></span> TNPCB Authorized Industrial Waste Partner
      </div>
      <h1>Waste Oil &amp; Hazardous Waste Management for Different Industries</h1>
      <p class="gw-hero-lead">Different industries generate different types of used oil, spent oil, hydraulic oil, transformer oil, and other industrial waste. Green Way Industries provides collection, recycling, recovery, transportation, and responsible disposal solutions based on the waste generated by each business.</p>
      
      <!-- Floating Trust Chips -->
      <div class="gw-hero-chips">
        <span class="gw-chip"><i class="fa fa-industry"></i> Industry-Specific Protocols</span>
        <span class="gw-chip"><i class="fa fa-file-text-o"></i> 100% Form-10 Manifests</span>
        <span class="gw-chip"><i class="fa fa-truck"></i> Dedicated Tanker Fleet</span>
        <span class="gw-chip"><i class="fa fa-recycle"></i> High-Recovery Re-refining</span>
      </div>

      <div>
        <a class="gw-btn-primary" href="contact-us.php">
          Enquire for Your Industry <i class="fa fa-arrow-right"></i>
        </a>
        <a class="gw-btn-secondary" href="tel:+919360036055">
          <i class="fa fa-phone"></i> Call +91 93600 36055
        </a>
      </div>
    </div>
  </section>

  <!-- MODULAR BLOCK LAYOUT WITH DEFINED OUTLINES -->
  <div class="gw-page-body">
    <div class="container">

      <!-- BLOCK 1: QUICK ANSWER OVERVIEW -->
      <div class="gw-block">
        <div class="row gw-flex-row">
          <div class="col-md-5 col-sm-12">
            <div class="gw-visual-frame">
              <img class="img-responsive center-block" src="service_one/30_12.jpg" alt="Industrial Waste Management by Industry">
              <div class="gw-visual-badge">
                <span><i class="fa fa-shield"></i> SIDCO Tindivanam Plant</span>
                <span style="color:var(--gw-lime)"><i class="fa fa-check"></i> Licensed Operations</span>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-sm-12">
            <div class="ind-label ind-label--dark">Industry-Specific Waste Stewardship</div>
            <h2>Practical, Compliant Waste Stewardship for Every Industry</h2>
            <p class="gw-lead-text">We work with businesses and industrial facilities that need a practical way to manage used oil and waste streams while maintaining safe handling practices and applicable environmental requirements.</p>
            <p>Our industry-focused services cover automotive workshops, manufacturing units, power and electrical facilities, railway and infrastructure operations, marine businesses, ports, and other commercial and industrial facilities across Chennai and Tamil Nadu.</p>
            <p>Whether you generate routine barrel accumulations or require large-volume vacuum tanker evacuation, Green Way Industries customizes containment, documentation, transport, and recycling routes to your specific operating environment.</p>
          </div>
        </div>
      </div>

      <!-- BLOCK 2: 6 CORE INDUSTRY SECTORS -->
      <div class="gw-block">
        <div class="gw-block-header text-center">
          <div class="ind-label ind-label--dark">Sector Solutions</div>
          <h2>Specialized Waste Management by Industry Sector</h2>
          <p class="center-block" style="max-width:780px">Every industrial sector has unique machinery, operating cycles, and contamination profiles. Explore how our customized collection and resource-recovery workflows address the exact waste streams of your facility.</p>
        </div>

        <div class="ind-sector-grid">

          <!-- 1. Automotive & Vehicle Service Industry -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-car"></i></div>
                <div>
                  <h3>Automotive &amp; Vehicle Service Industry</h3>
                  <p class="ind-question">Need to dispose of used engine oil from your workshop?</p>
                </div>
              </div>
              <p>Automobile workshops, service stations, fleet operators, dealerships, and vehicle maintenance facilities generate used engine oil, gear oil, hydraulic oil, filters, and other oil-contaminated materials. Green Way Industries helps automotive businesses manage their used oil through organized collection and appropriate recycling or disposal routes.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Used engine oil collection</li>
                <li>Gear oil management</li>
                <li>Hydraulic oil collection</li>
                <li>Workshop waste oil management</li>
                <li>Oil-contaminated waste handling</li>
                <li>Fleet maintenance waste management</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Automobile workshops</span>
                <span class="ind-tag">Car &amp; two-wheeler service centres</span>
                <span class="ind-tag">Fleet maintenance companies</span>
                <span class="ind-tag">Automobile dealerships</span>
                <span class="ind-tag">Heavy vehicle service facilities</span>
                <span class="ind-tag">Commercial vehicle operators</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> Proper used-oil management helps workshops reduce the risk of spills, improper disposal, and unnecessary environmental impact.</p>
            </div>
          </div>

          <!-- 2. Manufacturing & Engineering Industries -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-cogs"></i></div>
                <div>
                  <h3>Manufacturing &amp; Engineering Industries</h3>
                  <p class="ind-question">How can factories manage used industrial oil?</p>
                </div>
              </div>
              <p>Manufacturing and engineering facilities can generate several oil-based waste streams during production and equipment maintenance. Machine oils, hydraulic oils, compressor oils, cutting fluids, and other industrial oils need to be collected and handled appropriately. Green Way Industries provides waste oil management solutions for factories and engineering businesses based on their operational requirements.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Industrial used oil collection</li>
                <li>Machine oil management</li>
                <li>Hydraulic oil recovery</li>
                <li>Compressor oil management</li>
                <li>Cutting-fluid waste management</li>
                <li>Process oil waste handling</li>
                <li>Oil-contaminated waste management</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Manufacturing plants</span>
                <span class="ind-tag">Engineering companies</span>
                <span class="ind-tag">Fabrication units</span>
                <span class="ind-tag">Machinery manufacturers</span>
                <span class="ind-tag">Precision engineering facilities</span>
                <span class="ind-tag">Industrial workshops</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> Our approach helps businesses move from temporary waste storage and disposal concerns toward a more organized waste management process.</p>
            </div>
          </div>

          <!-- 3. Power & Electrical Industries -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-bolt"></i></div>
                <div>
                  <h3>Power &amp; Electrical Industries</h3>
                  <p class="ind-question">Careful handling for spent transformer and insulating oils</p>
                </div>
              </div>
              <p>Used transformer oil and electrical equipment waste require careful handling. Power plants, electrical facilities, substations, utilities, and equipment maintenance companies may generate used transformer oil and other oil-based waste during equipment servicing and maintenance. Green Way Industries provides solutions for the collection and appropriate management of used transformer oil and related oil waste.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Used transformer oil collection</li>
                <li>Transformer oil recycling support</li>
                <li>Insulating oil management</li>
                <li>Generator oil collection</li>
                <li>Electrical equipment oil waste management</li>
                <li>Oil-contaminated material handling</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Electrical facilities</span>
                <span class="ind-tag">Power generation facilities</span>
                <span class="ind-tag">Substations</span>
                <span class="ind-tag">Industrial electrical maintenance</span>
                <span class="ind-tag">Utility operations</span>
                <span class="ind-tag">Renewable energy facilities</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> Where specialized testing, treatment, or regulatory requirements apply, waste is handled according to the applicable requirements and the nature of the material.</p>
            </div>
          </div>

          <!-- 4. Railway, Infrastructure & Large Maintenance Operations -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-train"></i></div>
                <div>
                  <h3>Railway, Infrastructure &amp; Large Maintenance</h3>
                  <p class="ind-question">Structured evacuation for high-volume maintenance hubs</p>
                </div>
              </div>
              <p>Large maintenance operations can generate significant quantities of used oil. Railway workshops, locomotive maintenance facilities, infrastructure projects, heavy-equipment operations, and large maintenance facilities may generate engine oil, hydraulic oil, gear oil, and other oil-contaminated waste. Green Way Industries can support these organizations with structured used-oil collection and waste management solutions.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Engine oil collection</li>
                <li>Hydraulic oil management</li>
                <li>Gear oil management</li>
                <li>Heavy-equipment oil waste collection</li>
                <li>Maintenance waste management</li>
                <li>Oil-contaminated waste handling</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Railway maintenance facilities</span>
                <span class="ind-tag">Heavy equipment operations</span>
                <span class="ind-tag">Infrastructure companies</span>
                <span class="ind-tag">Large maintenance workshops</span>
                <span class="ind-tag">Industrial equipment operators</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> For organizations with recurring waste generation, collection schedules can be planned according to operational requirements and waste volumes.</p>
            </div>
          </div>

          <!-- 5. Marine, Port & Shipyard Operations -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-ship"></i></div>
                <div>
                  <h3>Marine, Port &amp; Shipyard Operations</h3>
                  <p class="ind-question">How should ships and marine businesses manage used oil?</p>
                </div>
              </div>
              <p>Ships, shipyards, ports, marine workshops, and vessel-support operations can generate used engine oil, lubricating oil, hydraulic oil, bilge-related oily waste, and other maintenance waste. Green Way Industries can support marine and port-related businesses with appropriate collection and waste management arrangements, subject to the waste type, location, and applicable requirements.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Ship-generated used oil collection</li>
                <li>Marine engine oil management</li>
                <li>Hydraulic oil collection</li>
                <li>Port equipment oil waste management</li>
                <li>Shipyard maintenance waste management</li>
                <li>Oily waste handling</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Shipping companies</span>
                <span class="ind-tag">Shipyards</span>
                <span class="ind-tag">Marine workshops</span>
                <span class="ind-tag">Port-related businesses</span>
                <span class="ind-tag">Vessel maintenance operations</span>
                <span class="ind-tag">Marine equipment operators</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> Marine waste management may involve additional port, vessel, and regulatory requirements. Collection and disposal arrangements should therefore be coordinated according to the specific operation.</p>
            </div>
          </div>

          <!-- 6. Commercial & Industrial Facilities -->
          <div class="ind-sector-card">
            <div>
              <div class="ind-card-header">
                <div class="ind-icon-box"><i class="fa fa-building"></i></div>
                <div>
                  <h3>Commercial &amp; Industrial Facilities</h3>
                  <p class="ind-question">Practical disposal for decentralized &amp; commercial waste</p>
                </div>
              </div>
              <p>Used oil is not limited to large factories. Commercial businesses and smaller industrial facilities can also generate waste oil through equipment maintenance, generators, machinery, workshops, and other operations. Green Way Industries helps businesses identify an appropriate route for collecting and managing their used oil and related waste.</p>
              
              <h4>Our Solutions Include:</h4>
              <ul class="ind-check-list">
                <li>Generator waste oil collection</li>
                <li>Facility machinery lubricant disposal</li>
                <li>Scheduled barrel pickup services</li>
                <li>Secondary spill containment guidance</li>
                <li>Statutory Form-10 audit compliance</li>
                <li>Routine waste segregation support</li>
              </ul>

              <h4>Suitable For:</h4>
              <div class="ind-tag-cloud">
                <span class="ind-tag">Commercial workshops</span>
                <span class="ind-tag">Warehouses &amp; logistics hubs</span>
                <span class="ind-tag">Equipment maintenance facilities</span>
                <span class="ind-tag">Generator maintenance operations</span>
                <span class="ind-tag">Industrial service providers</span>
                <span class="ind-tag">Recurring oil generators</span>
              </div>
            </div>
            
            <div class="ind-impact-box">
              <p><strong>Why it matters:</strong> Structured waste management eliminates liability risks for commercial operators, ensuring even small oil quantities are responsibly recycled.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- BLOCK 3: INDUSTRIAL INFRASTRUCTURE PHOTO SHOWCASE GRID -->
      <div class="gw-block">
        <div class="text-center" style="margin-bottom:24px">
          <div class="ind-label ind-label--dark">Operational Infrastructure</div>
          <h2 style="font-size:24px;margin:0 0 16px">Our Infrastructure &amp; Logistics Capabilities</h2>
          <p class="center-block" style="max-width:700px">Advanced processing facilities and dedicated transport fleets engineered to handle hazardous industrial residues with zero environmental compromise.</p>
        </div>
        <div class="gw-photo-grid">
          <div class="gw-photo-item">
            <img src="gallery/71_1.jpg" alt="High-Vacuum Refining Towers">
            <div class="gw-photo-label">High-Vacuum Refining Towers</div>
          </div>
          <div class="gw-photo-item">
            <img src="service_one/28_10.jpg" alt="Dedicated Vacuum Tanker Fleet">
            <div class="gw-photo-label">Authorized Vacuum Suction Fleet</div>
          </div>
          <div class="gw-photo-item">
            <img src="gallery/75_5.jpg" alt="In-House QA Testing Lab">
            <div class="gw-photo-label">In-House QA Testing Lab</div>
          </div>
        </div>
      </div>

      <!-- BLOCK 4: WHY CHOOSE AN INDUSTRY-SPECIFIC APPROACH -->
      <div class="gw-block">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="ind-label ind-label--dark">Strategic Assessment</div>
            <h2>Why Choose an Industry-Specific Waste Management Approach?</h2>
            <p>The type and quantity of waste generated by an automobile workshop can be very different from a manufacturing plant, electrical facility, or shipyard.</p>
            <p>That is why waste management should begin with understanding the operational parameters of your facility. A one-size-fits-all model leads to regulatory non-compliance, unsafe storage conditions, or inefficient logistics.</p>
            <p>Green Way Industries works directly with environmental managers, maintenance engineers, and plant operators to create a practical approach based on your specific waste generation patterns and operational constraints.</p>
            <div style="margin-top:20px">
              <a class="gw-btn-primary" href="contact-us.php">Request an Industry Waste Audit <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="ind-eval-box">
              <div class="uto-box-icon" style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;background:#e9f2e9;color:var(--green);font-size:20px;border-radius:50%;margin-bottom:12px;">
                <i class="fa fa-list-ul"></i>
              </div>
              <h3>Key Factors We Evaluate for Your Industry:</h3>
              <ul class="ind-check-list">
                <li><strong>What type of waste is generated:</strong> Chemical characteristics, viscosity, flash point, and contamination level</li>
                <li><strong>Where the waste is generated:</strong> Site geography, plant layout, access corridors, and loading zones</li>
                <li><strong>Approximate quantity &amp; frequency:</strong> Batch accumulation rates, monthly output, and surge volumes</li>
                <li><strong>How the waste is stored:</strong> Underground tanks, barrel yards, IBC totes, or machine sumps</li>
                <li><strong>Collection requirements:</strong> Direct vacuum suction, crane loading, or drum forklift transfer</li>
                <li><strong>Transportation requirements:</strong> Dedicated CPCB-authorized containment vehicles and GPS-tracked routes</li>
                <li><strong>Recycling or disposal options:</strong> Vacuum distillation re-refining, fuel blending, or certified safe treatment</li>
                <li><strong>Applicable environmental requirements:</strong> TNPCB authorizations, CPCB guidelines, and Form-10 manifests</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- BLOCK 5: 5-STAGE WORKFLOW PIPELINE -->
      <div class="gw-block">
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <div class="ind-label ind-label--dark">Step-by-Step Procedure</div>
            <h2>From Used Oil Collection to Responsible Management</h2>
            <p>Our end-to-end services support businesses across every critical stage of the industrial waste management hierarchy.</p>
            <div style="margin:20px 0 24px;">
              <a class="gw-btn-primary" href="contact-us.php">Coordinate a Collection Schedule <i class="fa fa-arrow-right"></i></a>
            </div>
            
            <div class="gw-proc-frame">
              <img src="gallery/74_4.jpg" alt="Industrial Waste Oil Containment">
              <div class="gw-visual-badge">
                <span><i class="fa fa-check-circle"></i> On-Site Drum Containment</span>
              </div>
            </div>
          </div>

          <div class="col-md-7 col-sm-12">
            <div class="gw-step-pipeline">
              
              <div class="gw-step-item">
                <div class="gw-step-marker">01</div>
                <div class="gw-step-content">
                  <h3>Waste Identification &amp; Profiling</h3>
                  <p>Initial assessment of the waste oil type, moisture percentage, chemical contaminants, and volume to categorize the compliant recycling route.</p>
                </div>
              </div>

              <div class="gw-step-item">
                <div class="gw-step-marker">02</div>
                <div class="gw-step-content">
                  <h3>Scheduled On-Site Collection</h3>
                  <p>Punctual arrival of authorized vacuum suction tankers or specialized drum transport vehicles equipped for hazardous material handling.</p>
                </div>
              </div>

              <div class="gw-step-item">
                <div class="gw-step-marker">03</div>
                <div class="gw-step-content">
                  <h3>Safe Handling &amp; Spill Prevention</h3>
                  <p>Certified loading by trained personnel using secondary containment trays, vapor control, and standardized emergency response kits.</p>
                </div>
              </div>

              <div class="gw-step-item">
                <div class="gw-step-marker">04</div>
                <div class="gw-step-content">
                  <h3>Authorized Transportation &amp; Form-10 Manifests</h3>
                  <p>Secure transit to our SIDCO Tindivanam plant with legally binding Form-10 transfer manifests and transparent weighbridge receipts.</p>
                </div>
              </div>

              <div class="gw-step-item">
                <div class="gw-step-marker">05</div>
                <div class="gw-step-content">
                  <h3>Recycling, Recovery or Appropriate Disposal</h3>
                  <p>High-vacuum distillation re-refining into premium base oils or compliant thermal destruction, delivering maximum resource recovery.</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="text-center" style="margin-top:20px;padding:16px 20px;background:#eaf2e7;border-left:4px solid var(--green)">
          <p style="margin:0;font-weight:600;color:var(--deep)">The exact process depends on the type and condition of the waste and the applicable regulatory requirements.</p>
        </div>
      </div>

      <!-- BLOCK 6: QUICK DIRECTORY — INDUSTRIES WE SERVE -->
      <div class="gw-block">
        <div class="gw-block-header text-center">
          <div class="ind-label ind-label--dark">Industry Directory</div>
          <h2>Industries We Serve Across Tamil Nadu</h2>
          <p class="center-block" style="max-width:700px">Green Way Industries provides waste oil and industrial hazardous waste management solutions for diverse commercial and manufacturing sectors:</p>
        </div>

        <div class="gw-card-grid-4">
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-car"></i></div>
            <h3>Automotive &amp; Service</h3>
            <p>Workshops, service stations, car dealerships, and commercial fleet depots.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-cogs"></i></div>
            <h3>Manufacturing &amp; Engineering</h3>
            <p>Machinery builders, fabrication units, foundries, and precision workshops.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-bolt"></i></div>
            <h3>Power &amp; Electrical</h3>
            <p>Thermal power stations, substations, transformer maintenance, and utilities.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-train"></i></div>
            <h3>Railway &amp; Infrastructure</h3>
            <p>Locomotive sheds, metro rail yards, heavy earthmoving, and civil contractors.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-truck"></i></div>
            <h3>Heavy Equipment Operations</h3>
            <p>Mining fleets, crane operators, logistics hubs, and material handling depots.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-ship"></i></div>
            <h3>Marine &amp; Shipyard</h3>
            <p>Shipyards, vessel repair slips, dry docks, and marine workshop contractors.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-anchor"></i></div>
            <h3>Ports &amp; Terminals</h3>
            <p>Chennai, Kamarajar (Ennore), and Kattupalli port reception facilities.</p>
          </div>
          <div class="gw-sub-card">
            <div class="gw-card-icon"><i class="fa fa-building"></i></div>
            <h3>Commercial Facilities</h3>
            <p>IT parks, commercial malls, industrial maintenance firms, and warehouses.</p>
          </div>
        </div>
      </div>

      <!-- BLOCK 7: LOOKING FOR A PARTNER / CTA & DIRECT CONTACT -->
      <div class="gw-block">
        <div class="row">
          <div class="col-md-7 col-sm-12">
            <div class="ind-label ind-label--dark">Partnership &amp; Consultation</div>
            <h2>Looking for a Waste Management Partner for Your Industry?</h2>
            <p class="gw-lead-text">Whether you operate a vehicle workshop, manufacturing plant, electrical facility, maintenance operation, or marine business, the right waste management solution depends on the type of waste you generate.</p>
            <p>Talk to Green Way Industries about your used oil or industrial waste requirements. Our technical specialists provide compliant site assessments, scheduled pickups, and legally binding Form-10 documentation.</p>
            
            <div style="margin-top:20px">
              <a class="gw-btn-primary" href="contact-us.php">Discuss Your Industry Requirements <i class="fa fa-arrow-right"></i></a>
            </div>

            <!-- Internal links bar to all 12 services -->
            <div class="ind-links-bar">
              <strong style="color:var(--deep)">Explore Our Specialized Industrial Services:</strong><br>
              <a href="services.php?s_id=16">Waste Oil Disposal</a>
              <a href="services.php?s_id=17">Waste Oil Recycling</a>
              <a href="services.php?s_id=21">Waste Oil Collection</a>
              <a href="services.php?s_id=22">Used Oil Disposal</a>
              <a href="services.php?s_id=23">Used Oil Recycler</a>
              <a href="services.php?s_id=24">Hazardous Waste Recycler</a>
              <a href="services.php?s_id=25">Transformer Oil Recycling</a>
              <a href="services.php?s_id=26">Used Hydraulic Oil</a>
              <a href="services.php?s_id=27">Spent Oil Management</a>
              <a href="services.php?s_id=28">Hazardous Waste Transport</a>
              <a href="services.php?s_id=29">Ship Waste Disposal</a>
              <a href="services.php?s_id=30">Industrial Waste Management</a>
            </div>
          </div>

          <div class="col-md-5 col-sm-12">
            <div class="ind-cta-card">
              <h2>Green Way Industries</h2>
              <p style="margin-bottom:10px"><strong>Phone:</strong> <a href="tel:+919360036055">+91 93600 36055</a></p>
              <p style="margin-bottom:16px"><strong>Email:</strong> <a href="mailto:admin@usedoil.in">admin@usedoil.in</a></p>
              
              <p style="margin-bottom:12px"><strong>Corporate Operations:</strong><br>
              78/30 Suscon Builder, 53rd Street, Ashok Nagar, Anjenear Kovil Opp, Chennai – 600083</p>
              
              <p style="margin-bottom:0"><strong>Statewide Processing Plant:</strong><br>
              Plot No. 101, 102, 103 &amp; 104, SIDCO Industrial Estate, Venmaniathur &amp; Pattanam Village, Tindivanam Taluk, Villupuram District, Tamil Nadu – 604207</p>
              
              <div style="margin-top:20px;border-top:1px solid rgba(255,255,255,0.15);padding-top:16px;">
                <span style="font-size:13px;color:#a8c4b2;"><i class="fa fa-shield"></i> TNPCB &amp; CPCB Authorized Facility</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- BLOCK 8: INTERACTIVE FAQ ACCORDION -->
      <div class="gw-block">
        <div class="gw-block-header text-center">
          <div class="ind-label ind-label--dark">Frequently Asked Questions</div>
          <h2>Industry Waste Management FAQs</h2>
          <p class="center-block" style="max-width:740px">Explore answers to common industry inquiries regarding used oil collection, recycling eligibility, factory waste storage, and documentation.</p>
        </div>

        <div class="row gw-faq-wrapper">
          <div class="col-md-6 gw-faq-col">

            <!-- FAQ 01 -->
            <div class="gw-faq-item is-active">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q01</span>
                  <span class="gw-faq-title">Which industries generate used oil?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body" style="display:block;">
                <p>Automotive workshops, manufacturing plants, engineering facilities, power and electrical operations, railway maintenance facilities, marine businesses, shipyards, and equipment maintenance operations can all generate used oil.</p>
              </div>
            </div>

            <!-- FAQ 02 -->
            <div class="gw-faq-item">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q02</span>
                  <span class="gw-faq-title">Can automobile workshops give their used engine oil for recycling?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body">
                <p>Yes, used engine oil can be collected and directed toward appropriate recycling or recovery processes, depending on its condition and applicable requirements.</p>
              </div>
            </div>

            <!-- FAQ 03 -->
            <div class="gw-faq-item">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q03</span>
                  <span class="gw-faq-title">How do factories manage waste hydraulic oil?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body">
                <p>Factories should store used hydraulic oil appropriately and arrange collection through a suitable waste management or recycling provider. The handling route depends on the waste characteristics and applicable requirements.</p>
              </div>
            </div>

            <!-- FAQ 04 -->
            <div class="gw-faq-item">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q04</span>
                  <span class="gw-faq-title">Who collects used transformer oil?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body">
                <p>Used transformer oil should be managed through an appropriate waste oil management or recycling route, particularly when the oil is removed during transformer maintenance or replacement.</p>
              </div>
            </div>

          </div>

          <div class="col-md-6 gw-faq-col">

            <!-- FAQ 05 -->
            <div class="gw-faq-item is-active">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q05</span>
                  <span class="gw-faq-title">Can marine businesses arrange used oil collection?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body" style="display:block;">
                <p>Marine businesses, shipyards, and vessel-support operations can arrange used-oil collection, subject to the waste type, location, port requirements, and applicable regulations.</p>
              </div>
            </div>

            <!-- FAQ 06 -->
            <div class="gw-faq-item">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q06</span>
                  <span class="gw-faq-title">Does Green Way Industries serve businesses outside Chennai?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body">
                <p>Green Way Industries operates across Tamil Nadu and provides waste management solutions based on service requirements, location, waste type, and collection feasibility across Sriperumbudur, Oragadam, Ranipet, Hosur, Coimbatore, and beyond.</p>
              </div>
            </div>

            <!-- FAQ 07 -->
            <div class="gw-faq-item">
              <button class="gw-faq-header" type="button">
                <div class="gw-faq-title-wrap">
                  <span class="gw-faq-badge">Q07</span>
                  <span class="gw-faq-title">What information is required to arrange waste oil collection?</span>
                </div>
                <span class="gw-faq-icon"><i class="fa fa-chevron-down"></i></span>
              </button>
              <div class="gw-faq-body">
                <p>Businesses can generally provide the type of waste oil, approximate quantity, pickup location, frequency of generation, and any relevant information about how the waste is currently stored. This helps determine the appropriate collection and management approach.</p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- BLOCK 9: FINAL DEEP CTA BANNER -->
      <div class="gw-block gw-block--deep text-center">
        <h2>Partner with an Authorized Industrial Recycler</h2>
        <p style="max-width:650px;margin:0 auto 22px;text-align:center!important;">Send us your industry sector, estimated waste oil volume, and site location to receive prompt technical consultation and establish a compliant collection schedule.</p>
        <a class="gw-btn-primary" href="contact-us.php">Request Industry Assessment <i class="fa fa-arrow-right"></i></a>
        <a class="gw-btn-secondary" href="tel:+919360036055" style="border-color:var(--gw-lime);color:#fff!important">
          <i class="fa fa-phone"></i> Call Our Technical Desk
        </a>
      </div>

    </div>
  </div>
</main>

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