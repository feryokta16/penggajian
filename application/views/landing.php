<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1">
	<title>CO Garasitrift</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<style>
		*{
	padding: 0;
	margin: 0;
	font-family: sans-serif;
}
a{
	color: inherit;
	text-decoration: none;
}
a.tbl-biru{
	background: #3f72af;
	border-radius: 20px;
	padding: 15px 20px 15px 20px;
	color: #fffff;
	cursor: pointer;
	font-weight: bol
}
.medsos{
	padding:5px 0;
	background-color: #148f77; 
}
.medsos ul li{
	display: inline-block;
	color: #fff;
	margin-right: 10px;
}
.container{
	width:80%;
	margin: 0 auto;
}
.container:after{
content: '';
display: block;
clear: both;
}
header{
	position: sticky;
	position: -webkit-sticky;
}
header h1{ 
	float : left;
	padding: 15px 0;
	color : #148f77;
}
header ul{
	float: right;
}
header ul li{
	display:  inline-block;
}
header ul li a {
	padding: 25px 20px;
	display: inline-block;
}
header ul li a:hover{
	background-color: #148f77;
	color: #fff;
}
.active{
	background-color: #148f77;
	color: #fff;
}
.banner{
	height: 60vh;
	background-image: url('../penggajian/assets/img/c.jpg');
	background-size: cover;
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
}
.banner:after {
	content: '';
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color:  rgba(239, 249, 245 .6);
}
.banner h2{
	color: #fff;
	z-index: 1;
	padding: 20px 25px;
	border: 3px solid #fff;
}
section{
	padding: 50px 0;
}
section h3{
	text-align: center;
	padding: 20px;
	color: #148f77;
	margin-bottom: 25px;
}
.about{
	padding-bottom: 100px;
}
.about p{
	color: #666;
	word-spacing: 2px;
	line-height: 25px;
}
.service{
	background-color: #f9f9f9;	
}
.box{
	color: #148f77;
}
.box:after{
	content:'';
	display: block;
	clear: both;
}
.box .col-4{
	width: 25%;
	padding: 20px;
	box-sizing: border-box;
	text-align: center;
	float: left;
}
.icon{
	width: 70px;
	height: 70px;
	border: 1px solid;
	border-radius: 50%;
	text-align: center;
	line-height: 70px;
	font-size: 20px;
	margin: 0 auto;
}
.box .col-4 h4{
	margin: 20px 0;
}
footer{
	padding: 30px 0;
	color: #FFF;
	background-color: #333;
	text-align: center;

}
@keyframes puterin{
	100%{
		transform: rotate(360deg);
	}
}
@media screen and(max-width: 768px){
	.container{
		width: 90%;
	}
	header h1{
		text-align: center;
		float: none;
	}
	header ul{
		text-align: center;
		float: none;
	}
	.box .col-4{
		width: 100%;
		float: none;
		margin-bottom: 20px;
	}

}

	</style>

</head>
<body>
<!----<div class="medsos">
	<div class="container">
		<ul>
			<li><a href="https://www.instagram.com/vinaaaa_p/"></a><i class="fab fa-instagram"></i></li>
			<li><a href="#"></a><i class="fab fa-facebook"></i></li>
		</ul>
	</div>
</div> -->
	<header>
			<div class="container">
			<h1><a href="index.html"></a>CV Garasitrift</h1>
			<ul>
				<li class="active"><a href="#home">Home</a></li>
				<li><a href="#about">About us</a></li>
				<li><a href="#service">Service</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="<?php echo base_url('login')?>" class="tbl-biru">Login</a></li>
			</ul>
		</div>
	</header>	
	<section class="banner">
		<h2>Aplikasi Penggajian </h2>
	</section>
	<section class="about" id="about">
		<div class="container">
			<h3>ABOUT US</h3>
			<p align="center">CV GarasiTrift merupakan usaha bisnis yang menjual pakaian wanita, pria dan anak – anak secara lengkap  mulai dari baju, celana, rok dan jeans. Bisnis ini mengambil gaya fashion Korean style dan Jepang style jadi untuk model bajunya kebanyakan bergaya korea dan jepang, namun karena ini bisnis trift jangan diragukan lagi untuk kualitasnya dijamin sangat bagus, kualitas tinggi harga terjangkau bagi kalangan masyarakat. Tempat usaha nya memiliki satu bangunan sederhana yang bersebelahan dengan coffe shop dan tersedia juga tempat parkir. </p>
		</div>
	</section>
	<section class="service" id="service">
		<div class="container">
			<h3>Service</h3>
			<div class="box">
				<div class="col-4">
					<div class="icon"><i class="fas fa-fw fa-money-check-alt"></i></div>
					<h4> Gaji Pegawai </h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-fw fa-copy"></i></div>
					<h4> Data Pegawai </h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fa fa-fw fa-database"></i></div>
					<h4> Data Absensi </h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-fw fa-copy"></i></div>
					<h4>Slip Gaji </h4>
				</div>
			</div>
		</div>
	</section>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6010867311293!2d106.80279557589502!3d-6.5719250642460425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c43b50862eb9%3A0xbf090dc84766f7b6!2sGg.%20Bina%20Satwa%20No.9%2C%20RW.03%2C%20Tanah%20Sareal%2C%20Kec.%20Tanah%20Sereal%2C%20Kota%20Bogor%2C%20Jawa%20Barat%2016161!5e0!3m2!1sen!2sid!4v1682929909574!5m2!1sen!2sid" width="600" height="450" style="border:0; width: 100%; height:450;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	<section class="contact" id="contact">
		<div class="container">
			<h3>Contact</h3>
			<div class="box">
				<div class="col-4">
					<h4> ADRESSS </h4>
					<p>Gg. Bina Satwa No.9A, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161</p>
				</div>	
				<div class="col-4">
					<h4> EMAIL </h4>
					<p>resvina.p@gmail.com</p>
				</div>	
				<div class="col-4">
					<h4> TELP </h4>
					<p>02112398978</p>
				</div>	
				<div class="col-4">
					<h4> HP </h4>
					<p>08212121212</p>
				</div>	
					
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<small>Copyright 2020 - CO GARASI TRIFT</small>
		</div>
	</footer>
</body>
</html>