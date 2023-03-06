function enviarTexto(){
    texto = prompt("Escriba un texto");
  
   window.opener.document.write(texto);
   window.close();
}