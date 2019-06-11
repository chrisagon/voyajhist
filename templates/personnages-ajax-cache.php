<script>
	$j(function(){
		var tn = 'personnages';

		/* data for selected record, or defaults if none is selected */
		var data = {
			quepossedetil: { id: '<?php echo $rdata['quepossedetil']; ?>', value: '<?php echo $rdata['quepossedetil']; ?>', text: '<?php echo $jdata['quepossedetil']; ?>' },
			rattache_a_dos2j: { id: '<?php echo $rdata['rattache_a_dos2j']; ?>', value: '<?php echo $rdata['rattache_a_dos2j']; ?>', text: '<?php echo $jdata['rattache_a_dos2j']; ?>' },
			rattache_a_seq: { id: '<?php echo $rdata['rattache_a_seq']; ?>', value: '<?php echo $rdata['rattache_a_seq']; ?>', text: '<?php echo $jdata['rattache_a_seq']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for quepossedetil */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'quepossedetil' && d.id == data.quepossedetil.id)
				return { results: [ data.quepossedetil ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for rattache_a_dos2j */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'rattache_a_dos2j' && d.id == data.rattache_a_dos2j.id)
				return { results: [ data.rattache_a_dos2j ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for rattache_a_seq */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'rattache_a_seq' && d.id == data.rattache_a_seq.id)
				return { results: [ data.rattache_a_seq ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

