<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    document.querySelector('#pag').addEventListener('click', ()=>{
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                let tabla = document.getElementById("pokemonsTabla");
                                tabla.innerHTML += xhttp.response;
                        }
    });
    setTimeout(() => {
                        xhttp.open("GET", "./?controlador=pokemon&source=api&metodo=tandaPokemons", true);
                        xhttp.send();
                }, 1000);
        }, false);

</script>
</body></html>
