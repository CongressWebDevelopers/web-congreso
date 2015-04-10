function validar() {
    var correo= document.getElementById('email');
    
    if (/^\w+([\.\-\_]?\w+)*@\w+([\.-]?\w+)*(\.\D{2,4})+$/.test(correo.value)){ 
        alert("!Gracias por contactar con nosotros! Le atenderemos con la mayor brevedad posible.");    
    }else{
        alert("La dirección de email " + correo.value + " es incorrecta. Reinténtelo");
    }
}