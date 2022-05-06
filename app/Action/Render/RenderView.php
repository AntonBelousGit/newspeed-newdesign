<?php


namespace App\Action\Render;

use Throwable;

class RenderView
{
    public function handle($cart, $response = [])
    {
        try {

            $header = view('layouts.components.icon-cart', compact('cart'))->render();
            $header_mobile = view('layouts.components.icon-cart-mobile', compact('cart'))->render();
            $cart_view = view('frontend.cart.components.cart')->render();
            $response['header'] = $header;
            $response['header_mobile'] = $header_mobile;
            $response['cart_view'] = $cart_view;
            return $response;

        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
    }
}
