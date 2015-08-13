
<div class="form">

            <h3>Registro de usuario</h3>

            <form  href="/testreference1.1/"action="home/register" method="POST">
              

              <p><label for="nombre">Nombre:</label>
              <input id="nombre" placeholder="Nombre" name="nombre" required/></p>

              <p><label for="apellido">Apellido:</label>
              <input id="apellidos" placeholder="Apellidos" name="apellidos" required/></p>
                            
              <p><label for="username">Username:</label>
              <input id = "username" placeholder="Username" name="username" required/></p>
              
              <p><label for="pass">Contrase&ntilde;a:</label>
              <input id="contrasenia"  type="password" placeholder="Contrase&ntilde;a" name="contrasenia" required/></p>

              <p><label for="universidad">Universidad:</label>
              <select id="cmbUniversidad" placeholder="Universidad" name="universidad" required>
                      <option value='0'>Universidades</option>
                      <?php  echo $param?>
              </select></p>

              <p><label for="programa">Programa:</label>
              <select id="cmbPrograma" placeholder="Programa" name="programa" required>
                      <option value='0'>Programas</option>
              </select></p>


              <input   type="submit" value="Registrar"/>
            </form>
</div>
