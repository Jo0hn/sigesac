<?php
	class Operations
	{
		function cleanPosts($_POST, $level)
		{
			$newArray = '';
			if($level== 'Safest')
			{
				foreach($_POST as $key=>$value)
				{
					$newArray[$key] = strip_tags(addslashes(htmlspecialchars(trim($value))));
					if($newArray[$key] == '')
					{
						$newArray = array('empty'=>0);
						break;
					}
				}
			}
			else if($level='Safe')
			{
				foreach($_POST as $key=>$value)
				{
					$newArray[$key] = addslashes(trim($value));
					if($newArray[$key] == '')
					{
						$newArray = array('empty'=>0);
						break;
					}
				}
			}
			return $newArray;
		}
		
		function cleanGets($_GET)
		{
			$newArray = '';
			foreach($_GET as $key=>$value)
			{
				$newArray[$key] = intval($value);
			}
			return $newArray;
		}		
	}
?>