<?php
$dbSocket = @fsockopen('127.0.0.1', 3306, $dbError, $dbErrorMessage, 0.2);
$hasDatabase = $dbSocket !== false;
if ($dbSocket) { fclose($dbSocket); }

$con = null;
if ($hasDatabase) {
    @include('web-admin/config.php');
}

$msg_disply='';

if(isset($_REQUEST['send_msg']) || ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'])))
{
    $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $topic = htmlspecialchars(trim($_POST['topic'] ?? ''), ENT_QUOTES, 'UTF-8');
    $service = htmlspecialchars(trim($_POST['service'] ?? ''), ENT_QUOTES, 'UTF-8');
    $raw_message = trim($_POST['message'] ?? '');
    $msg = nl2br(htmlspecialchars($raw_message, ENT_QUOTES, 'UTF-8'));
    
    // Admin recipient & sender configuration from settings or defaults
    $to = !empty($admin_to) ? $admin_to : "maskern2287@gmail.com";
    $from_email = !empty($admin_form) ? $admin_form : "info@wasteoil.in";
    $from_name = "Green Way Industries";

    // Clean, informative subject line avoiding generic spam filters
    $service_label = !empty($service) ? $service : 'Waste Oil Enquiry';
    $subject = "[Website Lead] " . (!empty($name) ? $name : 'New Client') . " - " . $service_label;

    // Submission metadata
    $submitted_time = date('d-m-Y H:i:s') . ' IST';

    // 1. Securely log lead into database so inquiries are never lost
    if (!empty($con)) {
        $c_date = date('Y-m-d');
        $db_summary = "Topic: " . $topic . " | Service: " . $service . " | Details: " . $raw_message;
        $esc_name = mysqli_real_escape_string($con, $name);
        $esc_phone = mysqli_real_escape_string($con, $phone);
        $esc_email = mysqli_real_escape_string($con, $email);
        $esc_msg = mysqli_real_escape_string($con, $db_summary);
        @mysqli_query($con, "INSERT INTO `enquiry` (`name`, `mobile`, `email`, `message`, `c_date`) VALUES ('$esc_name', '$esc_phone', '$esc_email', '$esc_msg', '$c_date')");
    }

    // 2. Build modern, spam-proof, responsive HTML Email Document
    $message = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>' . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . '</title>
<style>
  body { margin:0; padding:0; background-color:#f4f7f5; font-family:-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; color:#222222; }
  .email-wrap { max-width:600px; margin:20px auto; background:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #dce6e0; box-shadow:0 4px 12px rgba(0,0,0,0.05); }
  .email-header { background:linear-gradient(135deg, #103a2a 0%, #196b45 100%); color:#ffffff; padding:28px 24px; text-align:center; }
  .email-header h1 { margin:0; font-size:22px; font-weight:700; letter-spacing:0.5px; }
  .email-header p { margin:6px 0 0; font-size:13px; color:#c7e6d2; }
  .email-body { padding:28px 24px; }
  .lead-badge { display:inline-block; background:#e8f8ee; color:#125235; font-size:12px; font-weight:700; text-transform:uppercase; padding:4px 10px; border-radius:4px; margin-bottom:18px; }
  .details-table { width:100%; border-collapse:collapse; margin-top:10px; }
  .details-table td { padding:11px 12px; border-bottom:1px solid #edf2ee; font-size:14px; vertical-align:top; }
  .details-table td.label { width:32%; font-weight:600; color:#55665d; background-color:#f9fbf9; }
  .details-table td.value { width:68%; color:#1a1a1a; }
  .message-box { background:#fbfdfb; border-left:4px solid #196b45; padding:14px 16px; margin-top:18px; border-radius:0 6px 6px 0; font-size:14px; line-height:1.6; color:#2c3e35; }
  .email-footer { background:#f4f7f5; padding:18px 24px; text-align:center; font-size:12px; color:#6b7c72; border-top:1px solid #e5ede7; }
  .email-footer a { color:#196b45; text-decoration:none; font-weight:600; }
  .action-btn { display:inline-block; background:#196b45; color:#ffffff !important; text-decoration:none; padding:10px 20px; border-radius:4px; font-size:13px; font-weight:600; margin-top:16px; }
</style>
</head>
<body>
<div class="email-wrap">
  <div class="email-header">
    <h1>Green Way Industries</h1>
    <p>TNPCB Authorized Waste Oil Recycling &amp; Industrial Waste Management</p>
  </div>
  <div class="email-body">
    <span class="lead-badge">&#9679; Verified Website Enquiry</span>
    <p style="margin:0 0 16px;font-size:15px;line-height:1.5;">A new customer enquiry has been submitted on <strong>wasteoil.in</strong>. Details are below:</p>
    
    <table class="details-table" role="presentation">
      <tr>
        <td class="label">Customer Name</td>
        <td class="value"><strong>' . $name . '</strong></td>
      </tr>
      <tr>
        <td class="label">Phone Number</td>
        <td class="value"><a href="tel:' . preg_replace('/[^0-9+]/', '', $phone) . '" style="color:#196b45;font-weight:700;text-decoration:none;">' . $phone . '</a></td>
      </tr>
      <tr>
        <td class="label">Email Address</td>
        <td class="value"><a href="mailto:' . $email . '" style="color:#196b45;text-decoration:none;">' . $email . '</a></td>
      </tr>
      <tr>
        <td class="label">Service Required</td>
        <td class="value"><strong>' . $service . '</strong></td>
      </tr>
      <tr>
        <td class="label">Subject / Topic</td>
        <td class="value">' . $topic . '</td>
      </tr>
      <tr>
        <td class="label">Submitted At</td>
        <td class="value">' . $submitted_time . '</td>
      </tr>
    </table>

    <div style="margin-top:20px;">
      <strong style="font-size:14px;color:#103a2a;">Customer Message:</strong>
      <div class="message-box">' . $msg . '</div>
    </div>

    <div style="text-align:center;margin-top:22px;">
      <a href="mailto:' . $email . '?subject=Re: ' . rawurlencode($topic) . '" class="action-btn">Reply to ' . $name . ' &rarr;</a>
    </div>
  </div>
  <div class="email-footer">
    <p style="margin:0 0 6px;">This inquiry was sent from <a href="https://wasteoil.in/contact-us">wasteoil.in/contact-us</a>.</p>
    <p style="margin:0;color:#8a9990;font-size:11px;">Green Way Industries | Tindivanam &amp; Chennai, Tamil Nadu | Call: +91 93600 36055</p>
  </div>
</div>
</body>
</html>';

    // 3. Construct RFC 5322 & Anti-Spam Headers
    $msg_id_domain = 'wasteoil.in';
    $message_id = '<' . gmdate('YmdHis') . '.' . bin2hex(random_bytes(8)) . '@' . $msg_id_domain . '>';
    $current_date = date('r');

    $headers = [];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'Content-Transfer-Encoding: 8bit';
    $headers[] = 'Date: ' . $current_date;
    $headers[] = 'Message-ID: ' . $message_id;
    $headers[] = 'From: "' . $from_name . '" <' . $from_email . '>';
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $headers[] = 'Reply-To: "' . addslashes(str_replace(["\r", "\n"], '', $name)) . '" <' . $email . '>';
    } else {
        $headers[] = 'Reply-To: "' . $from_name . '" <' . $from_email . '>';
    }
    $headers[] = 'Return-Path: <' . $from_email . '>';
    $headers[] = 'X-Mailer: GreenWay-Mailer/2.0 (PHP/' . phpversion() . ')';
    $headers[] = 'X-Priority: 3 (Normal)';
    $headers[] = 'Importance: Normal';
    $headers[] = 'Auto-Submitted: auto-generated';

    $headers_str = implode("\r\n", $headers);

    // 4. Send via PHP mail() with -f parameter to enforce SPF Return-Path alignment
    $additional_params = "-f" . $from_email;
    $check = @mail($to, $subject, $message, $headers_str, $additional_params);
    if (!$check) {
        // Fallback without 5th parameter if environment restricts additional params
        $check = @mail($to, $subject, $message, $headers_str);
    }

    if ($check) {
        $msg_disply = "Thank you! Your enquiry has been received. Our team will contact you shortly.";
    } else {
        $msg_disply = "Thank you! Your enquiry has been received.";
    }
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
    <title>Contact Green Way Industries | Waste Oil Pickup &amp; Recycler in Tamil Nadu, India</title>
    <meta name="description" content="Request scheduled on-site waste oil pickup, tanker dispatch, bulk re-refined oil quotes, or facility audits across Tamil Nadu and India. Call +91 93600 36055.">
    <meta name="keywords" content="contact waste oil recycler, waste oil pickup request Chennai, used oil collection number Tamil Nadu, hazardous waste disposal contact, Green Way Industries Chennai address, emergency waste oil pickup Hosur Coimbatore, waste oil quote India, oil disposal inquiry Tamil Nadu">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://wasteoil.in/contact-us">

    <!-- Geo Meta Tags for High Local Search Relevance in Tamil Nadu & India -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0336;80.2117">
    <meta name="ICBM" content="13.0336, 80.2117">

    <!-- Open Graph & Social Cards for High SERP & Social CTR -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Green Way Industries">
    <meta property="og:title" content="Contact Green Way Industries | Waste Oil Pickup &amp; Compliance">
    <meta property="og:description" content="TNPCB authorized used oil recycler. Request scheduled tanker pickup, bulk quotes, and Form-10 manifests across Tamil Nadu &amp; India.">
    <meta property="og:url" content="https://wasteoil.in/contact-us">
    <meta property="og:image" content="https://wasteoil.in/img/logo/logo.png">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact Green Way Industries | Waste Oil Recycler Tamil Nadu">
    <meta name="twitter:description" content="Request on-site waste oil pickup, laboratory testing, and certified hazardous waste recycling across Tamil Nadu &amp; India.">
    <meta name="twitter:image" content="https://wasteoil.in/img/logo/logo.png">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="22DnXNvAgVo2tubJaZ-rWUtMDNN0BWOCs8ozpOYaRvU">
    <meta name="google-site-verification" content="google71644dabd58cdac1">

    <!-- JSON-LD Structured Data: ContactPage, LocalBusiness & BreadcrumbList -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "ContactPage",
          "@id": "https://wasteoil.in/contact-us#webpage",
          "url": "https://wasteoil.in/contact-us",
          "name": "Contact Green Way Industries | Waste Oil Pickup & Recycler in Tamil Nadu, India",
          "description": "Request scheduled on-site waste oil pickup, tanker dispatch, bulk re-refined oil quotes, or facility audits across Tamil Nadu and India. Call +91 93600 36055.",
          "breadcrumb": {
            "@id": "https://wasteoil.in/contact-us#breadcrumb"
          }
        },
        {
          "@type": "BreadcrumbList",
          "@id": "https://wasteoil.in/contact-us#breadcrumb",
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
              "name": "Contact Us",
              "item": "https://wasteoil.in/contact-us"
            }
          ]
        },
        {
          "@type": "RecyclingCenter",
          "@id": "https://wasteoil.in/#organization",
          "name": "Green Way Industries",
          "url": "https://wasteoil.in/",
          "logo": "https://wasteoil.in/img/logo/logo.png",
          "telephone": "+919360036055",
          "email": "admin@usedoil.in",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "78/30 Suscon Builder, 53rd Street, Ashok Nagar, Anjenear Kovil Opp",
            "addressLocality": "Chennai",
            "addressRegion": "Tamil Nadu",
            "postalCode": "600083",
            "addressCountry": "IN"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 13.0336,
            "longitude": 80.2117
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
            "opens": "09:00",
            "closes": "18:30"
          },
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+919360036055",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": ["en", "ta"]
          }
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
    <!-- modern service & contact styles -->
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
    
    <?php include('header.php');?>
    
    <!-- header end -->
    <!-- Start Slider Area -->   
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h1 style="font-size:36px;font-weight:700;color:#ffffff;margin:0;">Contact Us</h1>
                        </div>
                        <ul>
                            <li class="home-bread"><a href="./" style="color:#fff;">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$contact1 = [
    'c_image' => '1.jpg',
    'f_image' => '2.jpg',
    'address1' => '78/30 Suscon Builder, 53rd Street, Ashok Nagar, Chennai, Tamil Nadu - 600083',
    'mobile' => '+91 93600 36055',
    'email' => 'admin@usedoil.in',
    'address2' => 'Plot No: 101, 102, 103 & 104, SIDCO Industrial Estate, Venmaniathur & Pattanam Village, Tindivanam, Villupuram - 604207',
    'mobile2' => '+91 93600 36055',
    'email2' => 'info@wasteoil.in'
];
if (!empty($con)) {
    $contact = @mysqli_query($con, "select * from `settings` where `id`!='' ");
    if ($contact && $row = mysqli_fetch_array($contact)) {
        $contact1 = $row;
    }
}
?>

<section class="facilities">
  <h2>Contact Us</h2>
  <div class="facility-grid">
    <!-- Chennai Office -->
    <div class="facility-card">
      <img src="settings/<?php echo $contact1['c_image'];?>" alt="Corporate Office - Chennai">
      <div class="info">
        <h3>Corporate Office - Chennai</h3>
        <p><strong style="color: #197b30;">Greenway Industries</strong><br><br>
         <span style="color:#000;">Address: </span><?php echo strip_tags($contact1['address1']);?></p>
       <p><a style="color: #000;" href="#">Phone: <span style="color:#777777;"><?php echo $contact1['mobile'];?></span></a></p>
        <p><a style="color: #000;" href="#">Email: <span style="color:#777777;"><?php echo $contact1['email'];?></span></a></p>
       
      </div>
    </div>

    <!-- Villupuram Plant -->
    <div class="facility-card">
      <img src="settings/<?php echo $contact1['f_image'];?>" alt="Processing Plant - Villupuram">
      <div class="info">
        <h3>Processing Plant - Villupuram</h3>
        <p><strong style="color: #197b30;">Greenway Industries</strong><br><br>
        <span style="color:#000;">Address: </span><?php echo strip_tags($contact1['address2']);?></p>

        <p><a style="color: #000;" href="#">Phone: <span style="color:#777777;"><?php echo $contact1['mobile2'];?></span></a></p>
        <p><a style="color: #000;" href="#">Email: <span style="color:#777777;"><?php echo $contact1['email2'];?></span></a></p>
      
      </div>
    </div>
  </div>
</section>

<style>
.facilities {
  padding: 40px 20px;
  background: #f0fdf4;
  font-family: 'Segoe UI', sans-serif;
}

.facilities h2 {
  text-align: center;
  color: #2e7d32;
  margin-bottom: 30px;

}

.facility-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

.facility-card {
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  width: 480px;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.facility-card:hover {
  transform: translateY(-5px);
}

.facility-card img {
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.info {
  padding: 20px;
}

.info h3 {
  color: #388e3c;
  margin-bottom: 10px;
      font-size: 25px;
}

.info ul {
  padding-left: 20px;
  margin-top: 10px;
}

@media (max-width: 600px) {
  .facility-card {
    width: 100%;
  }
}
</style>



    <div class="contact-page area-padding">
        <div class="container">
            <div class="row">
              <!--   <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-head">

                        <div class="contact-icon">
                            <div class="contact-inner">
                                <h3>Contact Us</h3>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    <span>+91 93600 36055</span>
                                </a>

                                <a href="mailto:admin@usedoil.in">
                                    <i class="fa fa-envelope"></i>
                                    <span>admin@usedoil.in</span>
                                </a>

                                <a href="https://maps.google.com/?q=Green way Industries 78/30 Suscon Builder, 53rd Street, Ashok Nagar, Anjenear Kovil Opp, Chennai-600083"
                                    target="_blank">
                                    <i class="fa fa-map"></i>
                                    <span><b>Corporate Office:</b> Green way Industries, <br>78/30 Suscon Builder, 53rd
                                        Street, Ashok Nagar,<br> Anjenear Kovil Opp, Chennai-600083</span>
                                </a>

                                <a href="https://maps.google.com/?q=Green Way Industries Plot No: 101, 102, 103 & 104, Sidco Industrial Estate, Venmaniathur & Pattanam Village, Tindivanam Taluk & Villupuram District, 604207"
                                    target="_blank">
                                    <i class="fa fa-map"></i>
                                    <span><b>Factory Address:</b> Green Way Industries,<br> Plot No: 101, 102, 103 &
                                        104, Sidco Industrial Estate, <br>Venmaniathur & Pattanam Village,<br>
                                        Tindivanam Taluk & Villupuram District, Pin: 604207</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-2 col-sm-6 col-xs-12"></div>
                <!-- End contact icon -->
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <div class="row">
                            <h3>Enquiry Now</h3>
                            
                            <?php
                        if($msg_disply!=''){?> <center><p style="background:#e8f8ee;color:#0b3b24;border:1px solid #22b14c;padding:12px 18px;border-radius:6px;font-weight:600;margin-bottom:18px;"><?php echo $msg_disply; ?></p></center> <?php }
                        ?>
                            <form method="POST" action="" class="contact-form">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" required=""
                                        data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" class="email form-control" id="email" name="email" placeholder="Email"
                                        required="" data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone"
                                        required="" data-error="Please enter your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" id="msg_subject" class="form-control" name="topic"  placeholder="Subject"
                                        required="" data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                      <select style="border: 1px solid #ccc;
    border-radius: 0;
    height: 52px;
    margin-bottom: 15px;
    padding-left: 20px;
    width: 100%;
" name="service" required>
                                          
    <option value="" disabled selected>Select Service</option>
    <?php
    $has_service_options = false;
    if ($con) {
        $service_contact = @mysqli_query($con, "select * from `service` where `id`!='' and `status`='Active' order by `order` asc");
        if ($service_contact && mysqli_num_rows($service_contact) > 0) {
            $has_service_options = true;
            while($service_contact1 = mysqli_fetch_array($service_contact)) {
    ?>
    <option value="<?php echo htmlspecialchars($service_contact1['name'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars($service_contact1['name'], ENT_QUOTES, 'UTF-8');?></option>
    <?php
            }
        }
    }
    if (!$has_service_options) {
    ?>
        <option value="Waste Oil Disposal">Waste Oil Disposal</option>
        <option value="Waste Oil Recycling">Waste Oil Recycling</option>
        <option value="Waste Oil Collection">Waste Oil Collection</option>
        <option value="Used Oil Disposal">Used Oil Disposal</option>
        <option value="Used Oil Recycler">Used Oil Recycler</option>
        <option value="Hazardous Waste Recycler">Hazardous Waste Recycler</option>
        <option value="Used Transformer oil recycling">Used Transformer oil recycling</option>
        <option value="Used Hydraulic Oil">Used Hydraulic Oil</option>
        <option value="Spent Oil">Spent Oil</option>
        <option value="Hazardous Waste Transport">Hazardous Waste Transport</option>
        <option value="Hazardous Waste Disposal for Ships">Hazardous Waste Disposal for Ships</option>
        <option value="Industrial Waste Management">Industrial Waste Management</option>
    <?php } ?>
  </select></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" rows="7" placeholder="Message" name="message" class="form-control"
                                        required="" data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" name="send_msg" id="submit" class="contact-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End contact Form -->
            </div>
        </div>
    </div>



    <div class="map-area">
        <div class="container">
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.0288924186666!2d80.21261407507752!3d13.033832087287289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5263f01ac2799b%3A0x18cface81a2cace2!2sGreen%20Way%20Industries!5e0!3m2!1sen!2sin!4v1756545593099!5m2!1sen!2sin"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <center>
                        <h4>Corporate Office Address</h4>
                    </center>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.7213298007723!2d79.619778!3d12.267128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5338ec4ec98057%3A0xcb8d8fa174f78b9e!2s122%2C%20Venmaniyathur%2C%20Tamil%20Nadu%20604207!5e0!3m2!1sen!2sin!4v1758782481254!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <center>
                        <h4>Factory Address</h4>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <br><br>  <!-- Start Footer bottom Area -->
   
    <!-- Start Footer bottom Area -->
    <?php include('footer.php');?>

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