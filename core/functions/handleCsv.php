<?php



function HandleCsv($user_id, $targetFile, $data_table, $identity)
{
    global $connection;
	
	$identity_column = "";	
	$cnt = 0;
	$identities = explode(',', $identity);
	foreach($identities as $value) 
	{	
		if ($value == "date")
		{
			$identity_column = $identity_column . " date datetime DEFAULT NULL,";
		}
		else
		{
			$identity_column = $identity_column . " ".$value." varchar(128) DEFAULT NULL,";
		}
		$where_clause = $where_clause . " and ".$value." = '".$data[$cnt]."'";
		$insert_columns = $insert_columns . ", ".$value;
		$insert_values = $insert_values . ", '".$data[$cnt]."'";
		$cnt++;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS ".$data_table." (id int(11) NOT NULL AUTO_INCREMENT, user_id varchar(128) DEFAULT NULL,".$identity_column." PRIMARY KEY (id)) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";
	echo "\n".$sql."\n";
	mysqli_query($connection, $sql);
	
	$row = 0;
	$column_names = array();
	if (($handle = fopen($targetFile, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			
			if ($row == 0)
			{
				for ($c=0; $c < $num; $c++) {
					$column = str_replace(" ", "_", str_replace("(", "", str_replace(")", "", str_replace(":", "", strtolower($data[$c])))));
					$column_names[$c] = $column;										
					checkColumn($data_table, $column);
				}
			}
			else
			{				
				$where_clause = "";
				$insert_columns = "";
				$insert_values = "";
				$cnt = 0;
				foreach($identities as $value) 
				{	
					$where_clause = $where_clause . " and ".$value." = '".$data[$cnt]."'";
					$insert_columns = $insert_columns . ", ".$value;
					$insert_values = $insert_values . ", '".$data[$cnt]."'";
					$cnt++;
				}
				
				$sql = "select * from ".$data_table." where user_id = '".$user_id."' " . $where_clause . "";
				//echo "\n" . $sql . "\n";
				$result = mysqli_query($connection, $sql);
				$num_rows = mysql_num_rows($result);
				
				if ($num_rows == "0")
				{
					$sql = "insert into ".$data_table." (user_id".$insert_columns.") values ('$user_id'".$insert_values.")";
					//echo "\n" . $sql . "\n";
					mysqli_query($connection, $sql);
					
					$record_id = mysqli_insert_id();
					
					for ($c=$cnt; $c < $num; $c++) {
						$sql = "update " . $data_table . " set " . $column_names[$c] . " = '" . mysqli_real_escape_string($connection, $data[$c]) . "' where id = $record_id";
						//echo "\n" . $sql . "\n";
						mysqli_query($connection, $sql);
					}
				}
			}
			$row++;
		}
		fclose($handle);		
	}
}


function checkColumn($table, $column)
{
    global $connection;
	
	$check = "SHOW columns from ".$table." where field='".$column."'";
	$alter = "alter table $table add $column varchar(256)";
	
	$r=mysql_num_rows(mysql_query($check, $connection));
	if ($r==0){
		mysql_query($alter, $connection);
	}
}
