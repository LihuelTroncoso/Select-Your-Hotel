<h2><b><?= $title ?></b></h2>
<?php foreach($hotels as $hotel) : ?>
	<h4><?php echo $hotel['nombre']; ?></h4>
	<div class="row">
		<div class="col-md-3">
			<img class = "post-thumb" src="<?php echo site_url();?>assets/images/hotels/<?php echo $hotel['image']; ?> ">
		</div>
		<div class="col-md-9">
			<small class="post-date">Arrival: <?php echo $hotel['dateStart']; ?> </small><br>
			<small class="post-date">Departure: <?php echo $hotel['dateEnd']; ?> </small><br>
			<?php echo word_limiter($post['body'], 60)?>
			<br> <br>
			<p><a class = "btn btn-default" href="<?php echo site_url('/hotel/'.$hotel['idHotel']); ?>">Mas información</a></p>
		</div>
	</div>
<?php endforeach; ?>