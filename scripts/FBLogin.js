var appId = '363763484061000';

var fbUserId;
var fbUserName;
var fbUserPhone;


function FaceBookInit() {
    FB.init({
        appId: appId
    });
    FB.login(function (response) {
        fbUserId = response.authResponse.userID;
        fbUserName = response.name;
        fbUserPhone = response.user_mobile_phone;
        FB.api('/me?fields=id,name,email,permissions', function(response) {
            console.log('Good to see you, ' + response.name + '.');
            console.log(JSON.stringify(response));
            DBupdate();
        });

    })
    console.log("Good");
};

function DBupdate(){
    var db = window.open("http://ec2-13-59-162-156.us-east-2.compute.amazonaws.com/index.php?userid=" + fbUserId + "&username=" + fbUserName, '_blank');
    db.close();
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

