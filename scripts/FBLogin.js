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
        fbUserEmail = response.email;
        fbUserPhone = response.user_mobile_phone;
        console.log(fbUserEmail + ' / ' + fbUserPhone);
        button.style.display = 'block';
        FB.api('/me?fields=id,name,email,permissions', function(response) {
            console.log('Good to see you, ' + response.name + '.');
            console.log('Your mail is ' + response.email);
            console.log(JSON.stringify(response));
        });
        var db = ";

    })
    console.log("Good");
};

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

