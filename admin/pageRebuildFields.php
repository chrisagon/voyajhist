<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	$GLOBALS['page_title'] = $Translation['view or rebuild fields'];
	include("{$currDir}/incHeader.php");

	/*
		$schema: [ tablename => [ fieldname => [ appgini => '...', 'db' => '...'], ... ], ... ]
	*/

	/* application schema as created in AppGini */
	$schema = array(   
		'redacteur' => array(   
			'id_redact' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'member_id' => array('appgini' => 'VARCHAR(40) null unique '),
			'prenom' => array('appgini' => 'VARCHAR(40) null '),
			'nom' => array('appgini' => 'VARCHAR(40) null '),
			'email' => array('appgini' => 'VARCHAR(80) null '),
			'score_total' => array('appgini' => 'DECIMAL(6,2) null default \'0\' '),
			'badges' => array('appgini' => 'INT unsigned null '),
			'score_hist' => array('appgini' => 'DECIMAL(10,2) null default \'0\' '),
			'score_obj' => array('appgini' => 'DECIMAL(10,2) null default \'0\' '),
			'score_moy' => array('appgini' => 'DECIMAL(10,2) null default \'0\' '),
			'score_objets' => array('appgini' => 'DECIMAL(10,2) null default \'0\' '),
			'score_perso' => array('appgini' => 'DECIMAL(10,2) null default \'0\' '),
			'score_lets' => array('appgini' => 'DECIMAL(10,2) null default \'0\' ')
		),
		'Dossier_histoire' => array(   
			'id2dossier' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'auteur' => array('appgini' => 'INT unsigned null '),
			'titre_histoire' => array('appgini' => 'VARCHAR(40) not null '),
			'resume' => array('appgini' => 'TEXT not null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null ')
		),
		'chapitre' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'Mission' => array('appgini' => 'INT unsigned null '),
			'resume' => array('appgini' => 'TEXT null '),
			'rattache_a_dossier' => array('appgini' => 'INT unsigned null '),
			'auteur' => array('appgini' => 'VARCHAR(40) null ')
		),
		'sequence' => array(   
			'id_sequence' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'numero_ordre' => array('appgini' => 'INT not null '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'rattache_a_chapitre' => array('appgini' => 'INT unsigned null '),
			'difficulte' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'auteur' => array('appgini' => 'VARCHAR(40) null '),
			'modele' => array('appgini' => 'INT unsigned null ')
		),
		'Objectifs' => array(   
			'id_objectif' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titreobj' => array('appgini' => 'TEXT not null '),
			'description_obj' => array('appgini' => 'TEXT null '),
			'ref_o_gameplay' => array('appgini' => 'TEXT null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned null ')
		),
		'moyens' => array(   
			'id_moyen' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titremoy' => array('appgini' => 'TEXT not null '),
			'description_moy' => array('appgini' => 'TEXT null '),
			'ref_o_gameplay' => array('appgini' => 'TEXT null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned null ')
		),
		'Objets' => array(   
			'id_objet' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom_objet' => array('appgini' => 'TEXT not null '),
			'illustration' => array('appgini' => 'VARCHAR(40) null '),
			'typologie' => array('appgini' => 'VARCHAR(12) null '),
			'Aquoisertil' => array('appgini' => 'TEXT null '),
			'Contient' => array('appgini' => 'INT unsigned null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned null '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned null ')
		),
		'personnages' => array(   
			'id_perso' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom' => array('appgini' => 'TEXT not null '),
			'type' => array('appgini' => 'TEXT null '),
			'illustration' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'quepossedetil' => array('appgini' => 'INT unsigned null '),
			'apparait_quand' => array('appgini' => 'TEXT null '),
			'disparait_quand' => array('appgini' => 'TEXT null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned null '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned null ')
		),
		'lieu_et_scene' => array(   
			'id_lets' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom_du_lieu' => array('appgini' => 'TEXT not null '),
			'illustration' => array('appgini' => 'VARCHAR(40) null '),
			'description' => array('appgini' => 'TEXT null '),
			'difficulte_nivo' => array('appgini' => 'VARCHAR(40) null '),
			'condition_entree' => array('appgini' => 'TEXT null '),
			'condition_sortie' => array('appgini' => 'TEXT null '),
			'objet_present' => array('appgini' => 'INT unsigned null '),
			'persos_present' => array('appgini' => 'INT unsigned null '),
			'creer_par' => array('appgini' => 'VARCHAR(40) null '),
			'rattache_a_dos2j' => array('appgini' => 'INT unsigned null '),
			'rattache_a_seq' => array('appgini' => 'INT unsigned null ')
		),
		'ref_badges' => array(   
			'id_badge' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT null '),
			'domaine' => array('appgini' => 'VARCHAR(40) null '),
			'score_min' => array('appgini' => 'DECIMAL(10,2) null '),
			'score_max' => array('appgini' => 'VARCHAR(40) null '),
			'icone_badge' => array('appgini' => 'VARCHAR(40) null ')
		),
		'ref_sequences' => array(   
			'id_seqref' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT null '),
			'typologie' => array('appgini' => 'VARCHAR(40) null '),
			'num_ord' => array('appgini' => 'VARCHAR(40) null ')
		),
		'ref_mission' => array(   
			'id_misref' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) not null '),
			'description' => array('appgini' => 'TEXT null ')
		),
		'boiteaid' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'titre' => array('appgini' => 'VARCHAR(40) null '),
			'commentaire' => array('appgini' => 'TEXT null '),
			'Capteur' => array('appgini' => 'VARCHAR(40) null ')
		),
		'ref_capteur' => array(   
			'id' => array('appgini' => 'INT unsigned not null primary key auto_increment '),
			'nom' => array('appgini' => 'VARCHAR(40) null '),
			'fonction' => array('appgini' => 'TEXT null '),
			'machine' => array('appgini' => 'VARCHAR(40) null '),
			'reference' => array('appgini' => 'TEXT null '),
			'fichier' => array('appgini' => 'VARCHAR(40) null ')
		)
	);

	$table_captions = getTableList();

	/* function for preparing field definition for comparison */
	function prepare_def($def) {
		$def = strtolower($def);

		/* ignore 'null' */
		$def = preg_replace('/\s+not\s+null\s*/', '%%NOT_NULL%%', $def);
		$def = preg_replace('/\s+null\s*/', ' ', $def);
		$def = str_replace('%%NOT_NULL%%', ' not null ', $def);

		/* ignore length for int data types */
		$def = preg_replace('/int\s*\([0-9]+\)/', 'int', $def);

		/* make sure there is always a space before mysql words */
		$def = preg_replace('/(\S)(unsigned|not null|binary|zerofill|auto_increment|default)/', '$1 $2', $def);

		/* treat 0.000.. same as 0 */
		$def = preg_replace('/([0-9])*\.0+/', '$1', $def);

		/* treat unsigned zerofill same as zerofill */
		$def = str_ireplace('unsigned zerofill', 'zerofill', $def);

		/* ignore zero-padding for date data types */
		$def = preg_replace("/date\s*default\s*'([0-9]{4})-0?([1-9])-0?([1-9])'/", "date default '$1-$2-$3'", $def);

		return trim($def);
	}

	/**
	 *  @brief creates/fixes given field according to given schema
	 *  @return integer: 0 = error, 1 = field updated, 2 = field created
	 */
	function fix_field($fix_table, $fix_field, $schema, &$qry) {
		if(!isset($schema[$fix_table][$fix_field])) return 0;

		$def = $schema[$fix_table][$fix_field];
		$field_added = $field_updated = false;
		$eo['silentErrors'] = true;

		// field exists?
		$res = sql("show columns from `{$fix_table}` like '{$fix_field}'", $eo);
		if($row = db_fetch_assoc($res)){
			// modify field
			$qry = "alter table `{$fix_table}` modify `{$fix_field}` {$def['appgini']}";
			sql($qry, $eo);

			// remove unique from db if necessary
			if($row['Key'] == 'UNI' && !stripos($def['appgini'], ' unique')){
				// retrieve unique index name
				$res_unique = sql("show index from `{$fix_table}` where Column_name='{$fix_field}' and Non_unique=0", $eo);
				if($row_unique = db_fetch_assoc($res_unique)){
					$qry_unique = "drop index `{$row_unique['Key_name']}` on `{$fix_table}`";
					sql($qry_unique, $eo);
					$qry .= ";\n{$qry_unique}";
				}
			}

			return 1;
		}

		// missing field is defined as PK and table has another PK field?
		$current_pk = getPKFieldName($fix_table);
		if(stripos($def['appgini'], 'primary key') !== false && $current_pk !== false) {
			// if current PK is not another AppGini-defined field, then rename it.
			if(!isset($schema[$fix_table][$current_pk])) {
				// no need to include 'primary key' in definition since it's already a PK field
				$redef = str_ireplace(' primary key', '', $def['appgini']);
				$qry = "alter table `{$fix_table}` change `{$current_pk}` `{$fix_field}` {$redef}";
				sql($qry, $eo);
				return 1;
			}

			// current PK field is another AppGini-defined field
			// this happens if table had a PK field in AppGini then it was unset as PK
			// and another field was created and set as PK
			// in that case, drop PK index from current PK
			// and also remove auto_increment from it if defined
			// then proceed to creating the missing PK field
			$pk_def = str_ireplace(' auto_increment', '', $schema[$fix_table][$current_pk]);
			sql("alter table `{$fix_table}` modify `{$current_pk}` {$pk_def}", $eo);
		}

		// create field
		$qry = "alter table `{$fix_table}` add column `{$fix_field}` {$def['appgini']}";
		sql($qry, $eo);
		return 2;
	}

	/* process requested fixes */
	$fix_table = (isset($_GET['t']) ? $_GET['t'] : false);
	$fix_field = (isset($_GET['f']) ? $_GET['f'] : false);
	$fix_all = (isset($_GET['all']) ? true : false);

	if($fix_field && $fix_table) $fix_status = fix_field($fix_table, $fix_field, $schema, $qry);

	/* retrieve actual db schema */
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

	/* handle fix_all request */
	if($fix_all){
		foreach($schema as $tn => $fields){
			foreach($fields as $fn => $fd){
				if(prepare_def($fd['appgini']) == prepare_def($fd['db'])) continue;
				fix_field($tn, $fn, $schema, $qry);
			}
		}

		redirect('admin/pageRebuildFields.php');
		exit;
	}
