<nav>
	<ul>
		<li>
			<a href="./portal.php?action=home">Home</a>
		</li>
		<li>
			<a href="?action=listar_productos">Productos</a>
		</li>
		<li>
			<a href="?action=nosotros">¿Quienes somos?</a>
		</li>
		<li>
			<a href="?action=usuarios_registrados">Usuarios</a>
		</li>
		<li>    <a href="?action=registrar_producto">Registrar Producto</a>
		</li>
                <li>
			<a href="?action=mobile">Movil</a>
		</li>
		<?php 
		
		 if (!isset($_SESSION['usuario'])){
			echo '<li><a href="?action=login">Autentificar</a></li>';
			echo '<li><a href="?action=registrar_usuario">Registrarme</a></li>';
			echo '<li><a href="?action=ver_productos">Productos</a></li>';
		 }
		elseif (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'admin'){
			echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
			echo '<li><a href="?action=listar_productos">Productos</a></li>';
		}
		elseif (isset($_SESSION['usuario'])){
		    echo '<li><a href="?action=ver_cesta">Cesta de Compra</a></li>';
		    echo '<li><a href="?action=listar_productos">Productos</a></li>';
                    echo '<li><a href="?action=logout">Salir</a></li>';
		}            
        ?>
	</ul>
</nav>
