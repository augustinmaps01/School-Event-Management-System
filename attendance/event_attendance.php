<?php  include '../student_admin/session.php'; ?>
<?php 
if(isset($_POST['event_id'])){
    $id = mysqli_real_escape_string($db, $_POST['event_id']);
    $sid = mysqli_real_escape_string($db, $_POST['s_id']);
    $pass = mysqli_real_escape_string($db, $_POST['passw']);
    $query = mysqli_query($db,  "SELECT * FROM user_account WHERE Account_ID='$sid' AND Password = '$pass'");
	$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$sql = mysqli_query($db, "SELECT * FROM user_info WHERE School_ID = '$sid'") or die(mysqli_error($db));
	$rows =mysqli_fetch_array($sql, MYSQLI_ASSOC);
	$image = (!empty($rows['image'])) ? '../images/' .$rows['image'] : '../images/avatar.png';
    $status = 'Present';
	 $sql = "SELECT * FROM event_attendance WHERE event_id = '$id' AND stud_id = '$sid'";
	 $test = $db->query($sql);
$sqr = mysqli_query($db, "SELECT * FROM user_account WHERE usertype = 1");
$rod = mysqli_fetch_array($sqr, MYSQLI_ASSOC);
$ni = $rod['Account_ID'];
$sql_event = "SELECT * FROM event WHERE event_id = '$id'";
$event_query = $db->query($sql_event);
$event_row = $event_query->fetch_assoc();
$sqli ="SELECT * FROM event_absent WHERE event_id = '$id'";
$resulta = $db->query($sqli);





		if($test->num_rows > 0){
		echo "<br>Already Logged in!!!....";	
	}else{
		if($query->num_rows==0 || $row['usertype'] == 1){
			
			  echo '<br><div style = "color:#ff6d6d;text-align:center;color"><Strong> ID and Password Not Found  </Strong> </div>';
		}elseif(!$sid && !$pass){
			echo '<div style="text-align:center; color:yellow;"><strong>Please Enter ID amd Password!</strong></div>';
		}
		
		else{
			$insert = mysqli_query($db,"INSERT INTO event_attendance(stud_id,password,event_id,status)values('".$sid."', '".$pass."', '".$id."','".$status."')");
			
		
			if($insert){
			
			if($event_row['type'] == 'College Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' ";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
                    $del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			
		           
			}else if($event_row['type'] == 'BSIT Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSIT'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			}else if($event_row['type'] == 'BSN Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSN'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}

			}else if($event_row['type'] == 'TEP Only'){
                    if($resulta->num_rows == 0){
						$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSED' AND course = 'BEED'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
					
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			}else if($event_row['type'] == 'BSBA Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSBA'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}

			}else if($event_row['type'] == 'BSHRM Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSHRM'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			}else if($event_row['type']== 'BSCRIM Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSCRIM'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			}else if($event_row['type'] == 'BSSW Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSSW'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
			
			}else if($event_row['type'] == 'BSA Only'){
				if($resulta->num_rows == 0){
					$sqls = "SELECT * FROM user_info WHERE NOT School_ID = '$sid' AND NOT School_ID = '$ni' AND course ='BSA'";
					$qr = $db->query($sqls);
					while($abrow = $qr->fetch_assoc()){
						$stud = $abrow['School_ID'];
						$insert_absent = mysqli_query($db, "INSERT INTO event_absent(stud_id, event_id)VALUES('$stud', '$id')");
						$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
				}
    
			}else if($event_row['type'] == 'SportsClub Only'){
				if($resulta->num_rows == 0){
					$sql4= "SELECT * FROM user_info WHERE Club_name = 'Sports Club' ";
					$query_sql = $db->query($sql4);
					while($crow = $query_sql->fetch_assoc()){
						$s_id = $crow['School_ID'];
						$insert_query = mysqli_query($db, "INSERT INTO event_absent (stud_id, event_id) VALUES('$s_id', '$id')");
					    $del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");

				}
			}else if($event_row['type'] == 'Mo.Ignacia Club Only'){
				if($resulta->num_rows == 0){
					$sql4= "SELECT * FROM user_info WHERE Club_name = 'Mo.Ignacia Club'";
					$query_sql = $db->query($sql4);
					while($crow = $query_sql->fetch_assoc()){
						$s_id = $crow['School_ID'];
						$insert_query = mysqli_query($db, "INSERT INTO event_absent (stud_id, event_id) VALUES('$s_id', '$id')");
					    $del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");

				}
			}
			else if($event_row['type'] == 'Society & Cultural Club'){
				if($resulta->num_rows == 0){
					$sql4= "SELECT * FROM user_info WHERE Club_name = 'Society & Cultural Club'";
					$query_sql = $db->query($sql4);
					while($crow = $query_sql->fetch_assoc()){
						$s_id = $crow['School_ID'];
						$insert_query = mysqli_query($db, "INSERT INTO event_absent (stud_id, event_id) VALUES('$s_id', '$id')");
					    $del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");

				}
			}
			else if($event_row['type'] == 'Peer Facilatator Club'){
				if($resulta->num_rows == 0){
					$sql4= "SELECT * FROM user_info WHERE Club_name = 'Peer Facilatator Club'";
					$query_sql = $db->query($sql4);
					while($crow = $query_sql->fetch_assoc()){
						$s_id = $crow['School_ID'];
						$insert_query = mysqli_query($db, "INSERT INTO event_absent (stud_id, event_id) VALUES('$s_id', '$id')");
					    $del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");
					}
				}else{
					$del = mysqli_query($db, "DELETE FROM event_absent WHERE stud_id = '$sid' AND event_id = '$id'");

				}
			}

			
				
		
		
			}
		

			if(!$insert){
				echo "You are not welcome.";
			}
			else{
				if(empty($rows['mname'])){
					echo "<br> WELCOME!!<br><br>  <i> ". "<img src = '".$image."'width = '70' height = '75'". "</i>";
					echo "  ".$rows['lname'].", ".$rows['fname']. " " ;
				}else{
					echo "<br> WELCOME!!<br><br>  <i> ". "<img src = '".$image."'width = '70' height = '75'". "</i>";
					echo "  ".$rows['lname'].", ".$rows['fname']. " " .$rows['mname'].".";
				}
			
			}		
		}
	}


}
?>