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
    <title>TNPCB Authorization &amp; Hazardous Waste Compliance | Green Way Industries Tamil Nadu, India</title>
    <meta name="description" content="Active TNPCB authorization for used oil recycling, hazardous waste management, Form-10 manifests &amp; CPCB environmental compliance for industries across Tamil Nadu &amp; India.">
    <meta name="keywords" content="TNPCB authorization used oil, hazardous waste authorization Tamil Nadu, Form 10 manifest waste oil, CPCB compliant waste oil recycler, environmental compliance certificate India, authorized used oil recycling company, hazardous waste management rules India, waste oil statutory manifest, safe disposal certificate Tamil Nadu">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/certifications.php">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="TNPCB Authorization &amp; Environmental Compliance | Green Way Industries">
    <meta property="og:description" content="Active TNPCB authorization for used oil recycling, hazardous waste manifests, and environmental compliance for industrial facilities across Tamil Nadu &amp; India.">
    <meta property="og:url" content="https://wasteoil.in/certifications.php">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="TNPCB Authorization &amp; Compliance | Green Way Industries">
    <meta name="twitter:description" content="TNPCB authorized used oil recycler &amp; hazardous waste management partner in Tamil Nadu, India. 100% statutory Form-10 manifest coverage.">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="google71644dabd58cdac1">

    <!-- JSON-LD Structured Data: Certifications & Compliance Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "ItemPage",
          "@id": "https://wasteoil.in/certifications.php#webpage",
          "url": "https://wasteoil.in/certifications.php",
          "name": "TNPCB Authorization & Hazardous Waste Compliance | Green Way Industries",
          "description": "Active TNPCB authorization for used oil recycling, hazardous waste management, Form-10 manifests & CPCB environmental compliance for industries across Tamil Nadu & India.",
          "breadcrumb": {
            "@id": "https://wasteoil.in/certifications.php#breadcrumb"
          }
        },
        {
          "@type": "BreadcrumbList",
          "@id": "https://wasteoil.in/certifications.php#breadcrumb",
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
              "name": "Our Certifications",
              "item": "https://wasteoil.in/certifications.php"
            }
          ]
        },
        {
          "@type": "GovernmentPermit",
          "name": "TNPCB Authorization for Used Oil Recycling & Hazardous Waste Management",
          "issuedBy": {
            "@type": "GovernmentOrganization",
            "name": "Tamil Nadu Pollution Control Board (TNPCB)"
          },
          "permitAudience": {
            "@type": "Audience",
            "geographicArea": {
              "@type": "AdministrativeArea",
              "name": "Tamil Nadu"
            }
          },
          "validIn": {
            "@type": "AdministrativeArea",
            "name": "Tamil Nadu"
          }
        }
      ]
    }
    </script>

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
      /* Page-specific styling for Certifications & Compliance 2026 */
      .gw-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
      }
      .gw-status-badge.active {
        background: #e6f6ec;
        color: #15693c;
        border: 1px solid #a3e2b2;
      }
      .gw-status-badge.progress {
        background: #fef7e6;
        color: #b45309;
        border: 1px solid #fcd34d;
      }

      /* Compliance 3-Pillar Cards */
      .gw-compliance-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        margin-top: 36px;
      }
      .gw-compliance-card {
        background: #ffffff;
        border: 1px solid #d2e4d6;
        border-radius: 12px;
        padding: 34px 28px;
        box-shadow: 0 8px 24px rgba(16, 58, 42, 0.07);
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        display: flex;
        flex-direction: column;
        position: relative;
      }
      .gw-compliance-card:hover {
        transform: translateY(-6px);
        border-color: var(--gw-green);
        box-shadow: 0 16px 36px rgba(16, 58, 42, 0.14);
      }
      .gw-compliance-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
      }
      .gw-compliance-icon {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        background: #eaf4ed;
        color: var(--gw-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
      }
      .gw-compliance-card h3 {
        font-size: 21px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 10px;
        line-height: 1.3;
      }
      .gw-compliance-subtitle {
        font-size: 14.5px;
        font-weight: 600;
        color: var(--gw-green);
        margin-bottom: 14px;
        display: block;
      }
      .gw-compliance-card p {
        font-size: 14.5px;
        color: #3e5246;
        line-height: 1.68;
        margin: 0 0 16px;
      }
      .gw-compliance-card p:last-child {
        margin-bottom: 0;
      }

      /* Environmental Checklist */
      .gw-checklist {
        list-style: none;
        padding: 0;
        margin: 14px 0 18px;
      }
      .gw-checklist li {
        font-size: 14px;
        color: #334a3c;
        padding: 6px 0;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        line-height: 1.55;
        border-bottom: 1px dashed #e8efe9;
      }
      .gw-checklist li:last-child {
        border-bottom: none;
      }
      .gw-checklist li i {
        color: var(--gw-green);
        font-size: 14px;
        margin-top: 3px;
        flex-shrink: 0;
      }

      /* 5-Step Process Flow */
      .gw-step-flow-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
        margin-top: 36px;
      }
      .gw-step-flow-card {
        background: #ffffff;
        border: 1px solid #d2e4d6;
        border-radius: 10px;
        padding: 24px 18px;
        text-align: center;
        box-shadow: 0 4px 16px rgba(16, 58, 42, 0.05);
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .gw-step-flow-card:hover {
        transform: translateY(-4px);
        border-color: var(--gw-green);
        box-shadow: 0 12px 28px rgba(16, 58, 42, 0.12);
      }
      .gw-step-flow-num {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #eaf4ed;
        color: var(--gw-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 16px;
        margin: 0 auto 14px;
      }
      .gw-step-flow-card h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 8px;
        line-height: 1.3;
      }
      .gw-step-flow-card p {
        font-size: 13px;
        color: #4d6356;
        line-height: 1.55;
        margin: 0;
      }

      /* Industry Support Chips Grid */
      .gw-ind-support-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-top: 32px;
      }
      .gw-ind-support-chip {
        background: #ffffff;
        border: 1px solid #dce8dd;
        border-radius: 8px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 3px 12px rgba(16, 58, 42, 0.04);
        transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
      }
      .gw-ind-support-chip:hover {
        transform: translateY(-3px);
        border-color: var(--gw-green);
        box-shadow: 0 10px 22px rgba(16, 58, 42, 0.1);
        background: #fcfffd;
      }
      .gw-ind-support-chip i {
        font-size: 18px;
        color: var(--gw-green);
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: #eaf4ed;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
      }
      .gw-ind-support-chip span {
        font-size: 15px;
        font-weight: 600;
        color: var(--gw-deep);
      }

      /* Contact Detail Cards */
      .gw-contact-card-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 28px;
      }
      .gw-contact-info-box {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(181, 232, 95, 0.25);
        border-radius: 10px;
        padding: 22px 20px;
        color: #ffffff;
        transition: transform 0.3s ease;
      }
      .gw-contact-info-box:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.09);
        border-color: var(--gw-lime);
      }
      .gw-contact-info-box i {
        color: var(--gw-lime);
        font-size: 20px;
        margin-bottom: 10px;
        display: block;
      }
      .gw-contact-info-box h5 {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gw-lime);
        margin: 0 0 6px;
        font-weight: 700;
      }
      .gw-contact-info-box p,
      .gw-contact-info-box a {
        font-size: 14.5px;
        color: #ffffff;
        text-decoration: none;
        margin: 0;
        line-height: 1.6;
        display: block;
      }

      @media (max-width: 991px) {
        .gw-compliance-grid {
          grid-template-columns: 1fr;
        }
        .gw-step-flow-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        .gw-ind-support-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        .gw-contact-card-grid {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 767px) {
        .gw-step-flow-grid {
          grid-template-columns: 1fr;
        }
        .gw-ind-support-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
</head>

<body>

    <div id="preloader"></div>
    
    <!-- Header -->
    <?php @include('header.php'); ?>

    <!-- Start Slider Area (Page-Area Banner with Centered Text) -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3>Certifications &amp; Compliance</h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="index.php" style="color:#fff">Home</a></li>
                            <li>Certifications &amp; Compliance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 1: EXECUTIVE OVERVIEW -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-sm-12 gw-reveal" style="margin-bottom:28px;">
                    <div class="gw-visual-frame" style="border-radius:12px;overflow:hidden;box-shadow:0 14px 36px rgba(16,58,42,0.12);">
                        <img src="about/1_vd.jpg" alt="Green Way Industries Compliant Facility" style="width:100%;height:450px;object-fit:cover;">
                        <div class="gw-visual-badge">
                            <span><i class="fa fa-shield"></i> TNPCB Authorized</span>
                            <span>Statutory Traceability</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-12 gw-reveal gw-delay-1">
                    <span class="gw-eyebrow-2026">Regulatory Compliance</span>
                    <h1 class="gw-h2-2026" style="margin-bottom:18px;font-size:36px;font-weight:800;color:var(--gw-deep);">
                        Responsible Used Oil Recycling Backed by Compliance
                    </h1>
                    <p style="font-size:16px;line-height:1.75;color:#384d41;margin-bottom:16px;">
                        At Green Way Industries, responsible waste management starts with following applicable environmental, safety, and regulatory requirements. We provide used oil recycling, waste oil collection, hazardous waste management, and related services with a strong focus on safe handling, traceability, environmental protection, and regulatory compliance.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:16px;">
                        Our compliance approach is designed to help businesses manage used oil and industrial waste responsibly while reducing the risks associated with improper storage, transportation, treatment, and disposal.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:24px;">
                        Whether you are looking for a used oil recycler, waste oil recycling company, hazardous waste management partner, or compliant waste oil collection service, our team works to provide a reliable end-to-end solution.
                    </p>

                    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:12px 20px;">
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> TNPCB Statutory Oversight
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> Form-10 Manifest Records
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> Closed-Loop Re-refining
                        </div>
                        <div style="display:flex;align-items:center;gap:9px;font-size:14.5px;font-weight:600;color:#103a2a;">
                            <i class="fa fa-check-circle" style="color:#196b45;font-size:16px;"></i> End-to-End Audit Readiness
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: 3-PILLAR REGULATORY & COMPLIANCE STATUS -->
    <section class="gw-section-2026 gw-soft">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Statutory Standing &amp; Standards</span>
                <h2 class="gw-h2-2026">Authorizations, Environmental Compliance &amp; Standards</h2>
                <p class="gw-lead-2026">
                    Transparent operational practices structured around regulatory oversight, environmental safeguards, and continuous quality improvement.
                </p>
            </div>

            <div class="gw-compliance-grid">
                <!-- Column 1: TNPCB Authorization -->
                <div class="gw-compliance-card gw-reveal">
                    <div class="gw-compliance-card-header">
                        <div class="gw-compliance-icon"><i class="fa fa-id-card-o"></i></div>
                        <span class="gw-status-badge active"><i class="fa fa-check-circle"></i> Status: Active</span>
                    </div>
                    <h3>TNPCB Authorization</h3>
                    <span class="gw-compliance-subtitle">Authorized Used Oil Recycling Operations in Tamil Nadu</span>
                    <p>
                        Green Way Industries operates with authorization from the Tamil Nadu Pollution Control Board (TNPCB) for applicable used oil recycling activities.
                    </p>
                    <p>
                        TNPCB authorization is important for businesses looking for a responsible partner to manage used oil because recycling and handling waste oil requires appropriate regulatory oversight and environmental controls.
                    </p>
                    <p>
                        Our focus is to ensure that used oil received from industries, workshops, commercial facilities, and other sources is managed through appropriate collection, handling, processing, and recycling practices.
                    </p>
                </div>

                <!-- Column 2: Environmental Compliance -->
                <div class="gw-compliance-card gw-reveal gw-delay-1">
                    <div class="gw-compliance-card-header">
                        <div class="gw-compliance-icon"><i class="fa fa-leaf"></i></div>
                        <span class="gw-status-badge active"><i class="fa fa-shield"></i> Status: Compliant</span>
                    </div>
                    <h3>Environmental Compliance</h3>
                    <span class="gw-compliance-subtitle">Responsible Management of Used Oil &amp; Hazardous Waste</span>
                    <p>
                        Used oil and certain industrial wastes can create significant environmental risks when they are stored, transported, or disposed of improperly. Green Way Industries follows applicable environmental requirements for the handling and management of waste materials within the scope of our operations.
                    </p>
                    <p style="font-weight:600;color:var(--gw-deep);margin-bottom:6px;">Our approach focuses on:</p>
                    <ul class="gw-checklist">
                        <li><i class="fa fa-check"></i> Safe collection and handling of used oil</li>
                        <li><i class="fa fa-check"></i> Responsible transportation and movement of waste</li>
                        <li><i class="fa fa-check"></i> Appropriate treatment and recycling processes</li>
                        <li><i class="fa fa-check"></i> Prevention of oil leakage and environmental contamination</li>
                        <li><i class="fa fa-check"></i> Responsible management of hazardous waste</li>
                        <li><i class="fa fa-check"></i> Maintaining proper operational and compliance practices</li>
                        <li><i class="fa fa-check"></i> Supporting businesses in their waste-management responsibilities</li>
                    </ul>
                    <p>
                        We aim to help industries move away from informal or environmentally unsafe disposal practices and toward responsible recycling and waste management.
                    </p>
                </div>

                <!-- Column 3: Quality & Environmental Management -->
                <div class="gw-compliance-card gw-reveal gw-delay-2">
                    <div class="gw-compliance-card-header">
                        <div class="gw-compliance-icon"><i class="fa fa-line-chart"></i></div>
                        <span class="gw-status-badge progress"><i class="fa fa-clock-o"></i> Status: In Progress</span>
                    </div>
                    <h3>Quality &amp; Environmental Management</h3>
                    <span class="gw-compliance-subtitle">Building Better Standards for Sustainable Waste Management</span>
                    <p>
                        Green Way Industries is continuously working to strengthen its quality, environmental, safety, and operational management systems.
                    </p>
                    <p>
                        Our long-term objective is to establish processes that support consistent service quality, responsible resource recovery, environmental protection, and sustainable industrial waste management.
                    </p>
                    <div style="background:#f4f9f5;border:1px solid #dce8dd;border-radius:8px;padding:16px;margin:14px 0;">
                        <h4 style="font-size:15px;color:var(--gw-deep);margin:0 0 6px;font-weight:700;">ISO Standards Roadmap</h4>
                        <p style="font-size:13.5px;color:#495e52;margin:0;line-height:1.6;">
                            We are working toward implementing and obtaining applicable ISO management-system standards as part of our continued commitment to improving quality, environmental management, and operational processes.
                        </p>
                    </div>
                    <p style="font-size:13px;color:#6b8073;font-style:italic;">
                        Note: The website transparently states that ISO standards are currently in progress as part of our systematic quality framework upgrade.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: HAZARDOUS WASTE MANAGEMENT -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12 gw-reveal">
                    <span class="gw-eyebrow-2026">Safety &amp; Risk Mitigation</span>
                    <h2 class="gw-h2-2026">Safe and Responsible Hazardous Waste Handling</h2>
                    <p style="font-size:16px;line-height:1.75;color:#384d41;margin-bottom:16px;">
                        Hazardous waste requires careful handling because improper storage, transportation, treatment, or disposal can create risks to people, equipment, soil, water, and the surrounding environment.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:16px;">
                        Green Way Industries provides hazardous waste management solutions that can include collection, transportation, recycling, treatment, and responsible disposal, depending on the type and characteristics of the waste.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:20px;">
                        Our processes are designed around safe handling and applicable regulatory requirements so that businesses can manage their industrial waste with greater confidence.
                    </p>
                    <p style="font-size:15.5px;line-height:1.72;color:#495e52;margin-bottom:0;">
                        For industries generating used oil, contaminated oil, oily waste, and other applicable industrial waste streams, choosing a responsible waste-management partner can help reduce environmental and operational risks.
                    </p>
                </div>

                <div class="col-md-6 col-sm-12 gw-reveal gw-delay-1" style="margin-top:20px;">
                    <div style="background:#f4f8f5;border:1.5px solid #d8e6db;border-radius:12px;padding:32px 28px;box-shadow:0 8px 24px rgba(16,58,42,0.06);">
                        <h4 style="font-size:18px;font-weight:700;color:var(--gw-deep);margin:0 0 16px;">
                            <i class="fa fa-shield" style="color:var(--gw-green);margin-right:8px;"></i> Risk Mitigation Architecture
                        </h4>
                        <div style="display:flex;flex-direction:column;gap:14px;">
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:32px;height:32px;border-radius:50%;background:#eaf4ed;color:var(--gw-green);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                    <i class="fa fa-tint"></i>
                                </div>
                                <div>
                                    <h5 style="font-size:15px;font-weight:700;color:var(--gw-deep);margin:0 0 4px;">Soil &amp; Water Protection</h5>
                                    <p style="font-size:13.5px;color:#495e52;margin:0;line-height:1.55;">Zero-ground-contact containment prevents subsurface and groundwater contamination.</p>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:32px;height:32px;border-radius:50%;background:#eaf4ed;color:var(--gw-green);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <div>
                                    <h5 style="font-size:15px;font-weight:700;color:var(--gw-deep);margin:0 0 4px;">Compliant Transportation Fleet</h5>
                                    <p style="font-size:13.5px;color:#495e52;margin:0;line-height:1.55;">Dedicated vacuum tankers and spill-proof cargo transport across Tamil Nadu.</p>
                                </div>
                            </div>
                            <div style="display:flex;align-items:flex-start;gap:12px;">
                                <div style="width:32px;height:32px;border-radius:50%;background:#eaf4ed;color:var(--gw-green);display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <div>
                                    <h5 style="font-size:15px;font-weight:700;color:var(--gw-deep);margin:0 0 4px;">Complete Manifest Chain</h5>
                                    <p style="font-size:13.5px;color:#495e52;margin:0;line-height:1.55;">100% statutory documentation including Form-10 manifests and audit records.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: WHY COMPLIANCE MATTERS & 5-STEP STRUCTURED FLOW -->
    <section class="gw-section-2026 gw-cream">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Structured Waste Governance</span>
                <h2 class="gw-h2-2026">Why Compliance Matters When Choosing a Used Oil Recycler</h2>
                <p class="gw-lead-2026">
                    Choosing the right recycling partner is important for businesses that generate used oil and industrial waste. Improper disposal can lead to environmental contamination, regulatory issues, and unnecessary operational risks.
                </p>
            </div>

            <!-- 5-Step Process Cards -->
            <div class="gw-step-flow-grid">
                <div class="gw-step-flow-card gw-reveal">
                    <div class="gw-step-flow-num">1</div>
                    <h4>Collection</h4>
                    <p>Structured on-site collection with calibrated sampling and containment.</p>
                </div>
                <div class="gw-step-flow-card gw-reveal gw-delay-1">
                    <div class="gw-step-flow-num">2</div>
                    <h4>Safe Handling</h4>
                    <p>Certified containment protocols minimizing fire hazards and leakage risks.</p>
                </div>
                <div class="gw-step-flow-card gw-reveal gw-delay-2">
                    <div class="gw-step-flow-num">3</div>
                    <h4>Transportation</h4>
                    <p>Dedicated GPS-tracked tankers operating under transport permits.</p>
                </div>
                <div class="gw-step-flow-card gw-reveal gw-delay-3">
                    <div class="gw-step-flow-num">4</div>
                    <h4>Treatment / Recycling</h4>
                    <p>Closed-loop re-refining and recovery at our SIDCO Tindivanam plant.</p>
                </div>
                <div class="gw-step-flow-card gw-reveal gw-delay-4">
                    <div class="gw-step-flow-num">5</div>
                    <h4>Responsible Management</h4>
                    <p>Statutory disposal closure, manifest issuance, and audit trail records.</p>
                </div>
            </div>

            <div class="text-center gw-reveal" style="margin-top:34px;">
                <p style="font-size:16px;color:#384d41;max-width:820px;margin:0 auto;line-height:1.7;">
                    At Green Way Industries, we focus on building a structured waste-management process that prioritizes environmental responsibility, regulatory compliance, safety, and resource recovery.
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION 5: INDUSTRIES WE SUPPORT -->
    <section class="gw-section-2026">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Sectors &amp; Coverage</span>
                <h2 class="gw-h2-2026">Industries We Support</h2>
                <p class="gw-lead-2026">
                    Our waste oil and industrial waste management solutions support businesses across diverse industrial sectors statewide:
                </p>
            </div>

            <div class="gw-ind-support-grid">
                <div class="gw-ind-support-chip gw-reveal">
                    <i class="fa fa-industry"></i>
                    <span>Manufacturing</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-1">
                    <i class="fa fa-car"></i>
                    <span>Automotive &amp; Automobile Workshops</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-2">
                    <i class="fa fa-cogs"></i>
                    <span>Engineering Industries</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal">
                    <i class="fa fa-bolt"></i>
                    <span>Power &amp; Electrical Facilities</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-1">
                    <i class="fa fa-truck"></i>
                    <span>Logistics &amp; Transportation</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-2">
                    <i class="fa fa-building-o"></i>
                    <span>Industrial Plants</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Commercial Facilities</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-1">
                    <i class="fa fa-ship"></i>
                    <span>Marine &amp; Shipping-Related Operations</span>
                </div>
                <div class="gw-ind-support-chip gw-reveal gw-delay-2">
                    <i class="fa fa-recycle"></i>
                    <span>Other Businesses Generating Used Oil</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: FREQUENTLY ASKED QUESTIONS -->
    <section class="gw-section-2026 gw-soft">
        <div class="container">
            <div class="text-center gw-reveal">
                <span class="gw-eyebrow-2026">Frequently Asked Questions</span>
                <h2 class="gw-h2-2026">Compliance &amp; Operations FAQs</h2>
                <p class="gw-lead-2026">
                    Common questions regarding authorizations, recycling procedures, and hazardous waste handling.
                </p>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="gw-faq-wrapper" style="margin-top:0;">
                        <!-- FAQ 1 -->
                        <div class="gw-faq-item is-active">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q01</span>
                                    <h3 class="gw-faq-title">Is Green Way Industries authorized for used oil recycling?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body" style="display:block;">
                                <p>Green Way Industries states that it is authorized by the Tamil Nadu Pollution Control Board for applicable used oil recycling operations. Businesses should contact the company for current authorization details relevant to their specific waste stream.</p>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q02</span>
                                    <h3 class="gw-faq-title">Why is TNPCB authorization important for used oil recycling?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>TNPCB authorization provides regulatory oversight for applicable waste-management and recycling activities in Tamil Nadu. Businesses should work with appropriately authorized recyclers and waste-management operators for their specific waste category.</p>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q03</span>
                                    <h3 class="gw-faq-title">Do you provide hazardous waste management services?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Yes. Green Way Industries provides hazardous waste management solutions including applicable collection, transportation, treatment, recycling, and responsible disposal services.</p>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q04</span>
                                    <h3 class="gw-faq-title">Can industries send used oil for recycling?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Businesses generating eligible used oil can contact Green Way Industries to discuss collection and recycling requirements. The appropriate process depends on the type, quantity, condition, and source of the waste.</p>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q05</span>
                                    <h3 class="gw-faq-title">Do you provide waste oil collection?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Yes. Green Way Industries provides waste oil collection solutions for businesses and industries, with collected material directed toward appropriate recycling, treatment, or responsible management.</p>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q06</span>
                                    <h3 class="gw-faq-title">Is Green Way Industries ISO certified?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>The website currently states that ISO standards are in progress. Therefore, the company should not be represented as ISO certified until the applicable certification has been officially obtained.</p>
                            </div>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="gw-faq-item">
                            <button class="gw-faq-header" type="button">
                                <div class="gw-faq-title-wrap">
                                    <span class="gw-faq-badge">Q07</span>
                                    <h3 class="gw-faq-title">How can I check the applicable compliance requirements for my waste?</h3>
                                </div>
                                <div class="gw-faq-icon"><i class="fa fa-chevron-down"></i></div>
                            </button>
                            <div class="gw-faq-body">
                                <p>Waste-management requirements can vary depending on the type, source, quantity, and characteristics of the waste. Contact Green Way Industries with details of your waste stream so the appropriate management process can be discussed.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: RESPONSIBLE PARTNER & CONTACT CTA BANNER -->
    <section class="gw-section-2026 gw-deep" id="compliance-cta" style="padding:70px 0;background:linear-gradient(135deg, #0e231a 0%, #103a2a 50%, #196b45 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-12 gw-reveal">
                    <span class="gw-eyebrow-2026 gw-eyebrow-lime" style="margin-bottom:12px;display:inline-block;">A Responsible Partner</span>
                    <h2 class="gw-h2-2026" style="font-size:34px;font-weight:800;color:#ffffff;line-height:1.25;margin:0 0 14px;">
                        Looking for a Compliant Used Oil Recycling Partner?
                    </h2>
                    <p class="gw-lead-2026 gw-lead-left" style="font-size:16px;line-height:1.7;color:#dbe7df;margin:0 0 16px;max-width:680px;">
                        Green Way Industries combines waste oil collection, recycling, hazardous waste management, and environmental responsibility to provide businesses with a dependable waste-management solution.
                    </p>
                    <p style="font-size:15px;line-height:1.68;color:#c8dfcf;margin:0 0 20px;">
                        If your business generates used oil, waste oil, hydraulic oil, transformer oil, spent oil, or other applicable industrial waste, our team can help you understand the appropriate collection and recycling or disposal process. Speak with Green Way Industries about your waste oil and industrial waste management requirements.
                    </p>
                    <div style="display:flex;flex-wrap:wrap;gap:12px;">
                        <a href="contact-us.php" class="gw-btn-lift gw-btn-green-2026" style="display:inline-block;padding:14px 26px;">
                            Enquire Now <i class="fa fa-paper-plane"></i>
                        </a>
                        <a href="tel:+919360036055" class="gw-btn-lift gw-btn-outline-2026" style="display:inline-block;padding:13px 22px;">
                            <i class="fa fa-phone"></i> Call +91 93600 36055
                        </a>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12 gw-reveal gw-delay-1" style="margin-top:24px;">
                    <div class="gw-contact-card-grid" style="grid-template-columns:1fr;gap:14px;">
                        <div class="gw-contact-info-box">
                            <i class="fa fa-phone"></i>
                            <h5>Call Our Team</h5>
                            <a href="tel:+919360036055">+91 93600 36055</a>
                        </div>
                        <div class="gw-contact-info-box">
                            <i class="fa fa-envelope"></i>
                            <h5>Email Address</h5>
                            <a href="mailto:admin@usedoil.in">admin@usedoil.in</a>
                        </div>
                        <div class="gw-contact-info-box">
                            <i class="fa fa-map-marker"></i>
                            <h5>Factory Location</h5>
                            <p>Plot No. 101, 102, 103 &amp; 104, SIDCO Industrial Estate, Venmaniathur &amp; Pattanam Village, Tindivanam Taluk, Villupuram District – 604207</p>
                        </div>
                    </div>
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