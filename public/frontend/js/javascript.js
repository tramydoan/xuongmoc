$(window).scroll(function () {
    let header = $('header').height();
    if ($(window).scrollTop() > 20) {
        $('header').addClass('fixed');
    } else {
        $('header').removeClass('fixed');
    }

    /* scroll top */
    if ($('.back-to-top').length > 0 && jQuery(window).scrollTop() > 900) {
        $('.back-to-top').addClass('show');
    } else {
        $('.back-to-top').removeClass('show');
    }
});

//Click event to scroll to top
$(document).on("click", ".back-to-top", function () {
    $(this).removeClass('show');
    $('html, body').animate({
        scrollTop: 0
    }, 800);
});

$('.res-menu').click(function () {
    $(this).toggleClass('active');
    if ($('.menu').attr('data-show') == 0) {
        $('.menu').addClass('active');
        $('.menu').removeClass('noactive');
        $('.menu').attr('data-show', 1);
    } else {
        $('.menu').addClass('noactive');

        setTimeout(function () {
            $('.menu').removeClass('active');
            $('.menu').attr('data-show', 0);
        }, 200)
    }
});

//Toggled Search Nav
$(document).ready(function () {
    $('#site-overlay1').click(function () {
        $('.search-form-wrapper').toggleClass('active');
        $('.search-form-wrapper').focus();
        $('.wrap').removeClass('search-form-open sidebar-move');
        $('#site-overlay1').removeClass('active');
    })
    $('[data-toggle=search-form]').click(function () {
        $('.search-form-wrapper').toggleClass('active');
        $('.search-form-wrapper').focus();
        $('.wrap').toggleClass('search-form-open sidebar-move');
        $('#site-overlay1').addClass('active');
    });
    $('#site-close-handle-search').click(function (event) {
        $('.search-form-wrapper').toggleClass('active');
        $('.search-form-wrapper').focus();
        $('.wrap').toggleClass('search-form-open sidebar-move');
        $('#site-overlay1').removeClass('active');
    });
});

//Toggled Cart Nav
$(document).ready(function () {
    $('#site-overlay2').click(function () {
        $('.cart-form-wrapper').toggleClass('active');
        $('.cart-form-wrapper').focus();
        $('.wrap').removeClass('cart-form-open sidebar-move');
        $('#site-overlay2').removeClass('active');
    })
    $('[data-toggle=cart-form]').click(function () {
        $('.cart-form-wrapper').toggleClass('active');
        $('.cart-form-wrapper').focus();
        $('.wrap').toggleClass('cart-form-open sidebar-move');
        $('#site-overlay2').addClass('active');
    });
    $('#site-close-handle-cart').click(function (event) {
        $('.cart-form-wrapper').toggleClass('active');
        $('.cart-form-wrapper').focus();
        $('.wrap').toggleClass('cart-form-open sidebar-move');
        $('#site-overlay2').removeClass('active');
    });
});

Number.prototype.format = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

$('.delete-cart').on('click', function () {
    var btn = $(this);
    removeCartItem(btn);

});

function removeCartItem(btn) {
    var url = btn.data('url');

    $.ajax({
        url: url,
        type: "get",
        dataType: "text",
        success: function () {
            btn.parent().parent().parent().remove();
            getTotalPrice();
            if ($('.cart-item').length <= 0) {
                $('.table-responsive').html('<div class="col-md-12 col-xs-12 heading-page text-center">\n' +
                    '                <div class="header-page">\n' +
                    '                    <h1>Giỏ hàng của bạn</h1>\n' +
                    '                    <p class="count-cart">Có <span>0 sản phẩm</span> trong giỏ hàng</p>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '            <div class="text-center pb-5">\n' +
                    '                <p class="p-4">Giỏ hàng của bạn đang trống</p>\n' +
                    '                <div class="cart-buttons">\n' +
                    '                    <a class="button dark link-continue hvr-sweep-to-right" href="{{route("xuongmoc.product")}}"\n' +
                    '                       title="Tiếp tục mua hàng"><i\n' +
                    '                            class="fa fa-reply"></i>\n' +
                    '                        Tiếp tục mua hàng\n' +
                    '                    </a>\n' +
                    '                </div>\n' +
                    '            </div>')
            }
        }
    });
}

function qtyplus(btn) {
    var url = btn.data('url');
    $.ajax({
        url: url,
        type: "get",
        dataType: "text",
        success: function () {
        }
    });
}

function qtyminus(btn) {
    var url = btn.data('url');
    $.ajax({
        url: url,
        type: "get",
        dataType: "text",
        success: function () {
        }
    });
}

function getTotalPrice(price, type) {
    var total_price = 0;
    $('.total2').each(function (index, val) {
        total_price += parseFloat(document.getElementsByClassName('total2')[index].value);
    });
    if (type == 'qtyplus') {
        total_price += parseFloat(price);
    } else {
        total_price -= parseFloat(price);
    }
    $('.total_price').html(total_price.format());
}

