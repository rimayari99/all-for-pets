function verifier() {
    dateD=document.getElementById("dateD").value;
    dateF=document.getElementById("dateF").value;
 
    if(document.getElementById("dateF").value < document.getElementById("dateD").value )
    {
        alert("la date de fin doit etre superieure a date de debut");
        return false;
    }
    
}