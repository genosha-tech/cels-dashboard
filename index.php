<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bower_components/angular-ui-select/dist/select.min.css">
    
    <script src="https://kit.fontawesome.com/ce2ef34607.js" crossorigin="anonymous"></script>
    <link href="styles/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/fonts/styles.css" />
    <link rel="stylesheet" href="styles/animate.css" />
    <link rel="stylesheet" href="stylesheets/css/style.css">
    <title>CELS</title>
</head>

<body ng-app="genApp" autoscroll="true">
    <div class="red-nav-container d-none">
        <?php include_once "fixedmenu.php"; ?>
    </div>
    <?php include_once "header.php"; ?>
    <div class="container mt-3 description d-block d-md-none">
        <h1 class="title bold-font">violencia policial</h1>
        <p class="light-font mt-3">Violencia policial es una plataforma que reúne datos actualizados sobre lesiones y
            muertes producidas por las policías y fuerzas de seguridad argentinas. Nos proponemos monitorear el uso de
            la fuerza estatal y orientar políticas de seguridad que respeten los derechos humanos.
        </p>
        <ol class="content-list medium-font">
            <li><a href="#datos-est" target="_self">datos estadísticos</a></li>
            <li><a href="#historias" target="_self">historias</a></li>
            <li><a href="#femicidios" target="_self">femicidios policiales</a></li>
            <li><a href="#rtas-desp" target="_self">ejecuciones policiales</a></li>
            <li><a href="#custodia" target="_self">bajo custodia</a></li>
            <li><a href="#armas" target="_self">represión con armas “menos letales”</a></li>
            <li><a href="#fuera-servicio" target="_self">fuera de servicio</a></li>
        </ol>
    </div>
    <?php include_once "datos-est.php"; ?>
    <?php include_once "metodologia.php"; ?>
    <?php include_once "historias.php"; ?>
    <?php include_once "femicidios.php"; ?>
    <?php include_once "rtas-desp.php"; ?>
    <?php include_once "bajo-custodia.php"; ?>
    <?php include_once "armas-letales.php"; ?>
    <?php include_once "fuera-servicio.php"; ?>
    <?php include_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="/js/menu-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.2.1/readmore.min.js"></script>
    <script src="/js/readmore.js"></script>
    <script src="/js/search-box.js"></script>


    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://d3js.org/d3-array.v1.min.js"></script>
    <script src="https://d3js.org/d3-geo.v1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-legend/2.25.6/d3-legend.min.js"></script>
    <script src="  https://cdnjs.cloudflare.com/ajax/libs/d3-annotation/2.3.1/d3-annotation.min.js"></script>
    <script src='https://unpkg.com/scrollama@0.6.1/build/scrollama.js'></script>


    <script src="scripts/c3.min.js"></script>

    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="scripts/libs/angular-sanitize.min.js"></script>

    <script src="bower_components/satellizer/dist/satellizer.js"></script>
    <script src="bower_components/fi-rut/dist/fi-rut.js"></script>
    <script src="scripts/ui-select.js"></script>
    <script src="scripts/app.routes.js"></script>
    <script src="scripts/app.core.js"></script>
    <script src="scripts/app.services.js"></script>
    <script src="scripts/app.auth.js"></script>
    <script src="scripts/app.js"></script>

    <script src="scripts/sections/home/home.ctrl.js"></script>
    <script src="scripts/sections/home/funcionarios.ctrl.js"></script>
    <script src="scripts/sections/home/civiles.ctrl.js"></script>
    <script src="scripts/sections/home/funcionarios-i.ctrl.js"></script>
    <script src="scripts/sections/home/funcionarios-m.ctrl.js"></script>
    <script src="scripts/sections/home/civiles-mapa.ctrl.js"></script>
    <script src="scripts/sections/home/funcionarios-mapa.ctrl.js"></script>

    <script src="scripts/directives/icon-chart.js"></script>
    <script src="scripts/services/med.fct.js"></script>
    <!-- ======================================================================= -->
    <!-- DIRECTIVES -->
    <!-- ======================================================================= -->

    <script type="text/javascript" src="scripts/main.js"></script>




</body>

</html>