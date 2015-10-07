<div id="profile_page" style="padding: 20px;" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <h1>Auth successful!</h1>
    <h1>NAME: <span data-bind="text: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName']"></span></h1>
    <h1>DATE OF BIRTH: <span data-bind="text: homeVM.user_data()['DateOfBirth']"></span></h1>
</div>