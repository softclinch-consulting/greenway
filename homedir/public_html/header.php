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
                            <a href="contact-us.php" class="quote-btn">Get a quote</a>
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
                            <a class="navbar-brand page-scroll sticky-logo" href="index.php">
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

                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About us</a></li>
                                        <li><a class="pagess" href="#">Our Services</a>
                                            <ul class="sub-menu">
                                                <?php
                                                $services_list = [];
                                                if (!empty($con)) {
                                                    $service_header_top = @mysqli_query($con, "select * from `service` where `id`!='' and `status`='Active' order by `order` asc");
                                                    if ($service_header_top) {
                                                        while($service_row = mysqli_fetch_array($service_header_top)) {
                                                            $services_list[] = ['url' => 'services.php?s_id=' . $service_row['id'], 'name' => $service_row['name']];
                                                        }
                                                    }
                                                }
                                                if (empty($services_list)) {
                                                    $services_list = [
                                                        ['url' => 'waste-oil-collection-professional.php', 'name' => 'Waste Oil Collection'],
                                                        ['url' => 'waste-oil-recycling-professional.php', 'name' => 'Waste Oil Recycling'],
                                                        ['url' => 'used-oil-disposal-professional.php', 'name' => 'Used Oil Disposal'],
                                                        ['url' => 'used-oil-recycler-professional.php', 'name' => 'Used Oil Recycling'],
                                                        ['url' => 'used-transformer-oil-recycling-professional.php', 'name' => 'Used Transformer oil recycling'],
                                                        ['url' => 'used-hydraulic-oil-professional.php', 'name' => 'Used Hydraulic Oil'],
                                                        ['url' => 'spent-oil-professional.php', 'name' => 'Spent Oil'],
                                                        ['url' => 'hazardous-waste-transport-professional.php', 'name' => 'Hazardous Waste Transport'],
                                                        ['url' => 'hazardous-waste-disposal-for-ships-professional.php', 'name' => 'Hazardous Waste Disposal for Ships'],
                                                        ['url' => 'industrial-waste-management-professional.php', 'name' => 'Industrial Waste Management']
                                                    ];
                                                }
                                                foreach ($services_list as $s_item) {
                                                ?>
                                                    <li><a href="<?php echo $s_item['url']; ?>"><?php echo htmlspecialchars($s_item['name']); ?></a></li>
                                                <?php } ?>
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
                                <a style="height: 100px;" href="index.php"><img style="height: 45%;" src="img/logo/logo.png" alt="Green Way Industries" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>

                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About us</a></li>

                                    <li><a class="pagess" href="#">Our Services</a>
                                        <ul>
                                            <?php
                                            foreach ($services_list as $s_item) {
                                            ?>
                                                <li><a href="<?php echo $s_item['url']; ?>"><?php echo htmlspecialchars($s_item['name']); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="certifications.php">Our Certifications</a></li>
                                    <li><a href="our-industries.php">Our Industries</a></li>
                                    <li><a href="our-products.php">Our Products</a></li>
                                    <li><a href="our-gallery.php">Our Gallery</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
    </header>