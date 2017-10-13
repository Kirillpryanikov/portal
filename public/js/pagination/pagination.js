/*
**  Handles bootstrap pagination
*   Atributes:
*   - sectionID - string - id of section, where items show or hide
*   - paginationID - string - id of <ul>, where pagination situated
*   - itemsCount - int - number of items to show or hide
 */
function paginationHandler(sectionID, paginationID, itemsCount) {
    var pagesTotal = (itemsCount%20!=0)?(Math.ceil(itemsCount/20)):(itemsCount/20);
    $(paginationID).removeClass('collapse');
    var pageButtons = "<li class=\"page-item disabled\"><a class=\"page-link\" data-page=\"1\" href=\"#\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span><span class=\"sr-only\">First</span></a></li>";
    for (var i = 0; i < pagesTotal; i++) {
        pageButtons += "<li class=\"page-item "+(i==0?'active':'')+"\"><a class=\"page-link\" data-page=\""+(i+1)+"\" href=\"#\">"+(i+1)+"</a></li>";
    }
    pageButtons += "<li class=\"page-item\"><a class=\"page-link\" data-page=\""+pagesTotal+"\" href=\"#\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span><span class=\"sr-only\">Last</span></a></li>";
    $(paginationID+' ul').html(pageButtons);
    for (i = 0; i < 20; i++) {
        $(sectionID).children(':eq('+i+')').removeClass('collapse');
    }
    $(paginationID+' ul').on('click', 'a', function () {
        $(sectionID).children(':not('+paginationID+')').addClass('collapse');
        $(paginationID+' li').removeClass('active');
        $(paginationID+' li').removeClass('disabled');
        var index = $(this).data('page');
        $(paginationID+' li:eq('+index+')').addClass('active');
        var end = (index*20);
        var start = end-20;
        if (itemsCount < end) {end = itemsCount}
        if (index == 1)          { $(paginationID+' li:first-child').addClass('disabled') }
        if (index == pagesTotal) { $(paginationID+' li:last-child').addClass('disabled') }
        for (i = start; i < end; i++) {
            $(sectionID).children(':eq('+i+')').removeClass('collapse');
        }
    });
}