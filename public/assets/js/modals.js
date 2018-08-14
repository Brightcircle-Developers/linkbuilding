var modalField;

var modals = [];

function displayModals() {
    for(var i = 0; i < modals.length; i++) {
        switch(modals[i].type) {
            default:
            case 'notice':
                var modalStyle = "notice";
                break;

            case 'error':
                var modalStyle = "error";
                break;

            case 'alert':
                var modalStyle = "alert";
                break;
        }

        var modalOut = '<div class="modal '+modalStyle+'" id="'+modals[i].name+'"><div class="modal-inner"><div class="modal-top">'+modals[i].title+'</div><div class="modal-bottom">'+modals[i].message+'</div></div></div>';

        modalField.insertAdjacentHTML("afterbegin", modalOut);
        destroyModal(modals[i].name, modals[i].displayTime);
    }
}

function destroyModal(modalName, modalDisplayTime) {
    var modalDOM = document.getElementById(modalName);
    setTimeout(function() {
        modalDOM.style.opacity = 0;
        setTimeout(function() {
            modalField.removeChild(modalDOM);
        }, 1000);
    }, (modalDisplayTime * 1000));
}

function addModal(title, name, type, displayTime, message) {
    modals.push({
        title: title,
        name: name,
        type: type,
        displayTime: displayTime,
        message: message
    });
    modalField = document.getElementById('page_modals');
    displayModals();
}
