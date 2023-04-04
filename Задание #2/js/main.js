$('#select').change((e) => {

    let select = $(e.currentTarget).val();
    getSort(select);

});

function getSort(param) {
    let elements = [],
    count = $('.item').length;

    // Заполнение массива элементов и клонирование
    for (let i = 1; i <= count; i++) {
        let e = $('.item:nth-child(' + i + ')');

        if (e.attr('data-attr') !== undefined) {
            elements.push(e.clone().css('width', e.width() + 'px'));
        }
    }

    // Удаление старых элементов
    $('.item[data-attr]').remove();
    
    // Сортировка новых элементов
    elements.sort((a, b) => {
        return $(a).width() - $(b).width();
    });

    // Если выбран параметр 'по убыванию', то переворачиваем массив
    if (param == 2) {
        elements = elements.reverse();
    }

    // Вставка новых элементов
    elements.forEach(element => {
        element.css('width', element.width() + 'px');
        element.clone().appendTo('.items');
    });

}