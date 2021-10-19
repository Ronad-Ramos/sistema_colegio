 <?php   

session_start(); 

if(isset($_SESSION['usuario=cole'])) {

       session_destroy();  
       header("location: ../");

}else{ header("location: ../");}


?> 