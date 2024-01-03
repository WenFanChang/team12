
@extends('app')

@section('title', '樂團 網站 - 列出所有團員')

@section('band_contents')
<h1> 列出所有團員 </h1>
<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-1">
    @can('admin')
    <a href="{{ route('members.create') }}">新增團員</a>
    @endcan
    <a href="{{ route('members.index') }} ">所有團員</a>
    <a href="{{ route('members.senior') }} ">資深團員</a>
    <form action="{{ url('members/position') }}" method='GET'>
        {!! Form::label('pos', '選取位置：') !!}
        {!! Form::select('pos', $positions, $selectedPosition, ['class' => 'form-control']) !!}
        <input class="btn btn-default" type="submit" value="查詢" />    
        @csrf
    </form>
        
</div>

<table>
    <tr>
        <th>編號</th>   
        <th>人員名稱</th>
        <th>團體</th>
        <th>位置</th>
        <th>身高</th>
        <th>體重</th>
        <th>年資</th>
        <th>年齡</th>
        <th>國籍</th>
        <th>操作1</th>
        @can('admin')
        <th>操作2</th>
        <th>操作3</th>
        @elsecan('manager')
        <th>操作2</th>
        @endcan
    </tr>
    
    @foreach ($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->orchestra->name }}</td>
            <td>{{ $member->position }}</td>
            <td>{{ $member->height }}</td>
            <td>{{ $member->weight }}</td>
            <td>{{ $member->year }}</td>
            <td>{{ $member->age }}</td>
            <td>{{ $member->nationality }}</td>
            <td><a href="{{ route('members.show', ['id'=>$member->id]) }}">顯示</a></td>
            @can('admin')
            <td><a href="{{ route('members.edit', ['id'=>$member->id]) }}">修改</a></td>
            <td>
                <form action="{{ url('/members/delete', ['id' => $member->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="刪除" />
                    @method('delete')
                    @csrf
                </form>
            </td>
            @elsecan('manager')
            <td><a href="{{ route('members.edit', ['id'=>$member->id]) }}">修改</a></td>
            @endcan
        </tr>
    @endforeach
</table>
{{ $members->withQueryString()->links() }}
@endsection