<footer>
	<p>
	<img src="https://licensebuttons.net/l/by-sa/3.0/88x31.png" height="31px" /><br/>
	<time datetime="2020-10-29">2018</time>.</p>
	</p>
	<address>
		<p class="izq"> Written by
			<a href="al341959@uji.es" rev="author">Octavio Clemente Engo Angomo</a>.</p>
		<p class="der"> Visit us at:12006 UJI </p>
	</address>
</footer>
<script> fetch('datos.php')
    .then(response => response.json())
	.then(json => console.log(json))
	.then(data => inyectarProducto(data))
    .catch(err => console.log("Error al leer el JSON:", err));
</script>
</body>

</html>
