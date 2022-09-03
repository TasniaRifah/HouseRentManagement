<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Booking;

use App\Models\Slider;
use App\Models\user;
use auth;
use COM;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function booking(Product $product)
    {
        return view('frontend.booking',compact('product'));
    }
    public function checkoutAddress(Product $product)
    {
        $user = auth()->user();

        return view('frontend.checkoutAddress',compact('product', 'user'));
    }
    public function checkoutPayment(Product $product)
    {
        return view('frontend.checkoutPayment',compact('product'));
    }
    public function checkoutReview(Product $product)
    {
        return view('frontend.booking',compact('product'));
    }

    public function store(Request $request)
    {
         dd($request);
        try {
            $user = auth()->user();
            DB::beginTransaction();
            $booking = $user->bookings()->create([
                'address' => $request->address,
                'invoice_number' => date('dmy') . time(),
                'NID'=>$request->NID,
                'mobile'=>$request->mobile
            ]);

            $requesedItemsId = $request->item_id;
            $requesedItemQty = $request->qty;
            $data = [];
            for ($i = 0, $max = count($requesedItemsId); $i < $max; $i++) {
                $productId = $requesedItemsId[$i];
                $product = Product::select('id', 'title', 'image', 'price')
                    ->whereId($productId)->firstOrFail();
                $qty = $requesedItemQty[$i];
                $data[] = [
                    'unit_price' => $product->price,
                    'qty' => $qty,
                    'total_price' => $product->price * $qty,
                    'product_id' => $productId,
                    'meta' => json_encode($product->toArray())
                ];
            }
            $booking->items()->createMany($data);

            $this->removeCart($user);

            DB::commit();
            // Mail::to(auth()->user())->send(new OrderPlaced($order));
            return redirect()->route('homepage');
        } catch (QueryException $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
    public function removeCart($user)
    {
        foreach ($user->cart->items as $cartItem) {
            $cartItem->delete();
        }
        $user->cart->delete();
    }
}
