function c(obj) {
    console.log(obj);
}

var pluginConf = {
    lang: 'en'
};

var swPlugin = new SignWisePlugin(pluginConf);

var homeVM = new homeViewModel();
var profileVM = new profileViewModel();
var contentVM = new contentViewModel();

$(function() {
    ko.applyBindings(homeVM, document.getElementById('home_page'));
    ko.applyBindings(profileVM, document.getElementById('profile_page'));
    ko.applyBindings(contentVM, document.getElementById('content_page'));
    nav.run();
});