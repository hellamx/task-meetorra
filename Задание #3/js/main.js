$('body').on('click', '#getText', (e) => {
    e.PreventDefault;

    $.ajax({
        url: 'data.php',
        type: 'POST',
        success: (data) => {
            $('.main__block').css('display', 'block');
            $('.main__block').html('<p class="fade">' + data + '</p>');

            $(e.currentTarget).click(() => { $('.main__block').slideUp(300) });
        },
        error: () => {
            console.log('Error');
        }
    });
});