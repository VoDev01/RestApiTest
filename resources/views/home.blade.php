@component("components.layout")
    @slot("title")
        Rest API
    @endslot
    <h1>Rest API</h1>
    <div class="row gap-4">
        <p class="col">api/v1/items - Все</p>
        <p class="col">api/v1/items/show/{id} - Показать</p>
        <p class="col">/items/update/{id} - Обновить</p>
        <p class="col">/items/create - Создать</p>
        <p class="col">api/v1/items/delete/{id} - Удалить</p>
    </div>
@endcomponent