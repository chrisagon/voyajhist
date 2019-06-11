<script>
	$j(function(){
		var tn = 'sequence';

		/* data for selected record, or defaults if none is selected */
		var data = {
			rattache_a_chapitre: { id: '<?php echo $rdata['rattache_a_chapitre']; ?>', value: '<?php echo $rdata['rattache_a_chapitre']; ?>', text: '<?php echo $jdata['rattache_a_chapitre']; ?>' },
			modele: { id: '<?php echo $rdata['modele']; ?>', value: '<?php echo $rdata['modele']; ?>', text: '<?php echo $jdata['modele']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for rattache_a_chapitre */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'rattache_a_chapitre' && d.id == data.rattache_a_chapitre.id)
				return { results: [ data.rattache_a_chapitre ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for modele */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'modele' && d.id == data.modele.id)
				return { results: [ data.modele ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

