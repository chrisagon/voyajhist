<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'Dossier_histoire';

		/* data for selected record, or defaults if none is selected */
		var data = {
			auteur: <?php echo json_encode(array('id' => $rdata['auteur'], 'value' => $rdata['auteur'], 'text' => $jdata['auteur'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for auteur */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'auteur' && d.id == data.auteur.id)
				return { results: [ data.auteur ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

