
<?php
// define variables and set to empty values
$totalErr = 0;
$fileUploaded = FALSE;
session_start() != FALSE
  or die('Could not start session. Cookies must be enabled in your browser.');

$registerTypeErr = $passportNumErr = $salutationErr = $fullNameErr = $surnameErr = $genderErr = "";
$registerType = $passportNum = $salutation = $fullName = $surname = $gender = "";

$raceErr = $birthDateErr = "";
$race = $specifyRace = $birthDate = $nationality = "";
$maritalErr = $religionErr = "";
$birthPlace = $marital = $religion = $specifyReligion = "";
$specifyNationalityErr = $residencyErr = "";
$citizenshipYear = $specifyNationality = $residency = $specifyResidency = "";
$emailErr = $email2Err = $homeAddressErr = "";
$email = $email2 = $homeTelephone = $officeTelephone = $mobileTelephone = $homeAddress = "";

$qualCountryErr = $qualUniversityErr = $qualTypeErr = $qualNameErr = "";
$qualCountry = $qualUniversity = $qualType = $specifyQualType = $qualName = $qualAbbreviate = "";
$qualProgTypeErr = $qualDurationErr = $qualStartDateErr = $qualEndDateErr = "";
$qualSpecialty = $qualProgType = $qualDuration = $qualStartDate = $qualEndDate = "";
$qualYearObtainedErr = $qualTwinningErr = "";
$qualYearObtained = $qualTwinning = $specifyTwinning = "";

$table1Country = $table1University = $table1StartDate = $table1EndDate = array(); 
for ($x=0; $x<5; $x++) {
  $table1Country[$x] = $table1University[$x] = $table1StartDate[$x] = $table1EndDate[$x] = "";
}
$table2StartDate = $table2EndDate = $table2Details = array(); 
for ($x=0; $x<3; $x++) {
  $table2StartDate[$x] = $table2EndDate[$x] = $table2Details[$x] = "";
}
$licenseExamErr = $passExamErr = "";
$licenseExam = $licenseExamDetails = $passExam = $notPassExamDetails = "";
//---------------------------
$table3Country = $table3University = $table3QualName = $table3QualAbbreviate = array(); 
$table3ProgType = $table3Specialty = $table3YearConfer = array();
for ($x=0; $x<3; $x++) {
  $table3Country[$x] = $table3University[$x] = $table3QualName[$x] = $table3QualAbbreviate[$x] = "";
  $table3ProgType[$x] = $table3Specialty[$x] = $table3YearConfer[$x] = "";
}
$table4Country = $table4University = $table4Department = $table4Discipline = array(); 
$table4StartDate = $table4EndDate = $table4TotalHours = array(); 
for ($x=0; $x<3; $x++) {
  $table4Country[$x] = $table4University[$x] = $table4Department[$x] = $table4Discipline[$x] = "";
  $table4StartDate[$x] = $table4EndDate[$x] = $table4TotalHours[$x] = "";
}
$table5DateJoin = $table5DateLeft = $table5Country = $table5Organisation = array();
$table5Department = $table5Designation = $table5Type = $table5PTHours = array();
for ($x=0; $x<3; $x++) {
  $table5DateJoin[$x] = $table5DateLeft[$x] = $table5Country[$x] = $table5Organisation[$x] = "";
  $table5Department[$x] = $table5Designation[$x] = $table5Type[$x] = $table5PTHours[$x] = "";
}
$table6StartDate = $table6EndDate = $table6Details = array(); 
for ($x=0; $x<3; $x++) {
  $table6StartDate[$x] = $table6EndDate[$x] = $table6Details[$x] = "";
}
$table7Country = $table7Authority = $table7Category = $table7LicenceNum = array();
$table7RegisterDate = $table7CurrentPCNum = $table7PCStartDate = $table7PCEndDate = array();
for ($x=0; $x<3; $x++) {
  $table7Country[$x] = $table7Authority[$x] = $table7Category[$x] = "";
  $table7LicenceNum[$x] = $table7RegisterDate[$x] = $table7CurrentPCNum[$x] = "";
  $table7PCStartDate[$x] = $table7PCEndDate[$x] = "";
}
//---------------------------
$activityStatusErr = $currentApptErr = $currentOrganisationErr = "";
$activityStatus = $notWorkingReason = $PTHours = $currentAppt = $currentOrganisation = "";
$currentNatureOfWorkErr = $currentDepartmentErr = $currentDateJoinErr = "";
$currentNatureOfWork = $currentWorkSpecify = $currentDepartment = $currentDateJoin = $currentDateLeft = "";
//---------------------------
$declaration1Err = $declaration2Err = $declaration3Err = $declaration4Err = "";
$declaration1 = $declaration1Details = $declaration2 = $declaration2Details = "";
$declaration4 = array();
$declaration3 = $declaration3Details = $declaration5 = "";
//---------------------------
$targetDir = "uploads/";
$uploadResumeErr = $uploadPassportErr = $uploadMarriageCertErr = $uploadRegCertErr = $uploadLicenceErr = "";
$uploadDegreeCertErr = $uploadTranscriptErr = $uploadTestimonialErr = $uploadGapLetterErr = $uploadRLEErr = "";
$uploadResume = $uploadPassport = $uploadMarriageCert = $uploadRegCert = $uploadLicence = "";
$uploadDegreeCert = $uploadTranscript = $uploadTestimonial = $uploadGapLetter = $uploadRLE = "";



