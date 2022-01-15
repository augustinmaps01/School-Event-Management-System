<?php 
    include 'server/connect.php';
function generate($db){
    $content = '';
    $event = mysqli_real_escape_string($db, $_POST['event_name']);
    $sql = "SELECT * FROM event WHERE event_id = '$event'";
    $query = $db->query($sql);
    while($row = $query->fetch_assoc()){
        $date = date('F D Y - g:i A', strtotime($row['Date']));
  
        $id = $row['event_id'];
        $content .= '
          <tr>
          <td colspan = "3" align="center" style = "text-align:center; font-size:15px;"><b>'.$row['title'].'</b> </td>
          </tr>
          <tr>
          <td width = "40%">Name</td>
          <td width = "15%">Course&Year</td>
          <td width = "15%">Time Attended</td>
          <td width = "30%">Event Date</td>
          </tr>
        
        ';
        $sql = "SELECT event.Date, user_info.fname, user_info.mname, user_info.lname, user_info.course
        , user_info.year_level,event_attendance.Timestamp FROM event_attendance LEFT JOIN
         user_info ON user_info.School_ID = event_attendance.stud_id lEFT JOIN event ON event.event_id = event_attendance.event_id
          WHERE event_attendance.event_id = '$id' ORDER BY  user_info.lname,user_info.year_level ASC ";
        $equery = $db->query($sql);
        while($erow = $equery->fetch_assoc()){
          $attend = date('g:i A', strtotime($erow['Timestamp']));
            $content .= '
              <tr>
              <td>'.$erow['lname'].','.$erow['fname'].' '. $erow['mname']. '.'. '</td>
              <td>'.$erow['course']. '-'.$erow['year_level'].'</td>
              <td>'.$attend.'</td>
              <td> '.$date.'</td>
              </tr>
            ';
        }
    }
    return $content;
}
  require_once('../tcpdf/tcpdf.php');
  $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetTitle("CKC School Event Attendance");
  $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $pdf->SetDefaultMonospacedFont('halvetica');
  $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
  $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);
  $pdf->SetAutoPageBreak(TRUE,10);
  $pdf->SetFont('helvetica', '', 11);
  $pdf->AddPage();
  $contents = '';
  $contents .= '
    <h2  style =  "text-align:center;margin-bottom:-50%;">  CKC Event Attendance</h2>
    <table border = "1" cellspacing  = "0"  cellpadding= "4"> 
      ';
      $contents .= generate($db);
      $contents .= '</table>';
      $pdf->writeHTML($contents);
      $pdf->Output('attendance.pdf', 'I');




?>