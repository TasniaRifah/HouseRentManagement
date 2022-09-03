<?php



namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        
        $cartItems = [];
        if ($cart) {
            $cartItems = $cart->items()->with('product')->get();
        }

        return view('frontend.cart', compact('cart', 'cartItems'));
    }

    public function store(Product $product)
    {
        $user = auth()->user();

        if ($cart = $user->cart) {
            // $cart->update([
            //     'total_price' => //new price
            // ]);
        } else {
            $user->cart()->create([
                'total_price' => 0,
            ]);
        }

        $unitPrice = $product->rent;
        $qty = request()->qty;

        $user->cart->items()->create([
            'product_id' => $product->id,
            'unit_price' => $unitPrice,
            'qty' => $qty,
            'total_price' => $unitPrice * $qty
        ]);

        return response()->json(
            [
                'status' => true,
                'data' => $user->cart,
                'message' => 'Cart Added Successfully !'
            ]
        );
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json([
            'status' => true,
            'message' => 'Item removed from cart successfully',
        ]);
    }
}


