var appId = '363763484061000';

var fbUserId;
var fbUserEmail;
var fbUserPhone;


function FaceBookInit() {
    FB.init({
        appId: appId
    });
    FB.login(function (response) {
        fbUserId = response.authResponse.userID;
        fbUserEmail = response.name;
        fbUserPhone = response.user_mobile_phone;
        console.log(fbUserEmail + ' / ' + fbUserPhone);
        FB.api('/me?fields=id,name,email,permissions', function(response) {
            console.log('Good to see you, ' + response.name + '.');
            console.log('Your mail is ' + response.email);
            console.log(JSON.stringify(response));
            DBupdate();
        });

    })
    console.log("Good");
};

function DBupdate(){
    var db = "<?php\n" +
        "          $db = mysqli_connect(\"myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com\", \"juwonkim\", \"5gkrsus5qks\", \"records\");\n" +
        "          if($db){\n" +
        "            echo \"connect : success<br>\";\n" +
        "          }\n" +
        "          else{\n" +
        "            echo \"disconnect : fail<br>\";\n" +
        "          }\n" +
        "          $UserID = \"<script>document.write(fbUserId);<//script>\";\n"+
        " $UserName = '<script>document.write(fbUserEmail);<//script>\';\n"+
        " mysqli_query($db, \"INSERT INTO LOG(id,email) VALUES($UserID, $UserName)\");\n"+
        " mysqli_close($db);\n"+
        " ?>"
    console.log(db);
}

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


/*!
 * Login to your application using Facebook.
 * Uses the Facebook SDK for JavaScript available here:
 * https://developers.facebook.com/docs/javascript/quickstart/
 */

