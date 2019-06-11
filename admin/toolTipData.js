var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// redacteur table
redacteur_addTip=["",spacer+"This option allows all members of the group to add records to the 'Passeport R&#233;dacteur' table. A member who adds a record to the table becomes the 'owner' of that record."];

redacteur_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Passeport R&#233;dacteur' table."];
redacteur_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Passeport R&#233;dacteur' table."];
redacteur_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Passeport R&#233;dacteur' table."];
redacteur_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Passeport R&#233;dacteur' table."];

redacteur_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Passeport R&#233;dacteur' table."];
redacteur_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Passeport R&#233;dacteur' table."];
redacteur_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Passeport R&#233;dacteur' table."];
redacteur_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Passeport R&#233;dacteur' table, regardless of their owner."];

redacteur_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Passeport R&#233;dacteur' table."];
redacteur_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Passeport R&#233;dacteur' table."];
redacteur_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Passeport R&#233;dacteur' table."];
redacteur_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Passeport R&#233;dacteur' table."];

// Dossier_histoire table
Dossier_histoire_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dossier Histoire' table. A member who adds a record to the table becomes the 'owner' of that record."];

Dossier_histoire_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dossier Histoire' table."];
Dossier_histoire_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dossier Histoire' table."];
Dossier_histoire_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dossier Histoire' table."];
Dossier_histoire_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dossier Histoire' table."];

Dossier_histoire_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dossier Histoire' table."];
Dossier_histoire_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dossier Histoire' table."];
Dossier_histoire_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dossier Histoire' table."];
Dossier_histoire_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dossier Histoire' table, regardless of their owner."];

Dossier_histoire_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dossier Histoire' table."];
Dossier_histoire_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dossier Histoire' table."];
Dossier_histoire_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dossier Histoire' table."];
Dossier_histoire_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dossier Histoire' table."];

// chapitre table
chapitre_addTip=["",spacer+"This option allows all members of the group to add records to the 'Chapitre' table. A member who adds a record to the table becomes the 'owner' of that record."];

chapitre_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Chapitre' table."];
chapitre_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Chapitre' table."];
chapitre_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Chapitre' table."];
chapitre_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Chapitre' table."];

chapitre_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Chapitre' table."];
chapitre_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Chapitre' table."];
chapitre_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Chapitre' table."];
chapitre_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Chapitre' table, regardless of their owner."];

chapitre_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Chapitre' table."];
chapitre_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Chapitre' table."];
chapitre_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Chapitre' table."];
chapitre_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Chapitre' table."];

// sequence table
sequence_addTip=["",spacer+"This option allows all members of the group to add records to the 'Sequences' table. A member who adds a record to the table becomes the 'owner' of that record."];

sequence_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Sequences' table."];
sequence_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Sequences' table."];
sequence_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Sequences' table."];
sequence_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Sequences' table."];

sequence_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Sequences' table."];
sequence_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Sequences' table."];
sequence_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Sequences' table."];
sequence_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Sequences' table, regardless of their owner."];

sequence_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Sequences' table."];
sequence_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Sequences' table."];
sequence_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Sequences' table."];
sequence_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Sequences' table."];

// Objectifs table
Objectifs_addTip=["",spacer+"This option allows all members of the group to add records to the 'Objectifs' table. A member who adds a record to the table becomes the 'owner' of that record."];

Objectifs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Objectifs' table."];
Objectifs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Objectifs' table."];
Objectifs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Objectifs' table."];
Objectifs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Objectifs' table."];

Objectifs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Objectifs' table."];
Objectifs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Objectifs' table."];
Objectifs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Objectifs' table."];
Objectifs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Objectifs' table, regardless of their owner."];

Objectifs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Objectifs' table."];
Objectifs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Objectifs' table."];
Objectifs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Objectifs' table."];
Objectifs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Objectifs' table."];

// moyens table
moyens_addTip=["",spacer+"This option allows all members of the group to add records to the 'Moyens' table. A member who adds a record to the table becomes the 'owner' of that record."];

moyens_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Moyens' table."];
moyens_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Moyens' table."];
moyens_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Moyens' table."];
moyens_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Moyens' table."];

moyens_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Moyens' table."];
moyens_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Moyens' table."];
moyens_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Moyens' table."];
moyens_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Moyens' table, regardless of their owner."];

moyens_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Moyens' table."];
moyens_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Moyens' table."];
moyens_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Moyens' table."];
moyens_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Moyens' table."];

// Objets table
Objets_addTip=["",spacer+"This option allows all members of the group to add records to the 'Objets' table. A member who adds a record to the table becomes the 'owner' of that record."];

Objets_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Objets' table."];
Objets_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Objets' table."];
Objets_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Objets' table."];
Objets_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Objets' table."];

Objets_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Objets' table."];
Objets_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Objets' table."];
Objets_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Objets' table."];
Objets_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Objets' table, regardless of their owner."];

Objets_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Objets' table."];
Objets_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Objets' table."];
Objets_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Objets' table."];
Objets_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Objets' table."];

