<?php

use Illuminate\Database\Seeder;
use App\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Home::class, 1)->create([
            'meta_title' => '▷ Domina la tecnología web con Coders Free',
            'meta_description' => 'En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un verdadero desarrollador web',

            'portada_title' => 'Domina la tecnología web con Coders Free',
            'portada_text' => 'En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web',
            'portada_search' => '¿Qué quieres aprender?',

            'contenido_icon_1' => 'fas fa-laptop-code',
            'contenido_title_1' => 'Cursos y proyectos',
            'contenido_subtitle_1' => 'para que potencies tus conocimientos',
            'contenido_text_1' => 'Encuentra una gran variedad de cursos y proyectos en Laravel, totalmente gratis',

            'contenido_icon_2' => 'fas fa-chalkboard-teacher',
            'contenido_title_2' => 'Manual de Laravel',
            'contenido_subtitle_2' => 'Traducido al español',
            'contenido_text_2' => 'Hemos traducido la documentación oficial, para ayudarte en tu proceso de aprendizaje',

            'contenido_icon_3' => 'fas fa-blog',
            'contenido_title_3' => 'Blog',
            'contenido_subtitle_3' => 'Actualizado todos los días',
            'contenido_text_3' => 'Artículos de programación y desarrollo web, para potenciar tu aprendizaje',

            'contenido_icon_4' => 'fas fa-blog',
            'contenido_title_4' => 'Desarrollo web',
            'contenido_subtitle_4' => 'Desarrollo web',
            'contenido_text_4' => 'Si se te hace dificil aprender a programar, contáctanos y nosotros desarrollamos tu sitio web',

            'ventaja_icon_1' => 'fas fa-laptop-code',
            'ventaja_title_1' => 'Cursos gratuitos',
            'ventaja_text_1' => 'Una amplia variedad de cursos de desarrolo web gratis y en español',

            'ventaja_icon_2' => 'far fa-clock',
            'ventaja_title_2' => 'A tu propio ritmo',
            'ventaja_text_2' => 'Estudia en tus tiempos libres y desde donde estés, con nuestros cursos online.',

            'ventaja_icon_3' => 'fas fa-chalkboard-teacher',
            'ventaja_title_3' => 'Manual en español',
            'ventaja_text_3' => 'Hemos traducido la documentación de Laravel, para que puedas aprender mejor',

            'nuevo_contenido_title' => 'Contenido nuevo todos los días',
            'nuevo_contenido_subtitle' => 'La formación online es el presente',

            'informacion_title' => '¿Qué es Coders Free?',
            'informacion_text' => '<p>Coders Free es una iniciativa por promover el conocimiento informático, con todas las personas que están iniciándose en el mundo de la programación pero no tiene los recursos para poder contratar un curso, tal y como me pasó a mi.</p><p>Nuestro objetivo es darte todas las herramientas necesarias para que puedas conseguir empleo en eso que tanto te gusta, y si luego, quieres apoyar nuestro esfuerzo, será totalmente bienvenido</p>'
        ]);
    }
}
