<?php
if(!defined('RAIN') || !defined('RAIN_USER')) exit('Access Denied');

class main
{
	public $source;
	public $appdate;
	public $arrive;
	public $addtime;	
	public $topnum;
	public $mounth;
	public $frommounth;
	public $total;
	public $title;
	
	function de(){
		require VIEW_PATH.'main.tpl.php';
		//$this->draw();
	}
	
	function draw(){
		$this->read_data();
	}
	
	function read_data(){
		@mysql::connect();
		$this->frommounth = date("Y-m");
		$thismouth = date("m");
		$thisday = date('d');
				
		$way = getgpc('way');
		if($way == '1'){
			$select = 'way = 1 AND';
			$this->title = $this->frommounth."电话统计图";
		}else if($way == '2'){
			$select = 'way = 2 AND';
			$this->title = $this->frommounth."网络统计图";
		}
		
		for($i = 1; $i <= $thisday; $i++){
			if($i < 10){
				$this->mounth[] = $thismouth.'-0'.$i;
			}else{
				$this->mounth[] .= $thismouth.'-'.$i;
			}
		}
		$resultaddtime = mysql_query("SELECT source,addtime FROM patient WHERE $select addtime >= '$this->frommounth' ORDER BY addtime ASC");
		while($row = mysql_fetch_array($resultaddtime,MYSQL_ASSOC)){
			$this->addtime[] = date("m-d",strtotime($row['addtime']));
			if($way == 2) $this->source[] = $row['source'];
		}		
		$this->addtime = isset($this->addtime)?$this->addtime:array();
		$this->source = isset($this->source)?$this->source:array();
		
        $appdatethisday = $this->frommounth.'-'.$thisday;
		$resultappdate = mysql_query("SELECT appdate FROM patient WHERE $select appdate >= '$this->frommounth' AND appdate <= '$appdatethisday' ORDER BY appdate ASC");
		while($row = mysql_fetch_array($resultappdate,MYSQL_ASSOC)){
			if($row['appdate'] > 0){
				$this->appdate[] = date("m-d",strtotime($row['appdate']));
			}
		}
		$this->appdate = isset($this->appdate)?$this->appdate:array();

	/*	$arrivemounth = strtotime($this->frommounth);*/
		$resultarrive = mysql_query("SELECT arrive FROM patient WHERE $select arrive >= '$this->frommounth' ORDER BY arrive ASC");
		while($row = mysql_fetch_array($resultarrive,MYSQL_ASSOC)){
			if($row['arrive'] > 0){
				$this->arrive[] = date("m-d",strtotime($row['arrive']));
			}
		}
		$this->arrive = isset($this->arrive)?$this->arrive:array();

        $this->total = array(count($this->addtime),count($this->appdate),count($this->arrive)); 
		//媒体来源
		$this->source = array_count_values($this->source);
		//预约时间
		$this->appdate  = array_count_values($this->appdate);
		foreach($this->mounth as $vlue){			
			if(!array_key_exists($vlue,$this->appdate)){
				$this->appdate = array_merge($this->appdate,array($vlue=>'0'));
		    }
		}
		//登记时间
		$this->addtime  = array_count_values($this->addtime);
		foreach($this->mounth as $vlue){			
			if(!array_key_exists($vlue,$this->addtime)){
				$this->addtime = array_merge($this->addtime,array($vlue=>'0'));
		    }
		}
		//到院时间
		$this->arrive  = array_count_values($this->arrive);
		foreach($this->mounth as $vlue){			
			if(!array_key_exists($vlue,$this->arrive)){
				$this->arrive = array_merge($this->arrive,array($vlue=>'0'));
		    }
		}
		
		ksort($this->appdate);
		ksort($this->addtime);
		ksort($this->arrive);		
		$this->appdate = array_values($this->appdate);
		$this->addtime = array_values($this->addtime);
		$this->arrive = array_values($this->arrive);
	
		
		
        //计算人数最大值
		$appdatenum = $this->appdate;
		sort($appdatenum,SORT_NUMERIC);
		$appdatenum = end($appdatenum);
		
		$addtimenum = $this->addtime;
		sort($addtimenum,SORT_NUMERIC);
		$addtimenum = end($addtimenum);
		
		
		$arrivenum = $this->arrive;
		sort($arrivenum,SORT_NUMERIC);
		$arrivenum = end($arrivenum);
		
		$this->topnum = array($appdatenum,$addtimenum,$arrivenum);
		sort($this->topnum,SORT_NUMERIC);
		$this->topnum = end($this->topnum);
		
	    @mysql::close();
		mysql_free_result($resultaddtime);	
		mysql_free_result($resultappdate);	
		mysql_free_result($resultarrive);	
		
        if(getgpc('pie') == '1'){
			$this->draw_pie();	
		}else{
			$this->draw_line();	
		}	
	}
	
