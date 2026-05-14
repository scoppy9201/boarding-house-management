(function($) {
    "use strict";
    $("#batchDelete").jsGrid({
        width: "100%",
        autoload: true,
        confirmDeleting: false,
        paging: true,
        controller: {
            loadData: function() {
                return db.clients;
            }
        },
        fields: [
            { name: "#", type: "number", align:"left", width: 50 },
            { name: "Property Name", align:"left", type: "number", width: 100 },
            { name: "Rates", type: "text", width: 100 },
            { name: "Deposit", type: "text", width: 80 },
            { name: "Type", type: "text", width: 100 },
            { name: "Date", type: "text", width: 100 },
            { name: "Status", type: "text", width: 100 },
            { name: "Amount", type: "text", width: 100 }
        ]
    });
})(jQuery);
