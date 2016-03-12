<?
	class ResizeImage
	{
		var $srcFile;
		var $maxW;
		var $maxH;
		
		var $widthO;
		var $heightO;
		var $type;
		
		var $widthCr;
		var $heightCr;
		
		var $newIm;
		var $im;
		
		var $absolute;
		function ResizeImage($srcFile, $maxW, $maxH, $compression=80,$absolute=false)
		{
			$this->srcFile = $srcFile;
			$this->maxW = $maxW;
			$this->maxH = $maxH;
			$this->compression=$compression;
			$this->absolute=$absolute;
			$this->compile();
		}
		function compile()
		{
			list($this->widthO,$this->heightO,$this->type) = @getimagesize($this->srcFile);
			if($this->absolute)
			{
				$this->widthCr = $this->maxW;
				$this->heightCr = $this->maxH;
			}
			else
			{
				$width = $this->widthO / $this->maxW;
				$height = $this->heightO / $this->maxH;
				$this->widthCr = ($width > $height) ? $this->maxW : round($this->widthO / $height);
				
				$this->heightCr = ($width > $height) ? round($this->heightO / $width) : $this->maxH;
			}
			
			if($this->type==1)
				$this->im = @imagecreatefromgif($this->srcFile);
			elseif($this->type==2)
				$this->im = @imagecreatefromjpeg($this->srcFile);
			elseif($this->type==3)
				$this->im = @imagecreatefrompng($this->srcFile);
			$this->newIm = @imagecreatetruecolor($this->widthCr, $this->heightCr);
			@imagecopyresampled($this->newIm, $this->im, 0, 0, 0, 0, $this->widthCr, $this->heightCr, $this->widthO, $this->heightO);
		}
		function publish($path='')
		{
			if($this->type==1)
			{
				if(empty($path))
					header('Content-Type: image/gif');
				@imagegif($this->newIm,$path, $this->compression);
			}
			elseif($this->type==2)
			{
				if(empty($path))
					header('Content-Type: image/jpeg');
				@imagejpeg($this->newIm,$path, $this->compression);
			}
			elseif($this->type==3)
			{
				if(empty($path))
					header('Content-Type: image/png');
				@imagepng($this->newIm,$path, $this->compression);
			}
			@imagedestroy($this->im);
			@imagedestroy($this->newIm);
		}
	}
?>