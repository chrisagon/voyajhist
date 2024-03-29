<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/sequence.php");
	include("$currDir/sequence_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('sequence');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "sequence";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`sequence`.`id_sequence`" => "id_sequence",
		"`sequence`.`numero_ordre`" => "numero_ordre",
		"`sequence`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`chapitre1`.`titre`), CONCAT_WS('',   `chapitre1`.`titre`), '') /* Rattach&#233; au chapitre */" => "rattache_a_chapitre",
		"`sequence`.`difficulte`" => "difficulte",
		"`sequence`.`description`" => "description",
		"`sequence`.`auteur`" => "auteur",
		"IF(    CHAR_LENGTH(`ref_sequences1`.`typologie`) || CHAR_LENGTH(`ref_sequences1`.`titre`), CONCAT_WS('',   `ref_sequences1`.`typologie`, ' : ', `ref_sequences1`.`titre`), '') /* Modele */" => "modele"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`sequence`.`id_sequence`',
		2 => '`sequence`.`numero_ordre`',
		3 => 3,
		4 => '`chapitre1`.`titre`',
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`sequence`.`id_sequence`" => "id_sequence",
		"`sequence`.`numero_ordre`" => "numero_ordre",
		"`sequence`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`chapitre1`.`titre`), CONCAT_WS('',   `chapitre1`.`titre`), '') /* Rattach&#233; au chapitre */" => "rattache_a_chapitre",
		"`sequence`.`difficulte`" => "difficulte",
		"`sequence`.`description`" => "description",
		"`sequence`.`auteur`" => "auteur",
		"IF(    CHAR_LENGTH(`ref_sequences1`.`typologie`) || CHAR_LENGTH(`ref_sequences1`.`titre`), CONCAT_WS('',   `ref_sequences1`.`typologie`, ' : ', `ref_sequences1`.`titre`), '') /* Modele */" => "modele"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`sequence`.`id_sequence`" => "Id sequence",
		"`sequence`.`numero_ordre`" => "Numero de la s&#233;quence",
		"`sequence`.`titre`" => "Titre",
		"IF(    CHAR_LENGTH(`chapitre1`.`titre`), CONCAT_WS('',   `chapitre1`.`titre`), '') /* Rattach&#233; au chapitre */" => "Rattach&#233; au chapitre",
		"`sequence`.`difficulte`" => "Difficulte",
		"`sequence`.`description`" => "Description",
		"`sequence`.`auteur`" => "Auteur",
		"IF(    CHAR_LENGTH(`ref_sequences1`.`typologie`) || CHAR_LENGTH(`ref_sequences1`.`titre`), CONCAT_WS('',   `ref_sequences1`.`typologie`, ' : ', `ref_sequences1`.`titre`), '') /* Modele */" => "Modele"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`sequence`.`id_sequence`" => "id_sequence",
		"`sequence`.`numero_ordre`" => "Numero de la s&#233;quence",
		"`sequence`.`titre`" => "titre",
		"IF(    CHAR_LENGTH(`chapitre1`.`titre`), CONCAT_WS('',   `chapitre1`.`titre`), '') /* Rattach&#233; au chapitre */" => "rattache_a_chapitre",
		"`sequence`.`difficulte`" => "difficulte",
		"`sequence`.`description`" => "description",
		"`sequence`.`auteur`" => "auteur",
		"IF(    CHAR_LENGTH(`ref_sequences1`.`typologie`) || CHAR_LENGTH(`ref_sequences1`.`titre`), CONCAT_WS('',   `ref_sequences1`.`typologie`, ' : ', `ref_sequences1`.`titre`), '') /* Modele */" => "modele"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'rattache_a_chapitre' => 'Rattach&#233; au chapitre', 'modele' => 'Modele');

	$x->QueryFrom = "`sequence` LEFT JOIN `chapitre` as chapitre1 ON `chapitre1`.`id`=`sequence`.`rattache_a_chapitre` LEFT JOIN `ref_sequences` as ref_sequences1 ON `ref_sequences1`.`id_seqref`=`sequence`.`modele` ";
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
	$x->ScriptFileName = "sequence_view.php";
	$x->RedirectAfterInsert = "sequence_view.php?SelectedID=#ID#";
	$x->TableTitle = "Sequences";
	$x->TableIcon = "resources/table_icons/attributes_display.png";
	$x->PrimaryKey = "`sequence`.`id_sequence`";
	$x->DefaultSortField = '2';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  20, 150, 150, 150, 150);
	$x->ColCaption = array("Numero de la s&#233;quence", "Titre", "Difficulte", "Description", "Modele");
	$x->ColFieldName = array('numero_ordre', 'titre', 'difficulte', 'description', 'modele');
	$x->ColNumber  = array(2, 3, 5, 6, 8);

	// template paths below are based on the app main directory
	$x->Template = 'templates/sequence_templateTV.html';
	$x->SelectedTemplate = 'templates/sequence_templateTVS.html';
	$x->TemplateDV = 'templates/sequence_templateDV.html';
	$x->TemplateDVP = 'templates/sequence_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `sequence`.`id_sequence`=membership_userrecords.pkValue and membership_userrecords.tableName='sequence' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `sequence`.`id_sequence`=membership_userrecords.pkValue and membership_userrecords.tableName='sequence' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`sequence`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: sequence_init
	$render=TRUE;
	if(function_exists('sequence_init')){
		$args=array();
		$render=sequence_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: sequence_header
	$headerCode='';
	if(function_exists('sequence_header')){
		$args=array();
		$headerCode=sequence_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: sequence_footer
	$footerCode='';
	if(function_exists('sequence_footer')){
		$args=array();
		$footerCode=sequence_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>