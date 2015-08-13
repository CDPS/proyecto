<div class="subirImg">

            <h3>Subir imagen</h3>

            <form href="/testreference1.1/" action="home/subirImagen" method="POST" enctype="multipart/form-data">
              <p><label for="Descripcion">Descripcion:</label>
              <input id="Descripcion" placeholder="Descripcion" name="descripcion" required/></p>
 			 
              <p><label for="semestre">Semestre:</label>
              <select id="cmbSemestre" placeholder="Semestre" name="semestre" required>
                      <option value='0'>Semestre</option>
                      <?php  echo $param?>
              </select></p>

              <p><label for="espacioA">Espacio Academico:</label>
              <select id="cmbEspacioA" placeholder="EspacioA" name="espacioA" required>
                      <option value='0'>Espacio Academico</option>
              </select></p>


               <p><label for="profesor">Profesor :</label>
              <select id="cmbProfesor" placeholder="Profesor" name="profesor" required>
                      <option value='0'>Profesor</option>
              </select></p>

              <input id="examinar" type="file" name="imagen"/>

              <input id="subImg" type="submit" value="Aceptar"/>
            </form>
</div>