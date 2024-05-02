<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Global */
$lang['menu'] =array(
    0 => "Statistika",
    1 => "Ettevõtted",
    2 => "Videod",
    3 => "Seadmed",
    4 => "Profiil",
    5 => "Logi välja",
    6 => "Kliendid",
    7 => "Ootel",
    8 => "SMS ja e-post"
);
$lang['sub_menu'] = ["Ettevõtted", "Lisa ettevõte", "Seadmed", "Lisa Seade", "Lukustatud videod", "Videode loend"];
$lang['change_pass'] = ["Vaheta Parooli", "Algne Parool", "Uus Parool", "Kinnita Parool"];

$lang['footer'] = ["Autoriõigus", "Kõik õigused kaitstud."];

$lang['warning'] = "Hoiatus!";
$lang['success'] = "Edu!";
$lang['failed'] = "Luhtunud!";
$lang['determine'] = ["Tühista", "Jah"];

$lang['alert_content'] = array(
    0 => "Kas soovite välja logida?",
    1 => "Parool muudetud!",
    2 => "Sisestage vana parool.",
    3 => "Palun sisestage uus parool.",
    4 => "Parool ei sobi.",
    5 => "Kinnitage uus parool.",
    6 => "Midagi läks valesti! Proovi hiljem uuesti.",
    7 => "Vana parool on vale!",
    8 => "Kas soovid kindlasti kustutada？",
    9 => "Palun laadige üles ettevõtte logo.",
    10 => "Värskendatud edukalt!",
    11 => "E-post on juba olemas. Palun proovige muud e-posti.",
    12 => "Uus seade on edukalt lisatud.",
    13 => "Uus ettevõte on edukalt lisatud.",
    14 => "Seade on juba olemas. Palun proovige muud ID.",
    15 => "Palun täitke kõik väljad!",
    16 => "Palun sisesta kehtiv E-post!",
    17 => "Kas sa soovid selle töö eemaldada?",
    18 => "Videolink edukalt saadetud!",
    19 => "Video taastamine õnnestus!",
    20 => "Kas sa soovid andmed eemaldada?",
    21 => "Video aktiveeritud avalikuks kasutamiseks",
    22 => "SMS-ide saatmine on nüüd saadaval!"
);


/* Signin */
$lang['signin'] = ["Email", "Kasutajanimi", "Parool", "Login"];
$lang['front_title'] = "VIService Süsteem";
$lang['back_title'] = "VIService Admin";
$lang['error_content'] = ["Administraator on teie konto blokeerinud.", "Parool on vale.", "Sellist ettevõte pole olemas."];

