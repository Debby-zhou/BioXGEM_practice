document.writeln("<div class=\"container-fluid\">");
document.writeln("<nav class=\"navbar navbar-expand-lg navbar-light\">");
document.writeln("<span><a href=\"http://140.113.120.248/summer2021/homework.html\">");
document.writeln("<h2 class=\"logo\">BIOXGEM</h2></a></span>");
document.writeln("<span class=\"drop-down-menu\">");
document.writeln("<ul id=\"dropdown\">");
document.writeln("<li class=\"dropdown-folder\"><a href=\"javascript:void(0)\" onclick=\"showOrHideDropdown();\"><span><i class=\"fas fa-bars\"></i></span></a></li>");
document.writeln("<span class=\"dropdown-list\">");
document.writeln("<li id=\"index\"><a href=\"index.html\">Home</a></li>");
document.writeln("<li id=\"hw1\"><a href=\"hw1.html\">hw1</a></li>");
document.writeln("<li id=\"hw2\"><a href=\"hw2.php\">hw2</a></li>");
document.writeln("<li id=\"hw3\"><a href=\"hw3.php\">hw3</a></li>");
document.writeln("<li id=\"hw4\"><a href=\"hw4.php\">hw4</a></li>");
document.writeln("<li id=\"hw5\"><a href=\"hw5.php\">hw5</a></li>");
document.writeln("<li id=\"hw6\"><a href=\"hw6.php\">hw6&7</a></li>");
document.writeln("<li id=\"hw8\"><a href=\"hw8.php\">hw8</a></li>");
// document.writeln("<li id=\"hw9\"><a href=\"hw9.php\">hw9</a></li>");
document.writeln("<li id=\"project\"><a href=\"project.php\" target=\"_blank\">Project</a></li></span></ul>");
document.writeln("</span>");
document.writeln("</nav><hr></div>");

function unlock() {
    var allAns = document.getElementsByClassName("ans");
        for(var i=0;i<allAns.length;i++){
            allAns[i].style.display = "block";
        }
                
}

function showOrHideDropdown() {
    var dropdown_list = document.getElementsByClassName("dropdown-list");
    switch(dropdown_list[0].style.display){
        case "": //Do not use "none" or it will be passed at twice
            dropdown_list[0].style.display = "block"; 
            break;
        case "block":
            dropdown_list[0].style.display = "";
            break;
        default:
            dropdown_list[0].style.display = "block";
    }
}
window.onload = function(){
    var width = document.body.clientWidth;
    var height = document.body.clientHeight;
    var nav = document.getElementsByTagName("li");
    
    //address and related tabs must be active
    for(var i=0;i<nav.length;i++){
        if(location.href.indexOf(nav[i].id) != -1){
            nav[i].classList.add("active");
            if(i!=0) { nav[0].classList.remove("active"); }
        }
    }
}
    
