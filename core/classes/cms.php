<?php
class CMS {
	
	public $site;
	public $path;
	public $block;
	public $content;
	
    public function __construct($site = null, $path = null, $block = null) 
	{
        $this->site = $site;
        $this->path = $path;
        $this->block = $block;
		
        if(!is_null($this->path)) 
		{	
            $this->get();			
        }
    }
	
	function get()
	{
        global $connection;

        $sql = "select * from site_content where site = '$this->site' and path = '$this->path' and  block = '$this->block' and end_date is null";
		//echo "<p>$sql</p>";
		$result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $content = mysqli_fetch_assoc($result);

            $this->content = $content['content'];
        }
        return false;
	}
	
	function set($content, $user_id)
	{
        global $connection;		
		
        $path = mysqli_real_escape_string($connection, $this->path);
        $block = mysqli_real_escape_string($connection, $this->block);
        $content = mysqli_real_escape_string($connection, $content);
		
		$sql = "update site_content set end_date = NOW() where site = '$this->site' and path = '$this->path' and block = '$this->block'";
		//echo "<p>$sql</p>";
        mysqli_query($connection, $sql);		
		
		$sql = "insert into site_content (site, path, block, content, start_date, end_date, user_id) values ('$this->site', '$this->path', '$this->block', '$content', NOW(), null, '$user_id')";
		//echo "<p>$sql</p>";
        mysqli_query($connection, $sql);		
	}
}
