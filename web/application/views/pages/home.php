<div class="container pb-5 mb-sm-1">
    <!-- Categories grid-->
    <div class="row">
        <?php foreach($hotel as $post) : ?>
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 mb-grid-gutter">
                    <a class="card-img-tiles" href="shop-style1-ls.html">
                        <div class="main-img"><img src="https://via.placeholder.com/340x326/FF8C00/000000" alt="Clothing"></div>
                        <div class="thumblist"><img src="https://via.placeholder.com/175x164/FF8C00/000000" alt="Clothing"><img src="https://via.placeholder.com/175x164/FF8C00/000000" alt="Clothing"></div>
                    </a>
                    <div class="card-body border mt-n1 py-4 text-center">
                        <h2 class="h5 mb-1"><?php echo $post['nombre']; ?></h2><span class="d-block mb-3 font-size-xs text-muted">Starting from <span class="font-weight-semibold">$49.99</span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="shop-style1-ls.html">Shop clothing</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Category-->
    </div>
</div>