// personnages table
personnages_addTip=["",spacer+"This option allows all members of the group to add records to the 'Personnages' table. A member who adds a record to the table becomes the 'owner' of that record."];

personnages_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Personnages' table."];
personnages_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Personnages' table."];
personnages_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Personnages' table."];
personnages_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Personnages' table."];

personnages_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Personnages' table."];
personnages_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Personnages' table."];
personnages_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Personnages' table."];
personnages_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Personnages' table, regardless of their owner."];

personnages_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Personnages' table."];
personnages_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Personnages' table."];
personnages_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Personnages' table."];
personnages_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Personnages' table."];

// lieu_et_scene table
lieu_et_scene_addTip=["",spacer+"This option allows all members of the group to add records to the 'Lieu et scene' table. A member who adds a record to the table becomes the 'owner' of that record."];

lieu_et_scene_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Lieu et scene' table."];
lieu_et_scene_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Lieu et scene' table."];
lieu_et_scene_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Lieu et scene' table."];
lieu_et_scene_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Lieu et scene' table."];

lieu_et_scene_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Lieu et scene' table."];
lieu_et_scene_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Lieu et scene' table."];
lieu_et_scene_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Lieu et scene' table."];
lieu_et_scene_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Lieu et scene' table, regardless of their owner."];

lieu_et_scene_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Lieu et scene' table."];
lieu_et_scene_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Lieu et scene' table."];
lieu_et_scene_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Lieu et scene' table."];
lieu_et_scene_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Lieu et scene' table."];

// ref_badges table
ref_badges_addTip=["",spacer+"This option allows all members of the group to add records to the 'Badges ref' table. A member who adds a record to the table becomes the 'owner' of that record."];

ref_badges_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Badges ref' table."];
ref_badges_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Badges ref' table."];
ref_badges_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Badges ref' table."];
ref_badges_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Badges ref' table."];

ref_badges_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Badges ref' table."];
ref_badges_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Badges ref' table."];
ref_badges_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Badges ref' table."];
ref_badges_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Badges ref' table, regardless of their owner."];

ref_badges_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Badges ref' table."];
ref_badges_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Badges ref' table."];
ref_badges_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Badges ref' table."];
ref_badges_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Badges ref' table."];

// ref_sequences table
ref_sequences_addTip=["",spacer+"This option allows all members of the group to add records to the 'R&#233;f&#233;rentiel des s&#233;quences' table. A member who adds a record to the table becomes the 'owner' of that record."];

ref_sequences_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];

ref_sequences_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'R&#233;f&#233;rentiel des s&#233;quences' table, regardless of their owner."];

ref_sequences_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];
ref_sequences_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'R&#233;f&#233;rentiel des s&#233;quences' table."];

// ref_mission table
ref_mission_addTip=["",spacer+"This option allows all members of the group to add records to the 'R&#233;f&#233;rentiel des missions' table. A member who adds a record to the table becomes the 'owner' of that record."];

ref_mission_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'R&#233;f&#233;rentiel des missions' table."];

ref_mission_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'R&#233;f&#233;rentiel des missions' table, regardless of their owner."];

ref_mission_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'R&#233;f&#233;rentiel des missions' table."];
ref_mission_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'R&#233;f&#233;rentiel des missions' table."];

// boiteaid table
boiteaid_addTip=["",spacer+"This option allows all members of the group to add records to the 'Boite &#224; id&#233;es' table. A member who adds a record to the table becomes the 'owner' of that record."];

boiteaid_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Boite &#224; id&#233;es' table."];
boiteaid_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Boite &#224; id&#233;es' table."];
boiteaid_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Boite &#224; id&#233;es' table."];
boiteaid_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Boite &#224; id&#233;es' table."];

boiteaid_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Boite &#224; id&#233;es' table."];
boiteaid_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Boite &#224; id&#233;es' table."];
boiteaid_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Boite &#224; id&#233;es' table."];
boiteaid_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Boite &#224; id&#233;es' table, regardless of their owner."];

boiteaid_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Boite &#224; id&#233;es' table."];
boiteaid_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Boite &#224; id&#233;es' table."];
boiteaid_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Boite &#224; id&#233;es' table."];
boiteaid_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Boite &#224; id&#233;es' table."];

// ref_capteur table
ref_capteur_addTip=["",spacer+"This option allows all members of the group to add records to the 'Ref capteur Machine' table. A member who adds a record to the table becomes the 'owner' of that record."];

ref_capteur_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Ref capteur Machine' table."];
ref_capteur_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Ref capteur Machine' table."];
ref_capteur_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Ref capteur Machine' table."];
ref_capteur_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Ref capteur Machine' table."];

ref_capteur_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Ref capteur Machine' table."];
ref_capteur_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Ref capteur Machine' table."];
ref_capteur_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Ref capteur Machine' table."];
ref_capteur_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Ref capteur Machine' table, regardless of their owner."];

ref_capteur_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Ref capteur Machine' table."];
ref_capteur_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Ref capteur Machine' table."];
ref_capteur_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Ref capteur Machine' table."];
ref_capteur_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Ref capteur Machine' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
