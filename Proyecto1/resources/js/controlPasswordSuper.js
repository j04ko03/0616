const passWord = "sdGhaflJHTeifhnsb322wscadfgv4";
const inputPass = document.getElementById('clave');
const btnSolicitud = document.getElementById('btnSolicitud');
const formSolicitud = document.getElementById('formSolicitud');

btnSolicitud.addEventListener('click', function(){
    console.log(inputPass.value);
    console.log("sdGhaflJHTeifhnsb322wscadfgv4");
    if(passWord === inputPass.value){
        formSolicitud.submit();
    }else{
        alert("Password Errónea");
    }
});