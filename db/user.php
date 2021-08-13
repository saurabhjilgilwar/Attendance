<?php 
     class user{
        //private database object
        private $db;

        //constructor to initialise private variable to the database connection.
        function __construct($conn){
            $this->db = $conn;
        }

         //fuction to insert a new record into the users database
        public function insertUser($username, $password){
            try{
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0){
                    return false;
                }
                else{
                    // use md5 to encript password
                    $new_password = md5($password.$username);
                    // define sql statement to be executed
                    $sql = "INSERT INTO users(username, password) VALUE (:username, :password)";
                    // prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholder to actual values
                    $stmt->bindparam(':username',$username);
                    $stmt->bindparam(':password',$new_password);

                    // execute statement
                    $stmt->execute();
                    return true;
                }
                

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getuser($username, $password){
            try{
                $sql = "SELECT * FROM users where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserbyUsername($username){
            try{
                $sql = "select count(*) as num from users where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
            
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
     }
   

?>