<div id="content-page" class="content group">
    <div class="hentry group">
        {!! Form::open(['url' => (isset($menu->id)) ? route('admin.menus.update',['menus'=>$menu->alias]) : route('admin.menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <ul>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Название:</span>
                        <br />
                        <span class="sublabel">Заголовок пункта</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Введите название пункта']) !!}
                    </div>
                </li>
                <li class="text-field">
                    <label for="name-contact-us">
                        <span class="label">Родительский пункт меню:</span>
                        <br />
                        <span class="sublabel">Родитель</span><br />
                    </label>
                    <div class="input-prepend">
                        {!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null) !!}
                    </div>
                </li>
            </ul>
            <h1>Тип меню</h1>
            <div id="accordion">
                <h3>{!! Form::radio('type', 'customLink', (isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
                    <span class="label">Пользовательская ссылка:</span></h3>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Путь для ссылки:</span>
                            <br />
                            <span class="sublabel">Путь для ссылки:</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                            {!! Form::text('custom_link',isset($menu->path) ? $menu->path  : old('path'), ['placeholder'=>'Введите название пункта']) !!}
                        </div>
                    </li>
                    <div style="clear:both"></div>
                </ul>
                <h3>{!! Form::radio('type', 'categoryLink', (isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
                    <span class="label">Раздел Блог:</span></h3>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Ссылка на категорию Блога:</span>
                            <br />
                            <span class="sublabel">Ссылка на категорию Блога:</span><br />
                        </label>
                        <div class="input-prepend">
                            @if($categories)
                               {!! Form::select('category_alias', $categories, (isset($option) && $option) ? $option  : null) !!}
                            @endif
                        </div>
                    </li>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Раздел Блог:</span>
                            <br />
                            <span class="sublabel">Блог:</span><br />
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('article_alias', $articles,  (isset($option) && $option) ? $option : null) !!}
                        </div>
                    </li>
                    <div style="clear:both"></div>
                </ul>
                <h3>{!! Form::radio('type', 'portfolioLink', (isset($type) && $type == 'blogLink') ? TRUE : FALSE) !!}
                <span class="label">Раздел Портфолио:</span></h3>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Ссылка на запись Портфолио:</span>
                            <br />
                            <span class="sublabel">Ссылка на запись Портфолио:</span><br />
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('portfolios', $portfolios,  (isset($option) && $option) ? $option  : null)  !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Портфолио:</span>
                            <br />
                            <span class="sublabel">Портфолио:</span><br />
                        </label>
                        <div class="input-prepend">
                            {!! Form::select('filter_alias', $filters,  (isset($option) && $option) ? $option  : null) !!}
                        </div>
                    </li>
                    <div style="clear:both"></div>
                    <br/>
                    @if(isset($menu->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <li class="submit-button">
                        {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
                    </li>
                </ul>
            </div>
        {!! Form::close() !!}
    </div>
</div>
