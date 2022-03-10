@extends('layouts.app')

@section('content')
<main class="PA-main">
    <div class="baners bg-Cw">
        <div class="container">
            <ul class="bread-dots">
                <li>
                    <a class="text-r" href=""><i class="text-r icon-home"></i></a>
                </li>
                <li>
                    <i class="text-r icon-arrow"></i>
                    <a class="text-r" href="">Блог</a>
                </li>
                <li>
                    <i class="text-r icon-arrow"></i>
                    <a class="text-r" href="">{{ $blog->title }}</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="date-blog text-r text-r-m">{{ $blog->created_at?->format('d.m.Y') }}</div>
            <div class="pageBlog">
                <article class="pageBlog-aticle">
                    <h3 class="title-i">{{ $blog->title }}</h3>
                    <p class="text-r text-r-l text-r-vh-greey">{!! $blog->text !!}
                    </p>
                </article>
                <div class="side-bar-blog">
                    <h3 class="title-i title-i-m">Последние статьи</h3>
                    <ul class="last-articles">
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/212.webp" type="image/webp"><img src="./img/212.png" alt=""></picture>
                            </a>
                        </li>
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/213.webp" type="image/webp"><img src="./img/213.png" alt=""></picture>
                            </a>
                        </li>
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/214.webp" type="image/webp"><img src="./img/214.png" alt=""></picture>
                            </a>
                        </li>
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/215.webp" type="image/webp"><img src="./img/215.png" alt=""></picture>
                            </a>
                        </li>
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/216.webp" type="image/webp"><img src="./img/216.png" alt=""></picture>
                            </a>
                        </li>
                        <li class="last-articles-item">
                            <a class="link" href="">
                                <picture><source srcset="./img/217.webp" type="image/webp"><img src="./img/217.png" alt=""></picture>
                            </a>
                        </li>
                    </ul>
                    <h3 class="title-i title-i-m">Популярные статьи</h3>
                    <ul class="popular-articles">
                        <li class="popular-articles-item">
                            <a class="link" href="">
                                <h6 class="text-b text-b-xs">Выгодные покупки на SpeedShop:
                                    правила экономии</h6>
                                <p class="text-r text-r-l text-r-vh-greey">Короткое описание состоящие из трех или более
                                    строк. Короткое описание соcтоящие из
                                    трех или более.</p>
                            </a>
                        </li>
                        <li class="popular-articles-item">
                            <a class="link" href="">
                                <h6 class="text-b text-b-xs">Как выбрать товар в магазине техники: простой гайд</h6>
                                <p class="text-r text-r-l text-r-vh-greey">Короткое описание состоящие из трех или более
                                    строк. Короткое описание соcтоящие из
                                    трех или более.</p>
                            </a>
                        </li>
                        <li class="popular-articles-item">
                            <a class="link" href="">
                                <h6 class="text-b text-b-xs">Спрос на мобильные Wi-Fi роутеры
                                    и 4G модемы вырос в 6 раз</h6>
                                <p class="text-r text-r-l text-r-vh-greey">Короткое описание состоящие из трех или более
                                    строк. Короткое описание соcтоящие из
                                    трех или более.</p>
                            </a>
                        </li>
                        <li class="popular-articles-item">
                            <a class="link" href="">
                                <h6 class="text-b text-b-xs">Выгодные покупки на SpeedShop:
                                    правила экономии</h6>
                                <p class="text-r text-r-l text-r-vh-greey">Короткое описание состоящие из трех или более
                                    строк. Короткое описание соcтоящие из
                                    трех или более.</p>
                            </a>
                        </li>
                    </ul>
                    <div class="bg-Cber">
                        <div class="subscribe-blog">
                            <h5 class="subscribe-blog-title text-b text-b-m-serch text-b-darck-blue">Последние новости
                                и популярные статьи</h5>
                            <div class="subscribe-blog-box">
                                <p class="text-r text-r-m">Будь в курсе самых
                                    актуальных новостей</p>
                                <picture><source srcset="./img/logo.webp" type="image/webp"><img src="./img/logo.png" alt=""></picture>
                            </div>
                            <form class="subscribe-blog-form">
                                <input class="form-s-search form-s-search-l" type="email"
                                       placeholder="Введите ваш e-mail">
                                <label class="check option ">
                                    <input class="check__input" type="checkbox">
                                    <span class="check__box"></span>
                                    <span class="text-r text-r-m">Я согласен с политикой конфиденциальности</span>
                                </label>
                                <button class="btn btn-l btn-orange">Подписаться</button>
                            </form>
                            <picture><source srcset="./img/subscribe1.webp" type="image/webp"><img src="./img/subscribe1.png" alt=""></picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
