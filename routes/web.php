<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/save-menu', function(Request $request) {
    $img = Image::make(public_path('img/bg_screen01.png'));

    $leftTitle = $request->left_title ?? 'FAJITAS';
    $img->text(strtoupper($leftTitle), 25, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $centerTitle = $request->center_title ?? 'BURRITOS';
    $img->text(strtoupper($centerTitle), 730, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $rightTitle = $request->right_title ?? 'TACOS';
    $img->text(strtoupper($rightTitle), 1350, 50, function($font) {
        $font->file(public_path('font/Roboto/Roboto-Bold.ttf'));
        $font->size(60);
        $font->color('#FFFFFF');
        $font->valign('top');
    });

    $image = $request->image ?? 'img/fajitas.png';
    $img->insert(public_path($image), 'top-left', 15, 165);
    $img->save(public_path('img/bg_screen01_output.png'));
    return response()->json(['status' => true]);
})->name('saveMenu');

Route::get('/player', function(Request $request) {
    return view('player');
})->name('player');

Route::get('/get-menu', function(Request $request) {
    return response()->json([
        'status' => true,
        'imagePath' => 'img/bg_screen01_output.png?ver='.uniqid(),
        'videoPath' => 'video/ch.mp4',
    ]);
})->name('getMenu');

Route::get('/xibo', function(Request $request) {
    $provider = new \Xibo\OAuth2\Client\Provider\Xibo([
        'clientId' => env('XIBO_CLIENT_ID'),
        'clientSecret' => env('XIBO_CLIENT_SECRET'),
        'redirectUri' => '',
        'baseUrl' => env('XIBO_BASE_URL'),
    ]);

    $entityProvider = new \Xibo\OAuth2\Client\Provider\XiboEntityProvider($provider);
    $layout = (new \Xibo\OAuth2\Client\Entity\XiboLayout($entityProvider))->getById(9);
    $layout = (new \Xibo\OAuth2\Client\Entity\XiboLayout($entityProvider))->get(['layoutId' => 10, 'embed' => 'regions, playlists, widgets, campaigns, permissions']);

    // Example v2.2 usage
    // $entityProvider->get('/layout', ['layoutId' => $layout->layoutId]);
    //
    // create layout
    // (new \Xibo\OAuth2\Client\Entity\XiboLayout($entityProvider))->create($name, $description, $layoutId, $resolutionId);
    //
    // $layout = (new \Xibo\OAuth2\Client\Entity\XiboLayout($entityProvider))->create('html trial 1', null, 0, 9);
    // will create region and playlist
    // $region = $layout->regions[0]
    // $playlist = $region->playlists[0]
    //
    // create embed widget
    // $embedHtml = '<html><body><center><h1>ACHU</h1></center></body><html>';
    // $embedWidget = (new \Xibo\OAuth2\Client\Entity\XiboEmbedded($entityProvider))->create($name, $duration, $useDuration, $transparency, $scaleContent, $embedHtml, $embedScript, $embedStyle, $playlistId)
    // $embedWidget = (new \Xibo\OAuth2\Client\Entity\XiboEmbedded($entityProvider))->create('source html', 0, 0, 1, 1, $embedHtml, null, null, $playlist['playlistId']);
    //
    // copy layout
    // $layout->copy($name, $description, $copyMediaFiles);
    //
    // create region; a playlist is autmatically created
    // $layout->createRegion($width, $height, $top, $left);
    //
    //
    // create library - check whether omitted; if using copy layout with mediafiles?
    // create custom name => as to avoid overlap and save filename for display to a common field.
    // (new Xibo\OAuth2\Client\Entity\XiboLibrary($entityProvider))->create($name, $fileLocation);
    //
    // media id
    // $media->mediaId
    // where 9 is the resolutionID
    // $layout->edit($layout->layout, $layout->description, null, null, null, $media->mediaId, null, 9);
    // [or] in version 2.2
    // $entityProvider->put('/layout/background/'.$layout->layoutId, [
    //  'backgroundImageId' => $media->mediaId,
    //  'backgroundColor' => null,
    //  'backgroundzIndex' => 0,
    // ]);
    //
    $layout->createRegion(1920, 1080, 0, 0);

    $entityProvider->get('/layout', ['layoutId' => 10, 'embed' => 'regions, playlists, widgets, campaigns, permissions']);

    $background = public_path('img/13219.jpg');
    $media = (new Xibo\OAuth2\Client\Entity\XiboLibrary($entityProvider))->create(basename($background), $background);

    $playlist = $entityProvider->post('/playlist', ['name' => 'adada', 'isDynamic' => 0]);

    // createRegion($width, $height, $top, $left)

    $region = new \Xibo\OAuth2\Client\Entity\XiboRegion();
    $region->regionId = 26;

    // get all displays
    // fetch using license
    // make sure to rename the display to the clients name with display-number suffix
    // save to clients information
    $displays = (new Xibo\OAuth2\Client\Entity\XiboDisplay($entityProvider))->get();
    $displayId = 1;
    $authorizeDisplay = $entityProvider->put('/display/authorise/'.$displayId);

    $displayGroup = (new Xibo\OAuth2\Client\Entity\XiboDisplayGroup($entityProvider))->create('ubuntu', null, 0, null);
    $displayGroup->assignDisplay($displayId);


    // if there are multiple layouts - use campaign
    $campaign = (new Xibo\OAuth2\Client\Entity\XiboCampaign($entityProvider))->create('ubuntu campaign');
    $campaign->assignLayout(3);

    // createEventLayout($fromDt, $toDt, $campaignId, $displaygroupIds, $dayPartId, $recurrenceType, $recurrenceDetail, $recurrenceRange, $displayOrder, $isPriority)
    // if there are multiple display - use display group;
    // if there are multiple layouts - use campaign; for scheduling
    // $schedule = (new Xibo\OAuth2\Client\Entity\XiboSchedule($entityProvider))->createEventLayout('2020-05-16 13:25:00', '2020-05-17 13:25:00', 3, [2], 2, null, 0, null, 1, 0);
    $schedule = (new Xibo\OAuth2\Client\Entity\XiboSchedule($entityProvider))->createEventLayout('2020-05-16 13:25:00', '2020-05-17 13:25:00', 3, [1], 1, null, 0, null, 1, 0);

})->name('xibo');
