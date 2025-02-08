<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Global */
$lang['menu'] =array(
    0 => "Tilastot",
    1 => "Yritykset",
    2 => "Videot",
    3 => "Laitteet",
    4 => "Profiili",
    5 => "Kirjaudu ulos",
    6 => "Asiakkaat",
    7 => "Odottaa",
    8 => "SMS ja sähköposti",
);
$lang['lang_setting'] = array(
    0 => "Sovelluksen kielen asetukset",
    1 => "Kielen nimi",
    2 => "Kielikoodi",
    3 => "Tila",
    4 => "Toiminto", 
    5 => "Aktiivinen",
    6 => "Ei aktiivinen"
);
$lang['sub_menu'] = ["Yritykset", "Lisää yritys", "Laitteet", "Lisää laite", "Lukitut videot", "Videoluettelo"];
$lang['change_pass'] = ["Vaihda salasana", "Alkuperäinen salasana", "Uusi salasana", "Vahvista salasana"];

$lang['footer'] = ["Tekijänoikeudet", "Kaikki oikeudet pidätetään."];

$lang['warning'] = "Varoitus!";
$lang['success'] = "Onnistui!";
$lang['failed'] = "Epät onnistui!";
$lang['determine'] = ["Peruuta", "Kyllä"];

$lang['alert_content'] = array(
    0 => "Haluatko kirjautua ulos?",
    1 => "Salasana muutettu!",
    2 => "Syötä vanha salasana.",
    3 => "Syötä uusi salasana.",
    4 => "Salasana ei täsmää.",
    5 => "Vahvista uusi salasana.",
    6 => "Jokin meni pieleen! Yritä myöhemmin uudelleen.",
    7 => "Vanha salasana on väärä!",
    8 => "Haluatko varmasti poistaa?",
    9 => "Lataa yrityksen logo.",
    10 => "Päivitetty onnistuneesti!",
    11 => "Sähköposti on jo käytössä. Yritä toista sähköpostiosoitetta.",
    12 => "Uusi laite lisätty onnistuneesti.",
    13 => "Uusi yritys lisätty onnistuneesti.",
    14 => "Laite on jo olemassa. Yritä toista ID:tä.",
    15 => "Täytä kaikki kentät!",
    16 => "Syötä kelvollinen sähköpostiosoite!",
    17 => "Haluatko poistaa tämän työn?",
    18 => "Videolinkki lähetetty onnistuneesti!",
    19 => "Videon palautus onnistui!",
    20 => "Haluatko poistaa tiedot?",
    21 => "Video aktivoitu julkista käyttöä varten",
    22 => "SMS:n lähetys on nyt käytettävissä!",
    23 => "Muokkauskentät ovat olemassa! Täytä ne ensin.",
    24 => "Tarjouksen tiedot tallennettu onnistuneesti!",
    25 => "Tarjouksen tiedot poistettu onnistuneesti!",
    26 => "Haluatko vahvistaa korjaustarjouksen?",
    27 => "Vahvista",
    28 => "Peruuta",
    29 => "Car number Or Phone number can't be empty"
);
/* Signin */
$lang['signin'] = array(
    0 => "Sähköposti",
    1 => "Käyttäjätunnus",
    2 => "Salasana",
    3 => "Kirjaudu sisään",
    4 => "Ylläpitäjä",
    5 => "Tallenna",
    6 => "Peruuta"
);
$lang['front_title'] = "VIService Järjestelmä";
$lang['back_title'] = "VIService Admin";
$lang['error_content'] = ["Ylläpitäjä on estänyt tilisi.", "Salasana on väärä.", "Tällaista yritystä ei ole olemassa."];

/* DASHBOARD */
$lang['statistic_title'] = "Työtilastot";
$lang['recent_title'] = "Viimeksi lisätty";
$lang['recent_uploads'] = ["Nr", "Video ID", "Auto nro", "Yritys", "Nimi", "Sähköposti", "Teknikko", "Lataus", "Esikatselu", "Näyttö", "Luotu"];
$lang['dashboard_title'] = "Tilastot";
$lang['no_data'] = ["Viimeksi ei ole ladattu videoita.", "Tällä kuulla ei ole ladattu videoita."];
$lang['count'] = "Videoiden määrä";
$lang['total'] = "yhteensä";
$lang['months'] = ["TAM", "HEL", "MAA", "HUI", "TOU", "KES", "HEI", "ELO", "SYYS", "LOK", "MARR", "JOUL", "Yhteensä"];
$lang['ok'] = "OK";

