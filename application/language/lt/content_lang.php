<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Global
 */

$lang['front_title'] = "VIServ";
$lang['back_title'] = "VIServ administratorius";

$lang['menu'] = array(
 0 => "Statistika",
 1 => „Įmonės“,
 2 => "Vaizdo įrašai",
 3 => "Įrenginiai",
 4 => "Profilis",
 5 => „Atsijungti“,
 6 => "Klientai",
 6 => "Administratorius",
 7 => "Laukiu",
 8 => "SMS ir paštas"
);
$lang['sub_menu'] = array (
 0 => "Įmonių sąrašas",
 1 => "Pridėti įmonę",
 2 => "Devies List",
 3 => "Pridėti įrenginį",
 4 => "Užrakinti vaizdo įrašai",
 5 => "Vaizdo įrašų sąrašas"
);
$lang['change_pass'] = array (
 0 => "Keisti slaptažodį",
 1 => "Senas slaptažodis",
 2 => "Naujas slaptažodis",
 3 => "Patvirtinti slaptažodį"
);

$lang['footer'] = array (
 0 => "Autorių teisės",
 1 => "Visos teisės saugomos."
);

$lang['warning'] = "Įspėjimas!";
$lang['success'] = "Sėkmės!";
$lang['failed'] = "Nepavyko!";
$lang['determine'] = ["Atšaukti", "Taip"];
$lang['alert_content'] = array(
 0 => "Ar tikrai dabar atsijungsite?",
 1 => "Slaptažodis sėkmingai pakeistas!",
 2 => "prašome įvesti seną slaptažodį.",
 3 => "Įveskite naują slaptažodį.",
 4 => "Slaptažodis nesutampa.",
 5 => "Prašome patvirtinti naują slaptažodį.",
 6 => "Kažkas ne taip! Vėliau bandykite dar kartą.",
 7 => "Senas slaptažodis neteisingas!",
 8 => "Ar tikrai ištrinsite?",
 9 => "Įkelkite įmonės logotipą",
 10 => "Atnaujinta sėkmingai!",
 11 => "El. paštas jau egzistuoja. Pabandykite su kitu.",
 12 => "Naujas įrenginys sėkmingai pridėtas.",
 13 => "Nauja įmonė sėkmingai pridėta.",
 14 => "Įrenginys jau egzistuoja. Pabandykite su kitu.",
 15 => "Prašome užpildyti visus laukus!",
 16 => "Įveskite galiojantį el. pašto adresą!",
 17 => "Ar norite pašalinti šį vaizdo įrašą iš savo sąrašo? Veiksmo negalima anuliuoti",
 18 => "Vaizdo nuoroda sėkmingai išsiųsta!",
 19 => "Vaizdo įrašas sėkmingai atkurtas!",
 20 => "Ar norite pašalinti duomenis?",
 21 => "Vaizdo įrašas suaktyvintas viešai peržiūrėti",
 22 => "Dabar galima siųsti SMS!",
 23 => "Redagavimo laukai egzistuoja! Pirmiausia užpildykite juos.",
 24 => "Pasiūlymo duomenys sėkmingai išsaugoti!",
 25 => "Pasiūlymo duomenys sėkmingai ištrinti!",
 26 => "Ar norite priimti remonto pasiūlymą?",
 27 => "Priimti",
 28 => "Atšaukti",
 29 => "Car number Or Phone number can't be empty"
);

/**
 * Signin
 */
$lang['signin'] = array (
 0 => "El. paštas",
 1 => "Vartotojo vardas",
 2 => "Slaptažodis",
 3 => "Prisijungti",
 4 => "Administratorius",
 5 => „Išsaugoti“,
 6 => "Atšaukti"
);
$lang['error_content'] = array (
 0 => "Jūsų paskyrą užblokavo administratorius",
 1 => "Slaptažodis neteisingas",
 2 => "Ši įmonė neegzistuoja."
);

/**
 * DASHBOARD
 */

$lang['statistic_title'] = "Vaizdo įrašų statistika";
$lang['recent_title'] = "Naujausi įkėlimai";
$lang['recent_uploads'] = array(
 0 => "Ne",
 1 => "Vaizdo įrašo ID",
 3 => "Automobilio numeris",
 4 => „Įmonė“,
 5 => "Vardas",
 6 => "El. paštas",
 7 => "Technikos pavadinimas",
 8 => "Įkėlimo laikas",
 9 => "Peržiūra",
 10 => "Žiūrėti",
 11=> "Sukurtas laikas"
);

