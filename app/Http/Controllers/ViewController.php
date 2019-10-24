<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Services\PokeData;

class ViewController extends Controller
{

    private const DEFAULT_URL = 'https://pokeapi.co/api/v2/pokemon/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index', [
            'data' => (new PokeData)
                ->getResultSet(self::DEFAULT_URL)
                ->gatherIndividualDataFromResults()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNewResults()
    {
        $options = [
            'offset'    => request()->get('offset'),
            'limit'     => request()->get('limit')
        ];
        $url = (new UrlBuilder)
            ->setDefaultURL(self::DEFAULT_URL)
            ->setOptions($options)
            ->build();
        $data = (new PokeData)
            ->getResultSet($url)
            ->gatherIndividualDataFromResults();
        return view('includes.resultSort', ['data' => $data])->render();
    }

    public function singular(string $name)
    {
        return view('pages.singular', [
            'data' => (new ApiRequestController)->callApi(self::DEFAULT_URL . $name)
        ]);
    }

    public function search()
    {
        return view('pages.search');
    }
    public function searchResults()
    {
        return redirect()->route('pokemon.show', request()->input('searchTerm'));
    }

}