/* DASHBOARD */
$lang['statistic_title'] = "Tööde statistika";
$lang['recent_title'] = "Viimati lisatud";
$lang['recent_uploads'] = ["Nr", "Video ID", "Auto nr", "Ettevõte", "Nimi", "Email", "Tehnik", "Upload", "Eelvaade", "Vaade", "Loodud"];
$lang['dashboard_title'] = "Statistika";
$lang['no_data'] = ["Hiljuti pole üleslaetud videosid.", "Sellel kuul pole ühtegi videot üles laetud."];
$lang['count'] = "Video arv";
$lang['total'] = "kokku";
$lang['months'] = ["JAN", "VEB", "MÄR", "APR", "MAI", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DET", "Kokku"];
$lang['ok'] = "OK";

/* VIDEOS */
$lang['new_btn'] = "Uus Klient";
$lang['video_num'] = "Video loeb";
$lang['date_range'] = ["Kellelt", "Kellele"];
$lang['search_key'] = "Sisestage otsingusõna";
$lang['video_table'] = array( 
    0 => "Video ID", 
    1 => "Auto nr", 
    2 => "Ettevõte", 
    3 => "Nimi", 
    4 => "Email", 
    5 => "Tehnik", 
    6 => "Upload", 
    7 => "Staatus", 
    8 => "Tegevus", 
    9 => "Uus", 
    10 => "Vaade", 
    11 => "Saadetud", 
    12 => "Lingi aadress", 
    13 => "Kustuta", 
    14 => "Saada video link", 
    15 => "OK", 
    16 => "Telefon", 
    17 => "Salvesta", 
    18 => "Loodud", 
    19 => "Tühista", 

    20 => "Ootan", 
    21 => "Ootel", 
    22 => "Saadetud", 

    23 => "Meediumi ID", 

    24 => "Töötlen", 

    25 => "Andmed eemaldatud", 
    26 => "TAASTA",  

    27 => "Lukus", 

    28 => "Külastused", 
    29 => "Tagasi", 
    30 => "Külastamise aeg",  
    31 => "IP-aadress", 
    32 => "Saada link aadressile", 
    33 => "SMS", 
    34 => "Saadaval", 
    35 => "Palun vali SMS või Email kuhu soovid saata", 
    36 => "Aktiveeri Video", 
    37 => "Aktiveeri video avalikuks kasutamiseks", 
    38 => "Aktiveeritud avalikuks kasutamiseks", 
    39 => "Aktiveeritud", 
    40 => "Lähtesta", 
    41 =>"Eelvaade"
);

$lang['message'] = ["Videolink pole veel saadetud", "Video pole veel üles laaditud"];
$lang['modal_head'] = ["Video eelvaade", "Lisa uus klient", "Sisestage andmed"];
$lang['video_title'] = "Videod";
$lang['error_case'] = "Autonumber on juba olemas.";
$lang['refresh'] = "Värskenda";

/* DEVICES */
$lang['device_title'] = "Seadmed";
$lang['device_table'] = ["Nr", "ID", "Seade", "Seeria nr.", "Login", "Loodud", "Staatus", "Aktiivne", "Ei ole aktiivne", "Parool"];

/* PROFILE */
$lang['profile_title'] = "Profiil";
$lang['profile_content'] = ["Ettevõte", "Telefon", "Email", "Logo", "Tühista", "Salvesta", "Valige fail", "Aadress", "Keel", "SMS-saatja nimi", "E-posti saatja nimi"];

/** BACKEND  */
/** Company */

$lang['company_title'] = "Ettevõtted";
$lang['edit_company'] = "Muuda ettevõtte andmeid";
$lang['add_company'] = "Lisa uus ettevõte";
$lang['add_btn'] = "Lisa ettevõte";
$lang['search'] = ["Sisestage ettevõtte nimi", "Sisestage kliendi ettevõtte nimi", "sisestage seadme nimi", "Valige ettevõte"];
$lang['status'] = ["Kõik", "Aktiivne", "Ei ole aktiivne", "Ootan"];
$lang['company_count'] = "Ettevõtete arv";
$lang['company_table'] = ["Nr", "Nimi", "Email", "Telefon", "Aadress", "Videod", "sisselogimise loend", "Registreeritud", "Staatus", "Tegevus", "Muuda", "Kustuta"];

$lang['company_content'] = ["Ettevõtte Nimi", "Ettevõtte E-post", "Parool", "Ettevõtte Aadress", "Telefoni nr", "Tühista", "Salvesta", "Logo", "Valige fail", "Keel", "SMS-saatja nimi", "E-posti saatja nimi", "Logo eelvaade"];
$lang['error_company'] = ["Sisestage ettevõtte nimi.", "Sisestage ettevõtte e-posti aadress.", "Sisestage ettevõtte parool.", "Palun sisestage ettevõtte aadress.", "Palun sisestage ettevõtte telefon.", "Valige keel", "Palun sisestage SMS-i saatja nimi", "Palun sisestage saatja e-posti aadress"];
$lang['language'] = ["Valige keel", "Inglise", "Eesti"];


/** Video */
$lang['backvideo_table'] = ["Nr", "Ettevõte", "Video ID", "Auto nr", "Kliendifirma", "Nimi", "Email", "Tehnik", "Upload aeg", "Status", "Vaade", "Loodud aeg", "Toimimine", "Kustuta"];
$lang['video_preview'] = ["Video ID", "Auto nr", "Teenindusettevõte", "Klient", "Kliendifirma", "Email", "Telefoni nr", "Tehnik", "Upload aeg", "Ei ole veel üles laaditud", "Tagasi", "Loodud aeg", "Linki aadress", "Kustuta", "Saada video link", "Ok"];

/**
 * DEVICES
 */

$lang['back_device_table'] = ["Nr",	"ID", "Seadme nimi", "Ettevõte", "Seerianumber", "Logi sisse", "Loodud aeg", "Staatus", "Tegevus", "Muuda", "Kustuta", "Parool"];
$lang['device_add'] = "Lisa seade";
$lang['device_count'] = "Seadmete arv";

$lang['devices'] = ["Seadme nimi", "Seadme ID", "Parool", "Seerianumber", "Ettevõte", "Tühista", "Salvesta"];
$lang['edit_device'] = "Muuda";
$lang['add_device'] = "Lisa uus seade";
$lang['error_device'] = ["Sisestage uus seadme nimi.","Sisestage uus seadme ID.","Sisestage seadme parool.","Sisestage seadme seerianumber.","Valige seadme jaoks ettevõte."];

$lang['preview'] = ['Teeninduse video : %s', 'Tehnik', 'Ettevõte', 'E-post', 'Telefon', 'Auto nr', 'Kuupäev'];

$lang['sms_mail_settings'] = "SMS- ja e-posti seaded";
$lang['from_mail'] = "E-postist";
$lang['from_name'] = "Nimes";
$lang['mail_subject'] = "Posti teema";
$lang['mail_body'] = "Posti korpus";
$lang['save'] = "Salvesta";
$lang['cancel'] = "tühista";
$lang['sms_sender_id'] = "SMS-saatja ID";
$lang['sms_body'] = "SMS-i sisu";
?>
