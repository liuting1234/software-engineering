<?php
if(!defined('RAIN')) exit('Access Denied');


class patient
{
    public $page;
	public $pagesize = 15;	
	public $countnum;
    public $from;
	public $total;
	public $select;
	public $order = 'id';
	public $des = 'desc';
	public $sql;
	
	function de(){
		$this->condition();
	}
	
	function condition(){
		@mysql::connect();
        /*------------------------WHERE语句判断--------------------------------*/		
		$sway = getgpc('way');
		$ssource = getgpc('source');
		$swebsite = getgpc('website');
		$sclass = getgpc('class');
		$sdoctor = getgpc('doctor');
		$sappdate1 =  getgpc('appdate1');
		$sappdate2 =  getgpc('appdate2');
		$sstatus = getgpc('status');
		$sarrive1 = getgpc('arrive1');
		$sarrive2 = getgpc('arrive2');
		$sconsult = getgpc('consult');		
		
		if($sway == '' && $ssource == '' && $swebsite == '' && $sclass == '' && $sdoctor == '' && $sappdate1 == '' && $sappdate2 == '' && $sstatus == '' && $sarrive1 == '' && $sarrive2 == '' && $sconsult == ''){
			 $this->select = stripslashes(getgpc('select'));
		 }else{
			 $sarray = array("way"=>$sway,"source"=>$ssource,"website"=>$swebsite,"class"=>$sclass,"doctor"=>$sdoctor,"appdate1"=>$sappdate1,"appdate2"=>$sappdate2,"status"=>$sstatus,"arrive1"=>$sarrive1,"arrive2"=>$sarrive2,"consult"=>$sconsult);
			 $sarray1 = array();
			 $sarray2 = array();
			 $sarray3 = array();
			 $sarray4 = array();
			 $sarray5 = array();
			 $dayseconds = 86400;
			 foreach($sarray as $k=>$v){
				 if($v != '' && $k=='appdate1'){
					 $sarray1[] = "appdate >= '".$v."'";
				 }else if($v != '' && $k=='appdate2'){
					 $sarray2[] = "appdate <= '".$v."'";
				 }else if($v != '' && $k=='arrive1'){
					 $sarray3[] = "arrive >= '".strtotime($v)."'";		
				 }else if($v != '' && $k=='arrive2'){
					 $v = strtotime($v)+$dayseconds; 
					 $sarray5[] = "arrive <= '".$v."'";	
				 }else if($v != '' && $k!='appdate1' && $k!='appdate2' && $k!='arrive1' && $k!='arrive2'){
					 $sarray4[] = $k." = '".$v."'";
				 }
			 }
			 $sarraya = array_merge($sarray1,$sarray2,$sarray4,$sarray3,$sarray5);
			 
			 $arnum = count($sarraya);
			 if($arnum == 1){
				 $this->select = "WHERE ".current($sarraya);
			 }else if($arnum >=2){
				 $this->select = "WHERE ".current($sarraya);
				 for($i=2;$i <= $arnum; $i++ ){
					 $this->select = $this->select." and ".next($sarraya);
				 }
			 }		 		
		 }


		/*-结束----------------------------------------------------*/	
		
		if(getgpc('order') == ''){
	        $this->sql = 'ORDER BY '.$this->order;
		}else{
			$this->order = getgpc('order');
			$this->sql = 'ORDER BY '.$this->order;
		}
		
		if(getgpc('des') == ''){
			$this->sql = $this->sql.' '.$this->des;
		}else{
			$this->des = getgpc('des');
			$this->sql = $this->sql.' '.$this->des;
		}		
					
		$this->page = getgpc('page');
		if(!isset($this->page) || empty($this->page) || $this->page<=0){
			$this->page = 1;
		}else{
			$this->page = $this->page;
		}
		$result = mysql_query("SELECT count(*) from patient $this->select $this->sql");	
		if($row = mysql_fetch_array($result)) {
			$this->countnum = $row[0];  
		}
		$this->total = explode('.',$this->countnum/$this->pagesize);		
		if(strrpos($this->countnum/$this->pagesize,'.')){
			$this->total = $this->total[0]+1;
		} else{
			$this->total = $this->total[0];
		}	
		$this->from = ($this->page-1)*$this->pagesize;
		
		function show_page($total,$page,$select,$order,$des){
		    if(1 <= $page and $page <= $total){
			    if($page !=1){
					echo '<a href="?m=patient&page=1&select='.$select.'&order='.$order.'&des='.$des.'" class="pagenum">首页</a>';
				    echo '<a href="?m=patient&page='.($page-1).'&select='.$select.'&order='.$order.'&des='.$des.'" class="pagenum">上一页</a>';
			    }
			    if($total <=9){
				    for($i=1; $i <= $total; $i++){
						$divclass = $i==$page?'pagenum-select':'pagenum';
					    echo '<a href="?m=patient&page='.$i.'&select='.$select.'&order='.$order.'&des='.$des.'" class="'.$divclass.'">'.$i.'</a>';
				    }
			    }else{
				    if($page <=5 ){
					    for($i=1; $i <=9; $i++){
							$divclass = $i==$page?'pagenum-select':'pagenum';
						    echo '<a href="?m=patient&page='.$i.'&select='.$select.'&order='.$order.'&des='.$des.'" class="'.$divclass.'">'.$i.'</a>';
					    }
				    }else{
					    if($page+4 > $total){
						    for($i=$total-8;$i <= $total; $i++){
								$divclass = $i==$page?'pagenum-select':'pagenum';
							    echo '<a href="?m=patient&page='.$i.'&select='.$select.'&order='.$order.'&des='.$des.'" class="'.$divclass.'">'.$i.'</a>';
						    }
					    }else{
						    for($i=$page-4;$i <= $page + 4; $i++){
								$divclass = $i==$page?'pagenum-select':'pagenum';
						        echo '<a href="?m=patient&page='.$i.'&select='.$select.'&order='.$order.'&des='.$des.'" class="'.$divclass.'">'.$i.'</a>';
					        }
					    }
				    }
			    }
			    if($page != $total){
				    echo '<a href="?m=patient&page='.($page+1).'&select='.$select.'&order='.$order.'&des='.$des.'" class="pagenum">下一页</a>';
					echo '<a href="?m=patient&page='.$total.'&select='.$select.'&order='.$order.'&des='.$des.'" class="pagenum">尾页</a>';
			    }
		    }
		}
		$this->show_list();		
	}
	
