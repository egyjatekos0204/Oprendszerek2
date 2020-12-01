<div class="container">
	<div class="row">
		<div class="col"><h1 class="text-center"><?=$_GET['etteremneve']?></h2></div>
		</div>

		<div class="restaurants d-flex flex-row flex-wrap justify-content-center">
			<?php


			require_once DATABASE_CONTROLLER;

			if (getConnection()):
				$query = "SELECT * FROM foods WHERE restid = :etlapid";
				$params = [ 'etlapid' => $_GET['etlapid']];
				$datas = getList($query,$params);

				for ($i=0; $i < count($datas); $i++):?>
					<div class="card m-3">
						<h5 class="card-header"><?=$datas[$i]['fname']?></h5>
						<div class="card-body">
							<h5 class="card-title"><?=$datas[$i]['fprice']?> ft</h5>
							<?php if(isset($_SESSION['logged']) && $_SESSION['logged']): ?><a href="#" class="btn btn-primary">Rendelés</a>
							<?php else: ?>
								<a href="#" class="btn btn-secondary">Kérlek jelentkezz be!</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endfor;endif;?>
			</div>
		</div>
