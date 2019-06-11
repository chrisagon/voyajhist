<script>
	$j(function(){
		var tn = 'connect_perso_seq';

		/* data for selected record, or defaults if none is selected */
		var data = {
			perso: { id: '<?php echo $rdata['perso']; ?>', value: '<?php echo $rdata['perso']; ?>', text: '<?php echo $jdata['perso']; ?>' },
			seq: { id: '<?php echo $rdata['seq']; ?>', value: '<?php echo $rdata['seq']; ?>', text: '<?php echo $jdata['seq']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for perso */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'perso' && d.id == data.perso.id)
				return { results: [ data.perso ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for seq */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'seq' && d.id == data.seq.id)
				return { results: [ data.seq ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

