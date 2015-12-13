function contentViewModel() {
    var self = this;
    self.view = 'content';
    self.loaded = ko.observable(false);

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
    }
}