<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'redacteur';

		/* data for selected record, or defaults if none is selected */
		var data = {
			badges: <?php echo json_encode(array('id' => $rdata['badges'], 'value' => $rdata['badges'], 'text' => $jdata['badges'])); ?>
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

