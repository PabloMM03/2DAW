<form class="form" action="./?controlador=controlador_pokemon&metodo=listar&source=api" method="POST">
        <input type="submit" value="Ver desde API" />
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        document.querySelector('#vermas').addEventListener('click', () => {
                // let xhttp = new XMLHttpRequest();
                // xhttp.open("GET", "./?controlador=controlador_pokemon&metodo=refreshPokemons", true);
                // xhttp.send();
                // xhttp.onreadystatechange = () => {
                //         console.log(xhttp.response);
                // }

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                let tabla = document.getElementById("pokemonsTabla");
                                tabla.innerHTML += xhttp.response;
                                // console.log(xhttp.response);
                        }
                };


                setTimeout(() => {
                        xhttp.open("GET", "./?controlador=controlador_pokemon&metodo=refreshPokemons", true);
                        xhttp.send();
                }, 5000);

        }, false);
</script>

<!-- <script>
        $(document).ready(function() {
                //$('#example').DataTable();

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                console.log(xhttp.response);
                        }
                };


                setTimeout(() => {
                        xhttp.open("GET", "./?controlador=controlador_pokemon&metodo=refreshPokemons", true);
                        xhttp.send();
                }, 5000);

        });
</script> -->


</body>

</html>