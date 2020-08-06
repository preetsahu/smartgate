<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


////////////////////////////////////////////---------Start----------//////////////////////////////////////////////////////////
/////////////////////////////////////////////--Admin Profile Controller--/////////////////////////////////////////////////////
$route['View-Users']='adminController/AdminController/AllUsers';
$route['Admin-Profile']='adminController/AdminController/Profile';
$route['Register-Admin-View']='adminController/AdminController/registerAdminView';
$route['Admin-Login-View']='adminController/AdminController/loginAdminView';
$route['Forgot-Login-View']='adminController/AdminController/ResetPasswordView';
$route['Admin-Dashboard']='adminController/AdminController/Dashboard';
$route['Activate-Admin']='adminController/AdminController/ActivateAdmin';

$route['Register-Admin']='adminController/AdminController/RegisterAdmin';
$route['Admin-Login']='adminController/AdminController/ChkLogin';
$route['Log-out']='adminController/AdminController/AdminLogout';

$route['View-User-Activities']='adminController/AdminController/viewUsrActivities';
$route['Look-Students']='adminController/AdminController/viewStudentPage';
$route['View-Students-Availibility']='adminController/AdminController/availStudentPage';
$route['Student-Activity-View']='adminController/AdminController/studentActivityView';
$route['Staff-Activity-View']='adminController/AdminController/staffActivityView';
$route['Create-Admin']='adminController/AdminController/createAdmin';
$route['View-Staff']='adminController/AdminController/viewStaffpage';
$route['View-Staffs-Availibility']='adminController/AdminController/availStaffpage';

// $route['View-Student-Report']='adminController/AdminController/generate_student_report';
$route['View-Student-Report']='pdfController/generate_student_report';
$route['View-Staff-Report']='adminController/AdminController/generate_pdf';
$route['Activate-User']='adminController/AdminController/activateNewUser';
/////////////////////////////////////////////--Admin Profile Controller--/////////////////////////////////////////////////////
////////////////////////////////////////////---------end----------////////////////////////////////////////////////////////////



////////////////////////////////////////////---------start----------/////////////////////////////////////////////////////////
/////////////////////////////////////////////--User Profile Controller--/////////////////////////////////////////////////////

$route['User-Login-View']='userController/UserController/usrLoginView';
$route['Chk-User-Login']='userController/UserController/chkUserLogin';
$route['User-QR']='userController/UserController/usrQRView';
$route['User-Dashboard']='userController/UserController/usrDashboard';
$route['User-Logout']='userController/UserController/usrLogout';
$route['QR-Download']='userController/UserController/qrDownload';

$route['User-Registration']='userController/UserController/registerUserView';
$route['Register-User']='userController/UserController/registerUser';
$route['Student-Profile']='userController/UserController/studentProfileView';
$route['Staff-Profile']='userController/UserController/staffProfileView';
$route['View-Faculties']='userController/UserController/FacultiesView';
$route['View-Students']='userController/UserController/studentsView';
$route['Mail-Box']='userController/UserController/mailBoxView';
$route['eMail']='userController/UserController/EmailView';
$route['Compose-Email']='userController/UserController/composeEmailView';

$route['Profile']='userController/UserController/Profile';
$route['QR-Scanner']='userController/UserController/QRscanner';
$route['Scan-QR-User']='userController/UserController/authenticateScannedQR';
$route['Update-Student-Info']="userController/UserController/updateStudentInfo";
$route['Update-Staff-Info']="userController/UserController/updateStaffInfo";
$route['error']='userController/UserController/errorpage';

////////////////////////////////////////////---------end----------///////////////////////////////////////////////////////////
/////////////////////////////////////////////--User Profile--///////////////////////////////////////////////////////////////

$route['Scan-QR']='QRcontroller/index';

$route['Login-Using-OTP']='OTPcontroller/otp';
// $route['verification-form']='OTPcontroller/verificationform';
$route['Forgot-Password']='OTPcontroller/forgotPassword';
$route['Update-Password']='OTPcontroller/updatePasswordView';

$route['Email-us']='EmailController/emailTest'
?>
