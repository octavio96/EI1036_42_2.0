<main>
	<h1>Datos de registro </h1>
	<form class="form_usuario" action="?action=insertar_usuario" method="POST">
		
		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="name" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Miguel" />
		<br/>
		<label for="surname">Apellidos</label>
		<br/>
		<input type="text" name="surname" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Cervantes" />
		<br/>
		<label for="role">Rol</label>
		<br/>
		<input type="text" name="role" size="20" maxlength="50" value=""
		 placeholder="Admin" />
		<br/>
		<label for="passwd">Contraseña</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="50" value=""
		/>
		<br/>
		<label for="address">Dirección</label>
		<br/>
		<input type="text" name="address" size="20" maxlength="50" value=""
		 placeholder="Don juan austria" />
		<br/>
		<label for="city">Ciudad</label>
		<br/>
		<input type="text" name="city" size="20" maxlength="50" value=""
		 placeholder="Valencia" />
		<br/>
		<label for="zip_code">Codigo_Postal</label>
		<br/>
		<input type="text" name="zip_code" size="20" maxlength="6" value=""
		 placeholder="46000" />
		<br/>
		<label for="foto_file">Foto</label>
		<br/>
		<input type="text" name="foto_file" size="20" maxlength="50" value=""
		 placeholder="foto" />
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Limpiar">
		</p>
	</form>
</main>
