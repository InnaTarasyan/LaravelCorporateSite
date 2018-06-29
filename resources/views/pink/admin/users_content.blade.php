@if($users)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>{{Lang::get('ru.users')}}</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="align-left">ID</th>
                            <th> {{ Lang::get('ru.user_name') }}</th>
                            <th> {{ Lang::get('ru.email') }}</th>
                            <th>Role</th>
                            <th>Login</th>
                            <th> {{ Lang::get('ru.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-left">{{$user->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.users.edit',['user'=>$user->id]), $user->name) !!}</td>
                            <td class="align-left">{{$user->email}}</td>
                            <td> {{ $user->roles()->pluck('name')->implode(',')  }}</td>
                            {{--<td> {{$user->roles->implode('name', ', ')}}</td>--}}
                            <td> {{ $user->login }}</td>
                            <td>
                                {!! Form::open(['url' => route('admin.users.destroy',['user'=>$user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! HTML::link(route('admin.users.create'),'Добавить пользователя',['class' => 'btn btn-the-salmon-dance-3']) !!}
        </div>
    </div>
@endif