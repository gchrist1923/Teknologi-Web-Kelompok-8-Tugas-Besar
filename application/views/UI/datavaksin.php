<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Vaksinasi COVID-19</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets2/') ?>images/favicon.ico"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets2/') ?>css/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>
    <body id="page-top">
        
		<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="<?= base_url('assets2/') ?>images/img/logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
						<li class="nav-item"><a class="nav-link" href="#landing">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#jadwal">Status</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">About Us</a></li>   
                    </ul>
                </div>
            </div>
        </nav>
		
        <!-- Masthead-->
        <header class="masthead" id="landing"> 
            <div class="container">
                <div class="masthead-subheading">Selamat datang  masyarakat Indonesia!</div>
                <div class="masthead-heading text-uppercase">Sistem Informasi Vaksinasi COVID-19</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#informasi">Lebih lanjut</a>
            </div>
        </header>
		
        <!-- JADWAL-->
        <section class="page-section bg-light" id="jadwal">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CHECK STATUS VAKSINASI</h2>
                    <h3 class="section-subheading text-muted">Jadwal Vaksinasi COVID-19 masyarakat indonesia</h3>
                </div>
				<form action="<?= site_url(''); ?>">
					<div class="text-center">
						<div class="col-md-4.text-center">
                            <hr size="3px" width="100%">
							<h4 class="my-3">Nama Lengkap</h4>
                            <h3 class="my-3"><?php echo $nama_vak;?></h3>
                            <hr size="3px" width="100%">
						</div>
						<div class="col-md-4.text-center">
                            <hr size="3px" width="100%">
							<h4 class="my-3">NIK</h4>
                            <h3 class="my-3"><?php echo $nik_vak;?></h3>
                            <hr size="3px" width="100%">
						</div>
						<div class="col-md-4.text-center">
                            <hr size="3px" width="100%">
							<h4 class="my-3">Tempat Vaksin</h4>
                            <h3 class="my-3"><?php echo $lokasi_vak;?></h3>
                            <hr size="3px" width="100%">
						</div>
						<div class="col-md-4.text-center">
							<hr size="3px" width="100%">
                            <h4 class="my-3">Status Vaksin 1</h4>
                            <h3 class="my-3"><?php echo $status_vak1;?></h3>
                            <hr size="3px" width="100%">
						</div>
                        <div class="col-md-4.text-center">
                            <hr size="3px" width="100%">
                            <h4 class="my-3">Status Vaksin 2</h4>
                            <h3 class="my-3"><?php echo $status_vak2;?></h3>
                            <hr size="3px" width="100%">
                        </div>
					</div>
					<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" name="checkjadwal" id="submitButton" type="submit">KEMBALI</button></div>
            </div>
        </section>
		
        <hr size="3px" width="100%">
				
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Kelompok 8 Teknologi Web</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= base_url('assets2/') ?>images/img/team/1.jpg" alt="..." />
                            <h4>Grace Christian</h4>
                            <p class="text-muted">3411171172</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= base_url('assets2/') ?>images/img/team/2.jpg" alt="..." />
                            <h4>Rafi Aziizi Muchtar</h4>
                            <p class="text-muted">3411181123</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= base_url('assets2/') ?>images/img/team/3.jpg" alt="..." />
                            <h4>Ahmad Solihin</h4>
                            <p class="text-muted">3411171126</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Kelompok 8 Tugas Besar Teknologi Web</p></div>
                </div>
            </div>
        </section>
		
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Kelompok 8 Vaksinasi COVID-19</div> 
                </div>
            </div>
        </footer>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('assets2/') ?>js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
