
@section('students')
    <div class="students" style="margin-bottom:50px;">
        <div class="row">
            <h2 class="col" style="margin:30px 0;">Студенты</h2>
        </div>
        @php
            $order = request()->get('order');
            $order = (!isset($order) || $order == 'asc') ? 'desc' : 'asc' ;
        @endphp
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col"><a href="{{Request::url()}}?field=firstname&order={{$order}}">Имя</a></th>
                    <th scope="col"><a href="{{Request::url()}}?field=lastname&order={{$order}}">Фамилия</a></th>
                    <th scope="col"><a href="{{Request::url()}}?field=patronymic&order={{$order}}">Отчество</a></th>
                    <th scope="col"><a href="{{Request::url()}}?field=birthday&order={{$order}}">Дата рождения</a></th>
                    <th scope="col"><a href="{{Request::url()}}?field=group_id&order={{$order}}">Группа</a></th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->firstname}}</td>
                    <td>{{$student->lastname}}</td>
                    <td>{{$student->patronymic}}</td>
                    <td>{{$student->birthday}}</td>
                    <td>{{$student->group->number}}</td>
                    <td>
                        <a href="{{route('edit.student', $student->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('delete.student', $student->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($errors->get('students.*'))
            <div class="arert alert-danger">
                <ul style="padding:10px 30px;">
                    @foreach($errors->get('students.*') as $message)
                        <li>{{$message[0]}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('add.student')}}">
            @csrf
            <input type="text" name="students[firstname]" id="firstname" placeholder="Введите Имя" class="form-control" /><br/>
            <input type="text" name="students[lastname]" id="lastname" placeholder="Введите Фамилию" class="form-control" /><br/>
            <input type="text" name="students[patronymic]" id="patronymic" placeholder="Введите Отчество" class="form-control" /><br/>
            <input type="date" name="students[birthday]" id="birthday" placeholder="Введите Дату рождения" class="form-control" /><br/>
            <select type="number" name="students[group_id]" id="group_id" class="form-control">
                <option value="default">Введите Группу</option>
                @foreach($groups as $group)
                    <option value="{{$group->id}}">Группа: {{$group->number}}</option>
                @endforeach
            </select><br/>

            <button type="submit" class="btn btn-success">Добавить Студента</button>
        </form>
    </div>
@show