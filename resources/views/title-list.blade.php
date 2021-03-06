@extends('layouts.dashboard')
@section('title', '字段管理')

@section('main')

<?php
$titlecatys = Config::get('worktime.title');
?>
<div class="row">
	<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
        添加字段
    </div>
    <div class="panel-body">
<form class="form-inline" role="form" method="POST" action="/title/store">

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">名称</span>
<input itag="val" name="row[name]" type="text" class="form-control">
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon">类型</span>
<select itag="val" name="row[caty]" class="form-control">
<option value="">选择类型</option>
@include('selection', ['data' => $titlecatys, 'slt' => 0])
</select>
    </div>
</div>

<button type="submit" class="btn btn-primary">添加</button>

</form>

    </div>
    <!-- /.panel-body -->
</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered table-striped table-hover vertical-middle">
			<thead>
				<tr>
<th width="50">#id</th>
<th width="150"> 名称 </th>
<th width="150"> 类型 </th>
<th> 操作 </th>
				</tr>
			</thead>
			<tbody>
@foreach ($titles as $title)
<tr>
<form method="POST" action="/title/store">
<input type="hidden" name="id" value="{{$title->id}}">
	<td>{{$title->id}}</td>
<td>
  <input type="text" class="form-control" name="row[name]" value="{{$title->name}}">
</td>
<td>
@if ($title->locked)
{{$titlecatys[$title->caty]}}
@else
<select itag="val" name="row[caty]" class="form-control">
@include('selection', ['data' => $titlecatys, 'slt' => $title->caty])
</select>
@endif
</td>
	<td>
<button type="submit" class="btn btn-default"> 修改 </button>
@if (!$title->locked)
<a href="/title/del/{{$title->id}}" class="btn btn-default">删除</a>
@endif
	</td>
</form>
</tr>
@endforeach
			</tbody>
		</table>

	</div>
</div>

@stop
