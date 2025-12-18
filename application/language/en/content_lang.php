<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Global
 */
$lang['front_title'] = "VIServ";
$lang['back_title'] = "VIServ Admin";
$lang['lang_setting'] = array(
    0 => "App Language Setting",
    1 => "Language Name",
    2 => "Language Code",
    3 => "Status",
    4 => "Operation",
    5 => "Active",
    6 => "Not Active"
);

$lang['menu'] = array(
    0 => "Statistics",
    1 => "Companies",
    2 => "Videos",
    3 => "Devices",
    4 => "Profile",
    5 => "Logout", 
    6 => "Customers",
    6 => "Admin",
    7 => "Waiting",
    8 => "SMS & Mail",
);

$lang['sub_menu'] = array (
    0 => "Company List", 
    1 => "Add Company", 
    2 => "Devies List", 
    3 => "Add Device",
    4 => "Locked Videos", 
    5 => "Videos List"
);
$lang['change_pass'] = array (
    0 => "Change Password", 
    1 => "Old Password", 
    2 => "New Password", 
    3 => "Confirm Password"
);

$lang['footer'] = array (
    0 => "Copyright", 
    1 => "All rights reserved."
);

$lang['warning'] = "Warning!";
$lang['success'] = "Success!";
$lang['failed'] = "Failed!";
$lang['determine'] = ["Cancel", "Yes"];
$lang['alert_content'] = array(
    0 => "Are you Sure to logout now?",
    1 => "Password changed successfully!",
    2 => "please enter old password.",
    3 => "Please enter new password.",
    4 => "The password doesn't match.",
    5 => "Please confirm new password.",
    6 => "Something Went Wrong! Try again later.",
    7 => "Old password is Incorrect!",
    8 => "Are you sure to delete？",
    9 => "Please upload Company Logo.",
    10 => "Updated successfully!",
    11 => "The Email already exists. Please try with other.",
    12 => "New device has been added successfully.",
    13 => "New company has been added successfully.",
    14 => "The Device already exist. Please try with other.",
    15 => "Please fill all fields!",
    16 => "Please input valid Email!", 
    17 => "Do you want to remove this video from your list? Action can be undone",
    18 => "Video Link sent successfully!",
    19 => "Video restored successfully!",
    20 => "Do you want to remove the data?",
    21 => "Video activated for public view",
    22 => "Sending SMS is now available!",
    23 => "Editing fields exist!  Please complete them first.",
    24 => "Offer data has been saved successfully!",
    25 => "Offer data has been deleted successfully!",
    26 => "Do you want to accept the repair offer?",
    27 => "Accept",
    28 => "Cancel"
);

/**
 * Signin
 */
$lang['signin'] = array ( 
    0 => "Email", 
    1 => "Username", 
    2 => "Password", 
    3 => "Login",
    4 => "Admin",
    5 => "Save",
    6 => "Cancel" 
);
$lang['error_content'] = array (
    0 => "Your account has been blocked by admin.", 
    1 => "Password is incorrect.", 
    2 => "This company doesn't exist."
);

/**
 * DASHBOARD
 */

$lang['statistic_title'] = "Video Statistics";
$lang['recent_title'] = "Recent Uploads";
$lang['recent_uploads'] = array(
    0 => "No",
    1 => "Video ID",
    3 => "Car Number",
    4 => "Company",
    5 => "Name",
    6 => "Email",
    7 => "Tech Name",
    8 => "Upload Time", 
    9 => "Preview", 
    10 => "View", 
    11=> "Created Time"
);

$lang['dashboard_title'] = "Statistics";
$lang['no_data'] = array(
    0 => "There is no uploaded video recently.", 
    1 => "There are no videos uploaded that month."
);
$lang['months'] = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC", "Total"];
$lang['ok'] = "OK";

/**
 * VIDEOS
 */
