<?php//@skip-indexing?>
<?php include('menu.php'); ?>
<!-- begin header -->
<header id="header" class="container">
    <!-- begin header top -->
    <section id="header-top" class="clearfix">
        <!-- begin header left -->
        <div class="one-half">
            <h1 id="logo"><a href="index.php"><img src="../images/logo.png" alt="Yet" style="height:90px;"></a></h1>
        </div>
        <!-- end header left -->

        <!-- begin header right -->
        <div class="one-half column-last">
            

            <!-- begin contact info -->
            <div class="contact-info">
                <p><a href="../user/clases/cierraSesion.php">Salir</a></p>                
            </div>
            <!-- end contact info -->
        </div>
        <!-- end header right -->
    </section>
    <!-- end header top -->

    <!-- begin navigation bar -->
    <section id="navbar" class="clearfix">
        <!-- begin navigation -->
        <nav id="nav">
            <ul id="navlist" class="clearfix">
                    <li <?php echo ($seccion == "home") ? "class='current'" : "class=''" ; ?>><a href="index.php">Inicio</a></li>
                    <li <?php echo ($seccion == "prop") ? "class='current'" : "class=''" ; ?>><a href="propiedad.php" rel="submenu2">Propiedades</a>
                        <ul id="submenu2" class="ddsubmenustyle">
                            <li><a href="propiedad.php">Nueva propiedad</a></li>
                            <li><a href="listProp.php">Lista de propiedades</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "pagina") ? "class='current'" : "class=''" ; ?>><a href="#" rel="submenu3">Página</a>
                        <ul id="submenu3" class="ddsubmenustyle">
                            <li><a href="colores.php">Colores</a></li>
                            <li><a href="logo.php">Logotipo</a></li>
                            <!--<li><a href="listDominios.php">Dominio(s)</a></li>-->
                            <li><a href="datosFact.php">Datos de facturación</a></li>
                            <li><a href="redesSoc.php">Contacto y Redes sociales</a></li>
                            <li><a href="secciones.php">Nueva sección</a></li>
                            <li><a href="listSecc.php">Lista de secciones</a></li>
                            <li><a href="asoci.php">Nueva asociación</a></li>
                            <li><a href="listasoc.php">Lista de asociaciones</a></li>
                            <li><a href="testimClientes.php">Nuevo testimonial</a></li>
                            <li><a href="listTestim.php">Lista de testimoniales</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "perfil") ? "class='current'" : "class=''" ; ?>><a href="#" rel="submenu4">Perfil</a>
                        <ul id="submenu4" class="ddsubmenustyle">
                            <li><a href="modificaPerfil.php">Modificar perfil</a></li>
                            <li><a href="modPass.php">Modificar contraseña</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "asesores") ? "class='current'" : "class=''" ; ?>><a href="listAsesores.php" rel="submenu4">Asesores</a>
                        <ul id="submenu4" class="ddsubmenustyle">
                            <li><a href="asesores.php">Nuevo asesor inmobiliario</a></li>
                            <li><a href="listAsesores.php">Lista de asesores inmobiliarios</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "oficinas") ? "class='current'" : "class=''" ; ?>><a href="listOfice.php" rel="submenu4">Oficinas</a>
                        <ul id="submenu4" class="ddsubmenustyle">
                            <li><a href="oficinas.php">Nueva oficina</a></li>
                            <li><a href="listOfice.php">Lista de oficinas</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "soporte") ? "class='current'" : "class=''" ; ?>><a href="contactUser.php" rel="submenu5">Soporte</a>
                        <!--<ul id="submenu5" class="ddsubmenustyle">
                            <!--<li><a href="reportes.php">Levantar un Ticket</a></li>
                            <li><a href="blog-post.html">Tickets Levantados</a></li>
                            <li><a href="blog-post.html">FAQ</a></li>
                        </ul> -->
                    </li>
                </ul>
        </nav>
        <!-- end navigation -->

        <!-- begin search form -->
        
        <!-- end search form -->
    </section>
    <!-- end navigation bar -->

</header>
<!-- end header -->