<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Global
 */
$lang['front_title'] = "VIServ";
$lang['back_title'] = "VIServ Admin";

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
    8 => "SMS & Mail"
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
    22 => "Sending SMS is now available!"
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
    18 => "Created Time", 
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
    41 => "Preview"
);

$lang['message'] = ["The videso link hasn't been sent yet", "The video hasn't been uploaded yet"];

$lang['modal_head'] = ["Video Preview", "Add New Customer", "Add New Video Data"];

$lang['video_title'] = "Videos";

$lang['error_case'] = "The car number already exists.";

$lang['refresh'] = "Refresh";
/**
 * DEVICES
 */
$lang['device_title'] = "Devices";
$lang['device_table'] = array ("NO", "ID", "Device Name", "Serial Number", "Login Num", "Created Time", "Status", "Active", "Not Active", "Password");

/**
 * PROFILE
 */
$lang['profile_title'] = "Profile";
$lang['profile_content'] = ["Company Name", "Phone Number", "Email", "Company Logo", "Cancel", "Save", "Select the File", "Address", "Language", "SMS Sender Name", "Email Sender Name"];

/** BACKEND */

/**
 * COMPANY
 */
$lang['company_title'] = "Companies";
$lang['edit_company'] = "Edit Company Data";
$lang['add_company'] = "Add New Company";
$lang['add_btn'] = "Add Company";
$lang['search'] = ["Please enter company name", "Please enter client company name", "please enter device name", "Choose a Company"];
$lang['status'] = ["All", "Active", "Not Active", "Waiting"];
$lang['company_count'] = "Company Counts";
$lang['company_table'] = ["No", "Name", "Email", "Phone", "Address", "Videos", "Login Num", "Registered Time", "Status", "Operation", "Edit", "Delete"];
$lang['company_content'] = ["Company Name", "Company Email", "Password", "Company Address", "Phone Number", "Cancel", "Save", "Company Logo", "Select a File","Language", "SMS Sender Name", "Email Sender Name", "Favicon", "Preview Image"];
$lang['error_company'] = ["Enter new company name.", "Enter company email.", "Enter company password.", "Enter company address.", "Enter company phone number.", "Select a Language", "Enter SMS Sender Name.", "Enter Email Sender Name."];
$lang['language'] = ["Select a language", "English", "Estonia"];

/**
 * Video
 */
$lang['backvideo_table'] = ["No", "Company", "Video ID", "Car Number", "Customer Company", "Name", "Email", "Tech Name", "Upload Time", "Status", "View", "Created Time", "Operation", "Delete"];
$lang['video_preview'] = ["Video ID", "Car Number", "Service Company", "Client", "Client Company", "Email", "Phone Number", "Technician", "Upload Time", "No uploaded yet", "Back", "Created Time", "Link Address", "Delete", "Send Video Link", "Ok"];

/**
 * DEVICES
 */
$lang['back_device_table'] = ["No",	"ID", "Device Name", "Company", "Serial Number", "Login Num", "Created Time", "Status", "Operation", "Edit", "Delete", "Password"];
$lang['device_add'] = "Add Device";
$lang['device_count'] = "Device Counts";
$lang['devices'] = ["Device Name", "Device ID", "Password", "Serial Number", "Company", "Cancel", "Save"];
$lang['edit_device'] = "Edit Device";
$lang['add_device'] = "Add New Device";
$lang['error_device'] = ["Please enter new device name.","Please enter new device ID.","Please enter device password.","Please enter device serial number.","Please select any company for the device."];

$lang['preview'] = ['Service video : %s', 'Technician', 'Service Company', 'Email', 'Phone Number', 'Car Number', 'Date'];

/**
* ADMIN
*/

$lang['error_admin'] = ["Enter admin username.", "Enter admin password."];

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
