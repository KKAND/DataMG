<!--bootstrap样式 -->
<link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<!-- 引入bootstrap-table样式 -->
<link href="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.css" rel="stylesheet">

<!-- jquery -->
<script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- bootstrap-table.min.js -->
<script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
<!-- 引入中文语言包 -->
<script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/locale/bootstrap-table-zh-CN.min.js"></script>

<table id="table" data-toggle="table">
  <thead>
        <tr>
            <th data-field="id">序号</th>
            <th data-field="name">名称</th>
            <th data-field="price">价格</th>
        </tr>
	</thead>
<tbody>
@foreach ($students as $s)
<tr>
<td>{{$s->stuid}}</td>
<td>{{$s->id}}</td>
<td>{{$s->name}}</td>
</tr>
@endforeach
</tbody>
</table>
