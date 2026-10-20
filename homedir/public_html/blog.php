<?php 
if (!defined('GW_BLOG_WRAPPER')) {
    define('GW_BLOG_WRAPPER', true);
}

$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}

@include(__DIR__ . '/blog-schemas.php');

// Master Registry for Green Way Technical Blog Articles
$blog_registry = [
    1 => [
        'slug' => 'cpcb-epr-used-oil-compliance',
        'name' => 'CPCB EPR Used Oil Regulations',
        'title' => 'CPCB EPR for Used Oil: Complete Compliance Guide India | Green Way',
        'meta_desc' => 'Comprehensive guide to CPCB EPR used oil rules, targets & certificates in India. Learn Form-10 manifests, TNPCB audits & compliant recycling. Call +91 93600 36055.',
        'keywords' => 'CPCB EPR used oil India, used oil EPR certificate, EPR targets for used oil, TNPCB authorized recycler EPR, hazardous waste management rules 2024 circular economy, re-refined base oil RRBO compliance, Form 10 manifest waste oil, used oil recycling Tamil Nadu, waste oil pickup Chennai',
        'file' => 'cpcb-epr-used-oil-compliance-content.php',
        'category' => 'CPCB & TNPCB Regulatory',
        'read_time' => '8 Min Read',
        'date' => 'October 2026',
        'image' => 'img/epr-used-oil-compliance.png'
    ],
    2 => [
        'slug' => 'form-10-hazardous-waste-manifest-rules',
        'name' => 'Form 10 Manifest & Transport Rules',
        'title' => 'Form 10 Hazardous Waste Manifest: 7-Copy Rules & Tracking | Green Way',
        'meta_desc' => 'Master the statutory 7-copy Form 10 Hazardous Waste Manifest under Rule 19 in India. Learn color coding, generator duties, 30-day blue copy rules, and SPCB audit readiness.',
        'keywords' => 'Form 10 manifest hazardous waste India, Rule 19 hazardous waste manifest 7 copies, hazardous waste transport manifest color codes, yellow copy green copy manifest, waste oil transportation manifest Tamil Nadu, Form 10 manifest compliance checklist',
        'file' => 'form-10-hazardous-waste-manifest-rules-content.php',
        'category' => 'Logistics & Rule 19',
        'read_time' => '7 Min Read',
        'date' => 'October 2026',
        'image' => 'img/logo/logo.png'
    ],
    3 => [
        'slug' => 'transformer-oil-recycling-testing-standards',
        'name' => 'Transformer Oil Recycling Standards',
        'title' => 'Used Transformer Oil Recycling: IS 1866 & BDV Testing Standards | Green Way',
        'meta_desc' => 'Technical guide to used transformer oil recycling under IS 1866 & IS 6792 in India. Learn BDV testing, dehydration, PCB limits, and TNPCB-approved recycling.',
        'keywords' => 'used transformer oil recycling India, IS 1866 transformer oil testing parameters, dielectric breakdown voltage BDV test, transformer oil filtration and dehydration, transformer oil recycler Tamil Nadu, PCB contamination transformer oil',
        'file' => 'transformer-oil-recycling-testing-standards-content.php',
        'category' => 'Power & Transformers',
        'read_time' => '8 Min Read',
        'date' => 'October 2026',
        'image' => 'img/logo/logo.png'
    ],
    4 => [
        'slug' => 'tnpcb-hazardous-waste-compliance-checklist',
        'name' => 'TNPCB Factory Audit Checklist',
        'title' => 'TNPCB Hazardous Waste Audit Checklist for Factories | Green Way',
        'meta_desc' => 'Essential TNPCB audit checklist for industrial hazardous waste in Tamil Nadu. Learn 90-day storage limits, Form 4 annual returns, manifest reconciliation & CTO renewal.',
        'keywords' => 'TNPCB hazardous waste audit checklist, 90 day hazardous waste storage limit Tamil Nadu, Form 4 annual returns hazardous waste TNPCB, CTO renewal hazardous waste compliance, TNPCB inspection waste oil disposal, PCB compliance audit Chennai Sriperumbudur',
        'file' => 'tnpcb-hazardous-waste-compliance-checklist-content.php',
        'category' => 'TNPCB & Plant Audits',
        'read_time' => '9 Min Read',
        'date' => 'October 2026',
        'image' => 'img/logo/logo.png'
    ]
];

