$(document).ready(function() {
   
});

function loadDataTable(content){
    $.getJSON("exec/buscarQuizzes.php",function (result){
        jarr=result;
        var table = createRows(jarr);
        content.html(table);
    });
}

function createRows(jarr){
    
}