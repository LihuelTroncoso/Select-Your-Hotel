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
                        <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/add/blog">Add Blogs</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/blogs/list-blog">List Blogs</a>
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
                            <?php echo form_open_multipart('administrator/update-hotel'); ?>
                              <input type="hidden" name="id" value="<?php echo $hotels['idHotel']; ?>">
                                  <div class="form-group col-sm-8">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Add Title" value="<?php echo $hotels['nombre']; ?>">
                                  </div>
                                  <div class="form-group col-sm-12">
                                    <label>Descripcion</label>
                                    <textarea id="editor1" class="form-control" name="descripcion" placeholder="Add Body"><?php echo $hotels['descripcion']; ?></textarea>
                                  </div>
                                    <div class="form-group col-sm-6">
                                        <label>Current Blog Image</label>
                                        <div class="col-sm-10">
                                           <img src="<?php echo site_url();?>assets/images/hotels/<?php echo $hotels['image']; ?>" width="100px">
                                        </div>
                                    </div>
                                  <div class="form-group col-sm-6">
                                    <label>Upload New Image</label><br>
                                    <input type="file" name="userfile" class="form-control" size="20" value="" >
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