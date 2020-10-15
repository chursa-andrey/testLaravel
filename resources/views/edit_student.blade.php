@extends('layout')

@section('home')

    <div class="groups" style="margin-top:30px;">
        <h2>Редактирование студента</h2><br/>
        @if($errors->all())
            <div class="arert alert-danger">
                <ul style="padding:10px 30px;">
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('update.student', $student)}}">
            @csrf
            <input type="text" name="firstname" id="firstname" placeholder="Введите Имя" class="form-control"
                   value="{{$student->firstname}}" /><br/>
            <input type="text" name="lastname" id="lastname" placeholder="Введите Фамилию" class="form-control"
                   value="{{$student->lastname}}" /><br/>
            <input type="text" name="patronymic" id="patronymic" placeholder="Введите Отчество" class="form-control"
                   value="{{$student->patronymic}}" /><br/>
            <input type="date" name="birthday" id="birthday" placeholder="Введите Дату рождения" class="form-control"
                   value="{{$student->birthday}}" /><br/>
            <select type="number" name="group_id" id="group_id" class="form-control">
                <option value="default">Введите Группу</option>
                @foreach($groups as $group)
                    <option value="{{$group->id}}" @if($group->id == $student->group_id) selected="selected" @endif >
                        Группа: {{$group->number}}</option>
                @endforeach
            </select><br/>

            <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </div>

@endsection