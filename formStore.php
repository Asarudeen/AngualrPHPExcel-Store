<?php 


	//print_r($_POST);

	//echo $_POST['name'];

	error_reporting(E_ALL);
	error_reporting(-1);
	ini_set('display_errors', 'On');


	/*$to      = 'asarudeen.b@medidart.com';
	$subject = 'New Registration';
	$message = '<h4>hi,</h4>'. "\r\n";
	$message .= '<p>You got an new register</p>';
	$headers = 'From: webmaster@example.com' . "\r\n";

	mail($to, $subject, $message, $headers);*/

	/*$xls = new Excel('Report');
	foreach ($rows as $num => $row) {
	  $xls->home();
	  $xls->label($row['id']);
	  $xls->right();
	  $xls->label($row['title']);
	  $xls->down();
	}
	ob_start();
	$data = ob_get_clean();
	file_put_contents(__DIR__ .'/report.xls', $data);*/

	/*include_once("includes/excel.php");

	$title = "Sheet1";
	$colors = array("red", "blue", "green", "yellow", "orange", "purple");

	ob_start();
	$xls = new Excel($title);
	$xls->top();
	$xls->home();
	foreach ($colors as $color)
	{
	$xls->label($color);
	$xls->right();
	$xls->down();
	};
	$data = ob_get_clean();
	print_r($data);
	file_put_contents('report.xls', $data);*/

	/** Include PHPExcel */
	require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';

	$objPHPExcel = PHPExcel_IOFactory::load("myfile.xlsx");
	$objPHPExcel->setActiveSheetIndex(0);
	$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $_POST['name']);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $_POST['email']);
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $_POST['phone']);
	/*$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $_POST['city']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $_POST['kid1']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $_POST['kid2']);*/
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('myfile.xlsx');


 ?>