	function draw_line(){		
		require_once (LIB_PATH.'jpgraph/jpgraph.php');
		require_once (LIB_PATH.'jpgraph/jpgraph_line.php');
		require_once (LIB_PATH.'jpgraph/jpgraph_scatter.php');

		$datay1 = $this->addtime;
		$datay2 = $this->arrive;
		$datay3 = $this->appdate;
		// Setup the graph
		$graph = new Graph(900,400);

		$graph->SetScale("int",0,$this->topnum);

		$theme_class= new UniversalTheme;
		$graph->SetTheme($theme_class);

		$graph->title->Set($this->title);		
        $graph->xaxis->title->Set("日期");
        $graph->yaxis->title->Set("人数");
		
		$graph->yaxis->HideZeroLabel();
        $graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
        $graph->xgrid->Show();
				
		//设置字体
		$graph->title->SetFont(FF_SIMSUN,FS_BOLD,14); 
		$graph->title->SetPos('left','top');
		$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD); 
		$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD); 

		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
		$graph->yaxis->HideZeroLabel();

		$graph->xaxis->SetTickLabels($this->mounth);//日期
		// Create the plot
		$p1 = new LinePlot($datay1);
		$graph->Add($p1);

		$p2 = new LinePlot($datay2);
		$graph->Add($p2);
		
		$p3 = new LinePlot($datay3);
		$graph->Add($p3);

		// Use an image of favourite car as marker
		//$p1->mark->SetType(MARK_IMG,VIEW_PATH.'images/dian.jpg',0.6);
		$p1->SetColor('navy');
		$p1->SetLegend('登记人数('.$this->total[0].')');
		$p1->value->SetFormat('%d');
		$p1->value->Show();
		$p1->value->SetColor('navy');		

		//$p2->mark->SetType(MARK_IMG,VIEW_PATH.'images/dian.jpg',0.6);
		$p2->SetColor('#1DA848');
		$p2->SetLegend('到院人数('.$this->total[2].')');
		$p2->value->SetFormat('%d');
		$p2->value->Show();
		$p2->value->SetColor('#1DA848');
		
		//$p3->mark->SetType(MARK_IMG,VIEW_PATH.'images/dian.jpg',0.6);
		$p3->SetColor('red');
		$p3->SetLegend('预约人数('.$this->total[1].')');
		$p3->value->SetFormat('%d');
		$p3->value->Show();
		$p3->value->SetColor('red');
		
		$graph->legend->SetFont(FF_SIMSUN,FS_BOLD,10);
		$graph->legend->SetColor('#333','#333');	
		$graph->legend->SetShadow('gray@0.4',3);
        $graph->legend->SetPos(0.02,0.02,'right','top');
		
		$graph->Stroke();
	}
	
	function draw_pie(){
		require_once (LIB_PATH.'jpgraph/jpgraph.php');
		require_once (LIB_PATH.'jpgraph/jpgraph_pie.php');
		require_once (LIB_PATH.'jpgraph/jpgraph_pie3d.php');
 
		$data = array_values($this->source);
		$this->source=array_keys($this->source);

 
		$graph = new PieGraph(400,250);
		$graph->SetShadow();
 
		$graph->title->Set("登记媒体来源");
		$graph->title->SetFont(FF_SIMSUN,FS_BOLD,14);

		$p1 = new PiePlot3D($data);
		$p1->SetSize(0.34);
		$p1->SetCenter(0.45);
		$p1->SetLegends($this->source);
		 
		$graph->Add($p1);
		$graph->Stroke();
	}
}
?>