<?php //? ----- Author: Austin Maps ------ ?>
<?php
	function generateRow(){
		$contents = '';
        include_once('server/connect.php');
        $month =mysqli_real_escape_string($db, $_POST['month']);
		$sql = "SELECT * FROM event WHERE Date LIKE '%$month%'";

		//use for MySQLi OOP
		$query = $db->query($sql);
		while($row = $query->fetch_assoc()){
            $date = date('F d Y', strtotime($row['Date']));
            $time = date('g:i A', strtotime($row['start_time']));
            $time2 = date('g:i A', strtotime($row['end_time']));
            $contents .= "
            
			<tr>
				<td>".$row['title']."</td>
				<td>".$date."</td>
				<td>".$time. ' - '.$time2."</td>
                <td>".$row['venue']."</td>
                <td>".$row['type']."</td>
			</tr>
			";
		}
	
		
		return $contents;
	}

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("CKC School Events");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '13', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 7);  
    $pdf->SetFont('helvetica', '', 10);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 style = "text-align:center;font-size:25px;font-weight:normal;"> CKC School Event List</h2>
      	<h4>Event List</h4>
      	<table border="1"  cellpadding="3">  
           <tr>  
                <th>Event Title</th>
				<th>Date</th>
				<th>Time</th>
                <th width = "25%">Venue</th> 
                <th>Type</th>

           </tr>  
      ';  



    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('ckcEvent.pdf', 'I');
	

?>