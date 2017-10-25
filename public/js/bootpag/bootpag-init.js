function bootpagInit(nav, url, currentPage, totalPages) {
    nav.bootpag({
        total: totalPages,
        page: currentPage,
        maxVisible: 5,
        leaps: true,
        firstLastUse: false,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next-item',
        prevClass: 'prev-item',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(e, num){
        window.location.replace(url+'?page='+num);
    });
    nav.find('ul').children('li').addClass('page-item');
    nav.find('ul').children('li').children('a').addClass('page-link');
}