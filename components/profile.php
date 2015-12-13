<div id="profile_page" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <div class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav" style="width: 100%;">
                <li style="width: 80%;">
                    <input type="hidden" style="width: 100%;" class="select2 ajax"
                           data-bind="
                            select2: {
                                minimumInputLength: 2,
                                ajax: {
                                    url: 'modules/search.php',
                                    type: 'post',
                                    dataType: 'json',
                                    quietMillis: 200,
                                    data: function(term) {
                                        return {
                                            names: term,
                                            user_id: homeVM.user_data()['id']
                                        };
                                    },
                                    results: function(data) {
                                        if (!data) return { results: [] };

                                        return {
                                            results: data
                                        };
                                    }
                                },
                                formatResult: function (item) {
                                    return '<div style=\x22padding: 10px;\x22>' + item.text +
                                    '<i class=\x22glyphicon glyphicon-plus pull-right\x22></i>' + '</div>';
                                },
                                formatSelection: function (item) {
                                    $($element).select2('val', '');
                                    return '';
                                },
                                initSelection: function (element, callback) {
                                    callback(element.select2('data'));
                                },
                                escapeMarkup: function(m) { return m; }
                            },
                            event: { change: addFriend }
                        ">
                    </input>
                </li>
                <li style="margin-top: -5px; float: right;"><a href="#content">News</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
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



        <hr>
        <br>
        <br>
        <div class="row">
        <div class="col-md-6" id="connectionsBox">
            <div class="jumbotron">

                <h3>Connections:</h3><br/>
                <table class="table table-bordered table-hover">
                    <tbody data-bind="foreach: friends">
                        <tr>
                            <td data-bind="text: name"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <?php require('chat.php'); ?>
        </div>


    </div> <!-- /container -->
</div>