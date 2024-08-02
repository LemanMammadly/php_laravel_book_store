<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $userId = null;
        if (Auth::check() && Auth::user()) {
            $userId = Auth::user()->id;
        }

        $validation = Validator::make($request->all(), [
            'text' => 'string|required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        try {
            Review::create([
                'text' => $request->text,
                'rating' => $request->rating,
                'user_id' => $userId,
                'product_id' => $request->product_id,
            ]);


            return redirect()->back()->with('success', 'Review created successfully');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Review create failed' . $ex->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $review = Review::find($id);
            $userId = null;
            if (Auth::check() && Auth::user()) {
                $userId = Auth::user()->id;
            }

            if ($userId == $review->user_id) {
                $review->delete();
            }
            return redirect()->back()->with('Success', 'Delete successfully')->withInput();
        } catch (\Exception $ex) {
            return redirect()->back()->with('Error', 'Delete not worked')->withInput();
        }
    }
}
