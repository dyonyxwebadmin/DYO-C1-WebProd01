<?php

class Contact {
    public $id;
    public $site;
    public $added_on;
    public $source;

    public $kv = array();
    private $list_contacts = array();

    public function __construct($id = null) {
        $this->id = $id;
        if(!is_null($this->id)) {
            $this->read();
        }
    }

    ///////////////////////////////////////////////////////////
    //
    // CRUD Functions
    //

    public function create()
    {
        global $connection;

        $site = mysqli_real_escape_string($connection, $this->site);
        $source = mysqli_real_escape_string($connection, $this->source);
        
        $sql = "select uuid() as uuid";
        //echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $contact = mysqli_fetch_assoc($result);
            $this->id = $contact['uuid'];
        }
        
        $sql = "insert into contacts (uuid, site, added_on) values ('$this->id', '$site', NOW())";
        ///echo "<p>$sql</p>";
        mysqli_query($connection, $sql);
        $new_id = mysqli_insert_id($connection);

        return $this->id;
    }

    protected function read()
    {

        global $connection;

        $sql = "select * from contacts where uuid = '$this->id'";
        //echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);

            $this->id = $user['uuid'];
            $this->site = $user['site'];
            $this->added_on = $user['added_on'];
            $this->status = $user['status'];            

            $this->kv_read();
        }

        return false;
    }

    public function update() {
    }

    public function delete() {
        global $connection;

        $sql = "UPDATE contacts SET status = 0 where uuid = '$this->id'";
        $result = mysqli_query($connection, $sql);       
    }

    ///////////////////////////////////////////////////////////
    //
    // KV Functions
    //

    public function kv($k, $v)
    {
        global $connection;
        
        $key = mysqli_real_escape_string($connection, $k);
        $value= mysqli_real_escape_string($connection, $v);

        $sql = "delete from contact_kvs where contact_id = '$this->id' and k = '$key'";
        //echo "<p>$sql</p>";
        mysqli_query($connection, $sql);

        $sql = "insert into contact_kvs (contact_id, k, v) values ('$this->id','$key', '$value')";
        //echo "<p>$sql</p>";
        mysqli_query($connection, $sql);
    }

    public function kv_read()
    {
        global $connection;

        $sql = "SELECT * FROM contact_kvs WHERE user_id = '$this->id'";
        //echo $sql . "<br />";
        $result = mysqli_query($connection, $sql);

        while($obj = mysqli_fetch_object($result)) {
            $this->kv[] = $obj;
        }
        
        return json_encode($this->kv);
    }

    public function kv_pivot()
    {
        global $connection;

        $sql = "SELECT kvs.contact_id
                     , MAX(CASE WHEN kvs.k='source'    THEN kvs.v END) source
                     , MAX(CASE WHEN kvs.k='name'    THEN kvs.v END) name
                     , MAX(CASE WHEN kvs.k='company'   THEN kvs.v END) company
                     , MAX(CASE WHEN kvs.k='email' THEN kvs.v END) email
                     , MAX(CASE WHEN kvs.k='phone' THEN kvs.v END) phone
                     , MAX(CASE WHEN kvs.k='first_name'    THEN kvs.v END) first_name
                     , MAX(CASE WHEN kvs.k='last_name'    THEN kvs.v END) last_name
                     , MAX(CASE WHEN kvs.k='companyname'    THEN kvs.v END) company_name
                     , MAX(CASE WHEN kvs.k='chkBring' THEN kvs.v END) Bring
                     , MAX(CASE WHEN kvs.k='organization' THEN kvs.v END) organization
                     , MAX(CASE WHEN kvs.k='barriers' THEN kvs.v END) barriers
                     , MAX(CASE WHEN kvs.k='applications' THEN kvs.v END) applications
                     , MAX(CASE WHEN kvs.k='computing' THEN kvs.v END) computing
                     , MAX(CASE WHEN kvs.k='cloud' THEN kvs.v END) cloud
                     , MAX(CASE WHEN kvs.k='department' THEN kvs.v END) department
                     , c.added_on
                FROM 
                    contact_kvs kvs
                    inner join contacts c on kvs.contact_id = c.uuid
                WHERE 
                    c.site = '$this->site'
                 GROUP BY kvs.contact_id";
        //echo $sql . "<br />";
        $result = mysqli_query($connection, $sql);

        while($obj = mysqli_fetch_object($result)) {
            $this->kv[] = $obj;
        }
        
        return json_encode($this->kv);
    }
    
    public function kv_emailpivot($email)
    {
        global $connection;

        $sql = "SELECT kvs.contact_id
                     , MAX(CASE WHEN kvs.k='source'    THEN kvs.v END) source
                     , MAX(CASE WHEN kvs.k='name'    THEN kvs.v END) name
                     , MAX(CASE WHEN kvs.k='company'   THEN kvs.v END) company
                     , MAX(CASE WHEN kvs.k='email' THEN kvs.v END) email
                     , MAX(CASE WHEN kvs.k='phone' THEN kvs.v END) phone
                FROM 
                    contact_kvs kvs
                    inner join contacts c on kvs.contact_id = c.uuid
                WHERE 
                    c.site = '$this->site' and kvs.k = 'email' and kvs.v = '$email'
                 GROUP BY kvs.contact_id";
        //echo $sql . "<br />";
        $result = mysqli_query($connection, $sql);

        return mysqli_num_rows($result);
    }


    ///////////////////////////////////////////////////////////
    //
    // Encode to JSON Object
    //

    public function toJson() {
        return json_encode(get_object_vars($this));
    }
}