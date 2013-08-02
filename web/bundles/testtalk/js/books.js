$(document).ready(function(){
    add_book();
});
function add_book(){
    $('#form_add').submit(function(e) {
    var url = $(this).attr("action");

    $.ajax({
        type: "POST",
        url: url, // Or your url generator like Routing.generate('discussion_create')
        data: $(this).serialize(),
        dataType: "html",
        success: function(msg){
            msg = $.parseJSON(msg);
            var status = msg.status;
            if(status === "error"){
                alert(msg.message);
            }else{
                //alert(msg.html);
                $("#book_list").html(msg.html);
            }
            //alert(msg.status);
                

        }
    });

    return false;

});
}