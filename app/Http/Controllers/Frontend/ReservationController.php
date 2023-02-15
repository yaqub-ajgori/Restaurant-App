<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $minDate = Carbon::today();
        $maxDate = Carbon::today()->addWeek();
        return view ('frontend.reservations.step-one', compact('reservation', 'minDate', 'maxDate'));
    }

    public function stepOneStore(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'res_date' => ['required', 'date', new \App\Rules\DateBetween, new \App\Rules\TimeBetween],
            'guest_number' => 'required|integer',
        ]);

        if ( empty($request->session()->get('reservation')) ) {
            $reservation = new Reservation();
            $reservation->fill($validatedData);
            $request->session()->put('reservation', $reservation);

        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validatedData);
            $request->session()->put('reservation', $reservation);
        }

        return redirect()->route('reservation.step.two');
    }




    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_tables_ids = Reservation::orderby('res_date')->get()->filter( function($value) use($reservation) {
            return $value->res_date == $reservation->res_date;
        })->pluck('table_id');



        $tables = Table::where('status', 'available')->get()
        ->whereNotIn('id', $res_tables_ids)
        ->where('guests_number', '>=', $reservation->guest_number);

        return view ('frontend.reservations.step-two', compact('tables', 'reservation'));
    }

    public function stepTwoStore(Request $request)
    {
        $validatedData = $request->validate([
            'table_id' => 'required|integer',
        ]);

        $reservation = $request->session()->get('reservation');
        $reservation->fill($validatedData);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankyou');
    }


}
