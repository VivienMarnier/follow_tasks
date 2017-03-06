<?php
class Tools
{
	public static function check_param_id($id_to_check)
	{
		$id = intval($id_to_check);
		if(($id != 0) && (is_int($id)))
		{
			return $id;
		}
		else
		{
			throw new Exception('L\'identifiant est incorrect');	
		}
	}
}
?>