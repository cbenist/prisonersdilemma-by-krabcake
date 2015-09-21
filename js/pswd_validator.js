// validator.js
//  And example of input validation using the change and submit events
//  The event handler function for the name text box
function chkAll() {
    var myName = document.getElementById("username");
    var namepos = myName.value.search(/^[A-Za-z0-9]+$/);
    var myEmail = document.getElementById("email");
    var emailpos = myEmail.value.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    
    var secMail = document.getElementById("secemail");
    var myCourse = document.getElementById("course");
    var coursepos = myCourse.value.search(/^\w\w\w\w\s\d\d\d\d$/);
    var mySection = document.getElementById("section");
    var sectpos = mySection.value.search(/^\d\d$/);
    var myYear = document.getElementById("year");
    var yearpos = myYear.value.search(/^\d\d\d\d$/);
    
    
    var init = document.getElementById("initial");
    var sec = document.getElementById("second");
    if (namepos != 0) {
        alert("There was a problem with your request: \n" + "The username you entered (" + myName.value + ") has illegal characters.");
    return false;
  } 
    
        else if (emailpos != 0) {
        alert("There was a problem with your request: \n" + "The email you entered (" + myEmail.value + ") has illegal characters.");
        return false;
    }
    
        else if (myEmail.value != secMail.value) {
        alert("There was a problem with your request: \n" + "The two e-mail addresses you entered are not the same. " + "Please re-enter both.");
        myEmail.focus();
        myEmail.select();
        return false;
    }

        else if (coursepos != 0) {
   alert("There was a problem with your request: \n" + "The course you entered (" + myCourse.value + ") either has illegal characters, is in the wrong format, or does not exist.");
        return false;
  } 
    
    else if (sectionpos != 0) {
   alert("There was a problem with your request: \n" + "The section you entered (" + mySection.value + ") either has illegal characters, is in the wrong format, or does not exist.");
        return false;
    }

        else if (yearpos != 0) {
   alert("There was a problem with your request: \n" + "The year you entered (" + myYear.value + ") either has illegal characters, is in the wrong format, or does not exist.");
    return false;
  } 
    
        else if (init.value == "") {
        alert("There was a problem with your request: \n" + "You did not enter a password. " + "Please enter one now.");
        init.focus();
        return false;
    }

        else if (init.value != sec.value) {
        alert("There was a problem with your request: \n" + "The two passwords you entered are not the same. " + "Please re-enter both.");
        init.focus();
        init.select();
        return false;
    }
    
    else {
        return true;
    }
}
