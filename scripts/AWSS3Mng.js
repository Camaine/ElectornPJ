var appId = '363763484061000';
var roleArn = 'arn:aws:iam::186502234717:role/AWSS3facebookRole';
var bucketName = 'itms444juwon';
AWS.config.region = 'us-west-2';

var fbUserId;
var fbUserEmail;
var fbUserPhone;

var bucket = new AWS.S3({
    params: {
        Bucket: bucketName
    }
});

var fileChooser = document.getElementById('file-chooser');
var button = document.getElementById('upload-button');
var Loginbtn = document.getElementById('LoginBtn');
var results = document.getElementById('results');

Loginbtn.addEventListener('click', function () {
    FaceBookInit();
}, false);

button.addEventListener('click', function () {
    var file = fileChooser.files[0];
    if (file) {
        results.innerHTML = '';
        //Object key will be facebook-USERID#/FILE_NAME
        var objKey = 'facebook-' + fbUserId + '/' + file.name;
        var params = {
            Key: objKey,
            ContentType: file.type,
            Body: file,
            ACL: 'public-read'
        };

        bucket.putObject(params, function (err, data) {
            if (err) {
                results.innerHTML = 'ERROR: ' + err;
            } else {
                listObjs();
            }
        });
    } else {
        results.innerHTML = 'Nothing to upload.';
    }
}, false);

function listObjs() {
    var prefix = 'facebook-' + fbUserId;
    bucket.listObjects({
        Prefix: prefix
    }, function (err, data) {
        if (err) {
            results.innerHTML = 'ERROR: ' + err;
        } else {
            var objKeys = "";
            data.Contents.forEach(function (obj) {
                objKeys += obj.Key + "<br>";
            });
            results.innerHTML = objKeys;
        }
    });
}