	function show_list(){
		$result = mysql_query("SELECT * FROM patient $this->select $this->sql LIMIT $this->from,$this->pagesize");
		while($row = mysql_fetch_array($result)){
			$id[]=$row['id'];
			$yyh[]=$row['yyh'];
			$name[]=$row['name'];
			$sex[]=$row['sex'];
			$age[]=$row['age'];
			$contact[]=$row['contact'];
			$way[]=$row['way'];
			$source[]=$row['source'];
			$website[]=$row['website'];
			$keyword[]=$row['keyword'];
			$class[]=$row['class'];
			$appdate[]=$row['appdate'];
			$doctor[]=$row['doctor'];
			$memo[]=$row['memo'];
			$arrive[]=$row['arrive'];
			$consult[]=$row['consult'];
			$addtime[]=$row['addtime'];
			$address[]=$row['address'];
		}
		
		$result2 = mysql_query("SELECT * FROM class");
		while($row2 = mysql_fetch_array($result2,MYSQL_ASSOC)){
			foreach($row2 as $k=>$v){
				switch ($v){
					case 'source':
					$source2[] = $row2;
					break;
					case 'website':
					$website2[] = $row2;
					break;
					case 'illness':
					$illness2[] = $row2;
					break;
					case 'doctor':
					$doctor2[] = $row2;
					break;
				}
			}
		}
		
		$result5 = mysql_query("SELECT name FROM user WHERE u_right = '50'");
		while($row5 = mysql_fetch_array($result5)){
			$name5[]=$row5['name'];
		}		
		@mysql::close();
		require VIEW_PATH.'patient.tpl.php';
		mysql_free_result($result);		
	}
	
