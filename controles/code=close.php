 <?php   

session_start(); 

if( isset($_SESSION["doolpool=user"]) ) {
       session_destroy();     
       header("location: ../");
}else{
        
       header("location: ../");
}


?> 