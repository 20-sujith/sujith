<?php

function generateRow()
{
	require("connection.php");
		$contents = '';
	 	
$res=$con->query("SELECT*FROM `tb_regfrom` JOIN `states` ON tb_regfrom.state=states.stat_id JOIN `countries` ON states.country_id=countries.cont_id");
	   	$id=1;
			while($row=$res->fetch_assoc())
			{
	      	
			$contents .= '
			<tr>
				<td>'.$id++.'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['password'].'</td>
				<td>'.$row['name'].'</td>   
				<td>'.$row['sname'].'</td>
				
			</tr>
			';
		}

   
		return $contents;
	}
		

	
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
      
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	

      		
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
         	<th>SL.NO</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>PASSWORD</th>
			<th>COUNTRY</th>
			<th>STATE</th>
			
			
			
           </tr>  
      ';  
   $content .= generateRow(); 
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Report.pdf', 'I');

?>