<?php

class User {
    public $id;
    public $site;
    public $login;
    public $username;
    public $first_name;
    public $last_name;
    public $fullname;
    public $email;
    public $phone;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $zip;
    public $added_on;
    public $last_login;
    public $type;
    public $type_name;
    public $status;


    public $profile_status;
    public $profile_status_date;

    public $kv = array();
    public $list_social = array();

    private $list_users = array();

    public function __construct($id = null) {
        $this->id = $id;
        if(!is_null($this->id)) {
            $this->load_user_data();
        }
    }

    protected function load_user_data()
    {

        global $connection;

        $sql = "select * from users where uuid = '$this->id'";
        //echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);

            $this->id = $user['uuid'];
            $this->site = $user['site'];
            $this->username = $user['username'];
            $this->first_name = $user['first_name'];
            $this->last_name = $user['last_name'];
            $this->fullname = $user['first_name'] . " " . $user['last_name'];
            $this->email = $user['email'];
            $this->phone = $user['phone'];
            $this->address1 = $user['address1'];
            $this->address2 = $user['address2'];
            $this->city = $user['city'];
            $this->state = $user['state'];
            $this->zip = $user['zip'];
            $this->added_on = $user['added_on'];
            $this->last_login = $user['last_login'];
            $this->type = $user['type'];
            $this->type_name = getTypeName($user['type']);
            $this->status = $user['status'];

            $sql = "select * from user_profile_status where uuid = '$this->id' and end_date is null";
            $response_status = mysqli_fetch_assoc(mysql_query($sql, $connection));
            $this->profile_status = $response_status['status'];
            $this->profile_status_date = $response_status['start_date'];            

            $sql = "select * from user_social where user_id = '$this->id'";
            $result = mysqli_query($connection, $sql);
            while($obj = mysqli_fetch_object($result)) {
                $this->list_social[] = $obj;
            }
            
        }

        //echo "<p>$sql</p>";

