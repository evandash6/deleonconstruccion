<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?=base_url()?>frontend/images/favicon.png">
	
	<link rel="stylesheet" href="<?=base_url()?>frontend/fonts/stylesheet.css">
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/swiper-bundle.min.css">
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/magnific-popup.min.css">
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/animate.min.css">
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/jquery.dataTables.min.css">
	<script src="<?=base_url()?>frontend/js/sweetalert211.js"></script>
    <script src="<?=base_url()?>frontend/js/jquery-3.7.0.min.js"></script>
	<script src="<?=base_url()?>frontend/js/jquery.dataTables.min.js"></script>
	<!--<link rel="stylesheet" href="<?=base_url()?>frontend/css/all.min.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	<title>De León | Construcción</title>
</head>

<body>
<!--/**
Modal de directorio de registro
*/
--->
	<div class="modal-form mfp-hide mfp-with-anim" id="modal-directorio">

		<div class="modal-form-head">
			<div class="modal-form-logo">
				<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction">-->
				<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construction">
			</div>
			<div class="modal-form-close">
				<img src="<?=base_url()?>frontend/images/close.svg" alt="Close">
			</div>
		</div>

		<div class="modal-form-body">
			<!--<div class="modal-form-title">Formulario</div>-->
			<form id="form-directorio">
				<p><label>Estado:</label>
				<select name="cve_ent" id="id_estado" required>
					<option value="">Estado..</option>
					<?php 
					foreach($tb_estado as $estado){
					?>
						<option value="<?=$estado->cve_ent?>"><?=$estado->nom_ent?></option>
					<?php
					}
					?>	
				</select></p>
								
				<p><label>Municipio:</label>
				<select name="id_municipio" id='c_municipio' required>
					<option value="">Municipio..</option>
				</select></p>
				<p><label>Oficio:</label>
				<select name="id_oficio" id='c_oficio' required>
					<option value="">Oficio..</option>
					<?php 
					foreach($c_oficio as $oficio){
					?>
						<option value="<?=$oficio->id?>"><?=$oficio->oficio?></option>
					<?php
					}
					?>	
				</select></p>
				<label>Nombre empresa:</label>
				<input type="text" name="nombre_empresa" required>
				<label>Nombre:</label>
				<input type="text" name="nombre" required>
				<label>Teléfono:</label>
				<input type="text" name="telefono" required>
				<label>Correo:</label>
				<input type="email" name="correo" required>
				<label>Dirección:</label>
				<input type="text" name="direccion" required>
				<label>imagen 1:</label>
				<input type="file" name="foto1" value=""  accept="image/*" required/>
				<label>imagen 2:</label>
				<input type="file" name="foto2" value=""  accept="image/*" required/>
				<label>Descripción de la empresa:</label>
				<textarea cols="48" name="descripcion_empresa" rows="5"></textarea>
				<button id="btn-directorio" class="form-button">Enviar</button>
			</form>
		</div>

	</div>

	

	<div class="modal-form mfp-hide mfp-with-anim" id="modal-form">

		<div class="modal-form-head">
			<div class="modal-form-logo">
				<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction">-->
				<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construction">
			</div>
			<div class="modal-form-close">
				<img src="<?=base_url()?>frontend/images/close.svg" alt="Close">
			</div>
		</div>

		<div class="modal-form-body">
			<div class="modal-form-title">Solicitar una llamada</div>
			<form id="form-llamada">
				<input type="text" name="nombre" id="llamada_nom" placeholder="Nombre*" required>
				<input type="text" name="telefono" id="llamada_tel" placeholder="Teléfono*" required>
				<button id="btn-llamada" class="form-button">Enviar</button>
				<input type="text" name="id_c_servicio" id="id_c_servicio" value="1" required>
			</form>
		</div>

	</div>

	<div class="modal-form mfp-hide mfp-with-anim" id="modal-form2">

		<div class="modal-form-head">
			<div class="modal-form-logo">
				<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction">-->
				<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construction">
			</div>
			<div class="modal-form-close">
				<img src="<?=base_url()?>frontend/images/close.svg" alt="Close">
			</div>
		</div>

		<div class="modal-form-body">
			<div class="modal-form-title">Solicitar una llamada</div>
			<form id="form-llamada2">
				<input type="text" name="nombre" id="llamada_nom" placeholder="Nombre*" required>
				<input type="text" name="telefono" id="llamada_tel" placeholder="Teléfono*" required>
				<button id="btn-llamada2" class="form-button">Enviar</button>
				<input type="text" name="id_c_servicio" value="2" required>
			</form>
		</div>

	</div>

	<div class="modal-form mfp-hide mfp-with-anim" id="modal-form3">

		<div class="modal-form-head">
			<div class="modal-form-logo">
				<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction">-->
				<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construction">
			</div>
			<div class="modal-form-close">
				<img src="<?=base_url()?>frontend/images/close.svg" alt="Close">
			</div>
		</div>

		<div class="modal-form-body">
			<div class="modal-form-title">Solicitar una llamada</div>
			<form id="form-llamada3">
				<input type="text" name="nombre" id="llamada_nom" placeholder="Nombre*" required>
				<input type="text" name="telefono" id="llamada_tel" placeholder="Teléfono*" required>
				<button id="btn-llamada3" class="form-button">Enviar</button>
				<input type="hidden" name="id_c_servicio" value="3" required>
			</form>
		</div>

	</div>

	<div class="go-up">
		<a href="#">
			<img src="<?=base_url()?>frontend/images/arrow-up.svg" alt="Go up">
		</a>
	</div>
	
	<header class="site-header">

		<div class="header-top">
			<div class="container">
				<div class="header-row">

					<!-- Header top mobile START -->
					<div class="header-mobile-logo">
						<a href="#">
							<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction" title="Construcción">-->
							<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construction">
						</a>
					</div>

					<div class="hamburger">
						<span></span>
						<span></span>
					</div>
					<!-- Header top mobile END -->

					<div class="header-desc">Trabajos de construcción de todo tipo</div>
					<div class="header-right">
						<!--<div class="header-info">
							<img src="<?=base_url()?>frontend/images/location.svg" alt="ул. Гагарина 5Б г. Сочи">
							<span>Greenbe street 5B, Latvia</span>
						</div>-->
						<a href="tel:79504575654" class="header-info">
							<img src="<?=base_url()?>frontend/images/phone.svg" alt="+52 33 3025 2158">
							<span>+52 33 3025 2158</span>
						</a>

						<!--<div class="header-social">
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-twitter.svg" alt="Twitter">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-vk.svg" alt="Вконтакте">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-facebook.svg" alt="Facebook">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-telegram.svg" alt="Telegram">
							</a>
						</div>-->
					</div>
				</div>
			</div>
		</div>

		<div class="header-bottom">
			<div class="container">
				<div class="header-bottom-row">
					<div class="header-logo">
						<a href="#">
							<!--<img src="<?=base_url()?>frontend/images/logo-header.svg" alt="Construction">-->
							<img src="<?=base_url()?>frontend/images/deleon-construccion.png" alt="Construcción">
						</a>
					</div>

					<nav class="header-nav">
						<ul>
							<li><a class="anchor-link" href="#s-about">Nosotros</a></li>
							<li><a class="anchor-link" href="#s-services">Servicios</a></li>
							<li><a class="anchor-link" href="#s-gallery">Galería</a></li>
							<li><a class="anchor-link" href="#s-team">Directorio</a></li>
							<li><a class="anchor-link" href="#s-busqueda">Busqueda</a></li>
							<li><a class="anchor-link" href="#s-contact">Contacto</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<!-- Header mobile START -->
		<div class="header-mobile-wrap">
			<nav class="header-mobile-nav">
				<ul>
					<li><a class="anchor-link" href="#s-about">Nosotros</a></li>
					<li><a class="anchor-link" href="#s-services">Servicios</a></li>
					<li><a class="anchor-link" href="#s-gallery">Galería</a></li>
					<!--<li><a class="anchor-link" href="#s-team">Our team</a></li>
					<li><a class="anchor-link" href="#s-testimonials">Testimonials</a></li>-->
					<li><a class="anchor-link" href="#s-contact">Contacto</a></li>
				</ul>
			</nav>

			<div class="header-mobile-info">
				<img src="<?=base_url()?>frontend/images/location.svg" alt="ул. Гагарина 5Б г. Сочи">
				<span>Greenbe street 5B, Latvia</span>
			</div>
			<a href="tel:79504575654" class="header-mobile-info">
				<img src="<?=base_url()?>frontend/images/phone.svg" alt="+7 950 457 5654">
				<span>+7 950 457 5654</span>
			</a>

			<div class="header-mobile-social">
				<a href="#">
					<img src="<?=base_url()?>frontend/images/social-twitter.svg" alt="Twitter">
				</a>
				<a href="#">
					<img src="<?=base_url()?>frontend/images/social-vk.svg" alt="Вконтакте">
				</a>
				<a href="#">
					<img src="<?=base_url()?>frontend/images/social-facebook.svg" alt="Facebook">
				</a>
				<a href="#">
					<img src="<?=base_url()?>frontend/images/social-telegram.svg" alt="Telegram">
				</a>
			</div>
		</div>
		<!-- Header mobile END -->

	</header>


	<section class="s-banner">
		
		<div class="swiper banner-swiper">
			
			<div class="swiper-wrapper">
				<!--<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/banner-bg-1.jpg)">-->
				<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/galeria/carrucel/img3.jpg)">
					<div class="banner-content">
						<div class="banner-subtitle wow fadeIn" data-wow-delay="0.1s">Personal comprometido</div>
						<h2 class="banner-title wow fadeIn" data-wow-delay="0.2s"><strong>Personal</strong> comprometido al cuidado de cada detalle</h2>
						<a href="#s-services" class="banner-btn def-btn anchor-link wow fadeIn" data-wow-delay="0.3s">Ver Servicios</a>
					</div>
				</div>
				<!--<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/banner-bg-2.jpg)">-->
				<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/galeria/carrucel/img2.jpg)">
					<div class="banner-content">
						<div class="banner-subtitle wow fadeIn">Personal comprometido</div>
						<h2 class="banner-title"><strong>Servicio y mantenimiento</strong> de interiores y exteriores</h2>
						<a href="#s-services" class="banner-btn def-btn anchor-link">Ver Servicios</a>
					</div>
				</div>
				<!--<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/banner-bg-3.jpg)">-->
				<div class="swiper-slide" style="background-image: url(<?=base_url()?>frontend/images/galeria/carrucel/img1.jfif)">
					<div class="banner-content">
						<div class="banner-subtitle">Personal comprometido</div>
						<h2 class="banner-title"><strong>Construcción de casas</strong> Construiremos una casa de calidad</h2>
						<a href="#s-services" class="banner-btn def-btn anchor-link">Ver servicios</a>
					</div>
				</div>
			</div>

			<div class="swiper-pagination wow fadeInUp" data-wow-delay="0.5s"></div>
			
			<div class="container">
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		
		</div>

	</section>

	<section class="s-about" id="s-about">
		<div class="container">

			<div class="about-row">
				<div class="about-left">
					<h2 class="def-title wow fadeInLeft" data-wow-delay="0.2s">Nosotros</h2>
					<div class="def-desc wow fadeInLeft" data-wow-delay="0.3s">
						Somos personas comprometidas en temas de construcción, trabajamos profesionalmente desde el inicio del proyecto en papel hasta la implementación en el lugar, al colaborar con nosotros puedes tener la confianza y seguridad de que nos encargaremos de realizar cada pensamiento e ideas para darles vida en cada espacio y etapas del proyecto.
					</div>
					<a href="#s-services" class="def-btn anchor-link wow fadeInLeft" data-wow-delay="0.4s">Otros servicios</a>
				</div>
	
				<div class="about-right">
					<img src="<?=base_url()?>frontend/images/galeria/techos/img3.jpeg" alt="О нас" class="wow fadeIn" data-wow-delay="0.5s">
				</div>
			</div>

		</div>
	</section>


	<!--<section class="s-numbers">
		<div class="container">
			<div class="numbers-row num-scroll">

				<div class="numbers-left">
					<h2 class="def-title color-white wow fadeInLeft" data-wow-delay="0.2s">Our company <br> in numbers</h2>
					<div class="def-desc wow fadeInLeft" data-wow-delay="0.3s">
						One important criterion of our company is customer orientation. When ordering our services, you can be sure of the quality of the result.
					</div>
				</div>

				<div class="numbers-right">
					<div class="numbers-item">
						<div class="numbers-num num-js" data-count="600">0</div>
						<div class="numbers-desc">
							Satisfied <br>
							clients
						</div>
					</div>
					<div class="numbers-item">
						<div class="numbers-num num-js" data-count="10">0</div>
						<div class="numbers-desc">
							Years of work experience
						</div>
					</div>
					<div class="numbers-item">
						<div class="numbers-num num-js" data-count="50">0</div>
						<div class="numbers-desc">
							Awards
						</div>
					</div>
					<div class="numbers-item">
						<div class="numbers-num num-js" data-count="100">0</div>
						<div class="numbers-desc">
							Realized <br>
							projects
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>-->

	<section class="s-services" id="s-services">
		<div class="container">
			<h2 class="center-title wow fadeIn" data-wow-delay="0.1s">Nuestros servicios</h2>

			<div class="services-row">

				<div class="services-item wow fadeIn" data-wow-delay="0.1s">
					<div class="services-thumb">
						<!--<img src="<?=base_url()?>frontend/images/service-1.jpg" alt="Construction of houses">-->
						<img src="<?=base_url()?>frontend/images/galeria/general/img40.jpg" alt="Construction of houses">
					</div>
					<div class="services-body">
						<h4 class="services-title">Construcción de casas</h4>
						<div class="services-desc">
						Experimente el arte de la construcción de viviendas con nuestros expertos en servicios de construcción desde inicio hasta el final del proyecto.
						</div>
						<a href="#modal-form" data-effect="mfp-zoom-in" class="def-btn services-btn">Servicio de pedidos</a>
					</div>
				</div>

				<div class="services-item wow fadeIn" data-wow-delay="0.2s">
					<div class="services-thumb">
						<img src="<?=base_url()?>frontend/images/service-2.jpg" alt="Ремонт по дому">
					</div>
					<div class="services-body">
						<h4 class="services-title">Reparación de viviendas</h4>
						<div class="services-desc">
						Eleve su espacio vital con nuestros servicios de manteminiento de viviendas de primer nivel. Ya sea que se trate de mejoras sutiles o completas.
						</div>
						<a href="#modal-form2" data-effect="mfp-zoom-in" class="def-btn services-btn">Servicio de pedidos</a>
					</div>
				</div>

				<div class="services-item wow fadeIn" data-wow-delay="0.3s">
					<div class="services-thumb">
						<img src="<?=base_url()?>frontend/images/service-3.jpg" alt="Building design">
					</div>
					<div class="services-body">
						<h4 class="services-title">Diseños y remodelaciones</h4>
						<div class="services-desc">
						Libere el potencial del diseño innovador con nuestros servicios integrales de planificación de mejoramientos de espacios.
						</div>
						<a href="#modal-form3" data-effect="mfp-zoom-in" class="def-btn services-btn">Servicio de pedidos</a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="s-gallery" id="s-gallery">
		<div class="container">
			<h2 class="center-title wow fadeIn" data-wow-delay="0.1s">Galería de fotos</h2>

			<div class="gallery-wrap">
				<a href="<?=base_url()?>frontend/images/galeria/general/img16.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.2s">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img16.jpg" alt="Image 1">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img17.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.3s">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img17.jpg" alt="Image 2">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img18.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.4s"> 
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img18.jpg" alt="Image 3">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img26.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.5s">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img26.jpg" alt="Image 4">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img24.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.6s">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img24.jpg" alt="Image 5">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img25.jpg" class="gallery-item wow fadeIn" data-effect="mfp-zoom-in" data-wow-delay="0.6s">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img25.jpg" alt="Image 8">
				</a>

				<!--/** Ver más y ocultar*/-->
				<a href="<?=base_url()?>frontend/images/galeria/general/img21.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img21.jpg" alt="Image 6">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img20.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img20.jpg" alt="Image 7">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img27.jpg" class="gallery-item" data-effect="mfp-zoom-in"> 
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img27.jpg" alt="Image 9">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/techos/img6.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/techos/img6.jpg" alt="Image 10">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/techos/img8.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/techos/img8.jpg" alt="Image 11">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/techos/img11.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/techos/img11.jpg" alt="Image 12">
				</a>

				<a href="<?=base_url()?>frontend/images/galeria/general/img31.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img31.jpg" alt="Image 10">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img32.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img32.jpg" alt="Image 11">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img33.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img33.jpg" alt="Image 12">
				</a>

				<a href="<?=base_url()?>frontend/images/galeria/cisterna/img3.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/cisterna/img3.jpg" alt="Image 10">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/cisterna/img4.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/cisterna/img4.jpg" alt="Image 11">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/cisterna/img5.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/cisterna/img5.jpg" alt="Image 12">
				</a>

				<a href="<?=base_url()?>frontend/images/galeria/general/img34.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img34.jpg" alt="Image 10">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img35.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img35.jpg" alt="Image 11">
				</a>
				<a href="<?=base_url()?>frontend/images/galeria/general/img36.jpg" class="gallery-item" data-effect="mfp-zoom-in">
					<span class="gallery-border"></span>
					<img src="<?=base_url()?>frontend/images/galeria/general/img36.jpg" alt="Image 12">
				</a>
			</div>

			<div class="gallery-btn">
				<a href="#" class="def-btn wow fadeInUp" data-wow-delay="0.2s">Ver más</a>
			</div>
			
		</div>
	</section>

	<section class="s-why" id="s-why">
		<div class="container">
			<div class="why-row">

				<div class="why-left">
					<h2 class="def-title wow fadeInLeft" data-wow-delay="0.1s">¿Por qué nosotros?</h2>
					<div class="def-desc wow fadeInLeft" data-wow-delay="0.2s">
						Somos personas responsables. <br> Culminamos tus proyectos en tiempo real, brindandote los mejores acabados y calidad en construcción.
					</div>
	
					<div class="why-features">
	
						<div class="why-features-item">
							<div class="why-features-icon wow fadeInLeft" data-wow-delay="0.3s">
								<img src="<?=base_url()?>frontend/images/check-mark.svg" alt="Check mark">
							</div>
	
							<div class="why-features-right">
								<div class="why-features-title wow fadeInRight" data-wow-delay="0.4s">Calidad de trabajo</div>
								<div class="why-features-desc wow fadeInRight" data-wow-delay="0.5s">
									Durante 5 años de trabajo, hemos desarrollado diferentes tipos de trabajos en contrucción y todo tipo de acabados en obras
								</div>
							</div>
						</div>
	
						<div class="why-features-item">
							<div class="why-features-icon wow fadeInLeft" data-wow-delay="0.3s">
								<img src="<?=base_url()?>frontend/images/check-mark.svg" alt="Check mark">
							</div>
	
							<div class="why-features-right">
								<div class="why-features-title wow fadeInRight" data-wow-delay="0.4s">Construcción moderna</div>
								<div class="why-features-desc wow fadeInRight" data-wow-delay="0.5s">
								Elegir nuestro equipo de trabajo significa optar por tecnologías de vanguardia y fiabilidad. Nuestra experiencia y profesionalidad aseguran la construcción.
								</div>
							</div>
						</div>
	
					</div>
				</div>

				<div class="why-right">
					<!--<img src="<?=base_url()?>frontend/images/why-bg.jpg" alt="Почему мы?" class="wow fadeIn" data-wow-delay="0.6s">-->
					<img src="<?=base_url()?>frontend/images/galeria/techos/img4.jpeg" alt="¿Por qué nosotros?" class="wow fadeIn" data-wow-delay="0.6s">
					<!--<video src="<?=base_url()?>frontend/videos/video1.mp4" autoplay  controls></video>-->
				</div>
				
			</div>
		</div>
	</section>


	<section class="s-reviews" id="s-team" style="background-image: url('<?=base_url()?>frontend/images/reviews-bg.png');">

		<div class="container">

			<h2 class="center-title color-white wow fadeIn" data-wow-delay="0.1s">Directorio</h2>

			<center>
				<div class="form-center">
						<h2 class="def-title">¿Te gustaría que te encuentren?</h2>
						
				</div>

				
					<p align="center">
						<a href="#modal-directorio" data-effect="mfp-zoom-in" style="width: 300px;" class="def-btn services-btn">+ Registrate con nosotros</a>
					</p>
				

			</center>
			
			<!--<div class="swiper reviews-swiper">
				
				<div class="swiper-wrapper">

					<div class="swiper-slide">
						<div class="reviews-item wow fadeInUp" data-wow-delay="0.2s">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-1.jpg" alt="Konstantin Kuzmin">
							</div>

							<div class="reviews-body">
								<div class="reviews-name">Konstantin Kuzmin</div>
								<div class="reviews-profi">Founder of LIFECONST</div>
								<div class="reviews-comment">
									I was very impressed with the result that I ordered. Construction Company has fulfilled all my expectations!
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="reviews-item wow fadeInUp" data-wow-delay="0.3s">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-2.jpg" alt="Rakesh Juggernaut">
							</div>
							
							<div class="reviews-body">
								<div class="reviews-name">Rakesh Juggernaut</div>
								<div class="reviews-profi">Director of the BRUK shopping center</div>
								<div class="reviews-comment">
									Ordered design for our building. I am very pleased with the result. The company treats its customers responsibly
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="reviews-item wow fadeInUp" data-wow-delay="0.4s">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-3.jpg" alt="Zabava Lukia">
							</div>
							
							<div class="reviews-body">
								<div class="reviews-name">Zabava Lukia</div>
								<div class="reviews-profi">Commercial director of MAGNUM</div>
								<div class="reviews-comment">
									I wanted to renovate my office. Booked a home repair service. The guys took care of me from start to finish. I recommend!
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="reviews-item">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-4.jpg" alt="Kira Dorova">
							</div>
							
							<div class="reviews-body">
								<div class="reviews-name">Kira Dorova</div>
								<div class="reviews-profi">AUDITSTROY department manager</div>
								<div class="reviews-comment">
									Construction has fulfilled all my expectations. I was very impressed with the result that I ordered.
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="reviews-item">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-5.jpg" alt="Alex Pakovsky">
							</div>
							
							<div class="reviews-body">
								<div class="reviews-name">Alex Pakovsky</div>
								<div class="reviews-profi">Founder of INVESTBASK company</div>
								<div class="reviews-comment">
									I ordered a renovation for my office from Construction. Everyone did great. I recommend this company.
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="reviews-item">
							<div class="reviews-thumb">
								<img src="<?=base_url()?>frontend/images/client-6.jpg" alt="Dina Cvetova">
							</div>
							
							<div class="reviews-body">
								<div class="reviews-name">Dina Cvetova</div>
								<div class="reviews-profi">Store owner FLOWERSMARK</div>
								<div class="reviews-comment">
									For a long time I was looking for solutions for the project I wanted to implement, but Construction helped me with this. Highly recommend!
								</div>
								<div class="reviews-social">
									<a href="#"><img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook"></a>
									<a href="#"><img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram"></a>
								</div>
							</div>
						</div>
					</div>

				</div>
			
				<div class="swiper-pagination"></div>
			
			</div>-->

		</div>
	</section>

	<!--Sección de busqueda dentro del direcotrio-->
	<section class="s-team" id="s-busqueda">

		<div class="container">
			<h2 class="center-title wow fadeIn" data-wow-delay="0.1s">Busca y solicita</h2>
			<div class="def-desc wow fadeInLeft" data-wow-delay="0.3s">
			DE LEÓN-CONSTRUCCIÓN cuenta con un motor de búsqueda para consultar la información de personas dedicadas a los oficios referentes a la construcción y poder dar solución a los pequeños y grandes proyectos. Puedes buscar y solicitar los servicios de un fontanero, albañil, herrero, etc., que se encuentran cerca de tu domicilio.	
			</div><br>

			<div class="team-row">

			<form id="formbuscar" name="formbuscar">
				<table style="width: 100%; overflow-x: auto;" border="0">
				<thead>
					<tr>
						<th style="width: 20%;">Estado</th>
						<th style="width: 20%;">Municipio</th>
						<th style="width: 20%;">Oficio</th>
						<th style="width: 20%;"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select style="width: 315px;" name="b_cve_ent" id="b_id_estado" required>
								<option value="">Estado..</option>
								<?php 
								foreach($tb_estado as $estado){
								?>
									<option value="<?=$estado->cve_ent?>"><?=$estado->nom_ent?></option>
								<?php
								}
								?>	
							</select>
						</td>
						<td>
							<select style="width: 315px;" name="b_id_municipio" id='b_c_municipio' required>
								<option value="">Municipio..</option>
							</select>
						</td>
						<td>
							<select style="width: 315px;" name="b_id_oficio" id='b_c_oficio' >
								<option value="">Todos los oficios..</option>
								<?php 
								foreach($c_oficio as $oficio){
								?>
									<option value="<?=$oficio->id?>"><?=$oficio->oficio?></option>
								<?php
								}
								?>	
							</select>
						</td>
						<td>
						<button id="buscar_directorio" class="def-btn form-button" title="Buscar"><i class="fa fa-search"></i></button>
						</td>
					</tr>
					</tbody>
				</table>
			</form><br>
		</div><br>

		<div class="container">

		<div id="div_oficios"></div>
								

				<!--<div class="team-item wow fadeInUp" data-wow-delay="0.2s">
					<div class="team-thumb">
						<img src="<?=base_url()?>frontend/images/team-1.jpg" alt="Igor Protopsky">
					</div>
					<div class="team-body">
						<div class="team-profi">Director</div>
						<div class="team-name">Igor Protopsky</div>
					</div>
				</div>

				<div class="team-item wow fadeInUp" data-wow-delay="0.3s">
					<div class="team-thumb">
						<img src="<?=base_url()?>frontend/images/team-2.jpg" alt="Alexander Muraviev">
					</div>
					<div class="team-body">
						<div class="team-profi">Manager</div>
						<div class="team-name">Alexander Muraviev</div>
					</div>
				</div>

				<div class="team-item wow fadeInUp" data-wow-delay="0.4s">
					<div class="team-thumb">
						<img src="<?=base_url()?>frontend/images/team-3.jpg" alt="Sergey Delfinov">
					</div>
					<div class="team-body">
						<div class="team-profi">Finisher</div>
						<div class="team-name">Sergey Delfinov</div>
					</div>
				</div>-->

		</div>
	</section>



	<!--<div class="s-partners" id="s-partners">
		<div class="partners-row">
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-1.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-2.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-3.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-4.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-5.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-1.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-2.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-3.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-4.svg" alt="partner"></div>
			<div class="partners-item"><img src="<?=base_url()?>frontend/images/partner-5.svg" alt="partner"></div>
		</div>
	</div>-->

	<section class="s-form" id="s-contact">
		<div class="container">
			<div class="form-row">

				<div class="form-left">
					<h2 class="def-title">¿Tiene alguna pregunta?</h2>
					<div class="def-desc">
					Si tiene alguna pregunta o desea solicitar nuestros servicios, complete el formulario de la derecha. Estamos las 24 horas del día y le devolveremos la llamada durante el día.
					</div>
					<div class="form-image">
						<!--<img src="<?=base_url()?>frontend/images/form-bg.jpg" alt="Feedback form">-->
						<!--<img src="<?=base_url()?>frontend/images/galeria/cisterna/img1.jpeg" alt="Feedback form">-->
						<img src="<?=base_url()?>frontend/images/galeria/general/img38.jpg" alt="Feedback form">
					</div>
				</div>

				<div class="form-right">
					<form id="formcontacto" name="formcontacto">
						<input type="text" name="nombre" id="nombre" placeholder="Tú nombre*" required>
						<input type="text" name="telefono" placeholder="Tú teléfono*" required>
						<input type="email" name="correo" placeholder="Tú correo*" required>
						<textarea cols="30" name="comentarios" rows="5" placeholder="Comentarios"></textarea>
						<button id="enviar" class="def-btn form-button">Enviar</button>
					</form>
				</div>

			</div>
		</div>
	</section>


	<footer class="site-footer">
		<div class="container">

			<div class="footer-row">

				<div class="footer-left">
					<div class="footer-logo">
						<a href="#">
							<img src="<?=base_url()?>frontend/images/logo-footer.svg" alt="Construction">
							
						</a>
					</div>
					<div class="footer-desc">
						<strong>Construcción</strong> Mantenimiento, reparaciones, diseños y acabados en construcción completo.
					</div>
				</div>

				<div class="footer-right">
					<nav class="footer-nav">
						<h5 class="footer-title">Nuestros servicios</h5>
						<ul>
							<li><a href="#">Construcción de casa</a></li>
							<li><a href="#">Mantenimiento</a></li>
							<li><a href="#">Remodelación en construcción</a></li>
						</ul>
					</nav>

					<div class="footer-nav">
						<h5 class="footer-title">Cronograma</h5>
						<ul>
							<li>Lunes: 9:00 am - 6:00 pm</li>
							<li>Martes: 9:00 am - 6:00 pm</li>
							<li>Miercoles: 9:00 am - 6:00 pm</li>
							<li>Jueves: 9:00 am - 6:00 pm</li>
							<li>Viernes: 9:00 am - 6:00 pm</li>
							<li>Sabado: 9:00 am - 2:00 pm</li>
							<li>Domingo: Cerrado</li>
						</ul>
					</div>

					<div class="footer-nav">
						<h5 class="footer-title">Contactos</h5>
						<!--<div class="footer-info-item">
							<div class="footer-info-icon"><img src="<?=base_url()?>frontend/images/location-gray.svg" alt="Location"></div>
							<div class="footer-info-text">Greenbe street 5B, Latvia</div>
						</div>-->
						<a href="tel:79504575654" class="footer-info-item">
							<div class="footer-info-icon"><img src="<?=base_url()?>frontend/images/phone-gray.svg" alt="Phone"></div>
							<div class="footer-info-text">+52 33 3025 2158</div>
						</a>

						<!--<div class="footer-social">
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-twitter-gray.svg" alt="Twitter">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-vk-gray.svg" alt="Вконтакте">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-facebook-gray.svg" alt="Facebook">
							</a>
							<a href="#">
								<img src="<?=base_url()?>frontend/images/social-telegram-gray.svg" alt="Telegram">
							</a>
						</div>-->
					</div>
				</div>

			</div>
			
			<div class="footer-copyright">
				<div class="copyright-text">Copyright © 2023 De León - Construcción. Todos los derechos reservados</div>
			</div>

		</div>
	</footer>


	
	<script src="<?=base_url()?>frontend/js/swiper-bundle.min.js"></script>
	<script src="<?=base_url()?>frontend/js/magnific-popup.min.js"></script>
	<script src="<?=base_url()?>frontend/js/wow.min.js"></script>
	<script src="<?=base_url()?>frontend/js/script.js"></script>
</body>

</html>