//---------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fileUploaded = $_POST["fileUploaded"];

//---------------------------
///////////////////   Registration Details
  if (empty($_POST["registerType"])) {
    $registerTypeErr = " * Type of Register/Roll is required";
    $totalErr++;
  } else {
    $registerType = testInput($_POST["registerType"]);
  }
  
//---------------------------
////////////////////   Particulars of Applicant
  if (empty($_POST["passportNum"])) {
    $passportNumErr = " * Passport Number is required";
    $totalErr++;
  } else {
    $passportNum = testInput($_POST["passportNum"]);
  }

  if (empty($_POST["salutation"])) {
    $salutationErr = " * Salutation is required";
    $totalErr++;
  } else {
    $salutation = testInput($_POST["salutation"]);
  }

  if (empty($_POST["fullName"])) {
    $fullNameErr = " * Full Name is required";
    $totalErr++;
  } else {
    $fullName = testInput($_POST["fullName"]);
    // check if fullName only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
      $fullNameErr = " * Only letters and white space allowed"; 
      $totalErr++;
    }
  }

  if (empty($_POST["surname"])) {
    $surnameErr = " * Surname is required";
    $totalErr++;
  } else {
    $surname = testInput($_POST["surname"]);
    // check if surname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $surname)) {
      $surnameErr = " * Only letters and white space allowed"; 
      $totalErr++;
    }
  }
//---------------------------
  if (empty($_POST["gender"])) {
    $genderErr = " * Gender is required";
    $totalErr++;
  } else {
    $gender = testInput($_POST["gender"]);
  }

  if (empty($_POST["race"]) && empty($_POST["specifyRace"])) {
    $raceErr = " * Race is required";
    $totalErr++;
  } else {
    $race = testInput($_POST["race"]);
    $specifyRace = testInput($_POST["specifyRace"]);
    if (!empty($_POST["specifyRace"])) $race = "Others";
    if ($race == "Others" && $specifyRace == "") {
      $raceErr = " * Please specify Race";
      $totalErr++;
    }
  }

  if (empty($_POST["birthDate"])) {
    $birthDateErr = " * Date of Birth is required";
    $totalErr++;
  } else {
    $birthDate = testInput($_POST["birthDate"]);
  }

  $nationality = testInput($_POST["nationality"]);
//---------------------------
  $birthPlace = testInput($_POST["birthPlace"]);

  if (empty($_POST["marital"])) {
    $maritalErr = " * Marital Status is required";
    $totalErr++;
  } else {
    $marital = testInput($_POST["marital"]);
  }

  if (empty($_POST["religion"]) && empty($_POST["specifyReligion"])) {
    $religionErr = " * Religion is required";
    $totalErr++;
  } else {
    $religion = testInput($_POST["religion"]);
    $specifyReligion = testInput($_POST["specifyReligion"]);
    if (!empty($_POST["specifyReligion"])) $religion = "Others";
    if ($religion == "Others" && $specifyReligion == "") {
      $religionErr = " * Please specify Religion";
      $totalErr++;
    }
  }
