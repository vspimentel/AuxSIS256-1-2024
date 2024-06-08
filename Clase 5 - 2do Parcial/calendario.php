<html> 
<head> 
<title>Calendario </title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<style type="text/css"> 
 
th, td { 
	font-family: Tahoma, Verdana; 
	font-size: 10px; 
	font-style: normal; 
	line-height: normal; 
	font-weight: normal; 
	font-variant: normal; 
	text-transform: none; 
	color: #666666; 
	text-decoration: none; 
} 
td { 
	color: #999999; 
} 
.current{ 
	font-family: Tahoma, Verdana; 
	font-size: 10px; 
	color: #666666; 
} 
 
</style> 
</head> 
<body> 
<?php 
 
$nommes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
$nomdia = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"); 
$dia = date("j"); 
$mes = date("n"); 
$diasemana = date("w"); 
$hoy = $nomdia[$diasemana]." ".$dia." de ".$nommes[$mes-1]." ".date("Y").""; 

$mes=$_GET['mes']; 
$anio=$_GET['anio']; 

$days = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); 
$days2Use = array(); 
for ($x=1; $x<=$days; $x++) $days2Use[] = $x; 

$jd = GregorianToJD($mes,1,$anio); 
$dayWeek = jddayofweek($jd,0); 
/*$v son los primeros DIAS*/ 
$v = 7 - $dayWeek; 
$start = ($dayWeek == 0) ? false : true; 

if ($v < 7) { 
	$m = 1; 
	$preDays2Use = array_filter($days2Use,'splitDays'); 
	/*preparamos para mostrar*/ 
	$rest = 7 - count($preDays2Use); 
	$fDays2Use = array(); 
	for ($y = 1; $y <= $rest; $y++) $fDays2Use[] = '&nbsp;'; 
	foreach ($preDays2Use AS $k => $v) $fDays2Use[] = $v; 
} 
$m = 0; 
$days2Use = array_filter($days2Use,'splitDays'); 
function splitDays($d) { 
	global $v, $start, $m; 
	$com = ($m) ? ($d > $v) : ($d <= $v); 
	if (($com) AND ($start)) return false; 
	return true; 
} 
$totRestDays = count($days2Use); 

$pre = $totRestDays % 7; 
if ($pre == 0) $top = $totRestDays / 7; 
else { $top = ($totRestDays / 7) + 1; $top = floor($top); } 

$spDays = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab"); 
?> 
<table cellpadding="0" cellspacing="2" width="200" border="0" style="text-align: center;"> 

  <tr > 
  <?php echo '<th bgstyle="color:#4069B1" scope="col">'.$nommes[$mes-1].' '.$anio.'</th>';?> 
  </tr> 
</table>
<table cellpadding="0" cellspacing="2" width="200" border="0" style="text-align: center;"> 

  <tr height="17"> 
  <?php foreach($spDays AS $dd) echo '<th bgstyle="color:#4069B1" scope="col">'.$dd.'</th>';?> 
  </tr> 
  <?php 
if ($v < 7) { 
	?><tr><?php 
	foreach ($fDays2Use AS $k => $v) echo '<td bgstyle="color:#F0F5FF">'.$v.'</td>'; 
	?><tr><?php  
} 
reset($days2Use); 
for ($x = 1; $x <= $top;$x++) { 
	$bgcolor = ($x % 2) ? "#FFFFFF" : "#F0F5FF"; 
	?><tr><?php 
	for ($p = 1; $p <= 7;$p++) { 
		?><td bgstyle="color:#<?php echo $bgcolor?>"><?php echo (current($days2Use)) ? current($days2Use) : "&nbsp;"?></td><?php  
		next($days2Use); 
	} 
	?></tr><?php  
} 
?></table><br> 
<font class="current"> 
 </font><br><br> 
</body> 
</html>