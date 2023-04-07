<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // ID
            'role_id' => 1,

            // User Info
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'contact@splax.com.tr',

            // Profile
            'profile_image' => 'https://avatars.githubusercontent.com/u/51224896?v=4',
            'profile_cover' => 'https://avatars.githubusercontent.com/u/51224896?v=4',
            'profile_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nisl eget ultricies ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Donec auctor, nisl eget ultricies ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',

            // Social
            'social_instagram' => null,
            'social_linkedin' => 'https://www.linkedin.com/in/splax/',
            'social_youtube' => 'https://www.youtube.com/@splaxtr',
            'social_discord' => 'https://discord.gg/hKYzaZZNcG',
            'social_github' => 'https://github.com/splax-tr',
            'social_twitch' => null,
            'social_medium' => 'https://splax.medium.com/',

            // Settings
            'remember_token' => Str::random(10),

            // LOG
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
