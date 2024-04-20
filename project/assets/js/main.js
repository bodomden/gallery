function set(elem) {    
        let data_wht = $(elem).attr('data-wht');
        let data_act = $(elem).attr('data-act');
        let count = $(elem).next().text();
        let id_act = data_wht + data_act;
        let incr;

        if ($(elem).hasClass('fa-regular')) {
            $(elem).removeClass('fa-regular').addClass('fa-solid');
            localStorage.setItem(id_act, data_act);
            increm = 1;
        } else {
            $(elem).removeClass('fa-solid').addClass('fa-regular');
            localStorage.removeItem(id_act);
            increm = -1;
        }
        $.post('/image/status', {
            action: data_act,
            add: increm,
            image_id: data_wht,
        }, function() {});        
        $(elem).next().text(Number(count) + increm);        
};

function chekin() {    
    const re = /\d+/;
    let count = localStorage.length;
    for (let i=0;i<count;i++){
        let id_act = localStorage.key(i);
        let id = re.exec(id_act)[0];
        let act = localStorage.getItem(id_act);
        let elem = $(`i[data-wht="${id}"][data-act="${act}"]`);
        if (elem == null) {
            continue;
        }
        elem.removeClass('fa-regular').addClass('fa-solid');
    }      
}

$(document).ready(function() {
    if ($('.modal').length){
        chekin();
    }
});

$('#bigModal').on('show.bs.modal', function(event) {
        const img_name = $(event.relatedTarget).attr('src');  
        const child = bigModal.querySelector('.modal-body');
        $('.modal-body').html(`<img src="${img_name}" style="width:100%">`); 
})