describe("nav.js tests", function() {
    beforeEach(function() {
        nav.run();
    });

    it("Index route test", function () {
        expect(nav.currentView.view()).toEqual('#');
    });

    it("Route change test", function () {
        nav.runRoute('get', '#some-route');
        expect(nav.currentView.view()).toEqual('some-route');
    });
});