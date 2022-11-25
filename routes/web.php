<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('PROGRAMS', ['the-humans', 'program-2', 'program-3']);
define('ADDITIONAL_PAGES', ['humber-theatre']);

enum DepartmentTypes:string {
    case Performance = "performance";
    case GuestArtist = "guest artist";
    case Production = "production";

    public function color(): string {
        return match($this) {
            DepartmentTypes::Performance => '#0C87CE',
            DepartmentTypes::GuestArtist => '#EA7994',
            DepartmentTypes::Production => '#3FA276'
        };
    }
}

Route::get('/', function() {
    return view('home');
});
Route::get('/programs', function() {
    return view('programs', [
        'programs' => PROGRAMS
    ]);
});
Route::get('/humber-theatre', function() {
    $testData = [
        'faculty_involved' => [
            'year' => 2020,
            'members' => [
                [
                    'name' => 'Guillermo Acosta',
                    'role' => 'Dean, Faculty of Media and Creative Arts'
                ],
                [
                    'name' => 'Sylvia Sweeney',
                    'role' => 'Associate Dean, Faculty of Media and Creative Arts'
                ],
                [
                    'name' => 'Tom Baranski',
                    'role' => 'Faculty Department Head of Carpentry'
                ],
                [
                    'name' => 'Tanya Greve',
                    'role' => 'Director Theatre Production'
                ],
                [
                    'name' => 'Nina Hartt',
                    'role' => 'Faculty Department Head of Properties'
                ],
                [
                    'name' => 'Fides Krucker',
                    'role' => 'Voice Professor, Vocal Research'
                ],
                [
                    'name' => 'Richard Lee',
                    'role' => 'Academic Program Manager'
                ],
                [
                    'name' => 'Laird Macdonald',
                    'role' => 'Faculty Department Head of Lighting'
                ],
                [
                    'name' => 'Barbara Martin',
                    'role' => 'Faculty Department Head of Wardrobe'
                ],
                [
                    'name' => 'Sharon B. Moore',
                    'role' => 'Head of Movement, Movement Director'
                ],
                [
                    'name' => 'Emily Porter',
                    'role' => 'Faculty Department Head of Sound'
                ],
                [
                    'name' => 'David Rayfield',
                    'role' => 'Faculty Department Head of Paint'
                ],
                [
                    'name' => 'John Reid',
                    'role' => 'Technical Director'
                ],
                [
                    'name' => 'Joe Bowden',
                    'role' => 'PSO'
                ],
            ]
        ],
        'faculty' => ['Derek Aasland', 'Liza Balkan', 'Rick Banville', 'John Beale', 'Tyrone Benskin', 'Cameron Davis', 'Paul De Jong', 'Chris Earle', 'Colin Edwards', 'Nina Hartt', 'Jonathan Higgins', 'Heather Hill', 'Ann Hodges', 'Pam Johnson', 'Rob Kempson', 'Mike Kirby', 'Fides Krucker', 'Keira Loughran', 'Laird Macdonald', 'Barbara Martin', 'Bob McCollum', 'John Millard', 'Andrew Moodie', 'Sharon B. Moore', 'Remington North', 'Emily Porter', 'David Rayfield', 'John Reid', 'Shawna Reiter', 'Michelle Smith', 'Christopher Stanton', 'Terry Tweed', 'Kara Wooten', 'Ryan Young']
    ];

    return view('acknowledgment', $testData);
});
Route::get('/{program}', function($program) {
    // Convert program name into a formatted title
    $programTitleWords = explode("-", $program);
    $formattedString = ucwords(join(" ",$programTitleWords));

    // This will be retrieved from the database based on 'humans' which will be replaced with a wildcard
    // Will most likely need to make a Model to define this data
    $testData = [
        'title' => $formattedString,
        'img' => [
            'src' => '/imgs/TheHumans.png',
            'alt' => 'The Humans Poster',
            'caption' => 'Poster image by Mira Aguayo'
        ],
        'writer' => 'Stephen Karam',
        'about' => [
            'The Blake family’s traditionally tame holiday visit slowly degenerates into chaos, as the family’s deepest fears rise to the surface. In an increasingly unfamiliar world, their insecurities and secrets risk making this their last Thanksgiving together.',
            'A darkly comic play filled with both laughter and pain, The Humans will take you on a unique journey reflective of today’s uncertainty, chaos, and change. Featuring a special appearance by a peppermint pig...'
        ],
        'directed_by' => 'Christopher Stanton',
        'dates' => [
            [
                'date_time' => "2022-12-9T19:00:00",
                'details' => 'Humans 1.0 - Performance Program ONLY – Preview'
            ],
            [
                'date_time' => "2022-12-10T19:00:00",
                'details' => 'Humans 2.0 (Production) & 1.0 (Performance)'
            ],
            [
                'date_time' => "2022-12-11T19:00:00",
                'details' => 'Humans 2.0 (Production) & 1.0 (Performance)'
            ]
        ],
        'location' => 'Online',
        'advisory' => ['Strong Language', 'Mature Content']
    ];

    return view('about', $testData);
})->whereIn('program', array_merge(PROGRAMS, ADDITIONAL_PAGES));

