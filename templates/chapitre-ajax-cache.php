<script>
	$j(function(){
		var tn = 'chapitre';

		/* data for selected record, or defaults if none is selected */
		var data = {
			Mission: { id: '<?php echo $rdata['Mission']; ?>', value: '<?php echo $rdata['Mission']; ?>', text: '<?php echo $jdata['Mission']; ?>' },
			rattache_a_dossier: { id: '<?php echo $rdata['rattache_a_dossier']; ?>', value: '<?php echo $rdata['rattache_a_dossier']; ?>', text: '<?php echo $jdata['rattache_a_dossier']; ?>' }
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

