<!--Script ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        document.querySelector('#vermas').addEventListener('click', () => {
            
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                let tabla = document.getElementById("pokemonsTabla");
                                tabla.innerHTML += xhttp.response;
                        }
                };
                setTimeout(() => {
                        xhttp.open("GET", "./?controlador=pokemon&metodo=tandaPokemons", true);
                        xhttp.send();
                }, 5000);
        }, false);
</body></html>
