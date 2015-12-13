<div id="chat_module" class="col-sm-6 chatBox">
    <!-- Chatbox -->

        <div class="containerChatbox">
            <div class="header">
                <h2>Messages</h2>
                <!--                    <a href="#" title="Add Friend to this chat">+</a>-->
            </div>
            <div class="chat-box" style="max-height: 300px; overflow: auto;">
                <!-- ko foreach: chatMessages -->
                    <!-- ko template: { name: 'chat_message', data: $data } --><!-- /ko -->
                <!-- /ko -->
                <div class="enter-message">
                    <form action="#profile" data-bind="submit: sendMessage">
                        <input type="text" placeholder="Enter your message.." data-bind="textInput: currentMessage"/>
                        <a type="submit" href="#profile" class="send" data-bind="click: sendMessage">Send</a>
                    </form>
                </div>
            </div>
        </div>
    <!-- Chatbox end -->
</div>