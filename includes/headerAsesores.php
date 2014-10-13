<?php//@skip-indexing?>
<<<<<<< HEAD
<?php include('menu.php'); 
?>
=======
<?php include('menu.php'); ?>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
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
                    <li <?php echo ($seccion == "perfil") ? "class='current'" : "class=''" ; ?>><a href="#" rel="submenu4">Perfil</a>
                        <ul id="submenu4" class="ddsubmenustyle">
                            <li><a href="modificaPerfil.php">Modificar perfil</a></li>
                            <li><a href="modPass.php">Modificar contraseña</a></li>
                        </ul>
                    </li>
                    <li <?php echo ($seccion == "soporte") ? "class='current'" : "class=''" ; ?>><a href="contactUser.php" rel="submenu5">Soporte</a>
<<<<<<< HEAD
                        <!--<ul id="submenu5" class="ddsubmenustyle">
                            <li><a href="reportes.php">Levantar un Ticket</a></li>
                            <li><a href="blog-post.html">Tickets Levantados</a></li>
                            <li><a href="blog-post.html">FAQ</a></li>
                        </ul>-->
=======
                        <ul id="submenu5" class="ddsubmenustyle">
                            <!--<li><a href="reportes.php">Levantar un Ticket</a></li>
                            <li><a href="blog-post.html">Tickets Levantados</a></li>
                            <li><a href="blog-post.html">FAQ</a></li>-->
                        </ul>
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
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