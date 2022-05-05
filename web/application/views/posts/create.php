<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>

<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="title" placeholder="Nombre Completo">
  </div>

  <div class="form-group">
    <label>Direccion de origen</label>
    <input type="text" class="form-control" name="direccion_origen" placeholder="Dirección">
  </div>

  <div class="form-group">
    <label>Fecha de inicio</label>
    <input type="date" id="start" name="fecha_origen"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">
  </div>
  
  <div class="form-group">
    <label>Direccion de destino</label>
    <input type="text" class="form-control" name="direccion_destino" placeholder="Dirección">
  </div>

  <div class="form-group">
    <label>Fecha final</label>
    <input type="date" id="start" name="fecha_destino"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">
  </div>

  <div class="form-group">
    <label>Descripción</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>

  <div class="form-group">
    <label>Subir imagen</label>
    <input type="file" name="userfile" size="20">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
  
  
  <!--
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category): ?>
    	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  -->

  
</form>