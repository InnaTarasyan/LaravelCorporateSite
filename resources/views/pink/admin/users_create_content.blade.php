<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['user'=>$user->id]) : route('admin.users.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">{{Lang::get('ru.user_name')}}:</span>
                    <br />
                    <span class="sublabel">{{Lang::get('ru.user_name')}}</span><br />
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    {!! Form::text('name',isset($user->name) ? $user->name : old('name'), ['placeholder'=>'Введите имя пользователя']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Login:</span>
                    <br />
                    <span class="sublabel">Login</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::text('login',isset($user->login) ? $user->name : old('login'), ['placeholder'=>'Введите логин пользователя']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">{{Lang::get('ru.email')}}:</span>
                    <br />
                    <span class="sublabel">{{Lang::get('ru.email')}}</span><br />
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    {!! Form::text('email',isset($user->email) ? $user->email : old('email'), ['placeholder'=>'Введите емаил пользователя']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">{{Lang::get('ru.password')}}:</span>
                    <br />
                    <span class="sublabel">{{Lang::get('ru.password')}}</span><br />
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    {!! Form::password('password') !!}
                </div>
            </li>

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Повторить пароль:</span>
                    <br />
                    <span class="sublabel"> Повторить пароль </span><br />
                </label>
                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                    {!! Form::password('password_confirmation') !!}
                </div>
            </li>



            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Roles:</span>
                    <br />
                    <span class="sublabel">Roles</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::select('role_id',$roles, isset($user) ? $user->roles()->first()->id : null) !!}
                </div>
            </li>


            @if(isset($user->id))
                <input type="hidden" name="_method" value="PUT">
            @endif

            <li class="submit-button">
                {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>

        {!! Form::close() !!}
    </div>
</div>