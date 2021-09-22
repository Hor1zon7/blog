<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../../lib/html5shiv.js"></script>
    <script type="text/javascript" src="../../lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="../../static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="../../lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="../../static/h-ui.admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../../lib/Hui-iconfont/bottom.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="../../lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>资讯列表</title>

</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    首页
    <span class="c-gray en">&gt;</span>
    资讯管理
    <span class="c-gray en">&gt;</span>
    资讯列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
       href="#" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <form action="{{ 'article_list' }}" method="get">
        <div class="text-c">
            <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
            <span class="select-box inline">
		<select class="select" name="a_type">
			<option value=" ">全部分类</option>
			@foreach($typeData as $k=>$v)
                <option value="{{$v->t_id}}"
                        @if(array_key_exists("a_type",$condition)) @if($v->t_id==$condition['a_type']) selected @endif @endif >{{$v->t_name}}</option>
            @endforeach
		</select>
		</span> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin"
                   class="input-text Wdate" style="width:120px;" name="time_start"
                   @if(array_key_exists("time_start",$condition)) value="{{$condition['time_start']}}" @endif>
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })"
                   id="logmax"
                   class="input-text Wdate" style="width:120px;" name="time_stop"
                   @if(array_key_exists("time_stop",$condition)) value="{{$condition['time_stop']}}" @endif>

            <input type="text" name="a_title" placeholder=" 资讯名称" style="width:250px" class="input-text"
                   @if(array_key_exists("a_title",$condition)) value="{{$condition['a_title']}}" @endif>
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯
            </button>
        </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;"  class="btn btn-danger radius delMany"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a> <a
                class="btn btn-primary radius" data-title="添加资讯" data-href="{{ 'article_add' }}"
                href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>添加资讯</a></span>
        <span class="r">共有数据：<strong>{{$data->total()}}</strong></span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="checkAll" style="width: 70px"><p class="checkAlltext">全选</p></th>
                <th width="80">ID</th>
                <th>标题</th>
                <th width="80">分类</th>
                <th width="80">来源</th>
                <th width="120">更新时间</th>
                <th width="75">浏览次数</th>
                <th width="60">发布状态</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr class="text-c">
                    <td><input type="checkbox" value="" name="littleCheckbox" id="{{$v['a_id']}}" status="{{$v['a_status']}}"></td>
                    <td>{{$v['a_id']}}</td>
                    <td class="text-l"><u style="cursor:pointer" class="text-primary" title="查看">{{$v['a_title']}}</u></td>
                    <td>{{$v['t_name']}}</td>
                    <td>{{ $v['a_source'] }}</td>
                    <td>{{ $v['update_at'] }}</td>
                    <td>{{$v['a_read']}}</td>
                    <td class="td-status">
                        @if($v['a_status']=='1')
                            <span class="label label-success radius">已发布</span>
                        @else
                            <span class="label radius">已停用</span>
                        @endif
                    </td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" href="javascript:;" class="updown" value="{{$v['a_status']}}"
                           a_id="{{ $v['a_id'] }}"><i class="Hui-iconfont">&#xe6de;</i></a>
                        <a style="text-decoration:none" class="ml-5" href="javascript:;" title="编辑"><i
                                class="Hui-iconfont">&#xe6df;</i></a>
                        <a style="text-decoration:none" class="ml-5 delOne" href="javascript:;" title="删除"><i
                                class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="pull_right">
            <div class="pull-right">
                {!! $users->appends($condition)->links()->render() !!}
            </div>
        </div>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
{{--<script type="text/javascript" src="../../lib/jquery/1.9.1/jquery.min.js"></script>--}}
<script type="text/javascript" src="../../lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="../../static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../lib/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../lib/laypage/1.2/laypage.js"></script>

