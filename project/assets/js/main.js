function set(elem) {
    
        let data_wht = elem.getAttribute('data-wht');
        let data_act = elem.getAttribute('data-act')
        let count = elem.nextSibling.textContent;
        let id_act = data_wht + data_act;

        if (elem.classList.contains('fa-regular')) {
            elem.classList.replace('fa-regular', 'fa-solid');
            localStorage.setItem(id_act, data_act);
            $.post('/view/change_status.php', {
                action: data_act,
                add: 1,
                image_id: data_wht,
            }, function(data) {});         
            elem.nextSibling.textContent = Number(count) + 1;

        } else {
            elem.classList.replace('fa-solid', 'fa-regular');
            localStorage.removeItem(id_act);
            $.post('/view/change_status.php', {
                action: data_act,
                add: -1,
                image_id: data_wht,
            }, function(data) {});
            elem.nextSibling.textContent = Number(count) - 1;
        }
    };

function chekin() {    

    const re = /\d+/;
    let count = localStorage.length;
    for (let i=0;i<count;i++){
        let id_act = localStorage.key(i);
        let id = re.exec(id_act)[0];
        let act = localStorage.getItem(id_act);
        let elem = jQuery(`i[data-wht="${id}"][data-act="${act}"]`);
        if (elem == null) {
            continue;
        }
        elem.removeClass('fa-regular').addClass('fa-solid');
    }
        
       
}