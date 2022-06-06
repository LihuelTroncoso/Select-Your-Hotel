<div class="container pb-5 mb-sm-1">
    <!-- Categories grid-->


    
    <div class="row">
        <?php foreach($hotels as $hotel) : ?>
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 mb-grid-gutter">
                    <a class="card-img-tiles" href="">
                        <div class="main-img"><img src="<?php echo base_url(); ?>assets/images/hotels/<?php echo $hotel['image'];?>"></div>
                    </a>
                    <div class="card-body border mt-n1 py-4 text-center">
                        <h2 class="h5 mb-1"><?php echo $hotel['nombre']; ?></h2><a class="btn btn-pill btn-outline-primary btn-sm" href="<?php echo site_url('/hotel/'.$hotel['slug']); ?>">Mas información</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Category-->
    </div>
</div>