<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
</script>
<script>
    $(".updown").click(function () {
        var status;
        var a_id;
        var changethis = $(this);
        status = $(this).attr('value');
        a_id = $(this).attr('a_id');
        // console.log(changethis.attr('value'));
        // 获取到本行的标签tr
        var that = $(this).parents('tr');
        if (status == '1') {
            if (confirm('确认停用吗')) {
                $.ajax({
                    url: "{{route('putaway')}}",
                    data: {a_id: a_id, a_status: status},
                    success: function () {
                        // 修改状态栏里的元素
                        changethis.attr('value', '2');
                        that.find(".td-status").html("<span class='label radius'>已停用</span>");
                    }
                })
            }
            ;
        } else {
            if (confirm('确认发布吗')){
                $.ajax({
                    url: "{{route('putaway')}}",
                    data: {a_id: a_id, a_status: status},
                    success: function () {
                        changethis.attr('value', '1');
                        that.find(".td-status").html("<span class='label label-success radius'>已发布</span>");
                    }
                })
            }
            ;
        }
    })

    $(".delOne").click(function () {
        var status;
        var a_id;
        var that = $(this);
        status = $(this).parents('tr').find('.updown').attr('value');
        a_id = $(this).parents('tr').find('.updown').attr('a_id');
        // console.log(status,a_id);
        if (status == '1') {
            alert('已启用——不能删除');
            return;
        } else {
            if (confirm('确认删除？')) {
                $.ajax({
                    url: "{{ 'delOne' }}",
                    type: "GET",
                    data: {a_id: a_id},
                    success: function (res) {
                        that.parents('tr').remove();
                        window.location.reload();
                        console.log(res);
                    }

                })
            }
        }
    });
    $(".r").click(function (){
        window.location.reload();
    })
    $(".delMany").click(function (){
        var ids;
        $("input[name='littleCheckbox']:checked").each(function (){
            if($(this).attr('status')=='1'){
                ids+=','+$(this).attr('id');
            }
            ids=ids.substring(2);
        });
        console.log(ids);
    })


</script>
<script type="text/javascript">
    $("input[name='checkAll']").click(function (){
        var status=$(this).prop('checked');
        $(":checkbox").prop('checked',status);
        status ? $(".checkAlltext").text('取消全选') : $(".checkAlltext").text('全选');
    })
    // $('.table-sort').dataTable({
    //     "aaSorting": [[1, "desc"]],//默认第几个排序
    //     "bStateSave": true,//状态保存
    //     "pading": false,
    //     "pagingType": "full_numbers",
    //     "aoColumnDefs": [
    //         //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
    //         {"orderable": false, "aTargets": [0, 8]}// 不参与排序的列
    //     ]
    // });


    /*资讯-编辑*/
    // function article_edit(title, url, id, w, h) {
    //     var index = layer.open({
    //         type: 2,
    //         title: title,
    //         content: url
    //     });
    //     layer.full(index);
    // }

    /*资讯-删除*/
    // function article_del(obj, id) {
    //     layer.confirm('确认要删除吗？', function (index) {
    //         $.ajax({
    //             type: 'POST',
    //             url: '',
    //             dataType: 'json',
    //             success: function (data) {
    //                 $(obj).parents("tr").remove();
    //                 layer.msg('已删除!', {icon: 1, time: 1000});
    //             },
    //             error: function (data) {
    //                 console.log(data.msg);
    //             },
    //         });
    //     });
    // }

    // /*资讯-审核*/
    // function article_shenhe(obj, id) {
    //     layer.confirm('审核文章？', {
    //             btn: ['通过', '不通过', '取消'],
    //             shade: false,
    //             closeBtn: 0
    //         },
    //         function () {
    //             $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
    //             $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
    //             $(obj).remove();
    //             layer.msg('已发布', {icon: 6, time: 1000});
    //         },
    //         function () {
    //             $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
    //             $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
    //             $(obj).remove();
    //             layer.msg('未通过', {icon: 5, time: 1000});
    //         });
    // }


    // /*资讯-申请上线*/
    // function article_shenqing(obj, id) {
    //     $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
    //     $(obj).parents("tr").find(".td-manage").html("");
    //     layer.msg('已提交申请，耐心等待审核!', {icon: 1, time: 2000});
    // }

</script>


</body>
</html>
