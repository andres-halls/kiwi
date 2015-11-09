function profileViewModel() {
    var self = this;
    self.view = 'profile';
    self.loaded = ko.observable(false);

    self.descEditable = ko.observable(false);
    self.description = ko.observable('');

    nav.currentView.view.subscribe(function(newView){
        if ( newView == self.view ) {
            if( self.loaded() ){
                //
            } else {
                self.init();
            }
        }
    });

    self.init = function() {
        self.loaded(true);
        $('body').css('overflow', "auto");

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/editProfile.php',
            data: {action: 'get', user_id: homeVM.user_data()['id']}
        }).done(function(result) {
            self.description(result['description']);
        });
    };

    self.calcSex = ko.pureComputed(function() {
        var checkNum = String(homeVM.user_data()['identificationCode']).charAt(0);
        checkNum = Number(checkNum);

        if (checkNum % 2 == 0) {
            return 'Female';
        } else {
            return 'Male';
        }
    });

    self.editButtonClick = function() {
        if (!self.descEditable()) {
            self.descEditable(true);
            return;
        }

        self.descEditable(false);

        $.ajax({
            method: "POST",
            dataType: 'json',
            url: 'modules/editProfile.php',
            data: {action: 'update', user_id: homeVM.user_data()['id'], description: self.description()}
        });
    }
}