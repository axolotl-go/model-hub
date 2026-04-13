<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Threed;
use App\Models\Purchase;
use App\Models\StoreCart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        $user1 = User::factory()->create([
            'name' => 'John Buyer',
            'email' => 'buyer@example.com',
            'role' => 'usuario',
        ]);

        $vendor = User::factory()->create([
            'name' => 'Artist Vendor',
            'email' => 'vendor@example.com',
            'role' => 'usuario',
        ]);

        // Create categories
        $categories = [
            Category::create(['name' => 'Sci-Fi']),
            Category::create(['name' => 'Characters']),
            Category::create(['name' => 'Props']),
            Category::create(['name' => 'Vehicles']),
            Category::create(['name' => 'Environments']),
        ];

        // Create 3D models
        $models = [
            Threed::create([
                'name' => 'Cyber-Relic Prototype',
                'description' => 'High-fidelity spatial construct optimized for real-time volumetric rendering.',
                'price' => 59.99,
                'category_id' => $categories[0]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/cyber-relic.glb',
                'preview_image' => 'https://picsum.photos/id/10/400/300',
                'tags' => 'PBR,Sci-Fi,High-Poly',
            ]),
            Threed::create([
                'name' => 'Void Strider v2',
                'description' => 'Advanced humanoid character model with full rigging.',
                'price' => 49.99,
                'category_id' => $categories[1]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/void-strider.glb',
                'preview_image' => 'https://picsum.photos/id/11/400/300',
                'tags' => 'Character,Animated',
            ]),
            Threed::create([
                'name' => 'Ethereal Flux 01',
                'description' => 'Free experimental particle system effect.',
                'price' => 0.00,
                'category_id' => $categories[2]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/ethereal-flux.glb',
                'preview_image' => 'https://picsum.photos/id/12/400/300',
                'tags' => 'Free,Experimental',
            ]),
            Threed::create([
                'name' => 'Neon Fighter Jet',
                'description' => 'Retro-futuristic fighter jet with detailed interior.',
                'price' => 79.99,
                'category_id' => $categories[3]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/fighter-jet.glb',
                'preview_image' => 'https://picsum.photos/id/13/400/300',
                'tags' => 'Vehicle,Sci-Fi',
            ]),
            Threed::create([
                'name' => 'Crystalline Cavern',
                'description' => 'Procedurally generated crystalline environment.',
                'price' => 89.99,
                'category_id' => $categories[4]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/cavern.glb',
                'preview_image' => 'https://picsum.photos/id/14/400/300',
                'tags' => 'Environment,PBR',
            ]),
            Threed::create([
                'name' => 'Ancient Artifact',
                'description' => 'Ornate artifact with intricate details.',
                'price' => 34.99,
                'category_id' => $categories[2]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/artifact.glb',
                'preview_image' => 'https://picsum.photos/id/15/400/300',
                'tags' => 'Props,Fantasy',
            ]),
            Threed::create([
                'name' => 'Quantum Sphere',
                'description' => 'Abstract quantum computing visualization.',
                'price' => 44.99,
                'category_id' => $categories[0]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/sphere.glb',
                'preview_image' => 'https://picsum.photos/id/16/400/300',
                'tags' => 'Abstract,Tech',
            ]),
            Threed::create([
                'name' => 'Dragon Wings Pro',
                'description' => 'Rigged dragon wings with bone animation.',
                'price' => 54.99,
                'category_id' => $categories[1]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/dragon-wings.glb',
                'preview_image' => 'https://picsum.photos/id/17/400/300',
                'tags' => 'Character,Animated',
            ]),
            Threed::create([
                'name' => 'Chrome Exoskeleton',
                'description' => 'Futuristic mechanical armor suit.',
                'price' => 69.99,
                'category_id' => $categories[1]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/exoskeleton.glb',
                'preview_image' => 'https://picsum.photos/id/18/400/300',
                'tags' => 'Character,Sci-Fi',
            ]),
            Threed::create([
                'name' => 'Neon City Street',
                'description' => 'Cyberpunk street scene with detailed buildings.',
                'price' => 99.99,
                'category_id' => $categories[4]->id,
                'user_id' => $vendor->id,
                'file_path' => 'models/neon-city.glb',
                'preview_image' => 'https://picsum.photos/id/19/400/300',
                'tags' => 'Environment,Cyberpunk',
            ]),
        ];

        // Create purchases for user1
        Purchase::create([
            'user_id' => $user1->id,
            'threed_id' => $models[0]->id,
            'purchased_at' => now()->subDays(5),
        ]);

        Purchase::create([
            'user_id' => $user1->id,
            'threed_id' => $models[1]->id,
            'purchased_at' => now()->subDays(3),
        ]);

        Purchase::create([
            'user_id' => $user1->id,
            'threed_id' => $models[2]->id,
            'purchased_at' => now()->subDays(1),
        ]);

        // Add items to cart for user1
        StoreCart::create([
            'user_id' => $user1->id,
            'threed_id' => $models[3]->id,
        ]);

        StoreCart::create([
            'user_id' => $user1->id,
            'threed_id' => $models[4]->id,
        ]);
    }
}