function updateCart() {
    $('.qtyplus').on('click', function () {
        var btn = $(this);
        var box_qty = btn.parent().parent().parent();
        var inp_product = box_qty.find('.qty-product');
        var inp_total = box_qty.find('.total');
        var inp_total2 = box_qty.find('.total2');
        var inp_price = box_qty.find('.price2');

        if (parseInt(inp_product.val()) < 10) {
            inp_product.val(parseInt(inp_product.val()) + 1);
            getTotalPrice(inp_price.val(), 'qtyplus');
            inp_total.html((inp_price.val() * inp_product.val()).format() + ' VNĐ');
            inp_total2.val(inp_price.val() * inp_product.val() + ' VNĐ');
            qtyplus(btn);
        } else {
            alert('Số lượng sản phẩm không được vượt quá 10');
        }
    });

    $('.qtyminus').on('click', function () {
        var btn = $(this);
        var box_qty = $(this).parent().parent().parent();
        var inp_product = box_qty.find('.qty-product');
        var inp_total = box_qty.find('.total');
        var inp_total2 = box_qty.find('.total2');
        var inp_price = box_qty.find('.price2');
        if (parseInt(inp_product.val()) > 1) {
            inp_product.val(parseInt(inp_product.val()) - 1);
            getTotalPrice(inp_price.val(), 'qtyminus');
            inp_total2.val(inp_price.val() * inp_product.val() + ' VNĐ');
            inp_total.html((inp_price.val() * inp_product.val()).format() + ' VNĐ');
            qtyminus(btn);
        }
    });
}

getTotalPrice(0);
updateCart();

function updateTotalCart() {
    let total_product = 0;
    $('.qty-product').each(function (index, val) {
        total_product += parseFloat(document.getElementsByClassName('qty-product')[index].value);
    });

    $('.total-cart').html(total_product);
}

updateTotalCart();

$('#inputSearchAuto').keyup(function () {
    var btn = $(this);
    var data = btn.val();
    var url = 'http://xuongmochoanghoan.com/ajax-search/' + data;

    if (data != '') {
        $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            success: function (data) {
                var result = data.products.data;
                var html = '';
                if (result.length <= 0) {
                    $('.resultsContent').html("<div class='text-center'>Không có sản phẩm nào...</div>");
                } else {
                    for (i = 0; i < result.length; i++) {
                        html += '<div class="item-ult">\n' +
                            '                        <div class="title">\n' +
                            '                            <a href="http://xuongmochoanghoan.com/chi-tiet-san-pham/' + result[i].slug + '" title="">' + result[i].name + '</a>\n' +
                            '                            <p class="">' + result[i].price.format() + ' vnđ</p>\n' +
                            '                        </div>\n' +
                            '                        <div class="thumbs">\n' +
                            '                            <a href="http://xuongmochoanghoan.com/chi-tiet-san-pham/' + result[i].slug + '" title=""><img src="' + result[i].image + '" alt=""></a>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                    }
                    $('.resultsContent').fadeIn();
                    $('.resultsContent').html(html);
                }
            }
        });
    } else {
        $('.resultsContent').fadeOut();
    }
});

// $('.btn-addtocart').click(function () {
//     $('.cart-form-wrapper').toggleClass('active');
//     $('.cart-form-wrapper').focus();
//     $('.wrap').toggleClass('cart-form-open sidebar-move');
//     $('#site-overlay2').addClass('active');
//
//     var btn = $(this);
//     var data = btn.data('data-action');
//     var url = 'http://xuongmochoanghoan.com/them-vao-gio-hang/' + data;
//
//     $.ajax({
//         url: url,
//         type: "get",
//         dataType: "json",
//         success: function (data) {
//             var result = data.products.data;
//             var html = '';
//             if (result.length <= 0) {
//                 $('.cart-view').html("<p>Hiện chưa có sản phẩm</p>");
//             } else {
//                 for (i = 0; i < result.length; i++) {
//                     html += '<table id="cart-view">\n' +
//                         '                        <tbody>\n' +
//                         '                            <tr class="item_2">\n' +
//                         '                                <td class="img">\n' +
//                         '                                    <a href="">\n' +
//                         '                                        <img src="' + result[i].image + '" alt="">\n' +
//                         '                                    </a>\n' +
//                         '                                </td>\n' +
//                         '                                <td>\n' +
//                         '                                    <div>\n' +
//                         '                                        <a class="pro-title-view" href="">' + result[i].name + '</a>\n' +
//                         '                                        <span class="remove_link remove-cart">\n' +
//                         '                                            \n' +
//                         '                                        </span>\n' +
//                         '                                    </div>\n' +
//                         '                                    <span class="materials">Gỗ lim</span>\n' +
//                         '                                    <div>\n' +
//                         '                                        <span class="pro-quantity-view">' + result[i].qty + '</span>\n' +
//                         '                                        <span class="pro-price-view">' + result[i].price.format() + 'vnđ</span>\n' +
//                         '                                    </div>\n' +
//                         '                                </td>\n' +
//                         '                            </tr>\n' +
//                         '                        </tbody>\n' +
//                         '                    </table>';
//                 }
//                 $('.cart-view').html(html);
//             }
//         }
//     });
//
// })

// Slick Banner Home
$('.banner-home').slick({
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1,
});

// Slick Banner Product
$('.banner-prod').slick({
    dots: true,
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1
});

// Slick Hot Product
$('.slide-prd').slick({
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 4,
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// Slick Partner
$('.slide-partner').slick({
    dots: false,
    arrow: false,
    infinite: true,
    slidesToShow: 6,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 5000,
    pauseOnHover: true,
    cssEase: 'linear',

    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});