$lang['dashboard_title'] = "Statistika";
$lang['no_data'] = array(
 0 => "Neseniai nėra įkelto vaizdo įrašo.",
 1 => "Tą mėnesį nėra įkeltų vaizdo įrašų.",
);
$lang['months'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC", "Total"];
$lang['ok'] = "OK";

/**
 * VIDEOS
 */

$lang['new_btn'] = "Naujas klientas";
$lang['video_num'] = "Vaizdo įrašų skaičius";
$lang['date_range'] = ["Nuo", "Iki"];
$lang['search_key'] = "Įveskite paieškos raktinį žodį";
$lang['video_table'] = array(
 0 => "Vaizdo įrašo ID",
 1 => "Automobilio numeris",
 2 => "Įmonė",
 3 => "Vardas",
 4 => "El. paštas",
 5 => "Technikos pavadinimas",
 6 => "Įkėlimo laikas",
 7 => "Būsena",
 8 => "Operacija",
 9 => "Naujas",
 10 => "Žiūrėti",
 11 => "Išsiųstas laikas",
 12 => "Nuorodos adresas",
 13 => "Ištrinti",
 14 => "Siųsti vaizdo įrašo nuorodą",
 15 => "Gerai",
 16 => "Telefonas",
 17 => "Išsaugoti",
 18 => "Sukurta",
 19 => "Atšaukti",
 20 => "Laukiu",
 21 => "Laukiama",
 22 => "Vaizdo įrašas išsiųstas",
 23 => "Media ID",
 24 => "Darbas",
 25 => "Duomenys pašalinti",
 26 => "Atkurti",
 27 => "Užrakinta",
 28 => "Peržiūros",
 29 => "Atgal",
 30 => "Apsilankymo laikas",
 31 => "IP adresas",
 32 => "Siųsti nuorodą į",
 33 => "SMS",
 34 => "Pasiekiamas",
 35 => "Prašome pasirinkti SMS arba el. pašto parinktį",
 36 => "Suaktyvinti vaizdo įrašą",
 37 => "Suaktyvinti vaizdo įrašą viešai peržiūrai",
 38 => "Suaktyvinta viešai peržiūrėti",
 39 => "Suaktyvinta",
 40 => "Atstatyti",
 41 => "Peržiūra",
 42 => "Pasiūlymas",
 43 => "Atnaujinta",
 44 => "Pridėti pasiūlymą",
 45 => "Peržiūrėti pasiūlymą",
 46 => "Ištrinti pasiūlymą",
 47 => "Pasiūlymas galioja",
 48 => "Patvirtinta",
 49 => "Nepatvirtinta",
 50 => "Išsaugoti",
 51 => "Aprašymas",
 52 => "Kiekis",
 53 => "Kaina",
 54 => "Suma",
 55 => "PVM",
 56 => "Iš viso",
 57 => "Enter Letters & Numbers only",
    58 => "Please include an '@' in the email address"
);

$lang['message'] = array(
 0 => "Video nuoroda dar nebuvo išsiųsta",
 1 => "Vaizdo įrašas dar nebuvo įkeltas"
);

$lang['modal_head'] = array(
 0 => "Vaizdo įrašo peržiūra",
 1 => "Pridėti naują klientą",
 2 => "Pridėti naujus vaizdo įrašo duomenis"
);

$lang['video_title'] = "Vaizdo įrašai";

$lang['error_case'] = "Automobilio numeris jau yra.";

$lang['refresh'] = "Atnaujinti";
/**
 * DEVICES
 */
$lang['device_title'] = "Įrenginiai";
$lang['device_table'] = array (
 0 => "NE",
 1 => "ID",
 2 => "Įrenginio pavadinimas",
 3 => "Serijos numeris",
 4 => "Prisijungimo numeris",
 5 => "Sukurtas laikas",
 6 => "Būsena",
 7 => „Aktyvus“,
 8 => "Neaktyvus",
 9 => "Slaptažodis"
);

/**
 * PROFILE
 */
$lang['profile_title'] = "Profilis";
$lang['profile_content'] = array(
 0 => "Įmonės pavadinimas",
 1 => "Telefono numeris",
 2 => "El. paštas",
 3 => "Įmonės logotipas",
 4 => "Atšaukti",
 5 => "Išsaugoti",
 6 => "Pasirinkite failą",
 7 => "Adresas",
 8 => "Kalba",
 9 => "SMS siuntėjo vardas",
 10 => "El. pašto siuntėjo vardas"
);

/** BACKEND */

/**
 * COMPANY
 */
$lang['company_title'] = "Įmonės";
$lang['edit_company'] = "Redaguoti įmonės duomenis";
$lang['add_company'] = "Pridėti naują įmonę";
$lang['add_btn'] = "Pridėti įmonę";
$lang['search'] = array(
 0 => "Įveskite įmonės pavadinimą",
 1 => "Įveskite kliento įmonės pavadinimą",
 2 => "įveskite įrenginio pavadinimą",
 3 => "Pasirinkite įmonę"
);
$lang['status'] = array(
 0 => "Visi",
 1 => "Aktyvus",
 2 => "Neaktyvus",
 3 => "Laukiu"
);
$lang['company_count'] = "Įmonių skaičius";
$lang['company_table'] = array(
 0 => "Ne",
 1 => "Vardas",
 2 => "El. paštas",
 3 => "Telefonas",
 4 => "Adresas",
 5 => "Vaizdo įrašai",
 6 => "Prisijungimo numeris",
 7 => "Registruotas laikas",
 8 => "Būsena",
 9 => "Operacija",
 10 => "Redaguoti",
 11 => "Ištrinti"
);
$lang['company_content'] = array(
 0 => "Įmonės pavadinimas",
 1 => "Įmonės el. paštas",
 2 => "Slaptažodis",
 3 => "Įmonės adresas",
 4 => "Telefono numeris",
 5 => "Atšaukti",
 6 => "Išsaugoti",
 7 => "Įmonės logotipas",
 8 => "Pasirinkite failą",
 9 => "Kalba",
 10 => "SMS siuntėjo vardas",
 11 => "El. pašto siuntėjo vardas",
 12 => "Favicon",
 13 => "Peržiūrėti vaizdą"
);
$lang['error_company'] = array(
 0 => "Įveskite naują įmonės pavadinimą.",
 1 => "Įveskite įmonės el. pašto adresą.",
 2 => "Įveskite įmonės slaptažodį.",
 3 => "Įveskite įmonės adresą.",
 4 => "Įveskite įmonės telefono numerį.",
 5 => "Pasirinkite kalbą",
 6 => "Įveskite SMS siuntėjo vardą",
 7 => "Įveskite el. pašto siuntėjo vardą."
);
$lang['kalba'] = array(
 0 => "Pasirinkite kalbą",
    1 => "English", 
    2 => "Estonia"
);

/**
 * Video
 */

$lang['backvideo_table'] = array(
 0 => "Ne",
 1 => "Įmonė",
 2 => "Vaizdo įrašo ID",
 3 => "Automobilio numeris",
 4 => "Klientų įmonė",
 5 =>"Vardas", "El. paštas",
 6 => "Techninis pavadinimas",
 7 => "Įkėlimo laikas",
 8 => "Būsena",
 9 => "Žiūrėti",
 10 => "Sukurtas laikas",
 11 =>"Operacija",
 12 => "Ištrinti"
);
$lang['video_preview'] = array(
 0 => "Vaizdo įrašo ID",
 1 => "Automobilio numeris",
 2 => "Paslaugų įmonė",
 3 => "Klientas",
 4 => "Klientų įmonė",
 5 => "El. paštas",
 6 => "Telefono numeris",
 7 => "Technikas",
 8 => "Įkelta",
 9 => "Dar neįkelta",
 10 => "Atgal",
 11 => "Sukurta",
 12 => "Nuorodos adresas",
 13 => "Ištrinti",
 14 => "Siųsti vaizdo įrašo nuorodą",
 15 => "Gerai"
);

/**
 * DEVICES
 */
$lang['back_device_table'] = array(
 0 => "Ne",
 1 => "ID",
 2 => "Įrenginio pavadinimas",
 3 => „Įmonė“,
 4 => "Serijos numeris",
 5 => "Prisijungimo numeris",
 6 => "Sukurtas laikas",
 7 => "Būsena",
 8 => "Operacija",
 9 => "Redaguoti",
 10 => "Ištrinti",
 11 => "Slaptažodis"
);
$lang['device_add'] = "Pridėti įrenginį";
$lang['device_count'] = "Įrenginių skaičius";
$lang['devices'] = array(
 0 => "Įrenginio pavadinimas",
 1 => "Įrenginio ID",
 2 => "Slaptažodis",
 3 => "Serijos numeris",
 4 => „Įmonė“,
 5 => "Atšaukti",
 6 => "Išsaugoti"
);
$lang['edit_device'] = "Redaguoti įrenginį";
$lang['add_device'] = "Pridėti naują įrenginį";
$lang['error_device'] = array(
 0 => "Įveskite naują įrenginio pavadinimą.",
 1 => "Įveskite naują įrenginio ID.",
 2 => "Įveskite įrenginio slaptažodį.",
 3 => "Įveskite įrenginio serijos numerį.",
 4 => "Prašome pasirinkti bet kurią įrenginio įmonę."
);

$lang['peržiūra'] = array(
 0 => 'Aptarnavimo vaizdo įrašas: %s',
 1 => "Technikas",
 2 => "Paslaugų įmonė",
 3 => "El. paštas",
 4 => 'Telefono numeris',
 5 => "Automobilio numeris",
 6 => 'Data',
 7 => 'Pašalinti duomenis',
 8 => 'Remonto pasiūlymas',
 9 => 'Žiūrėti',
 10 => 'Pasiūlymas priimtas',
 11 => 'Priimti',
 12 => 'Atgal',
 13 => 'Atšaukti',
 14 => 'Pasiūlymas galioja',
 15 => "Aprašymas",
 16 => "Kiekis",
 17 => "Kaina",
 18 => "Suma",
 19 => "PVM",
 20 => "Iš viso"
);


/**
* ADMIN
*/

$lang['error_admin'] = array(
 0 => "Įveskite administratoriaus vartotojo vardą.",
 1 => "Įveskite administratoriaus slaptažodį."
);

$lang['sms_mail_settings'] = "SMS ir pašto nustatymai";
$lang['from_mail'] = "Iš el. pašto";
$lang['from_name'] = "Iš vardo";
$lang['mail_subject'] = "Laiško tema";
$lang['mail_body'] = "Pašto tekstas";
$lang['save'] = "Išsaugoti";
$lang['cancel'] = "atšaukti";
$lang['sms_sender_id'] = "SMS siuntėjo ID";
$lang['sms_body'] = "SMS tekstas";

?>