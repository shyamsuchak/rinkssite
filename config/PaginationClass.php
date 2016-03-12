<?php
class Pagination
	{
		var $selectedCSS;
		var $numbersCSS;
		var $nextPrevCSS;
		var $numData;
		var $toShowData;
		var $toShowNumbers;
		var $pageNumber;
		var $numSeperator;
		
		var $getNumPages;
		var $pageData;
		
		var $prevChar;
		var $nextChar;
		var $pageURL;
		
		function Pagination($selectedCSS,$numbersCSS,$nextPrevCSS)
		{
			$this->selectedCSS=$selectedCSS;
			$this->numbersCSS=$numbersCSS;
			$this->nextPrevCSS=$nextPrevCSS;
			$this->numData=0;
			$this->toShowData=5;
			$this->toShowNumbers=9;
			$this->pageNumber=0;
			$this->numSeperator='|';
			
			$this->getNumPages=0;
			$this->pageData='';
			
			$this->prevChar='&laquo;';
			$this->nextChar='&raquo;';
			$this->pageURL=$_SERVER['PHP_SELF'];
		}
		function initialize()
		{
			if(isset($_GET['page']))
				$this->pageNumber=(intval($_GET['page'])>=0?intval($_GET['page']):0);
			else
				$this->pageNumber=0;
			
			$this->getNumPages=ceil($this->numData/$this->toShowData);
			
			$this->pageData='';
			if(count($_GET))
			{
				$get=$_GET;
				unset($get['page']);
				foreach($get as $k=>$v)
					$this->pageData.='&'.$k.'='.$v;
			}
		}
		function queryBuilder($Q)
		{
			$this->initialize();
			$start=$this->pageNumber*$this->toShowData;
			$Q.=" LIMIT ".$start.",".$this->toShowData;
			return $Q;
		}
		function getPrevious($flag=true)
		{
			if($flag)
				$this->initialize();
			if($this->numData)
				return '<a href="'.$this->pageURL.'?page='.($this->pageNumber?($this->pageNumber-1):0).$this->pageData.'" class="'.$this->nextPrevCSS.'">'.$this->prevChar.'</a>';
			else
				return '';
		}
		function getNext($flag=true)
		{
			if($flag)
				$this->initialize();
			if($this->numData)
				return '<a href="'.$this->pageURL.'?page='.(($this->pageNumber<$this->getNumPages-1)?($this->pageNumber+1):($this->getNumPages-1)).$this->pageData.'" class="'.$this->nextPrevCSS.'">'.$this->nextChar.'</a>';
			else
				return '';
		}
		function getNumbers($flag=true)
		{
			if($flag)
				$this->initialize();
			$numbers='';
			
			if($this->getNumPages>$this->toShowNumbers)
			{
				if($this->pageNumber>=ceil($this->toShowNumbers/2))
				{
					$start=$this->pageNumber-floor($this->toShowNumbers/2);
					$end=$start+$this->toShowNumbers;
					if($end>$this->getNumPages)
					{
						$end=$this->getNumPages;
						$start=$end-$this->toShowNumbers;
					}
				}
				else
				{
					$start=0;
					$end=$this->toShowNumbers;
				}
			}
			else
			{
				$start=0;
				$end=$this->getNumPages;
			}
			for($i=$start;$i<$end;$i++)
			{
				if($i>$start)
					$numbers.='&nbsp;'.$this->numSeperator.'&nbsp;';
				if($i==$this->pageNumber)
					$numbers.='<span class="'.$this->selectedCSS.'">'.($i+1).'</span>';
				else
					$numbers.='<a href="'.$this->pageURL.'?page='.$i.$this->pageData.'" class="'.$this->numbersCSS.'">'.($i+1).'</a>';
			}
			return $numbers;
		}
		function paginationPanel()
		{
			$this->initialize();
			return $this->getPrevious(false).'&nbsp;&nbsp;&nbsp;&nbsp;'.$this->getNumbers(false).'&nbsp;&nbsp;&nbsp;&nbsp;'.$this->getNext(false);
		}
		
		function totalnum()
		{
			$this->initialize();
			return $this->getNumPages;
			
		}
		function currentpage()
		{
			$this->initialize();
			return $this->pageNumber+1;
		}
		function nextpage()
		{
			$this->initialize();
			return $this->getNext(false);
		}
		function previouspage()
		{
			$this->initialize();
			return $this->getPrevious(false);
		}
		
	}
?>