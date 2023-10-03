@component('components.layout')
    @slot('title')
        Update
    @endslot
    <form action="/api/v1/items/update" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Имя</label>
          <input type="text"
            class="form-control" name="name" id="name" value="{{$item->name}}">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Телефон</label>
          <input type="text"
            class="form-control" name="phone" id="phone" value="{{$item->phone}}">
        </div>
        <input hidden name="id" value="{{$item->id}}">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endcomponent