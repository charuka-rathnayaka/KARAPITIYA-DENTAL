<?php
include('dbOperations/appointment.php');
require_once('dataLayer.php');
abstract class Handdler{
	protected $m_successor;
	protected $comment;
	protected $number;
	function setSuccessor($h){
		$this->m_successor= $h;
		return $h;
	}
	function handleRequest(Requesst $request){
		if($this->m_successor){
			return $this->m_successor->handleRequest($request);
		}
	}
}
class Handler1 extends Handdler{
	function handleRequest(Requesst $request){
		$array= array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="8.00-9.00a.m"){
			$this->number= $result+1;
			if($result==0){
				$this->comment="Please come to the dental before 8.00 a.m";
			}
			else if($result==1){
				$this->comment="Please come to the dental on 8.10 a.m";
			}
			else if($result==2){
				$this->comment="Please come to the dental on 8.20 a.m";
			}
			else if($result==3){
				$this->comment="Please come to the dental on 8.30 a.m";
			}
			else if($result==4){
				$this->comment="Please come to the dental on 8.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
	
}

class Handler2 extends Handdler{
	function handleRequest(Requesst $request){
		
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="9.00-10.00a.m"){
			$this->number= $result+6;
			$array=array();
			if($result==0){
				$this->comment="Please come to the dental before 9.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 9.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 9.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 9.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 9.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}

class Handler3 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="10.00-11.00a.m"){
			$this->number= $result+11;
			if($result==0){
				$this->comment="Please come to the dental before 10.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 10.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 10.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 10.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 10.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}

class Handler4 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="11.00-12.00a.m"){
			$this->number= $result+16;
			if($result==0){
				$this->comment="Please come to the dental before 11.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 11.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 11.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 11.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 11.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}

class Handler5 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="12.00-1.00p.m"){
			$this->number= $result+21;
			if($result==0){
				$this->comment="Please come to the dental before 12.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 12.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 12.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 12.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 12.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}
class Handler6 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="1.00-2.00p.m"){
			$this->number= $result+26;
			if($result==0){
				$this->comment="Please come to the dental before 1.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 1.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 1.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 1.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 1.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}
class Handler7 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="2.00-3.00p.m"){
			$this->number= $result+31;
			if($result==0){
				$this->comment="Please come to the dental before 2.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 2.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 2.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 2.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 2.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}
class Handler8 extends Handdler{
	function handleRequest(Requesst $request){
		$array=array();
		$date= $request->getdate();
		$select= $request->getSelectOption();
		$var= $request->getVar();
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($request->getVar()=="3.00-4.00p.m"){
			$this->number= $result+36;
			if($result==0){
				$this->comment="Please come to the dental before 3.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 3.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 3.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 3.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 3.40 a.m";
			}
			array_push($array,$this->number,$this->comment);
			echo "Your appointment number is ".$array[0]."<br>".$array[1];
			return $this->number;
		}else{
			return parent::handleRequest($request);
		}
	}
}
class Requesst{
	private $date;
	private $select;
	private $varr;
	function __construct($date,$select,$var){
		$this->date=$date;
		$this->select=$select;
		$this->var=$var;
	}
	function getdate(){
		return $this->date;
	}
	function getSelectOption(){
		return $this->select;
	}
	function getVar(){
		return $this->var;
	}
}
class main{
	private $x;
	function test(){
		$var = $_POST['time'];
		$select = $_POST['choice'];
		$day = $_POST['date'];
		$date = date("d-m-Y", strtotime($day));
		$request= new Requesst($date,$select,$var);
		$handler1= new Handler1();
		$handler2= new Handler2();
		$handler3= new Handler3();
		$handler4= new Handler4();
		$handler5= new Handler5();
		$handler6= new Handler6();
		$handler7= new Handler7();
		$handler8= new Handler8();
		$handler1->setSuccessor($handler2);
		$handler2->setSuccessor($handler3);
		$handler3->setSuccessor($handler4);
		$handler4->setSuccessor($handler5);
		$handler5->setSuccessor($handler6);
		$handler6->setSuccessor($handler7);
		$handler7->setSuccessor($handler8);
		$this->x=$handler1->handleRequest($request);
	}
	public function getx(){
		return $this->x;
	}
}


?>