Route::get('/{program}/contributors', function ($program) {
    // Convert program name into a formatted title
    $programTitleWords = explode("-", $program);
    $formattedString = ucwords(join(" ",$programTitleWords));

    $testData = [
        'program' => $formattedString,
        'departments' => DepartmentTypes::cases(),
        'contributors' => [
            [
                'name' => 'Caleigh Adams',
                'department' => DepartmentTypes::Performance,
                'role' => 'Aimee - Part 2',
                'bio' => "Born and raised in the GTA, Caleigh is a queer actor, writer, and theatre creator, proud to be graduating from the Theatre Performance Program in 2021. Trained in devised and physical theatre, she is drawn to socially engaged projects prioritizing historically underrepresented voices. After spending two years in York University's Film Production BFA, she’s happy to combine her film production knowledge and enthusiasm with her love of theatre. Caleigh has a myriad of interests including expanding her movement horizons, language, and the outdoors. She is thrilled to be working alongside her Humber ensemble and director Christopher Stanton in The Humans."
            ],
            [
                'name' => 'Maddie Bautista',
                'department' => DepartmentTypes::GuestArtist,
                'role' => 'Sound Designer',
                'bio' => "Maddie Bautista is a Bi, Saudi Arabia-born Filipinx sound designer and composer. Maddie has been nominated for a Dora Award for her music in Eraser at RISER 2019, and also nominated for the 2020 Pauline McGibbon Award. Selected sound credits: OIL (ARC), bug (Theatre Passe Muraille), Wah Wah Wah (Wildside 2020), Private Eyes (lemonTree creations), Our Fathers, Sons, Lovers, and Little Brothers (b current). She is Co-Artistic Producer of Bad Muse Collective with Korean-Canadian sound designer Deanna H. Choi. Bad Muse is currently in residence with fu-GEN Theatre to create Love You Wrong Time. www.maddiebautista.com"
            ],
            [
                'name' => 'Ethan Belaisis',
                'department' => DepartmentTypes::Production,
                'role' => 'Paint',
                'bio' => "Hello! My name is Ethan Belaisis, I am a 2nd year in the Theatre Technical Production Course. I enjoy classes such as Props, Scenic Painting, Carpentry as well as Computer Applications. This year has been very different compared to my first year due to the Pandemic and I’ll admit it has been quite the ride. I am currently placed in the Scenic Paint department and I find the work to be quite enjoyable and relaxing most of the time, although some days can prove to be more challenging than others, we will try our best to make sure that we get the work done because the show must go on! There are constant changes because of Covid-19 and we always make sure that we work in a safe sanitized environment and manner as I get to learn how to manage myself in the Paint shop and get the experience that I seek in order to achieve my goals."
            ],
            [
                'name' => 'Eugene Braganza',
                'department' => DepartmentTypes::Production,
                'role' => 'Lighting',
                'bio' => "Eugene Braganza began learning music at the age of four and as a teenager performed in multiple school productions. As an adult he taught music and theatre to children, assisting with school productions of Dr. Seuss’ The Lorax, The Lion King, Aladdin and Matilda – The Musical. At Humber he has worked on the production of Pandora in Bluejeans and The Humans. Eugene wishes to pursue a professional career in the theatre industry as a Technical Director."
            ]
        ]
    ];

    return view('contributors', $testData);
})->whereIn('program', PROGRAMS);