/* VIDEOS */
$lang['new_btn'] = "Uusi Asiakas";
$lang['video_num'] = "Videoiden määrä";
$lang['date_range'] = ["Keneltä", "Kenelle"];
$lang['search_key'] = "Syötä hakusana";
$lang['video_table'] = array( 
    0 => "Video ID", 
    1 => "Auto nro", 
    2 => "Yritys", 
    3 => "Nimi", 
    4 => "Sähköposti", 
    5 => "Teknikko", 
    6 => "Lataus", 
    7 => "Tila", 
    8 => "Toiminta", 
    9 => "Uusi", 
    10 => "Näyttö", 
    11 => "Lähetetty", 
    12 => "Linkin osoite", 
    13 => "Poista", 
    14 => "Lähetä videolinkki", 
    15 => "OK", 
    16 => "Puhelin", 
    17 => "Tallenna", 
    18 => "Luotu", 
    19 => "Peruuta", 
    20 => "Odottaa", 
    21 => "Odotettu", 
    22 => "Lähetetty", 
    23 => "Median ID", 
    24 => "Käsittelen", 
    25 => "Tietoja poistettu", 
    26 => "PALAA",  
    27 => "Lukittu", 
    28 => "Käynnistykset", 
    29 => "Takaisin", 
    30 => "Käynnistysaika",  
    31 => "IP-osoite", 
    32 => "Lähetä linkki osoitteeseen", 
    33 => "SMS", 
    34 => "Saatavilla", 
    35 => "Valitse SMS tai Sähköposti, johon haluat lähettää", 
    36 => "Aktivoi Video", 
    37 => "Aktivoi video julkista käyttöä varten", 
    38 => "Aktivoitu julkista käyttöä varten", 
    39 => "Aktivoitu", 
    40 => "Palauta", 
    41 => "Esikatselu",
    42 => "Tarjous",
    43 => "Päivitetty",
    44 => "Lisää tarjous",
    45 => "Katso tarjous",
    46 => "Poista tarjous",
    47 => "Tarjous voimassa",
    48 => "Vahvistettu",
    49 => "Vahvistus puuttuu",
    50 => "Tallenna",
    51 => "Kuvaus",
    52 => "Yksikkö",
    53 => "Hinta",
    54 => "Summa",
    55 => "ALV",
    56 => "Yhteensä",
    57 => "Enter Letters & Numbers only",
    58 => "Please include an '@' in the email address"
);

$lang['message'] = ["Videolinkkiä ei ole vielä lähetetty", "Videota ei ole vielä ladattu"];
$lang['modal_head'] = ["Videon esikatselu", "Lisää uusi asiakas", "Syötä tiedot"];
$lang['video_title'] = "Videot";
$lang['error_case'] = "Autonumero on jo olemassa.";
$lang['refresh'] = "Päivitä";

/* DEVICES */
$lang['device_title'] = "Laitteet";
$lang['device_table'] = ["Nr", "ID", "Laite", "Sarjanumero", "Kirjaudu sisään", "Luotu", "Tila", "Aktiivinen", "Ei aktiivinen", "Salasana"];

/* PROFILE */
$lang['profile_title'] = "Profiili";
$lang['profile_content'] = ["Yritys", "Puhelin", "Sähköposti", "Logo", "Peruuta", "Tallenna", "Valitse tiedosto", "Osoite", "Kieli", "SMS-lähettäjän nimi", "Sähköpostilähettäjän nimi"];

/** BACKEND  */
/** Company */

$lang['company_title'] = "Yritykset";
$lang['edit_company'] = "Muokkaa yrityksen tietoja";
$lang['add_company'] = "Lisää uusi yritys";
$lang['add_btn'] = "Lisää yritys";
$lang['search'] = ["Syötä yrityksen nimi", "Syötä asiakkaan yrityksen nimi", "Syötä laitteen nimi", "Valitse yritys"];
$lang['status'] = ["Kaikki", "Aktiivinen", "Ei aktiivinen", "Odottaa"];
$lang['company_count'] = "Yritysten määrä";
$lang['company_table'] = ["Nr", "Nimi", "Sähköposti", "Puhelin", "Osoite", "Videot", "Kirjautumisten määrä", "Rekisteröity", "Tila", "Toiminta", "Muokkaa", "Poista"];