?>

<?php if($fix_status == 1 || $fix_status == 2){ ?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<i class="glyphicon glyphicon-info-sign"></i>
		<?php 
			$originalValues = array('<ACTION>', '<FIELD>', '<TABLE>', '<QUERY>');
			$action = ($fix_status == 2 ? 'create' : 'update');
			$replaceValues = array($action, $fix_field, $fix_table, $qry);
			echo str_replace($originalValues, $replaceValues, $Translation['create or update table']);
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
		<th id="fix_all"></th>
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
	$j(function(){
		$j('[data-toggle="tooltip"]').tooltip();

		$j('#show_deviations_only').click(function(){
			$j(this).addClass('hidden');
			$j('#show_all_fields').removeClass('hidden');
			$j('.field_ok').hide();
		});

		$j('#show_all_fields').click(function(){
			$j(this).addClass('hidden');
			$j('#show_deviations_only').removeClass('hidden');
			$j('.field_ok').show();
		});

		$j('.btn_update, #fix_all').click(function(){
			return confirm("<?php echo $Translation['field update warning'] ; ?>");
		});

		var count_updates = $j('.btn_update').length;
		var count_creates = $j('.btn_create').length;
		if(!count_creates && !count_updates){
			$j('.summary').addClass('alert-success').html("<?php echo $Translation['no deviations found'] ; ?>");
		}else{
			var fieldsCount = "<?php echo $Translation['error fields']; ?>";
			fieldsCount = fieldsCount.replace(/<CREATENUM>/, count_creates ).replace(/<UPDATENUM>/, count_updates);


			$j('.summary')
				.addClass('alert-warning')
				.html(
					fieldsCount + 
					'<br><br>' + 
					'<a href="pageBackupRestore.php" class="alert-link">' +
						'<b><?php echo addslashes($Translation['backup before fix']); ?></b>' +
					'</a>'
				);

			$j('<a href="pageRebuildFields.php?all=1" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-cog"></i> <?php echo addslashes($Translation['fix all']); ?></a>').appendTo('#fix_all');
		}
	});
</script>

<?php
	include("{$currDir}/incFooter.php");
?>
