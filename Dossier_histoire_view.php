<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/Dossier_histoire.php");
	include("$currDir/Dossier_histoire_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('Dossier_histoire');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "Dossier_histoire";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`Dossier_histoire`.`id2dossier`" => "id2dossier",
		"IF(    CHAR_LENGTH(`redacteur1`.`prenom`) || CHAR_LENGTH(`redacteur1`.`nom`), CONCAT_WS('',   `redacteur1`.`prenom`, ' ', `redacteur1`.`nom`), '') /* Auteur */" => "auteur",
		"`Dossier_histoire`.`titre_histoire`" => "titre_histoire",
		"`Dossier_histoire`.`resume`" => "resume",
		"`Dossier_histoire`.`creer_par`" => "creer_par"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`Dossier_histoire`.`id2dossier`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`Dossier_histoire`.`id2dossier`" => "id2dossier",
		"IF(    CHAR_LENGTH(`redacteur1`.`prenom`) || CHAR_LENGTH(`redacteur1`.`nom`), CONCAT_WS('',   `redacteur1`.`prenom`, ' ', `redacteur1`.`nom`), '') /* Auteur */" => "auteur",
		"`Dossier_histoire`.`titre_histoire`" => "titre_histoire",
		"`Dossier_histoire`.`resume`" => "resume",
		"`Dossier_histoire`.`creer_par`" => "creer_par"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`Dossier_histoire`.`id2dossier`" => "Id2dossier",
		"IF(    CHAR_LENGTH(`redacteur1`.`prenom`) || CHAR_LENGTH(`redacteur1`.`nom`), CONCAT_WS('',   `redacteur1`.`prenom`, ' ', `redacteur1`.`nom`), '') /* Auteur */" => "Auteur",
		"`Dossier_histoire`.`titre_histoire`" => "Titre de l\'histoire",
		"`Dossier_histoire`.`resume`" => "Resume",
		"`Dossier_histoire`.`creer_par`" => "Creer par"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`Dossier_histoire`.`id2dossier`" => "id2dossier",
		"IF(    CHAR_LENGTH(`redacteur1`.`prenom`) || CHAR_LENGTH(`redacteur1`.`nom`), CONCAT_WS('',   `redacteur1`.`prenom`, ' ', `redacteur1`.`nom`), '') /* Auteur */" => "auteur",
		"`Dossier_histoire`.`titre_histoire`" => "titre_histoire",
		"`Dossier_histoire`.`resume`" => "resume",
		"`Dossier_histoire`.`creer_par`" => "creer_par"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'auteur' => 'Auteur');

	$x->QueryFrom = "`Dossier_histoire` LEFT JOIN `redacteur` as redacteur1 ON `redacteur1`.`id_redact`=`Dossier_histoire`.`auteur` ";
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
	$x->ScriptFileName = "Dossier_histoire_view.php";
	$x->RedirectAfterInsert = "Dossier_histoire_view.php?SelectedID=#ID#";
	$x->TableTitle = "Dossier Histoire";
	$x->TableIcon = "resources/table_icons/chart_organisation.png";
	$x->PrimaryKey = "`Dossier_histoire`.`id2dossier`";

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Auteur", "Titre de l'histoire", "Resume");
	$x->ColFieldName = array('auteur', 'titre_histoire', 'resume');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/Dossier_histoire_templateTV.html';
	$x->SelectedTemplate = 'templates/Dossier_histoire_templateTVS.html';
	$x->TemplateDV = 'templates/Dossier_histoire_templateDV.html';
	$x->TemplateDVP = 'templates/Dossier_histoire_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Dossier_histoire`.`id2dossier`=membership_userrecords.pkValue and membership_userrecords.tableName='Dossier_histoire' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Dossier_histoire`.`id2dossier`=membership_userrecords.pkValue and membership_userrecords.tableName='Dossier_histoire' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`Dossier_histoire`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: Dossier_histoire_init
	$render=TRUE;
	if(function_exists('Dossier_histoire_init')){
		$args=array();
		$render=Dossier_histoire_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Dossier_histoire_header
	$headerCode='';
	if(function_exists('Dossier_histoire_header')){
		$args=array();
		$headerCode=Dossier_histoire_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: Dossier_histoire_footer
	$footerCode='';
	if(function_exists('Dossier_histoire_footer')){
		$args=array();
		$footerCode=Dossier_histoire_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>