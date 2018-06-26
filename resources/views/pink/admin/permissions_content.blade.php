<div id="content-page" class="content group">
   <div class="hentry group">
      <h3 class="title_page"> {{ Lang::get('ru.permissions') }}</h3>
      <form action=" {{ route('admin.permissions.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="short-table white">
            <table style="width:100%">
                <thead>
                    <th>{{ Lang::get('ru.permissions') }}</th>
                    @if(!$roles->isEmpty())
                        @foreach($roles as $item)
                            <th>{{ $item->name}}</th>
                        @endforeach

                    @endif
                </thead>
                <tbody>
                @if(!$permissions->isEmpty())
                    @foreach($permissions as $val)
                        <tr>
                            <td>{{ $val->name }}</td>
                            @if(!$roles->isEmpty())
                                @foreach($roles as $role)
                                    <td>
                                        @if($role->hasPermission($val->name))
                                           <input checked type="checkbox" value="{{$val->id}}" name="{{ $role->id }}[]">
                                        @else
                                           <input type="checkbox" value="{{$val->id}}" name="{{ $role->id }}[]">
                                        @endif
                                    </td>
                                @endforeach
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
          <input class="btn btn-the-salmon-dance-3" type="submit" value="{{ Lang::get('ru.update') }}" />
      </form>
   </div>
</div>