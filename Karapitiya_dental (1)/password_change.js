function validate_password(){
    var no_error=true
    var firstname=document.reg1.Firstname.value;
    if ((firstname.length)<1){
        document.getElementById("error_firstname").innerHTML="Enter Firstname";
        no_error=false;
    } 
    else{
        document.getElementById("error_firstname").innerHTML="";
    }    
    
    var lastname=document.reg1.Lastname.value;
    if ((lastname.length)<1){
        document.getElementById("error_lastname").innerHTML="Enter Lastname";
        no_error=false;
    }   
    else{
        document.getElementById("error_lastname").innerHTML="";
    }    
    
    
    return no_error;

}
