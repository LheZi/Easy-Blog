// 侧边栏显示与隐藏
$('.open').click(function (e) {
    $('.sidebar').css('left', 0);
    $('.opc').css('display', 'block')
    $(document).one("click", function () {
        $(".sidebar").css('left', '-250px');
        $('.opc').css('display', 'none')
    });
    e.stopPropagation();
})

$('.close').click(function (e) {
    $(".sidebar").css('left', '-250px');
    $('.opc').css('display', 'none');
    e.stopPropagation();
});

$('.sidebar').click(function (e) {
    e.stopPropagation();
});

// 搜索显示与隐藏
$('.search-m').click(function (e) {
    $('.search-m-box').css('top', 0);
    $('.opc').css('display', 'block')
    $(document).one("click", function () {
        $(".search-m-box").css('top', '-100px');
        $('.opc').css('display', 'none')
    });
    e.stopPropagation();
})

$('.search-m-box').click(function (e) {
    e.stopPropagation();
});