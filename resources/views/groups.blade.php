
@section('groups')
    <div class="groups" style="margin-bottom:50px;">
        <div class="row">
            <h2 class="col" style="margin:30px 0;">Группы</h2>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Номер</th>
                    <th scope="col">Курс</th>
                    <th scope="col">Название факультета</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{$group->number}}</td>
                        <td>{{$group->course}}</td>
                        <td>{{$group->faculty_name}}</td>
                        <td>
                            <a href="{{route('edit.group', $group->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.group', $group->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($errors->get('groups.*'))
            <div class="arert alert-danger">
                <ul style="padding:10px 30px;">
                @foreach($errors->get('groups.*') as $message)
                    <li>{{$message[0]}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('add.group')}}">
            @csrf
            <input type="number" name="groups[number]" id="number" placeholder="Введите Номер Группы" class="form-control" /><br/>
            <input type="number" name="groups[course]" id="course" placeholder="Введите Курс" class="form-control" /><br/>
            <input type="text" name="groups[faculty_name]" id="faculty_name" placeholder="Введите Название факультета" class="form-control" /><br/>
            <button type="submit" class="btn btn-success">Добавить Группу</button>
        </form>
    </div>
@show

