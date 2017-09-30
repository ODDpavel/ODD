<?php


use Phinx\Seed\AbstractSeed;

class BoardGamesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'games_id'=>'1',
                'titleGame'=>'Monopoly',
                'description'=>'Monopoly is a board game where players roll two six-sided dice to move around the game-board buying and trading properties, and then develop them with houses and hotels.',
                'price_$'=>'10.50'
            ),
            array(
                'games_id'=>'2',
                'titleGame'=>'The Settlers of Catan',
                'description'=>' Players assume the roles of settlers, each attempting to build and develop holdings while trading and acquiring resources. Players are awarded points as their settlements grow.',
                'price_$'=>'14.50'
            ),
            array(
                'games_id'=>'3',
                'titleGame'=>'Ticket to Ride',
                'description'=>' Ticket to Ride is a cross-country train adventure where players collect cards of various types of train cars that enable them to claim railway routes connecting cities in various countries around the world.',
                'price_$'=>'19.50'
            )
        );
        $table = $this->table('BoardGames');
        $table->insert($data)->save();
    }
}
