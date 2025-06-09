<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['selecioneIdioma']; ?></h2>

	<p>&nbsp;</p>

	<div class="container">
		<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['portugues']; ?></p>
						<p class="card-text">Brasil</p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=pt"><img src="./icones/pt.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">pt</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['ingles']; ?></p>
						<p class="card-text">EUA</p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=en"><img src="./icones/en.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">en</small>
					</div>
				</div>
			</div>
			
			
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text">Espanha</p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es"><img src="./icones/es.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es</small>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>