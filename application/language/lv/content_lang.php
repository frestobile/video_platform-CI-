<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Global
 */

$lang['menu'] = array (
 0 => "Statistika",
 1 => "Uzņēmumi",
 2 => "Videoklipi",
 3 => "Ierīces",
 4 => "Profils",
 5 => "Iziet",
 6 => "Klienti",
 6 => "Administrators",
 7 => "Gaida",
 8 => "SMS un pasts"
);
$lang['sub_menu'] = array (
 0 => "Uzņēmumu saraksts",
 1 => "Pievienot uzņēmumu",
 2 => "Devies saraksts",
 3 => "Pievienot ierīci",
 4 => "Bloķētie videoklipi",
 5 => "Videoklipu saraksts"
);
$lang['change_pass'] = array (
 0 => "Mainīt paroli",
 1 => "Vecā parole",
 2 => "Jauna parole",
 3 => "Apstiprināt paroli"
);

$lang['footer'] = array (
 0 => "Autortiesības",
 1 => "Visas tiesības paturētas."
);

$lang['warning'] = "Brīdinājums!";
$lang['success'] = "Veiksmi!";
$lang['failed'] = "Neizdevās!";
$lang['determine'] = ["Atcelt", "Jā"];
$lang['alert_content'] = array(
 0 => "Vai esat pārliecināts, ka tagad atteiksities?",
 1 => "Parole veiksmīgi mainīta!",
 2 => "lūdzu, ievadiet veco paroli.",
 3 => "Lūdzu, ievadiet jaunu paroli.",
 4 => "Parole nesakrīt.",
 5 => "Lūdzu, apstipriniet jauno paroli.",
 6 => "Kaut kas nogāja greizi! Vēlāk mēģiniet vēlreiz.",
 7 => "Vecā parole ir nepareiza!",
 8 => "Vai tiešām dzēsīsit?",
 9 => "Lūdzu, augšupielādējiet uzņēmuma logotipu.",
 10 => "Veiksmīgi atjaunināts!",
 11 => "E-pasts jau pastāv. Lūdzu, mēģiniet ar citu.",
 12 => "Jauna ierīce ir veiksmīgi pievienota.",
 13 => "Jauns uzņēmums ir veiksmīgi pievienots.",
 14 => "Ierīce jau pastāv. Lūdzu, mēģiniet ar citu.",
 15 => "Lūdzu, aizpildiet visus laukus!",
 16 => "Lūdzu, ievadiet derīgu e-pastu!",
 17 => "Vai vēlaties noņemt šo videoklipu no sava saraksta? Darbību nevar atsaukt",
 18 => "Video saite veiksmīgi nosūtīta!",
 19 => "Video ir veiksmīgi atjaunots!",
 20 => "Vai vēlaties noņemt datus?",
 21 => "Video aktivizēts publiskai apskatei",
 22 => "Tagad ir pieejama SMS sūtīšana!",
 23 => "Rediģēšanas lauki pastāv! Lūdzu, vispirms aizpildiet tos.",
 24 => "Piedāvājuma dati ir veiksmīgi saglabāti!",
 25 => "Piedāvājuma dati ir veiksmīgi izdzēsti!",
 26 => "Vai vēlaties pieņemt remonta piedāvājumu?",
 27 => "Pieņemt",
 28 => "Atcelt"
);

/**
 * Signin
 */
$lang['signin'] = array (
 0 => "E-pasts",
 1 => "Lietotājvārds",
 2 => "Parole",
 3 => "Pieteikšanās",
 4 => "Administrators",
 5 => "Saglabāt",
 6 => "Atcelt"
);
$lang['error_content'] = array (
 0 => "Administrators ir bloķējis jūsu kontu.",
 1 => "Parole nav pareiza.",
 2 => "Šis uzņēmums neeksistē."
);

/**
 * DASHBOARD
 */

$lang['statistic_title'] = "Video statistika";
$lang['recent_title'] = "Pēdējās augšupielādes";
$lang['recent_uploads'] = array(
 0 => "Nē",
 1 => "Video ID",
 3 => "Automašīnas numurs",
 4 => "Uzņēmums",
 5 => "Vārds",
 6 => "E-pasts",
 7 => "Tehniskais nosaukums",
 8 => "Augšupielādes laiks",
 9 => "Priekšskatījums",
 10 => "Skatīt",
 11=> "Izveidotais laiks"
);

$lang['dashboard_title'] = "Statistika";
$lang['no_data'] = array(
 0 => "Pēdējā laikā nav augšupielādēts neviens video.",
 1 => "Šajā mēnesī nav augšupielādēts neviens videoklips."
);
$lang['months'] = ["JAN", "FEB", "MAR", "APR", "MAJ", "JUN", "JUL", "AUG", "SEP", "OCT", " NOV", "DEC", "Kopā"];
$lang['ok'] = "OK";

/**
 * VIDEOS
 */