$lang['new_btn'] = "New Customer";
$lang['video_num'] = "Video Counts";
$lang['date_range'] = ["From", " To"];
$lang['search_key'] = "Please enter search keyword";
$lang['video_table'] = array(
    0 => "Video ID", 
    1 => "Car Number", 
    2 => "Company", 
    3 => "Name", 
    4 => "Email", 
    5 => "Tech Name", 
    6 => "Upload Time", 
    7 => "Status", 
    8 => "Operation", 
    9 => "New", 
    10 => "View", 
    11 => "Sent time", 
    12 => "Link Address", 
    13 => "Delete", 
    14 => "Send Video Link", 
    15 => "OK", 
    16 => "Phone", 
    17 => "Save", 
    18 => "Created", 
    19 => "Cancel", 
    20 => "Waiting", 
    21 => "Pending", 
    22 => "Video sent", 
    23 => "Media ID", 
    24 => "Working", 
    25 => "Data Removed", 
    26 => "Restore", 
    27 => "Locked", 
    28 => "Views", 
    29 => "Back", 
    30 => "Visit Time", 
    31 => "IP Address", 
    32 => "Send link to", 
    33 => "SMS", 
    34 => "Available", 
    35 => "Please select SMS or Email option", 
    36 => "Activate Video", 
    37 => "Activate video for public view",  
    38 => "Activated for public view", 
    39 => "Activated", 
    40 => "Reset", 
    41 => "Preview",
    42 => "Offer",
    43 => "Updated",
    44 => "Add offer",
    45 => "View offer",
    46 => "Delete offer",
    47 => "Offer valid",
    48 => "Approved",
    49 => "Not approved",
    50 => "Save",
    51 => "Description",
    52 => "Qty",
    53 => "Price",
    54 => "Sum",
    55 => "VAT",
    56 => "Total"
);

$lang['message'] = array(
    0 => "The videso link hasn't been sent yet",
    1 => "The video hasn't been uploaded yet"
);

$lang['modal_head'] = array(
    0 => "Video Preview", 
    1 => "Add New Customer", 
    2 => "Add New Video Data"
);

$lang['video_title'] = "Videos";

$lang['error_case'] = "The car number already exists.";

$lang['refresh'] = "Refresh";
/**
 * DEVICES
 */
$lang['device_title'] = "Devices";
$lang['device_table'] = array (
    0 => "NO", 
    1 => "ID", 
    2 => "Device Name", 
    3 => "Serial Number", 
    4 => "Login Num", 
    5 => "Created Time", 
    6 => "Status", 
    7 => "Active", 
    8 => "Not Active", 
    9 => "Password"
);

/**
 * PROFILE
 */
$lang['profile_title'] = "Profile";
$lang['profile_content'] = array(
    0 => "Company Name", 
    1 => "Phone Number", 
    2 => "Email", 
    3 => "Company Logo", 
    4 => "Cancel", 
    5 => "Save", 
    6 => "Select the File", 
    7 => "Address", 
    8 => "Language", 
    9 => "SMS Sender Name", 
    10 => "Email Sender Name"
);

/** BACKEND */

/**
 * COMPANY
 */
$lang['company_title'] = "Companies";
$lang['edit_company'] = "Edit Company Data";
$lang['add_company'] = "Add New Company";
$lang['add_btn'] = "Add Company";
$lang['search'] = array(
    0 => "Please enter company name", 
    1 => "Please enter client company name", 
    2 => "please enter device name", 
    3 => "Choose a Company"
);
$lang['status'] = array(
    0 => "All", 
    1 => "Active", 
    2 => "Not Active", 
    3 => "Waiting"
);
$lang['company_count'] = "Company Counts";
$lang['company_table'] = array(
    0 => "No", 
    1 => "Name", 
    2 => "Email", 
    3 => "Phone", 
    4 => "Address", 
    5 => "Videos", 
    6 => "Login Num", 
    7 => "Registered Time", 
    8 => "Status", 
    9 => "Operation", 
    10 => "Edit", 
    11 => "Delete"
);
$lang['company_content'] = array(
    0 => "Company Name", 
    1 => "Company Email", 
    2 => "Password", 
    3 => "Company Address", 
    4 => "Phone Number", 
    5 => "Cancel", 
    6 => "Save", 
    7 => "Company Logo", 
    8 => "Select a File",
    9 => "Language", 
    10 => "SMS Sender Name", 
    11 => "Email Sender Name",
    12 => "Favicon", 
    13 => "Preview Image",
    14 => "Active Offer"
);
$lang['error_company'] = array(
    0 => "Enter new company name.",
    1 => "Enter company email.", 
    2 => "Enter company password.", 
    3 => "Enter company address.", 
    4 => "Enter company phone number.", 
    5 => "Select a Language", 
    6 => "Enter SMS Sender Name.", 
    7 => "Enter Email Sender Name."
);
$lang['language'] = array(
    0 => "Select a language", 
    1 => "English", 
    2 => "Finnish"
);

