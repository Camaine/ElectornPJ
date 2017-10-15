var appId = '363763484061000';

var fbUserId;
var fbUserName;
var accesstoken;
var bucket;

function FaceBookInit() {
    FB.init({
        appId: appId
    });
    FB.login(function (response) {
        bucket.config.credentials = new AWS.WebIdentityCredentials({
            ProviderId: 'graph.facebook.com',
            RoleArn: 'arn:aws:iam::186502234717:role/AWSS3facebookRole',
            WebIdentityToken: response.authResponse.accessToken
        });
        accesstoken = response.authResponse.accessToken;
        fbUserId = response.authResponse.userID;
        fbUserName = response.name;
        FB.api('/me?fields=id,first_name,email,accessToken', function(response) {
            console.log('Good to see you, ' + fbUserName + '.');
            console.log(fbUserId + "/" +accesstoken);
            localStorage.setItem("userFBid", fbUserId);
            localStorage.setItem("accessTokenFB", accesstoken);
            DBupdate();
        });

    })
    console.log("Good");
};

function DBupdate(){
    var db = window.open("http://ec2-13-59-162-156.us-east-2.compute.amazonaws.com/index.php?userid=" + fbUserId + "&username=" + fbUserName + "&accesstoken=" + accesstoken, '_blank');
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

