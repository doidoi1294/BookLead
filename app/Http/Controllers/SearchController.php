<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $client = new RakutenRws_Client();
        $client->setApplicationId('1068656044194756392');
        $client->setAffiliateId('708d3e7a5b48224ced5a44d38463ab70f77ce713');

        $keyword = $request->input('keyword', '本'); // デフォルトは「本」

        $response = $client->execute('IchibaItemSearch', ['keyword' => $keyword]);

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $items = [];
            foreach ($response as $key => $rakutenItem) {
                $items[$key]['title'] = $rakutenItem['itemName'];
                $items[$key]['price'] = $rakutenItem['itemPrice'];
                if ($rakutenItem['imageFlag']) {
                    $imgSrc = $rakutenItem['mediumImageUrls'][0]['imageUrl'];
                    $items[$key]['img_src'] = preg_replace('/^http:/', 'https:', $imgSrc);
                }
            }
            return view('search.index', ['items' => $items]);
        }
    }
}