$lang['company_content'] = ["Yrityksen Nimi", "Yrityksen Sähköposti", "Salasana", "Yrityksen Osoite", "Puhelinnumero", "Peruuta", "Tallenna", "Logo", "Valitse tiedosto", "Kieli", "SMS-lähettäjän nimi", "Sähköpostilähettäjän nimi", "Favicon", "Kuvan esikatselu", "Aktivoitu tarjous"];
$lang['error_company'] = ["Syötä yrityksen nimi.", "Syötä yrityksen sähköpostiosoite.", "Syötä yrityksen salasana.", "Syötä yrityksen osoite.", "Syötä yrityksen puhelinnumero.", "Valitse kieli", "Syötä SMS-lähettäjän nimi", "Syötä lähettäjän sähköpostiosoite"];
$lang['language'] = array(
    0 => "Valitse kieli",
    1=> "Englanti",
    2 => "Suomi"
);
$lang['active'] = ["Valitse aktiivinen tila", "Aktiivinen", "Ei aktiivinen"];

/** Video */
$lang['backvideo_table'] = ["Nr", "Yritys", "Video ID", "Auto nro", "Asiakasyhtiö", "Nimi", "Sähköposti", "Teknikko", "Latausaika", "Tila", "Näyttö", "Luontiaika", "Toiminta", "Poista"];
$lang['video_preview'] = [
    "Video ID", 
    "Auto nro", 
    "Palveluyritys", 
    "Asiakas", 
    "Asiakasyhtiö", 
    "Sähköposti", 
    "Puhelinnumero", 
    "Teknikko", 
    "Ladattu", 
    "Ei ladattu vielä", 
    "Takaisin", 
    "Luotu", 
    "Linkin osoite", 
    "Poista", 
    "Lähetä videolinkki", 
    "OK"
];

/**
 * DEVICES
 */

$lang['back_device_table'] = ["Nr", "ID", "Laitteen nimi", "Yritys", "Sarjanumero", "Kirjaudu sisään", "Luontiaika", "Tila", "Toiminta", "Muokkaa", "Poista", "Salasana"];
$lang['device_add'] = "Lisää laite";
$lang['device_count'] = "Laitteiden määrä";

$lang['devices'] = ["Laitteen nimi", "Laitteen ID", "Salasana", "Sarjanumero", "Yritys", "Peruuta", "Tallenna"];
$lang['edit_device'] = "Muokkaa";
$lang['add_device'] = "Lisää uusi laite";
$lang['error_device'] = ["Syötä uusi laitteen nimi.", "Syötä uusi laitteen ID.", "Syötä laitteen salasana.", "Syötä laitteen sarjanumero.", "Valitse laitteelle yritys."];

$lang['preview'] = array(
    0 => 'Palvelun video: %s', 
    1 => 'Teknikko', 
    2 => 'Yritys', 
    3 => 'Sähköposti', 
    4 => 'Puhelin', 
    5 => 'Auto nro', 
    6 => 'Päivämäärä',
    7 => 'Poista tiedot',
    8 => 'Korjaustarjous',
    9 => 'Näytä',
    10 => 'Tarjous vahvistettu',
    11 => 'Vahvista',
    12 => 'Takaisin',
    13 => 'Peruuta',
    14 => 'Tarjous voimassa',
    15 => "Kuvaus",
    16 => "Yksikkö",
    17 => "Hinta",
    18 => "Summa",
    19 => "ALV",
    20 => "Yhteensä"
);

$lang['sms_mail_settings'] = "SMS- ja sähköpostiasetukset";
$lang['from_mail'] = "Sähköposti";
$lang['from_name'] = "Nimi";
$lang['mail_subject'] = "Sähköpostin aihe";
$lang['mail_body'] = "Sähköpostin sisältö";
$lang['save'] = "Tallenna";
$lang['cancel'] = "Peruuta";
$lang['sms_sender_id'] = "SMS-lähettäjän ID";
$lang['sms_body'] = "SMS-viestin sisältö";
?>
