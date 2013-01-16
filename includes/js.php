<!-- cambiar el estilo según la página -->
<script>
$(document).ready(function() {
	<?php
		echo "$('#indexcss').attr({href : '".f_ruta()."c_".$ruta."index.css'});";
	?>
});
</script>