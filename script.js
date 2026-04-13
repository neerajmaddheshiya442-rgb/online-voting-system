console.log("JS loaded - Voting handled by PHP only");

/* ===============================
   REGISTER VALIDATION (optional)
=================================*/
function register() {

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let age = document.getElementById("age").value.trim();
    let address = document.getElementById("address").value.trim();
    let mobile = document.getElementById("mobile").value.trim();
    let password = document.getElementById("password").value.trim();
    let role = document.getElementById("role").value;

    if (name === "" || email === "" || age === "" || address === "" || mobile === "" || password === "") {
        alert("All fields are required!");
        return false;
    }

    if (age < 18) {
        alert("Minimum age is 18!");
        return false;
    }

    if (mobile.length !== 10 || isNaN(mobile)) {
        alert("Enter valid 10-digit mobile number!");
        return false;
    }

    if (password.length < 4) {
        alert("Password too short!");
        return false;
    }

    alert("Form ready to submit!");
    return true;
}

/* ===============================
   LOGIN VALIDATION (optional)
=================================*/
function loginValidate() {

    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    if (email === "" || password === "") {
        alert("Fill all fields!");
        return false;
    }

    return true;
}

/* ===============================
   🚨 VOTING DISABLED HERE
=================================*/

function vote() {
    alert("Voting is handled by PHP system only!");
}