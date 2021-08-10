<?php 
    class crud{
        //private database object
        private $db;

        //constructor to initialise private variable to the database connection.
        function __construct($conn){
            $this->db = $conn;
        }

        //fuction to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try{
                // define sql statement to be executed
                $sql = "INSERT INTO attendee(firstName, lastName, DOB, emailaddress, contactNumber, specialty_id) VALUE (:fname, :lname, :dob, :email, :contact, :specialty)";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholder to actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                // execute statement
                $stmt->execute();
                return true;

        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //fuction to update a edit record into the attendee database
        public function editAttendees($id,$fname, $lname, $dob, $email, $contact, $specialty){
            try{
                // define sql statement to be executed
                $sql ="UPDATE `attendee` SET `firstName`=:fname,`lastName`=:lname,`DOB`=:dob,`emailaddress`=:email,`contactNumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholder to actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                // execute statement
                $stmt->execute();
                return true;

        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        //function to delete unwanted record
        public function deleteAttendees($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

    }
?>