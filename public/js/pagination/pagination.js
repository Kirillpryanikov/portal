/*
**  Handles bootstrap pagination
*   Atributes:
*   - sectionID - string - id of section, where items show or hide
*   - paginationID - string - id of <ul>, where pagination situated
*   - itemsCount - int - number of items to show or hide
 */
function paginationHandler(paginationID, currentPage, totalPages) {
    currentPage = parseInt(currentPage);
    totalPages = parseInt(totalPages);
    $(paginationID).removeClass('collapse');
    var pageButtons = "<li class=\"page-item to-first-page\"><a class=\"page-link\" data-page=\"1\" href=\"/menu/?page=1\" aria-label=\"First\"><span aria-hidden=\"true\">&laquo;</span><span class=\"sr-only\">First</span></a></li>";
    for (var i = 1; i <= totalPages; i++) {
        pageButtons += "<li class=\"page-item\"><a class=\"page-link\" data-page=\""+(i+1)+"\" href=\"/menu/?page="+i+"\">"+(i)+"</a></li>";
    }
    pageButtons += "<li class=\"page-item to-last-page\"><a class=\"page-link\" data-page=\""+(totalPages+2)+"\" href=\"/menu/?page="+totalPages+"\" aria-label=\"Last\"><span aria-hidden=\"true\">&raquo;</span><span class=\"sr-only\">Last</span></a></li>";
    $(paginationID+' ul').html(pageButtons);
    $(paginationID+' ul').find("li:eq("+(+currentPage)+")").addClass('active');
    if (currentPage===1) {$(paginationID+' ul').find("li:eq(0)").addClass('disabled')}
    if (currentPage===totalPages) {$(paginationID+' ul').find("li:eq("+(totalPages+1)+")").addClass('disabled')}
}