$blog_id = isset($_REQUEST['b_id']) ? (int)$_REQUEST['b_id'] : 0;
if ($blog_id === 0 && !empty($_REQUEST['id'])) {
    $blog_id = (int)$_REQUEST['id'];
}

$current_slug = '';
if (!empty($_REQUEST['slug'])) {
    $current_slug = strtolower(trim($_REQUEST['slug'], '/'));
}

if ($blog_id === 0 && !empty($current_slug)) {
    foreach ($blog_registry as $bid => $bmeta) {
        if ($bmeta['slug'] === $current_slug) {
            $blog_id = $bid;
            break;
        }
    }
}

$blog_dtl1 = null;
if ($con && $blog_id > 0 && !isset($blog_registry[$blog_id])) {
    $blog_dtl = mysqli_query($con, "SELECT * FROM `blog` WHERE `id`='$blog_id' AND `status`='Active'");
    if ($blog_dtl && mysqli_num_rows($blog_dtl) > 0) {
        $blog_dtl1 = mysqli_fetch_array($blog_dtl);
    }
} elseif ($con && !empty($current_slug) && $blog_id === 0) {
    $esc_slug = mysqli_real_escape_string($con, str_replace('-', ' ', $current_slug));
    $blog_dtl = mysqli_query($con, "SELECT * FROM `blog` WHERE (`name` LIKE '%$esc_slug%' OR `id`='$current_slug') AND `status`='Active' LIMIT 1");
    if ($blog_dtl && mysqli_num_rows($blog_dtl) > 0) {
        $blog_dtl1 = mysqli_fetch_array($blog_dtl);
        $blog_id = (int)$blog_dtl1['id'];
    }
}

$is_single_article = ($blog_id > 0 && (isset($blog_registry[$blog_id]) || !empty($blog_dtl1)));

if (isset($blog_registry[$blog_id])) {
    $current_article = $blog_registry[$blog_id];
    $display_name = $current_article['name'];
    $page_title = $current_article['title'];
    $meta_desc = $current_article['meta_desc'];
    $meta_keywords = $current_article['keywords'];
    $canonical_url = "https://wasteoil.in/" . $current_article['slug'];
    $schema_code = isset($blog_schemas[$current_article['slug']]) ? $blog_schemas[$current_article['slug']] : null;
} elseif (!empty($blog_dtl1)) {
    $display_name = $blog_dtl1['name'];
    $page_title = htmlspecialchars($display_name) . " | Green Way Industries Blog";
    $meta_desc = !empty($blog_dtl1['short_desc']) ? strip_tags($blog_dtl1['short_desc']) : ("Read about " . htmlspecialchars($display_name) . " on Green Way Industries.");
    $meta_keywords = htmlspecialchars($display_name) . ", waste oil recycling Tamil Nadu, TNPCB hazardous waste compliance, industrial recycling India";
    $canonical_url = "https://wasteoil.in/" . (!empty($current_slug) ? $current_slug : ("article?b_id=" . $blog_id));
    $schema_code = null;
} else {
    $display_name = "Blog & Knowledge Hub";
    $page_title = "Industrial Recycling & Waste Management Blog | Green Way Industries";
    $meta_desc = "Read expert articles on CPCB EPR used oil rules, TNPCB compliance guidelines, hazardous waste management, Form-10 manifests, and circular economy lubrication.";
    $meta_keywords = "waste oil recycling blog, CPCB EPR used oil updates, TNPCB compliance articles, hazardous waste disposal guide, industrial recycling insights India, used oil management blog";
    $canonical_url = "https://wasteoil.in/blog";
    $schema_code = null;
}

