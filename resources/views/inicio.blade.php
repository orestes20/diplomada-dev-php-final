<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - Diplom₳d₳</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/styles/style.css"> <!-- llama al estilo css -->

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

    <!-- Percent Circle -->
    <link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

    <!-- Dark Themes -->
    <link rel="stylesheet" href="assets/styles/style-dark.css"> <!-- llama al estilo dark del css -->

    <!-- Dropify -->
    <link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">

    <!-- script para usar los iconos de font aswesome.com -->
    <script src="https://kit.fontawesome.com/2af1575d92.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- Inicio del menu -->
    <nav class="main-menu">
        <header class="header">
            <!-- LOGO -->
            <a href="#" class="logo"></a>
            <button type="button" class="button-close fa fa-times js__menu_close"></button>
            <div class="user">
                <a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span
                        class="status online"></span></a>
                <h5 class="name"><a href="#">{{ session('nombre') }}</a></h5>
                <h5 class="position">{{ session('perfil') }}</h5>
                <!-- /.name -->
                <div class="control-wrap js__drop_down">
                    <i class="fa fa-caret-down js__drop_down_button"></i>
                    <div class="control-list">
                        <div class="control-item"><a href="#"><i class="fa fa-user"></i> Perfiles</a></div>
                        <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Herramientas</a></div>
                        <div class="control-item"><a href="{{ url('cerrar_sesion') }}"><i class="fa fa-sign-out"></i>
                                Cerrar Sesión</a></div>
                    </div>
                    <!-- /.control-list -->
                </div>
                <!-- /.control-wrap -->
            </div>
            <!-- /.user -->
        </header>
        <!-- /.header -->
        <div class="content">
            <nav class="navigation">
                @if (session('id_perfil') == 1)
                    <ul class="menu js__accordion">
                        <li>
                            <a class="waves-effect parent-item js__control" href="#"><i
                                    class="menu-icon fa-solid fa-cog"></i><span>Administración de Usuarios</span><span
                                    class="menu-arrow fa fa-angle-down"></span></a>
                            <ul class="sub-menu js__content">
                                <li><a href="{{ url('view_nuevo_usuario') }}"><i class="fa-solid fa-user-plus"></i>
                                        Crear Nuevo Usuario</a></li>
                                <li><a href="{{ url('lista_usuario') }}"><i class="fa-solid fa-list"></i> Lista de Usuarios</a></li>
                            </ul>
                            <!-- /.sub-menu js__content -->
                        </li>
                        <li>
                            <a class="waves-effect parent-item js__control" href="#"><i
                                    class="menu-icon fa-solid fa-list"></i><span>Lista de registros</span><span
                                    class="menu-arrow fa fa-angle-down"></span></a>
                            <ul class="sub-menu js__content">
                                <li><a href="{{ url('lista_aspirantes') }}"><i class="fa-solid fa-list"></i> Lista de
                                        Aspirantes</a></li>
                                <li><a href="{{ url('lista_estudiantes') }}"><i class="fa-solid fa-list"></i> Lista de
                                        Estudiantes</a></li>
                            </ul>
                            <!-- /.sub-menu js__content -->
                        </li>
                    </ul>
                @endif
                @if (session('id_perfil') == 2 || session('id_perfil') == 3)
                    <ul class="menu js__accordion">
                        <li>
                            <a class="waves-effect parent-item js__control" href="#"><i
                                    class="menu-icon fa-solid fa-folder-open"></i><span>Datos del Usuario</span><span
                                    class="menu-arrow fa fa-angle-down"></span></a>
                            <ul class="sub-menu js__content">
                                <li><a href="#"><i class="fa-solid fa-list-alt"></i> Consultar Información</a>
                                </li>
                                <li><a href="view_actualizar_informacion"><i class="fa-solid fa-edit"></i> Actualizar
                                        Información</a></li>
                            </ul>
                            <!-- /.sub-menu js__content -->
                        </li>
                        <li>
                            <a class="waves-effect" href="view_cargar_documentos"><i
                                    class="menu-icon fa fa-upload"></i><span>Cargar Documentos</span></a>
                        </li>
                    </ul>
                @endif
                <!-- /.menu js__accordion -->
                @if (session('id_perfil') == 4)
                    <ul class="menu js__accordion">
                        <li>
                            <a class="waves-effect" href="{{ url('revisar_documentos') }}"><i
                                class="menu-icon fa fa-file "></i><span>Verificar Documentos</span></a>
                        </li>
                    </ul>
                @endif
            </nav>
            <!-- /.navigation -->
        </div>
        <!-- /.content -->
    </nav>
    <!-- /.fin del menu -->

    <div class="fixed-navbar">
        <div class="pull-left">
            <button type="button"
                class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">
            <div class="ico-item">
                <a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
                <form action="#" id="searchform-header" class="searchform js__toggle"><input type="search"
                        placeholder="Search..." class="input-search"><button class="fa fa-search button-search"
                        type="submit"></button></form>
                <!-- /.searchform -->
            </div>
            <!-- /.ico-item -->

            <div class="ico-item toggle-hover js__drop_down ">
                <!-- <span class="fa fa-th js__drop_down_button"></span> -->
                <span class="fa-solid fa-wallet js__drop_down_button"></span> <!-- Conectar la wallet -->
                <div class="toggle-content">
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-coins"></i><span class="txt">Nami</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-bitbucket"></i><span
                                    class="txt">Bitbucket</span></a></li>
                        <li><a href="#"><i class="fa-solid fa-coins"></i><span
                                    class="txt">Cardano</span></a></li>
                    </ul>
                    <!-- <a href="#" class="read-more">More</a> -->
                </div>
                <!-- /.toggle-content -->
            </div>
            <!-- /.ico-item -->

            <a href="{{ url('cerrar_sesion') }}" class="ico-item fa fa-power-off js__logout"></a>
        </div>
        <!-- /.pull-right -->
    </div>
    <!-- /.fixed-navbar -->

    <div id="notification-popup" class="notice-popup js__toggle" data-space="75">
        <h2 class="popup-title">Your Notifications</h2>
        <!-- /.popup-title -->
        <div class="content">
            <ul class="notice-list">
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">John Doe</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">10 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Anna William</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">15 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
                        <span class="name">Update Status</span>
                        <span class="desc">Failed to get available update data. To ensure the please contact
                            us.</span>
                        <span class="time">30 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Jennifer</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">45 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Michael Zenaty</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">50 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Simon</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">1 hour</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
                        <span class="name">Account Contact Change</span>
                        <span class="desc">A contact detail associated with your account has been changed.</span>
                        <span class="time">2 hours</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Helen 987</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">Yesterday</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Denise Jenny</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">Oct, 28</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Thomas William</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">Oct, 27</span>
                    </a>
                </li>
            </ul>
            <!-- /.notice-list -->
            <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#notification-popup -->

    <div id="message-popup" class="notice-popup js__toggle" data-space="75">
        <h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
        <!-- /.popup-title -->
        <div class="content">
            <ul class="notice-list">
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">John Doe</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">10 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Harry Halen</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">15 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Thomas Taylor</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">30 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Jennifer</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">45 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Helen Candy</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">45 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Anna Cavan</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">1 hour ago</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar bg-success"><i class="fa fa-user"></i></span>
                        <span class="name">Jenny Betty</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">1 day ago</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Denise Peterson</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">1 year ago</span>
                    </a>
                </li>
            </ul>
            <!-- /.notice-list -->
            <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#message-popup -->
    <div id="wrapper">
        <div class="main-content">
            <div class="row small-spacing">
                @yield('cargar_archivo')
                @yield('view_nuevo_usuario')
                @yield('view_actualizar_informacion')
                @yield('view_lista_usuario')
                @yield('consulta_documentos')
                @yield('consulta_aspirante')
                @yield('consulta_estudiante')
            </div>
            <!-- /.row -->
            <footer class="footer">
                <ul class="list-inline">
                    <li>2024 © Diplomada. FUNINTC Todos los derechos reservados</li>

                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div><!--/#wrapper -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="assets/script/html5shiv.min.js"></script>
  <script src="assets/script/respond.min.js"></script>
 <![endif]-->
    <!--
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Percent Circle -->
    <script src="assets/plugin/percircle/js/percircle.js"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="assets/plugin/chart/chartist/chartist.min.js"></script>
    <script src="assets/scripts/chart.chartist.init.min.js"></script>

    <!-- FullCalendar -->
    <script src="assets/plugin/moment/moment.js"></script>
    <script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/scripts/fullcalendar.init.js"></script>

    <!-- Dropify -->
    <script src="assets/plugin/dropify/js/dropify.min.js"></script>
    <script src="assets/scripts/fileUpload.demo.min.js"></script>
    <script src="assets/scripts/main.js"></script>

    <!-- Data Tables -->
    <script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
    <script src="assets/scripts/datatables.demo.min.js"></script>
</body>

</html>
