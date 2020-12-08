<body>
<main>
 <label for="producto">Elige el producto:</label>
    <input list="productos" name="producto" id="producto" onchange="scrollProducto()">
        <datalist id="productos">
        </datalist>
    <div id="visor" class="visor">
    
        <div id="1" class="item">
            <img src="img/leggins.jpg" width="100" height="100">
            <p>Leggins 20€</p>
            <button>Comprar</button>
        </div> 
    </div>
</main>
<script src="javascripts/ventana.js"> </script>
</body>
