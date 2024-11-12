<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('news')->insert([
            [
                'title' => 'Nuevos planes de hosting para pequeñas empresas',
                'content' => 'Nuestra empresa ha lanzado una nueva gama de planes de hosting diseñados específicamente para pequeñas empresas. Con precios accesibles y herramientas avanzadas, estos planes permiten que los emprendedores gestionen sus sitios web de manera eficiente.',
                'img' => 'uploads/hosting3.avif',
                'summary' => 'Lanzamiento de planes de hosting para pequeñas empresas.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cómo mejorar la velocidad de tu sitio web',
                'content' => 'La velocidad de carga es fundamental para el éxito de cualquier sitio web. Descubre algunos consejos esenciales para optimizar la velocidad de tu sitio y mejorar la experiencia del usuario.',
                'img' => 'uploads/hosting1.avif',
                'summary' => 'Consejos para mejorar la velocidad de tu sitio web.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Importancia de los respaldos automáticos en tu hosting',
                'content' => 'Los respaldos automáticos son esenciales para proteger la información de tu sitio. Te explicamos cómo activar esta opción y asegurarte de no perder tus datos.',
                'img' => 'uploads/hosting2.avif',
                'summary' => 'Asegura tus datos con respaldos automáticos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '5 prácticas recomendadas de seguridad en hosting',
                'content' => 'La seguridad es primordial en cualquier sitio web. Aquí te mostramos 5 prácticas de seguridad para proteger tus datos y los de tus clientes.',
                'img' => 'uploads/hosting4.jpg',
                'summary' => 'Prácticas recomendadas para asegurar tu sitio en el hosting.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'El futuro de los servidores en la nube',
                'content' => 'La tecnología en la nube ha revolucionado el mundo del hosting. Analizamos las tendencias del futuro y cómo los servidores en la nube están cambiando la forma de trabajar en internet.',
                'img' => 'uploads/hosting5.jpg',
                'summary' => 'Descubre hacia dónde se dirige la tecnología en la nube.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cómo elegir el mejor dominio para tu negocio',
                'content' => 'El nombre de dominio es crucial para la identidad de cualquier negocio online. Te damos algunos consejos para seleccionar el dominio perfecto que represente tu marca.',
                'img' => 'uploads/hosting6.png',
                'summary' => 'Consejos para elegir el dominio ideal para tu negocio.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Actualización de seguridad en nuestros servidores',
                'content' => 'Hemos realizado una actualización de seguridad en nuestros servidores para mejorar la protección de todos nuestros clientes. Conoce los detalles de esta mejora.',
                'img' => 'uploads/hosting7.webp',
                'summary' => 'Nueva actualización de seguridad en nuestros servidores.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'La importancia del soporte técnico 24/7 en hosting',
                'content' => 'Un soporte técnico 24/7 es fundamental para solucionar cualquier inconveniente en tu sitio web. Te explicamos por qué este servicio es esencial.',
                'img' => 'uploads/hosting9.jpg',
                'summary' => '¿Por qué es importante el soporte técnico 24/7?',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Beneficios del certificado SSL en tu sitio web',
                'content' => 'Un certificado SSL proporciona seguridad adicional y mejora la confianza de los visitantes. Aquí te contamos los beneficios de instalar SSL en tu sitio.',
                'img' => 'uploads/hosting8.jpg',
                'summary' => 'Descubre por qué es importante el certificado SSL.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Consejos para migrar tu sitio web sin problemas',
                'content' => 'Migrar tu sitio web puede ser un proceso complicado. Te compartimos algunos consejos para que el cambio de hosting sea sin problemas.',
                'img' => 'uploads/hosting10.png',
                'summary' => 'Pasos para una migración de sitio web sin contratiempos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}



