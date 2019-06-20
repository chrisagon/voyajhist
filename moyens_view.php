<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/moyens.php");
	include("$currDir/moyens_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('moyens');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "moyens";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`moyens`.`id_moyen`" => "id_moyen",
		"if(CHAR_LENGTH(`moyens`.`titremoy`)>64, concat(left(`moyens`.`titremoy`,64),' ...'), `moyens`.`titremoy`)" => "titremoy",
		"`moyens`.`description_moy`" => "description_moy",
		"`moyens`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`moyens`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`moyens`.`id_moyen`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`Dossier_histoire1`.`titre_histoire`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`moyens`.`id_moyen`" => "id_moyen",
		"`moyens`.`titremoy`" => "titremoy",
		"`moyens`.`description_moy`" => "description_moy",
		"`moyens`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`moyens`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`moyens`.`id_moyen`" => "Id moyen",
		"`moyens`.`titremoy`" => "Moyen du joueur",
		"`moyens`.`description_moy`" => "Description du moyen",
		"`moyens`.`ref_o_gameplay`" => "Gameplay",
		"`moyens`.`creer_par`" => "Creer par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "Rattache a dos2j"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`moyens`.`id_moyen`" => "id_moyen",
		"`moyens`.`titremoy`" => "Moyen du joueur",
		"`moyens`.`description_moy`" => "description_moy",
		"`moyens`.`ref_o_gameplay`" => "ref_o_gameplay",
		"`moyens`.`creer_par`" => "creer_par",
		"IF(    CHAR_LENGTH(`Dossier_histoire1`.`titre_histoire`), CONCAT_WS('',   `Dossier_histoire1`.`titre_histoire`), '') /* Rattache a dos2j */" => "rattache_a_dos2j"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'rattache_a_dos2j' => 'Rattache a dos2j');

	$x->QueryFrom = "`moyens` LEFT JOIN `Dossier_histoire` as Dossier_histoire1 ON `Dossier_histoire1`.`id2dossier`=`moyens`.`rattache_a_dos2j` ";
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
	$x->ScriptFileName = "moyens_view.php";
	$x->RedirectAfterInsert = "moyens_view.php?SelectedID=#ID#";
	$x->TableTitle = "Moyens";
	$x->TableIcon = "resources/table_icons/brick.png";
	$x->PrimaryKey = "`moyens`.`id_moyen`";

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Moyen du joueur", "Description du moyen", "Gameplay");
	$x->ColFieldName = array('titremoy', 'description_moy', 'ref_o_gameplay');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/moyens_templateTV.html';
	$x->SelectedTemplate = 'templates/moyens_templateTVS.html';
	$x->TemplateDV = 'templates/moyens_templateDV.html';
	$x->TemplateDVP = 'templates/moyens_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `moyens`.`id_moyen`=membership_userrecords.pkValue and membership_userrecords.tableName='moyens' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `moyens`.`id_moyen`=membership_userrecords.pkValue and membership_userrecords.tableName='moyens' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`moyens`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: moyens_init
	$render=TRUE;
	if(function_exists('moyens_init')){
		$args=array();
		$render=moyens_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: moyens_header
	$headerCode='';
	if(function_exists('moyens_header')){
		$args=array();
		$headerCode=moyens_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: moyens_footer
	$footerCode='';
	if(function_exists('moyens_footer')){
		$args=array();
		$footerCode=moyens_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>