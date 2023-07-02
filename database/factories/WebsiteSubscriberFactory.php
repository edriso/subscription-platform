<?php

namespace Database\Factories;

use App\Models\Website;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WebsiteSubscriberFactory extends Factory
{
    // /**
    //  * The name of the factory's corresponding model.
    //  *
    //  * @var string
    //  */
    // protected $model = WebsiteSubscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'website_id' => function () {
                return Website::factory()->create()->id;
            },
            'subscriber_id' => function () {
                return Subscriber::factory()->create()->id;
            },
        ];
    }
}