<?php
require "../lib/commonphp.php";

// Load template
require_once "../lib/head.php";
$cssArr = ["contactStyle","headerandfooter","formvalidation","cookies"];
$fileTitle = "Contact Us";
callCSSfile($cssArr, $fileTitle);
require_once "../lib/header.php";
?>
<main id="mainReg">
    <!--Contact Form-->
    <section id="allFormCont">
        <h1>Contact Us</h1>
        <form id="signInForm" action="success.php" onsubmit="return contactValidation();">
            <label>
                <h3>Contact purpose</h3>
            </label>
            <select id="type" name="type">
                <option value="1">Lease</option>
                <option value="2">Feedback</option>
                <option value="3">Employment</option>
            </select>
            <label for="txtEmail">
                <h3>Email:</h3>
            </label>
            <input type="text" id="txtEmail" name="fName" required>
            <ul class="errCont" id="ulEmail"></ul>
            <label for="txtUserName">
                <h3>Full Name:</h3>
            </label>
            <input type="text" id="txtUserName" name="lName" required>
            <ul class="errCont" id="ulName"></ul>
            <label for="address">
                <h3>Address:</h3>
            </label>
            <input type="text" id="address" name="address">
            <label for="txtPhone">
                <h3>Phone Number:</h3>
            </label>
            <input type="text" id="txtPhone" name="rPhoneNvm" required>
            <ul class="errCont" id="ulPhone"></ul>
            <h3>Preferred contact method:</h3>
            <div class=radio>
                <input type="radio" id="prePhone" name="pre" value="prePhone" class=radioInput>
                <label for="prePhone" class=radioLabel>PHONE</label>
                <input type="radio" id="preEmail" name="pre" value="premail" class=radioInput>
                <label for="preEmail" class=radioLabel>EMAIL</label>
            </div>
            <ul class="errCont" id="ulContactMethod"></ul>
            <label for="contactDay">
                <h3>Contact days</h3>
            </label>
            <div class=checkbox>
                <input type="checkbox" id="day1" name="contactDay" value="Mon" class="checkboxInput">
                <label for="day1" class=checkboxLabel> Monday</label>
                <input type="checkbox" id="day2" name="contactDay" value="Tue" class="checkboxInput">
                <label for="day2" class=checkboxLabel> Tuesday</label>
                <input type="checkbox" id="day3" name="contactDay" value="Wed" class="checkboxInput">
                <label for="day3" class=checkboxLabel> Wednesday</label>
                <input type="checkbox" id="day4" name="contactDay" value="Thu" class="checkboxInput">
                <label for="day4" class=checkboxLabel> Thursday</label>
            </div>
            <div class=checkbox>
                <input type="checkbox" id="day5" name="contactDay" value="Fri" class="checkboxInput">
                <label for="day5" class=checkboxLabel> Friday</label>
                <input type="checkbox" id="day6" name="contactDay" value="Sat" class="checkboxInput">
                <label for="day6" class=checkboxLabel> Saturday</label>
                <input type="checkbox" id="day7" name="contactDay" value="Sun" class="checkboxInput">
                <label for="day7" class=checkboxLabel> Sunday</label>
            </div>
            <ul class="errCont" id="ulDay"></ul>
            <label for="mess">
                <h3>Message</h3>
            </label>
            <textarea id="mess" name="Message" placeholder="Leave Us A Message!"></textarea>
            <div id="my-textarea-remaining-char"></div>
            <ul class="errCont" id="ulTxtArea"></ul>
            <!--Below Btn-->
            <div id="submitBtnCont">
                <input type="reset" value="Clear" />
                <input type="submit" value="Register" />
            </div>
        </form>
    </section>
</main>
<?php
    require_once "../lib/cookie.php";
    require_once "../lib/footer.php";
    require_once "../lib/script.php";
    $jsArr = ["cookies","formvalidation","contact"];
    callJSfile($jsArr);       
?>