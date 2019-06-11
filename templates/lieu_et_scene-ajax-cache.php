<script>
	$j(function(){
		var tn = 'lieu_et_scene';

		/* data for selected record, or defaults if none is selected */
		var data = {
			objet_present: { id: '<?php echo $rdata['objet_present']; ?>', value: '<?php echo $rdata['objet_present']; ?>', text: '<?php echo $jdata['objet_present']; ?>' },
			persos_present: { id: '<?php echo $rdata['persos_present']; ?>', value: '<?php echo $rdata['persos_present']; ?>', text: '<?php echo $jdata['persos_present']; ?>' },
			rattache_a_dos2j: { id: '<?php echo $rdata['rattache_a_dos2j']; ?>', value: '<?php echo $rdata['rattache_a_dos2j']; ?>', text: '<?php echo $jdata['rattache_a_dos2j']; ?>' },
			rattache_a_seq: { id: '<?php echo $rdata['rattache_a_seq']; ?>', value: '<?php echo $rdata['rattache_a_seq']; ?>', text: '<?php echo $jdata['rattache_a_seq']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for objet_present */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'objet_present' && d.id == data.objet_present.id)
				return { results: [ data.objet_present ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for persos_present */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'persos_present' && d.id == data.persos_present.id)
				return { results: [ data.persos_present ], more: false, elapsed: 0.01 };
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

