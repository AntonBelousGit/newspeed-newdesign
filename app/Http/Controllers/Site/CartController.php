<?php

namespace App\Http\Controllers\Site;

use App\Action\Render\RenderViewAction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\ProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function cart()
    {
        $cart = Cart::instance('shopping')->content();
        dd($cart);
    }

    public function cartStore(Request $request, RenderViewAction $action)
    {
        $product_id = (int)$request->input('product_id');

        $product = $this->productService->getProductByID($product_id);
        $price = $product->sale_price;
        $cart = Cart::instance('shopping');
        $result = $cart->add($product_id, $product->name, 1, $price)->associate(Product::class);

        if ($result) {
            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = "Item was added to your cart";
        }

        if ($request->ajax()) {
            $response = $action->handle($cart, $response);
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    public function cartDelete(Request $request, RenderViewAction $action)
    {
        $id = $request->input('cart_id');
        $cart = Cart::instance('shopping');
        $cart->remove($id);

        $response['status'] = true;
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();
        $response['message'] = "Product successfully removed";


        if ($request->ajax()) {
          $response = $action->handle($cart, $response);
        }

        return $response;
    }

    public function cartUpdate(Request $request, RenderViewAction $action)
    {
        $data = $this->validate($request, [
            'product_qty' => 'required|numeric',
            'rowId'=>'required|string',
        ]);
        $rowId = $data['rowId'];
        if (!$rowId) {
            $response['status'] = false;
            return $response;
        }
        $request_quantity = $data['product_qty'];
        $cart = Cart::instance('shopping');

        $cart->update($rowId, $request_quantity);
        $response['status'] = true;
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();

        if ($request->ajax()) {
            $response = $action->handle($cart, $response);
        }
        return $response;
    }
}
