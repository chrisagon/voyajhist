<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/Objectifs.php");
	include("$currDir/Objectifs_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('Objectifs');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "Objectifs";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`Objectifs`.`id_objectif`" => "id_objectif",
		"if(CHAR_LENGTH(`Objectifs`.`titreobj`)>64, concat(left(`Objectifs`.`titreobj`,64),' ...'), `Objectifs`.`titreobj`)" => "titreobj",
		"`Objectifs`.`description_obj`" => "description_obj",
		"`Objectifs`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`Objectifs`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`Objectifs`.`id_objectif`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`Dossier_histoire1`.`titre_histoire`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`Objectifs`.`id_objectif`" => "id_objectif",
		"`Objectifs`.`titreobj`" => "titreobj",
		"`Objectifs`.`description_obj`" => "description_obj",
		"`Objectifs`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`Objectifs`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`Objectifs`.`id_objectif`" => "Id objectif",
		"`Objectifs`.`titreobj`" => "Titre de l\'objectif",
		"`Objectifs`.`description_obj`" => "Description obj",
		"`Objectifs`.`ref_o_gameplay`" => "Gameplay",
		"`Objectifs`.`creer_par`" => "Creer par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "Rattache a dos2j"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`Objectifs`.`id_objectif`" => "id_objectif",
		"`Objectifs`.`titreobj`" => "Titre de l\'objectif",
		"`Objectifs`.`description_obj`" => "description_obj",
		"`Objectifs`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`Objectifs`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'rattache_a_dos2j' => 'Rattache a dos2j');

	$x->QueryFrom = "`Objectifs` LEFT JOIN `Dossier_histoire` as Dossier_histoire1 ON `Dossier_histoire1`.`id2dossier`=`Objectifs`.`rattache_a_dos2j` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "Objectifs_view.php";
	$x->RedirectAfterInsert = "Objectifs_view.php?SelectedID=#ID#";
	$x->TableTitle = "Objectifs";
	$x->TableIcon = "resources/table_icons/compass.png";
	$x->PrimaryKey = "`Objectifs`.`id_objectif`";

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Titre de l'objectif", "Description obj", "Gameplay");
	$x->ColFieldName = array('titreobj', 'description_obj', 'ref_o_gameplay');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/Objectifs_templateTV.html';
	$x->SelectedTemplate = 'templates/Objectifs_templateTVS.html';
	$x->TemplateDV = 'templates/Objectifs_templateDV.html';
	$x->TemplateDVP = 'templates/Objectifs_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Objectifs`.`id_objectif`=membership_userrecords.pkValue and membership_userrecords.tableName='Objectifs' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Objectifs`.`id_objectif`=membership_userrecords.pkValue and membership_userrecords.tableName='Objectifs' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`Objectifs`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: Objectifs_init
	$render=TRUE;
	if(function_exists('Objectifs_init')){
		$args=array();
		$render=Objectifs_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Objectifs_header
	$headerCode='';
	if(function_exists('Objectifs_header')){
		$args=array();
		$headerCode=Objectifs_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: Objectifs_footer
	$footerCode='';
	if(function_exists('Objectifs_footer')){
		$args=array();
		$footerCode=Objectifs_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>