function validar(evObject) {
    var correo = document.getElementById('email');
    var error = document.getElementById("contacto-notification")

    if (/^\w+([\.\-\_]?\w+)*@\w+([\.-]?\w+)*(\.\D{2,4})+$/.test(correo.value)) {
        if (error.classList.contains("error"))
            error.classList.remove("error")
        error.classList.add("success");
        error.innerText = "!Gracias por contactar con nosotros! Le atenderemos con la mayor brevedad posible.";
        error.style.display = 'block';

    } else {
        error.innerText = "La dirección de email " + correo.value + " es incorrecta. Reinténtelo";
        if (error.classList.contains("success"))
            error.classList.remove("success")
        error.classList.add("error");
        error.style.display = 'block';

    }
    return false;
}