//---------------------------
  if (empty($_POST["citizenshipYear"]) && empty($_POST["specifyNationality"])) {
    $citizenshipYear = "";
    $specifyNationality = "";
  } else if (empty($_POST["citizenshipYear"]) && !empty($_POST["specifyNationality"])) {
    $specifyNationality = testInput($_POST["specifyNationality"]);
    $specifyNationalityErr = " * Year Obtained Citizenship is required";
    $totalErr++;
  } else if (!empty($_POST["citizenshipYear"]) && empty($_POST["specifyNationality"])) {
    $citizenshipYear = testInput($_POST["citizenshipYear"]);
    $specifyNationalityErr = " * Other Nationality is required";
    $totalErr++;
  } else {
    $citizenshipYear = testInput($_POST["citizenshipYear"]);
    $specifyNationality = testInput($_POST["specifyNationality"]);
  }

  if (empty($_POST["residency"]) && empty($_POST["specifyResidency"])) {
    $residencyErr = " * Residential Status is required";
    $totalErr++;
  } else {
    $residency = testInput($_POST["residency"]);
    $specifyResidency = testInput($_POST["specifyResidency"]);
    if (!empty($_POST["specifyResidency"])) $residency = "Others";
    if ($residency == "Others" && $specifyResidency == "") {
      $residencyErr = " * Please specify Residential Status";
      $totalErr++;
    }
  }
//---------------------------
  if (empty($_POST["email"])) {
    $emailErr = " * Preferred E-mail Address is required";
    $totalErr++;
  } else {
    $email = testInput($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = " * Invalid email format"; 
      $totalErr++;
    }
  }
     
  if (empty($_POST["email2"])) {
    $email2 = "";
  } else {
    $email2 = testInput($_POST["email2"]);
    // check if e-mail address is well-formed
    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
      $email2Err = " * Invalid email format"; 
      $totalErr++;
    }
  }

  if (empty($_POST["homeTelephone"])) {
    $homeTelephone = "";
  } else {
    $homeTelephone = testInput($_POST["homeTelephone"]);
  }

  if (empty($_POST["officeTelephone"])) {
    $officeTelephone = "";
  } else {
    $officeTelephone = testInput($_POST["officeTelephone"]);
  }
   
  if (empty($_POST["mobileTelephone"])) {
    $mobileTelephone = "";
  } else {
    $mobileTelephone = testInput($_POST["mobileTelephone"]);
  }

  if (empty($_POST["homeAddress"])) {
    $homeAddressErr = " * Residential Address in Home Country is required";
    $totalErr++;
  } else {
    $homeAddress = testInput($_POST["homeAddress"]);
  }

//---------------------------
////////////////////   Qualifications and Clinical/Practice Experience of Applicant
  if (empty($_POST["qualCountry"])) {
    $qualCountryErr = " * Country of Qualification is required";
    $totalErr++;
  } else {
    $qualCountry = testInput($_POST["qualCountry"]);
  }

  if (empty($_POST["qualUniversity"])) {
    $qualUniversityErr = " * University/Institution is required";
    $totalErr++;
  } else {
    $qualUniversity = testInput($_POST["qualUniversity"]);
  }

  if (empty($_POST["qualType"]) && empty($_POST["specifyQualType"])) {
    $qualTypeErr = " * Qualification Type is required";
    $totalErr++;
  } else {
    $qualType = testInput($_POST["qualType"]);
    $specifyQualType = testInput($_POST["specifyQualType"]);
    if (!empty($_POST["specifyQualType"])) $qualType = "Others";
    if ($qualType == "Others" && $specifyQualType == "") {
      $qualTypeErr = " * Please specify Qualification Type";
      $totalErr++;
    }
  }

  if (empty($_POST["qualName"])) {
    $qualNameErr = " * Qualification Name is required";
    $totalErr++;
  } else {
    $qualName = testInput($_POST["qualName"]);
  }

  if (empty($_POST["qualAbbreviate"])) {
    $qualAbbreviate = "";
  } else {
    $qualAbbreviate = testInput($_POST["qualAbbreviate"]);
  }
