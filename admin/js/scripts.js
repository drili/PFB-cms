// --- Checkboxes (view_all_posts.php) ---

$(document).ready(function(){

    $('#selectAllBoxes').click(function(event){
        if(this.checked) {
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });

});


// --- Loader (admin/index etc) ---
// var div_box = "<div id='load-screen'><div id='loading'></div></div>";
//
// $("body").prepend(div_box);
// $('#load-screen').delay(100).fadeOut(500, function(){
//     $(this).remove();
// });


// --- Users online auto-refresh ---
function loadUserOnline() {
    $.get("functions.php?onlineusers=result", function(data) {
        $(".usersonline").text(data);
    });
}

setInterval(function() {
    loadUserOnline();
}, 500);
