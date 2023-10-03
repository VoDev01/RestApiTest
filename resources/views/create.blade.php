@component('components.layout')
    @slot('title')
        Create
    @endslot
    <form action="/api/v1/items/create" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" name="name" id="name">
            @if ($errors->any())
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" class="form-control" name="phone" id="phone">
            @if ($errors->any())
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endcomponent
