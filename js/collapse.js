 function expandAll(){
  $(".collapsible-header").addClass("active");
  $(".collapsible-body").css("display", "block");
}

function collapseAll(){
  $(".collapsible-header").removeClass(function(){
    return "active";
  });
  $(".collapsible-body").css("display", "none");
}