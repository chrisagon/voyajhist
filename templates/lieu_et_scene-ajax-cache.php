<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'lieu_et_scene';

		/* data for selected record, or defaults if none is selected */
		var data = {
			objet_present: <?php echo json_encode(array('id' => $rdata['objet_present'], 'value' => $rdata['objet_present'], 'text' => $jdata['objet_present'])); ?>,
			persos_present: <?php echo json_encode(array('id' => $rdata['persos_present'], 'value' => $rdata['persos_present'], 'text' => $jdata['persos_present'])); ?>,
			rattache_a_dos2j: <?php echo json_encode(array('id' => $rdata['rattache_a_dos2j'], 'value' => $rdata['rattache_a_dos2j'], 'text' => $jdata['rattache_a_dos2j'])); ?>,
			rattache_a_seq: <?php echo json_encode(array('id' => $rdata['rattache_a_seq'], 'value' => $rdata['rattache_a_seq'], 'text' => $jdata['rattache_a_seq'])); ?>
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

