<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\User;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur admin si nécessaire
        $admin = User::firstOrCreate(
            ['email' => 'admin@innovqube.com'],
            [
                'name' => 'Admin InnovQube',
                'password' => bcrypt('password'),
            ]
        );

        // Propriétés de démonstration
        $properties = [
            [
                'name' => 'Villa Moderne avec Piscine',
                'description' => 'Magnifique villa contemporaine avec piscine privative, située à quelques minutes de la mer. Idéale pour des vacances en famille avec 4 chambres spacieuses, cuisine équipée et grand salon lumineux.',
                'price_per_night' => 350.00,
            ],
            [
                'name' => 'Appartement Cosy Centre-ville',
                'description' => 'Appartement charmant en plein cœur de la ville, à proximité de tous les commerces et transports. Parfait pour un séjour professionnel ou touristique. Entièrement rénové avec goût.',
                'price_per_night' => 120.00,
            ],
            [
                'name' => 'Chalet Traditionnel en Montagne',
                'description' => 'Authentique chalet en bois au cœur des Alpes, offrant une vue imprenable sur les montagnes. Idéal pour les amateurs de ski et de randonnée. Ambiance chaleureuse garantie.',
                'price_per_night' => 280.00,
            ],
            [
                'name' => 'Studio Vue sur Mer',
                'description' => 'Petit studio fonctionnel avec balcon offrant une vue directe sur la mer. Parfait pour un couple souhaitant profiter du soleil et des plages à proximité.',
                'price_per_night' => 90.00,
            ],
            [
                'name' => 'Maison de Campagne Authentique',
                'description' => 'Ancienne ferme rénovée avec charme, entourée de verdure. Calme et sérénité garantis. Parfait pour se reconnecter avec la nature et profiter du grand air.',
                'price_per_night' => 180.00,
            ]
        ];

        foreach ($properties as $propertyData) {
            Property::create($propertyData);
        }

        $this->command->info('✅ 5 propriétés de démonstration créées avec succès!');
        $this->command->info('👤 Compte admin: admin@innovqube.com / password');
    }
}