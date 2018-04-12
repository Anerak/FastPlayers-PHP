$(".agregar").on("click", function(){
    $(".items input").clone().insertAfter(".items");
});