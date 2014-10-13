<?php
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$estatus = $valida->validaSesion();
if (isset($_GET['idProp'])) {
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- end meta -->
    
    <!-- begin CSS -->
    <link href="../style.css" type="text/css" rel="stylesheet" id="main-style"/>
    <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
    <link href="../css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style"/>

   
    <!-- end CSS -->
    
    <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    
    <!-- begin JS -->
    <script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="../js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="../js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]><script src="../js/respond.min.js" type="text/javascript"></script><![endif]--> <!-- Respond -->
    <script src="../js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> 
        ddlevelsmenu.setup("nav", "topbar");
    </script><!-- drop-down menu -->
    <script src="../js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="../js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->

    <script type="text/javascript" src="../js/plupload.full.min.js"></script><!--subida de archivos multiple-->
    
    <!-- end JS -->
	<title>Zona Clientes</title>
</head>

<body>
<!-- begin container -->
<div id="wrap">
	<?php
        $seccion = "propiedades";
        $seccion = "perfil"; 
        if ($estatus == 2) {
            include_once('../includes/headerClientes.php');
        }else if($estatus == 1 || $estatus == 9){
            include_once('../includes/headerPaquete.php');
        }else if($estatus == 3 || $estatus == 4){
            include_once('../includes/headerAsesores.php');
        }
        $idpropiedad = $_GET['idProp'];
    ?>
        
    <!-- begin content -->
        <section id="content" class="container clearfix">
        	<!-- begin page header -->
            <header id="page-header">
                <h1 id="page-title">Subir imágenes</h1>
            </header>
                <div id="filelist">Puede que tu navegador no sea compatible con nuestro sistema de subida de archivos, por favor intenta con otro</div>
                <br />
                <div id="container">
                    <a id="pickfiles" href="javascript:;" class="button">Primero Seleccione Imágenes</a> 
                    <a id="uploadfiles" href="javascript:;" class="button green">Subir</a>
                    <a id="predeterminada" <?php echo 'href="imagenes.php?idpropiedad='.$idpropiedad.'&action=pred"'; ?> class="button orange" style="display:none">Seleccione Predeterminada</a>
                </div>
                <br />
                <pre id="console"></pre>
        </section>

<script type="text/javascript">
// Custom example logic

var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
    browse_button : 'pickfiles', // you can pass in id...
    container: document.getElementById('container'), // ... or DOM Element itself
    url : 'procesa/formularios.php',
    flash_swf_url : '../js/Moxie.swf',
    silverlight_xap_url : '../js/Moxie.xap',
    
    filters : {
        max_file_size : '10mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,gif,png"}
        ]
    },

    multipart_params: {
        propiedad: <?php echo "'".$idpropiedad."'"; ?>,
        usuario: <?php echo "'".$_SESSION[id]."'"; ?>,
        action: 'imgPropiedad'
    },

    init: {
        PostInit: function() {
            document.getElementById('filelist').innerHTML = '';

            document.getElementById('uploadfiles').onclick = function() {
                uploader.start();
                document.getElementById('predeterminada').style.display = 'inline';
                return false;
            };
        },

        FilesAdded: function(up, files) {
            plupload.each(files, function(file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function(up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function(up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});

uploader.init();

</script>

        <!-- end content -->             
	<!-- begin footer -->
	<?php include '../includes/footerClientes.php' ?>
	<!-- end footer -->
</div>
<!-- end container -->
</body>
</html>
<?php }else{
	header("location: propiedad.php");
}