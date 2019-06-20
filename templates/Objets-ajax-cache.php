<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'Objets';

		/* data for selected record, or defaults if none is selected */
		var data = {
			Contient: <?php echo json_encode(array('id' => $rdata['Contient'], 'value' => $rdata['Contient'], 'text' => $jdata['Contient'])); ?>,
			rattache_a_dos2j: <?php echo json_encode(array('id' => $rdata['rattache_a_dos2j'], 'value' => $rdata['rattache_a_dos2j'], 'text' => $jdata['rattache_a_dos2j'])); ?>,
			rattache_a_seq: <?php echo json_encode(array('id' => $rdata['rattache_a_seq'], 'value' => $rdata['rattache_a_seq'], 'text' => $jdata['rattache_a_seq'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for Contient */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Contient' && d.id == data.Contient.id)
				return { results: [ data.Contient ], more: false, elapsed: 0.01 };
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

