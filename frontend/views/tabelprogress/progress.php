<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Instansi;
use yii\helpers\ArrayHelper;

$this->title = 'Rekap SPO';
$this->params['breadcrumbs'][] = $this->title;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Peserta', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tampilkan Detail', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
<h4 style="background-color:#e1e1e1">
<p>Total <b><?= count($query2) ?></b> Instansi - dari <i><b><?= count($query1) ?></b> Instansi </i></p>
<p>Total 
	<b><?php foreach ($query3 as $dataprog): ?>
			<tr>
				<td> <?= $dataprog['grandtotal'] ?></td>
			</tr>
		<?php endforeach; ?>
	</b>
Peserta</p>
</h4>
<body class="hold-transition sidebar-mini layout-fixed">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><b><?php foreach ($query3 as $dataprog): ?>
			<tr>
				<td> <?= $dataprog['grandtotal'] ?></td>
			</tr>
		<?php endforeach; ?>
	</b></h3>

                <p>Instansi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
  </div>

</body>




<table class="table table-bordered table-striped">
	<thead style ='background-color:#000000'>
		<tr style="align-items: center;">
			<!-- <td>Kode Instansi</td> -->
			<td><b style="color: #ffffff">Nama Instansi</b></td>
			<td><b style="color: #ffffff">Total Peserta SPO</b></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($results as $dataprogres): ?>	
		<tr>
			<!-- <td> <?= $dataprogres['id_instansi'] ?></td> -->
			
			<td> <?= $dataprogres['nama_instansi'] ?></td>

			<td> <?= $dataprogres['test'] ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


</body>
</html>




            