//---------------------------
  if (empty($_POST["qualSpecialty"])) {
    $qualSpecialty = "";
  } else {
    $qualSpecialty = testInput($_POST["qualSpecialty"]);
  }

  if (empty($_POST["qualProgType"])) {
    $qualProgTypeErr = " * Programme Type is required";
    $totalErr++;
  } else {
    $qualProgType = testInput($_POST["qualProgType"]);
  }

  if (empty($_POST["qualDuration"])) {
    $qualDurationErr = " * Course Duration is required";
    $totalErr++;
  } else {
    $qualDuration = testInput($_POST["qualDuration"]);
  }

  if (empty($_POST["qualStartDate"])) {
    $qualStartDateErr = " * Start Date is required";
    $totalErr++;
  } else {
    $qualStartDate = testInput($_POST["qualStartDate"]);
  }

  if (empty($_POST["qualEndDate"])) {
    $qualEndDateErr = " * End Date is required";
    $totalErr++;
  } else {
    $qualEndDate = testInput($_POST["qualEndDate"]);
  }
//---------------------------
  if (empty($_POST["qualYearObtained"])) {
    $qualYearObtainedErr = " * Year Obtained is required";
    $totalErr++;
  } else {
    $qualYearObtained = testInput($_POST["qualYearObtained"]);
  }

  if (empty($_POST["qualTwinning"]) && empty($_POST["specifyTwinning"])) {
    $qualTwinningErr = " * Please indicate Yes or No";
    $totalErr++;
  } else {
    $qualTwinning = testInput($_POST["qualTwinning"]);
    $specifyTwinning = testInput($_POST["specifyTwinning"]);
    if (!empty($_POST["specifyTwinning"])) $qualTwinning = "Yes";
    if ($qualTwinning == "Yes" && $specifyTwinning == "") {
      $qualTwinningErr = " * Please specify Twinning Partner";
      $totalErr++;
    }
  }
//---------------------------
  if (isset($_POST['table1Country'])) $table1Country = testInputArray($_POST['table1Country']);
  if (isset($_POST['table1University'])) $table1University = testInputArray($_POST['table1University']);
  if (isset($_POST['table1StartDate'])) $table1StartDate = testInputArray($_POST['table1StartDate']);
  if (isset($_POST['table1EndDate'])) $table1EndDate = testInputArray($_POST['table1EndDate']);

  if (isset($_POST['table2StartDate'])) $table2StartDate = testInputArray($_POST['table2StartDate']);
  if (isset($_POST['table2EndDate'])) $table2EndDate = testInputArray($_POST['table2EndDate']);
  if (isset($_POST['table2Details'])) $table2Details = testInputArray($_POST['table2Details']);
//---------------------------
  if (empty($_POST["licenseExam"]) && empty($_POST["licenseExamDetails"])) {
    $licenseExamErr = " * Please indicate Yes or No";
    $totalErr++;
  } else {
    $licenseExam = testInput($_POST["licenseExam"]);
    $licenseExamDetails = testInput($_POST["licenseExamDetails"]);
    if (!empty($_POST["licenseExamDetails"])) $licenseExam = "Yes";
    if ($licenseExam == "Yes" && $licenseExamDetails == "") {
      $licenseExamErr = " * Please provide details";
      $totalErr++;
    }
  }

  if ($licenseExam == "Yes") {
    if (empty($_POST["passExam"]) && empty($_POST["notPassExamDetails"])) {
      $passExamErr = " * Please indicate Yes or No";
      $totalErr++;
    } else {
      $passExam = testInput($_POST["passExam"]);
      $notPassExamDetails = testInput($_POST["notPassExamDetails"]);
      if (!empty($_POST["notPassExamDetails"])) $passExam = "No";
      if ($passExam == "No" && $notPassExamDetails == "") {
        $passExamErr = " * Please provide details";
        $totalErr++;
      }
    }
  }