$lang['active'] = array(
    0 => "Select a Active Status", 
    1 => "Active", 
    2 => "Inactive"
);

/**
 * Video
 */
$lang['backvideo_table'] = array(
    0 =>"No", 
    1 =>"Company", 
    2 =>"Video ID", 
    3 =>"Car Number", 
    4 =>"Customer Company", 
    5 =>"Name", "Email", 
    6 =>"Tech Name", 
    7 =>"Upload Time", 
    8 =>"Status", 
    9 =>"View", 
    10 =>"Created Time", 
    11 =>"Operation", 
    12 =>"Delete"
);
$lang['video_preview'] = array(
    0 => "Video ID", 
    1 => "Car Number", 
    2 => "Service Company", 
    3 => "Client", 
    4 => "Client Company", 
    5 => "Email", 
    6 => "Phone Number", 
    7 => "Technician", 
    8 => "Uploaded", 
    9 => "No uploaded yet", 
    10 => "Back", 
    11 => "Created", 
    12 => "Link Address", 
    13 => "Delete", 
    14 => "Send Video Link", 
    15 => "Ok"
);

/**
 * DEVICES
 */
$lang['back_device_table'] = array(
    0 => "No",	
    1 => "ID", 
    2 => "Device Name", 
    3 => "Company", 
    4 => "Serial Number", 
    5 => "Login Num", 
    6 => "Created Time", 
    7 => "Status", 
    8 => "Operation", 
    9 => "Edit", 
    10 => "Delete", 
    11 => "Password"
);
$lang['device_add'] = "Add Device";
$lang['device_count'] = "Device Counts";
$lang['devices'] = array(
    0 => "Device Name", 
    1 => "Device ID", 
    2 => "Password", 
    3 => "Serial Number", 
    4 => "Company", 
    5 => "Cancel", 
    6 => "Save"
);
$lang['edit_device'] = "Edit Device";
$lang['add_device'] = "Add New Device";
$lang['error_device'] = array(
    0 => "Please enter new device name.",
    1 => "Please enter new device ID.",
    2 => "Please enter device password.",
    3 => "Please enter device serial number.",
    4 => "Please select any company for the device."
);

$lang['preview'] = array(
    0 => 'Service video : %s', 
    1 => 'Technician', 
    2 => 'Service Company', 
    3 => 'Email', 
    4 => 'Phone Number', 
    5 => 'Car Number', 
    6 => 'Date',
    7 => 'Remove data',
    8 => 'Repair offer',
    9 => 'View',
    10 => 'Offer accepted',
    11 => 'Accept',
    12 => 'Back',
    13 => 'Cancel',
    14 => 'Offer valid',
    15 => "Description",
    16 => "Qty",
    17 => "Price",
    18 => "Sum",
    19 => "VAT",
    20 => "Total"
);


/**
* ADMIN
*/

$lang['error_admin'] = array(
    0 => "Enter admin username.", 
    1 => "Enter admin password."
);

$lang['sms_mail_settings'] = "SMS & Mail Settings";
$lang['from_mail'] = "From Email";
$lang['from_name'] = "From Name";
$lang['mail_subject'] = "Mail Subject";
$lang['mail_body'] = "Mail Body";
$lang['save'] = "Save";
$lang['cancel'] = "cancel";
$lang['sms_sender_id'] = "SMS Sender ID";
$lang['sms_body'] = "SMS Body";

?>
