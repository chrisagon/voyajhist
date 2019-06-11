<?php
// This script and data application were generated by AppGini 5.61
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/ref_capteur.php");
	include("$currDir/ref_capteur_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('ref_capteur');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "ref_capteur";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`ref_capteur`.`id`" => "id",
		"`ref_capteur`.`nom`" => "nom",
		"`ref_capteur`.`fonction`" => "fonction",
		"`ref_capteur`.`machine`" => "machine",
		"`ref_capteur`.`reference`" => "reference",
		"`ref_capteur`.`fichier`" => "fichier"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`ref_capteur`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`ref_capteur`.`id`" => "id",
		"`ref_capteur`.`nom`" => "nom",
		"`ref_capteur`.`fonction`" => "fonction",
		"`ref_capteur`.`machine`" => "machine",
		"`ref_capteur`.`reference`" => "reference",
		"`ref_capteur`.`fichier`" => "fichier"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`ref_capteur`.`id`" => "ID",
		"`ref_capteur`.`nom`" => "Nom",
		"`ref_capteur`.`fonction`" => "Fonction",
		"`ref_capteur`.`machine`" => "Machine",
		"`ref_capteur`.`reference`" => "Reference",
		"`ref_capteur`.`fichier`" => "Fichier"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`ref_capteur`.`id`" => "id",
		"`ref_capteur`.`nom`" => "nom",
		"`ref_capteur`.`fonction`" => "fonction",
		"`ref_capteur`.`machine`" => "machine",
		"`ref_capteur`.`reference`" => "reference",
		"`ref_capteur`.`fichier`" => "fichier"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`ref_capteur` ";
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
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "ref_capteur_view.php";
	$x->RedirectAfterInsert = "ref_capteur_view.php?SelectedID=#ID#";
	$x->TableTitle = "Ref capteur Machine";
	$x->TableIcon = "resources/table_icons/android.png";
	$x->PrimaryKey = "`ref_capteur`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150);
	$x->ColCaption = array("Nom", "Fonction", "Machine", "Reference", "Fichier");
	$x->ColFieldName = array('nom', 'fonction', 'machine', 'reference', 'fichier');
	$x->ColNumber  = array(2, 3, 4, 5, 6);

	// template paths below are based on the app main directory
	$x->Template = 'templates/ref_capteur_templateTV.html';
	$x->SelectedTemplate = 'templates/ref_capteur_templateTVS.html';
	$x->TemplateDV = 'templates/ref_capteur_templateDV.html';
	$x->TemplateDVP = 'templates/ref_capteur_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ref_capteur`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='ref_capteur' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ref_capteur`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='ref_capteur' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`ref_capteur`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: ref_capteur_init
	$render=TRUE;
	if(function_exists('ref_capteur_init')){
		$args=array();
		$render=ref_capteur_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ref_capteur_header
	$headerCode='';
	if(function_exists('ref_capteur_header')){
		$args=array();
		$headerCode=ref_capteur_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: ref_capteur_footer
	$footerCode='';
	if(function_exists('ref_capteur_footer')){
		$args=array();
		$footerCode=ref_capteur_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>