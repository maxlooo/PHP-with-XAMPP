<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {
  color: #FF0000;
}
input[type=number]{
    width: 50px;
} 

</style>
</head>
<body> 


<?php 

include "SNB Form Controls.php";
include "SNB Form DB Linking.php";

if ($fileUploaded == FALSE) {

?>


<h1><center>Singapore Nursing Board</center></h1>
<h2>Application for Registration/Enrolment</h2>
<p><span class="error"> <?php if ($totalErr) echo "* required field.";?> </span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 

  <input type="hidden" name="fileUploaded" value="<?php echo $fileUploaded;?>">

  <h3>Registration Details</h3>
  Type of Register/Roll:
  <br><input type="radio" name="registerType" <?php if (isset($registerType) && $registerType=="nurse") echo "checked";?> value="nurse">Registered Nurse
  <br><input type="radio" name="registerType" <?php if (isset($registerType) && $registerType=="midwife") echo "checked";?> value="midwife">Registered Midwife
  <br><input type="radio" name="registerType" <?php if (isset($registerType) && $registerType=="psychiatric") echo "checked";?> value="psychiatric">Registered Nurse (Psychiatric)
  <br><input type="radio" name="registerType" <?php if (isset($registerType) && $registerType=="enrolled") echo "checked";?> value="enrolled">Enrolled Nurse
  <span class="error"> <?php echo $registerTypeErr;?></span>
  <br><br><br><br>


  <h3>Particulars of Applicant</h3>
  Passport Number:
  <br><input type="text" name="passportNum" value="<?php echo $passportNum;?>">
  <span class="error"> <?php echo $passportNumErr;?></span>
  <br><br>
  Salutation:
  <br><input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Prof") echo "checked";?> value="Prof">Prof
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Asst Prof") echo "checked";?> value="Asst Prof">Assistant Prof
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Dr") echo "checked";?> value="Dr">Dr
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Sir") echo "checked";?> value="Sir">Sir
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Mr") echo "checked";?> value="Mr">Mr
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Ms") echo "checked";?> value="Ms">Ms
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Miss") echo "checked";?> value="Miss">Miss
  <input type="radio" name="salutation" <?php if (isset($salutation) && $salutation=="Mdm") echo "checked";?> value="Mdm">Mdm
  <span class="error"> <?php echo $salutationErr;?></span>  
  <br><br>
  Full Name as shown in NRIC/Passport: 
  <br><input type="text" name="fullName" value="<?php echo $fullName;?>">
  <span class="error"> <?php echo $fullNameErr;?></span>
  <br><br>
  Surname/Last Name as shown in NRIC/Passport: 
  <br><input type="text" name="surname" value="<?php echo $surname;?>">
  <span class="error"> <?php echo $surnameErr;?></span>
  <br><br>

  Gender:
  <br><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  Race:
  <br><input type="radio" name="race" <?php if (isset($race) && $race=="Chinese") echo "checked";?> value="Chinese">Chinese
  <input type="radio" name="race" <?php if (isset($race) && $race=="Eurasian") echo "checked";?> value="Eurasian">Eurasian
  <input type="radio" name="race" <?php if (isset($race) && $race=="Indian") echo "checked";?> value="Indian">Indian
  <input type="radio" name="race" <?php if (isset($race) && $race=="Malay") echo "checked";?> value="Malay">Malay
  <input type="radio" name="race" <?php if (isset($race) && $race=="Others") echo "checked";?> value="Others">Others
  <input type="text" name="specifyRace" value="<?php echo $specifyRace;?>">
  <span class="error"> <?php echo $raceErr;?></span>
  <br><br>
  Date of Birth (DD/MM/YYYY):
  <br><input type="date" name="birthDate" value="<?php echo $birthDate;?>">
  <span class="error"> <?php echo $birthDateErr;?></span>
  <br><br>
  Nationality: 
  <select name="nationality">
    <option <?php if (isset($nationality) && $nationality=="Malaysia") echo "selected";?> value="Malaysia">Malaysia</option>
    <option <?php if (isset($nationality) && $nationality=="Taiwan") echo "selected";?> value="Taiwan">Taiwan</option>
    <option <?php if (isset($nationality) && $nationality=="China") echo "selected";?> value="China">China</option>
    <option <?php if (isset($nationality) && $nationality=="Philippines") echo "selected";?> value="Philippines">Philippines</option>
    <option <?php if (isset($nationality) && $nationality=="Myanmar") echo "selected";?> value="Myanmar">Myanmar</option>
    <option <?php if (isset($nationality) && $nationality=="Vietnam") echo "selected";?> value="Vietnam">Vietnam</option>
  </select>
  <br><br>

  Country/Place of Birth:
  <select name="birthPlace">
    <option <?php if (isset($birthPlace) && $birthPlace=="Malaysia") echo "selected";?> value="Malaysia">Malaysia</option>
    <option <?php if (isset($birthPlace) && $birthPlace=="Taiwan") echo "selected";?> value="Taiwan">Taiwan</option>
    <option <?php if (isset($birthPlace) && $birthPlace=="China") echo "selected";?> value="China">China</option>
    <option <?php if (isset($birthPlace) && $birthPlace=="Philippines") echo "selected";?> value="Philippines">Philippines</option>
    <option <?php if (isset($birthPlace) && $birthPlace=="Myanmar") echo "selected";?> value="Myanmar">Myanmar</option>
    <option <?php if (isset($birthPlace) && $birthPlace=="Vietnam") echo "selected";?> value="Vietnam">Vietnam</option>
  </select>
  <br><br>
  Marital Status:
  <br><input type="radio" name="marital" <?php if (isset($marital) && $marital=="Single") echo "checked";?> value="Single">Single
  <input type="radio" name="marital" <?php if (isset($marital) && $marital=="Married") echo "checked";?> value="Married">Married
  <input type="radio" name="marital" <?php if (isset($marital) && $marital=="Cohabitated") echo "checked";?> value="Cohabitated">Cohabitated
  <input type="radio" name="marital" <?php if (isset($marital) && $marital=="Separated") echo "checked";?> value="Separated">Separated
  <input type="radio" name="marital" <?php if (isset($marital) && $marital=="Divorced") echo "checked";?> value="Divorced">Divorced
  <input type="radio" name="marital" <?php if (isset($marital) && $marital=="Widowed") echo "checked";?> value="Widowed">Widowed
  <span class="error"> <?php echo $maritalErr;?></span>
  <br><br>
  Religion:
  <br><input type="radio" name="religion" <?php if (isset($religion) && $religion=="Buddhism") echo "checked";?> value="Buddhism">Buddhism
  <input type="radio" name="religion" <?php if (isset($religion) && $religion=="Christianity") echo "checked";?> value="Christianity">Christianity
  <input type="radio" name="religion" <?php if (isset($religion) && $religion=="Free Thinker") echo "checked";?> value="Free Thinker">Free Thinker
  <br><input type="radio" name="religion" <?php if (isset($religion) && $religion=="Hinduism") echo "checked";?> value="Hinduism">Hinduism
  <input type="radio" name="religion" <?php if (isset($religion) && $religion=="Islam") echo "checked";?> value="Islam">Islam
  <input type="radio" name="religion" <?php if (isset($religion) && $religion=="Sikhism") echo "checked";?> value="Sikhism">Sikhism
  <input type="radio" name="religion" <?php if (isset($religion) && $religion=="Others") echo "checked";?> value="Others">Others
  <input type="text" name="specifyReligion" value="<?php echo $specifyReligion;?>">
  <span class="error"> <?php echo $religionErr;?></span>
  <br><br>

  Year Obtained Citizenship (if converted from other nationalities):
  <input type="number" name="citizenshipYear" min="1900" max="2100" value="<?php echo $citizenshipYear;?>">
  <br>
  Other Nationality:
  <input type="text" name="specifyNationality" value="<?php echo $specifyNationality;?>">
  <span class="error"> <?php echo $specifyNationalityErr;?></span>
  <br><br>
  Residential Status (if not Singapore Citizen):
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="Singapore PR") echo "checked";?> value="Singapore PR">Singapore Permanent Resident
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="Employment Pass") echo "checked";?> value="Employment Pass">Employment Pass
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="Work Permit") echo "checked";?> value="Work Permit">Work Permit
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="S Pass") echo "checked";?> value="S Pass">S Pass
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="Dependent's Pass") echo "checked";?> value="Dependent's Pass">Dependent's Pass
  <br><input type="radio" name="residency" <?php if (isset($residency) && $residency=="Others") echo "checked";?> value="Others">Others
  <input type="text" name="specifyResidency" value="<?php echo $specifyResidency;?>">
  <span class="error"> <?php echo $residencyErr;?></span>
  <br><br>

  Preferred E-mail Address: 
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Alternate E-mail Address: 
  <input type="text" name="email2" value="<?php echo $email2;?>">
  <span class="error"> <?php echo $email2Err;?></span>
  <br><br>
  Home Telephone Number: 
  <input type="text" name="homeTelephone" value="<?php echo $homeTelephone;?>">
  <br><br>
  Office Telephone Number: 
  <input type="text" name="officeTelephone" value="<?php echo $officeTelephone;?>">
  <br><br>
  Mobile Number: 
  <input type="text" name="mobileTelephone" value="<?php echo $mobileTelephone;?>">
  <br><br>
  Residential Address in Home Country:
  <br><input type="text" name="homeAddress" size="50" value="<?php echo $homeAddress;?>">
  <span class="error"> <?php echo $homeAddressErr;?></span>
  <br><br><br><br>


  <h3>Qualifications and Clinical/Practice Experience of Applicant</h3>
  <h4>Basic Nursing/Midwifery Qualification Obtained</h4>
  Country:
  <input type="text" name="qualCountry" value="<?php echo $qualCountry;?>">
  <span class="error"> <?php echo $qualCountryErr;?></span>
  <br><br>
  University/Institution:
  <input type="text" name="qualUniversity" value="<?php echo $qualUniversity;?>">
  <span class="error"> <?php echo $qualUniversityErr;?></span>
  <br><br>
  Qualification Type:
  <br><input type="radio" name="qualType" <?php if (isset($qualType) && $qualType=="Masters") echo "checked";?> value="Masters">Masters Degree
  <br><input type="radio" name="qualType" <?php if (isset($qualType) && $qualType=="Bachelor") echo "checked";?> value="Bachelor">Bachelor's Degree
  <br><input type="radio" name="qualType" <?php if (isset($qualType) && $qualType=="Grad Dip") echo "checked";?> value="Grad Dip">Graduate Diploma
  <br><input type="radio" name="qualType" <?php if (isset($qualType) && $qualType=="Diploma") echo "checked";?> value="Diploma">Diploma
  <br><input type="radio" name="qualType" <?php if (isset($qualType) && $qualType=="Others") echo "checked";?> value="Others">Others, pls specify:
  <input type="text" name="specifyQualType" value="<?php echo $specifyQualType;?>">
  <span class="error"> <?php echo $qualTypeErr;?></span>
  <br><br>
  Qualification Name:
  <input type="text" name="qualName" value="<?php echo $qualName;?>">
  <span class="error"> <?php echo $qualNameErr;?></span>
  <br><br>
  Abbreviation of Qualification: 
  <input type="text" name="qualAbbreviate" value="<?php echo $qualAbbreviate;?>">
  <br><br>

  Subject Area/Specialty:
  <input type="text" name="qualSpecialty" value="<?php echo $qualSpecialty;?>">
  <br><br>
  Programme Type:
  <input type="radio" name="qualProgType" <?php if (isset($qualProgType) && $qualProgType=="Full-time") echo "checked";?> value="Full-time">Full-time
  <input type="radio" name="qualProgType" <?php if (isset($qualProgType) && $qualProgType=="Part-time") echo "checked";?> value="Part-time">Part-time
  <span class="error"> <?php echo $qualProgTypeErr;?></span>
  <br><br>
  Course Duration (in months): 
  <input type="number" name="qualDuration" value="<?php echo $qualDuration;?>">
  <span class="error"> <?php echo $qualDurationErr;?></span>
  <br><br>
  Start Date (DD/MM/YYYY):
  <input type="date" name="qualStartDate" value="<?php echo $qualStartDate;?>">
  <span class="error"> <?php echo $qualStartDateErr;?></span>
  <br><br>
  End Date (DD/MM/YYYY):
  <input type="date" name="qualEndDate" value="<?php echo $qualEndDate;?>">
  <span class="error"> <?php echo $qualEndDateErr;?></span>
  <br><br>
  Year Obtained (YYYY):
  <input type="number" name="qualYearObtained" value="<?php echo $qualYearObtained;?>">
  <span class="error"> <?php echo $qualYearObtainedErr;?></span>
  <br><br>
  Twinning Programme:
  <input type="radio" name="qualTwinning" <?php if (isset($qualTwinning) && $qualTwinning=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="qualTwinning" <?php if (isset($qualTwinning) && $qualTwinning=="No") echo "checked";?> value="No">No
  <span class="error"> <?php echo $qualTwinningErr;?></span>
  <br>
  If "Yes", please specify Twinning Partner:
  <input type="text" name="specifyTwinning" value="<?php echo $specifyTwinning;?>">
  <br><br><br>
  
  Please complete the following section if you DID NOT complete your basic qualification in the SAME University/Institution/Country:
  <br><br><table>
    <thead>
      <tr>
        <th>Year</th><th>Country</th><th>University</th><th>Start Date</th><th>End Date</th>
      </tr>
    </thead>
    <tr><td>1</td>
      <td><input type="text" name="table1Country[]" value="<?php echo $table1Country[0]; ?>" /></td>
      <td><input type="text" name="table1University[]" value="<?php echo $table1University[0]; ?>" /></td>
      <td><input type="date" name="table1StartDate[]" value="<?php echo $table1StartDate[0]; ?>" /></td>
      <td><input type="date" name="table1EndDate[]" value="<?php echo $table1EndDate[0]; ?>" /></td>
    </tr><tr><td>2</td>
      <td><input type="text" name="table1Country[]" value="<?php echo $table1Country[1]; ?>" /></td>
      <td><input type="text" name="table1University[]" value="<?php echo $table1University[1]; ?>" /></td>
      <td><input type="date" name="table1StartDate[]" value="<?php echo $table1StartDate[1]; ?>" /></td>
      <td><input type="date" name="table1EndDate[]" value="<?php echo $table1EndDate[1]; ?>" /></td>
    </tr><tr><td>3</td>
      <td><input type="text" name="table1Country[]" value="<?php echo $table1Country[2]; ?>" /></td>
      <td><input type="text" name="table1University[]" value="<?php echo $table1University[2]; ?>" /></td>
      <td><input type="date" name="table1StartDate[]" value="<?php echo $table1StartDate[2]; ?>" /></td>
      <td><input type="date" name="table1EndDate[]" value="<?php echo $table1EndDate[2]; ?>" /></td>
    </tr><tr><td>4</td>
      <td><input type="text" name="table1Country[]" value="<?php echo $table1Country[3]; ?>" /></td>
      <td><input type="text" name="table1University[]" value="<?php echo $table1University[3]; ?>" /></td>
      <td><input type="date" name="table1StartDate[]" value="<?php echo $table1StartDate[3]; ?>" /></td>
      <td><input type="date" name="table1EndDate[]" value="<?php echo $table1EndDate[3]; ?>" /></td>
    </tr><tr><td>5</td>
      <td><input type="text" name="table1Country[]" value="<?php echo $table1Country[4]; ?>" /></td>
      <td><input type="text" name="table1University[]" value="<?php echo $table1University[4]; ?>" /></td>
      <td><input type="date" name="table1StartDate[]" value="<?php echo $table1StartDate[4]; ?>" /></td>
      <td><input type="date" name="table1EndDate[]" value="<?php echo $table1EndDate[4]; ?>" /></td>
  </tr></table>
  <br><br>
  Please specify the details for gap periods of more than 1 year:
  <br><br><table>
    <thead>
      <tr>
        <th>Period Start Date</th><th>Period End Date</th><th>Details</th>
      </tr>
    </thead>
    <tr><td><input type="date" name="table2StartDate[]" value="<?php echo $table2StartDate[0]; ?>" /></td>
      <td><input type="date" name="table2EndDate[]" value="<?php echo $table2EndDate[0]; ?>" /></td>
      <td><input type="text" name="table2Details[]" value="<?php echo $table2Details[0]; ?>" /></td>
    </tr><tr><td><input type="date" name="table2StartDate[]" value="<?php echo $table2StartDate[1]; ?>" /></td>
      <td><input type="date" name="table2EndDate[]" value="<?php echo $table2EndDate[1]; ?>" /></td>
      <td><input type="text" name="table2Details[]" value="<?php echo $table2Details[1]; ?>" /></td>
    </tr><tr><td><input type="date" name="table2StartDate[]" value="<?php echo $table2StartDate[2]; ?>" /></td>
      <td><input type="date" name="table2EndDate[]" value="<?php echo $table2EndDate[2]; ?>" /></td>
      <td><input type="text" name="table2Details[]" value="<?php echo $table2Details[2]; ?>" /></td>
  </tr></table>
  <br><br>

  Are you required to take a licensing examination before you can practise as a Nurse/Midwife in the country 
  where you obtained your primary professional qualification?
  <br>
  <input type="radio" name="licenseExam" <?php if (isset($licenseExam) && $licenseExam=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="licenseExam" <?php if (isset($licenseExam) && $licenseExam=="No") echo "checked";?> value="No">No
  <span class="error"> <?php echo $licenseExamErr;?></span>
  <br>
  If "Yes", please provide details:
  <input type="text" name="licenseExamDetails" size="50" value="<?php echo $licenseExamDetails;?>">
  <br><br>
  If licensing examination is required, have you attempted and passed the required examination?
  <br>
  <input type="radio" name="passExam" <?php if (isset($passExam) && $passExam=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="passExam" <?php if (isset($passExam) && $passExam=="No") echo "checked";?> value="No">No
  <span class="error"> <?php echo $passExamErr;?></span>
  <br>
  If "No", please provide details:
  <input type="text" name="notPassExamDetails" size="50" value="<?php echo $notPassExamDetails;?>">
  <br><br><br>

  Postgraduate/Post-registration Nursing/Midwifery Qualifications Obtained:
  <br><table>
    <thead>
      <tr>
        <th>Country</th><th>University/Institution</th><th>Full Name of<br>Qualification</th><th>Abbreviation of<br>Qualification</th>
        <th>Programme Type<br>(Full-time/Part-time)</th><th>Specialty</th><th>Year Conferred<br>(YYYY)</th>
      </tr>
    </thead>
    <tr><td><input type="text" name="table3Country[]" value="<?php echo $table3Country[0]; ?>" /></td>
      <td><input type="text" name="table3University[]" value="<?php echo $table3University[0]; ?>" /></td>
      <td><input type="text" name="table3QualName[]" value="<?php echo $table3QualName[0]; ?>" /></td>
      <td><input type="text" name="table3QualAbbreviate[]" value="<?php echo $table3QualAbbreviate[0]; ?>" /></td>
      <td><input type="text" name="table3ProgType[]" value="<?php echo $table3ProgType[0]; ?>" /></td>
      <td><input type="text" name="table3Specialty[]" value="<?php echo $table3Specialty[0]; ?>" /></td>
      <td><input type="number" name="table3YearConfer[]" value="<?php echo $table3YearConfer[0]; ?>" /></td>
    </tr><tr><td><input type="text" name="table3Country[]" value="<?php echo $table3Country[1]; ?>" /></td>
      <td><input type="text" name="table3University[]" value="<?php echo $table3University[1]; ?>" /></td>
      <td><input type="text" name="table3QualName[]" value="<?php echo $table3QualName[1]; ?>" /></td>
      <td><input type="text" name="table3QualAbbreviate[]" value="<?php echo $table3QualAbbreviate[1]; ?>" /></td>
      <td><input type="text" name="table3ProgType[]" value="<?php echo $table3ProgType[1]; ?>" /></td>
      <td><input type="text" name="table3Specialty[]" value="<?php echo $table3Specialty[1]; ?>" /></td>
      <td><input type="number" name="table3YearConfer[]" value="<?php echo $table3YearConfer[1]; ?>" /></td>
    </tr><tr><td><input type="text" name="table3Country[]" value="<?php echo $table3Country[2]; ?>" /></td>
      <td><input type="text" name="table3University[]" value="<?php echo $table3University[2]; ?>" /></td>
      <td><input type="text" name="table3QualName[]" value="<?php echo $table3QualName[2]; ?>" /></td>
      <td><input type="text" name="table3QualAbbreviate[]" value="<?php echo $table3QualAbbreviate[2]; ?>" /></td>
      <td><input type="text" name="table3ProgType[]" value="<?php echo $table3ProgType[2]; ?>" /></td>
      <td><input type="text" name="table3Specialty[]" value="<?php echo $table3Specialty[2]; ?>" /></td>
      <td><input type="number" name="table3YearConfer[]" value="<?php echo $table3YearConfer[2]; ?>" /></td>
  </tr></table>  
  <br><br>
  Clinical/Housemanship/Internship Experience of Applicant:
  <table>
    <thead>
      <tr>
        <th>Country</th><th>University/Institution</th><th>Department</th><th>Discipline</th>
        <th>Start Date</th><th>End Date</th><th>Total Clinical Practice Hours</th>
      </tr>
    </thead>
    <tr><td><input type="text" name="table4Country[]" value="<?php echo $table4Country[0]; ?>" /></td>
      <td><input type="text" name="table4University[]" value="<?php echo $table4University[0]; ?>" /></td>
      <td><input type="text" name="table4Department[]" value="<?php echo $table4Department[0]; ?>" /></td>
      <td><input type="text" name="table4Discipline[]" value="<?php echo $table4Discipline[0]; ?>" /></td>
      <td><input type="date" name="table4StartDate[]" value="<?php echo $table4StartDate[0]; ?>" /></td>
      <td><input type="date" name="table4EndDate[]" value="<?php echo $table4EndDate[0]; ?>" /></td>
      <td><input type="number" name="table4TotalHours[]" value="<?php echo $table4TotalHours[0]; ?>" /></td>
    </tr><tr><td><input type="text" name="table4Country[]" value="<?php echo $table4Country[1]; ?>" /></td>
      <td><input type="text" name="table4University[]" value="<?php echo $table4University[1]; ?>" /></td>
      <td><input type="text" name="table4Department[]" value="<?php echo $table4Department[1]; ?>" /></td>
      <td><input type="text" name="table4Discipline[]" value="<?php echo $table4Discipline[1]; ?>" /></td>
      <td><input type="date" name="table4StartDate[]" value="<?php echo $table4StartDate[1]; ?>" /></td>
      <td><input type="date" name="table4EndDate[]" value="<?php echo $table4EndDate[1]; ?>" /></td>
      <td><input type="number" name="table4TotalHours[]" value="<?php echo $table4TotalHours[1]; ?>" /></td>
    </tr><tr><td><input type="text" name="table4Country[]" value="<?php echo $table4Country[2]; ?>" /></td>
      <td><input type="text" name="table4University[]" value="<?php echo $table4University[2]; ?>" /></td>
      <td><input type="text" name="table4Department[]" value="<?php echo $table4Department[2]; ?>" /></td>
      <td><input type="text" name="table4Discipline[]" value="<?php echo $table4Discipline[2]; ?>" /></td>
      <td><input type="date" name="table4StartDate[]" value="<?php echo $table4StartDate[2]; ?>" /></td>
      <td><input type="date" name="table4EndDate[]" value="<?php echo $table4EndDate[2]; ?>" /></td>
      <td><input type="number" name="table4TotalHours[]" value="<?php echo $table4TotalHours[2]; ?>" /></td>
  </tr></table>      
  <br><br>
  Work Practice Experience (as a Nurse/Midwife):
  <table>
    <thead>
      <tr>
        <th>Date Joined</th><th>Date Left</th><th>Country</th><th>Name of Institution/Organisation</th>
        <th>Department</th><th>Grade/Designation/<br>Appointment</th><th>Type<br>(Full-time/Part-time)</th><th>If Part-time, Hours per Week</th>
      </tr>
    </thead>
    <tr><td><input type="date" name="table5DateJoin[]" value="<?php echo $table5DateJoin[0]; ?>" /></td>
      <td><input type="date" name="table5DateLeft[]" value="<?php echo $table5DateLeft[0]; ?>" /></td>
      <td><input type="text" name="table5Country[]" value="<?php echo $table5Country[0]; ?>" /></td>
      <td><input type="text" name="table5Organisation[]" value="<?php echo $table5Organisation[0]; ?>" /></td>
      <td><input type="text" name="table5Department[]" value="<?php echo $table5Department[0]; ?>" /></td>
      <td><input type="text" name="table5Designation[]" value="<?php echo $table5Designation[0]; ?>" /></td>
      <td><input type="text" name="table5Type[]" value="<?php echo $table5Type[0]; ?>" /></td>
      <td><input type="number" name="table5PTHours[]" value="<?php echo $table5PTHours[0]; ?>" /></td>
    </tr><tr><td><input type="date" name="table5DateJoin[]" value="<?php echo $table5DateJoin[1]; ?>" /></td>
      <td><input type="date" name="table5DateLeft[]" value="<?php echo $table5DateLeft[1]; ?>" /></td>
      <td><input type="text" name="table5Country[]" value="<?php echo $table5Country[1]; ?>" /></td>
      <td><input type="text" name="table5Organisation[]" value="<?php echo $table5Organisation[1]; ?>" /></td>
      <td><input type="text" name="table5Department[]" value="<?php echo $table5Department[1]; ?>" /></td>
      <td><input type="text" name="table5Designation[]" value="<?php echo $table5Designation[1]; ?>" /></td>
      <td><input type="text" name="table5Type[]" value="<?php echo $table5Type[1]; ?>" /></td>
      <td><input type="number" name="table5PTHours[]" value="<?php echo $table5PTHours[1]; ?>" /></td>
    </tr><tr><td><input type="date" name="table5DateJoin[]" value="<?php echo $table5DateJoin[2]; ?>" /></td>
      <td><input type="date" name="table5DateLeft[]" value="<?php echo $table5DateLeft[2]; ?>" /></td>
      <td><input type="text" name="table5Country[]" value="<?php echo $table5Country[2]; ?>" /></td>
      <td><input type="text" name="table5Organisation[]" value="<?php echo $table5Organisation[2]; ?>" /></td>
      <td><input type="text" name="table5Department[]" value="<?php echo $table5Department[2]; ?>" /></td>
      <td><input type="text" name="table5Designation[]" value="<?php echo $table5Designation[2]; ?>" /></td>
      <td><input type="text" name="table5Type[]" value="<?php echo $table5Type[2]; ?>" /></td>
      <td><input type="number" name="table5PTHours[]" value="<?php echo $table5PTHours[2]; ?>" /></td>
  </tr></table>
  <br><br>
  Please provide details for gap periods of more than 6 months in your work practice experience, if any:
  <br><br><table>
    <thead>
      <tr>
        <th>Period Start Date</th><th>Period End Date</th><th>Details</th>
      </tr>
    </thead>
    <tr><td><input type="date" name="table6StartDate[]" value="<?php echo $table6StartDate[0]; ?>" /></td>
      <td><input type="date" name="table6EndDate[]" value="<?php echo $table6EndDate[0]; ?>" /></td>
      <td><input type="text" name="table6Details[]" value="<?php echo $table6Details[0]; ?>" /></td>
    </tr><tr><td><input type="date" name="table6StartDate[]" value="<?php echo $table6StartDate[1]; ?>" /></td>
      <td><input type="date" name="table6EndDate[]" value="<?php echo $table6EndDate[1]; ?>" /></td>
      <td><input type="text" name="table6Details[]" value="<?php echo $table6Details[1]; ?>" /></td>
    </tr><tr><td><input type="date" name="table6StartDate[]" value="<?php echo $table6StartDate[2]; ?>" /></td>
      <td><input type="date" name="table6EndDate[]" value="<?php echo $table6EndDate[2]; ?>" /></td>
      <td><input type="text" name="table6Details[]" value="<?php echo $table6Details[2]; ?>" /></td>
  </tr></table>
  <br><br>
  Nursing / Midwifery Registration / Licensing Details (obtained outside Singapore):
  <br><br><table>
    <thead>
      <tr>
        <th>Country</th><th>Council/Registration Authority</th><th>Registration Type/Category</th>
        <th>Registration/Licensing Number</th><th>Registration Date</th><th>Current PC Number</th>
        <th>Current PC Start Date</th><th>Current PC End Date</th>
      </tr>
    </thead>
    <tr><td><input type="text" name="table7Country[]" value="<?php echo $table7Country[0]; ?>" /></td>
      <td><input type="text" name="table7Authority[]" value="<?php echo $table7Authority[0]; ?>" /></td>
      <td><input type="text" name="table7Category[]" value="<?php echo $table7Category[0]; ?>" /></td>
      <td><input type="text" name="table7LicenceNum[]" value="<?php echo $table7LicenceNum[0]; ?>" /></td>
      <td><input type="date" name="table7RegisterDate[]" value="<?php echo $table7RegisterDate[0]; ?>" /></td>
      <td><input type="text" name="table7CurrentPCNum[]" value="<?php echo $table7CurrentPCNum[0]; ?>" /></td>
      <td><input type="date" name="table7PCStartDate[]" value="<?php echo $table7PCStartDate[0]; ?>" /></td>
      <td><input type="date" name="table7PCEndDate[]" value="<?php echo $table7PCEndDate[0]; ?>" /></td>
    </tr><tr><td><input type="text" name="table7Country[]" value="<?php echo $table7Country[1]; ?>" /></td>
      <td><input type="text" name="table7Authority[]" value="<?php echo $table7Authority[1]; ?>" /></td>
      <td><input type="text" name="table7Category[]" value="<?php echo $table7Category[1]; ?>" /></td>
      <td><input type="text" name="table7LicenceNum[]" value="<?php echo $table7LicenceNum[1]; ?>" /></td>
      <td><input type="date" name="table7RegisterDate[]" value="<?php echo $table7RegisterDate[1]; ?>" /></td>
      <td><input type="text" name="table7CurrentPCNum[]" value="<?php echo $table7CurrentPCNum[1]; ?>" /></td>
      <td><input type="date" name="table7PCStartDate[]" value="<?php echo $table7PCStartDate[1]; ?>" /></td>
      <td><input type="date" name="table7PCEndDate[]" value="<?php echo $table7PCEndDate[1]; ?>" /></td>
    </tr><tr><td><input type="text" name="table7Country[]" value="<?php echo $table7Country[2]; ?>" /></td>
      <td><input type="text" name="table7Authority[]" value="<?php echo $table7Authority[2]; ?>" /></td>
      <td><input type="text" name="table7Category[]" value="<?php echo $table7Category[2]; ?>" /></td>
      <td><input type="text" name="table7LicenceNum[]" value="<?php echo $table7LicenceNum[2]; ?>" /></td>
      <td><input type="date" name="table7RegisterDate[]" value="<?php echo $table7RegisterDate[2]; ?>" /></td>
      <td><input type="text" name="table7CurrentPCNum[]" value="<?php echo $table7CurrentPCNum[2]; ?>" /></td>
      <td><input type="date" name="table7PCStartDate[]" value="<?php echo $table7PCStartDate[2]; ?>" /></td>
      <td><input type="date" name="table7PCEndDate[]" value="<?php echo $table7PCEndDate[2]; ?>" /></td>
  </tr></table>
  <br><br><br><br>
  
  
  <h3>Employment Details of Applicant</h3>
  <h4>Current (Singapore) Employment Details</h4>
  Activity Status:
  <br><input type="radio" name="activityStatus" <?php if (isset($activityStatus) && $activityStatus=="Working full-time") echo "checked";?> value="Working full-time">Working full-time
  <input type="radio" name="activityStatus" <?php if (isset($activityStatus) && $activityStatus=="Working part-time") echo "checked";?> value="Working part-time">Working part-time
  <input type="radio" name="activityStatus" <?php if (isset($activityStatus) && $activityStatus=="Not Working") echo "checked";?> value="Not Working">Not Working
  <br>
  If "Not Working", please state the reason:
  <input type="text" name="notWorkingReason" value="<?php echo $notWorkingReason;?>">
  <br>
  If "Working Part-Time", please state the number of hours per week:
  <input type="number" name="PTHours" value="<?php echo $PTHours;?>">
  <span class="error"> <?php echo $activityStatusErr;?></span>
  <br><br>
  Appointment:
  <input type="text" name="currentAppt" value="<?php echo $currentAppt;?>">
  <span class="error"> <?php echo $currentApptErr;?></span>
  <br><br>
  Name of Institution/Organisation:
  <input type="text" name="currentOrganisation" value="<?php echo $currentOrganisation;?>">
  <span class="error"> <?php echo $currentOrganisationErr;?></span>
  <br><br>
  Nature of Work:
  <br><input type="radio" name="currentNatureOfWork" <?php if (isset($currentNatureOfWork) && $currentNatureOfWork=="Clinical") echo "checked";?> value="Clinical">Clinical
  <input type="radio" name="currentNatureOfWork" <?php if (isset($currentNatureOfWork) && $currentNatureOfWork=="Teaching/Research") echo "checked";?> value="Teaching/Research">Teaching/Research
  <br><input type="radio" name="currentNatureOfWork" <?php if (isset($currentNatureOfWork) && $currentNatureOfWork=="Others") echo "checked";?> value="Others">Others, specify: 
  <input type="text" name="currentWorkSpecify" value="<?php echo $currentWorkSpecify;?>">
  <span class="error"> <?php echo $currentNatureOfWorkErr;?></span>
  <br><br>
  Department/Division:
  <input type="text" name="currentDepartment" value="<?php echo $currentDepartment;?>">
  <span class="error"> <?php echo $currentDepartmentErr;?></span>
  <br><br>
  Date joined (DD/MM/YYYY):
  <input type="date" name="currentDateJoin" value="<?php echo $currentDateJoin;?>">
  <span class="error"> <?php echo $currentDateJoinErr;?></span>
  <br><br>
  Date left (DD/MM/YYYY):
  <input type="date" name="currentDateLeft" value="<?php echo $currentDateLeft;?>">
  <br><br><br><br>


  <h3>Declarations</h3>
  Have you ever been or are you currently the subject of an inquiry or an investigation by any licensing authority in Singapore or elsewhere 
  involving an allegation of professional misconduct or improper conduct which brings disrepute to the nursing profession?
  <br><input type="radio" name="declaration1" <?php if (isset($declaration1) && $declaration1=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="declaration1" <?php if (isset($declaration1) && $declaration1=="No") echo "checked";?> value="No">No
  <br>If "Yes", please provide full details:
  <br><input type="text" name="declaration1Details" size="100" value="<?php echo $declaration1Details;?>">
  <br><span class="error"> <?php echo $declaration1Err;?></span>
  <br><br>
  Have you ever suffered or are you suffering from any physical or mental illness, 
  which impairs your fitness to practise as a Registered Nurse / Registered Midwife / Enrolled Nurse?
  <br><input type="radio" name="declaration2" <?php if (isset($declaration2) && $declaration2=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="declaration2" <?php if (isset($declaration2) && $declaration2=="No") echo "checked";?> value="No">No
  <br>If "Yes", please provide full details:
  <br><input type="text" name="declaration2Details" size="100" value="<?php echo $declaration2Details;?>">
  <br><span class="error"> <?php echo $declaration2Err;?></span>
  <br><br>
  Have you ever been convicted in Singapore or elsewhere of any offence?
  <br><input type="radio" name="declaration3" <?php if (isset($declaration3) && $declaration3=="Yes") echo "checked";?> value="Yes">Yes
  <input type="radio" name="declaration3" <?php if (isset($declaration3) && $declaration3=="No") echo "checked";?> value="No">No
  <br>If "Yes", please provide full details:
  <br><input type="text" name="declaration3Details" size="100" value="<?php echo $declaration3Details;?>">
  <br><span class="error"> <?php echo $declaration3Err;?></span>
  <br><br>
  <input type="checkbox" name="declaration4[]" 
  <?php if (testCheckBox($declaration4, "declaration4Row1")) echo "checked";?> 
  value="declaration4Row1">
  I declare that the particulars stated in this application and the documents attached are true and authentic, 
  and the information contained herein remains unchanged to date.  To the best of my knowledge and belief, I have not withheld any material fact.
  <br><br>
  <input type="checkbox" name="declaration4[]" 
  <?php if (testCheckBox($declaration4, "declaration4Row2")) echo "checked";?> 
  value="declaration4Row2">
  I acknowledge that the Singapore Nursing Board reserves all rights to withhold and/or to terminate my registration
  and/or take any action it deems fit, if any of the above information or documents tendered is found subsequently to be false.
  I am also aware that it is a criminal offence to make any false statements, to provide any false information and/or document(s)
  to the Singapore Nursing Board.  I also understand and give my consent for the Singapore Nursing Board to make any enquiries 
  or obtain any information and documents that it deems appropriate to establish my fitness to practise.
  <br><br>
  <input type="checkbox" name="declaration4[]" 
  <?php if (testCheckBox($declaration4, "declaration4Row3")) echo "checked";?> 
  value="declaration4Row3">
  I also authorise the Singapore Nursing Board to release the data provided by me, to the Ministry of Health and such other parties
  where the Registrar deems essential for the purpose of their official duties under current legislations.  
  <br><br>
  <span class="error"> <?php echo $declaration4Err;?></span>
  <br><br>
  I agree for my employing hospital/institution:
  <input type="text" name="declaration5" value="<?php echo $declaration5;?>">
  <br>to submit my application for registration/enrolment and all my supporting documents on my behalf (if applicable).
  <br><br><br><br>

  
  <h3>Documents Upload</h3>
  Please collate the following documents in soft copy and upload them one by one.  
  Please ensure that each individual file is less than 5MB in size.  
    
  <ol type="1"><li>Resume/CV 
      <br><input type="file" name="uploadResume" id="uploadResume"></li>
      <span class="error"> <?php echo $uploadResumeErr;?></span>
    <li>Passport 
      <br><input type="file" name="uploadPassport" id="uploadPassport"></li>
      <span class="error"> <?php echo $uploadPassportErr;?></span>
    <li>Marriage Certificate (if applicable) 
      <br><input type="file" name="uploadMarriageCert" id="uploadMarriageCert"></li>
      <span class="error"> <?php echo $uploadMarriageCertErr;?></span>
    <li>Certificate of Registration/Enrolment (Nursing) 
      <br><input type="file" name="uploadRegCert" id="uploadRegCert"></li>
      <span class="error"> <?php echo $uploadRegCertErr;?></span>
    <li>Current Nursing/Practising Licence
      <br><input type="file" name="uploadLicence" id="uploadLicence"></li>
      <span class="error"> <?php echo $uploadLicenceErr;?></span>
    <li>Degree Certificate
      <br><input type="file" name="uploadDegreeCert" id="uploadDegreeCert"></li>
      <span class="error"> <?php echo $uploadDegreeCertErr;?></span>
    <li>Transcripts of Nursing Education (include Theory and Practical hours)
      <br><input type="file" name="uploadTranscript" id="uploadTranscripts"></li>
      <span class="error"> <?php echo $uploadTranscriptErr;?></span>
    <li>Certificate of Service or Work Testimonials (for Working Professionals only), 
      please ensure following details are included (notary translated if not in English):
      <ul><li>Date printed on official letterhead</li>
        <li>Period of Employment</li>
        <li>Department/Unit</li>
        <li>Position held at hospital</li>
        <li>Signed by Chief Nurse/Nursing Director</li>
      </ul><input type="file" name="uploadTestimonial" id="uploadTestimonials">
    </li>
    <span class="error"> <?php echo $uploadTestimonialErr;?></span>
    <li>Original service gap letter written by applicant to explain reasons for break in service (if gap is more than 6 months)
      <br><input type="file" name="uploadGapLetter" id="uploadGapLetter"></li>
      <span class="error"> <?php echo $uploadGapLetterErr;?></span>
    <li>Summary of Related Learning Experience (RLE)
      <br><input type="file" name="uploadRLE" id="uploadRLE"></li>
      <span class="error"> <?php echo $uploadRLEErr;?></span>
  </ol>
  <br>
  <input type="submit" name="submit" value="Acknowledge and Submit"> <br>
</form>

<?php

} else {
  echo "<h3>Thank you for applying to the Singapore Nursing Board. 
    <br><br> Please close your browser window to end this session. </h3>";
}

?>


</body>
</html>