describe("init.js tests", function() {
    it("jQuery loaded", function() {
        expect(jQuery).toBeDefined();
        expect(jQuery).not.toBeNull();
    });

    it("Knockout loaded", function() {
        expect(ko).toBeDefined();
        expect(ko).not.toBeNull();
    });

    it("SignWise plugin configured to use English", function() {
        expect(pluginConf).toEqual({lang: 'en'});
    });

    it("SignWise plugin initialized", function() {
        expect(swPlugin).toBeDefined();
        expect(swPlugin).not.toBeNull();
    });
    it("Sammy loaded", function() {
        expect(Sammy).toBeDefined();
        expect(Sammy).not.toBeNull();
    });

    it("Sammy nav object initialized", function() {
        expect(nav).toBeDefined();
        expect(nav).not.toBeNull();
    });
    it("Home ViewModel initialized", function() {
        expect(homeVM).toBeDefined();
        expect(homeVM).not.toBeNull();
    });

    it("Profile ViewModel initialized", function() {
        expect(profileVM).toBeDefined();
        expect(profileVM).not.toBeNull();
    });
});