//---------------------------
  if (isset($_POST['table3Country'])) $table3Country = testInputArray($_POST['table3Country']);
  if (isset($_POST['table3University'])) $table3University = testInputArray($_POST['table3University']);
  if (isset($_POST['table3QualName'])) $table3QualName = testInputArray($_POST['table3QualName']);
  if (isset($_POST['table3QualAbbreviate'])) $table3QualAbbreviate = testInputArray($_POST['table3QualAbbreviate']);
  if (isset($_POST['table3ProgType'])) $table3ProgType = testInputArray($_POST['table3ProgType']);
  if (isset($_POST['table3Specialty'])) $table3Specialty = testInputArray($_POST['table3Specialty']);
  if (isset($_POST['table3YearConfer'])) $table3YearConfer = testInputArray($_POST['table3YearConfer']);

  if (isset($_POST['table4Country'])) $table4Country = testInputArray($_POST['table4Country']);
  if (isset($_POST['table4University'])) $table4University = testInputArray($_POST['table4University']);
  if (isset($_POST['table4Department'])) $table4Department = testInputArray($_POST['table4Department']);
  if (isset($_POST['table4Discipline'])) $table4Discipline = testInputArray($_POST['table4Discipline']);
  if (isset($_POST['table4StartDate'])) $table4StartDate = testInputArray($_POST['table4StartDate']);
  if (isset($_POST['table4EndDate'])) $table4EndDate = testInputArray($_POST['table4EndDate']);
  if (isset($_POST['table4TotalHours'])) $table4TotalHours = testInputArray($_POST['table4TotalHours']);

  if (isset($_POST['table5DateJoin'])) $table5DateJoin = testInputArray($_POST['table5DateJoin']);
  if (isset($_POST['table5DateLeft'])) $table5DateLeft = testInputArray($_POST['table5DateLeft']);
  if (isset($_POST['table5Country'])) $table5Country = testInputArray($_POST['table5Country']);
  if (isset($_POST['table5Organisation'])) $table5Organisation = testInputArray($_POST['table5Organisation']);
  if (isset($_POST['table5Department'])) $table5Department = testInputArray($_POST['table5Department']);
  if (isset($_POST['table5Designation'])) $table5Designation = testInputArray($_POST['table5Designation']);
  if (isset($_POST['table5Type'])) $table5Type = testInputArray($_POST['table5Type']);
  if (isset($_POST['table5PTHours'])) $table5PTHours = testInputArray($_POST['table5PTHours']);

  if (isset($_POST['table6StartDate'])) $table6StartDate = testInputArray($_POST['table6StartDate']);
  if (isset($_POST['table6EndDate'])) $table6EndDate = testInputArray($_POST['table6EndDate']);
  if (isset($_POST['table6Details'])) $table6Details = testInputArray($_POST['table6Details']);

  if (isset($_POST['table7Country'])) $table7Country = testInputArray($_POST['table7Country']);
  if (isset($_POST['table7Authority'])) $table7Authority = testInputArray($_POST['table7Authority']);
  if (isset($_POST['table7Category'])) $table7Category = testInputArray($_POST['table7Category']);
  if (isset($_POST['table7LicenceNum'])) $table7LicenceNum = testInputArray($_POST['table7LicenceNum']);
  if (isset($_POST['table7RegisterDate'])) $table7RegisterDate = testInputArray($_POST['table7RegisterDate']);
  if (isset($_POST['table7CurrentPCNum'])) $table7CurrentPCNum = testInputArray($_POST['table7CurrentPCNum']);
  if (isset($_POST['table7PCStartDate'])) $table7PCStartDate = testInputArray($_POST['table7PCStartDate']);
  if (isset($_POST['table7PCEndDate'])) $table7PCEndDate = testInputArray($_POST['table7PCEndDate']);

