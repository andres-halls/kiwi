<div id="profile_page" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <div class="container">
        <div class="navbar navbar-default">
                <ul class="nav navbar-nav" style="width: 100%;">
                    <li style="margin-top: -5px; float: right;"><a href="#content">News</a></li>
                </ul>
        </div>
        <div class="jumbotron jumbotronINFO">

            <div class="col-md-3" id="profileImage"></div>

            <div class="col-md-3 personInfo">
                <h5 class="profileDescription">COUNTRY</h5>
                <h5 class="profileDescription">NAME</h5>
                <h5 class="profileDescription">SEX</h5>
                <h5 class="profileDescription">DATE OF BIRTH</h5>
            </div>

            <div class="col-md-6 personInfo">
                <h5 class="profileDescription2">ESTONIA</h5>
                <h5 class="profileDescription2" data-bind="text: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName']"></h5>
                <h5 class="profileDescription2" data-bind="text: calcSex">SEX</h5>
                <h5 class="profileDescription2" data-bind="text: homeVM.user_data()['DateOfBirth']"></h5>
            </div>
        </div>

        <div class="jumbotron jumbotronINFO pull-right">
            <!-- ko if: descEditable() -->
            <textarea class="form-control" rows="3" data-bind="textInput: description" style="resize: vertical;"></textarea>
            <!-- /ko -->
            <!-- ko ifnot: descEditable() -->
            <div class="bio" style="white-space: pre-line;" data-bind="text: description"></div>
            <!-- /ko -->
            <br/>
            <div class="btn btn-lg btn-success pull-right" data-bind="click: editButtonClick, text: descEditable() ? 'Save' : 'Edit Description'">Edit Description</div>
        </div>
    </div> <!-- /container -->
</div>