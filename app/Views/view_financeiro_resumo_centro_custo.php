<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
</head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script src="assets/js/jquery.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Valor'],
          <?php
            if(isset($resultado)) {
              foreach($resultado as $r){
                echo '["'. $r["ds_centroCusto"] . ' - ' . $r["SUM(nr_valorParcela)"] . '" ,' . $r["SUM(nr_valorParcela)"] . '],';
              }
            }
            else {
              echo '["Selecione data DE e ATE + Filtro (receber ou pagar)",' . 1 . ']';
            }
          ?>
        ]);

        var options = {
          title: 'Resumo Financeiro - centro de custo',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
<body>
<?php echo $this->include('view_menu'); ?>
    <div class="card" style="margin-top: 56px">
        <div class="card-header">
            <h5>Financeiro - Resumo de contas por centro de custo</h5>
        </div>
    </div>
    <form class="form-horizontal" method="post">
      <div class="row align-items-start" style="margin-left: 24px">
        <div class="col-sm-3">
          <div class="control-group">
              <label class="control-label">Filtrar de:</label>
              <div class="controls">
                  <input class="form-control" required="" name="dt_inicio" type="date">
              </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="control-group">
              <label class="control-label">Filtrar até:</label>
              <div class="controls">
                  <input class="form-control" required="" name="dt_fim" type="date">
              </div>
          </div>
        </div>
        
        <div style="margin-top: 32px">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioPagar">
                <label class="form-check-label">Contas a pagar</label>
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioReceber">
                <label class="form-check-label">Contas a receber</label>
            </div>
        </div>
        
        <div class="col-sm-3">
          <div class="controls" style="margin-top: 24px">
            <button type="submit" value="<?php echo $acao ?>" class="btn btn-success"><?php echo $acao ?></button>
          </div>
        </div>
      </div>
    </form>
    <!--Div that will hold the pie chart-->
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
</body>
</html>