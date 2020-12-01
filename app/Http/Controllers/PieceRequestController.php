<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PieceType;
use App\Models\Pattern;
use App\Models\Customer;

class PieceRequestController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'type1' => ['required'],
            'pattern1' => ['required'],
            'quantity1' => ['required']
        ]);
    }

    /**
     * Show the request form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        return view('form', [
            'pieces' => PieceType::all(),
            'patterns' => Pattern::all()
        ]);
    }

    /**
     * Process the request form.
     *
     * @return \Illuminate\Http\Response
     */
    public function processRequest(Request $request) {
        $data = $request->all();

        //determine if customer already exists, if not, create new customer.
        $customer = Customer::where('email', $data['email'])->first();

        if(!$customer) {
            $customer = Customer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ]);
        }

        //process piece request data
        $requests = array();

        $requests[] = $customer->requests()->create([
            'piece_type_id' => $data['type1'],
            'pattern_id' => $data['pattern1'],
            'quantity' => $data['quantity1']
        ]);

        if($data['type2'] && $data['pattern2'] && $data['quantity2']) {
            $requests[] = $customer->requests()->create([
                'piece_type_id' => $data['type2'],
                'pattern_id' => $data['pattern2'],
                'quantity' => $data['quantity2']
            ]);
        }

        if($data['type3'] && $data['pattern3'] && $data['quantity3']) {
            $requests[] = $customer->requests()->create([
                'piece_type_id' => $data['type3'],
                'pattern_id' => $data['pattern3'],
                'quantity' => $data['quantity3']
            ]);
        }

        //format response message 
        $message = '<div class="alert bg-info text-light"><p>Thank you! Your request has been submitted. You will be notified when the following items are in stock:</p><ul>';
        foreach($requests as $piece_request) {
            $message .= '<li>' . $piece_request->pattern->name . ' ' . ucwords($piece_request->type->name) . ' (' . $piece_request->quantity . ')</li>'; 
        }
        $message .= '</ul></div>';
        return response()->json(['customer' => $customer, 'message' => $message]);

    }
}
