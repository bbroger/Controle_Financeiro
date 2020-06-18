    <?php
    if(!isset($_SESSION['id'])){
      header("Location: sai.php");
  }
    $renda = $cli->porData($link, $_mes_atual, $_ano_atual, "Entrada", $_id_usuario);
    $dispesa = $cli->porData($link, $_mes_atual, $_ano_atual, "Saida", $_id_usuario);
    
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'], <?php
          while($rendas = mysqli_fetch_assoc($renda)){ 
          $valor = number_format($rendas['valor'], "2", ".", ""); 
          $comercio = $rendas['comercio']; ?>
          ['<?=$comercio?> R$<?=$valor?>',     <?=$valor?>], <?php } ?>
          ['',    0]
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'], <?php
          while($dispesas = mysqli_fetch_assoc($dispesa)){ 
            $valor = number_format($dispesas['valor'], "2", ".", "");    
          $comercio = $dispesas['comercio']; ?>
          ['<?=$comercio?> R$<?=$valor?>',     <?=$valor?>], <?php } ?>
          ['',    0]
        ]);
        var options = {
          title: 'Rendas Mês',
          is3D: true,
        };
        var options2 = {
          title: 'Gastos Mês',
          
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart2.draw(data2, options2);
      }
    </script>
 
 
    

  

