<script>
	$j(function(){
		var tn = 'Dossier_histoire';

		/* data for selected record, or defaults if none is selected */
		var data = {
			auteur: { id: '<?php echo $rdata['auteur']; ?>', value: '<?php echo $rdata['auteur']; ?>', text: '<?php echo $jdata['auteur']; ?>' }
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

