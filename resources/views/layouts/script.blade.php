<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/rescript.min.js') }}"></script>
{{--Add to cart--}}

<script>
    $(document).on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        let product_id = $(this).data('product-id');
        let token = '{{csrf_token()}}';
        let path = '{{route('cart.store')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                _token: token,
            },
            success: function (data) {

                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
{{--Delete product from cart--}}
<script>
    $(document).on('click', '.deleteItem', function (e) {
        e.preventDefault();
        let cart_id = $(this).data('id');
        let token = '{{csrf_token()}}';
        let path = '{{route('cart.delete')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            success: function (data) {
                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
{{-- Update cart --}}
<script>
    $(document).on('click', '.change-qty', function (e) {
        let id = $(this).data('id');
        let productQuantity = $('#qty-input-' + id).val();
        update_cart(id, productQuantity);

    });

    function update_cart(id, productQuantity) {
        let token = "{{csrf_token()}}";
        let path = "{{route('cart.update')}}";

        $.ajax({
            url: path,
            type: "POST",
            data: {
                _token: token,
                product_qty: productQuantity,
                rowId: id,
            },
            success: function (data) {
                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    function render_cart(data) {
        $('body #busket_open').html(data['header']);
        $('body #exampleBusket').html(data['cart_view']);
    }
</script>
<script>
    $(document).on('click', '.add_to_wishlist', function (e) {
        e.preventDefault();
        let product_id = $(this).data('id');

        let token = '{{csrf_token()}}';
        let path = '{{route('wishlist.store')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                _token: token,
            },
            beforeSend: function () {
                $('.add_to_wishlist' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.add_to_wishlist' + product_id).html('<i class="fa fa-heart"></i>');

            },
            success: function (data) {

                // if (data['status'] === true) {
                //     // $('body #header-ajax').html(data['header']);
                //     // $('body #wishlist_counter').html(data['wishlist_count']);
                //     swal({
                //         title: "Good job!",
                //         text: data['message'],
                //         icon: "success",
                //         button: "OK!",
                //     });
                // } else if (data['present']) {
                //     // $('body #header-ajax').html(data['header']);
                //     // $('body #wishlist_counter').html(data['wishlist_count']);
                //     swal({
                //         title: "Opps!",
                //         text: data['message'],
                //         icon: "warning",
                //         button: "OK!",
                //     });
                // } else {
                //     swal({
                //         title: "Sorry!",
                //         text: "You can't add that product",
                //         icon: "error",
                //         button: "OK!",
                //     });
                // }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
<script>

    function generalSumPriceBusked() {
        // -----------------------Подсчет общей суммы---------------------------------------

        let elems = $('.list_cart').children('.lc_item')
        let all_price = 0

        for(let i = 0; i < elems.length; i++) {
            let tmp = $(elems[i]).find('.lwp_price').html().split(' ').join('')

            all_price = parseInt(all_price) + parseInt(tmp)

        }
        // разбиение на масив
        all_price = String(all_price).split('')
        let all_price2 = all_price.splice(2);
        // склеивание
        all_price = all_price.toString() + ' ' + all_price2.toString()
        // превращение в строку удаление запятых
        all_price = all_price.split(',').join('')

        all_price = all_price + ' ₴'
        $('.gp_price').html(all_price);
        // --------------------------------------------------------------
    }

    // удаление товара из корзины
    function removeProductBusked(elem) {
        $(elem).parent('.lwp_top')
            .parent('.lc_wrap_price').parent('.lc_item').remove()

        generalSumPriceBusked()
    }

    // добавить в избрнное в корзине
    function addFavorite(elem) {
        if(!$(elem).hasClass('active')){
            $(elem).addClass('active')
        }

    }

    <!--Изменения значка корзины в карточке товара-->
    function addBusked(elem) {
        $(elem).addClass('add_btn_basket');
        $(elem).find('.icon_basket2').addClass('add_icon_basket');
        $('#exampleBusket').arcticmodal();
    }
    <!--Селект 2-->
    $('#select-sort').select2({
        minimumResultsForSearch: -1
    });

    <!--История заказов, перемещения контента в модальное окно, на странице Истории заказов-->
    function openHistoryOrder(elem) {
        let clone = $(elem).siblings('.content_modal_none').find('.content_modal').clone()
        $('.modalOrder_body').append($(clone));
        $('.box-modalOrder').arcticmodal({
            beforeClose: function(data, el) {
                $('.modalOrder_body').find('.content_modal').remove();
            }
        });
    }

    <!--Открытие закрытие блока заказа, на странице Истории заказов-->
    function openOrder(elem) {
        $(elem).toggleClass('open')
        $(elem).siblings('.lob_content').toggleClass('d-none')
        $(elem).find('.lob_top_center').toggleClass('d-none')
        $(elem).find('.lob_top_right').find('.wrap_img').toggleClass('d-none')
        $(elem).siblings('.repeat_order_btn').toggleClass('d-none')
    }

    <!--Открытие/закрытие блока чекбоксов в фильтрах, на странице Ктегории-->
    function openProperties(elem) {
        $(elem).toggleClass('open')
        $(elem).siblings('.list_properties').toggleClass('open')
    }

    $(function () {
        <!--Открытие меню фильтов на мобилке, на странице Ктегории-->
        $('.btn_filter').click(function(){
            $('body').addClass('catalog_open');
            $('.filter_mobile_left').addClass('open_menu');
        })

        $('.mob_button_menu_personal').click(function(){
            $('body').addClass('catalog_open');
            $('.menu_personal').addClass('open');
        })

        // Закрытие меню фильтовр при клике на пустом месте страницы  на мобилке, на странице Ктегории
        $(document).mouseup( function(e){ // событие клика по веб-документу
            var div = $( ".filter_mobile_left" ); // тут указываем ID элемента
            if ( !div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
                div.removeClass('open_menu');
                $('body').removeClass('catalog_open');
            }
        });

        $(document).mouseup( function(e){ // событие клика по веб-документу
            var div = $( ".menu_personal" ); // тут указываем ID элемента
            if ( !div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
                div.removeClass('open');
                $('body').removeClass('catalog_open');
            }
        });

        // Ползунок для фильтров
        $("#filter__range, #filter__range2").slider({
            min: 0,
            max: 20000,
            values: [5000,15000],
            range: true,
            stop: function(event, ui) {
                $("input#priceMin").val($("#filter__range").slider("values",0));
                $("input#priceMax").val($("#filter__range").slider("values",1));

                $('.price-range-min.value').html($("#filter__range").slider("values",0));
                $('.price-range-max.value').html($("#filter__range").slider("values",1));
            },
            slide: function(event, ui){
                $("input#priceMin").val($("#filter__range").slider("values",0));
                $("input#priceMax").val($("#filter__range").slider("values",1));

                $('.price-range-min.value').html($("#filter__range").slider("values",0));
                $('.price-range-max.value').html($("#filter__range").slider("values",1));
            }
        });

        //Ползунок для фильтров
        $("input#priceMin").on('change', function(){
            var value1=$("input#priceMin").val();
            var value2=$("input#priceMax").val();
            if(parseInt(value1) > parseInt(value2)){
                value1 = value2;
                $("input#priceMin").val(value1);
                $('.price-range-min.value').html(value1);
            }
            $("#filter__range").slider("values", 0, value1);
            $('.price-range-min.value').html(value1);
        });

        //Ползунок для фильтров
        $("input#priceMax").on('change', function(){
            var value1=$("input#priceMin").val();
            var value2=$("input#priceMax").val();
            if (value2 > 20000) { value2 = 20000; $("input#priceMax").val(35000)}
            if(parseInt(value1) > parseInt(value2)){
                value2 = value1;
                $("input#priceMax").val(value2);
                $('.price-range-max.value').html(value2);
            }
            $("#filter__range").slider("values",1,value2);
            $('.price-range-max.value').html(value2);
        });

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + $('#filter__range').slider('values', 0 ) + '</span>');
        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">' + $('#filter__range').slider('values', 1 ) + '</span>');
    });

    //инпут файл в модальном окне отзіва
    function  inpFile(elem) {
        let files = elem.files;
        let str = ''
        if (elem.files && elem.files[0]) {
            if (files.length == 1) {
                str = str + files[0].name
                $('.wf_text').html("Filename " + str);
            } else {
                $('.wf_text').html("Files: " + files.length);
            }
        }
    }

    // Открытие пароля в регистраиции и входе
    function visiblePass(elem) {
        if($(elem).hasClass('visible')) {
            $(elem).removeClass('visible')
            let input = $(elem).siblings('input[type="text"]')
            $(input).attr('type','password');
        } else {
            $(elem).addClass('visible')
            let input = $(elem).siblings('input[type="password"]')
            $(input).attr('type','text');
        }
    }

    // Убрать 1 товар из корзины
    function minusNum(elem) {
        let price = $(elem).parent('.wrap_numeric').parent('.lc_wrap_name')
            .siblings('.lc_wrap_price').find('.lwp_price')

        let price_tovar = $(elem).parent('.wrap_numeric').parent('.lc_wrap_name')
            .siblings('.lc_wrap_price').find('.single_price')

        let general_price = $(price).html();
        price_tovar = $(price_tovar).html();

        let input = $(elem).siblings('.wrap_number_input').find('input')
        var oldValue = parseFloat(input.val());
        if (oldValue <= 1) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;

            general_price = general_price.split(' ').join('')
            price_tovar = price_tovar.split(' ').join('')

            general_price = parseInt(general_price) - parseInt(price_tovar)
            general_price = String(general_price).split('')


            let price_tovar2 = general_price.splice(2);
            general_price = general_price.toString() + ' ' + price_tovar2.toString()
            general_price = general_price.split(',').join('')

            general_price = general_price + ' ₴'
            $(price).html(general_price);
        }
        input.val(newVal);
        input.trigger("change");
        generalSumPriceBusked()
    }

    // Дабвить 1 товар из корзины
    function plusNum(elem) {
        // блок с ценой за все товары этого типа
        let price = $(elem).parent('.wrap_numeric').parent('.lc_wrap_name')
            .siblings('.lc_wrap_price').find('.lwp_price')
        // блок с ценой за 1 товар
        let price_tovar = $(elem).parent('.wrap_numeric').parent('.lc_wrap_name')
            .siblings('.lc_wrap_price').find('.single_price')
        // цена за все товары
        let general_price = $(price).html();
        // цена за 1 товар
        price_tovar = $(price_tovar).html();

        // Убираем все пробелы
        general_price = general_price.split(' ').join('')
        price_tovar = price_tovar.split(' ').join('')

        // подсчет
        general_price = parseInt(general_price) + parseInt(price_tovar)
        // разбиение на масив
        general_price = String(general_price).split('')

        // раздиление масива на 2 части
        let price_tovar2 = general_price.splice(2);
        // склеивание
        general_price = general_price.toString() + ' ' + price_tovar2.toString()
        // превращение в строку удаление запятых
        general_price = general_price.split(',').join('')

        general_price = general_price + ' ₴'
        $(price).html(general_price);

        let input = $(elem).siblings('.wrap_number_input').find('input')
        var oldValue = parseFloat(input.val());

        var newVal = oldValue + 1;

        input.val(newVal);
        input.trigger("change");
        generalSumPriceBusked()
    }

    $(function() {
        // Модальное окно отзіва
        $('.btn_review_js').click(function () {
            $('#exampleComment').arcticmodal();
        })

        //  Модальное окно корзині
        $('.busket_open').click(function () {
            // -----------------------Подсчет общей суммы---------------------------------------

            let elems = $('.list_cart').children('.lc_item')
            let all_price = 0

            for(let i = 0; i < elems.length; i++) {
                let tmp = $(elems[i]).find('.lwp_price').html().split(' ').join('')

                all_price = parseInt(all_price) + parseInt(tmp)

            }
            // разбиение на масив
            all_price = String(all_price).split('')
            let all_price2 = all_price.splice(2);
            // склеивание
            all_price = all_price.toString() + ' ' + all_price2.toString()
            // превращение в строку удаление запятых
            all_price = all_price.split(',').join('')

            all_price = all_price + ' ₴'
            $('.gp_price').html(all_price);
            // --------------------------------------------------------------
            $('#exampleBusket').arcticmodal();

        })

        // маска для телефона
        $(".contact-form__phone").mask("+38(099)-999-99-99");

        // Ховер для бокового меню
        $('.mc_link').hover(function() {
            $('.menu_catalog').addClass('catalog_hover')
        }, function() {
            $('.menu_catalog').removeClass('catalog_hover')
        })

        // Фансибокс на странице Товара
        $('[data-fancybox="modal"]').fancybox({});
        $('.slider_list').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        })

        // Слайдер На странице стравнения товаров
        if($('.comparison_item').length > 2) {
            var mySlider = $(".list_comparison_table")
            var mySlider2 = $('.slider_nav_comparison')
            mySlider2.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                swipe: false,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 570,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
            mySlider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 570,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            })

            mySlider.on('afterChange', function(event, slick, currentSlide, nextSlide){
                mySlider2.slick('slickGoTo', currentSlide)
            })
        }

        //  Модальное окно Регистрации
        $('.open_reg').click(function () {
            $('#exampleModal2').arcticmodal();
        })

        //  Модальное окно Вход
        $('.lc_login').click(function () {
            $.arcticmodal("close");
            $('#exampleModal3').arcticmodal();
        })

        //  Модальное окно Из входа в регистрацию
        $('.lc_reg').click(function () {
            $.arcticmodal("close");
            $('#exampleModal2').arcticmodal();
        })

        //  Модальное окно каталога категорий в мобильном меню
        $('.modal_window').click(function () {
            $('#exampleModal').arcticmodal();
        })

        // Слайдер на странице товара
        $('.slider_product_for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider_product_nav',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        dots: true,
                    }
                }
            ]
        });
        $('.slider_product_nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            vertical: true,
            verticalSwiping: true,
            // adaptiveHeight: true,
            focusOnSelect: true,
            asNavFor: '.slider_product_for',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 4,
                        vertical: false,
                        verticalSwiping: false,
                        adaptiveHeight: false,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 3,
                        vertical: false,
                        verticalSwiping: false,
                        adaptiveHeight: false,
                    }
                }
            ]
        });


        // Валидация форм (Регистрации, входа)
        $("[data-submit]").on("click", function (e) {
            e.preventDefault();
            $(this).parent("form").submit();
        });

        $.validator.addMethod(
            "regex",
            function (value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please check your input."
        );

        // Функция валидации и вывода сообщений

        function valEl(el) {
            el.validate({
                rules: {
                    tel: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    surname: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password : {
                        minlength : 5
                    },
                    password_confirm : {
                        minlength : 5,
                        equalTo : "#password"
                    },
                    login: {
                        required: true,
                    },
                },
                messages: {
                    login: {
                        required: "Введите логин",
                    },
                    tel: {
                        required: "Введите телефон",
                    },
                    name: {
                        required: "Введите имя",
                    },
                    surname: {
                        required: "Введите фамилию",
                    },
                    email: {
                        required: "Введите email",
                        email: "Некоректный email",
                    },
                    password : {
                        minlength : 'Пароль меньше 5 символов'
                    },
                    password_confirm : {
                        minlength : 'Пароль меньше 5 символов',
                        equalTo : "пароли не совпадают"
                    }
                },

                // Начинаем проверку id="" формы
                submitHandler: function (form) {
                    $.arcticmodal('close');
                    var $form = $(form);
                    var $formId = $(form).attr("id");
                    switch ($formId) {
                        case "popupResult":
                            $.arcticmodal("close");
                            $.ajax({
                                type: "POST",
                                url: $form.attr("action"),
                                data: $form.serialize(),
                            })
                            break;
                        case "popupResult3":
                            $.ajax({
                                type: "POST",
                                url: $form.attr("action"),
                                data: $form.serialize(),
                            })
                            break;
                    }
                    return false;
                },
            });
        }

        // Запускаем механизм валидации форм, если у них есть класс .js-form

        $(".js-form").each(function () {
            valEl($(this));
        });

    })
</script>
