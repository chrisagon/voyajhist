<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/chapitre.php");
	include("$currDir/chapitre_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('chapitre');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "chapitre";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`chapitre`.`id`" => "id",
		"`chapitre`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`ref_mission1`.`titre`) || CHAR_LENGTH(`ref_mission1`.`description`), CONCAT_WS('',   `ref_mission1`.`titre`, ' : ', `ref_mission1`.`description`), '') /* Mission */" => "Mission",
		"`chapitre`.`resume`" => "resume",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dossier */" => "rattache_a_dossier",
		"`chapitre`.`auteur`" => "auteur"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`chapitre`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`Dossier_histoire1`.`titre_histoire`',
		6 => 6
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`chapitre`.`id`" => "id",
		"`chapitre`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`ref_mission1`.`titre`) || CHAR_LENGTH(`ref_mission1`.`description`), CONCAT_WS('',   `ref_mission1`.`titre`, ' : ', `ref_mission1`.`description`), '') /* Mission */" => "Mission",
		"`chapitre`.`resume`" => "resume",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dossier */" => "rattache_a_dossier",
		"`chapitre`.`auteur`" => "auteur"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`chapitre`.`id`" => "ID",
		"`chapitre`.`titre`" => "Titre",
		"IF(    CHAR_LENGTH(`ref_mission1`.`titre`) || CHAR_LENGTH(`ref_mission1`.`description`), CONCAT_WS('',   `ref_mission1`.`titre`, ' : ', `ref_mission1`.`description`), '') /* Mission */" => "Mission",
		"`chapitre`.`resume`" => "Resume",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dossier */" => "Rattache a dossier",
		"`chapitre`.`auteur`" => "Auteur"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`chapitre`.`id`" => "id",
		"`chapitre`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`ref_mission1`.`titre`) || CHAR_LENGTH(`ref_mission1`.`description`), CONCAT_WS('',   `ref_mission1`.`titre`, ' : ', `ref_mission1`.`description`), '') /* Mission */" => "Mission",
		"`chapitre`.`resume`" => "resume",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dossier */" => "rattache_a_dossier",
		"`chapitre`.`auteur`" => "auteur"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'Mission' => 'Mission', 'rattache_a_dossier' => 'Rattache a dossier');

	$x->QueryFrom = "`chapitre` LEFT JOIN `ref_mission` as ref_mission1 ON `ref_mission1`.`id_misref`=`chapitre`.`Mission` LEFT JOIN `Dossier_histoire` as Dossier_histoire1 ON `Dossier_histoire1`.`id2dossier`=`chapitre`.`rattache_a_dossier` ";
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
	$x->ScriptFileName = "chapitre_view.php";
	$x->RedirectAfterInsert = "chapitre_view.php?SelectedID=#ID#";
	$x->TableTitle = "Chapitre";
	$x->TableIcon = "resources/table_icons/align_right.png";
	$x->PrimaryKey = "`chapitre`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150);
	$x->ColCaption = array("Titre", "Mission", "Resume", "Rattache a dossier", "Auteur");
	$x->ColFieldName = array('titre', 'Mission', 'resume', 'rattache_a_dossier', 'auteur');
	$x->ColNumber  = array(2, 3, 4, 5, 6);

	// template paths below are based on the app main directory
	$x->Template = 'templates/chapitre_templateTV.html';
	$x->SelectedTemplate = 'templates/chapitre_templateTVS.html';
	$x->TemplateDV = 'templates/chapitre_templateDV.html';
	$x->TemplateDVP = 'templates/chapitre_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `chapitre`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='chapitre' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `chapitre`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='chapitre' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`chapitre`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: chapitre_init
	$render=TRUE;
	if(function_exists('chapitre_init')){
		$args=array();
		$render=chapitre_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: chapitre_header
	$headerCode='';
	if(function_exists('chapitre_header')){
		$args=array();
		$headerCode=chapitre_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: chapitre_footer
	$footerCode='';
	if(function_exists('chapitre_footer')){
		$args=array();
		$footerCode=chapitre_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>