<head> 
	<script src="javascripts/ventana.js"> </script>
</head>
<main>
	<h1>Datos de registro del producto</h1>
	<form class="form_usuario" action="?action=insertar_producto" method="POST">
		
		<label for="name">Nombre del producto</label>
		<br/>
		<input type="text" name="name" id="name" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Producto 1" />
		<br/>
		<span style="color:red" class="error" id="nameErr">Nombre no valido</span>
		<br/>
		<label for="price">Precio</label>
		<br/>
		<input type="text" name="price" id="price" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="35.5" />
		<br/>
		<span style="color:red" class="error" id="priceErr">Precio no valido</span>
		<br/>
		<label for="foto_url">Foto</label>
		<br/>
		<input type="text" name="foto_url" id="foto_url" size="20" maxlength="50" value="" required readonly/><br/>
		<span style="color:red" class="error" id="fotoErr">Insertar Foto</span>
		<br/>
		<input type=button value="Añadir foto" onclick="abrirVentana()">
		<br/>
		<p><input type="submit" id="Enviar" value="Enviar" disabled="true">
		<input type="reset" value="Deshacer">
		</p>
		
	</form>
	
	<div id="ventana" class="ventana">
		<input type=button  style="align:rigth" id="cerrar" value="X" onclick="cerrarVentana()">
		<form class="fotoForm" id="fotoForm" action="?action=upload" method="post" enctype="multipart/form-data">
			<input type="file" style="align:center" accept="image/*" name="foto_url" id="upload" onchange="handleFiles(event)"><br>
			<canvas id="canvas" class="canvas"></canvas><br>
			<input type="submit" value="SUBIR" name="foto" id ="foto" onclick="guardaDatos(); compruebaTamaño();">
		</form>
	</div>
</main>
