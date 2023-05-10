<?php  
session_start();

# check if dietitianuserID & password  submitted
if(isset($_POST['dietitianuserID']) &&
   isset($_POST['password'])){

   # database connection file
   include '../db.conn.php';
   
   # get data from POST request and store them in var
   $password = $_POST['password'];
   $dietitianuserID = $_POST['dietitianuserID'];
   
   #simple form Validation
   if(empty($dietitianuserID)){
      # error message
      $em = "dietitianuserID is required";

      # redirect to 'index.php' and passing error message
      header("Location: ../../index.php?error=$em");
   }else if(empty($password)){
      # error message
      $em = "Password is required";

      # redirect to 'index.php' and passing error message
      header("Location: ../../index.php?error=$em");
   }else {
    
      $sql  = "SELECT * FROM 
               dietitian WHERE dietitianuserID=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$dietitianuserID]);

      # if the dietitianuserID is exist
      if($stmt->rowCount() === 1){
        # fetching user data
        $user = $stmt->fetch();

        # if both dietitianuserID's are strictly equal
        if ($user['dietitianuserID'] === $dietitianuserID) {
           
           # verifying the encrypted password
          // if (password_verify($password, $user['password'])) {
            if($user['password']=== $password){
            # successfully logged in
            # creating the SESSION
            $_SESSION['dietitianuserID'] = $user['dietitianuserID'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['dietitian_id'] = $user['dietitian_id'];

            # redirect to 'home.php'
            header("Location: ../../home.php");

          }else {
            # error message
            $em = "Incorect password";

            # redirect to 'index.php' and passing error message
            header("Location: ../../index.php?error=$em");
          }
        }else {
          # error message
          $em = "Incorect dietitianuserID or password";

          # redirect to 'index.php' and passing error message
          header("Location: ../../index.php?error=$em");
        }
      }
   }
}else {
  header("Location: ../../index.php");
  exit;
}