        return false;
    }
    public function login($login, $password, $site) 
    {
        $this->login = mysqli_real_escape_string($connection, $login);
        $this->site = mysqli_real_escape_string($connection, $site);
        $password = mysqli_real_escape_string($connection, $password);

        $this->id = $this->checkCredentials($password);
        if($this->id)
        {
            $this->load_user_data();
            $_SESSION['user_id'] = $this->id;
            $_SESSION['user_username'] = $this->username;
            $_SESSION['user_full_name'] = $this->first_name . " " . $this->last_name;
            $_SESSION['user_first_name'] = $this->first_name;
            $_SESSION['user_last_name'] = $this->last_name;
            $_SESSION['user_type'] = $this->type;
            $_SESSION['user_type_name'] = getTypeName($this->type);
            $_SESSION['user_status'] = $this->status;       
            $_SESSION['user_lock'] = 0;   
            
            $this->last_login = date('Y-m-d H:i:s');
            $this->setLogin();

            return $this->id;
        }
        return false;
    }
    
    protected function checkCredentials($password) {

        global $connection;

        $sql = "SELECT * FROM users WHERE (username = '$this->login' or email = '$this->login') and status in (2,3)";
        //echo "sql: ".$sql."\n\n";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);
            if ($user['type'] == 5) {             
                if($password == $user['password']){
                    return $user['uuid'];
                }   
            } else {
                if ($user['site'] == $this->site) {     
                    if($password == $user['password']){
                        return $user['uuid'];
                    }   
                }         
            }
        }
        return false;
    }

    public function  checkPassword($password) {

        global $connection;

        $sql = "SELECT * FROM users WHERE site = '$this->site' and (username = '$this->username' or email = '$this->email') and status in(2,3)";
        //echo "sql: ".$sql."\n\n";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);
            if($password == $user['password']){
                return true;
            }
        }
        return false;
    }
    
    public function checkExists($email) {

        global $connection;

        $sql = "SELECT * FROM users WHERE site = '$this->site' and username = '$email' or email = '$email'";
        //echo "sql: ".$sql."\n\n";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);
            return $user['uuid'];
        }
        return false;
    }

    public function create($site, $username, $password, $first_name, $last_name, $email, $phone, $address1, $address2, $city, $state, $zip, $type)
    {
        global $connection;
        global $public_portfolio;
        global $show_descriptions;

        $this->site = mysqli_real_escape_string($connection, $site);
        $this->username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $this->first_name = mysqli_real_escape_string($connection, $first_name);
        $this->last_name = mysqli_real_escape_string($connection, $last_name);
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->phone = mysqli_real_escape_string($connection, $phone);
        $this->address1 = mysqli_real_escape_string($connection, $address1);
        $this->address2 = mysqli_real_escape_string($connection, $address2);
        $this->city = mysqli_real_escape_string($connection, $city);
        $this->state = mysqli_real_escape_string($connection, $state);
        $this->zip = mysqli_real_escape_string($connection, $zip);
        $this->type = mysqli_real_escape_string($connection, $type);
        
        $sql = "select uuid() as uuid";
        //echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);
            $this->id = $user['uuid'];
        }
        
        $sql = "insert into users (uuid, site, username, password, first_name, last_name, email, phone, address1, address2, city, state, zip, added_on, last_login, type) values ('$this->id', '$this->site', '$this->username', '".$password."', '$this->first_name', '$this->last_name', '$this->email', '$this->phone', '$this->address1', '$this->address2', '$this->city', '$this->state', '$this->zip', NOW(), null, '$this->type')";
        //echo "<p>$sql</p>";
        mysqli_query($connection, $sql);
        $new_userid = mysqli_insert_id();

        return $this->id;
    }


    public function createActive($site, $username, $password, $first_name, $last_name, $email, $type)
    {
        global $connection;
        global $public_portfolio;
        global $show_descriptions;

        $this->site = mysqli_real_escape_string($connection, $site);
        $this->username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $this->first_name = mysqli_real_escape_string($connection, $first_name);
        $this->last_name = mysqli_real_escape_string($connection, $last_name);
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->type = mysqli_real_escape_string($connection, $type);
        
        $sql = "select uuid() as uuid";
        //echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        if(!empty($result)){
            $user = mysqli_fetch_assoc($result);
            $this->id = $user['uuid'];
        }
        
        $sql = "insert into users (uuid, site, username, password, first_name, last_name, email, status, type) values ('$this->id', '$this->site', '$this->username', '".$password."', '$this->first_name', '$this->last_name', '$this->email', 2, $this->type)";
        // echo "<p>$sql</p>";
        mysqli_query($connection, $sql);
        $new_userid = mysqli_insert_id();

        return $this->id;
    }

    public function save() {
        global $connection;

        $sql = "UPDATE users SET username = '$this->username', first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email', phone = '$this->phone', address1 = '$this->address1', address2 = '$this->address2', city = '$this->city', state = '$this->state', zip = '$this->zip', type = '$this->type', status = '$this->status' where uuid = '$this->id'";
        // echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        $this->setKV();
        $this->setProfileStatus();
        $this->load_user_data();
    }

    public function setProfileStatus() {
        global $connection;

        $sql = "UPDATE user_profile_status SET end_date = NOW() where uuid = '$this->id' and end_date is null";
        $result = mysqli_query($connection, $sql);

        $sql = "insert into user_profile_status (uuid, status, start_date, end_date) values ('$this->id', '$this->profile_status', NOW(), null)";
        //echo "<p>$sql</p>";        
        $result = mysqli_query($connection, $sql);
    }

    public function setKV()
    {
        global $connection;
        
        foreach ($this->kv as $key => $value) {

            $key = mysqli_real_escape_string($connection, $key);
            $value= mysqli_real_escape_string($connection, $value);
            $check = strpos($key, "kv-");
            $key_string = str_replace("kv-","",$key);
            if ($check !== false)
            {           
                $sql = "delete from user_kvs where user_id = '$this->id' and k = '$key_string'";
                //echo "<p>$sql</p>";
                mysqli_query($connection, $sql);
    
                $sql = "insert into user_kvs (user_id, k, v) values ('$this->id','$key_string', '$value')";
                //echo "<p>$sql</p>";
                mysqli_query($connection, $sql);
            }
        }
    }

    public function KvList()
    {
        global $connection;

        $sql = "SELECT * FROM user_kvs WHERE user_id = '$this->id'";
        //echo $sql . "<br />";
        $result = mysqli_query($connection, $sql);

        while($obj = mysqli_fetch_object($result)) {
            $this->kv[] = $obj;
        }
        
        return json_encode($this->kv);
    }
    
    public function setLogin() {
        global $connection;

        $sql = "UPDATE users SET last_login = '$this->last_login' where uuid = '$this->id'";
        $result = mysqli_query($connection, $sql);       
    }

    public function delete() {
        global $connection;

        $sql = "UPDATE users SET status = 0 where uuid = '$this->id'";
        $result = mysqli_query($connection, $sql);       
    }

    public function setPassword($password)
    {
        global $connection;

        $sql = "UPDATE users SET password = '$password' where uuid = '$this->id'";
        //echo $sql . "<br />";
        $result = mysqli_query($connection, $sql);       
    }
    
    
    public function listSocial()
    {
        global $connection;

        $sql = "select s.id, s.type, s.namespace, q.post_per_day, q.auto_queue from user_social s left join queue_settings q on s.user_id = q.user_id where site = '$this->site' and s.user_id = '$this->id'";
        // echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->list_social[] = $obj;
        }
        
        return json_encode($this->list_social);
    } 

    public function listUsers()
    {
        global $connection;

        $sql = "select uuid as id, site, CONCAT_WS(' ', first_name, last_name)  as fullname, email, phone, CONCAT_WS(', ', city, state ) as location, DATE_FORMAT(added_on,'%d %b %Y') as start_date, DATE_FORMAT(last_login,'%d %b %Y at %h:%i %p') as last_login, type from users where status in (2,3,4,5)";
        // echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->list_users[] = $obj;
        }
        
        return json_encode($this->list_users);
    }  

    public function listSiteUsers()
    {
        global $connection;

        $sql = "select uuid as id, site, CONCAT_WS(' ', first_name, last_name)  as fullname, email, phone, CONCAT_WS(', ', city, state ) as location, DATE_FORMAT(added_on,'%d %b %Y') as start_date, DATE_FORMAT(last_login,'%d %b %Y at %h:%i %p') as last_login, type from users where site = '$this->site' and status = 3 and type in (2,3,4)";
        // echo "<p>$sql</p>";
        $result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->list_users[] = $obj;
        }
        
        return json_encode($this->list_users);
    }  

    public function listNewUsers()
    {
        global $connection;

        $sql = "select uuid as id, site, CONCAT_WS(' ', first_name, last_name)  as fullname, email, phone, CONCAT_WS(', ', city, state ) as location, DATE_FORMAT(added_on,'%d %b %Y') as start_date, DATE_FORMAT(last_login,'%d %b %Y at %h:%i %p') as last_login, type from users where site = '$this->site' and status = 3 order by added_on DESC Limit 50";
        //echo $sql;
        $result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->list_users[] = $obj;
        }
        
        return json_encode($this->list_users);
    } 

    public function listPendingUsers()
    {
        global $connection;

        $sql = "select uuid as id, CONCAT_WS(' ', first_name, last_name)  as fullname, email, phone, CONCAT_WS(', ', city, state ) as location, DATE_FORMAT(added_on,'%d %b %Y') as start_date, DATE_FORMAT(last_login,'%d %b %Y at %h:%i %p') as last_login from users where site = '$this->site' and status = 1";
        //echo $sql;
        $result = mysqli_query($connection, $sql);
        while($obj = mysqli_fetch_object($result)) {
            $this->list_users[] = $obj;
        }
        
        return json_encode($this->list_users);
    } 

    public function toJson() {
        return json_encode(get_object_vars($this));
    }
}