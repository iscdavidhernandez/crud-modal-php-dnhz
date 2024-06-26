<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLavel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoModalLavel">Agregar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guarda.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre"class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion"class="form-label">Descripción:</label>
                <textarea  name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="genero"class="form-label">Genero:</label>
                <select  name="genero" id="genero" class="form-control" required>
                    <option value="">Seleccionar...</option>
                    <?php while($row_genero = $generos->fetch_assoc()){ ?>
                        <option value="<?php echo $row_genero["id"];?> "> <?= $row_genero["nombre"] ?> </option> 
                    <?php } ?> 
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="poster"class="form-label">Poster:</label>
                <input type="file" name="poster"id="poster" class="form-control" accept="image/jpeg">
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
       </div>
    </div>
  </div>
</div>