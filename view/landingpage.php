
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NWCS</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dashboard.css" rel="stylesheet">
  </head>
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Metode Transportasi Nort West Corner</a>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <div class="list-group panel">
                <a href="landingpage.php" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-dashboard"></i> <span class="btn btn-primary">Ulangi</span></a>
            </div>
        </nav>
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
      <div class="card text-center">
        <div class="card-header"></div>
        <div class="card-body">
          <h4 class="card-title">Masukkan Banyak Data Dari Supply dan Demand</h4>
      
  </body>
    <center>
      <table border='0'>
    <tr>
      <td align='left'>
        Jumlah Supply
      </td>
      <td colspan='2'align='left'>
        <input type='text' id='supply' class='data'>
      </td>
    </tr>
    <tr>
      <td align='left'>
       Jumlah Demand
      </td>
      <td colspan='2'align='left'>
        <input type='text' id='demand' class='data'>
      </td>
    </tr>
    <tr>
      <td colspan='2' align='center'>
       <input class="btn btn-primary" type='button' value='Input Banyak Data' onClick="banyak_data();"></td>
    </tr>
  </table>
</center>
<br>
<br>
<style>
  .data{
    text-align:center;
    width:80px;
  }
</style>
<center>
<div id='tabsatu' ></div> <div id='tabdua' ></div> <div id='tabtiga' ></div>
<script type='text/javascript'>
function banyak_data()
{
  supply = parseFloat(document.getElementById('supply').value);
  demand = parseFloat(document.getElementById('demand').value);
  nwc = "";
  nwc = "<h4>Masukkan Nilai Supply dan Demand</h4>";
  nwc += "<table border='0' align='center'>";
  for (a=0;a<supply ;a++ ){
    b = a+1;
    nwc += "<tr><td align='left'>Supply "+b+"</td><td align='left' colspan='2'><input type='text' id='supply_"+a+"' class='data'></td></tr>";
  }
  for (a=0; a<demand; a++ ){
    b = a+1;
    nwc += "<tr><td align='left'>Demand "+b+"</td><td align='left' colspan='2'><input type='text' id='demand_"+a+"' class='data'></td></tr>";
  }
  nwc += "<tr align='right'><td colspan='2'><input class='btn btn-primary' type='button' onClick=\"cek("+supply+","+demand+");\" value='Input Nilai'>";
  nwc += "</td></tr></table><br>";
  document.getElementById('tabsatu').innerHTML = nwc;
  document.getElementById('tabdua').innerHTML = "";
  document.getElementById('tabtiga').innerHTML = "";
}

function cek(supply,demand)
{
  supply_ = new Array();
  demand_ = new Array();
  nsupply_ = new Array();
  ndemand_ = new Array();
  jumlah_supply = 0;
  jumlah_demand = 0;
  alokasi = new Array();
  for (a=0;a<supply;a++)
  {
    supply_[a] = parseFloat(document.getElementById('supply_'+a).value);
    nsupply_[a] = supply_[a];
    jumlah_supply += supply_[a];
  } 
  for (a=0;a<demand;a++)
  {
    demand_[a] = parseFloat(document.getElementById('demand_'+a).value);
    ndemand_[a] = demand_[a];
    jumlah_demand += demand_[a];
  } 
  if (jumlah_supply==jumlah_demand)
  {
    nwc = "";
    nwc = "<h4>Masukkan Biaya Untuk Supply dan Demand</h4>";
    nwc += "<table border='1' align='center'><tr><td align='center'></td>";

    for(a=0;a<demand;a++){
      b=a+1;
      nwc += "<td align='center' colspan='2'> Demand "+b+"</td>";
    }

    nwc += "<td align='center'>Supply</td>";

    for(a=0;a<=demand;a++){
      alokasi[a] = new Array();
      for(b=0;b<=supply;b++)
      {
        if(nsupply_[b]!=0)
        {
          if(ndemand_[a]>nsupply_[b])
          {
            alokasi[a][b]=nsupply_[b];
            nsupply_[b]=0;
            ndemand_[a]=ndemand_[a]-alokasi[a][b];
          }
          else
          {
            alokasi[a][b]=ndemand_[a];
            ndemand_[a]=0;
            nsupply_[b]=nsupply_[b]-alokasi[a][b];
          
          }
          if(alokasi[a][b]==0){
            alokasi[a][b]="";
          }
        }
        else
        {
          alokasi[a][b]="";
        }
      }
    }
  
    for (a=0;a<supply;a++){
      b =a+1;
      nwc += "<tr><td align='center' rowspan='2'>Supply "+b+"</td>";

      for (c=0;c<demand;c++){
        nwc += "<td width='70px' rowspan='2' align='center'><font color='red'>"+alokasi[c][a]+"</font></td><td align='center'><input type='text' id='cost_"+c+"."+a+"' class='data'></td>"; 
      }
        nwc += "<td align='center' rowspan='2'><font color='#0033FF'>"+supply_[a]+"</font></td></tr><tr>";
      
      for (d=0;d<demand;d++){
        nwc += "<td align='center'height='20px'></td>"; 
      }
      nwc += "</tr>";
      }
      nwc+= "<tr><td align='left'>Demand</td>";

    for(a=0;a<demand;a++)
    {
      nwc += "<td align='center' colspan='2'><font color='#0033FF'>"+demand_[a]+"</font></td>";
    }
      data = (demand*2)+2;
    nwc += "<td align='center'><font color='#CC00FF'>"+jumlah_supply+"</font></td></tr></table>";
    nwc += "<table><tr><td colspan='"+data+"' align='center'><input class='btn btn-primary' type='button' onclick=\"hitung_biaya('"+supply+","+demand+"');\" value='Hitung Biaya'></td></tr>";
    nwc += "</table><br>";
    document.getElementById('tabdua').innerHTML = nwc;
    document.getElementById('tabtiga').innerHTML = "";
  }
  else
  {
    alert('Maaf Jumlah Supply dan Demand Harus Sama !');
  }
}

