function showUser(e) {
    alert(e.innerhtml);
    $("#userpopup").css({display: "block"});
}

function closeUser(e) {
    $("#userpopup").css({display: "none"});
}
