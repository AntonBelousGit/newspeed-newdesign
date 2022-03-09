<?php


namespace App\Repositories;

use App\Models\Gallery as Model;
use Carbon\Carbon;

/**
 * Class GalleriesRepositories
 * @package App\Repositories
 */
class GalleriesRepositories extends CoreRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $id
     * @param $gallery_db
     * @param array $gallery_array
     */
    public static function updateGallery($id, $gallery_db, array $gallery_array): void
    {
        if (isset($id)) {
            $gallery_db->update([
                'value' => $gallery_array
            ]);
        }
    }

    /**
     * @param $id
     */

    public function findGallery($id)
    {
        return $this->startCondition()->find($id);
    }

    public function findGalleryQuery($id, $where_id)
    {
        return $this->startCondition()->where('id', '=', $where_id)->find($id);
    }

    public function findFirstGallery($id)
    {
        return $this->startCondition()->where('id', '=', $id)->first();
    }

    /**
     * @param $sidebar_db
     * @return array
     */

    public function viewGallery($sidebar_db): array
    {
        $gallery = $sidebar_db->value ?? null;
        $views = $total_views = $chart_colors = $views_count_column = $timestamp_views_array_column = null;
        if ($sidebar_db !== null && $sidebar_db->views !== null) {
            $views = json_decode($sidebar_db->views, true);
            $views_count_column = array_column($views, 'count_views');
            $href_array_column = array_column($views, 'href');
            $timestamp_views_array_column = array_column($views, 'timestamp_views');
            array_multisort($views_count_column, SORT_DESC, $timestamp_views_array_column, SORT_DESC, $views);
            $total_views = array_sum($views_count_column);
            $chart_colors = ['blue', 'purple', 'yellow', 'green'];
        }
        return array($gallery, $chart_colors, $total_views, $views, $views_count_column, $timestamp_views_array_column);
    }

    public function delete_main_gallery_image($id)
    {
        $gallery_db = self::findGalleryQuery($id, 1);

        if ($gallery_db->exists()) {
            $gallery_value = $gallery_db->first()->value;
            $gallery_array = $gallery_value !== null ? $gallery_value : null;
            if ($gallery_array !== null && count($gallery_array) > 0 && array_key_exists($id, $gallery_array)) {
                $imagename = $gallery_array[$id]["img"];
                if ($imagename !== null) {
                    if (file_exists(public_path('/storage/galleries/main_gallery/' . $imagename))) {
                        unlink(public_path('/storage/galleries/main_gallery/' . $imagename));
                    }
                    $gallery_array[$id]["img"] = '';
                    self::updateGallery($id, $gallery_db, $gallery_array);
                    return $gallery_db;
                }
            }
        }
    }

    public function delete_main_gallery_block($id)
    {

        $gallery_db = self::startCondition()->findGalleryQuery($id, 1);

        if ($gallery_db->exists()) {
            $gallery_value = $gallery_db->first()->value;
            $gallery_array = $gallery_value !== null ? $gallery_value : null;
            if ($gallery_array !== null && count($gallery_array) > 0 && array_key_exists($id, $gallery_array)) {
                $imagename = $gallery_array[$id]["img"];
                if (($imagename !== null || $imagename !== '') && strlen($imagename) > 0) {
                    if (file_exists(public_path('/storage/galleries/main_gallery/' . $imagename))) {
                        unlink(public_path('/storage/galleries/main_gallery/' . $imagename));
                    }
                }
                unset($gallery_array[$id]);
                $gallery_array = array_values($gallery_array);
                self::updateGallery($id, $gallery_db, $gallery_array);
                return $gallery_db;
            }
        }
    }

    public function save_click_on_main_slider($href, $event)
    {
        $current_timestamp = Carbon::now()->timestamp;
        $views = $event->views;
        if ($views !== null) {
            $views = json_decode($views, true);
            $array_key = array_search($href, array_column($views, 'href'));
            if (is_int($array_key)) {
                array_push($views[$array_key]['timestamp_views'], $current_timestamp);
                $views[$array_key]['count_views'] = $views[$array_key]['count_views'] + 1;
            } else {
                $new_href_view = [
                    'href' => $href,
                    'timestamp_views' => [$current_timestamp],
                    'count_views' => 1,
                ];
                array_push($views, $new_href_view);
            }
        } else {
            $views = [[
                'href' => $href,
                'timestamp_views' => [$current_timestamp],
                'count_views' => 1,
            ],
            ];
        }
        return $views;
    }

    public function delete_sliders_gallery_image($id)
    {
        $gallery_db = self::findGalleryQuery($id, 2);

        if ($gallery_db->exists()) {
            $gallery_value = $gallery_db->first()->value;
            $gallery_array = $gallery_value !== null ? $gallery_value : null;
            if ($gallery_array !== null && count($gallery_array) > 0 && array_key_exists($id, $gallery_array)) {
                $imagename = $gallery_array[$id]["img"];
                if ($imagename !== null) {
                    if (file_exists(public_path('/storage/galleries/sliders_gallery/' . $imagename))) {
                        unlink(public_path('/storage/galleries/sliders_gallery/' . $imagename));
                    }
                    $gallery_array[$id]["img"] = '';
                    self::updateGallery($id, $gallery_db, $gallery_array);
                    return $gallery_db;
                }
            }
        }
    }

    public function delete_sliders_gallery_block($id)
    {
        $gallery_db = self::findGalleryQuery($id, 2);

        if ($gallery_db->exists()) {
            $gallery_value = $gallery_db->first()->value;
            $gallery_array = $gallery_value !== null ? $gallery_value : null;
            if ($gallery_array !== null && count($gallery_array) > 0 && array_key_exists($id, $gallery_array)) {
                $imagename = $gallery_array[$id]["img"];
                if (($imagename !== null || $imagename !== '') && strlen($imagename) > 0) {
                    if (file_exists(public_path('/storage/galleries/sliders_gallery/' . $imagename))) {
                        unlink(public_path('/storage/galleries/sliders_gallery/' . $imagename));
                    }
                }
                unset($gallery_array[$id]);
                $gallery_array = array_values($gallery_array);
                self::updateGallery($id, $gallery_db, $gallery_array);
                return $gallery_db;
            }
        }
    }

    public function update_sliders_gallery($images_array, $id)
    {
        $directory = public_path('storage/galleries/sliders_gallery/');
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $event = self::findGallery($id);
        foreach ($images_array as $key => $images) {
            foreach ($images as $key_data => $item) {
                if (isset($images['img']) && !is_string($images['img']) && $images['img']->isFile()) {
                    $imagename = str_replace(',', '', str_replace(' ', '', pathinfo($images['img']->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $images['img']->extension()));
                    $images['img']->storeAs('public/galleries/sliders_gallery/', $imagename);
                    $images_array[$key]['img'] = $imagename;
                }
            }
        }
        $event->update(['value' => $images_array]);
        $images_delete_from_directory = array_diff($scanned_directory, array_column($images_array, 'img'));
        if (count($images_delete_from_directory) > 0) {
            foreach ($images_delete_from_directory as $image_delete) {
                unlink(public_path('storage/galleries/sliders_gallery/' . $image_delete));
            }
        }
        return $event;
    }

    public function update_main_gallery($images_array, $id)
    {
        $directory = public_path('storage/galleries/main_gallery/');
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $event = self::findGallery($id);
        foreach ($images_array as $key => $images) {
            foreach ($images as $key_data => $item) {
                if (isset($images['img']) && !is_string($images['img']) && $images['img']->isFile()) {
                    $imagename = 'main_gallery/' . str_replace(',', '', str_replace(' ', '', pathinfo($images['img']->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $images['img']->extension()));
                    $images['img']->storeAs('public/galleries/', $imagename);
                    $images_array[$key]['img'] = $imagename;
                }
            }
        }
//        dd($images_array);

        $event->update(['value' => $images_array]);
//        $images_delete_from_directory = array_diff($scanned_directory, array_column($images_array, 'img'));
//        if (count($images_delete_from_directory) > 0) {
//            foreach ($images_delete_from_directory as $image_delete) {
//                unlink(public_path('storage/galleries/main_gallery/' . $image_delete));
//            }
//        }
        return $event;
    }

    /**
     * @throws \Exception
     */
    public function mainslider($slug)
    {
        $mainslider= cache()->remember('mainslider',60*60*24, function() use ($slug) {

            $slide_value = $this->startCondition()->where('name', $slug)->toBase()->get('value')->first();
            return json_decode($slide_value->value);

        });

        return $mainslider;
    }

    /**
     * @throws \Exception
     */
    public function sliders($slug)
    {
        $slide = cache()->remember('sliders',60*60*24, function() use ($slug) {

            $slide_value = $this->startCondition()->where('name', $slug)->toBase()->get('value')->first();
            return json_decode($slide_value->value);

        });
        return $slide;
    }
}
