<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/ref_sequences.php");
	include("$currDir/ref_sequences_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('ref_sequences');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "ref_sequences";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`ref_sequences`.`id_seqref`" => "id_seqref",
		"`ref_sequences`.`titre`" => "titre",
		"`ref_sequences`.`description`" => "description",
		"`ref_sequences`.`typologie`" => "typologie",
		"`ref_sequences`.`num_ord`" => "num_ord"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`ref_sequences`.`id_seqref`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`ref_sequences`.`id_seqref`" => "id_seqref",
		"`ref_sequences`.`titre`" => "titre",
		"`ref_sequences`.`description`" => "description",
		"`ref_sequences`.`typologie`" => "typologie",
		"`ref_sequences`.`num_ord`" => "num_ord"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`ref_sequences`.`id_seqref`" => "ID",
		"`ref_sequences`.`titre`" => "Titre",
		"`ref_sequences`.`description`" => "Description",
		"`ref_sequences`.`typologie`" => "Typologie",
		"`ref_sequences`.`num_ord`" => "Num ord"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`ref_sequences`.`id_seqref`" => "id_seqref",
		"`ref_sequences`.`titre`" => "titre",
		"`ref_sequences`.`description`" => "description",
		"`ref_sequences`.`typologie`" => "typologie",
		"`ref_sequences`.`num_ord`" => "num_ord"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`ref_sequences` ";
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
	$x->ScriptFileName = "ref_sequences_view.php";
	$x->RedirectAfterInsert = "ref_sequences_view.php?SelectedID=#ID#";
	$x->TableTitle = "R&#233;f&#233;rentiel des s&#233;quences";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`ref_sequences`.`id_seqref`";

	$x->ColWidth   = array(  150, 150, 150, 150);
	$x->ColCaption = array("Titre", "Description", "Typologie", "Num ord");
	$x->ColFieldName = array('titre', 'description', 'typologie', 'num_ord');
	$x->ColNumber  = array(2, 3, 4, 5);

	// template paths below are based on the app main directory
	$x->Template = 'templates/ref_sequences_templateTV.html';
	$x->SelectedTemplate = 'templates/ref_sequences_templateTVS.html';
	$x->TemplateDV = 'templates/ref_sequences_templateDV.html';
	$x->TemplateDVP = 'templates/ref_sequences_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ref_sequences`.`id_seqref`=membership_userrecords.pkValue and membership_userrecords.tableName='ref_sequences' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ref_sequences`.`id_seqref`=membership_userrecords.pkValue and membership_userrecords.tableName='ref_sequences' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`ref_sequences`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: ref_sequences_init
	$render=TRUE;
	if(function_exists('ref_sequences_init')){
		$args=array();
		$render=ref_sequences_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ref_sequences_header
	$headerCode='';
	if(function_exists('ref_sequences_header')){
		$args=array();
		$headerCode=ref_sequences_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: ref_sequences_footer
	$footerCode='';
	if(function_exists('ref_sequences_footer')){
		$args=array();
		$footerCode=ref_sequences_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>