var fs = {
    id: {
        pos: "id.0-9",
        neg: "id.9-0"
    },
    name: {
        pos: "name.a-z",
        neg: "name.z-a"
    },
    level: {
        pos: "level.0-9",
        neg: "level.9-0"
    }
};

$(".tbtn").click(function() {
    b = $(this);
    bi = b.find("i");
    if(bi.hasClass("fa-sort-down")) {
        bi.toggleClass("fa-sort-down fa-sort-up");
        bi.closest(".table-table").attr("tfilter", fs[b.attr("fname")]["neg"]);
        getUsersBy();
    }
    else {
        bi.toggleClass("fa-sort-up fa-sort-down");
        bi.closest(".table-table").attr("tfilter", fs[b.attr("fname")]["pos"]);
        getUsersBy();
    }

});