	function export(){
		@mysql::connect();
		$this->select = stripslashes(getgpc('select'));
		
		$result = mysql_query("SELECT * FROM patient $this->select");
		while($row = mysql_fetch_array($result)){
			$id[]=$row['id'];
			$yyh[]=$row['yyh'];
			$name[]=$row['name'];
			$sex[]=$row['sex'];
			$age[]=$row['age'];
			$contact[]=$row['contact'];
			$way[]=$row['way'];
			$source[]=$row['source'];
			$website[]=$row['website'];
			$keyword[]=$row['keyword'];
			$class[]=$row['class'];
			$appdate[]=$row['appdate'];
			$doctor[]=$row['doctor'];
			$memo[]=$row['memo'];
			$arrive[]=date('Y-m-d H:i:s',$row['arrive']);
			$consult[]=$row['consult'];
			$addtime[]=$row['addtime'];
			$address[]=$row['address'];
		}
		/*---------------PHPexcel----------------*/
		require_once LIB_PATH.'Classes/PHPExcel.php';
		ob_clean();
		$tablename = '预约报表数据'.date('Y-m-d H:i:s');
		/** Error reporting */
		error_reporting(E_ALL);

		//date_default_timezone_set('Europe/London');

		/** PHPExcel */
		//require_once '../Classes/PHPExcel.php';


		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");


		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
          		  ->setCellValue('A1', '预约号码')
				  ->setCellValue('R1', '号码')
				  ->setCellValue('B1', '姓名')
				  ->setCellValue('C1', '性别')
				  ->setCellValue('D1', '年龄')
				  ->setCellValue('E1', '电话')
				  ->setCellValue('F1', '预约方式')
				  ->setCellValue('G1', '媒体来源')
				  ->setCellValue('H1', '网站')
				  ->setCellValue('I1', '关键词')
				  ->setCellValue('J1', '病种分类')
				  ->setCellValue('K1', '预约时间')
				  ->setCellValue('L1', '预约医生')
				  ->setCellValue('M1', '备注')
				  ->setCellValue('N1', '到院时间')
				  ->setCellValue('O1', '咨询员')
				  ->setCellValue('P1', '登记时间')
				  ->setCellValue('S1', '患者地址');
				  
		if(isset($id) and is_array($id)){
			$i = 1;
		    foreach($id as $k=>$v) {
				$i = $i+1;
				if($sex[$k] == 1){
					$sex2 = '女';
				}else{
					$sex2 = '男';
				}
				if($way[$k] == 1){
					$way2 = '电话';
				}else{
					$way2 = '网络';
				}
				if($arrive[$k] == ''){
					$arrive2 = '未到';
				}else{
					$arrive2 = $arrive[$k];
				}
				$objPHPExcel->setActiveSheetIndex(0)
				          ->setCellValue('A'.$i, $yyh[$k])
						  ->setCellValue('R'.$i, $id[$k])
						  ->setCellValue('B'.$i, $name[$k])
						  ->setCellValue('C'.$i, $sex2)
						  ->setCellValue('D'.$i, $age[$k])
						  ->setCellValue('E'.$i, $contact[$k])
						  ->setCellValue('F'.$i, $way2)
						  ->setCellValue('G'.$i, $source[$k])
						  ->setCellValue('H'.$i, $website[$k])
						  ->setCellValue('I'.$i, $keyword[$k])
						  ->setCellValue('J'.$i, $class[$k])
						  ->setCellValue('K'.$i, $appdate[$k])
						  ->setCellValue('L'.$i, $doctor[$k])
						  ->setCellValue('M'.$i, $memo[$k])
						  ->setCellValue('N'.$i, $arrive2)
						  ->setCellValue('O'.$i, $consult[$k])
						  ->setCellValue('P'.$i, $addtime[$k])
						  ->setCellValue('S'.$i, $address[$k]);	
			}
		}
	  				  
		// Miscellaneous glyphs, UTF-8
		/*$objPHPExcel->setActiveSheetIndex(0)
           		 ->setCellValue('A4', 'Miscellaneous glyphs')
           		 ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
		*/		 

		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle('Sheet1');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client's web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$tablename.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		
		@mysql::close();
		mysql_free_result($result);		
		exit;
		}	
}
?>