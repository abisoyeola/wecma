<?php 

    Class Apply{
        private $conn;
        private $table='basicdata';

        //post properties regno	surname	firstname	othername	gender	email	phone	password	status
        public $id;
        public $regno;
        public $firstname;
        public $surname;
        public $othername;
        public $gender;
        public $email;
        public $phone;
        public $password;
        public $status;

        public function __construct($db_con)
        {
            $this->conn = $db_con;
        }

        public function read(){
            $query = "SELECT
            email as email,
            username as username,
            role as role,
            status as status,
            firstname as firstname,
            lastname as lastname,
            id as id FROM $this->table
            ";

            //prepare statement
            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            return $stmt;
        }

        public function read_single(){
            $query = "SELECT
            email as email,
            username as username,
            role as role,
            status as status,
            firstname as firstname,
            lastname as lastname,
            created_at as created_at,
            id as id FROM $this->table
            WHERE id = ? LIMIT 1";

            //prepare statement
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->email = $row['email'];
            $this->username = $row['username'];
            $this->role = $row['role'];
            $this->created_at = $row['created_at'];
            $this->status = $row['status'];
        }

        public function create(){
            //post properties regno	surname	firstname	othername	gender	email	phone	password	status

            $getdata = "SELECT * FROM $this->table WHERE email = '".htmlspecialchars(strip_tags($this->email))."'";

            $stv = $this->conn->prepare($getdata);
            $stv->execute();
            $thedata = $stv->fetch(PDO::FETCH_ASSOC);

            if(!empty($thedata)){
                $count = count($thedata);
            }else{
                $count=0;
            }

            if($count==0){
                $regnos = "WCT".chr(rand(65,90)).chr(rand(48,57)).chr(rand(48,57)).chr(rand(48,57)).chr(rand(48,57)).date('h').date('d').date('s').date('y');

                $query = "INSERT INTO $this->table SET regno=:regno, firstname=:firstname, surname = :surname, othername = :othername, phone=:phone, email=:email, password=:password, status=1, gender=:gender";

                $stmt = $this->conn->prepare($query);
                $this->firstname = htmlspecialchars(strip_tags($this->firstname));
                $this->surname = htmlspecialchars(strip_tags($this->surname));
                $this->othername = htmlspecialchars(strip_tags($this->othername));
                $this->email = htmlspecialchars(strip_tags($this->email));
                $this->password = sha1(htmlspecialchars(strip_tags($this->password)));
                $this->phone = htmlspecialchars(strip_tags($this->phone));
                $this->gender = htmlspecialchars(strip_tags($this->gender));
                $this->regno = $regnos;
                
                $stmt->bindParam('firstname',$this->firstname);
                $stmt->bindParam('surname',$this->surname);
                $stmt->bindParam('othername',$this->othername);
                $stmt->bindParam('email',$this->email);
                $stmt->bindParam('password',$this->password);
                $stmt->bindParam('regno',$this->regno);
                $stmt->bindParam('gender',$this->gender);
                $stmt->bindParam('phone',$this->phone);
                
                if($stmt->execute()){
                    printf('{"message":"Record Created Successfully...\n\rKindly login to the portal to complete your registration process"}');
                    return true;
                }

                printf("{'message':'Server Busy, Please Call Again...'");
                return false;
            }else{
                printf('{"message":"Email already exist"}');
                return false;
            }
        }
        public function update(){
            $query = "UPDATE $this->table SET firstname=:firstname, lastname = :lastname, username = :username, email=:email, password=:password, status=1, role=:role WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = sha1(htmlspecialchars(strip_tags($this->password)));
            $this->role = htmlspecialchars(strip_tags($this->role));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam('firstname',$this->firstname);
            $stmt->bindParam('lastname',$this->lastname);
            $stmt->bindParam('username',$this->username);
            $stmt->bindParam('email',$this->email);
            $stmt->bindParam('password',$this->password);
            $stmt->bindParam('role',$this->role);
            $stmt->bindParam('id',$this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

        public function delete(){
            $query = "DELETE FROM $this->table WHERE id =:id";

            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam('id',$this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

    }
?>