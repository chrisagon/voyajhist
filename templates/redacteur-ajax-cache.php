<script>
	$j(function(){
		var tn = 'redacteur';

		/* data for selected record, or defaults if none is selected */
		var data = {
			badges: { id: '<?php echo $rdata['badges']; ?>', value: '<?php echo $rdata['badges']; ?>', text: '<?php echo $jdata['badges']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for badges */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'badges' && d.id == data.badges.id)
				return { results: [ data.badges ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