//---------------------------
////////////////////    Employment Details of Applicant
  if (empty($_POST["activityStatus"]) && empty($_POST["notWorkingReason"]) && empty($_POST["PTHours"])) {
    $activityStatusErr = " * Activity Status is required";
    $totalErr++;
  } else {
    $activityStatus = testInput($_POST["activityStatus"]);
    $notWorkingReason = testInput($_POST["notWorkingReason"]);
    $PTHours = testInput($_POST["PTHours"]);
    if ($notWorkingReason != "" && $PTHours == "") $activityStatus = "Not Working";
    else if ($notWorkingReason == "" && $PTHours != "") $activityStatus = "Working part-time";
    else if ($notWorkingReason != "" && $PTHours != "") {
      $activityStatusErr = " * Please fill in ONLY ONE field: the reason for Not Working OR the number of hours per week for Part-time work";
      $totalErr++;
    }
    if ($activityStatus == "Not Working" && $notWorkingReason == "") {
      $activityStatusErr = " * Please state the reason";
      $totalErr++;
    }
    if ($activityStatus == "Working part-time" && $PTHours == "") {
      $activityStatusErr = " * Please state the number of hours per week";
      $totalErr++;
    }
  }

  if (empty($_POST["currentAppt"])) {
    if ($activityStatus == "Working full-time" || $activityStatus == "Working part-time") {
      $currentApptErr = " * Appointment is required";
      $totalErr++;
    }
  } else {
    $currentAppt = testInput($_POST["currentAppt"]);
  }

  if (empty($_POST["currentOrganisation"])) {
    if ($activityStatus == "Working full-time" || $activityStatus == "Working part-time") {
      $currentOrganisationErr = " * Name of Institution/Organisation is required";
      $totalErr++;
    }
  } else {
    $currentOrganisation = testInput($_POST["currentOrganisation"]);
  }
//---------------------------
  if (empty($_POST["currentNatureOfWork"]) && empty($_POST["currentWorkSpecify"])) {
    if ($activityStatus == "Working full-time" || $activityStatus == "Working part-time") {
      $currentNatureOfWorkErr = " * Nature of Work is required";
      $totalErr++;
    }
  } else {
    $currentNatureOfWork = testInput($_POST["currentNatureOfWork"]);
    $currentWorkSpecify = testInput($_POST["currentWorkSpecify"]);
    if (!empty($_POST["currentWorkSpecify"])) $currentNatureOfWork = "Others";
    if ($currentNatureOfWork == "Others" && $currentWorkSpecify == "") {
      $currentNatureOfWorkErr = " * Please specify";
      $totalErr++;
    }
  }

  if (empty($_POST["currentDepartment"])) {
    if ($activityStatus == "Working full-time" || $activityStatus == "Working part-time") {
      $currentDepartmentErr = " * Department/Division is required";
      $totalErr++;
    }
  } else {
    $currentDepartment = testInput($_POST["currentDepartment"]);
  }

  if (empty($_POST["currentDateJoin"])) {
    if ($activityStatus == "Working full-time" || $activityStatus == "Working part-time") {
      $currentDateJoinErr = " * Date joined is required";
      $totalErr++;
    }
  } else {
    $currentDateJoin = testInput($_POST["currentDateJoin"]);
  }

  if (empty($_POST["currentDateLeft"])) {
    $currentDateLeft = "";
  } else {
    $currentDateLeft = testInput($_POST["currentDateLeft"]);
  }

//---------------------------
////////////////////    Declarations
  if (empty($_POST["declaration1"]) && empty($_POST["declaration1Details"])) {
    $declaration1Err = " * Please indicate Yes or No";
    $totalErr++;
  } else {
    $declaration1 = testInput($_POST["declaration1"]);
    $declaration1Details = testInput($_POST["declaration1Details"]);
    if (!empty($_POST["declaration1Details"])) $declaration1 = "Yes";
    if ($declaration1 == "Yes" && $declaration1Details == "") {
      $declaration1Err = " * Please provide full details";
      $totalErr++;
    }
  }

  if (empty($_POST["declaration2"]) && empty($_POST["declaration2Details"])) {
    $declaration2Err = " * Please indicate Yes or No";
    $totalErr++;
  } else {
    $declaration2 = testInput($_POST["declaration2"]);
    $declaration2Details = testInput($_POST["declaration2Details"]);
    if (!empty($_POST["declaration2Details"])) $declaration2 = "Yes";
    if ($declaration2 == "Yes" && $declaration2Details == "") {
      $declaration2Err = " * Please provide full details";
      $totalErr++;
    }
  }

  if (empty($_POST["declaration3"]) && empty($_POST["declaration3Details"])) {
    $declaration3Err = " * Please indicate Yes or No";
    $totalErr++;
  } else {
    $declaration3 = testInput($_POST["declaration3"]);
    $declaration3Details = testInput($_POST["declaration3Details"]);
    if (!empty($_POST["declaration3Details"])) $declaration3 = "Yes";
    if ($declaration3 == "Yes" && $declaration3Details == "") {
      $declaration3Err = " * Please provide full details";
      $totalErr++;
    }
  }

  if (isset($_POST['declaration4'])) $declaration4 = testInputArray($_POST['declaration4']);
  if (count($declaration4) != 3) {
    $declaration4Err = " * Please check/tick all 3 checkboxes";
    $totalErr++;
  }

  if (empty($_POST["declaration5"])) {
    $declaration5 = "";
  } else {
    $declaration5 = testInput($_POST["declaration5"]);
  }

