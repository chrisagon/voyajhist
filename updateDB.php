<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('redacteur', "create table if not exists `redacteur` (   `id_redact` INT unsigned not null auto_increment , primary key (`id_redact`), `member_id` VARCHAR(40) null , unique `member_id_unique` (`member_id`), `prenom` VARCHAR(40) null , `nom` VARCHAR(40) null , `email` VARCHAR(80) null , `score_total` DECIMAL(6,2) null default '0' , `badges` INT unsigned null , `score_hist` DECIMAL(10,2) null default '0' , `score_obj` DECIMAL(10,2) null default '0' , `score_moy` DECIMAL(10,2) null default '0' , `score_objets` DECIMAL(10,2) null default '0' , `score_perso` DECIMAL(10,2) null default '0' , `score_lets` DECIMAL(10,2) null default '0' ) CHARSET utf8", $silent);
		setupIndexes('redacteur', array('badges'));
		setupTable('Dossier_histoire', "create table if not exists `Dossier_histoire` (   `id2dossier` INT unsigned not null auto_increment , primary key (`id2dossier`), `auteur` INT unsigned null , `titre_histoire` VARCHAR(40) not null , `resume` TEXT not null , `creer_par` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('Dossier_histoire', array('auteur'));
		setupTable('chapitre', "create table if not exists `chapitre` (   `id` INT unsigned not null auto_increment , primary key (`id`), `titre` VARCHAR(40) not null , `Mission` INT unsigned null , `resume` TEXT null , `rattache_a_dossier` INT unsigned null , `auteur` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('chapitre', array('Mission','rattache_a_dossier'));
		setupTable('sequence', "create table if not exists `sequence` (   `id_sequence` INT unsigned not null auto_increment , primary key (`id_sequence`), `numero_ordre` INT not null , `titre` VARCHAR(40) not null , `rattache_a_chapitre` INT unsigned null , `difficulte` VARCHAR(40) null , `description` TEXT null , `auteur` VARCHAR(40) null , `modele` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('sequence', array('rattache_a_chapitre','modele'));
		setupTable('Objectifs', "create table if not exists `Objectifs` (   `id_objectif` INT unsigned not null auto_increment , primary key (`id_objectif`), `titreobj` TEXT not null , `description_obj` TEXT null , `ref_o_gameplay` TEXT null , `creer_par` VARCHAR(40) null , `rattache_a_dos2j` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('Objectifs', array('rattache_a_dos2j'));
		setupTable('moyens', "create table if not exists `moyens` (   `id_moyen` INT unsigned not null auto_increment , primary key (`id_moyen`), `titremoy` TEXT not null , `description_moy` TEXT null , `ref_o_gameplay` TEXT null , `creer_par` VARCHAR(40) null , `rattache_a_dos2j` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('moyens', array('rattache_a_dos2j'));
		setupTable('Objets', "create table if not exists `Objets` (   `id_objet` INT unsigned not null auto_increment , primary key (`id_objet`), `nom_objet` TEXT not null , `illustration` VARCHAR(40) null , `typologie` VARCHAR(12) null , `Aquoisertil` TEXT null , `Contient` INT unsigned null , `creer_par` VARCHAR(40) null , `rattache_a_dos2j` INT unsigned null , `rattache_a_seq` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('Objets', array('Contient','rattache_a_dos2j','rattache_a_seq'));
		setupTable('personnages', "create table if not exists `personnages` (   `id_perso` INT unsigned not null auto_increment , primary key (`id_perso`), `nom` TEXT not null , `type` TEXT null , `illustration` VARCHAR(40) null , `description` TEXT null , `quepossedetil` INT unsigned null , `apparait_quand` TEXT null , `disparait_quand` TEXT null , `creer_par` VARCHAR(40) null , `rattache_a_dos2j` INT unsigned null , `rattache_a_seq` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('personnages', array('quepossedetil','rattache_a_dos2j','rattache_a_seq'));
		setupTable('lieu_et_scene', "create table if not exists `lieu_et_scene` (   `id_lets` INT unsigned not null auto_increment , primary key (`id_lets`), `nom_du_lieu` TEXT not null , `illustration` VARCHAR(40) null , `description` TEXT null , `difficulte_nivo` VARCHAR(40) null , `condition_entree` TEXT null , `condition_sortie` TEXT null , `objet_present` INT unsigned null , `persos_present` INT unsigned null , `creer_par` VARCHAR(40) null , `rattache_a_dos2j` INT unsigned null , `rattache_a_seq` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('lieu_et_scene', array('objet_present','persos_present','rattache_a_dos2j','rattache_a_seq'));
		setupTable('ref_badges', "create table if not exists `ref_badges` (   `id_badge` INT unsigned not null auto_increment , primary key (`id_badge`), `titre` VARCHAR(40) not null , `description` TEXT null , `domaine` VARCHAR(40) null , `score_min` DECIMAL(10,2) null , `score_max` VARCHAR(40) null , `icone_badge` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('ref_sequences', "create table if not exists `ref_sequences` (   `id_seqref` INT unsigned not null auto_increment , primary key (`id_seqref`), `titre` VARCHAR(40) not null , `description` TEXT null , `typologie` VARCHAR(40) null , `num_ord` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('ref_mission', "create table if not exists `ref_mission` (   `id_misref` INT unsigned not null auto_increment , primary key (`id_misref`), `titre` VARCHAR(40) not null , `description` TEXT null ) CHARSET utf8", $silent);
		setupTable('boiteaid', "create table if not exists `boiteaid` (   `id` INT unsigned not null auto_increment , primary key (`id`), `titre` VARCHAR(40) null , `commentaire` TEXT null , `Capteur` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('ref_capteur', "create table if not exists `ref_capteur` (   `id` INT unsigned not null auto_increment , primary key (`id`), `nom` VARCHAR(40) null , `fonction` TEXT null , `machine` VARCHAR(40) null , `reference` TEXT null , `fichier` VARCHAR(40) null ) CHARSET utf8", $silent);


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>