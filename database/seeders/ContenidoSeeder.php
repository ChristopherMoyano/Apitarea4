<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Contenido;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1. Buscamos las categorías que vamos a necesitar.
        $categoriaAccion = Categoria::where('nombre', 'Accion')->first();
        $categoriaFantasia = Categoria::where('nombre', 'Fantasia')->first();
        $categoriaRomance = Categoria::where('nombre', 'Romance')->first();

        // 2. Verificamos que las categorías existan para evitar errores.
        if (!$categoriaAccion || !$categoriaFantasia || !$categoriaRomance) {
            $this->command->info('Asegúrate de que las categorías "Accion", "Fantasia" y "Romance" existan.');
            $this->command->info('Por favor, ejecuta primero el CategoriaSeeder con esos nombres.');
            return;
        }

        Contenido::create([
            'nombreContenido' => 'Naruto',
            'informacion' => 'Naruto, un aprendiz de ninja de la Aldea Oculta de Konoha es un chico
                travieso que desea llegar a ser el Hokage de la aldea para demostrar a todos lo que vale.
                Lo que descubre al inicio de la historia es que la gente le mira con desconfianza porque en
                su interior está encerrado el demonio Kyubi que una vez destruyó la aldea, y que el
                anterior líder de la misma tuvo que encerrar en su cuerpo siendo aún muy pequeño, a coste
                de su vida. Aunque sus compañeros no saben esto, tampoco le aprecian porque es mal
                estudiante y siempre está haciendo bromas. Sin embargo, la forma de actuar y la
                determinación de Naruto demuestran a los demás que puede llegar muy lejos, y el recelo
                de los otros chicos se va disipando. Naruto y sus compañeros Sakura y Sasuke, junto
                a su maestro Kakashi tendrán que enfrentarse a una serie de combates y misiones a lo
                largo de la historia que les permitirán mejorar y crecer. Naruto se vera enfrentado a
                sus principales enemigos Akatsuki, Itachi y Kisame.',
            'imagenContenido' => 'path/to/naruto.jpg',
            'categoria_id' => $categoriaAccion->id,
        ]);

        Contenido::create([
            'nombreContenido' => 'Bleach',
            'informacion' => 'Kurosaki Ichigo es un estudiante de instituto de 15 años, que tiene una
                peculiaridad: es capaz de ver, oír y hablar con fantasmas. Pero no sabe hasta dónde puede
                abarcar la clasificación de espíritus, ni lo que conlleva el saberlo. Un buen día, una
                extraña chica de pequeña estatura que viste ropas negras de samurai entra en su cuarto. Se
                llama Rukia Kuchiki, y es una Shinigami (Dios de la Muerte). Ante la incredulidad de
                Ichigo, le explica que su trabajo es mandar a las almas buenas o plus a un lugar llamado
                la Sociedad de Almas, y eliminar a las almas malignas o hollows. Luego junto a Inoue
                Orihime, Ishida Ury y Sado Yasutora se veran envueltos en diferentes batallas, las cuales
                iran desarrollando sus diferentes habilidades que le otorgaran a cada uno su importancia
                en la serie.',
            'imagenContenido' => 'path/to/bleach.jpg',
            'categoria_id' => $categoriaAccion->id,
        ]);

        Contenido::create([
            'nombreContenido' => 'Danjo no Yuujou wa Seiritsu suru? (Iya, Shinai!!)',
            'informacion' => 'La amistad de la infancia entre Himari y Yu se
                tambalea cuando Yu se reencuentra en preparatoria con su primer amor. Himari, que nunca
                experimentó la emoción del amor, ahora debe enfrentar sus propios sentimientos. Sus sueños
                compartidos y los tranquilos días en su club de jardinería se ponen a prueba en esta
                historia con amor, flores y los altibajos que supone madurar.',
            'imagenContenido' => 'path/to/danjo_no_yuujou_wa_seiritsu_suru.jpg',
            'categoria_id' => $categoriaRomance->id,
        ]);

        Contenido::create([
            'nombreContenido' => 'Class no Daikirai na Joshi to Kekkon Suru Koto ni Natta',
            'informacion' =>  'El estudiante de preparatoria Hojo Saito está a punto de heredar la gran empresa de su
                abuelo. Para ello debe casarse con Akane Sakuramori, la chica a la que más detesta y que a
                su vez le detesta a él. Los dos están decididos a ocultar su imprevisto matrimonio a sus
                compañeros, pero al comenzar su nueva vida como pareja, la distancia que los separa
                comienza a reducirse.',
            'imagenContenido' => 'path/to/class_no_daikirai_na_joshi_to_kekkon_suru.jpg',
            'categoria_id' => $categoriaRomance->id,
        ]);

        Contenido::create([
            'nombreContenido' => 'Girumasu',
            'informacion' => 'Alina pensaba que había encontrado el trabajo perfecto como recepcionista del gremio.
                Un trabajo estable, tranquilo y con un uniforme monísimo. Pero este trabajo de ensueño se
                convierte en una pesadilla cada vez que los aventureros se quedan atrapados en el proceso
                de completar una mazmorra. Cansada de trabajar hasta las tantas por las noches, Alina
                decide acabar con los jefes ella misma. Sus impresionantes habilidades le han hecho
                ganarse el apodo de Verdugo. ¿Podrá mantener su identidad en secreto?',
            'imagenContenido' => 'path/to/girumasu.jpg',
            'categoria_id' => $categoriaFantasia->id,
        ]);

        Contenido::create([
            'nombreContenido' => 'Farmagia',
            'informacion' => 'En Felicidad, unos granjeros conocidos como los Farmagia crían monstruos bajo el pacífico
                gobierno del Magus Diluculum. Tras la muerte del Magus, estalla una lucha de poder entre
                fuerzas que utilizan monstruos para hacerse con el control. En la ciudad de Centvelt, el
                Farmagia Ten y sus amigos se unen para enfrentarse al nuevo y déspota gobernante, Glaza.
                Ten, sus amigos y los monstruos que han criado deberán mantenerse firmes para defender
                su libertad.',
            'imagenContenido' => 'path/to/farmagia.jpg',
            'categoria_id' => $categoriaFantasia->id,
        ]);


    }
}
