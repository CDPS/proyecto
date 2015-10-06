<?php
    require_once 'php_facebook_sdk4/app/start.php';
?>

<html>
<head>
    <title>Test Reference!!!</title>
    <link rel="stylesheet" href="/testreference1.1/css/style.css"/>
    <script type="text/javascript" src="/testreference1.1/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="/testreference1.1/js/javascript.js"></script>
</head>
<body>
    <header>

        <img src="/testreference1.1/recursos/testreference3.png" alt="Test Reference">

    </header>

    <div class="contenido">  

    <nav class="navegacion">

        <!--Navegacion-->

        <ul>

            <li><a href="/testreference1.1/">Inicio</a></li>
            <li><a href="" id="perfil">Mi perfil</a></li>
            <li><a href="" id="universidades">Universidades</a></li>
            <li><a href="" id="img">Subir parcial</a></li>
        </ul>

    </nav>

    <div class="central">
        
            <div class="central2">
        
                <p>
                    Test References es una plataforma web que brinda a la comunidad estudiantil poder compartir y consultar los parciales
                     que se han desarrollado en determinado espacio acad&eacute;mico. TestReferences est&aacute; pensada para que todas 
                     la universidades puedan estar registradas y se pueda compartir los diferentes parciales de cada espacio acad&eacute;mico
                      de cualquier carrera en cada semestre, para que as&iacute; el usuario pueda encontrar una buena base de estudio 
                      gui&aacute;ndose en parciales anteriores que ha realizado determinado profesor o que simplemente se han llevado a 
                      cabo en semestres anteriores.  En el portal se puede encontrar los enunciados de los parciales con su respectiva 
                      soluci&oacute;n, dichos parciales son suministrados por los usuarios, lo que indica que es el mismo estudiante quien 
                      se encarga de compartir la informaci&oacute;n y de enriquecer el contenido de la p&aacute;gina. 
                    Para acceder a la plataforma se debe crear una cuenta la cual nos dar&eacute; el acceso a todos los contenidos del portal.

        </p>
            
            </div>

    </div>

    <div class="login">

        <div class="form">
            <?php 
                if(!isset($_COOKIE["chsm"])&&(!isset($_SESSION['facebook'])))
                {

            ?>
            
            <h3>Login</h3>

            <p> <label>Username:</label>

            <input type="text" id="usernameL"> </input> </p>

            <p> <label>Password:</label>

            <input type="password" id="contraseniaL"> </input> </p>

            <button class="btnLogin">login</button>

         
            <a  href="<?php echo $helper->getLoginUrl($config['scopes']); ?>">Facebook Login</a>

            <a href="" class="registrarse">Registrarse</a>

            <?php 
                }else{
                    if(isset($_SESSION['facebook'])){
                        $_COOKIE["chsm"]="facebook";
                    }
            ?>

                <div class="infoU">
                <div class="claseU" id="<?php print "$_COOKIE[chsm]";?>">Bienvenido <?php print "$_COOKIE[chsm]";?> </div>
                <a href="/testreference1.1/home/logout">Cerrar sesion</a></div>

                <!-- <input type="text" id="userL"> </input> -->
            <?php }
            ?>
        </div>
    </div>


    </div>
    
    
    <footer>
        <!-- Footer -->
        <div class="pie">
            
            <a href="http://www.facebook.com"><img src="/testreference1.1/recursos/facebook.png" width="50" height="50" alt="Siguenos en Facebook" title="Siguenos en Facebook"></a>

            <a href="https://twitter.com"><img src="/testreference1.1/recursos/twitter.png" width="50" height="50" alt="Siguenos en Twitter" title="Siguenos en Twitter"></a>

            <a href="https://plus.google.com/"><img src="/testreference1.1/recursos/google.png" width="50" height="50" alt="Siguenos en Google+" title="Siguenos en Google+"></a>
      </div>

      <p> Copyright &copy; 2015 Fabio Stiven Oquendo Soler & Cristian Daniel Palechor Sepulveda </p>

    </footer>
 
</body>
</html>
