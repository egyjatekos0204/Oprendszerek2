<div class="container">
	<div class="row">
		<div class="col"><h1 class="text-center"><?=$_GET['V']?></h2></div>
		</div>

		<div class="restaurants d-flex flex-row flex-wrap justify-content-center">
			<?php


			require_once DATABASE_CONTROLLER;

			if (getConnection()):
				$query = "SELECT * FROM restaurants INNER JOIN cities ON restaurants.cityId = cities.cid WHERE cities.name = :varos";
				$params = [ ':varos' => $_GET['V']];
                $datas = getList($query,$params);

            for ($i=0; $i < count($datas); $i++):?>
                    <div class="card mb-3 m-2" style="max-width: 460px;">
                        <div class="row no-gutters">
                            <div class="col-md-4 justify-content-center">
                                <img src="<?=PUBLIC_DIR.'pizza.png'?>" class="card-img" alt="...">
                                <a href="<?='index.php?P=etlap&etlapid='.$datas[$i]['id'].'&etteremneve='.$datas[$i]['name']?>"><button class="btn btn-success etlapbtn px-sm-30">Étlap</button></a>
                                <?php if(isset($_SESSION['logged'])):?><button class="btn btn-warning etlapbtn px-sm-30">Értékelés</button>
                            <?php endif;?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex align-items-center flex-column">
                                    <h5 class="card-title"><?=$datas[$i]['name'];?></h5>
                                    <p class="col card-text"><small class="text-muted">Átlagos szállítási idő</small><br><strong><?=$datas[$i]['szall_ido'];?> perc</strong></p>
                                    <p class="col card-text"><small class="text-muted">Szállítási díj</small><br><strong><?=$datas[$i]['szall_dij'];?> ft</strong></p>
                                    <p class="col card-text"><small class="text-muted">Értékelés</small><br><strong><?=number_format($datas[$i]['ertekeles_ossz']/$datas[$i]['ertekelok_szama'],2, '.', '');?></strong></p>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor;endif;?>
        </div>
</div>