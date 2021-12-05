<?php
$page = $_SERVER['PHP_SELF'];
$sec = "59";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>
        SAS-DOC CONAFOR - GTIC
    </title>
    <meta name="description" content="Inbox">
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

    <script src="<?= base_url() ?>/frontend/js/jquery-3.6.0.js"></script>
    <script src="<?= base_url() ?>/frontend/js/axios.min.js"></script>
    <script src="<?= base_url() ?>/frontend/js/echarts.min.js"></script>


</head>

<body class="mod-bg-1 header-function-fixed nav-function-fixed mod-nav-link">
    <!-- DOC: script to save and load page settings -->
    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            <aside class="page-sidebar">
                <div class="page-logo">
                    <img src="<?= base_url() ?>/frontend/img/conafor_blanco.png" class="img" style="width:60px" alt="CONAFOR" aria-roledescription="logo">
                    <span class="page-logo-text ml-4 mt-4">
                        <h1>CONAFOR</h1>
                    </span>
                </div>
                <!-- BEGIN PRIMARY NAVIGATION -->
                <nav id="js-primary-nav" class="primary-nav" role="navigation">
                    <div class="nav-filter">
                        <div class="position-relative">
                            <input type="text" id="nav_filter_input" placeholder="Buscar en el menu" class="form-control" tabindex="0">
                            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                <i class="fal fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info-card text-center">
                        <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                            <i class="fal fa-angle-down"></i>
                        </a>
                    </div>
                    <!-- ***************************************  MENU ************************************************* -->
                    <ul id="js-nav-menu" class="nav-menu">
                        <li class="nav-title">Menu Principal</li>
                        <li data-rol="1001" data-title="Inicio - Home" data-description="Descripcion de inicio" data-icon="fal fa-home">
                            <a href="<?= base_url() ?>/ir_a_bandeja" title="Inicio" class="nav_i" data-filter-tags="Inicio">
                                <i class="fal fa-home"></i>
                                <span class="nav-link-text">Inicio</span>
                            </a>
                        </li>
                        <!--<li class="nav-title">Menú de opciones</li> -->
                        <!--  <li data-rol="1001" data-title="Inicio - Home"
                            data-description="Resumen de documentos disponibles" data-icon="fal fa-home">
                            <a href="/home" class="nav_i" data-filter-tags="Inicio">
                                <i class="fal fa-chart-pie"></i>
                                <span class="nav-link-text">Resumen de documentos disponibles</span>
                            </a>
                        </li> -->
                        <!--    <li data-rol="1002">
                            <a href="#" title="Documento nuevo" class="nav_p" data-filter-tags="Documento nuevo">
                                <i class="fal fa-edit"></i>
                                <span class="nav-link-text">Documento nuevo</span>
                            </a>
                            <ul>
                                <li data-rol="1002_1">
                                    <a href="/documento_nuevo/generado" title="Generado" class="nav_p"
                                        data-filter-tags="Generado">
                                        <i class="fal fa-file-plus"></i>
                                        <span class="nav-link-text">Generado</span>
                                    </a>
                                </li>
                                <li data-rol="1002_2">
                                    <a href="/documento_nuevo/recibido" title="Recibido"
                                        data-filter-tags="Recibido">
                                        <i class="fal fa-envelope-open-text"></i>
                                        <span class="nav-link-text">Recibido</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <!--<li data-rol="1001" data-title="Inicio - Home" data-description="Inicio"
                            data-icon="fal fa-home">
                        </li> -->
                        <!--   <li data-rol="1002" data-title="Documentos disponibles" class="nav_p"
                            data-description="Documentos disponibles" data-icon="fal fa-cogs">
                            <a href="/home" class="nav_i" data-filter-tags="Documentos disponibles">
                                <i class="fal fa-archive"></i>
                                <span class="nav-link-text">Bandeja de documentos disponibles</span>
                            </a>
                        </li> -->
                        <li data-rol="1002" data-title="Grafica estadistica" data-description="Grafica de estdistica">
                            <a href="<?= base_url() ?>/ir_a_grafica" class="nav_i" data-filter-tags="grafica">
                                <i class="fal fa-chart-pie"></i>
                                <span class="nav-link-text">Estadística de atención de documentos</span>
                            </a>
                        </li>
                        <li data-rol="1003" data-title="Reportes de documentos" data-description="Reportes de documentos disponibles">
                            <a href="<?= base_url() ?>/ir_a_listado" class="nav_i" data-filter-tags="Inicio">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text">Listado de documentos y reportes</span>
                            </a>
                        </li>
                        <li data-rol="1004" data-title="Salir del SAS-DOC" data-description="Salir del sistema">
                            <a href="<?= base_url() ?>/logout" class="nav_i" data-filter-tags="Inicio">
                                <i class="fal fa-sign-out"></i>
                                <span class="nav-link-text">Salir del SAS-DOC</span>
                            </a>
                        </li>
                    </ul>
                    <!-- ***************************************  END MENU ************************************************* -->
                    <div class="filter-message js-filter-message bg-success-600"></div>
                </nav>
                <!-- END PRIMARY NAVIGATION -->
                <!-- NAV FOOTER -->
                <!--  <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                        <ul class="list-table m-auto nav-footer-buttons">
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                                    <i class="fas fa-comments"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                                    <i class="fas fa-life-ring"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                <!-- END NAV FOOTER -->
            </aside>
            <!-- END Left Aside -->
            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <header class="page-header" role="banner">
                    <!-- we need this logo when user switches to nav-function-top -->
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center">
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- Menu para moviles -->
                    <div class="hidden-md-down dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Esconder Menu">
                            <i class="ni ni-menu"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Solo Iconos">
                                    <i class="ni ni-minify-nav"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Bloqeuar Menu">
                                    <i class="ni ni-lock-nav"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Menu para moviles -->
                    <div class="ml-auto d-none d-md-block">
                        <h2>SISTEMA DE ADMINISTRACIÓN Y SEGUIMIENTO DE DOCUMENTOS</h2>
                    </div>
                    <div class="hidden-lg-up">
                        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>

                    <div class="ml-auto d-flex">
                        <!-- app user menu -->

                        <div>
                            <a href="#" class="header-icon" data-toggle="dropdown" title="Notificaciones">
                                <i class="fal fa-bell"></i>

                                <?php
                                if ($total_sin_atender != 0)
                                    echo '<span class="badge badge-icon">' . $total_sin_atender . '</span>';
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-xl">
                                <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top mb-2">
                                    <h4 class="m-0 text-center color-white">
                                        <?php if ($total_sin_atender != 0) {
                                            echo $total_sin_atender;
                                        } else {
                                            echo "Sin ";
                                        } ?> documentos
                                        <small class="mb-0 opacity-80">en espera de atención</small>
                                    </h4>
                                </div>
                                <!--   <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-messages" data-i18n="drpdwn.messages">Documentos en espera</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-feeds" data-i18n="drpdwn.feeds">Notificaciones</a>
                                    </li> 
                                <li class="nav-item">
                                    <a class="nav-link px-4 fs-md js-waves-on fw-500" data-toggle="tab" href="#tab-events" data-i18n="drpdwn.events">Events</a>
                                </li>
                                </ul>  -->
                                <div class="tab-content tab-notification">
                                    <!--   <div class="tab-pane active p-3 text-center">
                                            <h5 class="mt-4 pt-4 fw-500">
                                                <span class="d-block fa-3x pb-4 text-muted">
                                                    <i class="ni ni-arrow-up text-gradient opacity-70"></i>
                                                </span> Select a tab above to activate
                                                <small class="mt-3 fs-b fw-400 text-muted">
                                                    This blank page message helps protect your privacy, or you can show the first message here automatically through
                                                    <a href="#">settings page</a>
                                                </small>
                                            </h5>
                                        </div> -->
                                    <div class="tab-pane active" id="tab-messages" role="tabpanel">
                                        <div class="custom-scroll h-100">
                                            <ul class="notification">
                                                <?php foreach ($notificaciones as $notifica) { ?>
                                                    <?php
                                                    $unread = '';
                                                    if ($notifica['vigencia'] > 0 && $notifica['tiempo_limite'] < 0) {
                                                        $unread = 'class="unread"';
                                                    }
                                                    $estatus = "";
                                                    $idStatus = $notifica['id_estatus'];
                                                    switch ($idStatus) {
                                                        case 6:
                                                            $estatus = "status status-danger mr-2";
                                                            break;
                                                        case 2:
                                                            $estatus = "status status-warning mr-2";
                                                            break;
                                                        case 7:
                                                            $estatus = "status status-warning mr-2";
                                                            break;
                                                        case 3:
                                                            $estatus = "status status-success mr-2";
                                                            break;
                                                    }
                                                    ?>
                                                    <li <?php echo $unread ?>>
                                                        <a href="<?= base_url() ?>/ver_notas/<?php echo $notifica['id'] ?>/<?php echo $notifica['id_estatus'] ?>" class="d-flex align-items-center">
                                                            <span class="<?php echo $estatus ?>">
                                                            </span>
                                                            <span class="d-flex flex-column flex-1 ml-1">
                                                                <span class="name"><b><?php echo $notifica['numero_documento']; ?></b><span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-1">
                                                                    </span></span>
                                                                <span class="msg-a fs-sm"><?php echo $notifica['asunto']; ?></span>
                                                                <span class="msg-b fs-xs">Vigencia:</span>
                                                                <span class="fs-nano text-muted mt-1">
                                                                    <?php
                                                                    $mensaje = "";
                                                                    $estilo = "";
                                                                    if ($notifica['vigencia'] == 0) {
                                                                        echo "Sin vigencia";
                                                                        $mensaje = "Sin vencimiento";
                                                                        $stilo = "font-weight: bold;";
                                                                    } else {
                                                                        echo $notifica['vigencia'] . " días";
                                                                        if ($notifica['tiempo_limite'] > 0) {
                                                                            $mensaje = $notifica['tiempo_limite'] . " día(s) para su vencimiento";
                                                                            $stilo = "font-weight: bold;";
                                                                        } else if ($notifica['tiempo_limite'] == 0) {
                                                                            $mensaje = "Vencido";
                                                                            $estilo = "color:red; font-weight: bold;";
                                                                        } else if ($notifica['tiempo_limite'] < 0) {
                                                                            $mensaje = abs($notifica['tiempo_limite']) . " día(s) vencido";
                                                                            $estilo = "color:red; font-weight: bolder;";
                                                                        }
                                                                    } ?></span>

                                                                <span style="<?php echo $estilo ?>"><?php echo $mensaje; ?></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--          <div class="tab-pane" id="tab-feeds" role="tabpanel">
                                        <div class="custom-scroll h-100">
                                            <ul class="notification">
                                                <li class="unread">
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <span class="d-flex flex-column flex-1">
                                                            <span class="name d-flex align-items-center">Administrator
                                                                <span class="badge badge-success fw-n ml-1">UPDATE</span></span>
                                                            <span class="msg-a fs-sm">
                                                                System updated to version <strong>4.0.0</strong> <a href="intel_build_notes.html">(patch notes)</a>
                                                            </span>
                                                            <span class="fs-nano text-muted mt-1">5 mins ago</span>
                                                        </span>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <div class="d-flex flex-column flex-1">
                                                            <span class="name">
                                                                Adison Lee <span class="fw-300 d-inline">replied to your
                                                                    video <a href="#" class="fw-400"> Cancer Drug</a>
                                                                </span>
                                                            </span>
                                                            <span class="msg-a fs-sm mt-2">Bring to the table win-win
                                                                survival strategies to ensure proactive domination. At
                                                                the end of the day...</span>
                                                            <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                                        </div>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <div class="d-flex flex-column flex-1">
                                                            <span class="name">
                                                                Troy Norman'<span class="fw-300">s new
                                                                    connections</span>
                                                            </span>
                                                            <div class="fs-sm d-flex align-items-center mt-2">
                                                                <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                                <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                                                <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                                                <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                                                <div data-hasmore="+3" class="rounded-circle profile-image-md mr-1">
                                                                    <span class="profile-image-md mr-1 rounded-circle d-inline-block" style="background-image:url('img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                                                </div>
                                                            </div>
                                                            <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                                        </div>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <div class="d-flex flex-column flex-1">
                                                            <span class="name">Dr John Cook <span class="fw-300">sent a
                                                                    <span class="text-danger">new
                                                                        signal</span></span></span>
                                                            <span class="msg-a fs-sm mt-2">Nanotechnology immersion
                                                                along the information highway will close the loop on
                                                                focusing solely on the bottom line.</span>
                                                            <span class="fs-nano text-muted mt-1">10 minutes ago</span>
                                                        </div>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <div class="d-flex flex-column flex-1">
                                                            <span class="name">Lab Images <span class="fw-300">were
                                                                    updated!</span></span>
                                                            <div class="fs-sm d-flex align-items-center mt-1">
                                                                <a href="#" class="mr-1 mt-1" title="Cell A-0012">
                                                                    <span class="d-block img-share" style="background-image:url('img/thumbs/pic-7.png'); background-size: cover;"></span>
                                                                </a>
                                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 saliva">
                                                                    <span class="d-block img-share" style="background-image:url('img/thumbs/pic-8.png'); background-size: cover;"></span>
                                                                </a>
                                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 blood cells">
                                                                    <span class="d-block img-share" style="background-image:url('img/thumbs/pic-11.png'); background-size: cover;"></span>
                                                                </a>
                                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 Membrane O.C">
                                                                    <span class="d-block img-share" style="background-image:url('img/thumbs/pic-12.png'); background-size: cover;"></span>
                                                                </a>
                                                            </div>
                                                            <span class="fs-nano text-muted mt-1">55 minutes ago</span>
                                                        </div>
                                                        <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                            <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center show-child-on-hover">
                                                        <div class="d-flex flex-column flex-1">
                                                            <div class="name mb-2">
                                                                Lisa Lamar<span class="fw-300"> updated project</span>
                                                            </div>
                                                            <div class="row fs-b fw-300">
                                                                <div class="col text-left">
                                                                    Progress
                                                                </div>
                                                                <div class="col text-right fw-500">
                                                                    45%
                                                                </div>
                                                            </div>
                                                            <div class="progress progress-sm d-flex mt-1">
                                                                <span class="progress-bar bg-primary-500 progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></span>
                                                            </div>
                                                            <span class="fs-nano text-muted mt-1">2 hrs ago</span>
                                                            <div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
                                                                <a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!--          <div class="tab-pane" id="tab-events" role="tabpanel">
                                        <div class="d-flex flex-column h-100">
                                            <div class="h-auto">
                                                <table class="table table-bordered table-calendar m-0 w-100 h-100 border-0">
                                                    <tr>
                                                        <th colspan="7" class="pt-3 pb-2 pl-3 pr-3 text-center">
                                                            <div class="js-get-date h5 mb-2">[your date here]</div>
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <th>Sun</th>
                                                        <th>Mon</th>
                                                        <th>Tue</th>
                                                        <th>Wed</th>
                                                        <th>Thu</th>
                                                        <th>Fri</th>
                                                        <th>Sat</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted bg-faded">30</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td><i class="fal fa-birthday-cake mt-1 ml-1 position-absolute pos-left pos-top text-primary"></i>
                                                            6</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td class="bg-primary-300 pattern-0">10</td>
                                                        <td>11</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td>15</td>
                                                        <td>16</td>
                                                        <td>17</td>
                                                        <td>18</td>
                                                        <td>19</td>
                                                        <td>20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td>22</td>
                                                        <td>23</td>
                                                        <td>24</td>
                                                        <td>25</td>
                                                        <td>26</td>
                                                        <td>27</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28</td>
                                                        <td>29</td>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td class="text-muted bg-faded">1</td>
                                                        <td class="text-muted bg-faded">2</td>
                                                        <td class="text-muted bg-faded">3</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="flex-1 custom-scroll">
                                                <div class="p-2">
                                                    <div class="d-flex align-items-center text-left mb-3">
                                                        <div class="width-5 fw-300 text-primary l-h-n mr-1 align-self-start fs-xxl">
                                                            15
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="d-flex flex-column">
                                                                <span class="l-h-n fs-md fw-500 opacity-70">
                                                                    October 2020
                                                                </span>
                                                                <span class="l-h-n fs-nano fw-400 text-secondary">
                                                                    Friday
                                                                </span>
                                                            </div>
                                                            <div class="mt-3">
                                                                <p>
                                                                    <strong>2:30PM</strong> - Doctor's appointment
                                                                </p>
                                                                <p>
                                                                    <strong>3:30PM</strong> - Report overview
                                                                </p>
                                                                <p>
                                                                    <strong>4:30PM</strong> - Meeting with Donnah V.
                                                                </p>
                                                                <p>
                                                                    <strong>5:30PM</strong> - Late Lunch
                                                                </p>
                                                                <p>
                                                                    <strong>6:30PM</strong> - Report Compression
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="py-2 px-3 bg-faded d-block rounded-bottom text-right border-faded border-bottom-0 border-right-0 border-left-0">

                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="#" data-toggle="dropdown" title="<?= session()->get('email'); ?>" class="header-icon d-flex align-items-center justify-content-center ml-4">
                                <img src="<?= base_url() ?>/frontend/img/human_avatar.png" class="image" style="width:50px" alt="Avatar">
                            </a>
                            <!-- Submenu avatar -->
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                        <div class="info-card-text">
                                            <div class="fs-lg text-truncate text-truncate-lg"><?= session()->get('email'); ?></div>
                                            <span class="text-truncate text-truncate-md opacity-80"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                    <span>Pantalla Completa</span>
                                    <i class="float-right text-muted fw-n">F11</i>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item fw-500 pt-3 pb-3" href="<?= base_url() ?>/logout">
                                    <span>Salir</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END Page Header -->
                <main id="js-page-content" role="main" class="page-content">
                    <!-- Titulo y descripcion de la pagina -->
                    <!--  <div class="subheader">
                        <h1 class="subheader-title"><i id="icon_page"></i> <span id="title_page"></span><small
                                id="description_page"></small></h1>
                    </div> -->