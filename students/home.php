<?php 
include "../setting/config.php";
 session_start();
if(!$_SESSION['st_user'])
{
	
	header("location:index.php");
}
else
{
	$st_username = $_SESSION['st_user'];
	$st_name = $ravi->student_info_select($st_username);
	
	$student_name_display = $st_name->fetch_assoc();
}


?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Öğrenci</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style_1.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/light.js"></script>
	<script src="js/radar.js"></script>
	<link href="css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>

	<script src="js/jquery.easydropdown.js"></script>

	<!--//skycons-icons-->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
				<div class="outter-wp">
					<!--/tabs-->
					<div class="tab-main">
						<!--/tabs-inner-->
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">Merhaba,
									<?php echo ucfirst($student_name_display['st_fullname']); ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Bilgiler</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Şifre değiştirme</span></a></li>
											<li><a href="#section-3" class="icon-food"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>öğretmenler</span></a></li>
											<li><a href="#section-4" class="icon-lab"><i class="fa fa-flask"></i> <span>Dersler</span></a></li>
											<li><a href="#section-5" class="icon-truck"> <span>Sonuçlar</span></a></li>
										</ul>
									</nav>
								</div>
								<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Kişisel bilgileri</strong>
												<p> <strong>Merhaba</strong>,
													<?php echo ucfirst($student_name_display['st_fullname']); ?>
												</p>
												<p><strong>standart: </strong>
													<?php echo ucfirst($student_name_display['st_grade']); ?>
												</p>
												<p><strong>Roll Numarası: </strong>
													<?php echo ucfirst($student_name_display['roll_no']); ?>
												</p>
												<p><strong>Cinsiyet: </strong>
													<?php echo ucfirst($student_name_display['st_gender']); ?>
												</p>
												<p> <strong>Doğum tarihi:</strong>
													<?php echo ucfirst($student_name_display['st_dob']); ?>
												</p>

											</div>
											<div class="mediabox">
												<strong>İletişim detayları</strong>

												<p> <strong>Adres:</strong>
													<?php echo ucfirst($student_name_display['st_address']); ?>
												</p>
												<p> <strong>Semt:</strong>
													<?php echo ucfirst($student_name_display['st_district']); ?>
												</p>
												<p> <strong>Kullanıcı adı:</strong>
													<?php echo ucfirst($student_name_display['st_username']); ?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Ebeveyn Detayı</strong>
												<p><strong>Baba adı: </strong>
													<?php echo ucfirst($student_name_display['st_father']); ?>
												</p>
												<p><strong>Anne adı: </strong>
													<?php echo ucfirst($student_name_display['st_mother']); ?>
												</p>
												<p><strong>Ebeveynler İletişim: </strong>
													<?php echo ucfirst($student_name_display['st_parents_contact']); ?>
												</p>
											</div>
										</section>
								<section id="section-2">
										
											
										<div class="col-md-12">
											<?php 
											if(isset($_POST['change_password']))
											{
												
												$prev_password = $student_name_display['st_password'];
												$old_password = $_POST['old_password'];
												
												if($prev_password!=$old_password)
												{ 
													echo "<script>alert('Old Password Does not Matched');</script>";	
												}
												else
												{
													$st_username = $student_name_display['st_username'];
												$st_password_update = $_POST['new_password'];
													$update_success = $ravi->student_password_change($st_password_update,$st_username);
													print_r($update_success);
												
												if($update_success==true)
												{
												echo "<script>window.location = 'home.php?success';</script>";
												}
													else
													{
														echo "<script>alert('cant update password');</script>";
													}
												}
												
											}
									
											?>
											<form method="post">
											<div class="input-group input-icon">
												<span class="input-group-addon">
											<i class="fa fa-key"></i>	</span>
												<input type="password" class="form-control1 icon" name="old_password" placeholder="eski Şifre">
												
											</div>
											<div class="input-group input-icon">
												<span class="input-group-addon">
											<i class="fa fa-key"></i>	</span>
												<input type="password" class="form-control1 icon" placeholder="Yeni Şifre" name="new_password">
												
											</div>	
									
												<input type="submit" name="change_password" class="a_demo_four" value="Şifre Güncelle">
												</form>
										</div>
									</section>
									<section id="section-3">
												<div class="graph">
															<div class="tables">
															
																<table class="table table-hover"> 
																	<thead>
																		<tr> 
																			<th>#</th> 
																			<th>Telefon</th> 
																			<th>Öğretmen adı</th> 
																			<th>Ders</th>
																			<th>Email</th> 
																			<th>Zaman</th>
																		</tr> 
																	</thead> 
																	<tbody>
															<?php 
															$st_grade = $student_name_display['st_grade'];
															$sn = 1;
															$teacher_info_in_student = $ravi->teacher_info_instudent($st_grade);
																while($t_info = $teacher_info_in_student->fetch_assoc())		{ 
																		?>
																		
																		<tr>
																			<th scope="row"><?php echo $sn; ?></th>
																			<td></td>
																			<td><?php echo ucwords($t_info['t_fullname']); ?></td> 
																			<td><?php echo ucwords($t_info['subject_name']); ?></td> 
																			<td><?php echo strtolower($t_info['t_email']); ?></td> 
																			<td><?php echo $t_info['time']; ?></td>
																		</tr> 
																		<?php $sn++; } ?>
																	</tbody> 
																</table>
															</div>
												
													</div>
											
										
										</section>
										<section id="section-4">
											<div class="graph">
											<div class="tables">
															
																<table class="table table-hover"> 
																	<thead>
																		<tr> 
																			<th>#</th> 
																	 
																			<th>öğretmen adı</th> 
																			<th>Ders adı</th>
																			
																		</tr> 
																	</thead> 
																	<tbody>
															<?php 
															$st_grade = $student_name_display['st_grade'];
															$sn = 1;
															$teacher_info_in_student = $ravi->teacher_info_instudent($st_grade);
																while($t_info = $teacher_info_in_student->fetch_assoc())		{ 
																		?>
																		
																		<tr>
																			<th scope="row"><?php echo $sn; ?></th>
																		
																			<td><?php echo ucwords($t_info['t_fullname']); ?></td> 
																			<td><?php echo ucwords($t_info['subject_name']); ?></td> 
																			
																		</tr> 
																		<?php $sn++; } ?>
																	</tbody> 
																</table>
															</div>
											</div>
										</section>
										<section id="section-5">
											<div class="mediabox">

											</div>
											<div class="mediabox">

											</div>
											<div class="mediabox">

											</div>
										</section>
									</div>
									<!-- /content -->
								</div>
								<!-- /tabs -->

							</div>
							<script src="js/cbpFWTabs.js"></script>
							<script>
								new CBPFWTabs(document.getElementById('tabs'));
							</script>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//tabs-inner-->


					<!--custom-widgets-->
					<div class="custom-widgets">
						<div class="row-one">
							<div class="col-md-3 widget">
								<div class="stats-left ">
									<h4>Kullanıcı</h4>
									<h5>Sayısı</h5>
								</div>
								<div class="stats-right">
									<label>92</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-mdl">
								<div class="stats-left">
									<h4>Ziyaretçi</h4>
									<h5>Sayısı</h5>
								</div>
								<div class="stats-right">
									<label> 85</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-thrd">
								<div class="stats-left">
									<h4>Test</h4>
									<h5>Sayısı</h5>
								</div>
								<div class="stats-right">
									<label>51</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-last">
								<div class="stats-left">
									<h4>duyuru</h4>
									<h5>Sayısı</h5>
								</div>
								<div class="stats-right">
									<label>14</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//custom-widgets-->

					<!--/charts-->
					<div class="charts">
						<div class="chrt-inner">
							<!--//weather-charts-->
							<div class="graph-visualization">
								<div class="col-md-6 map-1">
									<h3 class="sub-tittle">Profil </h3>


								</div>
								<div class="col-md-6 map-2">
									<div class="profile-nav alt">
										<section class="panel">
											<div class="user-heading alt clock-row terques-bg">
												<h3 class="sub-tittle clock">Saat </h3>
											</div>
											<ul id="clock">
												<li id="sec"></li>
												<li id="hour"></li>
												<li id="min"></li>
											</ul>



										</section>

									</div>
								</div>
								<div class="clearfix"> </div>
							</div>


						</div>
						<!--/charts-inner-->
					</div>
					<!--//outer-wp-->
				</div>
				<!--footer section start-->
				<footer>
				<a href="http://yaz.mf.firat.edu.tr/tr"><P>  SOFTWAER  && Fırat Üniversitesi Yazılım Mühendisliği  </P></a>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Software</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a href="index.html"><img src="images/admin.jpg"></a>
				<a href="index.html"><span class=" name-caret"><?php echo $student_name_display['st_fullname']; ?></span></a>
				<p>Öğrenci</p>
				<ul>
					<li><a class="tooltips" href="index.html"><span>Profil</span><i class="lnr lnr-user"></i></a></li>
					<li><a class="tooltips" href="index.html"><span>Ayarlar</span><i class="lnr lnr-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Çıkış Yap</span><i class="lnr lnr-power-switch"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

			
				

				
	
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
										
	</body>