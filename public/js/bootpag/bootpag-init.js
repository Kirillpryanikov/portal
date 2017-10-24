function bootpagInit(nav, url, currentPage, totalPages) {
    nav.bootpag({
        total: totalPages,
        page: currentPage,
        maxVisible: 5,
        leaps: true,
        firstLastUse: true,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next-item',
        prevClass: 'prev-item',
        lastClass: 'last-item',
        firstClass: 'first-item'
    }).on("page", function(e, num){
        console.log('num ',num);
        window.location.replace(url+'?page='+num);
    });
    nav.find('ul').children('li').addClass('page-item');
    nav.find('ul').children('li').children('a').addClass('page-link');
}