//---------------------------
////////////////////    Documents Upload

  if ($_FILES["uploadResume"]["size"] > 5500000) {
    $uploadResumeErr = " * Sorry, your Resume is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadResume"]["size"] == 0) {
    $uploadResumeErr .= " * Resume is required";
    $totalErr++;
  } else {
    $uploadResume = $targetDir . $passportNum . " - " . basename($_FILES["uploadResume"]["name"]);
  }

  if ($_FILES["uploadPassport"]["size"] > 5500000) {
    $uploadPassportErr = " * Sorry, your Passport is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadPassport"]["size"] == 0) {
    $uploadPassportErr .= " * Passport is required";
    $totalErr++;
  } else {
    $uploadPassport = $targetDir . $passportNum . " - " . basename($_FILES["uploadPassport"]["name"]);
  }

  if ($_FILES["uploadMarriageCert"]["size"] > 5500000) {
    $uploadMarriageCertErr = " * Sorry, your Marriage Certificate is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadMarriageCert"]["size"] == 0) {
    $uploadMarriageCertErr .= " * Marriage Certificate is required";
    $totalErr++;
  } else {
    $uploadMarriageCert = $targetDir . $passportNum . " - " . basename($_FILES["uploadMarriageCert"]["name"]);
  }

  if ($_FILES["uploadRegCert"]["size"] > 5500000) {
    $uploadRegCertErr = " * Sorry, your Certificate of Registration/Enrolment is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadRegCert"]["size"] == 0) {
    $uploadRegCertErr .= " * Certificate of Registration/Enrolment is required";
    $totalErr++;
  } else {
    $uploadRegCert = $targetDir . $passportNum . " - " . basename($_FILES["uploadRegCert"]["name"]);
  }

  if ($_FILES["uploadLicence"]["size"] > 5500000) {
    $uploadLicenceErr = " * Sorry, your Current Nursing/Practising Licence is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadLicence"]["size"] == 0) {
    $uploadLicenceErr .= " * Current Nursing/Practising Licence is required";
    $totalErr++;
  } else {
    $uploadLicence = $targetDir . $passportNum . " - " . basename($_FILES["uploadLicence"]["name"]);
  }

  if ($_FILES["uploadDegreeCert"]["size"] > 5500000) {
    $uploadDegreeCertErr = " * Sorry, your Degree Certificate is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadDegreeCert"]["size"] == 0) {
    $uploadDegreeCertErr .= " * Degree Certificate is required";
    $totalErr++;
  } else {
    $uploadDegreeCert = $targetDir . $passportNum . " - " . basename($_FILES["uploadDegreeCert"]["name"]);
  }

  if ($_FILES["uploadTranscript"]["size"] > 5500000) {
    $uploadTranscriptErr = " * Sorry, your Transcripts of Nursing Education is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadTranscript"]["size"] == 0) {
    $uploadTranscriptErr .= " * Transcripts of Nursing Education is required";
    $totalErr++;
  } else {
    $uploadTranscript = $targetDir . $passportNum . " - " . basename($_FILES["uploadTranscript"]["name"]);
  }

  if ($_FILES["uploadTestimonial"]["size"] > 5500000) {
    $uploadTestimonialErr = " * Sorry, your Certificate of Service or Work Testimonials is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadTestimonial"]["size"] == 0) {
    $uploadTestimonialErr .= " * Certificate of Service or Work Testimonials is required";
    $totalErr++;
  } else {
    $uploadTestimonial = $targetDir . $passportNum . " - " . basename($_FILES["uploadTestimonial"]["name"]);
  }

  if ($_FILES["uploadGapLetter"]["size"] > 5500000) {
    $uploadGapLetterErr = " * Sorry, your service gap letter is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadGapLetter"]["size"] == 0) {
    $uploadGapLetterErr .= " * Service gap letter is required";
    $totalErr++;
  } else {
    $uploadGapLetter = $targetDir . $passportNum . " - " . basename($_FILES["uploadGapLetter"]["name"]);
  }

  if ($_FILES["uploadRLE"]["size"] > 5500000) {
    $uploadRLEErr = " * Sorry, your Summary of Related Learning Experience is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadRLE"]["size"] == 0) {
    $uploadRLEErr .= " * Summary of Related Learning Experience is required";
    $totalErr++;
  } else {
    $uploadRLE = $targetDir . $passportNum . " - " . basename($_FILES["uploadRLE"]["name"]);
  }

  if ($totalErr == 0 && !$fileUploaded) {
    if (move_uploaded_file($_FILES["uploadResume"]["tmp_name"], $uploadResume)) ;
    else {
      $uploadResumeErr = "Sorry, there was an error uploading your Resume";
    }
    if (move_uploaded_file($_FILES["uploadPassport"]["tmp_name"], $uploadPassport)) ;
    else {
      $uploadPassportErr = "Sorry, there was an error uploading your Passport";
    }
    if (move_uploaded_file($_FILES["uploadMarriageCert"]["tmp_name"], $uploadMarriageCert)) ;
    else {
      $uploadMarriageCertErr = "Sorry, there was an error uploading your Marriage Certificate";
    }
    if (move_uploaded_file($_FILES["uploadRegCert"]["tmp_name"], $uploadRegCert)) ;
    else {
      $uploadRegCertErr = "Sorry, there was an error uploading your Certificate of Registration/Enrolment";
    }
    if (move_uploaded_file($_FILES["uploadLicence"]["tmp_name"], $uploadLicence)) ;
    else {
      $uploadLicenceErr = "Sorry, there was an error uploading your Current Nursing/Practising Licence";
    }
    if (move_uploaded_file($_FILES["uploadDegreeCert"]["tmp_name"], $uploadDegreeCert)) ;
    else {
      $uploadDegreeCertErr = "Sorry, there was an error uploading your Degree Certificate";
    }
    if (move_uploaded_file($_FILES["uploadTranscript"]["tmp_name"], $uploadTranscript)) ;
    else {
      $uploadTranscriptErr = "Sorry, there was an error uploading your Transcripts of Nursing Education";
    }
    if (move_uploaded_file($_FILES["uploadTestimonial"]["tmp_name"], $uploadTestimonial)) ;
    else {
      $uploadTestimonialErr = "Sorry, there was an error uploading your Certificate of Service or Work Testimonials";
    }
    if (move_uploaded_file($_FILES["uploadGapLetter"]["tmp_name"], $uploadGapLetter)) ;
    else {
      $uploadGapLetterErr = "Sorry, there was an error uploading your Service gap letter";
    }
    if (move_uploaded_file($_FILES["uploadRLE"]["tmp_name"], $uploadRLE)) ;
    else {
      $uploadRLEErr = "Sorry, there was an error uploading your Summary of Related Learning Experience";
    }
    
    $fileUploaded = TRUE;
  } 

//---------------------------

}

function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function testInputArray($dataArray) {
  foreach ($dataArray as $item) {
    $item = testInput($item);
  }
  return $dataArray;
}

function testCheckBox($arrayToCheck, $itemToCheck) {
  if (isset($arrayToCheck)) {
    foreach($arrayToCheck as $item) {
      if ($item == $itemToCheck) return TRUE; 
    }
  }  
  return FALSE;
}
