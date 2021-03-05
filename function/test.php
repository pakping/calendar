<?php 
require '../DB/connect.php'; 
$p_event_startdate = '2021-03-07';
$p_event_enddate = '2021-03-08';
$z = 0; 
$sqla = "Select * from tbl_event where event_startdate >= '$p_event_startdate' and event_enddate <= '$p_event_enddate'";
$result2 = mysqli_query($con, $sqla);
while ($data = mysqli_fetch_array($result2)) {
                $id[$z] = $data['roomid'];
                $stime[$z] = $data['event_starttime'];
                $etime[$z] = $data['event_endtime'];
                
                echo $id[$z] . "<br>";
                echo $stime[$z] . "<br>";
                echo $etime[$z] . "<br>";
                $z = $z +1;
}
if ( $hasDuplicates = count($id) > count(array_unique($id)) )
{
    echo 'true';
}
else{
    echo 'false';
}


?>