           <div class="page-header">
                <div class="page-header-title">
                    <h4><?php echo $title; ?></h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <?php //print_r($viewBlogComments); ?>
                        <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/add-hotel">Add hotels</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/list-hotel">List hotels</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">                           
                            <div class="card-block">
                            <?php echo form_open_multipart('administrator/add-hotel'); ?>
                                <div class="form-group col-sm-8">
                                  <label>Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="...">
                                </div>

                                <div class="form-group col-sm-8">
                                  <label>Descripcion</label>
                                  <input type="body" class="form-control" name="descripcion" placeholder="...">
                                </div>

                                <div class="form-group col-sm-6">
                                  <label>Upload Image</label><br>
                                  <input type="file" class="form-control" name="userfile" size="20">
                                </div>

                                <h3>Habitaciones</h3>
                                <div class="form-group col-sm-6">
                                  <label>Total de Habitaciones</label><br>
                                  <input type="number" class="form-control" name="habitaciones" size="20">
                                </div>

                                <div class="form-group col-sm-6">
                                  <label>Disponibles</label><br>
                                  <input type="number" class="form-control" name="habitacionesDisp" size="20">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>