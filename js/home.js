function homeViewModel() {
    var self = this;
    self.view = '#';
    self.loaded = ko.observable(true);
    self.auth_done = ko.observable(false);
    self.user_data = ko.observable();

    self.smartCardAuth = function() {
        function displaySmartCardError(err) {
            document.getElementById("smart_card_auth_result").innerHTML = err;
        }
        swPlugin.getAuthCertificates(function(err, result) {
            if (err) {
                console.log('Error reading authentication certificates', err);
                displaySmartCardError('Error reading authentication certificates' + JSON.stringify(err));
                return;
            }
            //console.log('Authentication certificates', result);
            var certificate = result[0];

            var challenge = document.getElementById("smart_card_auth_challenge").value;
            swPlugin.authenticate(challenge, function(err, result) {
                if (err) {
                    console.log('Error authenticating', err);
                    displaySmartCardError('Error authenticating' + JSON.stringify(err));
                    return;
                }
                console.log('Authentication successful', result);
                // Challenge was successfully signed, now we must verify the signature server-side.
                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: 'modules/signwise/smart_card_auth.php',
                    data: {certificate: certificate, signature: result}
                }).done(function(result) {
                    self.auth_done(true);
                    self.user_data(result);
                    c(result);
                    location.hash = 'profile';
                });
            });
        });
    }

    self.login = function() {
        self.smartCardAuth();
    }
}