$lang['new_btn'] = "Jauns klients";
$lang['video_num'] = "Video skaits";
$lang['date_range'] = ["No", "Līdz"];
$lang['search_key'] = "Lūdzu, ievadiet meklēšanas atslēgvārdu";
$lang['video_table'] = array(
 0 => "Video ID",
 1 => "Automašīnas numurs",
 2 => "Uzņēmums",
 3 => "Vārds",
 4 => "E-pasts",
 5 => "Tehniskais nosaukums",
 6 => "Augšupielādes laiks",
 7 => "Statuss",
 8 => "Operācija",
 9 => "Jauns",
 10 => "Skatīt",
 11 => "Nosūtīšanas laiks",
 12 => "Saites adrese",
 13 => "Dzēst",
 14 => "Sūtīt video saiti",
 15 => "Labi",
 16 => "Tālrunis",
 17 => "Saglabāt",
 18 => "Izveidots",
 19 => "Atcelt",
 20 => "Gaida",
 21 => "Gaida",
 22 => "Video nosūtīts",
 23 => "Multivides ID",
 24 => "Strādā",
 25 => "Dati noņemti",
 26 => "Atjaunot",
 27 => "Bloķēts",
 28 => "Skatījumi",
 29 => "Atpakaļ",
 30 => "Apmeklējuma laiks",
 31 => "IP adrese",
 32 => "Sūtīt saiti uz",
 33 => "SMS",
 34 => "Pieejams",
 35 => "Lūdzu, izvēlieties SMS vai e-pasta opciju",
 36 => "Aktivizēt video",
 37 => "Aktivizēt video publiskai apskatei",
 38 => "Aktivizēts publiskam skatam",
 39 => "Aktivizēts",
 40 => "Atiestatīt",
 41 => "Priekšskatījums",
 42 => "Piedāvājums",
 43 => "Atjaunināts",
 44 => "Pievienot piedāvājumu",
 45 => "Skatīt piedāvājumu",
 46 => "Dzēst piedāvājumu",
 47 => "Piedāvājums spēkā",
 48 => "Apstiprināts",
 49 => "Nav apstiprināts",
 50 => "Saglabāt",
 51 => "Apraksts",
 52 => "Daudzums",
 53 => "Cena",
 54 => "Summa",
 55 => "PVN",
 56 => "Kopā"
);

$lang['message'] = array(
 0 => "Video saite vēl nav nosūtīta",
 1 => "Videoklips vēl nav augšupielādēts"
);

$lang['modal_head'] = array(
 0 => "Video priekšskatījums",
 1 => "Pievienot jaunu klientu",
 2 => "Pievienot jaunus video datus"
);

$lang['video_title'] = "Video";

$lang['error_case'] = "Automašīnas numurs jau pastāv.";

$lang['refresh'] = "Atsvaidzināt";

/**
 * DEVICES
 */

$lang['device_title'] = "Ierīces";
$lang['device_table'] = array (
 0 => "NĒ",
 1 => "ID",
 2 => "Ierīces nosaukums",
 3 => "Sērijas numurs",
 4 => "Pieteikšanās numurs",
 5 => "Izveidotais laiks",
 6 => "Statuss",
 7 => "Aktīvs",
 8 => "Nav aktīvs",
 9 => "Parole"
);

/**
 * PROFILE
 */
$lang['profile_title'] = "Profils";
$lang['profile_content'] = array(
 0 => "Uzņēmuma nosaukums",
 1 => "Tālruņa numurs",
 2 => "E-pasts",
 3 => "Uzņēmuma logotips",
 4 => "Atcelt",
 5 => "Saglabāt",
 6 => "Atlasīt failu",
 7 => "Adrese",
 8 => "Valoda",
 9 => "SMS sūtītāja vārds",
 10 => "E-pasta sūtītāja vārds"
);

/** BACKEND */

/**
 * COMPANY
 */
$lang['company_title'] = "Uzņēmumi";
$lang['edit_company'] = "Rediģēt uzņēmuma datus";
$lang['add_company'] = "Pievienot jaunu uzņēmumu";
$lang['add_btn'] = "Pievienot uzņēmumu";
$lang['search'] = array(
 0 => "Lūdzu, ievadiet uzņēmuma nosaukumu",
 1 => "Lūdzu, ievadiet klienta uzņēmuma nosaukumu",
 2 => "lūdzu, ievadiet ierīces nosaukumu",
 3 => "Izvēlieties uzņēmumu"
);
$lang['status'] = array(
 0 => "Visi",
 1 => "Aktīvs",
 2 => "Nav aktīvs",
 3 => "Gaida"
);
$lang['company_count'] = "Uzņēmumu skaits";
$lang['company_table'] = array(
 0 => "Nē",
 1 => "Vārds",
 2 => "E-pasts",
 3 => "Tālrunis",
 4 => "Adrese",
 5 => "Videoklipi",
 6 => "Pieteikšanās numurs",
 7 => "Reģistrētais laiks",
 8 => "Statuss",
 9 => "Operācija",
 10 => "Rediģēt",
 11 => "Dzēst"
);
$lang['company_content'] = array(
 0 => "Uzņēmuma nosaukums",
 1 => "Uzņēmuma e-pasts",
 2 => "Parole",
 3 => "Uzņēmuma adrese",
 4 => "Tālruņa numurs",
 5 => "Atcelt",
 6 => "Saglabāt",
 7 => "Uzņēmuma logotips",
 8 => "Atlasīt failu",
 9 => "Valoda",
 10 => "SMS sūtītāja vārds",
 11 => "E-pasta sūtītāja vārds",
 12 => "Favicon",
 13 => "Priekšskatīt attēlu"
);
$lang['error_company'] = array(
 0 => "Ievadiet jaunu uzņēmuma nosaukumu.",
 1 => "Ievadiet uzņēmuma e-pastu.",
 2 => "Ievadiet uzņēmuma paroli.",
 3 => "Ievadiet uzņēmuma adresi.",
 4 => "Ievadiet uzņēmuma tālruņa numuru.",
 5 => "Izvēlieties valodu",
 6 => "Ievadiet SMS sūtītāja vārdu.",
 7 => "Ievadiet e-pasta sūtītāja vārdu."
);
$lang['language'] = array(
 0 => "Izvēlieties valodu",
 1 => "angļu valoda",
 2 => "Igaunija"
);

