var nav = Sammy(function()
{
    var self = this;
    self.currentView = {
        view: ko.observable('')
    };

    self.get('#:view', function() {
        self.currentView.view(this.params.view);
    });

    self.get('', function() {
        $('body').css('overflow', "hidden");
        self.currentView.view('#');
    });

});