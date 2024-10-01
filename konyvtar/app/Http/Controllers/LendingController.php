<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    //
    public function index()
    {
        return Lending::all(); //== select * from lendings
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //legyszives töltsd ki az összes kérésnek megfelelően, ezután ő a mezőket beállítja, majd elmenti
        $record = new Lending();
        $record -> fill($request->all());
        $record -> save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id, $copy_id, $start)
    {

        //megadott paraméterek megfelelnek e a mezőknek
        //lekérdezem ennek ereedményét, és szeretném egyetlen (nulladikelem) ???
        //listával tér vissza, ebből kell kiszednem ezt a nulladikelemet

        //összeegyeztetni hogy megfelelnek e egymásnak az adatok
        //ha igen akkor egy listával tér vissza
        //ebben a listában egyetlen elemlesz, ezt ki kell szednem, és ezzel szeretnék visszatérni
        $lending = Lending::where('user_id', $user_id) //lendings tablaban szeretném emgtalálni a rekordot amit elsőként poarméterkénnt adtam, másodikként stb, lekérdezi, ez egy lista, lista első elemét ő visszaadja
        ->where('copy_id', $copy_id)
        ->where('start', $start)
        //listát ad vissza
        ->get();
        return $lending[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $copy_id, $start)
    {
        //store párja, ahhoz h modosits valamit meg kell adnod h mit szeretnél modositani
        //3 dolog kell hozzá
        //meglévő rekorrdomat csak át akarom irni, végén mentse el
        $record = $this->show($user_id, $copy_id, $start);
        $record -> fill($request->all());
        $record ->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $copy_id, $start)
    {
        //show megtalálja a rekordot
        //itt törölni akarunk
        $this->show($user_id, $copy_id, $start)->delete();
    }
}
