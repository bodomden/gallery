// изменение статусов изображения

function changeStatus(elem) {    
        let image_id = $(elem).attr('data-wht');
        let action = $(elem).attr('data-act');
        let count = $(elem).next().text();
        let id_act = image_id + action;
        let incr;

        if ($(elem).hasClass('fa-regular')) {
            $(elem).removeClass('fa-regular').addClass('fa-solid');
            localStorage.setItem(id_act, action);
            incr = 1;
        } else {
            $(elem).removeClass('fa-solid').addClass('fa-regular');
            localStorage.removeItem(id_act);
            incr = -1;
        }       
        saveStatus(action, incr, image_id);
        $(elem).next().text(Number(count) + incr);
};

function saveStatus(action, incr, image_id){
    $.post('/image', {
        _method: 'PATCH',
        action: action,
        add: incr,
        image_id: image_id,
    }, function() {}); 
    
}

$(document).ready(function() {
    if ($('.modal').length){
        loadStatus();
    }
    $('ol li:nth-last-child(1) > a').addClass('non-a');
});

// чтение статусов изображения на странице альбома

function loadStatus() {    
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

//модальное окно изображения

$('#bigModal').on('show.bs.modal', function(event) {
        const img_name = $(event.relatedTarget).attr('src'); 
        $('#bigModal .modal-body').html(`<img src="${img_name}" style="width:100%">`); 
})

// модальное окно комментарии

$('#commentModal').on('show.bs.modal', function(event) {
    let elem = $(event.relatedTarget);
    let count = elem.next().text();
    $(".comments").empty();
    $("#loading").show();
    let image_id = elem.attr('data-wht');
    getComments(image_id);
    addComment(image_id, count, elem);     
})

$('#commentModal').on('hide.bs.modal', function() {  
    let form =  $("#commentForm");
    form[0].reset();
    form.off('submit');
});

function getComments(image_id) {       
    $.ajax({
        url: `/image/${image_id}`,
        success: function(data) {
            let response = $.parseJSON(data);
            $("#loading").hide(); 
            if (response.comments[0]) {                
                for (comment_obj of response.comments){
                    $(".comments").prepend(`<p>${comment_obj.comment}</p>`);
                }
            } else {
                $(".comments").prepend('<p id="pass">There are no comments yet.</p>');
            }                     
        }
    });
}

function addComment(image_id, count, elem){            
    $("#commentForm").on('submit', function(event) {
        $("#pass").remove();
        $(".comments").prepend(`<p>${$("#comment").val()}</p>`);   
        let formData = new FormData($('#commentForm')[0]);        
        $("#commentForm")[0].reset();
        formData.append("image_id", image_id);     
        event.preventDefault();        
        $.ajax({
            url: '/comment',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function() {
                saveStatus('comment', 1, image_id);                
                elem.next().text(Number(count)+1);
                count++;
            }
          });
    });
}

// проверка файла на изображение

$("#imageform").submit(function(event) {   
    event.preventDefault();
    formData = new FormData($('#imageform' )[0]);
    $.ajax({
        url: '/image',
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            let response = $.parseJSON(data);
            if (response.url){
                window.location = response.url;
            } else {
                $("#err").text(response.err);
            }            
        }
      });
});
