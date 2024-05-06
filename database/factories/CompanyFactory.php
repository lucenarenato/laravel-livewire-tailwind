<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Helpers\FactoryHelper;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
*/
class CompanyFactory extends Factory
{

    // protected $catchPhraseFormats = array(
    //     '{{noun}} {{verb}} {{attribute}}',
    //     '{{noun}} ET {{noun}} {{attribute}}',
    //     '{{noun}} ET {{noun}} {{mutipleAttribute}}',
    // );
    // protected static $noun = array('la sécurité', 'le plaisir', "l'ambiance", "l'efficacité", 'le confort', 'la simplicité', 'la qualité', "l'assurance", 'la santé', 'la technologie', "l'art", 'le pouvoir', 'le prestige', "l'honneur", 'la chance',  'la faculté', 'la possibilité', 'le droit', "l'avantage", 'la liberté');

    // protected static $verb = array('de rouler', "d'avancer", "d'évoluer", 'de changer', "d'innover", 'de louer', "d'atteindre vos buts", 'de concrétiser vos projets');

    // protected static $attribute = array('moins cher', 'plus efficacement', 'plus rapidement', 'plus facilement', 'plus simplement',  'en toute tranquillité', 'avant-tout', "d'abord", 'autrement', 'naturellement', 'à la pointe', 'sans soucis', 'supérieurs', "à l'état pur", 'à sa source', 'sûre', 'pour la vie');

    // protected static $multipleAttribute = array('sont nos priorités',  'sont nos points forts', 'font notre force', 'qui assurent', 'sont nos passions');

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition()
    {
        //$catchPhrase = FactoryHelper::language('fr_FR')->catchPhrase();
        //$catchPhrase = FactoryHelper::language('es_ES')->times(3)->catchPhrase();
        return[
            'name' => $this->faker->company,
            'image_path' => $this->faker->imageUrl(width:620,height:480),
            'location' => $this->faker->city,
            'industry' => FactoryHelper::language('es_ES')->catchPhrase(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }


}
