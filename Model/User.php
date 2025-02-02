<?php
include "Database.php";

class User extends Database{

    public $firstname;
    public $lastname;
    public $email;
    public $id;

        public function insertdata($firstname,$lastname,$email,$password){
            try{
            $sql = "INSERT INTO users(firstname,lastname,email,password) VALUES (?,?,?,?)";
            $statement=$this->link->prepare($sql);
            $statement->execute(array($firstname,$lastname,$email,$password));
            }        
            catch(PDOException $exception){

                print_r($exception);

            }
        }

        public function deletedata($id){
            try{
            $sql = "DELETE FROM users WHERE id=?";
            $statement=$this->link->prepare($sql);
            $statement->execute(array($id));
            }        
            catch(PDOException $exception){
            print_r($exception);
            }
        }

        public function updatedata($firstname,$lastname,$email,$password,$id){
            try{
            $sql = "UPDATE users SET firstname=?,lastname=?,email=?,password=? WHERE id=?";
            $statement=$this->link->prepare($sql);
            $statement->execute(array($firstname,$lastname,$email,$password,$id));
            }        
            catch(PDOException $exception){
            print_r($exception);
            }
        }

        public function selectdata(){
            try{
            $sql = "SELECT * FROM users";
            $statement=$this->link->prepare($sql);
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_CLASS, 'user');
            return $users;
           
            }        
            catch(PDOException $exception){
            print_r($exception);
            }
        }

        public function login($email,$password){
            try{
            $sql = "SELECT * FROM users WHERE email=? AND password=?";
            $statement=$this->link->prepare($sql);
            $statement->execute(array($email,$password));
            $user = $statement->rowCount();
            return $user;
            }        
            catch(PDOException $exception){
            print_r($exception);
            }
        }
        
        public function checkEmail($email){
            try{
            $sql = "SELECT * FROM users WHERE email=?";
            $statement=$this->link->prepare($sql);
            $statement->execute(array($email));
            $user = $statement->rowCount();
            return $user;
            }        
            catch(PDOException $exception){
            print_r($exception);
            }
        }

}

?>