@extends('layout')

@section('home')

    <div class="groups" style="margin-top:30px;">
        <h2>Редактирование группы</h2><br/>
        @if($errors->all())
            <div class="arert alert-danger">
                <ul style="padding:10px 30px;">
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('update.group', $group)}}">
            @csrf
            <input type="number" name="number" id="number" placeholder="Введите Номер Группы" class="form-control"
                   value="{{$group->number}}" /><br/>
            <input type="number" name="course" id="course" placeholder="Введите Курс" class="form-control"
                   value="{{$group->course}}" /><br/>
            <input type="text" name="faculty_name" id="faculty_name" placeholder="Введите Название факультета" class="form-control"
                   value="{{$group->faculty_name}}" /><br/>

            <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </div>

@endsection