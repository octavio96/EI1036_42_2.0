function	handleFiles(e)	{
    let ctx	=	document.getElementById('canvas').getContext('2d');
    let img	=	new	Image;
    img.src	=	URL.createObjectURL(e.target.files[0]);
    img.onload	=	function()	{
                    ctx.drawImage(img,	20,20);
    }
    
}


function abrirVentana(){
    document.getElementById('ventana').style.display="block";
}

function cerrarVentana(){
    document.getElementById('ventana').style.display="none";
}

function compruebaTamaño(){
  try {
    let form = document.getElementById('fotoForm')
    let file = document.getElementById('upload');
    form.onsubmit = function(){
      if(file.files.item(0).size > 2000000){ 
        alert("La imagen no puede superar los 2MB")
        return false
      }
    }
  } catch (error) {
    alert(error)
  }

}

function guardaDatos(){
    localStorage.setItem("nombre", document.getElementById("name").value);
    localStorage.setItem("precio", document.getElementById("price").value);
    localStorage.setItem("foto", document.getElementById("upload").files[0].value);

}

function asignarContenido(){
    document.getElementById("name").value = localStorage.getItem("nombre");
    document.getElementById("price").value = localStorage.getItem("precio");
    document.getElementById("upload").value = "upload/" + localStorage.getItem("foto");
    localStorage.removeItem("nombre");
    localStorage.removeItem("precio");
    localStorage.removeItem("foto");
}


function comprobacion(){
    var comprobaciones_hechas = 0;
    var nombre = document.getElementById("name");
    var precio = document.getElementById("price");
    var foto = document.getElementById("upload");
    
    if((nombre.value == null) || (nombre.value.length < 1)){
        document.getElementById("nameErr").style.display="inline";
        document.getElementById("Enviar").disabled = true;
    }else{
        comprobaciones_hechas += 1;
        document.getElementById("nameErr").style.display="none";
    }

    if(precio.value <= 0.00){
        document.getElementById("priceErr").style.display="inline";
        document.getElementById("Enviar").disabled = true;
    }else{
        comprobaciones_hechas += 1;
        document.getElementById("priceErr").style.display="none";
    }

    if((foto.value == null) || (foto.value.length < 1)){
        document.getElementById("fotoErr").style.display="inline";
        document.getElementById("Enviar").disabled = true;
    }else{
        comprobaciones_hechas += 1;
        document.getElementById("fotoErr").style.display="none";
    }

    if(comprobaciones_hechas == 3) 
        document.getElementById("Enviar").disabled = false;
}

if(window.location.href == "http://localhost:443/P1/miportal/portal.php?action=upload")
    document.onload = asignarContenido();


window.oninput = function(){
    document.getElementById("name").onchange = comprobacion;
    document.getElementById("price").onchange = comprobacion;
    document.getElementById("upload").onchange = comprobacion;
}
