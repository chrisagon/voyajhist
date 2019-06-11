<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	$GLOBALS['page_title'] = $Translation['view or rebuild fields'];
	include("{$currDir}/incHeader.php");

	/* application schema as created in AppGini */
	$schema = array(   
		'redacteur' => array(   
			'id_redact' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'member_id' => array('appgini' => 'VARCHAR(40) unique '),
			'prenom' => array('appgini' => 'VARCHAR(40) '),
			'nom' => array('appgini' => 'VARCHAR(40) '),
			'email' => array('appgini' => 'VARCHAR(80) '),
			'score_total' => array('appgini' => 'DECIMAL(6,2) default \'0\' '),
			'badges' => array('appgini' => 'INT unsigned '),
			'score_hist' => array('appgini' => 'DECIMAL(10,2) default \'0\' '),
			'score_obj' => array('appgini' => 'DECIMAL(10,2) default \'0\' '),
			'score_moy' => array('appgini' => 'DECIMAL(10,2) default \'0\' '),
			'score_objets' => array('appgini' => 'DECIMAL(10,2) default \'0\' '),
			'score_perso' => array('appgini' => 'DECIMAL(10,2) default \'0\' '),
			'score_lets' => array('appgini' => 'DECIMAL(10,2) default \'0\' ')
		),
		'Dossier_histoire' => array(   
			'id2dossier' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'auteur' => array('appgini' => 'INT unsigned '),
			'titre_histoire' => array('appgini' => 'VARCHAR(40) not null '),
			'resume' => array('appgini' => 'TEXT not null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) ')
		),
		'chapitre' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'Mission' => array('appgini' => 'INT unsigned '),
			'resume' => array('appgini' => 'TEXT '),
			'rattache_a_dossier' => array('appgini' => 'INT unsigned '),
			'auteur' => array('appgini' => 'VARCHAR(40) ')
		),
		'sequence' => array(   
			'id_sequence' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'numero_ordre' => array('appgini' => 'INT not null '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'rattache_a_chapitre' => array('appgini' => 'INT unsigned '),
			'difficulte' => array('appgini' => 'VARCHAR(40) '),
			'description' => array('appgini' => 'TEXT '),
			'auteur' => array('appgini' => 'VARCHAR(40) '),
			'modele' => array('appgini' => 'INT unsigned ')
		),
		'Objectifs' => array(   
			'id_objectif' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titreobj' => array('appgini' => 'TEXT not null '),
			'description_obj' => array('appgini' => 'TEXT '),
			'ref_o_gameplay' => array('appgini' => 'TEXT '),
			'creer_par' => array('appgini' => 'VARCHAR(40) '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned ')
		),
		'moyens' => array(   
			'id_moyen' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titremoy' => array('appgini' => 'TEXT not null '),
			'description_moy' => array('appgini' => 'TEXT '),
			'ref_o_gameplay' => array('appgini' => 'TEXT '),
			'creer_par' => array('appgini' => 'VARCHAR(40) '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned ')
		),
		'Objets' => array(   
			'id_objet' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom_objet' => array('appgini' => 'TEXT not null '),
			'illustration' => array('appgini' => 'VARCHAR(40) '),
			'typologie' => array('appgini' => 'VARCHAR(12) '),
			'Aquoisertil' => array('appgini' => 'TEXT '),
			'Contient' => array('appgini' => 'INT unsigned '),
			'creer_par' => array('appgini' => 'VARCHAR(40) '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned ')
		),
		'personnages' => array(   
			'id_perso' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom' => array('appgini' => 'TEXT not null '),
			'type' => array('appgini' => 'TEXT '),
			'illustration' => array('appgini' => 'VARCHAR(40) '),
			'description' => array('appgini' => 'TEXT '),
			'quepossedetil' => array('appgini' => 'INT unsigned '),
			'apparait_quand' => array('appgini' => 'TEXT '),
			'disparait_quand' => array('appgini' => 'TEXT '),
			'creer_par' => array('appgini' => 'VARCHAR(40) '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned ')
		),
		'lieu_et_scene' => array(   
			'id_lets' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom_du_lieu' => array('appgini' => 'TEXT not null '),
			'illustration' => array('appgini' => 'VARCHAR(40) '),
			'description' => array('appgini' => 'TEXT '),
			'difficulte_nivo' => array('appgini' => 'VARCHAR(40) '),
			'condition_entree' => array('appgini' => 'TEXT '),
			'condition_sortie' => array('appgini' => 'TEXT '),
			'objet_present' => array('appgini' => 'INT unsigned '),
			'persos_present' => array('appgini' => 'INT unsigned '),
			'creer_par' => array('appgini' => 'VARCHAR(40) '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned ')
		),
		'ref_badges' => array(   
			'id_badge' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT '),
			'domaine' => array('appgini' => 'VARCHAR(40) '),
			'score_min' => array('appgini' => 'DECIMAL(10,2) '),
			'score_max' => array('appgini' => 'VARCHAR(40) '),
			'icone_badge' => array('appgini' => 'VARCHAR(40) ')
		),
		'ref_sequences' => array(   
			'id_seqref' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT '),
			'typologie' => array('appgini' => 'VARCHAR(40) '),
			'num_ord' => array('appgini' => 'VARCHAR(40) ')
		),
		'ref_mission' => array(   
			'id_misref' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT ')
		),
		'boiteaid' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) '),
			'commentaire' => array('appgini' => 'TEXT '),
			'Capteur' => array('appgini' => 'VARCHAR(40) ')
		),
		'ref_capteur' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom' => array('appgini' => 'VARCHAR(40) '),
			'fonction' => array('appgini' => 'TEXT '),
			'machine' => array('appgini' => 'VARCHAR(40) '),
			'reference' => array('appgini' => 'TEXT '),
			'fichier' => array('appgini' => 'VARCHAR(40) ')
		)
	);

	$table_captions = getTableList();

	/* function for preparing field definition for comparison */
	function prepare_def($def){
		$def = trim($def);
		$def = strtolower($def);

		/* ignore length for int data types */
		$def = preg_replace('/int\w*\([0-9]+\)/', 'int', $def);

		/* make sure there is always a space before mysql words */
		$def = preg_replace('/(\S)(unsigned|not null|binary|zerofill|auto_increment|default)/', '$1 $2', $def);

		/* treat 0.000.. same as 0 */
		$def = preg_replace('/([0-9])*\.0+/', '$1', $def);

		/* treat unsigned zerofill same as zerofill */
		$def = str_ireplace('unsigned zerofill', 'zerofill', $def);

		/* ignore zero-padding for date data types */
		$def = preg_replace("/date\s*default\s*'([0-9]{4})-0?([1-9])-0?([1-9])'/i", "date default '$1-$2-$3'", $def);

		return $def;
	}

	/* process requested fixes */
	$fix_table = (isset($_GET['t']) ? $_GET['t'] : false);
	$fix_field = (isset($_GET['f']) ? $_GET['f'] : false);

	if($fix_table && $fix_field && isset($schema[$fix_table][$fix_field])){
		$field_added = $field_updated = false;

		// field exists?
		$res = sql("show columns from `{$fix_table}` like '{$fix_field}'", $eo);
		if($row = db_fetch_assoc($res)){
			// modify field
			$qry = "alter table `{$fix_table}` modify `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_updated = true;
		}else{
			// create field
			$qry = "alter table `{$fix_table}` add column `{$fix_field}` {$schema[$fix_table][$fix_field]['appgini']}";
			sql($qry, $eo);
			$field_added = true;
		}
	}

	foreach($table_captions as $tn => $tc){
		$eo['silentErrors'] = true;
		$res = sql("show columns from `{$tn}`", $eo);
		if($res){
			while($row = db_fetch_assoc($res)){
				if(!isset($schema[$tn][$row['Field']]['appgini'])) continue;
				$field_description = strtoupper(str_replace(' ', '', $row['Type']));
				$field_description = str_ireplace('unsigned', ' unsigned', $field_description);
				$field_description = str_ireplace('zerofill', ' zerofill', $field_description);
				$field_description = str_ireplace('binary', ' binary', $field_description);
				$field_description .= ($row['Null'] == 'NO' ? ' not null' : '');
				$field_description .= ($row['Key'] == 'PRI' ? ' primary key' : '');
				$field_description .= ($row['Key'] == 'UNI' ? ' unique' : '');
				$field_description .= ($row['Default'] != '' ? " default '" . makeSafe($row['Default']) . "'" : '');
				$field_description .= ($row['Extra'] == 'auto_increment' ? ' auto_increment' : '');

				$schema[$tn][$row['Field']]['db'] = '';
				if(isset($schema[$tn][$row['Field']])){
					$schema[$tn][$row['Field']]['db'] = $field_description;
				}
			}
		}
	}
?>

<?php if($field_added || $field_updated){ ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="glyphicon glyphicon-info-sign"></i>
		<?php 
			$originalValues =  array ('<ACTION>','<FIELD>' , '<TABLE>' , '<QUERY>' );
			$action = ($field_added ? 'create' : 'update');
			$replaceValues = array ( $action , $fix_field , $fix_table , $qry );
			echo  str_replace ( $originalValues , $replaceValues , $Translation['create or update table']  );
		?>
	</div>
<?php } ?>

<div class="page-header"><h1>
	<?php echo $Translation['view or rebuild fields'] ; ?>
	<button type="button" class="btn btn-default" id="show_deviations_only"><i class="glyphicon glyphicon-eye-close"></i> <?php echo $Translation['show deviations only'] ; ?></button>
	<button type="button" class="btn btn-default hidden" id="show_all_fields"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $Translation['show all fields'] ; ?></button>
</h1></div>

<p class="lead"><?php echo $Translation['compare tables page'] ; ?></p>

<div class="alert summary"></div>
<table class="table table-responsive table-hover table-striped">
	<thead><tr>
		<th></th>
		<th><?php echo $Translation['field'] ; ?></th>
		<th><?php echo $Translation['AppGini definition'] ; ?></th>
		<th><?php echo $Translation['database definition'] ; ?></th>
		<th></th>
	</tr></thead>

	<tbody>
	<?php foreach($schema as $tn => $fields){ ?>
		<tr class="text-info"><td colspan="5"><h4 data-placement="left" data-toggle="tooltip" title="<?php echo str_replace ( "<TABLENAME>" , $tn , $Translation['table name title']) ; ?>"><i class="glyphicon glyphicon-th-list"></i> <?php echo $table_captions[$tn]; ?></h4></td></tr>
		<?php foreach($fields as $fn => $fd){ ?>
			<?php $diff = ((prepare_def($fd['appgini']) == prepare_def($fd['db'])) ? false : true); ?>
			<?php $no_db = ($fd['db'] ? false : true); ?>
			<tr class="<?php echo ($diff ? 'warning' : 'field_ok'); ?>">
				<td><i class="glyphicon glyphicon-<?php echo ($diff ? 'remove text-danger' : 'ok text-success'); ?>"></i></td>
				<td><?php echo $fn; ?></td>
				<td class="<?php echo ($diff ? 'bold text-success' : ''); ?>"><?php echo $fd['appgini']; ?></td>
				<td class="<?php echo ($diff ? 'bold text-danger' : ''); ?>"><?php echo thisOr($fd['db'], $Translation['does not exist']); ?></td>
				<td>
					<?php if($diff && $no_db){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-success btn-xs btn_create" data-toggle="tooltip" data-placement="top" title="<?php echo $Translation['create field'] ; ?>"><i class="glyphicon glyphicon-plus"></i> <?php echo $Translation['create it'] ; ?></a>
					<?php }elseif($diff){ ?>
						<a href="pageRebuildFields.php?t=<?php echo $tn; ?>&f=<?php echo $fn; ?>" class="btn btn-warning btn-xs btn_update" data-toggle="tooltip" title="<?php echo $Translation['fix field'] ; ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['fix it'] ; ?></a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	</tbody>
</table>
<div class="alert summary"></div>

<style>
	.bold{ font-weight: bold; }
	[data-toggle="tooltip"]{ display: block !important; }
</style>

<script>
	jQuery(function(){
		jQuery('[data-toggle="tooltip"]').tooltip();

		jQuery('#show_deviations_only').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_all_fields').removeClass('hidden');
			jQuery('.field_ok').hide();
		});

		jQuery('#show_all_fields').click(function(){
			jQuery(this).addClass('hidden');
			jQuery('#show_deviations_only').removeClass('hidden');
			jQuery('.field_ok').show();
		});

		jQuery('.btn_update').click(function(){
			return confirm("<?php echo $Translation['field update warning'] ; ?>");
		});

		var count_updates = jQuery('.btn_update').length;
		var count_creates = jQuery('.btn_create').length;
		if(!count_creates && !count_updates){
			jQuery('.summary').addClass('alert-success').html("<?php echo $Translation['no deviations found'] ; ?>");
		}else{
			var fieldsCount = "<?php echo $Translation['error fields']; ?>";
			fieldsCount = fieldsCount.replace(/<CREATENUM>/, count_creates ).replace(/<UPDATENUM>/, count_updates);


			jQuery('.summary')
				.addClass('alert-warning')
				.html(
					fieldsCount
				);
		}
	});
</script>

<?php
	include("{$currDir}/incFooter.php");
?>
