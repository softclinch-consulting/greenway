<header class="header-one">
     <?php
	$header1 = [
		'email' => 'info@wasteoil.in',
		'mobile' => '+91 93600 36055'
	];
	if (!empty($con)) {
		$header = @mysqli_query($con, "select * from `settings` where `id`!='' ");
		if ($header && $row = mysqli_fetch_array($header)) {
			$header1 = $row;
		}
	}
	?>
        <!-- Start top bar -->
        <div class="topbar-area fix hidden-xs">
            <div class="container">
                <div class="row">
                    <div class=" col-md-10 col-sm-9">
                        <div class="topbar-left">

                            <ul>
                                <li><a href="#"><i class="fa fa-map-marker"></i> Chennai, India</a></li>
                                <li><a href="mailto:<?php echo htmlspecialchars($header1['email']);?>"><i class="fa fa-envelope"></i><?php echo htmlspecialchars($header1['email']);?></a>
                                </li>
                                <li><a href="tel:<?php echo htmlspecialchars($header1['mobile']);?>"><i class="fa fa-phone"></i> <?php echo htmlspecialchars($header1['mobile']);?></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="quote-button">
                            <a href="contact-us" class="quote-btn">Get a quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End top bar -->
        <!-- header-area start -->
        <div id="sticker" class="header-area header-area-4 hidden-xs">
            <div class="container">
                <div class="row">
                    <!-- logo start -->
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <!-- Brand -->
                            <a class="navbar-brand page-scroll sticky-logo" href="./">
                                <img style="max-width: 280px;margin-top: 12px;" src="img/logo/logo.png" alt="Green Way Industries">
                            </a>
                        </div>
                    </div>
                    <!-- logo end -->
                    <div style="margin-top: 10px;" class="col-md-10 col-sm-10">
                        <div class="header-right-link">
                            <!-- search option start -->
                            <form action="#">
                                <div class="search-option">
                                    <input type="text" placeholder="Search...">
                                    <button class="button" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                            <!-- search option end -->
                        </div>
                        <!-- mainmenu start -->
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse" id="navbar-example">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">

                                        <li><a href="./">Home</a></li>
                                        <li><a href="about">About us</a></li>
                                        <li><a class="pagess" href="services">Our Services</a>
                                            <ul class="sub-menu">
                                                <?php
                                                $service_slug_map = [
                                                    16 => 'waste-oil-disposal',
                                                    17 => 'waste-oil-recycling',
                                                    21 => 'waste-oil-collection',
                                                    22 => 'used-oil-disposal',
                                                    23 => 'used-oil-recycler',
                                                    24 => 'hazardous-waste-recycler',
                                                    25 => 'used-transformer-oil-recycling',
                                                    26 => 'used-hydraulic-oil',
                                                    27 => 'spent-oil',
                                                    28 => 'hazardous-waste-transport',
                                                    29 => 'hazardous-waste-disposal-for-ships',
                                                    30 => 'industrial-waste-management'
                                                ];
                                                $services_list = [];
                                                if (!empty($con)) {
                                                    $service_header_top = @mysqli_query($con, "select * from `service` where `id`!='' and `status`='Active' order by `order` asc");
                                                    if ($service_header_top) {
                                                        while($service_row = mysqli_fetch_array($service_header_top)) {
                                                            $sid = (int)$service_row['id'];
                                                            $s_url = isset($service_slug_map[$sid]) ? $service_slug_map[$sid] : ('services?s_id=' . $sid);
                                                            $services_list[] = ['url' => $s_url, 'name' => $service_row['name']];
                                                        }
                                                    }
                                                }
                                                if (empty($services_list)) {
                                                    $services_list = [
                                                        ['url' => 'waste-oil-disposal', 'name' => 'Waste Oil Disposal'],
                                                        ['url' => 'waste-oil-recycling', 'name' => 'Waste Oil Recycling'],
                                                        ['url' => 'waste-oil-collection', 'name' => 'Waste Oil Collection'],
                                                        ['url' => 'used-oil-disposal', 'name' => 'Used Oil Disposal'],
                                                        ['url' => 'used-oil-recycler', 'name' => 'Used Oil Recycler'],
                                                        ['url' => 'hazardous-waste-recycler', 'name' => 'Hazardous Waste Recycler'],
                                                        ['url' => 'used-transformer-oil-recycling', 'name' => 'Used Transformer Oil Recycling'],
                                                        ['url' => 'used-hydraulic-oil', 'name' => 'Used Hydraulic Oil'],
                                                        ['url' => 'spent-oil', 'name' => 'Spent Oil'],
                                                        ['url' => 'hazardous-waste-transport', 'name' => 'Hazardous Waste Transport'],
                                                        ['url' => 'hazardous-waste-disposal-for-ships', 'name' => 'Hazardous Waste Disposal for Ships'],
                                                        ['url' => 'industrial-waste-management', 'name' => 'Industrial Waste Management']
                                                    ];
                                                }
                                                foreach ($services_list as $s_item) {
                                                ?>
                                                    <li><a href="<?php echo $s_item['url']; ?>"><?php echo htmlspecialchars($s_item['name']); ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="certifications">Our Certifications</a></li>
                                        <li><a href="our-industries">Our Industries</a></li>
                                        <li><a href="our-products">Our Products</a></li>
                                        <li><a href="our-gallery">Our Gallery</a></li>
                                        <li><a href="contact-us">Contact Us</a></li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- mainmenu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
        <!-- mobile-menu-area start -->
        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <div class="logo">
                                <a style="height: 100px;" href="./"><img style="height: 45%;" src="img/logo/logo.png" alt="Green Way Industries" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>

                                    <li><a href="./">Home</a></li>
                                    <li><a href="about">About us</a></li>

                                    <li><a class="pagess" href="services">Our Services</a>
                                        <ul>
                                            <?php
                                            foreach ($services_list as $s_item) {
                                            ?>
                                                <li><a href="<?php echo $s_item['url']; ?>"><?php echo htmlspecialchars($s_item['name']); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="certifications">Our Certifications</a></li>
                                    <li><a href="our-industries">Our Industries</a></li>
                                    <li><a href="our-products">Our Products</a></li>
                                    <li><a href="our-gallery">Our Gallery</a></li>
                                    <li><a href="contact-us">Contact Us</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
    </header>