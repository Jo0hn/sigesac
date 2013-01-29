<?php
	class Imagen
	{
		var $idImagen;
		var $ruta;
		var $idProducto;
		var $con;
		
		function __CONSTRUCT()
		{
			$this->con = new connection();
		}
		
		
		function __SET($name, $value)
		{
			$this->$name = $value;
		}
		
		function __GET($name)
		{
			return $this->$name;
		}
		
		function imagenAdd()
		{
			$msg = 'succesfull';
			$picOrError = $this->imagenUpload();
			if($picOrError == 'errType')
			{
				$msg = 'Tipo de archivos no permitido';
			}
			else if($picOrError == 'errSize')
			{
				$msg = 'El tama&ntilde;o del archivo es muy grande';
			}
			else
			{
				$query = 'INSERT INTO Imagen (ruta, Id_Producto) VALUES(\'' . $picOrError . '\', ' . $this->idProducto . ');';
				echo $query;
				$this->con->sendQuery($query);
			}
			return $msg;
		}
		
		function imagenDelete()
		{
			$query = 'DELETE FROM Imagen WHERE Id_Imagen=' . $this->idImagen . ';';
			$this->con->sendQuery($query);
		}
		
		function imagenSearch($type = '')
		{
			if($type == 'id')
			{
				$query = 'SELECT * FROM Imagen WHERE IdImage = ' . $this->idImagen . ';';
				$result = $this->con->searchQUery($query, 'object');
			}
			else
			{
				$query = 'SELECT * FROM Imagen WHERE Id_Producto = ' . $this->idProducto . ';';
				$result = $this->con->getRecords($query);
			}
			return $result;
		}
		
		function imagenShow()
		{
			$query = 'SELECT * FROM Imagen ORDER BY Id_Imagen ASC;';
			$result = $this->con->getRecords($query);
			return $result;
		}
		
		function imagenUpload()
		{				
			$range = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
			$str = '';
			for($i = 0; $i < 12; $i++)
			{ 
				$str .= substr($range, rand(0,62), 1);
			} 
			$size = $this->File['size'];
			$maxSize = '50000000000';
			if( $size < $maxSize)
			{
				$folder = 'pics';
				$fullType = explode('image/',$this->File['type']);
				$type = $fullType[1];
				if($type == 'gif' || $type == 'pjpeg' || $type == 'bmp' || $type == 'png' || $type == 'jpg' || $type == 'jpeg')
				{ 
					$ruta = $folder . '/' . $str .'.'. $type;
					move_uploaded_file($this->File['tmp_name'], '../' . $ruta);
				}
				else
				{
					$ruta = 'errType';
				}
			}
			else
			{
				$ruta = 'errSize';
			}
		
			return $ruta;
		}
	}
?>
