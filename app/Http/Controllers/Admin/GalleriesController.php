<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\PageView;
use App\Repositories\GalleriesRepositories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GalleriesController extends Controller
{
    /**
     * @var GalleriesRepositories
     */
    private $galleriesRepositories;

    public function __construct()
    {
        $this->galleriesRepositories = app(GalleriesRepositories::class);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $data = request()->validate([
            'image' => '',
            'old_image' => '',
            'url' => '',
            'title' => '',
        ]);
        $data['title'] = isset($data['title']) ? array_filter($data['title']) : [];
        $data['url'] = isset($data['url']) ? array_filter($data['url']) : [];
        $data['old_image'] = isset($data['old_image']) ? array_filter($data['old_image']) : [];
        $data['image'] = isset($data['image']) ? array_filter($data['image']) : [];

        foreach ($data as $key_data => $images) {
            foreach ($images as $key_img => $item) {
                // dd($key_data);
                $images_array[$key_img]['title'] = $key_data == 'title' ? $item : $images_array[$key_img]['url'] = $key_data == 'url' ? $item : '';
                if ($key_data == "old_image" && is_string($item) && strlen($item) > 0) {
                    $images_array[$key_img]['img'] = $data['image'][$key_img] ?? $item;
                }
                if ($key_data == "image" && !is_string($item) && $item->isFile()) {
                    $images_array[$key_img]['img'] = $item;
                }
            }
        }
        ksort($images_array);
        $images_array = array_values($images_array);
        //dd($images_array);
        if (count($images_array) > 0) {
            $id = $gallery->id;
            $event = $this->galleriesRepositories->update_main_gallery($images_array, $id);
            if ($event->wasRecentlyCreated) {
                return back()->with('message', 'Gallery Updated');
            } else {
                return back()->with('fail', 'Something went wrong! Try again later!');
                //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function main()
    {
        $sidebar_db = $this->galleriesRepositories->findGallery(1);
        list($gallery, $chart_colors, $total_views, $views) = $this->galleriesRepositories->viewGallery($sidebar_db);
        return view('admin.galleries.main', compact('gallery', 'views', 'total_views', 'chart_colors'));
    }

    public function delete_main_gallery_image(Request $request)
    {
        if ($request->has('_token')) {
            $event = $this->galleriesRepositories->delete_main_gallery_image($request->image_id);
            return response()->json(['event' => json_encode($event)]);
        }
        return redirect()->back();
    }

    public function delete_main_gallery_block(Request $request)
    {
        if ($request->has('_token')) {
            $event = $this->galleriesRepositories->delete_main_gallery_block($request->block_id);
            return response()->json(['event' => json_encode($event)]);
        }
        return redirect()->back();
    }

    public function page_views_counter($user_id = NULL)
    {
        $fields = [];
        $fields['user_id'] = $user_id;
        $fields['token'] = $token = session('_token');
        $xsrf_token = request()->cookie('XSRF-TOKEN');
        $current_timestamp = Carbon::now()->timestamp;
        $page_view_old_cookie = request()->cookie('page_view');
        $page_view_db = new PageView;
        if ($user_id !== NULL) {
            $fields['cookie_page_view_name'] = $cookie_page_view_name = 'page_view';
            $fields['cookie_page_view_value'] = $cookie_page_view_value = $current_timestamp;
            $fields['user_ip'] = $user_ip = request()->ip();
            $fields['browser'] = $browser = request()->header('User-Agent');
            $fields['new_timestamps'] = $current_timestamp;
            $fields['registered_timestamps'] = $current_timestamp;

            $user_id_db = $page_view_db->where('user_id', '=', $user_id);
            $old_user_id_page_view = $user_id_db->count() > 0 ? $user_id_db->first()->id : NULL;
            $user_ip_db = $old_user_id_page_view == NULL ? NULL : $page_view_db->where('cookie', '=', $page_view_old_cookie)->where('user_ip', '=', $user_ip)->where('browser', '=', $browser);
            $old_user_ip_browser_page_views = $user_ip_db !== NULL && $user_ip_db->count() > 0 ? $user_ip_db->first()->id : NULL;
            $old_user_ip_db = $old_user_ip_browser_page_views == NULL ? NULL : $page_view_db->where('user_ip', '=', $user_ip);
            $old_user_ip_page_views = $old_user_ip_db !== NULL && $old_user_ip_db->count() > 0 ? $old_user_ip_db->first()->id : NULL;
            $view = PageView::update_registered_user_view($fields, $old_user_id_page_view ?? $old_user_ip_browser_page_views ?? $old_user_ip_page_views);
            Cookie::queue(Cookie::forever($cookie_page_view_name, $cookie_page_view_value));
        } elseif ($page_view_old_cookie !== null) {
            $fields['user_ip'] = $user_ip = request()->ip();
            $fields['browser'] = $browser = request()->header('User-Agent');
            $unregistered_user_view_db = $page_view_db->where('cookie', '=', $page_view_old_cookie)->where('user_ip', '=', $user_ip)->where('browser', '=', $browser);
            $unregistered_user_view_id = $unregistered_user_view_db->count() > 0 ? $unregistered_user_view_db->first()->id : NULL;

            $unregistered_user_ip_view_db = $page_view_db->where('user_ip', '=', $user_ip);
            $unregistered_user_ip_view_id = $unregistered_user_ip_view_db->count() > 0 ? $unregistered_user_ip_view_db->first()->id : NULL;

            $fields['cookie_page_view_name'] = $cookie_page_view_name = 'page_view';
            $fields['cookie_page_view_value'] = $cookie_page_view_value = Carbon::now()->timestamp;
            $fields['user_ip'] = $user_ip = request()->ip();
            $fields['browser'] = $browser = request()->header('User-Agent');
            $fields['new_timestamps'] = $current_timestamp = Carbon::now()->timestamp;
            $fields['registered_timestamps'] = $current_timestamp = Carbon::now()->timestamp;
//            $view = $unregistered_user_view_id !== null || $unregistered_user_ip_view_id !== null ? PageView::update_unregistered_user_view($fields, $unregistered_user_view_id ?? $unregistered_user_ip_view_id) : (PageView::add($fields));
            Cookie::queue(Cookie::forever($cookie_page_view_name, $cookie_page_view_value));
        } else {
            $fields['user_id'] = 2;
            $fields['cookie_page_view_name'] = $cookie_page_view_name = 'page_view';
            $fields['cookie_page_view_value'] = $cookie_page_view_value = Carbon::now()->timestamp;
            $fields['user_ip'] = $user_ip = request()->ip();
            $fields['browser'] = $browser = request()->header('User-Agent');
            $fields['new_timestamps'] = $current_timestamp;
            // $fields['registered_timestamps'] = $current_timestamp;
            $fields['cookie'] = $current_timestamp;
            $user_ip_db = $page_view_db->where('user_ip', '=', $user_ip);
            if ($user_ip_db->count() > 0) {
                $user_ip_id = $user_ip_db->first()->id;
                $view = PageView::update_unregistered_user_view($fields, $user_ip_id);
            } else {
                $view = PageView::add($fields);
            }
            Cookie::queue(Cookie::forever($cookie_page_view_name, $cookie_page_view_value));
        }

    }

    public function save_click_on_main_slider_href(Request $request): \Illuminate\Http\JsonResponse
    {
        $href = $request->href;
        $event = $this->galleriesRepositories->findGallery(1);
        if ($event) {
            $views = $this->galleriesRepositories->save_click_on_main_slider($href, $event);
            $event->update(['views' => json_encode($views)]);
            return response()->json(['event' => $href]);
        }
        abort(404);
    }

    public function main_statistics()
    {
        $sidebar_db = $this->galleriesRepositories->findFirstGallery(1);
        list($gallery, $chart_colors, $total_views, $views) = $this->galleriesRepositories->viewGallery($sidebar_db);
        return view('admin.galleries.includes.main_slider_view_counter_archive', compact('gallery', 'views', 'total_views', 'chart_colors'));
    }

    public function sliders()
    {
        $sidebar_db = $this->galleriesRepositories->findGallery(2);
        list($gallery, $chart_colors, $total_views, $views) = $this->galleriesRepositories->viewGallery($sidebar_db);
        return view('admin.galleries.sliders', compact('gallery', 'views', 'total_views', 'chart_colors'));
    }

    public function delete_sliders_gallery_image(Request $request)
    {
        if ($request->has('_token')) {
            $event = $this->galleriesRepositories->delete_sliders_gallery_image($request->image_id);
            return response()->json(['event' => json_encode($event)]);
        }
        return redirect()->back();
    }

    public function delete_sliders_gallery_block(Request $request)
    {
        //return response()->json([ 'event' => json_encode($request->block_id)]);
        if ($request->has('_token')) {
            $event = $this->galleriesRepositories->delete_sliders_gallery_block($request->block_id);
            return response()->json(['event' => json_encode($event)]);
        }
        return redirect()->back();
    }

    public function sliders_update(Request $request, Gallery $gallery)
    {
        //dd($request);
        $data = request()->validate([
            'image' => '',
            'old_image' => '',
            'url' => '',
            'title1' => '',
            'title2' => '',
        ]);
        $data['title1'] = isset($data['title1']) ? array_filter($data['title1']) : [];
        $data['title2'] = isset($data['title2']) ? array_filter($data['title2']) : [];
        $data = $this->getGalleryImage($data);
        foreach ($data as $key_data => $images) {
            foreach ($images as $key_img => $item) {
                // dd($key_data);
                $images_array[$key_img]['title1'] = $key_data == 'title1' ? $item : $images_array[$key_img]['title2'] = $key_data == 'title2' ? $item : $images_array[$key_img]['url'] = $key_data == 'url' ? $item : '';
                if ($key_data == "old_image" && is_string($item) && strlen($item) > 0) {
                    $images_array[$key_img]['img'] = $data['image'][$key_img] ?? $item;
                }
                if ($key_data == "image" && !is_string($item) && $item->isFile()) {
                    $images_array[$key_img]['img'] = $item;
                }
            }
        }
        ksort($images_array);
        $images_array = array_values($images_array);
        // dd($images_array);
        if (count($images_array) > 0) {
            $id = $gallery->id;
            $event = $this->galleriesRepositories->update_sliders_gallery($images_array, $id);
            if ($event->wasRecentlyCreated) {
                return back()->with('message', 'Gallery Updated');
            } else {
                return back()->with('fail', 'Something went wrong! Try again later!');
                //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
            }
        }
        return back();
    }

    public function move_banner_to_gallery(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = request()->validate([
            'id' => '',
            'gallery' => '',
        ]);
        $event = Gallery::move_banner_to_gallery($data);
        return response()->json(['id' => json_encode($data),]);
    }

    public function delete_banner_from_gallery(): \Illuminate\Http\JsonResponse
    {
        $data = request()->validate([
            'id' => '',
            'gallery' => '',
        ]);
        $event = Gallery::delete_banner_from_gallery($data);
        return response()->json(['id' => json_encode($data),]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function getGalleryImage(array $data): array
    {
        $data['url'] = isset($data['url']) ? array_filter($data['url']) : [];
        $data['old_image'] = isset($data['old_image']) ? array_filter($data['old_image']) : [];
        $data['image'] = isset($data['image']) ? array_filter($data['image']) : [];
        return $data;
    }

    /**
     * @param $key_data
     * @param $item
     * @param $data
     * @param $key_img
     * @param array $images_array
     * @return array
     */
    public function addOldAndNewImage($key_data, $item, $data, $key_img, array $images_array): array
    {
        if ($key_data == "old_image" && is_string($item) && strlen($item) > 0) {
            $images_array[$key_img]['img'] = $data ?? $item;
        }
        if ($key_data == "image" && !is_string($item) && $item->isFile()) {
            $images_array[$key_img]['img'] = $item;
        }
        return $images_array;
    }


}
