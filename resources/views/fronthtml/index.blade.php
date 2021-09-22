<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>杨青青个人博客</title>
    <link href="../front/css/base.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/nav.js"></script>
</head>
<body>
<header>
    <div class="touxiang"><i><img src="../front/images/yangqq.png" alt="杨青青"></i>
        <h2>杨青青</h2>
        <p>一个爱好前端设计的80后女站长。</p>
    </div>
    <p class="guanzhu">关注我<img src="images/wx.png" alt="杨青青个人微信号：476847113" class="weixin"></p>
    <nav>
        <ul>
            <li><a href="../front/index.html">网站首页</a></li>
            <li><a href="../front/sysy.html">碎言碎语</a></li>
            <li><a href="../front/bkrj.html">博客日记</a></li>
            <li><a href="../front/wdxc.html">我的相册</a></li>
            <li><a href="../front/sjz.html">时间轴</a></li>
            <li><a href="../front/gybz.html">关于博主</a></li>
            <li><a href="../front/ly.html">留言</a></li>
        </ul>
    </nav>
</header>
<!--header end-->
<main>
    <article>
        <!--top_blog 置顶文章 begin-->
{{--        <div class="top_blog">--}}
{{--            <ul class="blogs">--}}
{{--                @foreach($topData as $k => $v)--}}
{{--                    <li><a href="{{ 'articleDetail'}}?a_id={{$v['a_id']}}" target="_blank"><i><img--}}
{{--                                    src="../front/images/001.jpg" alt="标题图片"></i>--}}
{{--                            <h2>{{ $v['a_title'] }}</h2>--}}
{{--                        </a>--}}
{{--                        <p class="blog_smalltext">{{$v['a_id']}}</p>--}}
{{--                        <p class="blog_info"><span>{{$v['update_at']}}</span><span>杨青青</span><span><a href="/"--}}
{{--                                                                                                      target="_blank">博客人生</a></span><span>{{$v['click']}}</span><span>1200</span>--}}
{{--                        </p>--}}
{{--                        <p>1</p>--}}
{{--                    </li>--}}
{{--            @endforeach--}}

{{--        </div>--}}
        <!--top_blog 置顶文章 end-->

        <!--new_blog 最新文章 begin-->
        <div class="new_blog">
            <ul class="blogs">
                @foreach($normalData as $k => $v)
                    <li><a href="{{ 'articleDetail'}}?a_id={{$v['a_id']}}" target="_blank"><i><img
                                    src="../front/images/004.jpg" alt="标题图片"></i>
                            <h2>{{ $v['a_title'] }}</h2>
                        </a>
                        <p class="blog_smalltext">{{$v['a_id']}}</p>
                        <p class="blog_info"><span>{{$v['update_at']}}</span><span>杨青青</span><span><a href="/"
                                                                                                      target="_blank">博客人生</a></span><span>{{$v['click']}}</span><span>1200</span>
                        </p>
                        <p>{{ ($normalData->currentPage()-1)*$normalData->perPage()+$loop->iteration}}</p>
                    </li>
                @endforeach
            </ul>

        </div>
    {{ $normalData->links() }}
    <!--new_blog 最新文章 end-->

    </article>
    <!--article end-->

    <aside>
        <div class="search">
            <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
                <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词"
                       style="color: rgb(153, 153, 153);"
                       onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}"
                       onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
                <input name="show" value="title" type="hidden">
                <input name="tempid" value="1" type="hidden">
                <input name="tbname" value="news" type="hidden">
                <input name="Submit" class="input_submit" value="搜索" type="submit">
            </form>
        </div>
        <div class="xinqing">
            <h2 class="aside_title">最近心情</h2>
            <ul>
                <li><a href="/" target="_blank">阳光正好，趁现在还年轻，去做的你想做的，去追逐你的梦想。</a></li>
                <li><a href="/" target="_blank">不要完全依赖一个人，要学会自己独立行走，否则当你失去那个人的时候，你也失去了自我，无论是感情还是物质。</a></li>
                <li><a href="/" target="_blank">永远不要为尚未发生的事纠结，尽最大的努力，抱最坏的打算。但行好事，莫问前程。</a></li>
                <li><a href="/" target="_blank">努力是一种生活态度，与年龄无关。所以，无论什么时候，千万不可放纵自己，给自己找懒散和拖延的借口。</a></li>
                <li><a href="/" target="_blank">这个世界的改变不是一个人做了很多，而是大多数人做了一点点。正是因为大多数人做的这一点点，才让人间变得越来越温暖和值得。</a></li>
                <li><a href="/" target="_blank">不是每个人都能成为，自己想要的样子，但每个人，都可以努力，成为自己想要的样子。</a></li>
            </ul>
        </div>
        <div class="pics">
            <h2 class="aside_title">我的相册</h2>
            <ul>
                <li><a href="/" target="_blank"><img src="../front/images/001.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/002.png"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/003.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/004.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/005.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/006.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/002.png"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/003.jpg"></a></li>
                <li><a href="/" target="_blank"><img src="../front/images/004.jpg"></a></li>
            </ul>
        </div>
        <div class="paihang">
            <h2 class="aside_title">点击排行</h2>
            <ol start="1">
                <li><a href="/" target="_blank">每个人的生命里都一定会有这么一个人，他告诉我们什么是爱</a></li>
                <li><a href="/" target="_blank">人生就是越努力越幸运！</a></li>
                <li><a href="/" target="_blank">『旅行游记』假如你厌倦了现状,那就去云南吧</a></li>
                <li><a href="/" target="_blank">追梦路上邂逅爱情,他们携手改写平凡人生!</a></li>
                <li><a href="/" target="_blank">遇见你,是我平凡人生中最美的事情</a></li>
                <li><a href="/" target="_blank">2020:努力工作,向生活重新出发!</a></li>
                <li><a href="/" target="_blank">因为爱情,让这座城市无可替代</a></li>
                <li><a href="/" target="_blank">世界上最永恒的幸福就是平凡，人生中最长久的拥有就是珍惜。</a></li>
                <li><a href="/" target="_blank">旅行的意义是什么?这是我见过最美的答案</a></li>
                <li><a href="/" target="_blank">因为旅行，可以为平凡的生活加点料，挽救日渐枯萎的心。</a></li>
            </ol>
        </div>
        <div class="links">
            <h2 class="aside_title"><span><a href="/" target="_blank">申请</a></span>友情链接</h2>
            <ul>
                <li><a href="https://www.qingqingblog.com" target="_blank">杨青青个人博客</a></li>
                <li><a href="/" target="_blank">搜图片</a></li>
                <li><a href="/" target="_blank">今夕何夕模板</a></li>
                <li><a href="/" target="_blank">青于蓝门户网站</a></li>
            </ul>
        </div>
    </aside>
    <!--aside end-->
</main>
<footer>
    <p> © 2019-2020qingqingblog.com 版权所有：<a href="https://www.qingqingblog.com" target="_blank">杨青青个人博客</a></p>
    <p><span><a href="/" target="_blank">XML网站地图</a></span><span>备案号：<a href="/">津ICP备19004899</a></span><span><img
                src="images/ga.png">公安备案号 12011602000311</span></p>
    <p></p>
</footer>
<!--footer end-->

</body>
</html>
