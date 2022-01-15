<?php //? ----- Author: Austin Maps ------ ?>
<?php
include 'server/connect.php';
	function generateRow(){
        $contents = '';

       
        include_once('server/session.php');
        $log = mysqli_real_escape_string($db, $_POST['logs']);
		$sql = "SELECT  event.event_id, user_info.School_ID, evaluation_type.type, evaluation_type.id,
         event.title FROM studentevent_evaluation LEFT JOIN evaluation_answer_choice ON evaluation_answer_choice.id = studentevent_evaluation.answer_id
          LEFT JOIN event ON 
         event.event_id = studentevent_evaluation.event_id LEFT JOIN user_info ON 
         user_info.School_ID = studentevent_evaluation.stud_id LEFT JOIN evaluation_type 
         ON evaluation_type.id = studentevent_evaluation.Eval_type_id 
         WHERE Eval_type_id = '$log' GROUP BY user_info.School_ID, event.title ";

		//use for MySQLi OOP
		$query = $db->query($sql);
 while($row = $query->fetch_assoc()){
     $stud = $row['School_ID'];
     $event = $row['event_id'];
      $sql = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 5 AND stud_id = '$stud' AND event_id = '$event'";
      $query2 = $db->query($sql); 
     $total_strongly_agree = $query2->num_rows;

     $sql2 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 4 AND stud_id = '$stud' AND event_id = '$event'";
      $query3 = $db->query($sql2); 
     $total_agree = $query3->num_rows;

     $sql3 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 3 AND stud_id = '$stud' AND event_id  = '$event'";
     $query4 = $db->query($sql3); 
    $total_dis_agree = $query4->num_rows;

    $sql4 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 2 AND stud_id = '$stud' AND event_id = '$event'";
    $query5 = $db->query($sql4); 
   $total_sd_agree = $query5->num_rows;

   $sql5 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 1 AND stud_id = '$stud' AND event_id = '$event'";
   $query6 = $db->query($sql5); 
  $total_np = $query6->num_rows;
  
            $contents .= " 
            
            <tr>
               <td>".$stud."</td>
                <td style = 'text-align:center;'>".$row['title']."</td>
                <td>".$total_strongly_agree."</td>
                <td> ".$total_agree." </td>
                <td>".$total_dis_agree." </td>
                <td>".$total_sd_agree." </td>
                <td>".$total_np."</td>
              
                
            
             
			</tr>
            ";
            
               
        }


        return $contents;
        
    }

   function getBody(){
       $body = '';
       include 'server/connect.php';
    $log = mysqli_real_escape_string($db, $_POST['logs']);
    $sql = "SELECT user_info.School_ID, event.event_id, event.title FROM studentevent_evaluation
    LEFT JOIN user_info ON user_info.School_ID = studentevent_evaluation.stud_id LEFT JOIN 
    event ON event.event_id = studentevent_evaluation.event_id
     WHERE Eval_type_id = '$log' GROUP BY event.title";
     $querys = $db->query($sql);
     while($rows = $querys->fetch_assoc()){
         $stud = $rows['School_ID'];
         $events = $rows['event_id'];
        $total_s_a = 0;
        $total_a = 0;
        $total_ds_a = 0;
        $total_s_dsa = 0;
        $total_np = 0;
         $sql_select = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 5 AND event_id = '$events'";
         $sql_query = $db->query($sql_select);
         $count = $sql_query->num_rows;
         $total_s_a += $count;

         $sql_select2 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 4 AND event_id = '$events'";
         $sql_query2 = $db->query($sql_select2);
         $count2 = $sql_query2->num_rows;
         $total_a += $count2;

         $sql_select3 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 3 AND event_id = '$events'";
         $sql_query3 = $db->query($sql_select3);
         $count3 = $sql_query3->num_rows;
         $total_ds_a += $count3;

         $sql_select4 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 2 AND event_id = '$events'";
         $sql_query4 = $db->query($sql_select4);
         $count4 = $sql_query4->num_rows;
         $total_s_dsa += $count4;

         
         $sql_select5 = "SELECT * FROM studentevent_evaluation WHERE Eval_type_id = '$log' AND answer_id = 2 AND event_id = '$events'";
         $sql_query5 = $db->query($sql_select5);
         $count5 = $sql_query5->num_rows;
         $total_np += $count5;

       
         
         


        $body .= "
           <tr>
           
           <td>".$rows['title']."</td>
           <td>".$total_s_a." </td>
           <td> ".$total_a." </td>
           <td>".  $total_ds_a." </td>
           <td>".$total_s_dsa." </td>
           <td>". $total_np." </td>
         
           </tr>
        ";
  
     }
     return $body;
   }
   
 
  

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("CKC School Event Evaluation Tally");  
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
      	<h2 style = "text-align:center;font-size:25px;font-weight:normal;"> CKC School Evaluation Total Survey </h2>
      
       	<table  border="1"  cellpadding="5">  
           <tr>  
                <th>Student ID</th>
                <th style = "text-align:center;" width = "20%">Event title</th>
                <th style = "text-align:center;" width = "10%;">Strongly Agree</th>
                <th style = "text-align:center;" width = "10%;">Agree</th>
                <th style = "text-align:center;" width = "12%;">Dis-agree</th>
                <th style = "text-align:center;" width = "12%;">Strongly Dis-agree</th>
                <th style = "text-align:center;" width= "10%;">No opinion</th>
          

            

          

           </tr>  

      ';  
      
      
    
      
      
    $content .= generateRow();  
    $content .= '</table>'; 
    $content .= '<br>'; 
    $content .= '
      
      <h3>TOTAL TALLY </h3>
   
           <table style = "margin-left:50%;"   border="1"  cellpadding="5"> 
          
           <tr>  
           
                <th style = "text-align:center;" width = "25%">Event title</th>
                <th style = "text-align:center;" width = "15%;">Strongly Agree</th>
                <th style = "text-align:center;" width = "12%;">Agree</th>
                <th style = "text-align:center;" width = "13%;">Dis-agree</th>
                <th style = "text-align:center;" width = "12%;">Strongly Dis-agree</th>
                <th style = "text-align:center;" width= "12%;">No opinion</th>
              
          

            

          

           </tr>  

      ';  

    $content .= getBody();
   
    $content .= '</table>'; 
    $content .= '</center>';
    $content .= '<br>'; 
    



    $pdf->writeHTML($content);  
    

    $pdf->Output('evaluationtally.pdf', 'I');
	

?>