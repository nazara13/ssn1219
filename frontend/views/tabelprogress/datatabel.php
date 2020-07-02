<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Userspo;
use app\models\Instansi;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\web\AssetBundle;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserspoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekap SPO ASN dan Mitra BPS Batu Bara';
$this->params['breadcrumbs'][] = $this->title;
?>



    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->
        <!-- Styles -->
        <style>
          body {
              padding-top: 20px;
              padding-bottom: 20px;
            }

            .navbar {
              margin-bottom: 20px;
            }
        </style>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


        <!-- ini cuman untuk bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- ini untuk datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- <script src="{{asset('js/dataTables.buttons.min.js')}}"></script> -->
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


    </head>
<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Kolom Data Indonesia</a> -->
            <h1><?= Html::encode($this->title) ?></h1>
                    <p>
                        <?= Html::a('Tambah Peserta', ['create'], ['class' => 'btn btn-success']) ?>
                        <?= Html::a('Tampilkan Detail', ['index'], ['class' => 'btn btn-success']) ?>
                    </p>
                <a class="navbar-header">
                <h4 style="background-color:#e1e1e1">
                <p>Total <b><?= count($query2) ?></b> Instansi - dari <b><?= count($query1) ?></b> Instansi </p>
                <p>Total 
                    <b><?php foreach ($query3 as $dataprog): ?>
                            <tr>
                                <td> <?= $dataprog['grandtotal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </b>
                Peserta</p>
                </h4>
                </a>
          </div>
          <!-- <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="http://kolomdata.com/" target="_blank">Home</a></li>
            </ul>
          </div> -->
        </div><!--/.container-fluid -->
      </nav>

    <table id="datatables" class="table table-bordered table-striped">
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
        <tfoot>
        <?php foreach ($query3 as $dataprog): ?>
            <tr>
                <th>Total</th>
                <th><?= $dataprog['grandtotal'] ?></th>
            </tr>
        <?php endforeach; ?>
        </tfoot>
        </tbody>
    </table>
</div>


<!-- <script type="text/javascript">
    
    $(document).ready(function () {
        $('#datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script> -->

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#datatables').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy', 'print'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>