function hitung_biaya(supply,demand)
{
  cost = new Array();
  alokasi = new Array();
  supply_ = new Array();
  demand_ = new Array();
  nsupply_ = new Array();
  ndemand_ = new Array();
  jumlah_supply = 0;
  jumlah_demand = 0;
  biaya_optimal = 0;
  supply = parseInt(document.getElementById('supply').value);
  demand = parseInt(document.getElementById('demand').value);
  for (a=0;a<demand ;a++ )
  {
    cost[a] = new Array();
    for (c=0; c<supply; c++){
      cost[a][c] = parseFloat(document.getElementById('cost_'+a+'.'+c).value);
    }
  }
  for (a=0;a<supply;a++)
  {
    supply_[a] = parseFloat(document.getElementById('supply_'+a).value);
    nsupply_[a] = supply_[a];
    jumlah_supply += supply_[a];
  } 
  for (a=0;a<demand;a++)
  {
    demand_[a] = parseFloat(document.getElementById('demand_'+a).value);
    ndemand_[a] = demand_[a];
    jumlah_demand += demand_[a];
  }
  for(a=0;a<=demand;a++){
    alokasi[a] = new Array();
    for(b=0;b<=supply;b++){
      if(nsupply_[b]!=0){
        if(ndemand_[a]>nsupply_[b]){
          alokasi[a][b]=nsupply_[b];
          nsupply_[b]=0;
          ndemand_[a]=ndemand_[a]-alokasi[a][b];
        }
        else{
          alokasi[a][b]=ndemand_[a];
          ndemand_[a]=0;
          nsupply_[b]=nsupply_[b]-alokasi[a][b];
        }
        if(alokasi[a][b]==0){
          alokasi[a][b]="";
        }
      }
      else{
        alokasi[a][b]="";
      }
    }
  }
  nwc = "";
  nwc = "<h4>Hasil Untuk Metode Transportasi North West Corner</h4>";
  nwc += "<table border='1' align='center'><tr><td align='center'></td>";
  for(a=0;a<demand;a++){
    b = a+1;
    nwc += "<td align='center' colspan='2'> Demand "+b+"</td>";
  }
  nwc += "<td align='center'>Supply</td>";
  for (a=0; a<supply; a++){
    b =a+1;
    nwc += "<tr><td align='center' rowspan='2'> Supply "+b+"</td>";
    for (c=0; c<demand; c++){
      nwc += "<td width='70px' rowspan='2' align='center'><font color='red'>"+alokasi[c][a]+"</font></td><td align='center' class='data'>"+cost[c][a]+"</td>";
      if (alokasi[c][a]==""){
        alokasi[c][a]=0;
      }
      biaya_optimal += (alokasi[c][a]*cost[c][a]);
    }
      nwc += "<td align='center' rowspan='2'><font color='#0033FF'>"+supply_[a]+"</font></td></tr><tr>";

    for (d=0;d<demand;d++){
      nwc += "<td align='center'height='20px'></td>"; 
    }
    nwc += "</tr>";
  }
  nwc += "<tr><td align='left'>Demand</td>";
  for(a=0;a<demand;a++){
    nwc += "<td align='center' colspan='2'><font color='#0033FF'>"+demand_[a]+"</font></td>";
  }   
  nwc += "<td align='center'><font color='#CC00FF'>"+jumlah_supply+"</font></td></tr></table><br>";
  nwc += "<h4>Total Biaya Transportasi sebesar RP "+biaya_optimal+"</span></h4><br>";
  document.getElementById('tabtiga').innerHTML = nwc;

}
</script>
</body>
</html>