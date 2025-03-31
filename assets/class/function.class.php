<?php
session_start();
class Functions{
    public function redirect($address){
        header("Location:". $address);
    }

    public function setError($message){
        $_SESSION["error"] = $message;
    }

    public function setAuth($data){
        $_SESSION["Auth"] = $data;
    }

    public function Auth(){
        if(isset($_SESSION['Auth'])){
        return $_SESSION['Auth'];
        }else{
            return false;
        }
    }

    public function error(){
        if(isset($_SESSION['error'])){
            echo "Swal.fire('','".$_SESSION['error']."','error')";
            unset($_SESSION['error']);
    }
}

    public function setAlert($message){
        $_SESSION['alert']=$message;
    }

    public function alert(){
        if(isset($_SESSION['alert'])){
            echo "Swal.fire('','".$_SESSION['alert']."','success')";
            unset($_SESSION['alert']);
    }
}

    public function AuthPage(){
        if(!isset($_SESSION['Auth'])){
            $this->redirect('login.php');
        }
    }
    public function nonAuthPage(){
        if(isset($_SESSION['Auth'])){
            $this->redirect('myresumes.php');
        }
    }

}
$fn = new Functions();