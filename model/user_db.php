<?php
Class UserDB{
    


  public static  function get_users() {
        $db = Database::getDB();

        $query = 'SELECT * FROM user';
        $statement = $db->prepare($query);
        $statement->execute();
        
        // Populate the user object
        $userObject = new User();
       ;
        
        
        return $statement;
    }

    function search_users($firstName, $lastName) {
        global $db;
        $query = 'SELECT *
                    FROM user
                     WHERE firstName LIKE :firstName 
                     AND lastName LIKE :lastName';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', '%' . $firstName . '%');
        $statement->bindValue(':lastName', '%' . $lastName . '%');
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }

    function get_user_by_email_password($email, $password) {
        global $db;
        $query = 'SELECT * FROM user  '
                . 'WHERE emailAddress =  :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    }

   public  static function get_user_by_id($ID) {
       // $ID = -1; // Testing bad data
        $db = Database::getDB();
        $query = 'SELECT * FROM user 
                  WHERE ID = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        
      
           
        if ($record['ID'] > 0){
            
           $userObject = new User($record['ID'],
                                    $record['firstName'],
                                    $record['lastName'],
                                    $record['emailAddress'],
                                    $record['address'],
                                    $record['city'],
                                    $record['state'],
                                    $record['postalCode'],
                                    $record['password'],
                                    $record['isActive']);
        }
        else 
            $userObject = new User(-1,"","","","","","","","",0);
        
              
        
        

        
        
      //  return $userObjectArray;
        return $userObject;
    }

    function getAllUsers() {

        $db = Database::getDB();
       // global $db;
        $query = 'SELECT * FROM user
                           ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        
        
        $records = $statement->fetchAll();
        $statement->closeCursor();
        
        // Array of Users
        $userObjectArray = array();
       
                 
         foreach ($records as $record) {
             $userObject = new User($record['ID'],
                                    $record['emailAddress'],
                                    $record['password'],
                                    $record['firstName'],
                                    $record['lastName'],
                                    $record['address'],
                                    $record['city'],
                                    $record['state'],
                                    $record['postalCode'],
                                    $record['isActive']);
             
             
             // Add the User object to the Array
             $userObjectArray[]  = $userObject;
            
         }    
         

        
        return $userObjectArray;
    }

    function update_user($ID, $firstName, $lastName, $address, $city, $state, $postalCode, $email, $password, $isActive) {
        global $db;
        $query = 'UPDATE user
                    SET firstName = :firstName,
                        lastName = :lastName,
                        address = :address,
                        city = :city,
                        state = :state,
                        postalCode = :postalCode,
                        emailAddress = :email,
                        password = :password,
                        isActive = :isActive
                    WHERE ID = :ID';

        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $ID);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postalCode', $postalCode);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':isActive', $isActive);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_user($ID) {
        global $db;
        $query = 'DELETE FROM user
                  WHERE ID = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $ID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_user($firstName, $lastName, $address, $city, $state, $postalCode, $email, $password) {
        global $db;
        $query = 'INSERT INTO user
                     (firstName, lastName, address, city, state, postalCode, emailAddress, password)
                  VALUES
                     (:firstName, :lastName, :address, :city, :state, :postalCode, :email, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postalCode', $postalCode);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }

}
?>