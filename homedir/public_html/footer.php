<footer>
    <?php
	$footer1 = [
		'footer_about' => 'Green Way Industries provides waste oil collection, recycling, disposal and industrial waste management solutions for businesses across Tamil Nadu.',
		'facebook_link' => 'https://www.facebook.com/profile.php?id=61579705359815',
		'linkedin_link' => 'https://www.linkedin.com/company/green-way-industries-tnpcb-authorized-recycler/?viewAsMember=true',
		'youtube_link' => 'https://www.youtube.com/channel/UCt_oegAiIuHzagDOdyA7qSg',
		'instagram_link' => 'https://www.instagram.com/green_wayindustries/',
		'mobile' => '+91 93600 36055',
		'email' => 'info@wasteoil.in',
		'address1' => 'Suscon Builder, 53rd Street, Ashok Nagar, Chennai, Tamil Nadu – 600083',
		'address2' => 'Plot No: 101, 102, 103 &amp; 104, Sidco Industrial Estate, Venmaniathur &amp; Pattanam Village, Tindivanam Taluk &amp; Villupuram District Pin: 604207'
	];
	if (!empty($con)) {
		$footer = @mysqli_query($con, "select * from `settings` where `id`!='' ");
		if ($footer && $row = mysqli_fetch_array($footer)) {
			$footer1 = $row;
		}
	}
	?>
        <div style="background: #fff7ea;" class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                   <a href="index.php"><img style="max-width: 70%;" src="img/logo/logo2.png" alt="Green Way Industries"></a>
                                </div>
                                <p>
                                    <?php echo $footer1['footer_about'];?>
                                </p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($footer1['facebook_link']);?>">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($footer1['linkedin_link']);?>">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($footer1['youtube_link']);?>">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?php echo htmlspecialchars($footer1['instagram_link']);?>">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Quick Link</h4>
                                <div class="footer-services-link">
                                    <ul class="footer-list">

                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="our-industries.php">Our Industries</a></li>
                                        <li><a href="our-products.php">Our Products</a></li>
                                        <li><a href="our-gallery.php">Our Gallery</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>OUR SERVICES</h4>
                                <div class="footer-services-link">
                                    <ul class="footer-list">
                                        <?php
                                        $footer_services = [];
                                        if (!empty($con)) {
                                            $service_footer = @mysqli_query($con, "select * from `service` where `id`!='' and `status`='Active' order by `order` asc");
                                            if ($service_footer) {
                                                while($service_footer_row = mysqli_fetch_array($service_footer)) {
                                                    $footer_services[] = ['url' => 'services.php?s_id=' . $service_footer_row['id'], 'name' => $service_footer_row['name']];
                                                }
                                            }
                                        }
                                        if (empty($footer_services)) {
                                            $footer_services = [
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
                                        foreach ($footer_services as $f_item) {
                                        ?>
                                            <li><a href="<?php echo $f_item['url']; ?>"><?php echo htmlspecialchars($f_item['name']); ?></a></li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content last-item">
                            <div class="footer-head">
                                <h4>Contact Us</h4>
                                <p>
                                    <b>Phone:</b> <?php echo htmlspecialchars($footer1['mobile']);?> <br>
                                    <b>Email:</b> <?php echo htmlspecialchars($footer1['email']);?> <br>
                                    <b>Corporate Office:</b> <?php echo $footer1['address1'];?> <br>
                                    <b>Factory Address:</b> <?php echo $footer1['address2'];?>
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                </div>
            </div>
        </div>
        <!-- End footer area -->
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>
                                Copyright © <?php echo date('Y'); ?>
                                <a style="color: #fff;" href="index.php">Green Way Industries</a>. All Rights Reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>