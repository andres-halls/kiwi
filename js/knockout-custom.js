ko.bindingHandlers.select2 = {
    init: function(el, valueAccessor, allBindingsAccessor, viewModel) {
        ko.utils.domNodeDisposal.addDisposeCallback(el, function() {
            $(el).select2('destroy');
        });

        var allBindings = allBindingsAccessor(),
            select2 = ko.unwrap(allBindings.select2);

        $(el).select2(select2);
        if (select2.selectedOptions) {
            $(el).select2('val', select2.selectedOptions);
        }
    },
    update: function (el, valueAccessor, allBindingsAccessor, viewModel) {
        var allBindings = allBindingsAccessor();

        if ("value" in allBindings) {
            if ( ("tags" in valueAccessor()) ) {
                var value = ko.unwrap(allBindings.value);
                if ( typeof value === 'string' ) {
                    value = value.split(',');
                }

                $(el).select2("val", value);
            } else if ( "ajax" in valueAccessor() ) {
                var value = ko.unwrap(allBindings.value);
                if ( typeof value !== 'string' ) {
                    $(el).select2("data", value);
                } else {
                    allBindings.value($(el).select2("data"));
                }
            } else {
                $(el).select2("val", ko.unwrap(allBindings.value));
            }
        } else if ("selectedOptions" in allBindings) {
            var converted = [];
            var textAccessor = function(value) { return value; };
            if ("optionsText" in allBindings) {
                textAccessor = function(value) {
                    var valueAccessor = function (item) { return item; }
                    if ("optionsValue" in allBindings) {
                        valueAccessor = function (item) { return item[allBindings.optionsValue]; }
                    }
                    var options = ko.unwrap(allBindings.options);
                    var items = $.grep(options, function (e) { return valueAccessor(e) == value});
                    if (items.length == 0 || items.length > 1) {
                        return "UNKNOWN";
                    }
                    return items[0][allBindings.optionsText];
                }
            }
            $.each(allBindings.selectedOptions(), function (key, value) {
                converted.push({id: value, text: textAccessor(value)});
            });
            $(el).select2("data", converted);
        }
    }
};