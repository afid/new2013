$(document).ready(function(){
	/*alert("Hello World!");*/
});

// Aligne le pied de page toujours en bas de page
$(window).bind("load", function() { 
 var footerHeight = 0,
 footerTop = 0,
 $toolbar = $("#toolbar");
 $header = $("header");
 $footer = $("#footer");

 positionFooter();

 function positionFooter() {
  toolbarHeight = $toolbar.height();
  headerHeight = $header.height();
  footerHeight = $footer.height();
   if (($(window).scrollTop()+$(window).height()-footerHeight)<200){
    footerTop="600px";
   } else {
    footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
   }
   if ( ($(document.body).height()+footerHeight) < $(window).height()) {
    $footer.css({
     position: "absolute",
     top: footerTop
    })
   } else {
    $footer.css({
    position: "relative",
    })
   }
 }
 $(window)
 .scroll(positionFooter)
 .resize(positionFooter)
               
});