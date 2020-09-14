<?php
include('appointment.php');
require_once('dataLayer.php');
class BusinessLayer{
	private $comment='';
	private $number='';
	function setvalues($date,$select,$var){
		$result = DataLayer::getInstance()->select($date,$select,$var);
		if($var=="8.00-9.00a.m"){
			$this->number=$result+1;
			if($result==0){
				$this->comment="Please come to the dental before 8.00 a.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 8.10 a.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 8.20 a.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 8.30 a.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 8.40 a.m";
			}
		}
		elseif($var=="9.00-10.00a.m"){
			$this->number=6+$result;
			if($result==0){
				$this->comment="Please come to the dental on 9.00 a.m";
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
		}
		elseif($var=="10.00-11.00a.m"){
			$this->number=11+$result;
			if($result==0){
				$this->comment="Please come to the dental on 10.00 a.m";
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
		}
		elseif($var=="11.00-12.00a.m"){
			$this->number=16+$result;
			if($result==0){
				$this->comment="Please come to the dental on 11.00 a.m";
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
		}
		elseif($var=="12.00-1.00p.m"){
			$this->number=21+$result;
			if($result==0){
				$this->comment="Please come to the dental on 12.00 p.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 12.10 p.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 12.20 p.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 12.30 p.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 12.40 p.m";
			}
		}
		elseif($var=="1.00-2.00p.m"){
			$this->number=26+$result;
			if($result==0){
				$this->comment="Please come to the dental on 1.00 p.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 1.10 p.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 1.20 p.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 1.30 p.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 1.40 p.m";
			}
		}
		elseif($var=="2.00-3.00p.m"){
			$this->number=31+$result;
			if($result == 0){
				$this->comment="Please come to the dental on 2.00 p.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 2.10 p.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 2.20 p.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 2.30 p.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 2.40 p.m";
			}
		}
		else{
			$this->number=36+$result;
			if($result==0){
				$this->comment="Please come to the dental on 3.00 p.m";
			}
			if($result==1){
				$this->comment="Please come to the dental on 3.10 p.m";
			}
			if($result==2){
				$this->comment="Please come to the dental on 3.20 p.m";
			}
			if($result==3){
				$this->comment="Please come to the dental on 3.30 p.m";
			}
			if($result==4){
				$this->comment="Please come to the dental on 3.40 p.m";
			}
		}
	}
	public function getcomment(){
		return $this->comment;
	}
	public function getnumber(){
		return $this->number;
	}
}
?>