$req_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$is_subpath = (strpos($req_uri, '/blog/') !== false);
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

  <?php if ($is_subpath) { ?>
  <base href="../">
  <?php } ?>

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

    <!-- Open Graph & Social Cards -->
    <meta property="og:type" content="<?php echo $is_single_article ? 'article' : 'website'; ?>">
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

    <!-- JSON-LD Structured Data Schema -->
    <?php if (!empty($schema_code)) { ?>
    <script type="application/ld+json">
    <?php echo $schema_code; ?>
    </script>
    <?php } else { ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "CollectionPage",
          "@id": "https://wasteoil.in/blog#collection",
          "name": "Green Way Industries Blog & Industrial Waste Compliance Hub",
          "url": "https://wasteoil.in/blog",
          "description": "Expert compliance guides on CPCB EPR used oil targets, TNPCB hazardous waste storage, Form-10 manifests, and circular economy recycling.",
          "publisher": {
            "@type": "Organization",
            "name": "Green Way Industries",
            "url": "https://wasteoil.in/",
            "logo": {
              "@type": "ImageObject",
              "url": "https://wasteoil.in/img/logo/logo.png"
            }
          }
        },
        {
          "@type": "BreadcrumbList",
          "@id": "https://wasteoil.in/blog#breadcrumb",
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
              "name": "Blog",
              "item": "https://wasteoil.in/blog"
            }
          ]
        }
      ]
    }
    </script>
    <?php } ?>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">

    <!-- Core Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.css">
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
      :root {
        --gw-primary: #196b45;
        --gw-deep: #103a2a;
        --gw-lime: #b5e85f;
        --gw-soft-bg: #f8faf8;
        --gw-border: #dce7dc;
        --gw-text-dark: #223028;
        --gw-text-muted: #526359;
      }

      /* Blog Listing Styles */
      .gw-blog-section {
        padding: 60px 0 90px;
        background: #fbfdfb;
      }

      .gw-blog-header {
        text-align: center;
        max-width: 780px;
        margin: 0 auto 50px;
      }

      .gw-blog-header h2 {
        color: var(--gw-deep);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
      }

      .gw-blog-header p {
        color: var(--gw-text-muted);
        font-size: 16.5px;
        line-height: 1.65;
      }

      .gw-featured-post {
        background: #ffffff;
        border: 1px solid var(--gw-border);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 50px;
        box-shadow: 0 10px 30px rgba(16, 58, 42, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
      }

      .gw-featured-post:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(16, 58, 42, 0.12);
      }

      .gw-featured-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
      }

      @media (max-width: 991px) {
        .gw-featured-grid {
          grid-template-columns: 1fr;
        }
      }

      .gw-featured-img {
        background: linear-gradient(135deg, var(--gw-deep) 0%, #175438 100%);
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        text-align: center;
        color: #ffffff;
        position: relative;
      }

      .gw-featured-content {
        padding: 40px 36px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .gw-post-tag {
        display: inline-block;
        background: #e7f5eb;
        color: var(--gw-primary);
        font-size: 12.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 5px 12px;
        border-radius: 4px;
        margin-bottom: 14px;
        width: fit-content;
      }

      .gw-featured-content h3 {
        color: var(--gw-deep);
        font-size: 24px;
        font-weight: 700;
        line-height: 1.35;
        margin: 0 0 14px;
      }

      .gw-featured-content h3 a {
        color: var(--gw-deep);
        text-decoration: none;
        transition: color 0.2s;
      }

      .gw-featured-content h3 a:hover {
        color: var(--gw-primary);
      }

      .gw-featured-content p {
        color: var(--gw-text-muted);
        font-size: 15px;
        line-height: 1.65;
        margin: 0 0 20px;
      }

      .gw-post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        font-size: 13.5px;
        color: var(--gw-text-muted);
        margin-bottom: 22px;
        padding-top: 15px;
        border-top: 1px solid #edf2ee;
      }

      .gw-post-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
      }

      .gw-btn-read {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gw-primary);
        color: #ffffff !important;
        font-weight: 600;
        font-size: 14.5px;
        padding: 10px 22px;
        border-radius: 4px;
        text-decoration: none;
        width: fit-content;
        transition: background 0.2s, transform 0.2s;
      }

      .gw-btn-read:hover {
        background: var(--gw-deep);
        transform: translateX(4px);
      }

      .gw-articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 30px;
      }

      @media (max-width: 767px) {
        .gw-articles-grid {
          grid-template-columns: 1fr;
        }
      }

      .gw-article-card {
        background: #ffffff;
        border: 1px solid var(--gw-border);
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        box-shadow: 0 6px 18px rgba(16, 58, 42, 0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
      }

      .gw-article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(16, 58, 42, 0.09);
      }

      .gw-card-body {
        padding: 28px 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
      }

      .gw-card-body h4 {
        color: var(--gw-deep);
        font-size: 19px;
        font-weight: 700;
        line-height: 1.4;
        margin: 0 0 12px;
      }

      .gw-card-body h4 a {
        color: var(--gw-deep);
        text-decoration: none;
        transition: color 0.2s;
      }

      .gw-card-body h4 a:hover {
        color: var(--gw-primary);
      }

      .gw-card-body p {
        color: var(--gw-text-muted);
        font-size: 14.5px;
        line-height: 1.6;
        margin: 0 0 20px;
        flex-grow: 1;
      }

      .gw-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 16px;
        border-top: 1px solid #eef3ef;
        font-size: 13.5px;
      }

      .gw-card-footer a {
        color: var(--gw-primary);
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
      }

      .gw-card-footer a:hover {
        color: var(--gw-deep);
      }

      /* Single Article Content Styles */
      .gw-article-wrapper {
        padding: 60px 0 80px;
        background: #ffffff;
        color: var(--gw-text-dark);
        font-family: inherit;
        line-height: 1.75;
      }

      .gw-article-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--gw-border);
        font-size: 14px;
        color: var(--gw-text-muted);
      }

      .gw-article-meta span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }

      .gw-article-badge {
        background: #e7f5eb;
        color: var(--gw-primary);
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 12.5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }

      .gw-callout-box {
        background: #f2f8f4;
        border-left: 5px solid var(--gw-primary);
        padding: 24px 28px;
        border-radius: 0 8px 8px 0;
        margin: 35px 0;
      }

      .gw-callout-box h4 {
        color: var(--gw-deep);
        font-size: 19px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 12px;
      }

      .gw-callout-box p {
        margin: 0;
        color: var(--gw-text-dark);
        font-size: 15.5px;
      }

      .gw-h2-title {
        color: var(--gw-deep);
        font-size: 27px;
        font-weight: 700;
        margin: 45px 0 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ebf2eb;
      }

      .gw-h3-title {
        color: var(--gw-primary);
        font-size: 20px;
        font-weight: 700;
        margin: 28px 0 14px;
      }

      .gw-table-responsive {
        overflow-x: auto;
        margin: 30px 0;
        border-radius: 8px;
        border: 1px solid var(--gw-border);
      }

      .gw-custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
        background: #ffffff;
      }

      .gw-custom-table th {
        background: var(--gw-deep);
        color: #ffffff;
        padding: 14px 18px;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
      }

      .gw-custom-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #edf3ed;
        vertical-align: top;
      }

      .gw-custom-table tr:nth-child(even) td {
        background: #f9fbf9;
      }

      .gw-checklist-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin: 30px 0;
      }

      .gw-checklist-card {
        background: #ffffff;
        border: 1px solid var(--gw-border);
        border-top: 4px solid var(--gw-primary);
        border-radius: 6px;
        padding: 22px 20px;
        box-shadow: 0 4px 12px rgba(16, 58, 42, 0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .gw-checklist-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(16, 58, 42, 0.08);
      }

      .gw-checklist-card h4 {
        font-size: 17px;
        font-weight: 700;
        color: var(--gw-deep);
        margin: 0 0 10px;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .gw-checklist-card h4 i {
        color: var(--gw-primary);
      }

      .gw-checklist-card p {
        font-size: 14px;
        color: var(--gw-text-muted);
        margin: 0;
        line-height: 1.6;
      }

      .gw-faq-card {
        background: #fcfdfc;
        border: 1px solid var(--gw-border);
        border-radius: 8px;
        margin-bottom: 16px;
        padding: 20px 24px;
      }

      .gw-faq-card h4 {
        margin: 0 0 10px;
        color: var(--gw-deep);
        font-size: 18px;
        font-weight: 700;
      }

      .gw-faq-card p {
        margin: 0;
        color: var(--gw-text-muted);
        font-size: 15px;
        line-height: 1.65;
      }

      .gw-cta-banner {
        background: linear-gradient(135deg, var(--gw-deep) 0%, #164f37 100%);
        border-radius: 10px;
        padding: 45px 40px;
        color: #ffffff;
        margin: 50px 0 20px;
        text-align: center;
      }

      .gw-cta-banner h3 {
        color: #ffffff;
        font-size: 26px;
        font-weight: 700;
        margin: 0 0 14px;
      }

      .gw-cta-banner p {
        color: #e0ece3;
        font-size: 16px;
        max-width: 720px;
        margin: 0 auto 28px;
      }

      .gw-cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: center;
      }

      .gw-btn-cta-primary {
        background: var(--gw-lime);
        color: var(--gw-deep) !important;
        font-weight: 700;
        padding: 13px 28px;
        border-radius: 4px;
        text-decoration: none;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }

      .gw-btn-cta-primary:hover {
        background: #a4db4a;
        transform: translateY(-2px);
      }

      .gw-btn-cta-secondary {
        background: transparent;
        color: #ffffff !important;
        border: 2px solid #ffffff;
        font-weight: 700;
        padding: 11px 26px;
        border-radius: 4px;
        text-decoration: none;
        transition: 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }

      .gw-btn-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
      }
    </style>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THB742MT"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <div id="preloader"></div>
    
    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Start Slider Area (Breadcrumb Banner) -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3><?php echo htmlspecialchars($is_single_article ? $display_name : 'Blog'); ?></h3>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="./" style="color:#fff">Home</a></li>
                            <?php if ($is_single_article) { ?>
                            <li><a href="blog" style="color:#fff">Blog</a></li>
                            <li><?php echo htmlspecialchars($display_name); ?></li>
                            <?php } else { ?>
                            <li>Blog</li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($is_single_article) { ?>
    <!-- Single Blog Article Content -->
    <?php 
    if (isset($current_article['file']) && file_exists(__DIR__ . '/' . $current_article['file'])) {
        include(__DIR__ . '/' . $current_article['file']);
    } elseif (!empty($blog_dtl1)) {
    ?>
    <section class="gw-article-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="gw-article-meta">
                        <span class="gw-article-badge">Industry Insight</span>
                        <span><i class="fa fa-calendar"></i> <?php echo date('F Y', strtotime(!empty($blog_dtl1['post_date']) ? $blog_dtl1['post_date'] : $blog_dtl1['c_date'])); ?></span>
                        <?php if (!empty($blog_dtl1['post_name'])) { ?>
                        <span><i class="fa fa-user"></i> <?php echo htmlspecialchars($blog_dtl1['post_name']); ?></span>
                        <?php } ?>
                    </div>
                    <h1 style="color:var(--gw-deep);font-size:32px;font-weight:700;line-height:1.35;margin-bottom:20px;">
                        <?php echo htmlspecialchars($blog_dtl1['name']); ?>
                    </h1>
                    <?php if (!empty($blog_dtl1['image']) && file_exists(__DIR__ . '/blog/' . $blog_dtl1['image'])) { ?>
                    <div style="margin:20px 0 30px;border-radius:8px;overflow:hidden;box-shadow:0 6px 18px rgba(0,0,0,0.08);">
                        <img src="blog/<?php echo htmlspecialchars($blog_dtl1['image']); ?>" alt="<?php echo htmlspecialchars($blog_dtl1['name']); ?>" style="width:100%;height:auto;max-height:460px;object-fit:cover;">
                    </div>
                    <?php } ?>
                    <div style="font-size:16px;line-height:1.8;color:var(--gw-text-dark);">
                        <?php echo $blog_dtl1['desc']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } else { ?>
    <!-- Blog Listing Hub Section -->
    <section class="gw-blog-section">
        <div class="container">
            
            <div class="gw-blog-header">
                <span class="gw-post-tag" style="margin:0 auto 12px;display:block;">Industry Insights</span>
                <h2>Technical Guides, CPCB Rules &amp; Sustainable Recycling</h2>
                <p>
                    Authoritative compliance guides, environmental regulations, and best practices for plant heads, safety managers, and industrial waste generators across India.
                </p>
            </div>

            <!-- Featured Pillar Article -->
            <div class="gw-featured-post">
                <div class="gw-featured-grid">
                    <div class="gw-featured-img">
                        <div>
                            <i class="fa fa-book" style="font-size:52px;color:var(--gw-lime);margin-bottom:16px;"></i>
                            <h4 style="color:#ffffff;font-size:20px;font-weight:700;margin:0 0 8px;">Featured Regulatory Guide</h4>
                            <span style="font-size:14px;color:#d8ebd9;">CPCB &amp; MoEF&amp;CC Environmental Framework</span>
                        </div>
                    </div>
                    <div class="gw-featured-content">
                        <span class="gw-post-tag">CPCB &amp; TNPCB Regulatory</span>
                        <h3>
                            <a href="cpcb-epr-used-oil-compliance">
                                CPCB EPR for Used Oil in India: The Complete Compliance, Target &amp; Certificate Guide for Manufacturers &amp; Bulk Users
                            </a>
                        </h3>
                        <p>
                            Everything plant heads and lubricant manufacturers must know about the mandatory CPCB Used Oil portal, statutory recycling quotas, Form 10 manifests, and GST-linked EPR certificate retirement.
                        </p>
                        <div class="gw-post-meta">
                            <span><i class="fa fa-calendar"></i> October 2026</span>
                            <span><i class="fa fa-clock-o"></i> 8 Min Read</span>
                            <span><i class="fa fa-check-circle"></i> Verified Regulatory</span>
                        </div>
                        <a href="cpcb-epr-used-oil-compliance" class="gw-btn-read">
                            Read Full Guide <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Articles Grid -->
            <div class="gw-articles-grid">

                <!-- Article Card 2 -->
                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">Logistics &amp; Rule 19</span>
                        <h4>
                            <a href="form-10-hazardous-waste-manifest-rules">
                                Form 10 Hazardous Waste Manifest: 7-Copy Rules &amp; Audit Tracking
                            </a>
                        </h4>
                        <p>
                            Master the statutory 7-copy Form 10 Hazardous Waste Manifest under Rule 19. Learn color coding, generator duties, 30-day blue copy rules, and SPCB audit readiness.
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-clock-o"></i> 7 Min Read</span>
                            <a href="form-10-hazardous-waste-manifest-rules">Read Guide <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Article Card 3 -->
                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">Power &amp; Transformers</span>
                        <h4>
                            <a href="transformer-oil-recycling-testing-standards">
                                Used Transformer Oil Recycling: IS 1866 &amp; BDV Testing Standards
                            </a>
                        </h4>
                        <p>
                            Technical engineering guide to insulating mineral transformer oil recycling, vacuum regeneration, IS 1866 testing parameters, breakdown voltage (BDV) restoration, and SPCB disposal.
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-clock-o"></i> 8 Min Read</span>
                            <a href="transformer-oil-recycling-testing-standards">Read Guide <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Article Card 4 -->
                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">TNPCB &amp; Plant Audits</span>
                        <h4>
                            <a href="tnpcb-hazardous-waste-compliance-checklist">
                                TNPCB Hazardous Waste Factory Audit Checklist: 90-Day Storage &amp; CTO
                            </a>
                        </h4>
                        <p>
                            Comprehensive compliance inspection checklist for factory occupiers in Tamil Nadu. Master the 90-day storage shed rules, Form 4 annual filings, and manifest reconciliation.
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-clock-o"></i> 9 Min Read</span>
                            <a href="tnpcb-hazardous-waste-compliance-checklist">Read Guide <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Articles from Database if present -->
                <?php
                if ($con) {
                    $db_blog_res = @mysqli_query($con, "SELECT * FROM `blog` WHERE `status`='Active' ORDER BY `order` ASC, `id` DESC");
                    if ($db_blog_res && mysqli_num_rows($db_blog_res) > 0) {
                        while ($db_row = mysqli_fetch_array($db_blog_res)) {
                ?>
                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">Industry Update</span>
                        <h4>
                            <a href="blog?b_id=<?php echo $db_row['id']; ?>">
                                <?php echo htmlspecialchars($db_row['name']); ?>
                            </a>
                        </h4>
                        <p>
                            <?php echo !empty($db_row['short_desc']) ? htmlspecialchars(strip_tags($db_row['short_desc'])) : htmlspecialchars(substr(strip_tags($db_row['desc']), 0, 160)) . '...'; ?>
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-calendar"></i> <?php echo date('M Y', strtotime($db_row['post_date'] ? $db_row['post_date'] : $db_row['c_date'])); ?></span>
                            <a href="blog?b_id=<?php echo $db_row['id']; ?>">Read Article <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>

                <!-- Service Cross-Links -->
                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">Core Capabilities</span>
                        <h4>
                            <a href="waste-oil-recycling">
                                Vacuum Re-Refining &amp; Base Oil Production in Tamil Nadu
                            </a>
                        </h4>
                        <p>
                            Learn how Green Way Industries transforms used industrial lubricating oils into premium reusable base oil via advanced thin-film vacuum distillation.
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-clock-o"></i> 6 Min Read</span>
                            <a href="waste-oil-recycling">Read Service <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="gw-article-card">
                    <div class="gw-card-body">
                        <span class="gw-post-tag">Total Waste Management</span>
                        <h4>
                            <a href="industrial-waste-management">
                                End-to-End Industrial Waste Management for SEZs &amp; Factories
                            </a>
                        </h4>
                        <p>
                            From spent coolants and oily rags to contaminated packaging and chemical drums, learn how Green Way Industries manages multi-stream industrial hazardous waste.
                        </p>
                        <div class="gw-card-footer">
                            <span style="color:#798a80;"><i class="fa fa-clock-o"></i> 5 Min Read</span>
                            <a href="industrial-waste-management">Read Service <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <?php } ?>

    <!-- Support & Consultation Section -->
    <section class="gw-cta-section-2026" style="background:linear-gradient(135deg, #103a2a 0%, #196b45 100%);padding:56px 0;color:#ffffff;">
        <div class="container">
            <div class="row" style="align-items:center;display:flex;flex-wrap:wrap;">
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
                    <a href="contact-us" class="gw-btn-lift gw-btn-green-2026" style="margin-right:10px;display:inline-block;padding:14px 26px;">
                        Enquire Now <i class="fa fa-paper-plane"></i>
                    </a>
                    <a href="tel:+919360036055" class="gw-btn-lift gw-btn-outline-2026" style="display:inline-block;padding:13px 22px;">
                        <i class="fa fa-phone"></i> Call Direct
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Footer bottom Area -->
    <?php include('footer.php'); ?>

    <!-- JavaScript Dependencies -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/main.js"></script>
    <script src="js/service-modern.js"></script>

</body>

</html>
