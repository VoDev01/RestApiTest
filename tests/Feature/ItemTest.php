<?php

namespace Tests\Feature;

use App\Item;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    protected $item;

    public function setUp()
    {
        parent::setUp();
        $this->item = factory(Item::class)->create();
    }

    /**
     * @group items
     * Test all items show.
     *
     * @return void
     */
    public function testAll()
    {
        $response = $this->get('api/v1/items');
        $response->assertSuccessful();
    }
    /**
     * @group items
     * Test item show.
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('api/v1/items/show/1');
        $response->assertSuccessful();
    }
    /**
     * @group items
     * Test item create.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->post('api/v1/items/create', [
            'name' => $this->item->name,
            'phone' => $this->item->phone,
            'key' => $this->item->key
        ]);
        $response->assertSuccessful();
        $this->assertDatabaseHas('items', [
            'name' => $this->item->name,
            'phone' => $this->item->phone,
            'key' => $this->item->key
        ]);
    }
    /**
     * @group items
     * Test item update.
     *
     * @return void
     */
    public function testUpdate()
    {
        $response = $this->post('api/v1/items/update', [
            'id' => 1,
            'name' => 'Das das'
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('items', ['name' => 'Das das']);
    }
    /**
     * @group items
     * Test item delete.
     *
     * @return void
     */
    public function testDelete()
    {
        $response = $this->post('api/v1/items/delete/1');
        $response->assertStatus(302);
        $this->assertDatabaseMissing('items', ['id' => 1]);
    }
}
