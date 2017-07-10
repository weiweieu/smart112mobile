<?php
/*
------------------
Language: English
------------------
*/

$lang = array();

//login template
$lang['LOGIN'] = 'Identifiant';
$lang['PASSWORD'] = 'Mot de passe';
$lang['REGISTER_BUTTON'] = 's\'inscrire';
$lang['LOGIN_BUTTON'] = 'Connexion';
$lang['LANGUAGE_BUTTON'] = 'valider';
$lang['CHOOSE_LANGUAGE'] = '-- Choisissez votre langue --';
$lang['CONNECTION_LOGIN'] = 'Connexion impossible : cet identifiant n\'est pas dans notre base de données';
$lang['CONNECTION_PWD'] = 'Connexion impossible : mot de passe incorrect';
$lang['ACCOUNT_NOT_REGISTERED'] = 'Connexion impossible : votre compte n\'a pas encore été validé';



// inscription template
$lang['STEP_1'] = 'Étape 1';
$lang['STEP_2'] = 'Étape 2';
$lang['E-MAIL'] = 'E-mail';
$lang['SURNAME'] = 'Nom';
$lang['NAME'] = 'Prénom';
$lang['SERVICE'] = 'Service';
$lang['OTHER'] = 'AUTRE';
$lang['COUNTRY'] = 'Pays';
$lang['BACK_BUTTON'] = 'Retour';
$lang['NEXT_BUTTON'] = 'Suivant';
$lang['NEXT_BUTTON_TITLE'] = 'Remplissez les champs obligatoires avant de continuer';
$lang['REQUIRED_FIELDS'] = 'Champs obligatoires';

//inscription template error messages
$lang['LOGIN_SUP_3'] = 'Impossible de valider l\'inscription : votre identifiant doit contenir plus de trois charactères';
$lang['ALREADY_USED_LOGIN'] = 'Cet identifiant est déjà utilisé';
$lang['ALREADY_USED_MAIL'] = 'Un compte est déjà associé à cette adresse email';
$lang['PWD_SUP_3'] = 'Impossible de valider l\'inscription : votre mot de passe doit contenir plus de trois charactères';
$lang['INVALID_EMAIL'] = 'Impossible de valider l\'inscription : veillez entrer un email valide';
$lang['UNSPECIFIED_EMAIL'] = 'Impossible de valider l\'inscription : email non spécifié';
$lang['SELECT_SERVICE'] = 'Impossible de valider l\'inscription : veuillez séléctionner votre service. Si votre service ne setrouve pas dans la liste sélectionner autre';
$lang['SELECT_COUNTRY'] = 'Impossible de valider l\'inscription : veuillez séléctionner votre pays. Si votre pays ne setrouve pas dans la liste sélectionner autre';
$lang['REGISTRATION_IMPOSSIBLE'] = 'Impossible de valider l\'inscription';

//services
$lang['#serv'] = '-- choisissez votre service --';
$lang['POLICE'] = 'POLICE';
$lang['FIRE DEPARTMENT'] = 'POMPIERS';
$lang['AMBULANCE'] = 'AMBULANCE';

//countries
$lang['#count'] = '-- choisissez votre pays --';
$lang['BRAZIL'] = 'BRÉSIL';
$lang['GERMANY'] = 'ALLEMAGNE';
$lang['FRANCE'] = 'FRANCE';


// inscription location template
$lang['LOCATION_PRECISION'] = 'Veuillez renseigner un maximum d\'informations pour faciliter votre inscription';
$lang['DEPARTMENT'] = 'Département';
$lang['CHOOSE_DEPARTMENT'] = '-- Choisir un departement --';
$lang['POSTCODE'] = 'Code postal';
$lang['TOWN'] = 'Ville';
$lang['INSCRIPTION_VALIDATION'] = 'inscription';

//inscriptionValidated
$lang['INSCRIPTION_SUCCESSFUL'] = 'Inscription réussie';
?>
