// Menu yg didalamnya terdapat sub menu disebut dropdown menu
// Bila a di klik 
$(".menu li > a").click(function(e){
    $(".menu ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),e.stopPropagation()
})

// bila yg membuka kurang dari 768px
$(window).bind("load resize",function(){
    if($(this).width() < 768)
    {
        $(".sidebar-collapse").addClass("collapse");
    } else 
    {
        $(".sidebar-collapse").removeClass("collapse");
        $(".sidebar-collapse").removeAttr("style");
    }
})