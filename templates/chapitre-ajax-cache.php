<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'chapitre';

		/* data for selected record, or defaults if none is selected */
		var data = {
			Mission: <?php echo json_encode(array('id' => $rdata['Mission'], 'value' => $rdata['Mission'], 'text' => $jdata['Mission'])); ?>,
			rattache_a_dossier: <?php echo json_encode(array('id' => $rdata['rattache_a_dossier'], 'value' => $rdata['rattache_a_dossier'], 'text' => $jdata['rattache_a_dossier'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for Mission */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Mission' && d.id == data.Mission.id)
				return { results: [ data.Mission ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for rattache_a_dossier */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'rattache_a_dossier' && d.id == data.rattache_a_dossier.id)
				return { results: [ data.rattache_a_dossier ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

