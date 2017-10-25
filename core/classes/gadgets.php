<?php
class Gadgets {
	
	public $site;
	public $path;
	public $gadget;
	public $gadgets = array();
	
    public function __construct($site = null, $path = null) 
	{
        $this->site = $site;
        $this->path = $path;
    }
	
    public function gadgetList() {

    	global $connection;
  
    	$sql = "select * from site_gadgets where site = '$this->site' and path = '$this->path' and end_date is null order by sort";

    	$result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->gadgets[] = $obj;
        }
		
		return json_encode($this->gadgets);
    }
	
	public function set($gadget, $user_id)
	{
        global $connection;		
		
        $path = mysqli_real_escape_string($connection, $this->path);
        $block = mysqli_real_escape_string($connection, $this->block);
        $gadget = mysqli_real_escape_string($connection, $gadget);
		
		// $sql = "update site_gadgets set end_date = NOW() where site = '$this->site' and path = '$this->path' and gadget = '$gadget'";
		// //echo "<p>$sql</p>";
  //       mysqli_query($connection, $sql);		
			
		$sql = "insert into site_gadgets (site, path, gadget, sort, start_date, end_date, user_id) values ('$this->site', '$this->path', '$gadget', '1', NOW(), null, '$user_id')";
		//echo "<p>$sql</p>";
        mysqli_query($connection, $sql);		
	}

	public function delete($id)
	{
        global $connection;		

		$sql = "delete from site_gadgets  where site = '$this->site' and path = '$this->path' and id = '$id'";
		//echo "<p>$sql</p>";
        mysqli_query($connection, $sql);		
	}

	public function sort($order) {
		$order = json_decode($order);
		$sort = 1;
		foreach ($order as $item) {
			$id = end(split('-',$item));
			$this->update_sort($id, $sort);
			$sort++;
		}
	}

	private function update_sort($id, $sort) {

        global $connection;		

		$sql = "update site_gadgets set sort = '$sort' where site = '$this->site' and path = '$this->path' and id = $id";
		echo "<p>$sql</p>";
        mysqli_query($connection, $sql);		
	}
}
