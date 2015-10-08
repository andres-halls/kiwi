function c(obj) {
    console.log(obj);
}

var pluginConf = {
    lang: 'en'
};

var swPlugin = new SignWisePlugin(pluginConf);

var homeVM = new homeViewModel();
var profileVM = new profileViewModel();

$(function() {
    ko.applyBindings(homeVM, document.getElementById('home_page'));
    ko.applyBindings(profileVM, document.getElementById('profile_page'));
    nav.run();
});