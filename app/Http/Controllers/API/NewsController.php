<?php

namespace IPMEDT4K\Http\Controllers\API;

use Feeds;
use Illuminate\Http\Request;
use IPMEDT4K\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // Get NU.nl general new feed.
        $items = Feeds::make('http://www.nu.nl/rss/Algemeen')->get_items();

        // Empty feed array.
        $feed = [];

        // Loop through each item.
        foreach ($items as $item) {

            // Create an item with the information we need.
            $item = [
                'date' => $item->get_date(),
                'title' => $item->get_title(),
                'description' => $item->get_description(),
            ];

            // Push the item to the feed array.
            array_push($feed, $item);
        }

        // Return the feed to the page.
        return response(json_encode($feed));
    }
}
