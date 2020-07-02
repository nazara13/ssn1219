<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Instansi;
use yii\helpers\ArrayHelper;

$this->title = 'Rekap SPO';
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Peserta', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tampilkan Detail', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

<p>Total <b><?= count($query2) ?></b> Instansi - dari <i><b><?= count($query1) ?></b> Instansi </i></p>
<p>Total 
	<b><?php foreach ($query3 as $dataprog): ?>
			<tr>
				<td> <?= $dataprog['grandtotal'] ?></td>
			</tr>
		<?php endforeach; ?>
	</b>
Peserta</p>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<!-- <td>Kode Instansi</td> -->
			<td>Nama Instansi</td>
			<td>Total Peserta SPO</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($query2 as $dataprogres): ?>	
		<tr>
			<!-- <td> <?= $dataprogres['id_instansi'] ?></td> -->
			
			<td> <?= $dataprogres['total'] ?></td>

			<td> <?= $dataprogres['totalPeserta'] ?></td>td
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>



            