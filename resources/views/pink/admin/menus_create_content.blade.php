<div id="content-page" class="content group">
    <div class="hentry group">
        {!! Form::open(['url' => (isset($menu->id)) ? route('admin.menus.update',['menus'=>$menu->alias]) : route('admin.menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <ul>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label"> {{Lang::get('ru.name')}}: </span>
                        <br />
                        <span class="sublabel"> {{ Lang::get('ru.item_title') }}: </span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Введите название пункта']) !!}
                    </div>
                </li>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">{{ Lang::get('ru.parent_item_title') }}:</span>
                        <br />
                        <span class="sublabel">{{ Lang::get('ru.parent') }}</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null) !!}
                    </div>
                </li>
            </ul>
            <h1>Тип меню</h1>
            <div id="accordion">
                <h3>{!! Form::radio('type', 'customLink', (isset($type) && $type == 'customLink') ? TRUE : FALSE) !!}
                    <span class="label"> {{Lang::get('ru.user_link')}}:</span></h3>
                    <ul>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">{{ Lang::get('ru.link_path') }}:</span>
                                <br />
                                <span class="sublabel">{{ Lang::get('ru.link_path') }}:</span><br />
                            </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                                {!! Form::text('custom_link',(isset($menu->path) && $type == 'customLink') ? $menu->path  : old('path'), ['placeholder'=>'Введите название пункта']) !!}
                            </div>
                        </li>
                        <div style="clear:both"></div>
                    </ul>
                <h3>{!! Form::radio('type', 'blogLink', (isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
                    <span class="label">{{Lang::get('ru.block_section')}}:</span></h3>
                    <ul>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">{{Lang::get('ru.block_category_link')}}:</span>
                                <br />
                                <span class="sublabel">{{Lang::get('ru.block_category_link')}}:</span><br />
                            </label>
                            <div class="input-prepend">
                                @if($categories)
                                   {!! Form::select('category_alias', $categories, (isset($option) && $option) ? $option  :FALSE) !!}
                                @endif
                            </div>
                        </li>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">{{Lang::get('ru.block_section')}}:</span>
                                <br />
                                <span class="sublabel">{{Lang::get('ru.block_section')}}:</span><br />
                            </label>
                            <div class="input-prepend">
                                {!! Form::select('article_alias', $articles,  (isset($option) && $option) ? $option : FALSE) !!}
                            </div>
                        </li>
                        <div style="clear:both"></div>
                    </ul>
                <h3>{!! Form::radio('type', 'portfolioLink', (isset($type) && $type == 'portfolioLink') ? TRUE : FALSE) !!}
                <span class="label">{{Lang::get('ru.portfolio_section')}}:</span></h3>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label"> {{Lang::get('ru.portfolio_link_href')}}:</span>
                            <br />
                            <span class="sublabel">{{Lang::get('ru.portfolio_link_href')}}:</span><br />
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('portfolio_alias', $portfolios,  (isset($option) && $option) ? $option  : FALSE)  !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">{{Lang::get('ru.portfolio')}}:</span>
                            <br />
                            <span class="sublabel">{{Lang::get('ru.portfolio')}}:</span><br />
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('filter_alias', $filters,  (isset($option) && $option) ? $option  : null) !!}
                        </div>
                    </li>
                    <div style="clear:both"></div>
                    <br/>
                </ul>
            </div>
        @if(isset($menu->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <li class="submit-button">
            {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
        </li>
        {!! Form::close() !!}
    </div>
</div>

<script>
    jQuery(function ($) {
        $('#accordion').accordion({
            activate: function (e, obj ) {
                obj.newPanel.prev().find('input[type=radio]').attr('checked', 'checked');
            }
        });

        var active = 0;
        $('#accordion input[type=radio]').each(function (ind, it) {
            if($(this).prop('checked')){
                active = ind;
            }
        });

        $('#accordion').accordion('option', 'active', active);
    })
</script>