/**
 * Video
 */
$lang['backvideo_table'] = array(
 0 => "Nē",
 1 => "Uzņēmums",
 2 => "Video ID",
 3 => "Automašīnas numurs",
 4 =>"Klientu uzņēmums",
 5 =>"Vārds", "E-pasts",
 6 => "Tehniskais nosaukums",
 7 => "Augšupielādes laiks",
 8 =>"Statuss",
 9 => "Skatīt",
 10 =>"Izveidotais laiks",
 11 =>"Darbība",
 12 =>"Dzēst"
);
$lang['video_preview'] = array(
 0 => "Video ID",
 1 => "Automašīnas numurs",
 2 => "Pakalpojuma uzņēmums",
 3 => "Klients",
 4 => "Klientu uzņēmums",
 5 => "E-pasts",
 6 => "Tālruņa numurs",
 7 => "Tehniķis",
 8 => "Augšupielādēts",
 9 => "Vēl nav augšupielādēts",
 10 => "Atpakaļ",
 11 => "Izveidots",
 12 => "Saites adrese",
 13 => "Dzēst",
 14 => "Sūtīt video saiti",
 15 => "Labi"
);

/**
 * DEVICES
 */
$lang['back_device_table'] = array(
 0 => "Nē",
 1 => "ID",
 2 => "Ierīces nosaukums",
 3 => "Uzņēmums",
 4 => "Sērijas numurs",
 5 => "Pieteikšanās numurs",
 6 => "Izveidotais laiks",
 7 => "Statuss",
 8 => "Operācija",
 9 => "Rediģēt",
 10 => "Dzēst",
 11 => "Parole"
);
$lang['device_add'] = "Pievienot ierīci";
$lang['device_count'] = "Ierīču skaits";
$lang['devices'] = array(
 0 => "Ierīces nosaukums",
 1 => "Ierīces ID",
 2 => "Parole",
 3 => "Sērijas numurs",
 4 => "Uzņēmums",
 5 => "Atcelt",
 6 => "Saglabāt"
);
$lang['edit_device'] = "Rediģēt ierīci";
$lang['add_device'] = "Pievienot jaunu ierīci";
$lang['error_device'] = array(
 0 => "Lūdzu, ievadiet jaunu ierīces nosaukumu.",
 1 => "Lūdzu, ievadiet jaunu ierīces ID.",
 2 => "Lūdzu, ievadiet ierīces paroli.",
 3 => "Lūdzu, ievadiet ierīces sērijas numuru.",
 4 => "Lūdzu, izvēlieties jebkuru uzņēmumu šai ierīcei."
);

$lang['preview'] = array(
 0 => 'Pakalpojuma video: %s',
 1 => 'Tehniķis',
 2 => 'Pakalpojumu uzņēmums',
 3 => 'E-pasts',
 4 => 'Tālruņa numurs',
 5 => "Automašīnas numurs",
 6 => 'Datums',
 7 => 'Noņemt datus',
 8 => 'Remonta piedāvājums',
 9 => 'Skatīt',
 10 => 'Piedāvājums pieņemts',
 11 => 'Pieņemt',
 12 => 'Atpakaļ',
 13 => 'Atcelt',
 14 => 'Piedāvājums spēkā',
 15 => "Apraksts",
 16 => "Daudzums",
 17 => "Cena",
 18 => "Summa",
 19 => "PVN",
 20 => "Kopā"
);


/**
* ADMIN
*/

$lang['error_admin'] = array(
 0 => "Ievadiet administratora lietotājvārdu.",
 1 => "Ievadiet administratora paroli."
);

$lang['sms_mail_settings'] = "SMS un pasta iestatījumi";
$lang['from_mail'] = "No e-pasta";
$lang['from_name'] = "No vārda";
$lang['mail_subject'] = "Pasta tēma";
$lang['mail_body'] = "Pasta pamatteksts";
$lang['save'] = "Saglabāt";
$lang['cancel'] = "atcelt";
$lang['sms_sender_id'] = "SMS sūtītāja ID";
$lang['sms_body'] = "SMS pamatteksts";

?>