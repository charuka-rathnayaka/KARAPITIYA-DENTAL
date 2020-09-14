function validate(){
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
    
    
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(reg1.Email.value))
  {
    document.getElementById("error_email").innerHTML="";

  }else{
    document.getElementById("error_email").innerHTML="Enter A Valid Email Address";
    no_error=false;
}
var date=document.reg1.Birthday.value;
if ((date.length)<4){
    document.getElementById("error_birthday").innerHTML="Enter Birthday";
    no_error=false;
}     
else{
    document.getElementById("error_birthday").innerHTML="";
} 

var today =new Date();
var inputDate = new Date(document.reg1.Birthday.value);
if (inputDate > today) {
    document.getElementById("error_birthday").innerHTML="Enter a valid Birthday";
    no_error=false;}

if (!document.reg1.Gender[0].checked &&
    !document.reg1.Gender[1].checked) {
        // no radio button is selected
        document.getElementById("error_gender").innerHTML="Please select a gender";
        no_error=false;
    }
    else{
        document.getElementById("error_gender").innerHTML="";
    }


    return no_error;

}
