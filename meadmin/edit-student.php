<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="index.html">Ana Sayfa</a></li>
			<li class="active">
				<?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo strtoupper($_GET['ravi']); ?>
		</h2>

	
			<div class="tables">


				<table class="table table-bordered ">

					<thead>
						<tr>
							<th>#</th>
							<th>telefon</th>
							<th>Adı</th>
							<th>Adres</th>
							<th>Email</th>
							<th>Soyad</th>
							<th>Pass</th>
							<th>babab</th>
							<th>anne</th>
							<th>Doğum Tarihi</th>
							<th>VAsıf</th>
							<th>İletişim</th>
							<th>Cinsiyet</th>
							<th>Aksiyon</th>
						</tr>
					</thead>
					<tbody>

						<?php $teacher_dis_admin = $ravi->teacher_info_display_admin();
													$t_sn = 1;
													while($teacher_info_admin =$teacher_dis_admin->fetch_assoc())					{
														
													
																		?>


						<tr>
							<th scope="row">
								<?php echo $t_sn; ?>
							</th>
							<th></th>
							<td>
								<?php echo $teacher_info_admin['t_fullname']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_address']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_email']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_username']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_pass']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_father']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_mother']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_dob']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_qualification']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_contact']; ?>
							</td>
							<td>
								<?php echo $teacher_info_admin['t_gender']; ?>
							</td>
							<td>
								
				<a href="home.php?ravi=teacher-editnow&teacherid=<?php echo $teacher_info_admin['t_id']; ?>" class="btn red">Düzenle</a>
					</td>
						</tr>
						<?php $t_sn++; } ?>
					</tbody>

				</table>

			</div>
		</div>


	</div>
	<!--//graph-visual-->

