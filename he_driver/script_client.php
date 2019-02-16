<?php 
	// Funciones php Aqui
class he_driver{
	public function con($linkStr){
		$link = explode("@", $linkStr);
		$act = $link[1];
		$name = $link[0];
		return "{$GLOBALS['controller']}/{$name}Controller.php?action={$act}";
	}
}
$he = new he_driver();
?>

<script>
	var he_driver = function(){
		this.con = function(linkStr){
			var link = linkStr.split("@");
			var act = link[1];
			var name = link[0];
			return "<?=$controller?>/"+name+"Controller.php?action="+act;
		}
		this.uploadFile = function(){
			//Codigo extra
		}
	}
	he = new he_driver();
</script>