 <?php
  $start;
  $end;


 
function dateDiff($start, $end) 
	{
	  $date1_ts = strtotime($start);
	  $date2_ts = strtotime($end);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	
	?>