<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        SAS-DOC .: Login
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/app.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/sweetalert2.bundle.css">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/skin-master.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/frontend/img/favicon/apple-touch-icon.png">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/datatables.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/select2.bundle.css">

    <link rel="stylesheet" media="screen, print" href="<?= base_url() ?>/frontend/css/propio.css">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/frontend/img/favicon/folder.ico">
</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                    <div class="d-flex align-items-center container p-0">
                        <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                <img src="<?= base_url() ?>/frontend/img/conafor_logo.png" alt="conafor_logo.png" aria-roledescription="logo">
                            </a>
                        </div>
                        <!--  <a href="page_register.html" class="btn-link text-white ml-auto">
                            Solicitar cuenta de usuario
                        </a> -->
                    </div>
                </div>
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col col-md-6 col-lg-7 hidden-sm-down">
                            <h1 class="fs-xxl fw-500 mt-4 text-white">
                                SAS-DOC
                                <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                    Sistema de Administración y Seguimiento de Documentos
                                </small>
                            </h1>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                            <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                Iniciar sesión en el SAS-DOC
                            </h1>
                            <div class="card p-4 rounded-plus bg-faded">
                                <form id="js-login" method="post" name="login" action="#">
                                    <div class="form-group">
                                        <label class="form-label" for="usuario">Usuario</label>
                                        <div class="input-group-append">
                                            <input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Usuario" value="<?= set_value('usuario') ?>" required>
                                            <span class="input-group-text">@conafor.gob.mx</span>
                                        </div>
                                        <div class="invalid-feedback">No es un usuario valido</div>
                                        <div class="help-block">El mismo usuario de tu equipo</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" value="" required>
                                        <div class="invalid-feedback">Contraseña incorrecta.</div>
                                        <div class="help-block">La misma contraseña de tu equipo</div>
                                    </div>
                                    <!-- <div class="form-group text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberme">
                                            <label class="custom-control-label" for="rememberme"> Recordar</label>
                                        </div>
                                    </div> -->
                                    <div class="row no-gutters">
                                        <button id="btn_ingresar" class="btn btn-info btn-block btn-lg">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com'
                                class='text-white opacity-40 fw-500' title='gotbootstrap.com'
                                target='_blank'>gotbootstrap.com</a>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
    <script src="<?= base_url() ?>/frontend/js/jquery-3.6.0.js"></script>
    <script src="<?= base_url() ?>/frontend/js/axios.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/vendors.bundle.js"></script>
    <script src="<?= base_url() ?>/frontend/js/app.bundle.js"></script>
    <script src="<?= base_url() ?>/frontend/js/sweetalert2.js"></script>
    <script src="<?= base_url() ?>/frontend/js/login.js"></script>

</body>

</html>